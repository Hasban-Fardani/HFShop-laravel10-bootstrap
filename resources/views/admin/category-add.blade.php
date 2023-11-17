@extends('layouts.admin')
@section('title', 'Add Category')

@section('content')
  <form action="{{route('admin.products.store')}}" method="POST">
    <label for="name" class="label-form">Name</label>
    <input type="text" name="name" id="name" class="form-control">
    <label for="description" class="label-form">Description</label>
    <textarea name="description" id="description" cols="30" rows="7" class="form-control"></textarea>

    <button type="submit" class="btn btn-primary my-3 mb-4">Submit</button>
  </form>
@endsection