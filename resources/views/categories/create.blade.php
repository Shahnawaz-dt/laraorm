<!-- resources/views/categories/create.blade.php -->
@extends('layouts.app')

@section('page-title', 'Create New Category')
@section('page-description', 'Add a new category to organize your tasks')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                Category Name <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="name" 
                   id="name"
                   value="{{ old('name') }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                   placeholder="e.g., Work, Personal, Shopping" 
                   required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" 
                    class="bg-indigo-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-indigo-700 transition">
                Create Category
            </button>
            <a href="{{ route('categories.index') }}" 
               class="bg-gray-300 text-gray-800 font-medium py-3 px-8 rounded-lg hover:bg-gray-400 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection