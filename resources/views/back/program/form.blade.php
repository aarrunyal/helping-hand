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
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span>

                </span>
                <div class="kt-section__content">
                    <div class="form-group row">

                        <div class="col-lg-6 col-md-6">
                            <label class="form-control-label">* Program Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Program Title"
                                   value="{{old('title', isset($program->title)?$program->title:null)}}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="" for="image">Feature Image</label>
                            <input type="file" class="form-control" id="" name="image">
                        </div>

                        <div class="col-lg-12 col-md-12 mt-2">
                            <label class="form-control-label">Program Short Description</label>
                            <textarea class="form-control"
                                      id="short_description"
                                      name="short_description">{{old('short_description', isset($program->short_description)?$program->short_description:null)}}</textarea>
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-2">
                            <label class="form-control-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control"
                                    onchange="getSubCategories()">
                                <option value="">Select Category</option>
                                @if($categories->count()>0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-2" id="sub_category_div">

                        </div>

                        <div class="col-lg-12 col-md-12 mt-2">
                            <label class="form-control-label">Description</label>
                            <textarea id="kt-tinymce-4" class="form-control"
                                      name="description">{{old('description', isset($program->description)?$program->description:null)}}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                </div>

                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">Seo Title</label>
                            <input type="text" name="seo_title" class="form-control" placeholder="Seo Title"
                                   value="{{old('seo_title', isset($program->seo_title)?$program->seo_title:null)}}">
                            <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3" id="content">
                            <label for="form-control-label">SEO Description</label>
                            <textarea id="kt-tinymce-3" name="seo_description"
                                      class="tox-target">{{old('seo_description', isset($program->seo_description)?$program->seo_description:null)}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group row mt-4 ">
                    <div class="col">
                        <textarea class="form-control" name="cost" id="cost"
                                  placeholder="Cost">{{old('cost', isset($program->cost)?$program->cost:null)}}</textarea>
                    </div>
                </div>
                <div class="form-group row mt-4 ">
                    <div class="col">
                        <textarea class="form-control" name="dates" id="dates"
                                  placeholder="Dates">{{old('dates', isset($program->dates)?$program->dates:null)}}</textarea>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-6">
                        <label class="col-form-label">Status</label>
                    </div>
                    <div class="col-6 text-right">
                         <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($program->is_active) && $program->is_active =='1')?"checked":''}}
                                                                       name="is_active">
																<span></span>
															</label>
														</span>

                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-6">
                        <label class="col-form-label">Group Discount Available</label>
                    </div>
                    <div class="col-6 text-right">
                         <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($program->group_discount_available) && $program->group_discount_available =='1')?"checked":''}}
                                                                       name="group_discount_available">
																<span></span>
															</label>
														</span>

                    </div>
                </div>


                <div class="form-group row mt-4 " id="group_discount_description_div">
                    <div class="col">
                        <textarea class="form-control" name="group_discount_description" id="group_discount_description"
                                  placeholder="Group Discount description">{{old('group_discount_description', isset($program->group_discount_description)?$program->group_discount_description:null)}}</textarea>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <div class="col-6">
                        <label class="col-form-label">Sample Itinerary Available</label>
                    </div>
                    <div class="col-6 text-right">
                         <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($program->has_sample_itinerary) && $program->has_sample_itinerary =='1')?"checked":''}}
                                                                       name="has_sample_itinerary">
																<span></span>
															</label>
														</span>

                    </div>
                </div>


                <div class="form-group row mt-4" id="sample_itinerary_description_div">
                    <div class="col">
                            <textarea class="form-control" name="sample_itinerary_description"
                                      id="sample_itinerary_description"
                                      placeholder="Sample Itinerary description">{{old('sample_itinerary_description', isset($program->sample_itinerary_description)?$program->sample_itinerary_description:null)}}</textarea>
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
                <a href="{{route('program.index')}}" class="btn btn-secondary">Cancel</a>
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
    <script src="{{asset('resources/back/assets/js/ajax.js')}}"></script>
    <script>
        $('input[name="tags"]').amsifySuggestags();
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
                        }, short_description: {
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
                    height: 200,
                });
                tinymce.init({
                    selector: '#group_discount_description',
                    toolbar: false,
                    statusbar: false,
                    height: 150,
                });
                tinymce.init({
                    selector: '#sample_itinerary_description',
                    toolbar: false,
                    statusbar: false,
                    height: 150,
                });
                tinymce.init({
                    selector: '#short_description',
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
        $(document).ready(function () {
            $('#group_discount_description_div').hide()
            $('#sample_itinerary_description_div').hide()
        })

        $("input[name='group_discount_available']").change(function () {
            if ($("input[name='group_discount_available']").prop('checked'))
                $('#group_discount_description_div').show()
            else
                $('#group_discount_description_div').hide()
        })

        $("input[name='has_sample_itinerary']").change(function () {
            if ($("input[name='has_sample_itinerary']").prop('checked'))
                $('#sample_itinerary_description_div').show()
            else
                $('#sample_itinerary_description_div').hide()
        })

        function getSubCategories() {
            let categoryId = $("#category_id").val();
            let url = "{{route('subcategory-by-category', [':id'])}}";
            url = url.replace(":id", categoryId);
            ajaxCall('GET', url, 'HTML', '', '#sub_category_div', function (response, selector) {
                    $(selector).html();
                    $(selector).html(response);
                }, function (error) {
                }
            );
        }

    </script>


    <!--end::Page Scripts -->
@endsection
