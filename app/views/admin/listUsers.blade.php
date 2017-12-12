@extends('layouts.home')

@section('title')
	User list
@stop

@section('content')
<div class="container">
<h1>Users</h1>

<table class="table">
	<tr>
		<th>#</th>
		<th>username</th>
		<th>email</th>
		<th>Opdateret</th>
		<th>Oprettet</th>
		<th>Ret</th>
		<th>Slet</th>
		
	</tr>
	@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->updated_at }}</td>
			<td>{{ $user->created_at }}</td>
			<td><a href="/admin/editUser/{{ $user->id  }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/deleteUser/{{ $user->id  }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach

</table>

</div>
@stop