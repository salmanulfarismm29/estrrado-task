@extends('layouts.vendor')
@section('title', 'Edit Vendor')
@section('content')
<style>

</style>
<div class="container">
    <div class="card mb-5 mb-xl-10 edit-profile" id="kt_profile_details_view">
        <div class="card-header cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Edit Product</h3>
                <span></span>
            </div>
        </div>
        <div class="card-body p-8 bg-secondary profile-edit-card-body">
            <form action="{{ route('vendor-product.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-unmuted">Product Name</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800"><input type="text"
                                class="required form-control form-control-solid " placeholder=""
                                name="product_name" value="{{ $product->product_name }}" /></span>
                    </div>
                    @error('product_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-unmuted">Product Discription</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">
                                <textarea class="required form-control form-control-solid" name="product_desc">{{ $product->product_discription }}</textarea>
                            </span>
                    </div>
                    @error('product_desc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-unmuted">Product Image</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800"><input type="file"
                                class="required form-control form-control-solid" placeholder=""
                                name="image" /></span>
                    </div>
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if ($product->product_image)
                                                <div class="col-md-6 mb-3">
                                                    <div class="w-100">
                                                        <img src="{{ $product->product_image }}" alt="Image">
                                                    </div>
                                                </div>
                                            @endif
                <div class="col mb-7">
                    <button class="btn btn-primary align-self-centern" type="submit">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
