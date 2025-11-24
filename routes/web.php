<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\Admin\UserController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    
   
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::resource('users', UserController::class); 
    });

    Route::resource('pets', PetController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
