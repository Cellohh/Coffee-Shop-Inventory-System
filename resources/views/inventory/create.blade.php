@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Update Inventory</h2>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="item_id" class="form-label">Select Item:</label>
            <select name="item_id" id="item_id" class="form-control" required>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} (Stock: {{ $item->stock }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label for="action" class="form-label">Action:</label>
            <select name="action" id="action" class="form-control" required>
                <option value="add">Add Stock</option>
                <option value="remove">Remove Stock</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Inventory</button>
    </form>
</div>
@endsection
