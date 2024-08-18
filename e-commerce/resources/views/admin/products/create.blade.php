@extends('layouts.admin')

@section('page-content')
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create New Product</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                           placeholder="Product name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                <textarea class="form-control" name="description"
                                          placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                           placeholder="Product price">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="number" class="form-control" name="qty" value="{{ old('qty') }}"
                                           placeholder="Product quantity">
                                    @error('qty')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-3 me-3">
                                        Back
                                    </a>
                                    <button class="btn btn-primary px-3">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
