
@extends('layouts.app')

@section('page-title', $task->title)

@section('page-description', 'Task Details')

@section('content')
<div class="p-8 lg:p-12">
    <div class="max-w-4xl mx-auto">

        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('tasks.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Tasks
            </a>
        </div>

        <!-- Task Card -->
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 border border-indigo-200 rounded-2xl p-8 lg:p-10 shadow-lg">
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-6">
                <!-- Left Side: Title + Description -->
                <div class="flex-1">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
                        {{ $task->title }}
                    </h1>

                    @if($task->description)
                        <div class="prose prose-indigo max-w-none text-gray-700 mb-6">
                            <p class="whitespace-pre-wrap text-lg leading-relaxed">
                                {{ $task->description }}
                            </p>
                        </div>
                    @else
                        <p class="text-gray-500 italic mb-6">No description provided.</p>
                    @endif

                    <!-- Meta Info -->
                    <div class="flex flex-wrap gap-6 text-sm font-medium">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600">Created:</span>
                            <span class="text-gray-800">{{ $task->created_at->format('M d, Y \a\t h:i A') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-600">Updated:</span>
                            <span class="text-gray-800">{{ $task->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Status + Category -->
                <div class="space-y-4">
                    <!-- Status Badge -->
                    <div class="text-center">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                            @if($task->status === 'Completed') bg-green-100 text-green-800
                            @elseif($task->status === 'In Progress') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ $task->status }}
                        </span>
                    </div>

                    <!-- Category Badge -->
                    <div class="bg-white rounded-xl shadow-md p-5 text-center border border-gray-200">
                        <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-1">Category</p>
                        <p class="text-xl font-bold text-indigo-700">
                            {{ $task->category?->name ?? 'Uncategorized' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-end">
                <a href="{{ route('tasks.edit', $task) }}"
                   class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H11v-.828l9.586-9.586z" />
                    </svg>
                    Edit Task
                </a>

                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this task?')"
                            class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow-md">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Task
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection