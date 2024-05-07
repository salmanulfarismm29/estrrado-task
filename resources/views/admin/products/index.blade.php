@extends('layouts.admin')
@section('title', 'All Products')
@section('content')
    <div class="container">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="d-flex flex-row-fluid flex-center bg-body rounded">
                    <div class="container">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">List of Products</span>
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
                                            <th>Product Name</th>
                                            <th>Product Discription</th>
                                            <th>Product Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        <div class="d-flex justify-content-start flex-column">
                                                            {{ $loop->iteration }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $product->product_name }}
                                                </td>
                                                <td>
                                                    {{ $product->product_discription }}
                                                </td>
                                                <td>
                                                    @if ($product->product_image)
                                                        <img src="{{ asset('storage/images/product_image/' . $product->product_image) }}" alt="product-image" width="100px">
                                                    @else
                                                        No Image!
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#"
                                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </a>

                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="dropdown-item">Delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
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
