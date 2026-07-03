@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2>Edit Category</h2>

<form
action="{{ route('categories.update',$category) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
value="{{ $category->name }}"
class="form-control">

</div>

<button
class="btn-primary-custom">

Update

</button>

</form>

</div>

@endsection