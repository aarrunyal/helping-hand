@extends('layouts.back.auth.layout')
@section('content')
    <!--begin::Content-->
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

        <!--begin::Head-->
    {{--        <div class="kt-login__head">--}}
    {{--            <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;--}}
    {{--            <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>--}}
    {{--        </div>--}}

    <!--end::Head-->

        <!--begin::Body-->
        <div class="kt-login__body">

            <!--begin::Signin-->
            <div class="kt-login__form">
                <div class="kt-login__title">
                    <h3>Document Management System</h3>
                </div>
                <div class="kt-login__title">
                    <h3>Sign In</h3>
                </div>

                <!--begin::Form-->
                <form class="kt-form" action="{{route('admin.login')}}" novalidate="novalidate" id="kt_login_form"
                      method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" name="email" autocomplete="off"
                               value="{{old('email')}}">
                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" placeholder="Password" name="password"
                               autocomplete="off">
                        @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>

                    <!--begin::Action-->
                    <div class="kt-login__actions">
                        {{--                        <a href="#" class="kt-link kt-login__link-forgot">--}}
                        {{--                            Forgot Password ?--}}
                        {{--                        </a>--}}
                        <button id="kt_login_signin_submit" type="submit"
                                class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In
                        </button>
                    </div>
                    <!--end::Action-->
                </form>

                <!--end::Form-->

                <!--begin::Divider-->
            {{--                <div class="kt-login__divider">--}}
            {{--                    <div class="kt-divider">--}}
            {{--                        <span></span>--}}
            {{--                        <span>OR</span>--}}
            {{--                        <span></span>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                <!--end::Divider-->--}}

            {{--                <!--begin::Options-->--}}
            {{--                <div class="kt-login__options">--}}
            {{--                    <a href="#" class="btn btn-primary kt-btn">--}}
            {{--                        <i class="fab fa-facebook-f"></i>--}}
            {{--                        Facebook--}}
            {{--                    </a>--}}
            {{--                    <a href="#" class="btn btn-info kt-btn">--}}
            {{--                        <i class="fab fa-twitter"></i>--}}
            {{--                        Twitter--}}
            {{--                    </a>--}}
            {{--                    <a href="#" class="btn btn-danger kt-btn">--}}
            {{--                        <i class="fab fa-google"></i>--}}
            {{--                        Google--}}
            {{--                    </a>--}}
            {{--                </div>--}}

            <!--end::Options-->
            </div>

            <!--end::Signin-->
        </div>

        <!--end::Body-->
    </div>

    <!--end::Content-->
@endsection
