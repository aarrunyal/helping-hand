<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <h3 class="kt-section__title">
            Add/Edit
        </h3>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                <span>

                </span>
                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">* Word by volunteer</label>
                            <textarea type="text" name="description" class="form-control" id="description"
                                      placeholder="Word by volunteer">{{old('description', isset($testimonial->description)?$testimonial->description:null)}}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-4">
                            <label class="form-control-label">* From</label>
                            <input type="text" name="from" id="from" class="form-control" placeholder="By   "
                                   value="{{old('from', isset($testimonial->from)?$testimonial->from:null)}}">
                            <span class="text-danger">{{ $errors->first('from') }}</span>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-4">
                            <label class="form-control-label">Destination</label>
                            <select name="destination_id" id="destination_id" class="form-control">
                                <option value="">Select Destination</option>
                                @if($destinations->count()>0)
                                    @foreach($destinations as $destination)
                                        <option
                                            value="{{$destination->id}}" {{!empty($testimonial) && $destination->id == $testimonial->destination_id?"selected":null}}>{{$destination->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-4">

                <div class="form-group row mt-3">
                    <div class="col-6">
                        <label class="col-form-label">Status</label>
                    </div>
                    <div class="col-6 text-right">
                         <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($testimonial->is_active) && $testimonial->is_active =='1')?"checked":''}}
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
                <a href="{{route('testimonial.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@section('page-script')
    <script src="{{asset('resources/back/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('resources/back/assets/js/pages/crud/forms/editors/tinymce.js')}}"
            type="text/javascript"></script>

    <link rel="stylesheet" src="{{asset('resources/back/assets/css/tags/tags.css')}}">
    <script src="{{asset('resources/back/assets/js/tags/tags.js')}}"
            type="text/javascript"></script>
    <script>
        let ids = ['#description'];
        ids.forEach(ele => {
            let height = 200
            if (ele == "#kt-tinymce-4")
                height = 350
            tinymce.init({
                selector: ele,
                height: height
            });
        });
    </script>
    <script>
        $('input[name="tags"]').amsifySuggestags();
        /*validation*/
        var KTFormControls = function () {
            var demo2 = function () {
                $("#kt_form_2").validate({
                    rules: {
                        description: {
                            required: true
                        },
                        from: {
                            required: true
                        }, name: {
                            required: true
                        },
                        destination_id: {
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


    <!--end::Page Scripts -->
@endsection
