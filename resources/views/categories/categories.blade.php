<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>

<h2>Create Category</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label for="name">Category Name:</label>
    <input type="text" name="name" required>

    <button type="submit">Save</button>
</form>

</body>
</html>
