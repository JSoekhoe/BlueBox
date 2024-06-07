<?php

namespace App\Http\Controllers;

use App\Models\AllowedBranch;
use App\Models\Customer;
use App\Models\Strategy;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $customers = Customer::with('branch')->get();
        } else {
            $customers = Customer::where('branch_id', auth()->user()->branch_id)->with('branch')->get();
        }

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $branches = AllowedBranch::all();
        return view('customers.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'branch' => 'required|exists:allowed_branches,id',
        ]);

        $customer = Customer::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'branch_id' => $validatedData['branch'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::with('branch')->findOrFail($id);
        $branches = AllowedBranch::all();
        return view('customers.edit', compact('customer', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'branch' => 'required|exists:allowed_branches,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->branch_id = $request->branch;

        if ($request->has('password')) {
            $customer->password = bcrypt($request->password);
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }

    public function showStrategy($id)
    {
        $customer = Customer::findOrFail($id);
        $strategies = Strategy::where('ID_Strategy', $customer->strategy_id)->get();

        return view('strategies.index', compact('strategies'));
    }

    public function notes($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.notes', compact('customer'));
    }

    public function updateNotes(Request $request, $id)
    {
        $data = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($data);

        return redirect()->route('customers.notes', $customer)->with('success', 'Notes updated successfully.');
    }
}
