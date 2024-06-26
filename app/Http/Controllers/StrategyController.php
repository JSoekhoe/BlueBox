<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strategy;

class StrategyController extends Controller
{
    public function index()
    {
        $strategies = Strategy::all();
        return view('strategies.index', compact('strategies'));
    }

    public function create()
    {
        return view('strategies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Mastername' => 'required|string|max:255',
            'Summary' => 'nullable|string',
            'Today' => 'nullable|string',
            'Tomorrow' => 'nullable|string',
            'How' => 'nullable|string',
            'Internal_alignment' => 'nullable|string',
            'External_alignment' => 'nullable|string',
            'Resource_needed' => 'nullable|string',
        ]);

        Strategy::create($validatedData);

        return redirect()->route('strategies.index')->with('success', 'Strategy created successfully!');
    }

    public function edit($strategy_id)
    {
        $strategy = Strategy::findOrFail($strategy_id);
        return view('strategies.edit', compact('strategy'));
    }


    public function update(Request $request, Strategy $strategy)
    {
        $validatedData = $request->validate([
            'Mastername' => 'required|string|max:255',
            'Summary' => 'nullable|string',
            'Today' => 'nullable|string',
            'Tomorrow' => 'nullable|string',
            'How' => 'nullable|string',
            'Internal_alignment' => 'nullable|string',
            'External_alignment' => 'nullable|string',
            'Resource_needed' => 'nullable|string',
        ]);

        $strategy->update($validatedData);

        return redirect()->route('strategies.index')->with('success', 'Strategy updated successfully!');
    }


    public function destroy(Strategy $strategy)
    {
        $strategy->delete();

        return redirect()->route('strategies.index')->with('success', 'Strategy deleted successfully!');
    }

}
