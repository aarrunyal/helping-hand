@extends('layouts.front.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 cover-image">
                @if(!empty($blog->social_share_image))
                    <img src="{{$blog->image_path['real']}}" alt="blog-image" class="img-responsive" height="400px"
                         width="100%">
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
        </div>
    </div>
@endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/blog.css')}}">
@endsection
