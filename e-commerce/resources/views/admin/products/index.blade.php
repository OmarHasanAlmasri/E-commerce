@extends('layouts.admin')

@section('page-content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Products</h3>

                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        Create Product
                    </a>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card p-4">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
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
@endsection
