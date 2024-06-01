<?php

namespace App\Http\Controllers;

use App\Models\AllowedBranch;
use App\Models\Customer;
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'branch' => 'required|exists:allowed_branches,id',
        ]);

        // Create the customer with the validated data
        $customer = Customer::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'branch_id' => $validatedData['branch'],
        ]);

        // Redirect the customer after successfully creating the customer
        return redirect()->route('customers.index')->with('success', 'customer created successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::with('branch')->findOrFail($id);
        $branches = AllowedBranch::all();
        return view('customers.edit', compact('customer', 'branches'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'branch' => 'required|exists:allowed_branches,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find the customer by ID
        $customer = Customer::findOrFail($id);

        // Update customer attributes
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->branch_id = $request->branch;

        // Check if password is provided and update it if necessary
        if ($request->has('password')) {
            $customer->password = bcrypt($request->password);
        }

        // Save the updated customer
        $customer->save();

        // Redirect the customer after successfully updating the customer
        return redirect()->route('customers.index')->with('success', 'customer updated successfully!');
    }

    public function destroy($id)
    {
        // Find the customer by ID
        $customer = Customer::findOrFail($id);

        // Delete the customer
        $customer->delete();

        // Redirect the customer after successfully deleting the customer
        return redirect()->route('customers.index')->with('success', 'customer deleted successfully!');
    }


    public function show($id)
    {
        $customer = Customer::with('branch')->findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function showStrategy($id)
{
    $customer = Customer::with('branch')->findOrFail($id);
    // Add your strategy retrieval logic here
    $strategy = []; // Replace with actual strategy data
    return view('customers.strategy', compact('customer', 'strategy'));
}

    public function storeStrategy(Request $request, $customerId)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'mastername' => 'required|string|max:255',
        'summary' => 'required|string',
        'today' => 'required|string',
        'tomorrow' => 'required|string',
        'how' => 'required|string',
        'internal_alignment' => 'required|string',
        'external_alignment' => 'required|string',
        'resource_needed' => 'required|array',
    ]);

        
    // Find the customer by ID
    $customer = Customer::findOrFail($customerId);

    // Create the strategy with the validated data
    $strategy = $customer->strategies()->create($validatedData);

    // Redirect the user after successfully creating the strategy
    return redirect()->route('customers.show', $customerId)->with('success', 'Strategy created successfully!');
}


    public function showActions($id)
    {
        $customer = Customer::with('branch')->findOrFail($id);
        // Add your actions retrieval logic here
        $actions = []; // Replace with actual actions data
        return view('customers.actions', compact('customer', 'actions'));
    }

}
