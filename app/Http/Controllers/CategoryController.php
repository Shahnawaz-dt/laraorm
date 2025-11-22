<?php
// app/Http/Controllers/CategoryController.php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
// List all categories
public function index()
{
$categories = Category::all();
return view('categories.index', compact('categories'));
}
// Create a new category (optional)

public function create()
{
return view('categories.create');
}

public function store(Request $request)
{
// $request->validate([
// 'name' => 'required|string|max:255',
// ]);
// Category::create($request->validated()); // Store category

// return redirect()->route('categories.index');
  // Validate input and get validated data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Create category using validated data
    Category::create($validated);

    return redirect()->route('categories.index')
                     ->with('success', 'Category created successfully!');
}

public function show(Category $category)
{

return view('categories.show', compact('category'));
}

public function edit(Category $category)
{
    $categories = Category::all();

    return view('Categories.edit', compact('category', 'categories'));
}

// 2. Update the task in database
    public function update(Request $request, Category $category)
{
    $request->validate([
        'name'       => 'required|string|max:255',
 
    ]);

    $category->update($request->all());

    return redirect()
           ->route('categories.index')
           ->with('success', 'Category updated successfully!');
}
public function destroy(Category $category)
{
    // Optional: Add authorization if you want only the owner to delete
    // $this->authorize('delete', $task);

    $category->delete();

    return redirect()
           ->route('categories.index')
           ->with('success', 'Category deleted successfully!');
}
}