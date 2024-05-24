<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
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
                    <a href="{{ route('contracts.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                        Create Contract
                    </a>
                </div>



                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Area
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    End Date
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Payment Terms
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Rebate
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Rebate Period
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Paper Review
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Review Period
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Review Base
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    CTO Type
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    CTO Value
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    SOB
                                </th>
                                <th class="px-4 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    SOB Value
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($contracts as $contract)
                                <tr>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->area }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->end_date }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->payment_terms }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->rebate }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->rebate_period }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->paper_review }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->review_period }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->review_base }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->cto_type }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->cto_value }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->sob }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-3 text-left text-xs md:text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ $contract->sob_value }}
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
