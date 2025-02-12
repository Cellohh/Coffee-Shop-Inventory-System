@extends('layouts.app')

@section('title', 'Category: ' . $category->name)

@section('content')
<div class="container mx-auto">
    <div class="bg-[#764134] p-6 rounded-lg shadow">
        <!-- Header with Category Name and Back Button -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-black">Category: {{ $category->name }}</h1>
            <a href="{{ route('categories.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Back to Categories
            </a>
        </div>

        <!-- Items Grid for This Category -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @forelse ($items as $item)
                <div class="bg-[#ad8350] p-4 rounded-lg shadow relative">
                    <!-- Optional: Last updated timestamp -->
                    <div class="absolute top-0 right-0 mt-2 mr-2 text-xs text-gray-700 bg-white bg-opacity-70 px-1 rounded">
                        Last updated: {{ $item->updated_at->format('m-d-Y g:i A') }}
                    </div>
                    <h2 class="text-xl font-semibold mb-2">{{ $item->name }}</h2>
                    <p class="mb-1"><strong>Supplier:</strong> {{ $item->supplier->name ?? 'No Supplier' }}</p>
                    <p class="mb-1"><strong>Price for Customers:</strong> ${{ number_format($item->price, 2) }}</p>
                    <p class="mb-1">
                        <strong>Price We Paid:</strong>
                        @if($item->price_paid)
                            ${{ number_format($item->price_paid, 2) }}
                        @else
                            N/A
                        @endif
                    </p>
                    <p class="mb-3"><strong>Stock:</strong> {{ $item->stock }}</p>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('items.edit', $item->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="bg-[#ad8350] text-center text-white">No items found for this category.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
