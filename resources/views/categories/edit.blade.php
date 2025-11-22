{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('page-title', 'Edit Category')
@section('page-description', 'Update the category details')

@section('content')
<div class="p-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('categories.index') }}" 
               class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Categories
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Category</h1>

            <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Category Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        value="{{ old('name', $category->name) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                        placeholder="e.g., Work, Personal, Health" 
                        required>

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" 
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-3 px-8 rounded-lg hover:shadow-lg transform hover:scale-105 transition">
                        Update Category
                    </button>

                    <a href="{{ route('categories.index') }}" 
                       class="bg-gray-300 text-gray-800 font-medium py-3 px-8 rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection