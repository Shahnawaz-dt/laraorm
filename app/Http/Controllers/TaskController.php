<?php


// app/Http/Controllers/TaskController.php
namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
class TaskController extends Controller
{
// Show the form to create a new task

public function create()
{
$categories = Category::all(); // Get all categories
return view('tasks.create', compact('categories'));
}
// Store the new task in the database
public function store(Request $request)
{
$request->validate([
'title' => 'required|string|max:255',
'description' => 'nullable|string',
'status' => 'required|string',
'category_id' => 'required|exists:categories,id',
]);
Task::create($request->all()); // Store task in the database
return redirect()->route('tasks.index');
}
// Display all tasks
public function index()
{
$tasks = Task::with('category')->get(); // Fetch all tasks with their category
return view('tasks.index', compact('tasks'));
}
// Show task details (button functionality)
public function show($id)
{
$task = Task::findOrFail($id);
return view('tasks.show', compact('task'));
}

}