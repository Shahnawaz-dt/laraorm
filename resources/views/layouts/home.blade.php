{{-- resources/views/layouts/home.blade.php --}}
@extends('layouts.app')

@section('page-title', 'TaskFlow – Manage Your Tasks')

@section('content')
<div class="text-center py-20 px-6">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 mb-6">
        Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">TaskFlow</span>
    </h1>
    <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto">
        Organize your day, track progress, and achieve more — all in one beautiful place.
    </p>

    <div class="flex flex-col sm:flex-row gap-6 justify-center">
        <a href="{{ route('tasks.create') }}"
           class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-lg px-10 py-4 rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition">
            Create Your First Task
        </a>
        <a href="{{ route('tasks.index') }}"
           class="bg-white border-2 border-indigo-600 text-indigo-600 font-bold text-lg px-10 py-4 rounded-xl hover:bg-indigo-50 transition">
            View All Tasks →
        </a>

        <a href="{{ route('categories.create') }}" 
            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-lg px-10 py-4 rounded-xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition">
                    Create Category First
                    </a>

    </div>
</div>
@endsection