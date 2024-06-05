<?php

namespace App\Http\Controllers;

use App\Models\BBP_Employer;
use Illuminate\Http\Request;

class BBP_EmployerController extends Controller
{
    public function index()
    {
        $bbp_employers = BBP_Employer::all();
        return view('bbp_employers.index', compact('bbp_employers'));
    }

    public function create()
    {
        return view('bbp_employers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Gender' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Last_Name' => 'required|string|max:255',
            'BBP_Role' => 'required|string|max:255',
            'Email' => 'required|email|unique:bbp_employers,Email',
            'Phone' => 'required|string|max:15',
        ]);

        BBP_Employer::create($validatedData);

        return redirect()->route('bbp_employers.index')->with('success', 'BBP Employer created successfully!');
    }

    public function edit($id)
    {
        $bbp_employer = BBP_Employer::findOrFail($id);
        return view('bbp_employers.edit', compact('bbp_employer'));
    }

    public function update(Request $request, $id)
    {
        $bbp_employer = BBP_Employer::findOrFail($id);

        $validatedData = $request->validate([
            'Gender' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Last_Name' => 'required|string|max:255',
            'BBP_Role' => 'required|string|max:255',
            'Email' => 'required|email|unique:bbp_employers,Email,'.$bbp_employer->ID_BBP.',ID_BBP',
            'Phone' => 'required|string|max:15',
        ]);

        $bbp_employer->update($validatedData);

        return redirect()->route('bbp_employers.index')->with('success', 'BBP Employer updated successfully!');
    }

    public function destroy($id)
    {
        $bbp_employer = BBP_Employer::findOrFail($id);
        $bbp_employer->delete();

        return redirect()->route('bbp_employers.index')->with('success', 'BBP Employer deleted successfully!');
    }
}
