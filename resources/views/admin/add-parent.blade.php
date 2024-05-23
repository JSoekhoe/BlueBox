
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Add Parent
            </h2>
        </x-slot>

        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Add Parent</h1>
            <form action="{{ route('admin.storeParent') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="firstname" name="firstname" required>
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="lastname" name="lastname" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="email" name="email" required>
                </div>
                <div class="mb-4">
    <label for="branch_id" class="block text-sm font-medium text-gray-700">Branch</label>
    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="branch_id" name="branch_id" required>
        <option value="1">Bluebox Partners</option>
        <option value="2">Family</option>
    </select>
</div>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">Add Parent</button>
            </form>
        </div>
    </x-app-layout>

