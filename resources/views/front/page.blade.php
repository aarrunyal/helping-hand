@extends('layouts.front.layout')
@section('content')
    <div class="row wrapper wrapper-1">
        <div class="col-lg-12 my-5">
            <h1 class="text-center">{{ucwords($page->name)}}</h1>
        </div>
    </div>
    <div class="container wrapper wrapper-2" style="min-height: 300px">
        <div class="row my-4" >
            <div class="col">
            {!! $page->description !!}
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <link rel="stylesheet" href="{{asset('resources/front/css/horizontal-slide.css')}}">
@endsection
