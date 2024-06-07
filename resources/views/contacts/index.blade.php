<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-4 text-blue-600">Add Contact</a>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Gender</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">First Name</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Name</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">E-mail</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Phone</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Location</th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->id }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->gender }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->first_name }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->last_name }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->role }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->email }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->phone }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">{{ $contact->location }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('contacts.edit', $contact) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-600">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-600">Delete</button>
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
