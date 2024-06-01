<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer Strategy') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">{{ $customer->firstname }} {{ $customer->lastname }}<a href="{{ route('customers.actions', $customer) }}" class="text-purple-600 dark:text-purple-400 hover:text-purple-900 dark:hover:text-purple-600">     View Actions      </a></h3>
                    
                    <!-- Display strategy details here -->
                </div>
                <div class="mt-4">
                    
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to Customers</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
