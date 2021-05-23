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
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">* Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title"
                                   value="{{old('slug', isset($siteSetting->title)?$siteSetting->title:'')}}" readonly>
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <input type="text" value="{{$siteSetting->type}}" name="type" hidden>
                        <div class="col-lg-12 col-md-12 mt-5">
                            <label class="form-control-label">* Value</label>
                            @if($siteSetting->type =="text")

                                <input type="text" name="value" class="form-control" placeholder="Value"
                                       value="{{old('title', isset($siteSetting->value)?$siteSetting->value:null)}}">
                                <span class="text-danger">{{ $errors->first('value') }}</span>

                            @elseif($siteSetting->type =="text-area")
                                <textarea name="value" class="form-control" rows="15"
                                          placeholder="Value">{{old('title', isset($siteSetting->value)?$siteSetting->value:null)}}</textarea>
                                <span class="text-danger">{{ $errors->first('value') }}</span>
                            @elseif($siteSetting->type =="file")
                                <input type="file" class="form-control" placeholder="Logo" name="value">
                                <span class="text-danger">{{ $errors->first('value') }}</span>
                            @endif


                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">

                <div class="form-group row mt-3">
                    <label class="col-1 col-form-label">Status</label>
                    <span class="kt-switch kt-switch--success ml-5">
															<label>
																<input type="checkbox"
                                                                       {{(isset($siteSetting->is_active) && $siteSetting->is_active =='1')?"checked":''}}
                                                                       name="is_active">
																<span></span>
															</label>
														</span>
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
                <a href="{{route('site-setting.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@section('page-script')

    <script src="{{asset('resources/back/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('resources/back/assets/js/pages/crud/forms/editors/tinymce.js')}}"
            type="text/javascript"></script>
    <script>
        /*validation*/
        var KTFormControls = function () {
            // Private functions
            var demo2 = function () {
                $("#kt_form_2").validate({
                    // define validation rules
                    rules: {
                        //= Client Information(step 3)
                        // Billing Information
                        title: {
                            required: true
                        },
                        value: {
                            required: true
                        },
                    },

                    //display error alert on form submit
                    invalidHandler: function (event, validator) {
                        swal.fire({
                            "title": "",
                            "text": "There are some errors in your submission. Please correct them.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            "onClose": function (e) {
                                console.log('on close event fired!');
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
        /*validation ends here*/
    </script>
    <script>
        /*text editor*/
        var KTTinymce = function () {
            // Private functions
            var demos = function () {

                tinymce.init({
                    selector: '#kt-tinymce-3',
                    toolbar: false,
                    statusbar: false,
                    height: 150,
                });
                tinymce.init({
                    selector: '#social_share_description',
                    toolbar: false,
                    statusbar: false,
                    height: 150,
                });

                tinymce.init({
                    selector: '#kt-tinymce-4',
                    menubar: false,
                    toolbar: [
                        'styleselect fontselect fontsizeselect',
                        'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                        'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
                    plugins: 'advlist autolink link image lists charmap print preview code',
                    height: 300,
                });
            };

            return {
                // public functions
                init: function () {
                    demos();
                },
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTTinymce.init();
        });
        /*text editor end here*/
    </script>
    <script>

    </script>


    <!--end::Page Scripts -->
@endsection
