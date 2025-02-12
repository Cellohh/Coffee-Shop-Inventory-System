<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
{
    // Retrieve items with related category and supplier, ordered by the latest created first
    $items = \App\Models\Item::with(['category', 'supplier'])
                ->latest() // This orders by the 'created_at' column in descending order
                ->paginate(9); // If you want pagination, otherwise use ->get()

    return view('items.index', compact('items'));
}

    public function create()
    {
        // Retrieve all categories and suppliers
        $categories = \App\Models\Category::all();
        $suppliers  = \App\Models\Supplier::all();
    
        // Pass them to the view using compact()
        return view('items.create', compact('categories', 'suppliers'));
    }
    
    public function edit(Item $item)
    {
        // Retrieve all categories and suppliers
        $categories = \App\Models\Category::all();
        $suppliers  = \App\Models\Supplier::all();

        // Pass the item, categories, and suppliers to the edit view
        return view('items.edit', compact('item', 'categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price'       => 'required|numeric',
            'price_paid'  => 'nullable|numeric',
            'stock'       => 'required|integer',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price'       => 'required|numeric',
            'price_paid'  => 'nullable|numeric',
            'stock'       => 'required|integer',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Item updated successfully!');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
