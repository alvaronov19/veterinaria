<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Mascota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <form method="POST" action="{{ route('pets.store') }}" class="space-y-6">
                        @csrf

                        {{-- Nombre --}}
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Especie --}}
                        <div>
                            <x-input-label for="species" :value="__('Especie')" />
                            <x-text-input id="species" class="block mt-1 w-full" type="text" name="species" :value="old('species')" required placeholder="Ej. Perro, Gato, Ave" />
                            <x-input-error :messages="$errors->get('species')" class="mt-2" />
                        </div>

                        {{-- Raza --}}
                        <div>
                            <x-input-label for="breed" :value="__('Raza')" />
                            <x-text-input id="breed" class="block mt-1 w-full" type="text" name="breed" :value="old('breed')" placeholder="Opcional" />
                            <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                        </div>

                        {{-- Edad --}}
                        <div>
                            <x-input-label for="age" :value="__('Edad (años)')" />
                            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required min="0" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>

                        {{-- Dueño --}}
                        <div>
                            <x-input-label for="user_id" :value="__('Dueño')" />
                            <select id="user_id" name="user_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Seleccione un dueño</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('pets.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-4">
                                {{ __('Cancelar') }}
                            </a>
                            <x-primary-button class="ml-4">
                                {{ __('Registrar Mascota') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
