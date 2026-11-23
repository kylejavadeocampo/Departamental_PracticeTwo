<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT -->
                    <form method="POST" action="{{ route('equipments.store') }}">
                        @csrf
                        <x-input-label for="name" :value="__('Equipment Name')" />
                        <x-text-input id="name" name="name" class="block mt-1 w-full" type="text"  :value="old('EquipmentName')" required autofocus autocomplete="equipment"/>

                        <x-input-label for="category" :value="__('Category')" class="mt-5"/>
                        <select id="category" name="category" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option value="paddles">Paddles</option>
                            <option value="balls">Balls</option>
                            <option value="nets">Nets</option>
                            <option value="accessories">Accessories</option>
                        </select>

                        <x-input-label for="price" :value="__('Unit Price')" class="mt-5" />
                        <x-text-input id="price" name="price" class="block mt-1 w-full" type="number" step="0.01" :value="old('EquipmentName')" required autofocus autocomplete="equipment"/>

                        <x-input-label for="description" :value="__('Description')" class="mt-5"/>
                        <textarea name="description" class="block mt-1 w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-gray-300 focus:border-indigo-500 shadow-sm"></textarea>

                        <x-input-label for="Availability" :value="__('Availability')" class="mt-5" />
                        <select name="availability" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-xs text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option value="1">On Stock</option>
                            <option value="0">No Stock</option>
                        </select>

                        <hr class="mt-5 mb-5">
                        <x-primary-button>
                            {{ __('Add Equipment') }}
                        </x-primary-button>
                    </form>
                    <!-- CONTENT -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
