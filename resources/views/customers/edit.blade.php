<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- First Name -->
                        <div class="mt-4">
                            <label for="firstname" class="block font-medium text-sm text-gray-700">First Name</label>
                            <input id="firstname" type="text" name="firstname" value="{{ old('firstname', $customer->firstname) }}" required autofocus class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <label for="lastname" class="block font-medium text-sm text-gray-700">Last Name</label>
                            <input id="lastname" type="text" name="lastname" value="{{ old('lastname', $customer->lastname) }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $customer->email) }}" required class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Branch -->
                        <div class="mt-4">
                            <label for="branch" class="block font-medium text-sm text-gray-700">Branch</label>
                            <select id="branch" name="branch" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $customer->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
