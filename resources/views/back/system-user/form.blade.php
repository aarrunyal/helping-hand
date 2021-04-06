<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <h3 class="kt-section__title">
            create new
        </h3>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="form-control-label">*First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                   value="{{old('first_name', isset($user->first_name)?$user->first_name:null)}}">
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-control-label">*Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                                   value="{{old('last_name', isset($user->last_name)?$user->last_name:null)}}">
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="form-control-label">*Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email"
                                   value="{{old('email', isset($user->email)?$user->email:null)}}" autocomplete="off">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        {{--<div class="col-lg-6">--}}
                        {{--<label class="form-control-label">*Username</label>--}}
                        {{--<input type="text" name="username" class="form-control" placeholder="Category Name"--}}
                        {{--value="{{old('username', isset($user->username)?$user->username:null)}}">--}}
                        {{--<span class="text-danger">{{ $errors->first('username') }}</span>--}}
                        {{--</div>--}}
                        <div class="col-lg-6">
                            <label class="form-control-label">*Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone"
                                   value="{{old('phone', isset($user->phone)?$user->phone:null)}}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>

                    @if(empty($user))
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="form-control-label">*Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       value="{{old('phone', isset($user->password)?$user->password:null)}}"
                                       autocomplete="off">
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-control-label">*Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="Password Confirmation"
                                       value="{{old('phone', isset($user->password_confirmation)?$user->password_confirmation:null)}}">
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group row">
                    <label class="col-4 col-form-label">Status</label>
                    <div class="col-4">
														<span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($user->is_active) && $user->is_active =='1')?"checked":''}}
                                                                       name="is_active">
																<span></span>
															</label>
														</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-brand">Save</button>
                <a href="{{route('system-user.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@section('page-script')

    <!--begin::Page Scripts(used by this page) -->
    <script>
        var KTFormControls = function () {
            // Private functions
            var demo2 = function () {
                $("#kt_form_2").validate({
                    // define validation rules
                    rules: {
                        //= Client Information(step 3)
                        // Billing Information
                        first_name: {
                            required: true
                        },
                        last_name: {
                            required: true
                        },
                        phone: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        @if(empty($user))
                        password: {
                            required: true
                        },
                        password_confirmation: {
                            required: true
                        },
                        @endif
                    },

                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        swal.fire({
                            "title": "",
                            "text": "There are some errors in your submission. Please correct them.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            "onClose": function (e) {
                                swal.fire({
                                    "title": "",
                                    "text": "New user created.",
                                    "type": "success",
                                    "confirmButtonClass": "btn btn-secondary"
                                });
                            }
                        });

                        event.preventDefault();
                    },

                    submitHandler: function (form) {
                        form[0].submit(); // submit the form
                        swal.fire({
                            "title": "",
                            "text": "Form validation passed. All good!",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary"
                        });

                        return false;
                    }
                });
            }

            return {
                // public functions
                init: function () {
                    demo2();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormControls.init();
            // $('#parent_category_id').hide()
        });
    </script>
    <script>

    </script>
    {{--<script src="{{asset('resources/back/assets/js/pages/crud/forms/validation/form-controls.js')}}"--}}
    {{--type="text/javascript"></script>--}}

    <!--end::Page Scripts -->
@endsection