
@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <title>View Category</title>
</head>
<body>

<h2>Category Details</h2>

<p><strong>ID:</strong> {{ $category->id }}</p>
<p><strong>Name:</strong> {{ $category->name }}</p>

<a href="{{ route('categories.index') }}">← Back to Categories List</a>

</body>
</html>
