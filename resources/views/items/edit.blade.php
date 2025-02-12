@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Item Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" name="name" class="form-control text-black" value="{{ $item->name }}" required>
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control text-black" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Supplier -->
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" class="form-control text-black" required>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $item->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price for Customers -->
        <div class="mb-3">
            <label for="price" class="form-label">Price for Customers</label>
            <input type="number" step="0.01" name="price" class="form-control text-black" value="{{ $item->price }}" required>
        </div>

        <!-- Price We Paid -->
        <div class="mb-3">
            <label for="price_paid" class="form-label">Price We Paid</label>
            <input type="number" step="0.01" name="price_paid" class="form-control text-black" value="{{ $item->price_paid }}">
        </div>

        <!-- Stock Quantity -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock Quantity</label>
            <input type="number" name="stock" class="form-control text-black" value="{{ $item->stock }}" required>
        </div>

        <button type="submit" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Update Item
        </button>
        <a href="{{ route('items.index') }}" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-red-600 transition">
            Cancel
        </a>
    </form>
</div>
@endsection
