@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-8 py-5 px-md-5">
                <div class="row pt-md-4">
                    <div class="col-md-12">
                            <div class="">
                                <img  class="blog-single-cover" src="https://thehhfn.org/wp-content/uploads/2017/04/audio.png" width="100%"></img>
                            </div>
{{--                        <div class="ml-3 mt-2 blog-date" style="position: relative">--}}
{{--                            <h3 class="text-center">12 <br>OCT</h3>--}}
{{--                        </div>--}}

                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="blog-entry ftco-animate d-md-flex fadeInUp ftco-animated">
                                <div class="text text-2 pl-md-4">
                                    <h3 class="mb-2 mt-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                    <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-4 sidebar ftco-animate bg-light pt-5 fadeInUp ftco-animated">
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3 class="sidebar-heading">Popular Articles</h3>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('https://thehhfn.org/wp-content/uploads/2017/04/audio.png');"></a>
                        <div class="text">
                            <h5 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url('https://thehhfn.org/wp-content/uploads/2017/04/audio.png');"></a>
                        <div class="text">
                            <h5 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> June 28, 2019</a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/blog.css')}}">
@endsection
