<?php

namespace App\Http\Controllers;

use App\Models\AllowedBranch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::query();

        // Apply branch-based access control
        if (!$user->isAdmin()) {
            $users->where('branch_id', $user->branch_id);
        }

        $users = $users->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $branches = AllowedBranch::all();
        return view('users.create', compact('roles', 'branches'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
            'branch' => 'required|exists:allowed_branches,id',
        ]);

        // Create the user with the validated data
        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role'],
            'branch_id' => $validatedData['branch'],
        ]);

        // Redirect the user after successfully creating the user
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::with('role', 'branch')->findOrFail($id);
        $roles = Role::all();
        $branches = AllowedBranch::all();
        return view('users.edit', compact('user', 'roles', 'branches'));
    }
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|exists:roles,id',
            'branch' => 'required|exists:allowed_branches,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user attributes
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->branch_id = $request->branch;

        // Check if password is provided and update it if necessary
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        // Save the updated user
        $user->save();

        // Redirect the user after successfully updating the user
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect the user after successfully deleting the user
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

}
