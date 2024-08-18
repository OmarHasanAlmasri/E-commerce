@extends('layouts.app')

@section('page-content')
    <div class="container py-5">
        <h1 class="mb-5">Products Page</h1>

        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-lg-3">
                    <div class="card">
                        @if($product->image)
                            <img src="{{ asset("images/$product->image") }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img
                                src="https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/iphone-15-finish-select-202309-6-1inch_FMT_WHH?wid=1280&hei=492&fmt=p-jpg&qlt=80&.v=1692925261454"
                                class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>{{ $product->price }} JOD</span>
                                <span>Quantity: {{ $product->qty }}</span>
                            </div>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $products->links() }}
        </div>
    </div>
@endsection
