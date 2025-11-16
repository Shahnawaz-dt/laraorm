<table>
<thead>
<tr>
<th>Task Title</th>
<th>Category</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($tasks as $task)
<tr>
<td>{{ $task->title }}</td>
<td>{{ $task->category->name }}</td>
<td>{{ $task->status }}</td>
<td><a href="{{ route('tasks.show', $task->id) }}">View Details</a></td>
</tr>
@endforeach
</tbody>
</table>