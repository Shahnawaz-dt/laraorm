
<div class="container mt-4">
    <h2>Create Task</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>

            @if($categories->count())
                <select name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            @else
                <p class="text-danger">No categories found.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Add Task</button>
    </form>
</div>
