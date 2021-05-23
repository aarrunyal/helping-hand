@extends('layouts.front.layout')
@section('content')
    <div class="row hero-image"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('resources/front/image/cover-1.jpg')}}');">
        <div class="col-lg-12">
            <h1 class="text-center">Help Those Most in Need </h1>
            <h3 class="text-center"> And see the world at the same time </h3>

            <div class="highLight">

                <p class="text-center"> The world’s most affordable volunteer programs –
                    starting at $140
                </p>
                <p class="text-center"> Fees paid directly to host families and projects – no
                    middlemen</p>
                <p class="text-center"> 18 countries, 200 projects & over 22,000 happy
                    volunteers</p>


            </div>

            <div class="text-center mt-4 mb-3">
                <a class="btn-default" href="{{route('inquiry')}}">GET MORE INFO </a>
            </div>
            <p class="text-center small-text"> Take a minute to complete the form and we will be
                in touch.
            </p>
        </div>
    </div>
    <div class="row wrapper wrapper-2 " style="text-align: center">
        <div class="container my-4">
            <h2 class="vc_custom_heading" style="color: #4265a2;">Welcome to Helping HandFoundation Nepal</h2>
            <div class="">
                <p style="font-weight: bold !important">
                    Helping Hand Foundation
                    Nepal (HHFN) has been welcoming international volunteers from all over
                    the world since 1999.</p>
                <p style="font-family: 'PT Sans', sans-serif;">We offer programs in education,
                    health care, agriculture, research, environmental protection, journalism
                    internship and 15 days international workcamp. Helping Hand Foundation Nepal
                    (HHFN) is a non-profit, non-political, organization committed to improving the
                    lives of rural people in Nepal.&nbsp; Established in July 1999, HHFN regularly
                    conducts programs in the areas of <strong>education, health, agriculture,
                        environment and women empowerment.</strong> HHFN places international
                    volunteers in residential service projects in Nepal with a small fee,
                    volunteers participate in service projects and live with a host Nepalese
                    family during their stay in Nepal, gaining a more genuine understanding and
                    appreciation for the culture and the people they are helping.</p>
            </div>
            <div class="mt-3"><a class="btn-default" href="{{route('page', ['about-hhf'])}}" title=""
                                 style="color: white">READ
                    MORE</a></div>

        </div>
    </div>
    <div class="row wrapper wrapper-1 pb-3 package">
        <div class="container">
            <h2 class="text-center my-3 text-default">Our packages</h2>
            <div class="row">
                @if($packages->count()>0)
                    @foreach($packages as $i=>$package)
                        <div class=" col-xs-12 col-sm-6 col-md-4 text-center   mt-3">
                            <div class="card border">
                                <img class="card-img-top" width="300px"
                                     src="{{$package->image_path['thumb']}}"
                                     alt="{{$package->title}}">
                                <div class="card-body">
                                    <a href="{{route('package-details', $package->slug)}}"
                                       class="card-title text-center font-weight-bold">{{$package->title}}</a>
                                    {{--                                    @dd($package->limit_short_description)--}}
                                    {{--                                    <p class="card-text">--}}
                                    {{--                                    </p>--}}
                                </div>
                                <div class="card-body">
                                    {!! $package->short_desctiption !!}...
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if($packages->count()>0)
                <div class="row mt-2">
                    <div class="col text-center">
                        <a href="{{route('packages')}}" class="btn btn-default">SEE ALL</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row  wrapper wrapper-3  pt-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="widget counters  style1">
                                <div class="counter-wrap">
                                    <div class="icon">
                                    </div>
                                    <span class="clearfix"></span>
                                    <span class="counter counterUp">{{getSetting("SETTING_HELPERS")}}</span>
                                </div>
                                <h5>Helpers</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="widget counters  style1">
                                <div class="counter-wrap">
                                    <div class="icon">
                                    </div>
                                    <span class="clearfix"></span>
                                    <span class="counter counterUp">{{getSetting("SETTING_YEAR_OF_EXPERIENCE")}}</span>
                                </div>
                                <h5>Years of Experience</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="widget counters  style1">
                                <div class="counter-wrap">
                                    <div class="icon">
                                    </div>
                                    <span class="clearfix"></span>
                                    <span class="counter counterUp">{{getSetting("SETTING_HAPPY_VOLUNTEERS")}}</span>
                                </div>
                                <h5>Happy Volunteers</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="widget counters  style1">
                                <div class="counter-wrap">
                                    <div class="icon">
                                    </div>
                                    <span class="clearfix"></span>
                                    <span class="counter counterUp">{{getSetting("SETTING_ESTABLISHMENT_YEAR")}}</span>
                                </div>
                                <h5>Establishment Year</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row  wrapper wrapper-1 py-3 program">
        <div class="container">
            <h2 class="text-center my-3" style="color: #4265a2;">Programs</h2>
            <div class="row">
                @if($programs->count()>0)
                    @foreach($programs as $program)
                        <div class="col-xs-12 col-sm-6 col-md-4 text-center mt-3">
                            <div class="card border">
                                <img class="card-img-top"
                                     src="{{$program->image_path['thumb']}}"
                                     alt="Card image cap">
                                <div class="card-body ">
                                    <a href="{{route('program-details', $program->slug)}}"
                                       class="text-center card-title font-weight-bold">{{strtoupper($program->title)}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if($programs->count()>0)
                <div class="row mt-2">
                    <div class="col text-center">
                        <a href="{{route('programs')}}" class="btn btn-default">SEE ALL</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row  wrapper wrapper-2 destination">
        <div class="container">
            <div class="row my-4">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <h2 class="text-default">Top Destination</h2>
                            @if($destinations->count()>0)
                                <ul class="ml-4">
                                    @foreach($destinations as $k=>$destination)
                                        <li class=""
                                            style="list-style-image: url('{{asset('resources/front/image/check.png')}}'); height: 25px"
                                            ;>
                                            <a href="{{route('program-details', $destination->slug)}}">{{ucwords($destination->title)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class=""><strong>No destinations available</strong></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <h2 class="text-default">Popular Projects</h2>
                            @if($popularProject->count()>0)
                                <ul>
                                    @foreach($popularProject as $k=>$project)
                                        <li style="list-style-image: url('{{asset('resources/front/image/check.png')}}'); height: 25px">
                                            <a href="{{route('program-details', $project->slug)}}">{{ucwords($project->title)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class=""><strong>No projects available</strong></p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row  wrapper wrapper-1 ">
        <div class="container">
            <h2 class="text-center my-3 text-default">Testimonials</h2>
            @if($testimonials->count()>0)
                <div id="carouselExampleIndicators " class="carousel slide" data-ride="carousel" style="width:100%;">
                    <div class="carousel-inner">
                        @foreach($testimonials->chunk(3) as $i=>$testimonial)
                            <div class="carousel-item  {{$i==1?'active':null}}">
                                <div class="row">
                                    @foreach($testimonial as $index=>$test)
                                        <div class="col-md-4">
                                            <blockquote
                                                style="background-image:
                                                    url('{{asset('resources/front/image/quote.png')}}');"><br>
                                                {!!  $test->description!!}
                                                <small> <strong>{{ucwords($test->from)}}</strong> (Volunteer
                                                    in {{ucwords($test->destination->title)}}) </small>
                                            </blockquote>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
@section('page-script')
    <link rel="stylesheet" href="{{asset('resources/front/css/horizontal-slide.css')}}">
    <script>
        $(document).ready(() => {
            $('.carousel').carousel({
                interval: 30000
            })
        })
    </script>
@endsection
