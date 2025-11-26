<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Mensaje de Éxito --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    {{-- Encabezado y Botón Crear --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Lista de Usuarios</h3>
                        
                        @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow" style="background-color: #2563eb; color: white;">
                            + Crear Nuevo Usuario
                        </a>
                        @endif
                    </div>

                    {{-- Tabla --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="py-2 px-4 text-left">Nombre</th>
                                    <th class="py-2 px-4 text-left">Email</th>
                                    <th class="py-2 px-4 text-left">Rol</th>
                                    <th class="py-2 px-4 text-center">Estado</th>
                                    <th class="py-2 px-4 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4">{{ $user->name }}</td>
                                    <td class="py-2 px-4">{{ $user->email }}</td>
                                    <td class="py-2 px-4 capitalize">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $user->role === 'admin' ? 'bg-purple-200 text-purple-800' : ($user->role === 'staff' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800') }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        @if($user->is_active)
                                            <span class="text-green-600 font-bold text-sm">Activo</span>
                                        @else
                                            <span class="text-red-600 font-bold text-sm">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 text-center">
                                        <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Paginación --}}
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>