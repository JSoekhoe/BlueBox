<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentModel; // Assuming you have a Parent model

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all parents from the database
        $parents = ParentModel::all();
        
        // Return a view with the parents
        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view to create a new parent
        return view('parents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new parent in the database
        Parent::create($validated);

        // Redirect to the parents index with a success message
        return redirect()->route('parents.index')->with('success', 'Parent created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the parent by ID
        $parent = Parent::findOrFail($id);
        
        // Return a view with the parent data
        return view('parents.show', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the parent by ID
        $parent = Parent::findOrFail($id);
        
        // Return a view to edit the parent
        return view('parents.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email,' . $id,
            'phone' => 'required|string|max:20',
        ]);

        // Find the parent by ID and update it
        $parent = Parent::findOrFail($id);
        $parent->update($validated);

        // Redirect to the parents index with a success message
        return redirect()->route('parents.index')->with('success', 'Parent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the parent by ID and delete it
        $parent = Parent::findOrFail($id);
        $parent->delete();

        // Redirect to the parents index with a success message
        return redirect()->route('parents.index')->with('success', 'Parent deleted successfully.');
    }
}
