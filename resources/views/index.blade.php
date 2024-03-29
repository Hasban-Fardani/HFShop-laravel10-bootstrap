@extends('layouts.app')

@section('content')
  <div class="position-relative p-md-5 m-md-3 bg-body-tertiary overflow-hidden p-3 text-center" id="header">
    <div class="col-md-6 p-lg-5 bg-dark mx-auto my-5" id="header-content">
      <h1 class="display-3 fw-bold">Programmer Swags</h1>
      <h3 class="fw-normal text-muted mb-3">Buy anything about programmer like accessories, T-shirt, thumbler and etc</h3>
      <div class="d-flex justify-content-center lead fw-normal gap-3">
        <a class="icon-link" href="{{ route('about') }}">
          About
          <svg class="bi">
            <use xlink:href="#chevron-right" />
          </svg>
        </a>
        <a class="icon-link" href="{{ route('products') }}">
          Buy
          <svg class="bi">
            <use xlink:href="#chevron-right" />
          </svg>
        </a>
      </div>
    </div>
    {{-- <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div> --}}
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="text-bg-dark me-md-3 pt-md-5 px-md-5 overflow-hidden px-3 pt-3 text-center">
      <a href="{{route('products', ['category' => 'T-Shirt'])}}" class="text-decoration-none text-white link-category">
        <div class="my-3 py-3">
          <h2 class="display-5">T-Shirt</h2>
          <p class="lead">Tell everyone you're programmer</p>
        </div>
        <div class="bg-body-tertiary mx-auto shadow-sm" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="{{ asset('assets/images/products/programmer-meme-tshirt3-ex.jpeg') }}" alt="tshirt"
            class="bg-body-tertiary mx-auto shadow-sm" style="border-radius: 21px 21px 0 0;">
        </div>
      </a>
    </div>
    <div class="bg-body-tertiary me-md-3 pt-md-5 px-md-5 overflow-hidden px-3 pt-3 text-center">
      <a href="{{route('products', ['category' => 'Sticker'])}}" class="text-decoration-none text-white link-category">
        <div class="my-3 p-3">
          <h2 class="display-5">Stickers</h2>
          <p class="lead">Cool stikers made your laptop like a pro</p>
        </div>
        <div class="bg-dark mx-auto shadow-sm" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="{{ asset('assets/images/products/stickers.jpeg') }}" alt="stickers"
            class="bg-body-tertiary mx-auto shadow-sm" style="border-radius: 21px 21px 0 0;">
        </div>
      </a>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div class="bg-body-tertiary me-md-3 pt-md-5 px-md-5 overflow-hidden px-3 pt-3 text-center">
      <a href="{{route('products', ['category' => 'headset'])}}" class="text-decoration-none text-white link-category">
        <div class="my-3 p-3">
          <h2 class="display-5">Headset</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="mx-auto shadow-sm" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="{{ asset('assets/images/products/headset-ex.jpg') }}" alt="headset"
            class="bg-body-tertiary mx-auto shadow-sm" style="border-radius: 21px 21px 0 0; max-width: 300px">
        </div>
      </a>
    </div>
    <div class="me-md-3 pt-md-5 px-md-5 overflow-hidden px-3 pt-3 text-center">
      <a href="{{route('products', ['category' => 'other'])}}" class="text-decoration-none text-white link-category">
        <div class="my-3 py-3">
          <h2 class="display-5">Other</h2>
          <p class="lead">And an even wittier subheading.</p>
        </div>
        <div class="mx-auto shadow-sm" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
          <img src="{{ asset('assets/images/products/swag-cloud-ex.JPG') }}" alt=""
            class="bg-body-tertiary mx-auto shadow-sm"
            style="border-radius: 21px 21px 0 0 ; height:300px;object-fit:cover;max-width: 400px">
        </div>
      </a>
    </div>
  </div>
@endsection
@section('custom_css')
  <style>
    #header {
      background-image: url('{{ asset('assets/images/products/anythingaboutprogrammer.png') }}');
      object-fit: cover;
      background-size: 100%;
    }

    #header-content {
      filter: opacity(0.95);
      border-radius: 30px;
    }

    /* Select the container element */
    /* .link-category:hover {
      color: rgb(143, 143, 143) !important;
    } */

  </style>
@endsection
