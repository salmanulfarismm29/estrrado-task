@extends('layouts.vendor')
@section('title', 'Add Stock')
@section('content')
    <style>

    </style>
    <div class="container">
        <div class="card mb-5 mb-xl-10 edit-profile" id="kt_profile_details_view">
            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Add Vendor</h3>

                    <span></span>
                </div>
            </div>
            <div class="card-body p-8 bg-secondary profile-edit-card-body">
                <form action="{{ route('vendor-stock.store') }}" method="POST">
                    @csrf
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-unmuted">Product Name</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-gray-800"><select name="product" data-control="select" data-placeholder="Select Product" class="form-select form-select-solid">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{$product->product_name}}</option>
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
                                    name="stock" /></span>
                        </div>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-7">
                        <button class="btn btn-primary align-self-center" type="submit">Add Stock</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
