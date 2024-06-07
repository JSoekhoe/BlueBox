<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- Links to Users and Customers -->
                    <div class="mt-4 flex">
                      
                    
                    <a href="{{ route('users.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Users') }}
                        </a>
                        
                       
                        <a href="{{ route('bbp_employers.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Bbp employers') }}
                        </a>
                        <a href="{{ route('contacts.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Contacts') }}
                        </a>
                        <a href="{{ route('contracts.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Contracts') }}
                        </a>
                        @if(Auth::user() && Auth::user()->isAdmin())
                        <a href="{{ route('parents.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Parents') }}
                        </a>
                        
                        <a href="{{ route('partners.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Partners') }}
                        </a>

                        <a href="{{ route('customers.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Customers') }}
                        </a>

                        <a href="{{ route('strategies.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Strategies') }}
                        </a>
                        <a href="{{ route('categories.index') }}" class="inline-block px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-700 dark:hover:bg-gray-700 transition-colors duration-300 mr-2">
                            {{ __('View Category') }}
                        </a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
