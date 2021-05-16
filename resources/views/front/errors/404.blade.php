
@extends('layouts.front.layout')
@section('content')
    <!-- component -->
    <style>
        * {
        "Whitney SSm A", "Whitney SSm B", "Helvetica Neue", Helvetica, Arial, Sans-Serif;
        }

        .error-text {
            font-size: 130px;
        }

        @media (min-width: 768px) {
            .error-text {
                font-size: 220px;
            }
        }
    </style>
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="error-text">400</h2><br/>
        </div>
        <div class="col-12 text-center mb-5">
            <p>Sorry, the page you are looking for does not exist.</p>
            <a href="{{url('/')}}" class="">Back to homepage</a>
        </div>
    </div>
@endsection

