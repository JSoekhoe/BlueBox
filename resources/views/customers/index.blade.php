<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Customers Table -->
                    <table class="min-w-full table-auto table-fixed">
                        <thead class="justify-between">
                        <tr class="bg-gray-800">
                            <th class="w-1/6 px-4 py-2">
                                <span class="text-gray-300">ID</span>
                            </th>
                            <th class="w-2/6 px-4 py-2">
                                <span class="text-gray-300">Name</span>
                            </th>
                            <th class="w-3/6 px-4 py-2">
                                <span class="text-gray-300">Email</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                        @foreach($customers as $customer)
                            <tr class="bg-white border-4 border-gray-200">
                                <td class="px-4 py-2">{{ $customer->id }}</td>
                                <td class="px-4 py-2">{{ $customer->firstname }} {{ $customer->lastname }}</td>
                                <td class="px-4 py-2">{{ $customer->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
