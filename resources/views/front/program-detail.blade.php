@extends('layouts.front.layout')
@section('content')
    <div class="row detail-hero-image"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('resources/front/image/cover.jpg')}}');">
        <div class="col-lg-12">
            <h1 class="text-center mt-5">{{$program->title}} </h1>

            <div class="highLight">
                {!! $program->short_description!!}
            </div>

            <div class="text-center mt-4 mb-3">
                <a class="btn-default" href="inquiry.html">GET MORE INFO </a>
            </div>
            <p class="text-center small-text"> Take a minute to complete the form and we will be
                in touch.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row wrapper">
            <div class="col-xs-12 col-sm-4 col-md-3 side-bar pt-4">
                <div class="row side-heading text-center mb-2">
                    <div class="col">
                        <h3 class="text-center p-2"> {{!empty($program->category)?$program->category->title:null}}</h3>
                    </div>
                </div>
                @if(!empty($packages) && $packages->count()>0)
                    <ul class="">
                        @foreach($packages as $package)
                            <li class="border-bottom mb-2"><a
                                    href="{{route('package-details', $package->slug)}}">{{ucwords($package->title)}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{--            @if($program->destination_ids)--}}
            {{--                <div class="col-xs-12 col-sm-8 col-md-9 wrapper-1 pt-4">--}}

            {{--                </div>--}}
            {{--            @endif--}}

            <div class="col-xs-12 col-sm-8 col-md-9 wrapper-1 pt-4">
                @if($program->destination_ids)
                    <small>Available in :
                        @foreach($program->destination_title as $title)
                            <span class="badge badge-primary">{{ucwords($title)}}</span>
                        @endforeach
                    </small>
                @endif
                <br>
                <br>
                @if(!empty($program->description))
                    <h3><span style="font-size: 14pt;"><strong>Program Description</strong></span></h3>
                    {!! $program->description !!}
                        <div class="text-center mt-4 mb-3">
                            <a class="btn-default" href="{{route('inquiry')}}" style="color: white">GET MORE INFO </a>
                        </div>
                @endif

                @if(!empty($program->cost))
                    <h3><span style="font-size: 14pt;"><strong>Cost</strong></span></h3>
                    {!! $program->cost !!}
                @endif

                @if(!empty($program->cost))
                    <h3><span style="font-size: 14pt;"><strong>Dates</strong></span></h3>
                    {!! $program->cost !!}
                @endif

                @if(!empty($program->group_discount_available))
                    <h3><span style="font-size: 14pt;"><strong>Group Discounts</strong></span></h3>
                    {!! $program->group_discount_description !!}
                @endif

                @if(!empty($program->group_discount_available))
                    <h3><span style="font-size: 14pt;"><strong>Sample Itinerary</strong></span></h3>
                    {!! $program->sample_itinerary_description !!}
                        <div class="text-center mt-4 mb-3">
                            <a class="btn-default" href="{{route('inquiry')}}" style="color: white">GET MORE INFO </a>
                        </div>
                @endif


                <br> <br>

                <!--<h4> <a href="https://www.ifrevolunteers.org/nepal/volunteer_in_nepal.php"> Learn more about Nepal programs </a> </h4>-->

                <section class="related-project">
                    <h3 class="text-default"> Related Program </h3>
                    @if(!empty($otherPrograms) && $otherPrograms->count()>0)
                        <ul class="">
                        @foreach($otherPrograms as $program)
                            <!--<li><a href="https://www.ifrevolunteers.org/nepal/volunteer_nepal_summer_program.php"> Summer Volunteer - Nepal </a> </li>-->
                                <li><a href="{{route('program-details', $program->slug)}}"> {{$program->title}} </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </section>
            </div>
        </div>
    </div>

@endsection
