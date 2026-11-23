<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Equipment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- CONTENT -->
                    <div class="flex justify-between">
                        <h1>CRUD Operations</h1>

                        <a href="{{ route('equipments.create') }}">
                            <x-primary-button>
                                {{ __('Add Equipment') }}
                            </x-primary-button>
                        </a>
                    </div>

                    <hr class="mt-5 mb-5">

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
                                    <th class="px-5 py-1">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($equipments as $equipment)
                                    <tr class="text-center">
                                        <td class="px-5 py-3">{{ $equipment -> id }}</td>
                                        <td class="px-5 py-1">{{ $equipment -> EquipmentName }}</td>
                                        <td class="px-5 py-3">{{ $equipment -> Category }}</td>
                                        <td class="px-5 py-3">{{ $equipment -> UnitPrice }}</td>
                                        <td class="px-5 py-3">{{ $equipment -> Description }}</td>
                                        <td class="px-5 py-3">{{ $equipment -> Availability ? 'On Stock' : 'Out of Stock' }}</td>
                                        <td class="px-5 py-3">{{ $equipment -> created_at }}</td>
                                        <td class="px-5 py-3">
                                            <div class="flex items-center justify-center gap-4">
                                                <a class="text-yellow-300 hover:underline" href="{{ route('equipments.show', $equipment -> id) }}">
                                                    View
                                                </a>
                                                <a class="text-green-300 hover:underline" href="{{ route('equipments.edit', $equipment -> id) }}">
                                                    Edit
                                                </a>
                                                <form action="{{ route('equipments.destroy', $equipment -> id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500 hover:underline">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Empty</td>
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