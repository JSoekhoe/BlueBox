<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentModel;

class ParentController extends Controller
{
    /**php
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
        $validated = $request->validate([
            'Mastername' => 'required|string|max:255',
            'Category' => 'nullable|string|max:255',
            'Contract_expiration' => 'nullable|date',
            'Contract_type' => 'nullable|string|max:255',
            'European_SM_short' => 'nullable|string|max:255',
            'European_SM_long' => 'nullable|string|max:255',
            'Partner' => 'nullable|array',
            'Partner.*' => 'nullable|string|max:255',
            'Focus' => 'nullable|boolean',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        ParentModel::create($validated);

        return redirect()->route('parents.index')->with('success', 'Parent added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the parent by ID
        $parent = ParentModel::findOrFail($id);
        
        // Return a view with the parent data
        return view('parents.show', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the parent by ID
        $parent = ParentModel::findOrFail($id);
        
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
            'Mastername' => 'required|string|max:255',
            'Category' => 'nullable|string',
            'Contract_expiration' => 'nullable|date',
            'Contract_type' => 'nullable|string',
            'European_SM_short' => 'nullable|string',
            'European_SM_long' => 'nullable|string',
            'Partner' => 'nullable|array',
            'Focus' => 'nullable|boolean',
        ]);

        // Find the parent by ID and update it
        $parent = ParentModel::findOrFail($id);
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
        $parent = ParentModel::findOrFail($id);
        $parent->delete();

        // Redirect to the parents index with a success message
        return redirect()->route('parents.index')->with('success', 'Parent deleted successfully.');
    }
}
