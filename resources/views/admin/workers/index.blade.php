@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Manage Workers

</h2>

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($workers as $worker)

<tr>

<td>

{{ $worker->id }}

</td>

<td>

{{ $worker->name }}

</td>

<td>

{{ $worker->email }}

</td>

<td>

<form
action="{{ route('admin.workers.destroy',$worker->id) }}"
method="POST">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this worker?')">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection