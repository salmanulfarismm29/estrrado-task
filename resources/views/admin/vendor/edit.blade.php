@extends('layouts.admin')
@section('title', 'Edit Vendor')
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
            <form action="{{ route('vendors.update',$vendor->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-unmuted">Vendor Name</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800"><input type="text"
                                class="required form-control form-control-solid " placeholder="" name="vendor_name" value="{{ $vendor->vendor_name }}"/></span>
                    </div>
                    @error('vendor_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-unmuted">Email</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800"><input type="text"
                                class="required form-control form-control-solid " placeholder="" name="vendor_email" value="{{ $user->email }}"/></span>
                    </div>
                    @error('vendor_email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="col mb-7">
                    <button class="btn btn-primary align-self-centern" type="submit">Update Vendor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
