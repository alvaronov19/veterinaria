<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // If admin/staff, show all. If client, show own.
        if (auth()->user()->role === 'client') {
            $pets = auth()->user()->pets()->latest()->paginate(10);
        } else {
            $pets = \App\Models\Pet::with('user')->latest()->paginate(10);
        }

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all(); // For admin/staff to select owner
        return view('pets.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id', // Owner
        ]);

        // Clients can only create for themselves (if we allow them to create)
        // But the requirement says "Este módulo debe estar restringido por rol (ej. solo admin/staff pueden gestionarlo)."
        // However, usually clients might want to see their pets.
        // Let's assume Admin/Staff create pets.
        
        \App\Models\Pet::create($request->all());

        return redirect()->route('pets.index')->with('success', 'Mascota registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pet = \App\Models\Pet::findOrFail($id);
        $users = \App\Models\User::all();
        return view('pets.edit', compact('pet', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = \App\Models\Pet::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $pet->update($request->all());

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = \App\Models\Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Mascota eliminada exitosamente.');
    }
}
