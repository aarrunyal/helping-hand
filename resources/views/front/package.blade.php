@extends('layouts.front.layout')
@section('content')
    <div class="row hero-image"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('resources/front/image/cover.jpg')}}');">
        <div class="col-lg-12">
            <h1 class="text-center">Summer Volunteer Program Nepal </h1>
            <h3 class="text-center"> And see the world at the same time </h3>

            <div class="highLight">

                <p class="text-center"> Nepal is the ideal volunteer destination
                </p>
                <p class="text-center"> Trusted by thousands of volunteers since 2006</p>
                <p class="text-center"> Most affordable volunteer projects, starting at $100 Transparent fee
                    payments</p>
                <p class="text-center"> Work in Healthcare, Teaching, Conservation and more</p>

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
                        <h3 class="text-center p-2"> Volunteer Nepal</h3>
                    </div>
                </div>
                <ul class="">
                    <li class="border-bottom mb-2"><a
                            href="https://www.ifrevolunteers.org/nepal/volunteer_in_nepal.php">Nepal Home </a></li>
                    <li class="border-bottom mb-2"><a href="https://www.ifrevolunteers.org/nepal/work_in_orphanage.php">Work
                            in Orphanage </a></li>
                    <li class="border-bottom mb-2"><a href="https://www.ifrevolunteers.org/nepal/teaching_english.php">Teaching
                            English </a></li>
                    <li class="border-bottom mb-2"><a
                            href="https://www.ifrevolunteers.org/nepal/work_local_health_project.php"> Work in Health
                            Project</a></li>
                    <li class="border-bottom mb-2"><a
                            href="https://www.ifrevolunteers.org/nepal/teach_buddhist_monk.php"> Teaching Buddhist
                            Monk</a></li>

                    <li class="border-bottom mb-2"><a href="https://www.ifrevolunteers.org/nepal/conservation_work.php">
                            Conservation Work</a></li>

                    <li class="border-bottom mb-2"><a
                            href="https://www.ifrevolunteers.org/nepal/photo_journalism_project.php"> Photo Journalism
                            Project</a></li>

                    <li class="border-bottom mb-2"><a
                            href="https://www.ifrevolunteers.org/nepal/photo_journalism_project.php"> Language &amp;
                            Culture</a></li>

                    <li class="border-bottom mb-2"><a href="https://www.ifrevolunteers.org/nepal/nepal_reviews.php">
                            Volunteers' Reviews</a></li>


                </ul>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 wrapper-1 pt-4 package-detail">
                <div id="content">
                    <ul class="nav nav-tabs" id="tab-list">
                        <li class="nav-link tab-item active"><a data-toggle="tab" href="#overview">Overview</a></li>
                        @if(!empty($package->more_info))
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#dateCost">Dates/Cost</a></li>
                        @endif
                        @if(!empty($package->more_info))
                            <li><a class="nav-link tab-item" data-toggle="tab" href="#moreInfo">More Info</a></li>
                        @endif
                        <li><a class="nav-link tab-item" data-toggle="tab" href="#yellow">Yellow</a></li>
                        <li><a class="nav-link tab-item" data-toggle="tab" href="#green">Green</a></li>
                        <li><a class="nav-link tab-item" data-toggle="tab" href="#blue">Blue</a></li>
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
                            @else
                                <h3>No data found</h3>
                            @endif
                        </div>
                        @if(!empty($package->dates_description))
                            <div class="tab-pane" id="dateCost">
                                <h3>Dates</h3>
                                <p> {!! $package->dates_description !!}
                                </p>
                                <h3>Cost</h3>
                                <p> {!! $package->cost_description !!}</p>
                                @if(!$package->is_free && $package->pricings->count()>0)
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        <h5>Volunteer Program Fee</h5>
                                        <table class="table">
                                            <tr>
                                                <th>Duration</th>
                                                <th>Price</th>
                                            </tr>
                                            @foreach($package->pricings as $price)
                                                <tr>
                                                    <td>{{$price->period ." ".$price->unit}}</td>
                                                    <td>{{$price->price}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                        Program Fees Cover:
                                        Accommodation (hostel)
                                        Food (only breakfast and dinnery)
                                        Airport pick-up and transfer
                                        Program Orientation
                                        In-country support
                                        Personalized project
                                        Pre-departure information
                                        Certificate of completion
                                        Fundraising ideas and letters
                                        Discount for returning volunteers
                                        Program Fees Exclude:
                                        Visas
                                        Airfare
                                        Personal expenses on soft drinks and foods
                                        Daily transportation
                                        Airport return transfer
                                    </div>
                                </div>
                                @endif
                            </div>
                        @endif

                        @if(!empty($package->more_info))
                            <div class="tab-pane" id="moreInfo">
                                <p> {!! $package->more_info !!}</p>
                            </div>
                        @endif
                        <div class="tab-pane" id="yellow">
                            <h1>Yellow</h1>
                            <p>yellow yellow yellow yellow yellow</p>
                        </div>
                        <div class="tab-pane" id="green">
                            <h1>Green</h1>
                            <p>green green green green green</p>
                        </div>
                        <div class="tab-pane" id="blue">
                            <h1>Blue</h1>
                            <p>blue blue blue blue blue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page-specific-scripts')

@endsection
