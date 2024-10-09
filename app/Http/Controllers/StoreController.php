<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    // Display the list of stores
    public function index()
    {
        $stores = Store::all();
        return view('admin.manage_store.index', compact('stores'));
    }

    // Show the form for creating a new store
    public function create()
    {
        return view('admin.manage_store.create');
    }

    // Store a newly created store in storage
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'phone' => 'required|string|max:20',
            'open_hours' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Store::create([
            'logo' => $logoPath,
            'address' => $request->address,
            'name' => $request->name,
            'website' => $request->website,
            'phone' => $request->phone,
            'open_hours' => $request->open_hours,
            'email' => $request->email,
        ]);

        return redirect()->route('stores.index')->with('success', 'Store created successfully.');
    }

    // Show the form for editing the specified store
    public function edit(Store $store)
    {
        return view('admin.manage_store.edit', compact('store'));
    }

    // Update the specified store in storage
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'phone' => 'required|string|max:20',
            'open_hours' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($store->logo) {
                Storage::disk('public')->delete($store->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $store->logo = $logoPath;
        }

        $store->update($request->only('address', 'name', 'website', 'phone', 'open_hours', 'email'));

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    // Remove the specified store from storage
    public function destroy(Store $store)
    {
        // Delete logo file
        if ($store->logo) {
            Storage::disk('public')->delete($store->logo);
        }
        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
}
