<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT -->
                    <form method="POST" action="{{ route('equipments.update', $equipment -> id) }}">
                        @csrf
                        @method('PUT')

                        <x-input-label for="name" :value="__('Equipment Name')" />
                        <x-text-input id="name" name="name" class="block mt-1 w-full" type="text"  :value="$equipment -> EquipmentName" required autofocus autocomplete="equipment"/>

                        <x-input-label for="category" :value="__('Category')" class="mt-5"/>
                        <select id="category" name="category" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option @selected(request('Category') == 'paddles') value="paddles">Paddles</option>
                            <option @selected(request('Category') == 'balls') value="balls">Balls</option>
                            <option @selected(request('Category') == 'nets') value="nets">Nets</option>
                            <option @selected(request('Category') == 'accessories') value="accessories">Accessories</option>
                        </select>

                        <x-input-label for="price" :value="__('Unit Price')" class="mt-5" />
                        <x-text-input id="price" name="price" class="block mt-1 w-full" type="number" :value="$equipment -> UnitPrice " required autofocus autocomplete="equipment"/>

                        <x-input-label for="description" :value="__('Description')" class="mt-5"/>
                        <textarea name="description" class="block mt-1 w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-gray-300 focus:border-indigo-500 shadow-sm">{{ $equipment -> Description }}</textarea>

                        <x-input-label for="Availability" :value="__('Availability')" class="mt-5" />
                        <select name="availability" class="w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-xs text-gray-300 focus:border-indigo-500 shadow-sm ">
                            <option @selected(request('Availability') == '1') value="1">On Stock</option>
                            <option @selected(request('Availability') == '0') value="0">No Stock</option>
                        </select>

                        <hr class="mt-5 mb-5">
                        <div class="space-x-6">
                            <x-primary-button>
                                {{ __('Edit') }}
                            </x-primary-button>
                            <a class="text-gray-400 hover:underline" href="{{ route('equipments.index') }}">
                                Return
                            </a>
                        </div>
                        

                    </form>
                    <!-- CONTENT -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
