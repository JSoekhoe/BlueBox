<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Strategy') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
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

                <form action="{{ route('strategies.update', $strategy->ID_Strategy) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="Mastername" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mastername</label>
                        <input type="text" name="Mastername" id="Mastername" class="mt-1 block w-full" value="{{ old('Mastername', $strategy->Mastername) }}">
                    </div>

                    <div class="mb-4">
                        <label for="Summary" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Summary</label>
                        <textarea name="Summary" id="Summary" class="mt-1 block w-full">{{ old('Summary', $strategy->Summary) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="Today" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Today</label>
                        <input type="text" name="Today" id="Today" class="mt-1 block w-full" value="{{ old('Today', $strategy->Today) }}">
                    </div>

                    <div class="mb-4">
                        <label for="Tomorrow" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tomorrow</label>
                        <input type="text" name="Tomorrow" id="Tomorrow" class="mt-1 block w-full" value="{{ old('Tomorrow', $strategy->Tomorrow) }}">
                    </div>

                    <div class="mb-4">
                        <label for="How" class="block text-sm font-medium text-gray-700 dark:text-gray-300">How</label>
                        <input type="text" name="How" id="How" class="mt-1 block w-full" value="{{ old('How', $strategy->How) }}">
                    </div>

                    <div class="mb-4">
                        <label for="Internal_alignment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Internal Alignment</label>
                        <input type="text" name="Internal_alignment" id="Internal_alignment" class="mt-1 block w-full" value="{{ old('Internal_alignment', $strategy->Internal_alignment) }}">
                    </div>

                    <div class="mb-4">
                        <label for="External_alignment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">External Alignment</label>
                        <input type="text" name="External_alignment" id="External_alignment" class="mt-1 block w-full" value="{{ old('External_alignment', $strategy->External_alignment) }}">
                    </div>

                    <div class="mb-4">
                        <label for="Resource_needed" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Resource Needed</label>
                        <input type="text" name="Resource_needed" id="Resource_needed" class="mt-1 block w-full" value="{{ old('Resource_needed', $strategy->Resource_needed) }}">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Update') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
