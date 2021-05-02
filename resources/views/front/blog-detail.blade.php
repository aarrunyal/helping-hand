@extends('layouts.front.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 cover-image">
                @if(!empty($blog->social_share_image))
                    <img src="{{$blog->image_path['real']}}" alt="blog-image" class="img-responsive" height="400px" width="100%">
                @endif
            </div>
        </div>
    </div>
        <div class="container">
            <div class="row blog-row">
                <div class="col-xl-12 py-5 px-md-5">
                    <div class="row pt-md-4">
                        {!! $blog->content !!}
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                            <div class="social-icon">
                                <a href="#" class="rounded-circle p-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="rounded-circle p-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="rounded-circle p-2"><i class="fab fa-instagram-square"></i></a>
                                <a href="#" class="rounded-circle p-2"><i class="fab fa-pinterest-p"></i></a>
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
@endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/blog.css')}}">
@endsection
