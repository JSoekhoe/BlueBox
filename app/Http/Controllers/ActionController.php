<?php
namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Strategy;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::with('strategy', 'who', 'support')->get();
        return view('actions.index', compact('actions'));
    }

    public function create()
    {
        $strategies = Strategy::all();
        return view('actions.create', compact('strategies'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ID_Strategy' => 'required|exists:strategies,ID_Strategy',
            'Action' => 'required|string|max:255',
            'Who' => 'required|exists:users,id',
            'Support' => 'required|exists:users,id',
            'When' => 'required|date',
            'Status' => 'required|string|max:255',
        ]);

        Action::create($validatedData);

        return redirect()->route('actions.index')->with('success', 'Action created successfully!');
    }

    public function edit($id)
    {
        $action = Action::findOrFail($id);
        $strategies = Strategy::all();
        return view('actions.edit', compact('action', 'strategies'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ID_Strategy' => 'required|exists:strategies,ID_Strategy',
            'Action' => 'required|string|max:255',
            'Who' => 'required|exists:users,id',
            'Support' => 'required|exists:users,id',
            'When' => 'required|date',
            'Status' => 'required|string|max:255',
        ]);

        $action = Action::findOrFail($id);
        $action->update($validatedData);

        return redirect()->route('actions.index')->with('success', 'Action updated successfully!');
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();

        return redirect()->route('actions.index')->with('success', 'Action deleted successfully!');
    }
}
