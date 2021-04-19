@extends('layouts.front.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 cover-image" style="background-image: url('{{asset('resources/front/image/cover-3.jpg')}}');">
            </div>
        </div>
        <div class="container">
            <div class="row blog-row wrapper">
                <div class="col-xl-12 py-3 px-md-5 ">
                    <h2 class="text-center" style="color: #4265a2;">Packages</h2>
                    <div class="row">
                        @if($packages->count()>0)
                            @foreach($packages as $i=>$package)
                                <div class=" col-xs-12 col-sm-6 col-md-4    mt-2">
                                    <div class="card border">
                                        <img class="card-img-top" width="300px"
                                             src="{{$package->image_path['thumb']}}"
                                             alt="{{$package->title}}">
                                        <div class="card-body">
                                            <h6 class="card-title">{{$package->title}}</h6>
                                            {{--                                    @dd($package->limit_short_description)--}}
                                            <p class="card-text">{!! substr($package->short_description, 0,200) !!}...</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                {{--                  <div class="col-xl-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated">--}}
                {{--                      <div class="sidebar-box ftco-animate fadeInUp ftco-animated">--}}
                {{--                          <h3 class="sidebar-heading">Categories</h3>--}}
                {{--                          <ul class="categories">--}}
                {{--                              <li><a href="#">Fashion <span>(6)</span></a></li>--}}
                {{--                              <li><a href="#">Technology <span>(8)</span></a></li>--}}
                {{--                              <li><a href="#">Travel <span>(2)</span></a></li>--}}
                {{--                              <li><a href="#">Food <span>(2)</span></a></li>--}}
                {{--                              <li><a href="#">Photography <span>(7)</span></a></li>--}}
                {{--                          </ul>--}}
                {{--                      </div>--}}
                {{--                      <div class="sidebar-box ftco-animate fadeInUp ftco-animated">--}}
                {{--                          <h3 class="sidebar-heading">Popular Articles</h3>--}}
                {{--                          <div class="block-21 mb-4 d-flex">--}}
                {{--                              <a class="blog-img mr-4" style="background-image: url('https://thehhfn.org/wp-content/uploads/2017/04/audio.png');"></a>--}}
                {{--                              <div class="text">--}}
                {{--                                  <h5 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h5>--}}
                {{--                                  <div class="meta">--}}
                {{--                                      <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>--}}
                {{--                                  </div>--}}
                {{--                              </div>--}}
                {{--                          </div>--}}
                {{--                          <div class="block-21 mb-4 d-flex">--}}
                {{--                              <a class="blog-img mr-4" style="background-image: url('https://thehhfn.org/wp-content/uploads/2017/04/audio.png');"></a>--}}
                {{--                              <div class="text">--}}
                {{--                                  <h5 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h5>--}}
                {{--                                  <div class="meta">--}}
                {{--                                      <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>--}}
                {{--                                  </div>--}}
                {{--                              </div>--}}
                {{--                          </div>--}}

                {{--                      </div>--}}

                {{--                  </div>--}}
            </div>
        </div>
    </div>
@endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/blog.css')}}">
@endsection
