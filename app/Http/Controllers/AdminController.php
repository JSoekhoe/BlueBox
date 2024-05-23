<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\AllowedBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminController extends Controller
{


    public function index()
{
    $parents = Parent::all(); // Fetch all parents
    return view('admin.parents.index', compact('parents'));
}
    public function showAddParentForm()
    {
        $branches = AllowedBranch::all();
        return view('admin\add-parent', compact('branches'));
    }

    public function storeParent(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers',
        'branch_id' => 'required|integer|exists:allowed_branches,id',
    ]);
    
    $password = Str::random(10); // Generate a random password

    $customer = Customer::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => Hash::make($password),
        'branch_id' => $request->branch_id,
    ]);

    // Optionally send email to customer with their password
    // Mail::to($customer->email)->send(new NewCustomerMail($customer, $password));

    return redirect()->route('admin.showAddParentForm')->with('success', 'Parent added successfully!');
}

}
