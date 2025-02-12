<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->name,
    ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category->update([
        'name' => $request->name,
    ]);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function show(Category $category)
    {
        // Eager load related items (and optionally their relationships)
        $items = $category->items()->with(['category', 'supplier'])->get();
        return view('categories.show', compact('category', 'items'));
    }


    public function destroy(Category $category)
    {
        // Check if there are any items associated with this category
        if ($category->items()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'There are items associated with this category. Please reassign items before deletion.');
        }
    
        // No associated items—safe to delete
        $category->delete();
    
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully!');
    }
    



    
}
