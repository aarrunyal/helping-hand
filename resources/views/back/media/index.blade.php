@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Media</h3>
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
                            Media
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                &nbsp;
                                {{--                                <a href="{{route('site-setting.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">--}}
                                {{--                                    <i class="la la-plus"></i>--}}
                                {{--                                    New Record--}}
                                {{--                                </a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form action="{{route('media.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-8">
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>


                    <div class="row mt-5">
                        @if($medias->count())
                            @foreach($medias as $media)
                                @if(!empty($media->path))
                                    <div class="col-2 m-2">
                                        <img src="{{$media->image_path['thumb']}}" alt="{{$media->title}}"
                                             class="img-thumbnail">
                                        <div class="text-right mt-2">
<span class="text-light p-1 ml-2 mt-2 copied" id="{{'copied'.$media->id}}"
      style="z-index: 9999; background-color: rgb(62, 87, 71) ">
                                            COPIED
                                        </span>
                                          <span class="ml-2">
                                                <i class="fas fa-copy"
                                                   onclick="copyImagePath('{{$media->image_path['real']}}', '{{'#copied'.$media->id}}')"></i>
                                            <a href="{{route('media.destroy', $media->id)}}"><i
                                                    class="text-danger fas fa-trash"></i></a>
                                          </span>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                        @endif
                    </div>
                    {{$medias->links()}}
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
    <script src="{{asset('resources/back/assets/js/JQlipboard.min.js')}}"></script>

    <script>

        $(document).ready(()=>{
            $(".copied").hide();
        })
        function copyImagePath(imagePath, id) {
            $.copy(imagePath)
            $(id).show();
            setTimeout(()=>{
                $(id).hide();
            }, 1000)
        }
    </script>
    <!--end::Page Scripts -->
@endsection
