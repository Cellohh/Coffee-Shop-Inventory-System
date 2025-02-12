@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="bg-[#764134] p-6 rounded-lg shadow">
    <!-- Header with Title and Add Button -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-black">Categories</h1>
        <!-- Ensure there is no conditional here restricting the button -->
        <a href="{{ route('categories.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
            Add New Category
        </a>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($categories as $category)
            <div class="bg-[#ad8350] p-4 rounded-lg shadow">
                    <!-- Make the category name clickable -->
                    <a href="{{ route('categories.show', $category->id) }}" class="hover:underline text-xl font-semibold mb-2">
                        {{ $category->name }}
                    </a>
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('categories.edit', $category->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                        Edit
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                            Delete
                        </button>
                        @if(session('error'))
                            <div class="bg-red-500 text-white p-2 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="bg-green-500 text-white p-2 rounded mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
