@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Application</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                {{--<span class="kt-subheader__desc">#XRS-45670</span>--}}
                {{--<a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">--}}
                {{--Add New--}}
                {{--</a>--}}
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
                            Application
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                {{--                                <a href="{{route('page.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
                                {{--                                    <i class="la la-plus"></i>--}}
                                {{--                                    Add Page--}}
                                {{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <table class="table table-striped- table-bordered table-hover table-checkable">
                        <thead>
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Inquiry By</th>
                            <th class="text-center">Phone No</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Destination</th>
                            <th class="text-center">Program/Package</th>
                            <th class="text-center">Date / Duration</th>
                            <th class="text-center">Read</th>
                            <th class="text-center">Mailed</th>
                            <th class="text-center">Is Served</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($applications->count()>0)
                            @foreach($applications as $c=>$application)
                                {{--                                @dd($application->image_path)--}}
                                <tr>
                                    <td class="text-center">{{$c+1}}</td>
                                    <td class="text-center">{{ucwords($application->full_name)}}</td>
                                    <td class="text-center">{{ucwords($application->phone_no)}}</td>
                                    <td class="text-center">{{ucwords($application->email)}}</td>
                                    <td class="text-center">{{ucwords($application->address)}}</td>
                                    <td class="text-center">{{(!empty($application->destination))?ucwords($application->destination->title):"-"}}</td>
                                    <td class="text-center">
                                        @if(!empty($application->program))
                                            <span class="badge badge-secondary">{{ucwords($application->program->title)}}</span>
                                            <br>
                                        @endif       @if(!empty($application->package))
                                            <span class="badge badge-secondary mt-2">{{ucwords($application->package->title)}}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if(!empty($application->date))
                                            <span
                                                class="badge badge-secondary">{{$application->date->start_from_text}}</span>
                                            <br>
                                        @endif
                                        @if(!empty($application->duration))
                                            <span
                                                class="badge badge-secondary mt-1">{{$application->duration->duration}}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{!! getStatusLayout($application->is_read) !!}</td>
                                    <td class="text-center">{!! getStatusLayout($application->is_email_forwarded) !!}</td>
                                    <td class="text-center">{!! getStatusLayout($application->is_served) !!}</td>
                                    <td class="text-center">
                                        <a onclick="getDetail({{$application->id}})" href="javascript:void(0)"><i
                                                class="fas fa-eye"></i></a>
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
                        {{$applications->links()}}
                </div>
            </div>
        </div>
        <div class="modal fade" id="applicationDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Application Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="application_detail">

                    </div>
                    {{--                    <div class="modal-footer">--}}
                    {{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--                        <button type="button" class="btn btn-primary">Send message</button>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
@endsection
@section('page-script')
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('resources/back/assets/plugins/custom/datatables/datatables.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('resources/back/assets/js/pages/crud/datatables/advanced/column-rendering.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('resources/back/assets/js/ajax.js')}}"></script>
    <script>
        function getDetail(id) {
            let url = '{{route('application.detail', ':inquiryId')}}'
            url = url.replace(":inquiryId", id);
            ajaxCall('GET', url, 'HTML', '', '#application_detail', function (response, selector) {
                    $(selector).html("");
                    $(selector).html(response);
                    $('#applicationDetailModal').modal('show')
                }, function (error) {
                }
            );
        }
    </script>
    <!--end::Page Scripts -->
@endsection
