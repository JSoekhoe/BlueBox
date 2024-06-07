<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Partners') }}
            </h2>
            <nav class="flex space-x-4">
                <a href="{{ route('categories.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                    {{ __('Categories') }}
                </a>
            </nav>
        </div>
    </x-slot>
    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
    <a href="{{ route('partners.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Create Partner
    </a>
</div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    ID Partner
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Partner Name
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($partners as $partner)
                                <tr>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">
                                        {{ $partner->id }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">
                                        {{ $partner->Partner_name }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-xs md:text-sm leading-4 text-gray-900 dark:text-gray-100">
                                        <a href="{{ route('partners.edit', $partner->id) }}" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-900 dark:hover:text-yellow-600">Edit</a>
                                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this partner?');">
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
