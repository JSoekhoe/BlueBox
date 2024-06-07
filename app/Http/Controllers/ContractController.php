<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area' => 'required|string|max:255',
            'end_date' => 'required|date',
            'payment_terms' => 'required|string|max:255',
            'rebate' => 'required|numeric',
            'rebate_period' => 'required|string|max:255',
            'paper_review' => 'required|string|max:255',
            'review_period' => 'required|string|max:255',
            'review_base' => 'required|string|max:255',
            'cto_type' => 'required|string|max:255',
            'cto_value' => 'required|numeric',
            'sob' => 'required|string|max:255',
            'sob_value' => 'required|numeric',
        ]);

        Contract::create($validatedData);
        return redirect()->route('contracts.index')->with('success', 'Contract created successfully.');
    }

    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    public function update(Request $request, Contract $contract)
    {
        $validatedData = $request->validate([
            'area' => 'required|string|max:255',
            'end_date' => 'required|date',
            'payment_terms' => 'required|string|max:255',
            'rebate' => 'required|numeric',
            'rebate_period' => 'required|string|max:255',
            'paper_review' => 'required|string|max:255',
            'review_period' => 'required|string|max:255',
            'review_base' => 'required|string|max:255',
            'cto_type' => 'required|string|max:255',
            'cto_value' => 'required|numeric',
            'sob' => 'required|string|max:255',
            'sob_value' => 'required|numeric',
        ]);

        $contract->update($validatedData);
        return redirect()->route('contracts.index')->with('success', 'Contract updated successfully.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contract deleted successfully.');
    }

    public function convertToPDF(Contract $contract)
    {
        $pdf = Pdf::loadView('contracts.pdf', compact('contract'));
        return $pdf->download('contract.pdf');
    }
}
