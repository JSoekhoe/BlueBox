<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Parent') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full md:w-3/4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('parents.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="Mastername" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mastername</label>
                            <input id="Mastername" name="Mastername" type="text" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="Category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                            <input id="Category" name="Category" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="Contract_expiration" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contract Expiration</label>
                            <input id="Contract_expiration" name="Contract_expiration" type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="Contract_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contract Type</label>
                            <input id="Contract_type" name="Contract_type" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="European_SM_short" class="block text-sm font-medium text-gray-700 dark:text-gray-300">European SM (Short)</label>
                            <input id="European_SM_short" name="European_SM_short" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="European_SM_long" class="block text-sm font-medium text-gray-700 dark:text-gray-300">European SM (Long)</label>
                            <input id="European_SM_long" name="European_SM_long" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="Partner" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Partner</label>
                            <input id="Partner" name="Partner[]" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="Focus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Focus</label>
                            <input id="Focus" name="Focus" type="checkbox" class="mt-1">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Add Parent
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
