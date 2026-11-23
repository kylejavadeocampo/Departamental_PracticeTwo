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
                    <x-input-label for="name" :value="__('Equipment Name')" />
                    <x-text-input id="name" name="name" class="block mt-1 w-full" type="text"  :value="$equipment -> EquipmentName" readonly required autofocus autocomplete="equipment"/>

                    <x-input-label for="category" :value="__('Category')" class="mt-5"/>
                    <x-text-input id="name" name="name" class="block mt-1 w-full" type="text" :value="$equipment -> Category" readonly/>                        

                    <x-input-label for="price" :value="__('Unit Price')" class="mt-5" />
                    <x-text-input id="price" name="price" class="block mt-1 w-full" type="number" :value="$equipment -> UnitPrice" readonly required autofocus autocomplete="equipment"/>

                    <x-input-label for="description" :value="__('Description')" class="mt-5"/>
                    <textarea name="description" class="block mt-1 w-full bg-gray-900 border border-transparent border-gray-700 rounded-md text-gray-300 focus:border-indigo-500 shadow-sm" readonly>{{ $equipment -> Description }}</textarea>

                    <x-input-label for="Availability" :value="__('Availability')" class="mt-5" />
                    <x-text-input id="name" name="name" class="block mt-1 w-full" type="text" :value="$equipment -> Availability ? 'On Stock' : 'No Stock'" readonly/>

                    <hr class="mt-5 mb-5">
                    
                    <x-input-label for="who" :value="__('Added By')" class="mt-5" />
                    <x-text-input id="who" name="who" class="block mt-1 w-full" type="text" :value="$equipment -> user -> name" readonly/>

                    <hr class="mt-5 mb-5">
                    <a href="{{ route('equipments.index') }}">
                        <x-primary-button>
                            {{ __('Return') }}
                        </x-primary-button>
                    </a>
                    <!-- CONTENT -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
