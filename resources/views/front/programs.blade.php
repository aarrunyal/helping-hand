@extends('layouts.front.layout')
@section('content')
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-12 mt-4 cover-image" >
                <img src="https://thehhfn.org/wp-content/uploads/2017/04/audio.png" alt="blog-image" class="img-responsive" height="400px" width="100%">
            </div>
        </div>
        <div class="container">
            <div class="row blog-row wrapper" >
                <div class="col-xl-12 py-3 px-md-5 ">
                    <h2 class="text-center" style="color: #4265a2;">Programs</h2>
                    <div class="d-flex justify-content-between my-4">
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img1.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class="text-center card-title">VOLUNTEER ABROAD</h4>
                            </div>
                        </div>
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img2.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" text-center card-title">INTERNSHIP ABROAD</h4>
                            </div>
                        </div>
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img3.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" text-center card-title">RECOMMMENDED</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img1.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class="text-center card-title">VOLUNTEER ABROAD</h4>
                            </div>
                        </div>
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img2.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" text-center card-title">INTERNSHIP ABROAD</h4>
                            </div>
                        </div>
                        <div class="card border" style="width: 20rem;">
                            <img class="card-img-top"
                                 src="http://www.rcdpinternationalvolunteer.org/images/testi_img3.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h4 class=" text-center card-title">RECOMMMENDED</h4>
                            </div>
                        </div>
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
