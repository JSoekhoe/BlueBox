<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Action') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full md:w-2/3"> <!-- Adjusted width -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                    </div>
                @endif

                <form action="{{ route('actions.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="ID_Strategy" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Strategy:</label>
                        <select id="ID_Strategy" name="ID_Strategy" class="mt-1 block w-full p-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                            @foreach($strategies as $strategy)
                                <option value="{{ $strategy->ID_Strategy }}">{{ $strategy->ID_Strategy }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="Action" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Action:</label>
                        <input type="text" name="Action" id="Action" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label for="Who" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Who:</label>
                        <input type="text" name="Who" id="Who" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label for="Support" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Support:</label>
                        <input type="text" name="Support" id="Support" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label for="When" class="block text-sm font-medium text-gray-700 dark:text-gray-300">When:</label>
                        <input type="date" name="When" id="When" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status:</label>
                        <input type="text" name="Status" id="Status" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Create Action</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

                   