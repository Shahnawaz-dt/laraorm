
@extends('layouts.app')

@section('page-title', 'All Categories')
@section('page-description', 'Manage your task categories')

@section('content')
<div class="p-8">
    <div class="max-w-5xl mx-auto">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-10">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900">Categories</h1>
                <p class="text-gray-600 mt-2">You have {{ $categories->count() }} categor{{ $categories->count() !== 1 ? 'ies' : 'y' }}</p>
            </div>
            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Category
            </a>
        </div>

        <!-- Categories Grid / List -->
        @if($categories->count() > 0)
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($categories as $category)
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition transform hover:-translate-y-1">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-gray-800">
                                {{ $category->name }}
                            </h3>
                            <span class="text-sm text-gray-500">
                                {{ $category->tasks_count ?? $category->tasks()->count() }} task{{ ($category->tasks_count ?? $category->tasks()->count()) !== 1 ? 's' : '' }}
                            </span>
                        </div>

                        @if($category->description)
                            <p class="text-gray-600 text-sm mb-6">{{ Str::limit($category->description, 100) }}</p>
                        @else
                            <p class="text-gray-400 italic text-sm mb-6">No description</p>
                        @endif

                        <div class="flex gap-3">
                            <a href="{{ route('categories.show', $category) }}"
                               class="flex-1 text-center bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition font-medium text-sm">
                                View
                            </a>
                            <a href="{{ route('categories.edit', $category) }}"
                               class="flex-1 text-center bg-gray-200 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-300 transition font-medium text-sm">
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete category \"{{ addslashes($category->name) }}\"? Tasks will become uncategorized.')"
                                        class="flex-1 bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition font-medium text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
                <svg class="w-20 h-20 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">No categories yet</h3>
                <p class="text-gray-600 mb-8">Create your first category to organize tasks better.</p>
                <a href="{{ route('categories.create') }}"
                   class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                    Create First Category
                </a>
            </div>
        @endif
    </div>
</div>
@endsection