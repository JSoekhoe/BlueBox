<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-center items-center">
                    <!-- Link to customers.index -->
                    <a href="{{ route('customers.index') }}" class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition ease-in-out duration-150 text-center">
                        {{ __('Customers') }}
                    </a>
                    <a href="{{ route('users.index') }}" class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-600 transition ease-in-out duration-150 text-center">
                        {{ __('users') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
