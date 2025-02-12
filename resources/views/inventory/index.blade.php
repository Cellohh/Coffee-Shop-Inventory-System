@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Inventory Management</h2>

    <a href="{{ route('inventory.create') }}" class="btn btn-primary mb-3">Add / Remove Stock</a>

    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Action</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->item->name }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ ucfirst($inventory->action) }}</td>
                    <td>{{ $inventory->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
