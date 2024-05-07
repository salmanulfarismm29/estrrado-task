@extends('layouts.admin')
@section('title','Admin-dashboard')
@section('content')

<div class="row g-6 g-xl-9">
    <!--begin::Col-->
    <div class="col-sm-6 col-xl-4">
        <!--begin::Card-->
        <div class="card h-100">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <!--begin::Icon-->
                    <div class="symbol symbol-45px w-45px me-5">
                        <i class="bi bi-person fs-2"></i>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Vendors</a>
                    <!--end::Title-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                        <!--begin::Heading-->

                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu 3-->
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                <!--begin::Heading-->
                <div class="fs-2tx fw-bolder mb-3">113</div>

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>

    <div class="col-sm-6 col-xl-4">
        <!--begin::Card-->
        <div class="card h-100 dashboard-card ">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9 dashboard-card-header">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <!--begin::Icon-->
                    <div class="symbol symbol-45px w-45px me-5">
                        <i class="bi bi-grid fs-2"></i>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-bold text-hover-primary text-gray-600 m-0">Products</a>
                    <!--end::Title-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar m-0">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                        <span class="svg-icon svg-icon-3 svg-icon-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                    <!--begin::Menu 3-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">

                    </div>
                    <!--end::Menu 3-->
                    <!--end::Menu-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9 pt-6 pb-8">
                <!--begin::Heading-->
                <div class="fs-2tx fw-bolder mb-3">239</div>
                <!--end::Heading-->
                <!--begin::Stats-->

                <!--end::Stats-->
                <!--begin::Indicator-->

                <!--end::Indicator-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
</div>


@endsection
