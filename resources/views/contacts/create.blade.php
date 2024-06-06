<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Contact') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700 dark:text-gray-300">Gender</label>
                        <select id="gender" name="gender" class="form-select mt-1 block w-full">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="first_name" class="block text-gray-700 dark:text-gray-300">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-gray-700 dark:text-gray-300">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 dark:text-gray-300">Role</label>
                        <input type="text" id="role" name="role" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" class="form-input mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-input mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block text-gray-700 dark:text-gray-300">Location</label>
                        <input type="text" id="location" name="location" class="form-input mt-1 block w-full">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Create Contact</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
