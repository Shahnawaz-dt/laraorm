<?php

// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
class UserController extends Controller
{
// Show the form to create a new task

public function create()
{
$categories = Category::all(); // Get all categories
return view('user.create', compact('categories'));
}
// Store the new task in the database
public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'nullable|string',
'password' => 'required|string',
'category_id' => 'required|exists:categories,id',
]);
User::create($request->all()); // Store task in the database
return redirect()->route('users.index');
}
// Display all tasks
public function index()
{
$uasks = User::with('category')->get(); // Fetch all tasks with their category
return view('users.index', compact('user'));
}
// Show task details (button functionality)
public function show($id)
{
$user = User::findOrFail($id);
return view('users.show', compact('user'));
}

}