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
                            <label class="form-control-label">* Category Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Category Name"
                                   value="{{old('title', isset($category->title)?$category->title:null)}}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-6" id="parent_category_id">
                            <label class="form-control-label">Parent Category Id</label>
                            <select class="form-control" name="parent_id" id="parent_id">
                                <option value="">Select Parent Category Id</option>
                                @if($parentCategories->count()>0)
                                    @foreach($parentCategories as $parentCategory)
                                        <option value="{{$parentCategory->id}}"
                                            {{(old('parent_id', isset($category->parent_id)?$category->parent_id:''))==$parentCategory->id?'selected':''}}>
                                            {{ucwords($parentCategory->title)}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <div class="form-group row">
                    <label class="col-4 col-form-label">Parent</label>
                    <div class="col-4">
														<span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox" name="is_parent" id="is_parent"
                                                                       {{(isset($category->is_parent) && $category->is_parent =='1')?"checked":''}}
                                                                       onchange="">
																<span></span>
															</label>
														</span>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-4 col-form-label">Status</label>
                    <div class="col-4">
														<span class="kt-switch kt-switch--success">
															<label>
																<input type="checkbox"
                                                                       {{(isset($category->is_active) && $category->is_active =='1')?"checked":''}}
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
                <a href="{{route('category.index')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@section('page-script')
    <script src="{{asset('resources/back/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('resources/back/assets/js/pages/crud/forms/editors/tinymce.js')}}"
            type="text/javascript"></script>
    <!--begin::Page Scripts(used by this page) -->
    <script>
        $('input[name="is_parent"]').change(function () {
            if ($('input[name="is_parent"]').prop('checked')) {
                $('#parent_category_id').hide()
                $("#parent_id").rules('remove');
            } else {
                $('#parent_category_id').show()
                $("#parent_id").rules('add', {
                    required: true,
                });
            }
        })
    </script>
    <script>

        var KTFormControls = function () {
            var demo2 = function () {
                $("#kt_form_2").validate({
                    rules: {
                        title: {
                            required: true
                        }, parent_id: {
                            required: true
                        }
                    },
                    invalidHandler: function (event, validator) {
                        swal.fire({
                            "title": "",
                            "text": "There are some errors in your submission. Please correct them.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            "onClose": function (e) {
                                console.log()
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
            @if(!empty($category) && $category->is_parent)
            $('#parent_category_id').hide()
            @endif
        });

    </script>

@endsection
