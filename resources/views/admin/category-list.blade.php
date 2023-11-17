@extends('layouts.admin')
@section('title', 'Category List')

@section('content')
  <table class="table-bordered table" id="dataTable" cellspacing="0">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td>{{$category->description}}</td>
          <td>{{$category->created_at}}</td>
          <td>
            <div class="d-flex">
              <a href="" class="btn btn-primary">
                @include('icons.view')
              </a>
              <a href="" class="btn btn-warning ml-2">
                @include('icons.pen')
              </a>
              <form action="{{route('admin.products.destroy', $category->id)}}" method="post" onsubmit="confirmDelete('{{$category->name}}')" class="ml-2">
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
  </table>
@endsection
@section('custom_js')
  <script>
    function confirmDelete(name){
      let ans = confirm("Are you sure to delete " + name + " ?" );
      if (!ans) {
        event.preventDefault();
      }
    }
  </script>
@endsection
