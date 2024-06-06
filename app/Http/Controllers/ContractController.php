<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Customer;

class ContractController extends Controller
{

    public function index()
    {
        $contracts = Contract::all(); 

        return view('contracts.index', compact('contracts'));
    }


    public function create()
    {
        $customers = Customer::all();
        return view('contracts.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'area' => 'required|string|max:255',
            'end_date' => 'required|date',
            'payment_terms' => 'required|string|max:255',
            'rebate' => 'required|numeric',
            'rebate_period' => 'required|string|max:255',
            'paper_review' => 'required|boolean',
            'review_period' => 'required|string|max:255',
            'review_base' => 'required|string|max:255',
            'cto_type' => 'required|string|max:255',
            'cto_value' => 'nullable|numeric',
            'sob' => 'required|boolean',
            'sob_value' => 'nullable|numeric',
        ]);

        Contract::create($validated);

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }
}
