@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}
                      <a class="btn btn-success" href="{{ route('product.create') }}">Create Product</a>
                    </div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }} </p>
                            </div>
                        @endif
                        <form action="{{ route('product.index') }}" method="get">
                            <label for="by_orders">Show Product without Orders</label>
                            <input name="by_order" type="checkbox" value="no_orders">
                            <input type="submit" value="Filter">
                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Ordered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }} </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->orders->count() }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                            <form class="d-inline-block" action="{{ route('product.delete', $product->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                            
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
