@extends('layouts.app')

@section('content')
  <div class="d-flex flex-column flex-md-row mr-5 mt-3 justify-content-center">
    <div class="d-md-flex flex-column text-bg-dark flex-shrink-0 p-3 mb-3" style="width: 200px;">
      <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-decoration-none mb-3 text-white">
        <svg class="bi pe-none me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-5">Filter</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#speedometer2" />
            </svg>
            Categories
          </a>
          <div class="">
            <label>
            <input type="checkbox" name="category" id="category" value="all">
            All
            </label>
            @foreach ($categories as $category)
              <label>
                <input type="checkbox" name="category" id="category" value="{{ $category->id }}">
                {{ $category->name }}
              </label>
            @endforeach
          </div>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#table" />
            </svg>
            Rating
          </a>
          <div>
            <input type="number" name="" id="" class="input-filter" min="1" max="5"
              step="0.1" value="4.9">
          </div>
        </li>
        <li>
          <a href="#" class="nav-link text-white">
            <svg class="bi pe-none me-2" width="16" height="16">
              <use xlink:href="#grid" />
            </svg>
            Price
          </a>
          <div>
            <label>
              min
              <input type="number" name="" id="" class="input-filter">
            </label>
            <label>
              max
              <input type="number" name="" id="" class="input-filter">
            </label>
          </div>
        </li>
      </ul>
    </div>
    <div class="container-fluid px-3">
      <h2>Our Products</h2>
      <div class="d-flex flex-wrap gap-2">
        @foreach ($products as $product)
          <div class="card ml-1" style="width: 200px;">
            <img src="{{asset($product->image)}}" class="card-img-top" alt="{{$product->name}} image" width="200px" height="200px">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ $product->description }}</p>
              <div class="">
                <a href="{{route('products.show', $product->id )}}" class="btn btn-primary">Detail</a>
                {{-- <a href="#" class="px-3">@include('icons.cart')</a> --}}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('custom_css')
  <style>
    .input-filter {
      width: 170px;
    }
  </style>
@endsection
