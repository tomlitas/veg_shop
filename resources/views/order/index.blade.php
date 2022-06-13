@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Order') }}
                        <a class="btn btn-success" href="{{ route('order/create') }} ">Create new order</a>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }} </p>
                            </div>
                        @endif
                        @if(auth()->user()->role_id == 1)
                        <form action="{{ route('order.index') }}" method="get">
                            <label for="orders">Show All Orders</label>
                            <input name="orders" type="checkbox" value="all_orders">
                            <input type="submit" value="Filter">
                        </form>
                        @endif
                    
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Products</th>
                                    <th>Order amount</th>
                                    <th>Order create</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }} </td>
                                        <td>
                                            @foreach ($order->products as $product)
                                                {{ $product->name }},
                                            @endforeach
                                        </td>
                                        <td>{{ $order->order_amount }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('order.edit', $product->id) }}">Edit</a>
                                            @if(auth()->user()->role_id == 1)
                                            <form class="d-inline-block" action="{{ route('order.delete', $order->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
