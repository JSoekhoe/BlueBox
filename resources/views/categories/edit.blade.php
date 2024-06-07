<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full md:w-2/3">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('categories.update', $category->ID_Cat) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="Category" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Category</label>
                            <input type="text" name="Category" id="Category" class="mt-1 p-2 block w-full border rounded-md dark:bg-gray-700 dark:text-gray-300" value="{{ $category->Category }}" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="Description" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Description</label>
                            <textarea name="Description" id="Description" rows="4" class="mt-1 p-2 block w-full border rounded-md dark:bg-gray-700 dark:text-gray-300" required>{{ $category->Description }}</textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
