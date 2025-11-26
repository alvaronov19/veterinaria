<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Mascotas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Mensaje de Éxito --}}
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">¡Éxito!</span> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Listado de Mascotas</h3>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        @if(auth()->user()->role !== 'client')
                        <a href="{{ route('pets.create') }}" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Nueva Mascota
                        </a>
                        @endif
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3">Especie</th>
                                <th scope="col" class="px-4 py-3">Raza</th>
                                <th scope="col" class="px-4 py-3">Edad</th>
                                <th scope="col" class="px-4 py-3">Dueño</th>
                                @if(auth()->user()->role !== 'client')
                                <th scope="col" class="px-4 py-3 text-center">Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $pet)
                            <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $pet->name }}</th>
                                <td class="px-4 py-3">{{ $pet->species }}</td>
                                <td class="px-4 py-3">{{ $pet->breed ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $pet->age }} años</td>
                                <td class="px-4 py-3">{{ $pet->user->name }}</td>
                                @if(auth()->user()->role !== 'client')
                                <td class="px-4 py-3 flex items-center justify-center">
                                    <a href="{{ route('pets.edit', $pet) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Editar</a>
                                    <form action="{{ route('pets.destroy', $pet) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4">
                    {{ $pets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
