<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer Notes') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">

                <h3 class="text-lg font-medium">{{ $customer->firstname }} {{ $customer->lastname }}</h3>
                <p class="mb-4">{{ $customer->email }}</p>

                <h4 class="text-md font-medium">Notes</h4>
                
                <div class="mb-4">
                    <form action="{{ route('customers.updateNotes', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <textarea name="notes" class="form-textarea mt-1 block w-full" rows="3">{{ old('notes', $customer->notes) }}</textarea>
                        
                        <button type="submit" class="btn btn-primary mt-2">Update Notes</button>
                    </form>
                </div>

                <a href="{{ route('customers.index') }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-600">Back to Customers</a>
            </div>
        </div>
    </div>
</x-app-layout>
