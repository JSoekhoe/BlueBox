

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('parents') }}

        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Contracts</h3>
                    <a href="{{ route('contracts.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">View Contracts</a>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Contacts</h3>
                    <a href="{{ route('contacts.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">View Contacts</a>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Strategies</h3>
                    <a href="{{ route('strategies.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">View Strategies</a>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">partners</h3>
                    <a href="{{ route('partners.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">View Parents</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
