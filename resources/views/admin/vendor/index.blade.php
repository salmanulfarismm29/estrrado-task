@extends('layouts.admin')
@section('title', 'All Vendors')
@section('content')
    <div class="container">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="d-flex flex-row-fluid flex-center bg-body rounded">
                    <div class="container">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">List of Vendors</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            @if (session('success'))
                                <div class="alert alert-success" id="successFlashMsg"> {{ session('success') }} </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger"> {{ session('success') }} </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th>Si NO</th>
                                            <th>Vendor Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendors as $vendor)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            {{ $loop->iteration }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $vendor->vendor_name }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('vendors.edit', $vendor->id) }}"><button type="button" class="btn btn-warning text-dark">Edit</button></a>
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
        </div>
    </div>
@endsection
