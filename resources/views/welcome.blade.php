<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My App</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    {{-- Navbar (optional) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                My App
            </a>
            <a href="{{ route('categories.index') }}" class="nav-link text-white">
                Categories
            </a>
            <a href="{{ route('tasks.create') }}" class="nav-link text-white">
                Tasks
            </a>
            
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    


    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
