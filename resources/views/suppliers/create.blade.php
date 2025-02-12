@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Supplier Name</label>
            <input type="text" name="name" class="form-control text-black" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control text-black" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control text-black" required>
        </div>

        <!-- New Account # Field -->
        <div class="mb-3">
            <label for="account_number" class="form-label">Account #</label>
            <input type="text" name="account_number" class="form-control text-black">
        </div>

        <button type="submit" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-green-600 transition">Save Supplier</button>
        <a href="{{ route('suppliers.index') }}" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-red-600 transition">Cancel</a>
    </form>
</div>
@endsection
