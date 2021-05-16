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
                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">* Blog Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Blog Title"
                                   value="{{old('title', isset($blog->title)?$blog->title:null)}}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-9 col-md-9 mt-5">
                            <label class="form-control-label">Tags</label>
                            {{--                            <input type="text" class="form-control" name="tags" placeholder="Tags"/>--}}
                            <input type="text" name="tags" class="form-control" placeholder="Tags"
                                   value="{{old('tags', isset($blog->tags)?$blog->tags:null)}}">
                            {{--                            <span class="text-danger">{{ $errors->first('title') }}</span>--}}
                        </div>
                        <div class="col-lg-3 col-md-3 mt-5">
{{--                            <label class="form-control-label">Type</label>--}}
{{--                            <select name="type" id="" class="form-control">--}}
{{--                                <option value="null">Select Type</option>--}}
{{--                                <option--}}
{{--                                    value="blog" {{((isset($blog->type)?$blog->type:null)=='blog'?'selected':null)}}>--}}
{{--                                    Blog--}}
{{--                                </option>--}}
{{--                                <option--}}
{{--                                    value="news" {{((isset($blog->type)?$blog->type:null)=='news'?'selected':null)}}>--}}
{{--                                    News--}}
{{--                                </option>--}}
{{--                            </select>--}}
                            <input type="text" value="blog" name="blog">
                            {{--                            <span class="text-danger">{{ $errors->first('title') }}</span>--}}
                        </div>
                        <div class="col-lg-12 col-md-12 mt-5" id="content">
                            <textarea id="kt-tinymce-4" name="content"
                                      class="tox-target">{{old('content', isset($blog->content)?$blog->content:null)}}</textarea>
                            <span class="text-danger">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                </div>

                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">Blog Title</label>
                            <input type="text" name="seo_title" class="form-control" placeholder="Seo Title"
                                   value="{{old('seo_title', isset($blog->seo_title)?$blog->seo_title:null)}}">
                            <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3" id="content">
                            <label for="form-control-label">SEO Description</label>
                            <textarea id="kt-tinymce-3" name="seo_description"
                                      class="tox-target">{{old('seo_description', isset($blog->seo_description)?$blog->seo_description:null)}}</textarea>
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
                                                                       {{(isset($blog->is_active) && $blog->is_active =='1')?"checked":''}}
                                                                       name="is_active">
																<span></span>
															</label>
														</span>

                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-6">
                        <label class="col-form-label">Featured</label>
                    </div>
                    <div class="col-6 text-right">
                         <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($blog->is_featured) && $blog->is_featured =='1')?"checked":''}}
                                                                       name="is_featured">
																<span></span>
															</label>
														</span>

                    </div>
                </div>


                <div class="form-group row mt-4">
                    <div class="custom-file">
                        <textarea class="form-control" name="social_share_description" id="social_share_description"
                                  placeholder="Social share description">{{old('social_share_description', isset($blog->social_share_description)?$blog->social_share_description:null)}}</textarea>
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
                <a href="{{route('blog.index')}}" class="btn btn-secondary">Cancel</a>
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
                        },
                        content: {
                            required: true
                        }, type: {
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
