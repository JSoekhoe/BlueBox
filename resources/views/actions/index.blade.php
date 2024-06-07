<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Actions') }}
            </h2>
            <nav class="flex space-x-4">
                <a href="{{ route('strategies.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                    {{ __('Strategies') }}
                </a>
            </nav>
        </div>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full md:w-3/4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('actions.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                            Create Action
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 md:px-6 md:py-3">ID Action</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">ID Strategy</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">Action</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">Who</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">Support</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">When</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">Status</th>
                                    <th class="px-4 py-2 md:px-6 md:py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($actions as $action)
                                
                                    <tr>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->ID_Action }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->strategy->ID_Strategy }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->Action }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->Who }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->Support }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->When }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">{{ $action->Status }}</td>
                                        <td class="px-4 py-2 md:px-6 md:py-3">
                                            <a href="{{ route('actions.edit', $action->ID_Action) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-600">Edit</a>
                                            <form action="{{ route('actions.destroy', $action->ID_Action) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this action?');">
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
    </div>
</x-app-layout>
