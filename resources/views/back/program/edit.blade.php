@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Page</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

            </div>
        </div>
    </div>
    <!-- end:: Content Head -->


    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Page
                            </h3>
                        </div>
                    </div>
                    <form class="kt-form kt-form--label-right" id="kt_form_2" method="POST" action="{{route('page.update', $page->slug)}}" enctype="multipart/form-data">
                        @include('back.page.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
@endsection
