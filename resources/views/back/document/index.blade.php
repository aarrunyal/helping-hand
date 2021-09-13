@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Document</h3>
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
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
        <div class="row">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Documents
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                <a href="{{ route('document.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                    New Record
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- begin:: Uplaod Modal -->
                <div class="modal fade" id="uploadFile" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="uploadFile" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body" id="document-file-form-id"">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- begin:: Uplaod Modal -->

                <div class="kt-portlet__body">

                    <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                            <tr>
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Course Title</th>
                                <th class="text-center">Access Type</th>
                                <th class="text-center">Total Document</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($documents->count() > 0)
                                @foreach ($documents as $c => $document)
                                    <tr>
                                        <td class="text-center">{{ $c + 1 }}</td>
                                        <td class="text-center">{{ ucwords($document->title) }}</td>
                                        <td class="text-center">{{ $document->description }}</td>
                                        <td class="text-center">
                                            {{ !empty($document->course) ? ucwords($document->course->title) : '-' }}</td>
                                        <td class="text-center">{{ ucwords($document->access_type) }}</td>
                                        <td class="text-center">{{  $document->documentFiles->count()  }}</td>
                                        <td class="text-center">{!! getStatusLayout($document->is_active) !!}</td>
                                        <td class="text-center">
                                            <a href="" onclick="getItineraryForm({{ $document->id }})" data-toggle="modal" data-target="#uploadFile"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('document.edit', $document->id) }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('document.destroy', $document->id) }}"><i
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
                    {{ $documents->links() }}
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
        <script src="{{asset('resources/back/assets/js/ajax.js')}}"></script>

    <script>
     function getItineraryForm(id) {
        let url = '{{route("document-file-custom-form")}}'
        ajaxCall('GET', url, 'HTML',{ id: id }, '#document-file-form-id', function (response, selector) {
                $(selector).html("");
                $(selector).append(response);
            }, function (error) {
            }
        );
    }
    </script>
    <!--end::Page Scripts -->
@endsection
