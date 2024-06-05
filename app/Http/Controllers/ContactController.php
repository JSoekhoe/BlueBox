<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ParentModel;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('parent')->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $parents = ParentModel::all();
        return view('contacts.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ID_Master' => 'required|exists:parents,ID_Master',
            'gender' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        Contact::create($data);

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        $parents = ParentModel::all();
        return view('contacts.edit', compact('contact', 'parents'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            //'ID_Master' => 'required|exists:parents,ID_Master',
            'gender' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $contact->update($data);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}

