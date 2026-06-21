@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Users

</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<table class="table table-bordered">

<thead>

<tr>

<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($users as $user)

<tr>

<td>

{{ $user->name }}

</td>

<td>

{{ $user->email }}

</td>

<td>

{{ ucfirst($user->role) }}

</td>

<td>

@if($user->status)

<span class="badge bg-success">

Active

</span>

@else

<span class="badge bg-danger">

Inactive

</span>

@endif

</td>

<td>

<form
action="{{ route('admin.users.status',$user) }}"
method="POST"
style="display:inline">

@csrf
@method('PATCH')

<button
class="btn btn-warning btn-sm">

Toggle Status

</button>

</form>

<form
action="{{ route('admin.users.destroy',$user) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

{{ $users->links() }}

</div>

@endsection