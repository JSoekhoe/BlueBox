<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Strategy;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::with('strategy')->get();
        return view('actions.index', compact('actions'));
    }

    public function create()
    {
        $strategies = Strategy::all();
        return view('actions.create', compact('strategies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'strategy_id' => 'required|exists:strategies,strategy_id',
            'Action' => 'required|string|max:255',
            'Who' => 'required|string|max:255',
            'Support' => 'required|string|max:255',
            'When' => 'required|date',
            'Status' => 'required|string|max:255',
        ]);

        Action::create($request->all());
        return redirect()->route('actions.index')->with('success', 'Action created successfully.');
    }

    public function edit($id)
    {
        $action = Action::findOrFail($id);
        $strategies = Strategy::all();
        return view('actions.edit', compact('action', 'strategies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'strategy_id' => 'required|exists:strategies,strategy_id',
            'Action' => 'required|string|max:255',
            'Who' => 'required|string|max:255',
            'Support' => 'required|string|max:255',
            'When' => 'required|date',
            'Status' => 'required|string|max:255',
        ]);

        $action = Action::findOrFail($id);
        $action->update($request->all());
        return redirect()->route('actions.index')->with('success', 'Action updated successfully.');
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();
        return redirect()->route('actions.index')->with('success', 'Action deleted successfully.');
    }
}
