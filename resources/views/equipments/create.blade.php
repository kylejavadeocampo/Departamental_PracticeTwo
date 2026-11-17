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
                    <form method="POST" action="{{ route('equipments.store') }}">
                        @csrf

                        <x-input-label for="EquipmentName" :value="__('Equipment Name')" />
                        <x-text-input id="EquipmentName" class="block mt-1 w-full" type="text" name="EquipmentName" :value="old('EquipmentName')" required autofocus autocomplete="equipment"/>

                        <x-input-label for="Category" :value="__('Category')" class="mt-5"/>
                        <select id="Category" name="Category" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-xs text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option value="paddles">Paddles</option>
                            <option value="balls">Balls</option>
                            <option value="nets">Nets</option>
                            <option value="accessories">Accessories</option>
                        </select>

                        <x-input-label for="UnitPrice" :value="__('Unit Price')" class="mt-5" />
                        <x-text-input id="UnitPrice" class="block mt-1 w-full" type="number" name="UnitPrice" :value="old('EquipmentName')" required autofocus autocomplete="equipment"/>

                        <x-input-label for="Availability" :value="__('Availability')" class="mt-5" />
                        <select id="Availability" name="Availability" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-xs text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option value="1">On Stock</option>
                            <option value="0">No Stock</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
