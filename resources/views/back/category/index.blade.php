@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Category</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                {{-- <span class="kt-subheader__desc">#XRS-45670</span> --}}
                {{-- <a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10"> --}}
                {{-- Add New --}}
                {{-- </a> --}}
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                        <span><i class="flaticon2-search-1"></i></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content Head -->


    <!-- begin:: Content -->
    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
        <div class="row">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Categories
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                <a href="{{ route('category.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    New Record
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                            <tr>
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Parent</th>
                                <th class="text-center">parent Title</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($categories->count() > 0)
                                @foreach ($categories as $c => $category)
                                    <tr>
                                        <td class="text-center">{{ $c + 1 }}</td>
                                        <td class="text-center">{{ ucwords($category->title) }}</td>
                                        <td class="text-center">{!! getStatusLayout($category->is_parent) !!}</td>
                                        <td class="text-center">
                                            {{ !empty($category->parent) ? ucwords($category->parent->title) : '-' }}</td>
                                        <td class="text-center">{!! getStatusLayout($category->is_active) !!}</td>
                                        <td class="text-center">
                                            <a href="{{ route('category.edit', $category->slug) }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('category.destroy', $category->slug) }}"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
@endsection
@section('page-script')
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('resources/back/assets/plugins/custom/datatables/datatables.bundle.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('resources/back/assets/js/pages/crud/datatables/advanced/column-rendering.js') }}"
        type="text/javascript"></script>

    <!--end::Page Scripts -->
@endsection
