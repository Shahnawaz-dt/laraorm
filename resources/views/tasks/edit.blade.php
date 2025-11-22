{{-- resources/views/tasks/edit.blade.php --}}
@extends('layouts.app')

@section('page-title', 'Edit Task: ' . $task->title)
@section('page-description', 'Update task details')

@section('content')
<div class="p-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('tasks.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Tasks
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Edit Task</h1>

            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Task Title *</label>
                    <input type="text" name="title" value="{{ old('title', $task->title) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                              placeholder="Optional description...">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status *</label>
                        <select name="status" required>
                            <option value="pending"      {{ old('status', $task->status ?? '') == 'pending'      ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress"  {{ old('status', $task->status ?? '') == 'in_progress'  ? 'selected' : '' }}>In Progress</option>
                            <option value="completed"    {{ old('status', $task->status ?? '') == 'completed'    ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Category *</label>
                        <select name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="pt-6 flex gap-4">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-3 px-8 rounded-lg hover:shadow-lg transform hover:scale-105 transition">
                        Update Task
                    </button>
                    <a href="{{ route('tasks.show', $task) }}" class="bg-gray-300 text-gray-800 font-medium py-3 px-8 rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection