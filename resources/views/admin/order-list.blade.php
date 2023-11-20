@extends('layouts.admin')
@section('title', 'Orders List')
@section('content')
  <table class="table-bordered table" id="dataTable" width="" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>User</th>
        <th>Quantity</th>
        <th>Order At</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td><img src="{{ $order->product->image }}" alt="{{ $order->product->image }}" width="50"></td>
        <td>{{ $order->user->name }}</td>
        <td>{{ $order->quantity }}</td>
        <td>{{ $order->created_at }}</td>
        <td>{{ $order->status }}</td>
        <td>
          <div>
            <div class="d-flex">
              <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-primary ml-2">
                @include('icons.view')
              </a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection