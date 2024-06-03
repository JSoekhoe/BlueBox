<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- First Name -->
                        <div>
                            <label for="firstname">First Name</label>
                            <input id="firstname" class="block mt-1 w-full" type="text" name="firstname" required autofocus />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <label for="lastname">Last Name</label>
                            <input id="lastname" class="block mt-1 w-full" type="text" name="lastname" required />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email">Email</label>
                            <input id="email" class="block mt-1 w-full" type="email" name="email" required />
                        </div>

                        <!-- Role -->
                        <div class="mt-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">Role</label>
                            <select id="role" name="role" class="block mt-1 w-full">
                                @foreach($roles as $role)
                                    @if(auth()->user()->isAdmin() || ($role->role_name === 'Employee' && auth()->user()->isModerator()))
                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Branch -->
                        <div class="mt-4">
                            <label for="branch">Branch</label>
                            <select id="branch" name="branch" class="block mt-1 w-full" @if(!auth()->user()->isAdmin()) disabled @endif>
                                @if(auth()->user()->isAdmin())
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                @else
                                    <option value="{{ auth()->user()->branch_id }}" selected>{{ auth()->user()->branch->branch_name }}</option>
                                @endif
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" @if(!auth()->user()->isAdmin() && !auth()->user()->isModerator()) disabled @endif>
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
