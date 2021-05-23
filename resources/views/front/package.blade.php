@extends('layouts.front.layout')
@section('content')
    <div class="row hero-image"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{$imageUrl}}');">
        <div class="col-lg-12">
            <h1 class="text-center">{{ucwords($package->title)}} </h1>
            <div class="highLight text-light">
                {!! $package->short_description !!}
            </div>

            <div class="text-center mt-4 mb-3">
                <a class="btn-default" href="{{route('inquiry')}}" style="color: white">GET MORE INFO </a>
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
                    <div class="col-12">
                        <h6 class="text-center text-light p-2"> {{$package->program->title}} {{$package->destination->title}}</h6>
                    </div>
                </div>
                <ul class="">
                    @if($otherPackages->count()>0)
                        @foreach($otherPackages as $p)
                            <li class="border-bottom mb-2"><a
                                    href="{{route('package-details', $p->slug)}}">{{ucwords($p->title)}} </a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9  pt-4 package-detail">
                <div id="content">
                    <ul class="nav nav-tabs" id="tab-list">
                        <li class="nav-link tab-item active"><a data-toggle="tab" href="#overview">Overview</a></li>
{{--                        @if($package->dates_available && $package->dates->count()>0)--}}
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#dateCost">Dates/Cost</a></li>
{{--                        @endif--}}
                        @if(($package->itineraries->count()>0))
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#itinerary">Itinerary</a></li>
                        @endif
                        @if(($package->faqs->count()>0))
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#faq">FAQ</a></li>
                        @endif
                        @if(!empty($package->more_info))
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#moreInfo">More Info</a></li>
                        @endif
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="overview">
                            <div class="row">
                                <div class="col">
                                    @if(!empty($package->program_id))
                                        <span class="badge badge-primary"><small>
                                            Program : {{$package->program->title}}
                                        </small></span>
                                    @endif
                                    @if(!empty($package->destination_id))
                                        <span class="badge badge-primary"><small>
                                            Destination : {{$package->destination->title}}
                                        </small></span>
                                    @endif
                                </div>
                            </div>
                            @if(!empty($package))
                                <h3>{{$package->title}}</h3>
                                <p> {!! $package->description !!}</p>
                                <div class="text-center mt-4 mb-3">
                                    <a class="btn-default" href="{{route('inquiry')}}" style="color: white">GET MORE
                                        INFO </a>
                                </div>
                            @else
                                <h3>No data found</h3>
                            @endif
                        </div>

                        <div class="tab-pane" id="dateCost">
                            @if(!empty($package->dates_description))
                                <h3>Dates</h3>
                                <p> {!! $package->dates_description !!}
                                </p>
                            @endif
                            @if($package->dates_available && $package->dates->count()>0)
                                <h5>Available Dates</h5>
                                <ul class="ml-3" style="list-style-type:square;">
                                    @foreach($package->dates as $l)
                                        @if($l->is_active)
                                            <li>{{formatDate($l->start_from, "Y M d")}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                            @if($package->cost_description)
                                    <h3>Cost</h3>
                                <p> {!! $package->cost_description !!}</p>
                            @endif

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    @if(!$package->is_free && $package->pricings->count()>0)
                                        <h5>Volunteer Program Fee</h5>
                                        <table class="table">
                                            <thead style="background: #ed6e1d">
                                            <tr>
                                                <th>Duration</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            @foreach($package->pricings as $price)
                                                @if($price->is_active)
                                                    <tr>
                                                        <td>{{ $price->unit." ".$price->period}}</td>
                                                        <td>${{$price->price}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                        @else
                                        <h6> Package is free</h6>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    @if($package->include_list->count()>0)
                                        <h5>Package fee includes:</h5>
                                        <ul class="ml-3" style="list-style-type:square;">
                                            @foreach($package->include_list as $l)
                                                @if($l->is_active)
                                                    <li>{{ucwords($l->title)}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($package->include_list->count()>0)
                                        <h5>Package fee excludes:</h5>
                                        <ul class="ml-3" style="list-style-type:square;">
                                            @foreach($package->exclude_list as $l)
                                                @if($l->is_active)
                                                    <li>{{ucwords($l->title)}}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="moreInfo">
                            @if(!empty($package->more_info))

                                <p> {!! $package->more_info !!}</p>
                                <div class="text-center mt-4 mb-3">
                                    <a class="btn-default" href="{{route('inquiry')}}" style="color: white">GET MORE
                                        INFO </a>
                                </div>

                            @endif
                        </div>
                        <div class="tab-pane" id="itinerary">
                            @if(!empty($package->itineraries->count()>0))

                                @foreach($package->itineraries as $itinerary)
                                    @if($itinerary->is_active)
                                        <p><strong>{{$itinerary->title}}</strong></p>
                                        <p>{{$itinerary->description}}</p>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane" id="faq">
                            @if(!empty($package->faqs->count()>0))

                                @foreach($package->faqs as $faq)
                                    @if($faq->is_active)
                                        <p><strong>{{$faq->title}}</strong></p>
                                        <p>{{$faq->description}}</p>
                                    @endif
                                @endforeach

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-specific-scripts')

@endsection
