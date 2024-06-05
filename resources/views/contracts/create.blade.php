<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Contract') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 md:py-12 md:px-6 lg:px-8 flex justify-center">
        <div class="w-full md:w-2/3"> <!-- Adjusted width -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contracts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Area:</label>
                        <input type="text" name="area" id="area" value="{{ old('area') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-400">End Date:</label>
                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="payment_terms" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Payment Terms:</label>
                        <input type="text" name="payment_terms" id="payment_terms" value="{{ old('payment_terms') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="rebate" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Rebate (%):</label>
                        <input type="number" step="0.01" name="rebate" id="rebate" value="{{ old('rebate') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="rebate_period" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Rebate Period:</label>
                        <input type="text" name="rebate_period" id="rebate_period" value="{{ old('rebate_period') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="paper_review" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Paper Review:</label>
                        <select name="paper_review" id="paper_review" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                            <option value="1" {{ old('paper_review') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('paper_review') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="review_period" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Review Period:</label>
                        <input type="text" name="review_period" id="review_period" value="{{ old('review_period') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="review_base" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Review Base:</label>
                        <input type="text" name="review_base" id="review_base" value="{{ old('review_base') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="cto_type" class="block text-sm font-medium text-gray-700 dark:text-gray-400">CTO Type:</label>
                        <input type="text" name="cto_type" id="cto_type" value="{{ old('cto_type') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="cto_value" class="block text-sm font-medium text-gray-700 dark:text-gray-400">CTO Value (%):</label>
                        <input type="number" step="0.01" name="cto_value" id="cto_value" value="{{ old('cto_value') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <label for="sob" class="block text-sm font-medium text-gray-700 dark:text-gray-400">SOB:</label>
                        <select name="sob" id="sob" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                            <option value="1" {{ old('sob') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('sob') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="sob_value" class="block text-sm font-medium text-gray-700 dark:text-gray-400">SOB Value (%):</label>
                        <input type="number" step="0.01" name="sob_value" id="sob_value" value="{{ old('sob_value') }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
