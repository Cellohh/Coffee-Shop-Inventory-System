@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" class="text-black" required>
    
        <button type="submit" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-green-600 transition">Save Category</button>
        
        <!-- Cancel Button -->
        <a href="{{ route('categories.index') }}" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-red-600 transition">Cancel</a>
    </form>
    
    
</div>
@endsection