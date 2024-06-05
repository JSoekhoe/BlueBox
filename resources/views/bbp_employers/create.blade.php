<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create BBP Employer') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bbp_employers.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="Gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gender</label>
                        <input type="text" name="Gender" id="Gender" class="input input-bordered w-full" value="{{ old('Gender') }}">
                    </div>
                    <div class="mb-4">
                        <label for="First_Name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                        <input type="text" name="First_Name" id="First_Name" class="input input-bordered w-full" value="{{ old('First_Name') }}">
                    </div>
                    <div class="mb-4">
                        <label for="Last_Name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                        <input type="text" name="Last_Name" id="Last_Name" class="input input-bordered w-full" value="{{ old('Last_Name') }}">
                    </div>
                    <div class="mb-4">
                        <label for="BBP_Role" class="block text-sm font-medium text-gray-700 dark:text-gray-300">BBP Role</label>
                        <input type="text" name="BBP_Role" id="BBP_Role" class="input input-bordered w-full" value="{{ old('BBP_Role') }}">
                    </div>
                    <div class="mb-4">
                        <label for="Email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="Email" id="Email" class="input input-bordered w-full" value="{{ old('Email') }}">
                    </div>
                    <div class="mb-4">
                        <label for="Phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                        <input type="text" name="Phone" id="Phone" class="input input-bordered w-full" value="{{ old('Phone') }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
