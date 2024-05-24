    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customers') }}
            </h2>
        </x-slot>

        <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('customers.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                            Create Customers
                        </a>
                    </div>

                    <div class="mb-4">
                        <form action="{{ route('customers.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search customers" value="{{ old('search', $search ?? '') }}" class="input input-bordered">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                            <tr>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Branch
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $customer->id }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $customer->firstname }} {{ $customer->lastname }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $customer->email }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $customer->branch->branch_name }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        <a href="{{ route('customers.edit', $customer) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-600">Edit</a><form action="{{ route('customers.destroy', $customer) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-600">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
