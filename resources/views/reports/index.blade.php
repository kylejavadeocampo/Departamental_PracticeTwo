<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT -->
                    <div class="mb-5">
                        <h1>Select your filters</h1> 
                    </div>
                    <form method="GET" action="{{ route('reports.index')}}">
                        @csrf
                        <div class="flex justify-between align-items-center">
                            <div class="flex space-x-5">
                                <div>
                                    <x-input-label for="availability" :value="__('Availability')"/>
                                    <select name="availability" class="bg-gray-900 border border-transparent rounded-md text-gray-300">
                                        <option  value="">-</option>
                                        <option @selected(request('availability') == 'available') value="available">On stock</option>
                                        <option @selected(request('availability') == 'notavailable') value="notavailable">Out of stock</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="category" :value="__('Category')"/>
                                    <select name="category" class="bg-gray-900 border border-transparent rounded-md text-gray-300">
                                        <option value="">-</option>
                                        <option @selected(request('category') == 'paddles') value="paddles">Paddles</option>
                                        <option @selected(request('category') == 'balls') value="balls">Balls</option>
                                        <option @selected(request('category') == 'nets') value="nets">Nets</option>
                                        <option @selected(request('category') == 'accessories') value="accessories">Accessories</option>
                                    </select>
                                </div>
                                <div>
                                    <x-input-label for="price" :value="__('Price')"/>
                                    <select name="price" class="bg-gray-900 border border-transparent rounded-md text-gray-300">
                                        <option value="">-</option>
                                        <option @selected(request('price') == 'asc') value="asc">Ascending</option>
                                        <option @selected(request('price') == 'desc') value="desc">Descending</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-rows-2 place-items-center">
                                <x-primary-button>
                                    {{ __('Set Filters')}}
                                </x-primary-button>
                                <a class="text-gray-500 hover:underline" href="{{ route('reports.index') }}">
                                    Reset Filter
                                </a>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-5 mb-5">
                    <div class="mb-5 flex justify-between">
                        <p>
                            Total row count:<strong> {{ $equipmentCount }} </strong>
                        </p>
                        <a href="{{ route('reports.pdf', request() -> query()) }}">
                            <x-primary-button>
                                {{ __('Export PDF') }}
                            </x-primary-button>
                        </a>
                    </div>

                    <div class="border border-gray-700 rounded rounded-md">
                        <table class="w-full text-gray-300"> 
                            <thead>
                                <tr class="bg-gray-600/10">
                                    <th class="px-5 py-1">ID</th>
                                    <th class="px-5 py-1">Equipment Name</th>
                                    <th class="px-5 py-1">Category</th>
                                    <th class="px-5 py-1">Price</th>
                                    <th class="px-5 py-1">Description</th>
                                    <th class="px-5 py-1">Availability</th>
                                    <th class="px-5 py-1">Time added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($equipments as $equipment)
                                    <tr class="hover:bg-gray-700/50 transistion-color duration-150 text-center">
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> id }}</td>
                                        <td class="px-5 py-1 whitespace-nowrap">{{ $equipment -> EquipmentName }}</td>
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> Category }}</td>
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> UnitPrice }}</td>
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> Description }}</td>
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> Availability ? 'On Stock' : 'Out of Stock' }}</td>
                                        <td class="px-5 py-3 whitespace-nowrap">{{ $equipment -> created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="whitespace-nowrap text-sm text-gray-200 text-center p-5" colspan="7">
                                            Empty
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- CONTENT -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>