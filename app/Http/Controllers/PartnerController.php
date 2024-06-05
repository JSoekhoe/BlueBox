<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Partner_name' => 'required|string|max:255|unique:partners,Partner_name',
        ]);

        Partner::create($data);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'Partner_name' => 'required|string|max:255|unique:partners,Partner_name,' . $partner->id,
        ]);

        $partner->update($data);

        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}
