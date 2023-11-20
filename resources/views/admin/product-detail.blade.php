@extends('layouts.admin')

@section('title', 'Detail Product')

@section('back')
    <a href="{{route('admin.products.index')}}" class="btn btn-outline-primary ml-2">Back</a>  
@endsection

@section('content')
  <div class="card">
    <div class="card-body d-flex flex-column">
        <div class="d-flex justify-content-center mb-2">
          <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-25">
        </div>
        <h4>Name</h4>
        <p>{{ $product->name }}</p>
        <h4>Category</h4>
        <p>{{ $product->category->name }}</p>
        <h4>Price</h4>
        <p>Rp. {{ number_format($product->price)  }}</p>
    </div>
  </div>
@endsection