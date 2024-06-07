<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Action') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full lg:w-3/4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('actions.update', $action->action_id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Strategy ID -->
                        <div class="mb-4">
                            <label for="strategy_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Strategy</label>
                            <select name="strategy_id" id="strategy_id" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                                @foreach($strategies as $strategy)
                                    <option value="{{ $strategy->strategy_id }}" {{ $action->strategy_id == $strategy->strategy_id ? 'selected' : '' }}>{{ $strategy->Mastername }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Action -->
                        <div class="mb-4">
                            <label for="Action" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Action</label>
                            <input type="text" name="Action" id="Action" value="{{ $action->Action }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <!-- Who -->
                        <div class="mb-4">
                            <label for="Who" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Who</label>
                            <input type="text" name="Who" id="Who" value="{{ $action->Who }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <!-- Support -->
                        <div class="mb-4">
                            <label for="Support" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Support</label>
                            <input type="text" name="Support" id="Support" value="{{ $action->Support }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <!-- When -->
                        <div class="mb-4">
                            <label for="When" class="block text-sm font-medium text-gray-700 dark:text-gray-300">When</label>
                            <input type="datetime-local" name="When" id="When" value="{{ \Carbon\Carbon::parse($action->When)->format('Y-m-d\TH:i') }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="Status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <input type="text" name="Status" id="Status" value="{{ $action->Status }}" class="mt-1 p-2 block w-full border border-gray-300 dark:border-gray-600 rounded-md">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
                                Update Action
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
