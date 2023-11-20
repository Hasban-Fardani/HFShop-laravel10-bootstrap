@extends('layouts.admin')

@section('title', 'Promo List')

@section('content')
  {{-- <table class="table-bordered table" id="dataTable" width="" cellspacing="0">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Create At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td><img src="{{ $product->image }}" alt="{{ $product->name }}" width="50"></td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td><a href="{{ route('admin.categories.show', $product->category->id) }}">{{ $product->category->name }}</a></td>
        <td>{{ $product->created_at }}</td>
        <td>
          <div>
            <div class="d-flex">
              <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary">
                @include('icons.view')
              </a>
              <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning ml-2">
                @include('icons.pen')
              </a>
              <form action="{{route('admin.products.destroy', $product->id)}}" method="post" onsubmit="confirmDelete('{{$product->name}}')" class="ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                  @include('icons.xmark')
                </button>
              </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table> --}}
@endsection
@section('custom_js')
  <script>
    function confirmDelete(name) {
      let ans = confirm("Are you sure to delete " + name + " ?");
      if (!ans) {
        event.preventDefault();
      }
    }
  </script>
@endsection
