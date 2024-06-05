<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Exports\ContractsPdfExport; // Fix the import here

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.create');
    }

    // public function exportPdf()
    // {
    //     return (new ContractsPdfExport())->download();
    // }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required|string',
            'end_date' => 'required|date',
            'payment_terms' => 'required|numeric|min:0|max:100',
            'rebate' => 'required|numeric',
            'rebate_period' => 'required|string',
            'paper_review' => 'required|boolean',
            'review_period' => 'required|string',
            'review_base' => 'required|string',
            'cto_type' => 'required|string',
            'cto_value' => 'nullable|numeric|min:0|max:100',
            'sob' => 'required|boolean',
            'sob_value' => 'nullable|numeric',
        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    public function edit($id)
{
    $contract = Contract::findOrFail($id);
    return view('contracts.edit', compact('contract'));
}
}
