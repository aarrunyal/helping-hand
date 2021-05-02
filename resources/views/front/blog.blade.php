@extends('layouts.front.layout')
@section('content')
    <div class="row wrapper wrapper-1">
        <div class="col-lg-12 my-5">
            <h1 class="text-center">Blog</h1>
        </div>
    </div>
    @if($featuredBlog->count()>0)
        <div class="container">
            <div class="row wrapper wrapper-3">
                <div class="col-12 text-center">
                    <span class="display-4 text-light">Popular Articles</span>
                </div>
                @foreach($featuredBlog as $b)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 my-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-4">
                                        <a href="{{route('blog-detail', $b->slug)}}">
                                        <img class=" img-responsive" src="{{$b->image_path['thumb']}}" width="150px"
                                             height="120px">
                                        </a>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-8">
                                        <h3 class="mb-2 mt-2"><a href="{{route('blog-detail', $b->slug)}}">{{$b->title}}</a></h3>
                                        <div class="meta-wrap">
                                            <p class="meta">
                                                <span><i class="icon-calendar mr-2"></i>{{formatDate($b->created_at,"Y M d")}}</span>
                                                <span><a href="#"><i class="icon-folder-o mr-2"></i>{{ucwords($b->tags)}}</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($otherBlog->count()>0)
        <div class="container wrapper wrapper-1">
            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 my-3">
                        <div class="text-center my-2">
                            <h2 class="text-default">Other</h2>
                            <hr>
                        </div>
                        @foreach($otherBlog as $b)
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="{{route('blog-detail', $b->slug)}}">
                                        <img class="rounded-circle img-responsive"
                                             src="{{$b->image_path['thumb']}}"
                                             width="200px">
                                        </a>
                                    </div>
                                    <div class="col-9">
                                        <h3 class="mb-2 mt-2"><a href="{{route('blog-detail', $b->slug)}}">{{$b->title}}</a></h3>
                                        <div class="meta-wrap">
                                            <p class="meta">
                                                <span><i class="icon-calendar mr-2"></i>{{formatDate($b->created_at,"Y M d")}}</span>
                                                <span><a href="#"><i class="icon-folder-o mr-2"></i>{{ucwords($b->tags)}}</a></span>
                                            </p>
                                        </div>
                                        <p class="mb-4">{!! substr($b->content, 0, 700) !!}...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    @endif
@endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/blog.css')}}">
@endsection
