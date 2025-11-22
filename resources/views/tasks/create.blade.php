{{-- resources/views/tasks/create.blade.php --}}
@extends('layouts.app')

@section('page-title', 'Create New Task')
@section('page-description', 'Add a new task to your list')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Create New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6 max-w-2xl">
        @csrf

        <!-- Task Title -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Task Title <span class="text-red-500">*</span></label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                   placeholder="Enter task title" required>
            @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description (Optional)</label>
            <textarea name="description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" 
                      placeholder="What is this task about?">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select name="status" required>
                        <option value="pending"      {{ old('status', $task->status ?? '') == 'pending'      ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress"  {{ old('status', $task->status ?? '') == 'in_progress'  ? 'selected' : '' }}>In Progress</option>
                        <option value="completed"    {{ old('status', $task->status ?? '') == 'completed'    ? 'selected' : '' }}>Completed</option>
                    </select>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category <span class="text-red-500">*</span></label>
                @if($categories->count())
                    <select name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                        <option value="">-- Choose Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <div class="text-red-600 font-medium">No categories available.</div>
                    <a href="{{ route('categories.create') }}" class="inline-block mt-2 bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
                        Create Category First
                    </a>
                @endif
                @error('category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4 pt-6">
            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-3 px-8 rounded-lg hover:shadow-lg transform hover:scale-105 transition">
                Create Task
            </button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 font-medium py-3 px-8 rounded-lg hover:bg-gray-400 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection