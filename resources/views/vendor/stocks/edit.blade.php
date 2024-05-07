@extends('layouts.vendor')
@section('title', 'Edit Stock')
@section('content')
    <style>

    </style>
    <div class="container">
        <div class="card mb-5 mb-xl-10 edit-profile" id="kt_profile_details_view">
            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Edit Vendor</h3>

                    <span></span>
                </div>
            </div>
            <div class="card-body p-8 bg-secondary profile-edit-card-body">
                <form action="{{ route('stocks.update',$stock->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-unmuted">Product Name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800"><select name="product" data-control="select" data-placeholder="Select Product" class="form-select form-select-solid">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option {{ $product->id == $stock->product_id? 'selected' : '' }} value="{{ $product->id }}">{{$product->product_name}}</option>
                                @endforeach

                            </select></span>
                        </div>
                        @error('product')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-unmuted">Stock</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800"><input type="text"
                                    class="required form-control form-control-solid" placeholder=""
                                    name="stock" value="{{ $stock->stock }}" /></span>
                        </div>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-7">
                        <button class="btn btn-primary align-self-center" type="submit">Update Stock</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
