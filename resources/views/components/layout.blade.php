@extends('layouts.app')

@section('page-title', 'Welcome to TaskFlow')
@section('content')
<div class="text-center py-20">
    <h1 class="text-5xl font-extrabold text-gray-900 mb-6">
        Manage Your Tasks <span class="text-indigo-600">Effortlessly</span>
    </h1>
    <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
        Stay organized, boost productivity, and never miss a deadline again.
    </p>
    <div class="space-x-4">
        <a href="{{ route('tasks.create') }}" class="inline-block bg-indigo-600 text-white font-bold text-lg px-8 py-4 rounded-xl hover:bg-indigo-700 transform hover:scale-105 transition shadow-lg">
            Get Started
        </a>
        <a href="{{ route('tasks.index') }}" class="inline-block bg-white border-2 border-indigo-600 text-indigo-600 font-bold text-lg px-8 py-4 rounded-xl hover:bg-indigo-50 transition">
            View Tasks →
        </a>
    </div>
</div>
@endsection