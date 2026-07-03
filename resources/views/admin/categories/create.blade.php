@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2>Add Category</h2>

<form
action="{{ route('categories.store') }}"
method="POST">

@csrf

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control">

</div>

<button
class="btn-success-custom">

Save

</button>

</form>

</div>

@endsection