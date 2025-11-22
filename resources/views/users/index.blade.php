<table>
<thead>
<tr>
<th>User Name</th>
<th>Email</th>
<th>Password</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->eamil }}</td>
<td>{{ $user->password }}</td>
<td><a href="{{ route('users.show', $user->id) }}">View Details</a></td>
</tr>
@endforeach
</tbody>
</table>