@extends('layouts.admin')
@section('title', 'Add Product')

@section('back')
  <a href="{{ route('admin.products.index') }}" class="btn btn-primary ml-2">Back</a>
@endsection

@section('content')
  <div class="container">
    <form action="{{ route('admin.products.store') }}" method="post" class="mb-3" enctype="multipart/form-data">
      @csrf
      <label for="name" class="form-label">Name</label>
      <input name="name" type="text" class="form-control" required>

      <label for="category_id" class="form-label">Category</label>
      <select name="category_id" class="form-select form-control" aria-label="Default select example">
        @if ($categories)
          <option value="" disabled selected>Please Select a Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        @else
          <option value="" disabled selected>You no have Category, please create one</option>
        @endif
      </select>

      <label for="description" class="form-label">Description</label>
      <textarea name="description" cols="30" rows="7" class="form-control" required></textarea>

      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" class="form-control" required>

      <label for="image" class="form-label">Image</label>
      <br>
      <input type="file" name="image" id="image" required>

      <br>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection
