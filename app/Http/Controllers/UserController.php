<?php

namespace App\Http\Controllers;

use App\Models\AllowedBranch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Notifications\UserRegistered;

class UserController extends Controller
{
    public function index()
    {
        $users = [];

        if (auth()->user()->isAdmin()) {
            $users = User::all();
        } else {
            $users = User::where('branch_id', auth()->user()->branch_id)->get();
        }

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
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|exists:roles,id',
            'branch' => 'required|exists:allowed_branches,id',
        ]);

        // Generate a random password
        $password = Str::random(10);

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => Hash::make($password),
            'role_id' => $validatedData['role'],
            'branch_id' => $validatedData['branch'],
        ]);

        // Send the notification to the user
        $user->notify(new UserRegistered($user, $password));

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
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|exists:roles,id',
            'branch' => 'required|exists:allowed_branches,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->branch_id = $request->branch;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function sendPasswordReset(Request $request, User $user)
    {
        $status = Password::sendResetLink(['email' => $user->email]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Password reset link sent successfully.')
            : back()->withErrors(['email' => 'Failed to send password reset link.']);
    }
}
