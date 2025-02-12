<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Item;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('item')->get();
        return view('inventory.index', compact('inventories'));
    }

    public function create()
    {
        $items = Item::all();
        return view('inventory.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'action' => 'required|in:add,remove',
            'item_name' => 'required|string', // Add this if needed
        ]);

        $item = Item::find($request->item_id);

        if ($request->action == 'add') {
            $item->stock += $request->quantity;
        } else {
            if ($item->stock < $request->quantity) {
                return back()->withErrors(['quantity' => 'Not enough stock available.']);
            }
            $item->stock -= $request->quantity;
        }

        $item->save();

        Inventory::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'action' => $request->action,
            'item_name' => $request->item_name, // Ensure this is included
        ]);

        return redirect()->route('inventory.index')->with('success', 'Inventory updated!');
    }
}
