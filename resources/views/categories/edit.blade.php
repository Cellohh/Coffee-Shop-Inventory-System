@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control text-black" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Update Category
        </button>
        <a href="{{ route('categories.index') }}" class="bg-[#AD8350] text-white px-4 py-2 rounded hover:bg-red-600 transition">
            Cancel
        </a>
    </form>
</div>
@endsection
