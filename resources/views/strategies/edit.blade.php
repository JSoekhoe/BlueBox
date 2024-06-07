<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Strategy') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full lg:w-3/4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('strategies.update', $strategy->strategy_id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                    <!-- Mastername -->
                        <div class="mb-4">
                            <label for="Mastername" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mastername</label>
                            <input type="text" name="Mastername" id="Mastername" value="{{ $strategy->Mastername }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <!-- Summary -->
                        <div class="mb-4">
                            <label for="Summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Summary</label>
                            <textarea name="Summary" id="Summary" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->Summary }}</textarea>
                        </div>

                        <!-- Today -->
                        <div class="mb-4">
                            <label for="Today" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Today</label>
                            <textarea name="Today" id="Today" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->Today }}</textarea>
                        </div>

                        <!-- Tomorrow -->
                        <div class="mb-4">
                            <label for="Tomorrow" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tomorrow</label>
                            <textarea name="Tomorrow" id="Tomorrow" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->Tomorrow }}</textarea>
                        </div>

                        <!-- How -->
                        <div class="mb-4">
                            <label for="How" class="block text-sm font-medium text-gray-700 dark:text-gray-300">How</label>
                            <textarea name="How" id="How" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->How }}</textarea>
                        </div>

                        <!-- Internal Alignment -->
                        <div class="mb-4">
                            <label for="Internal_alignment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Internal Alignment</label>
                            <textarea name="Internal_alignment" id="Internal_alignment" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->Internal_alignment }}</textarea>
                        </div>

                        <!-- External Alignment -->
                        <div class="mb-4">
                            <label for="External_alignment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">External Alignment</label>
                            <textarea name="External_alignment" id="External_alignment" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->External_alignment }}</textarea>
                        </div>

                        <!-- Resource Needed -->
                        <div class="mb-4">
                            <label for="Resource_needed" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Resource Needed</label>
                            <textarea name="Resource_needed" id="Resource_needed" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">{{ $strategy->Resource_needed }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                                Update Strategy
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
