{{-- resources/views/tasks/index.blade.php --}}
@extends('layouts.app')

@section('page-title', 'All Tasks')
@section('page-description', 'View and manage all your tasks')

@section('content')
<div class="p-8">
    <!-- Header: Title + Create Button -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 mb-10">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900">All Tasks</h1>
            <p class="text-gray-600 mt-2">You have {{ $tasks->count() }} task{{ $tasks->count() !== 1 ? 's' : '' }}</p>
        </div>
        <a href="{{ route('tasks.create') }}"
           class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            New Task
        </a>
    </div>

    <!-- Tasks Table (Beautiful & Responsive) -->
    @if($tasks->count() > 0)
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Task Title</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($tasks as $task)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-5">
                                    <a href="{{ route('tasks.show', $task) }}" class="text-lg font-semibold text-indigo-600 hover:text-indigo-800 hover:underline">
                                        {{ Str::limit($task->title, 50) }}
                                    </a>
                                    @if($task->description)
                                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($task->description, 80) }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                        {{ $task->category?->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold
                                        @if($task->status === 'Completed') bg-green-100 text-green-800
                                        @elseif($task->status === 'In Progress') bg-yellow-100 text-yellow-800
                                        @else bg-gray-100 text-gray-700 @endif">
                                        {{ $task->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center space-x-4">
                                    <a href="{{ route('tasks.show', $task) }}"
                                       class="text-indigo-600 hover:text-indigo-800 font-medium">View</a>
                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Delete this task?')"
                                                class="text-red-600 hover:text-red-800 font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

      
    @else
        <!-- Empty State -->
        <div class="text-center py-20 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
            <svg class="w-20 h-20 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">No tasks yet!</h3>
            <p class="text-gray-600 mb-8">Get started by creating your first task.</p>
            <a href="{{ route('tasks.create') }}"
               class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                Create Your First Task
            </a>
        </div>
    @endif
</div>
@endsection