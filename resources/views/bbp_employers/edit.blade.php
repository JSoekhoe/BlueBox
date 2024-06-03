<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit BBP Employer') }}
            </h2>
            <nav class="flex space-x-4">
                <a href="{{ route('users.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                    {{ __('Users') }}
                </a>
                <a href="{{ route('bbp_employers.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                    {{ __('BBP Employers') }}
                </a>
            </nav>
        </div>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('bbp_employers.update', $bbp_employer->ID_BBP) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Gender') }}</label>
                        <select id="gender" name="gender" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="Male" {{ $bbp_employer->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $bbp_employer->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('First Name') }}</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $bbp_employer->First_Name) }}" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Last Name') }}</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $bbp_employer->Last_Name) }}" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="bbp_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('BBP Role') }}</label>
                        <input type="text" id="bbp_role" name="bbp_role" value="{{ old('bbp_role', $bbp_employer->BBP_Role) }}" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $bbp_employer->Email) }}" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Phone') }}</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $bbp_employer->Phone) }}" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Update BBP Employer') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
