{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title', 'TaskFlow - Your Task Manager')</title>

    <!-- Tailwind CSS via CDN (perfect for development + looks amazing) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">TF</span>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">TaskFlow</span>
                    </a>
                </div>

                <div class="flex items-center space-x-6">
                    <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition">
                        All Tasks
                    </a>
                    <a href="{{ route('tasks.create') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-xl transform hover:scale-105 transition">
                        + New Task
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Page Heading (only show on inner pages) -->
        @if(request()->routeIs('tasks.*') && !request()->routeIs('home'))
            <div class="mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900">@yield('page-title')</h1>
              
            </div>
        @endif

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg flex items-center">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Main Content -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-10 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} TaskFlow. Made with <span class="text-red-500">♥</span> for productivity.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>