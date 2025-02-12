<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }
    
    public function store(Request $request)
    {
        Supplier::create($request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:suppliers,email',
            'phone'          => 'required|string|max:20',
            'account_number' => 'nullable|string|max:255', // New validation rule
        ]));
    
        return redirect()->route('suppliers.index')->with('success', 'Supplier added!');
    }
    
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }
    
    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone'          => 'required|string|max:20',
            'account_number' => 'nullable|string|max:255', // New validation rule
        ]);
    
        $supplier->update($validated);
    
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
    }
    
    public function destroy(\App\Models\Supplier $supplier)
{
    // Check if there are any items associated with this supplier
    if ($supplier->items()->exists()) {
        return redirect()->route('suppliers.index')
            ->with('error', 'There are items associated with this supplier. Please reassign items before deletion.');
    }

    // No associated items—safe to delete
    $supplier->delete();

    return redirect()->route('suppliers.index')
        ->with('success', 'Supplier deleted successfully!');
}

    
}
