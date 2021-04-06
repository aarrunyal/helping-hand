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
                            <label class="form-control-label">* Page Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Page Title"
                                   value="{{old('title', isset($page->title)?$page->title:null)}}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="form-control-label">* Display Title</label>
                            <input type="text" name="name" class="form-control" placeholder="Display Name"
                                   value="{{old('name', isset($page->name)?$page->name:null)}}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="col-lg-3 col-md-3 mt-5">
                            <label class="form-control-label">Placing</label>
                            <select name="placing" id="placing" class="form-control">
                                <option value="null">Select Placing</option>
                                <option
                                    value="header" {{((isset($page->placing)?$page->placing:null)=='header'?'selected':null)}}>
                                    Header
                                </option>
                                <option
                                    value="footer" {{((isset($page->placing)?$page->placing:null)=='footer'?'selected':null)}}>
                                    Footer
                                </option>
                            </select>
                            <span class="text-danger">{{ $errors->first('placing') }}</span>
                        </div>


                            <div class="col-4 mt-5" id="isParent">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="col-form-label">Is Parent</label>
                                    </div>
                                    <div class="col-6">
                              <span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox" checked
                                                                       {{(isset($page->is_parent) && $page->is_parent =='1')?"checked":''}}
                                                                       name="is_parent">
																<span></span>
															</label>
														</span>
                                    </div>

                                </div>

                            </div>
                        @if($parentPages->count()>0)
                            <div class="col-8 form-group mt-5" id="parentPageId">
                                <label class="form-control-label">Parent Page</label>
                                <select class="form-control" name="parent_id" id="">
                                    <option value="">Select Parent Page</option>
                                    @foreach($parentPages as $parentPage)
                                        <option
                                            value="{{$parentPage->id}}" {{(!empty($page->parent_id)?$page->parent_id:null)==$parentPage->id?"selected":null}}>{{ucwords($parentPage->title)}}</option>
                                    @endforeach
                                    {{--                                <option value="">Select Parent Page</option>--}}
                                    {{--                                <option value="">Select Parent Page</option>--}}
                                </select>
                            </div>
                        @endif
                        <div class="col-lg-12 col-md-12 mt-5" id="content">
                            <textarea id="kt-tinymce-4" name="description"
                                      class="tox-target">{{old('description', isset($page->description)?$page->description:null)}}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                </div>

                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12">
                            <label class="form-control-label">Blog Title</label>
                            <input type="text" name="seo_title" class="form-control" placeholder="Seo Title"
                                   value="{{old('seo_title', isset($page->seo_title)?$page->seo_title:null)}}">
                            <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                        </div>
                        <div class="col-lg-12 col-md-12 mt-5">
                            <label class="form-control-label">Seo Keywords</label>
                            {{--                            <input type="text" class="form-control" name="tags" placeholder="Tags"/>--}}
                            <input type="text" name="tags" class="form-control" placeholder="Seo Keywords"
                                   value="{{old('tags', isset($page->seo_keywords)?$page->seo_keywords:null)}}">
                        </div>
                        <div class="col-lg-12 col-md-12 mt-3" id="content">
                            <label for="form-control-label">SEO Description</label>
                            <textarea id="kt-tinymce-3" name="seo_description"
                                      class="tox-target">{{old('seo_description', isset($page->seo_description)?$page->seo_description:null)}}</textarea>
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
                                                                       {{(isset($page->is_active) && $page->is_active =='1')?"checked":''}}
                                                                       name="is_active">
																<span></span>
															</label>
														</span>

                    </div>
                </div>

                <div class="custom-file">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="" name="social_share_image">
                        <label class="custom-file-label" for="social_share_image">Social Share Image</label>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="custom-file">
                        <textarea class="form-control" name="social_share_description" id="social_share_description"
                                  placeholder="Social share description">{{old('social_share_description', isset($page->social_share_description)?$page->social_share_description:null)}}</textarea>
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

    <link rel="stylesheet" src="{{asset('resources/back/assets/css/tags/tags.css')}}">
    <script src="{{asset('resources/back/assets/js/tags/tags.js')}}"
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
                        }, name: {
                            required: true
                        },
                        placing: {
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
        $(document).ready(function () {
            $("#parentPageId").hide();

            @if(!empty($page) && $page->placing == 'header')
            $("#isParent").show();
            @if(!$page->is_parent)
            $("#parentPageId").show();
            @endif
            @endif
        })
        $("input[name='is_parent']").change(function () {
            $("#parentPageId").toggle();
        })

        $("#placing").change(function () {
            let placing = $("#placing").val();
            if (placing === "header")
                $("#isParent").show();
            else {
                $("input[name='is_parent']").val(false)
                $("input[name='parent_id']").val(null)
                $("#isParent").hide();
                $("#parentPageId").hide();
            }
        })
    </script>


    <!--end::Page Scripts -->
@endsection
