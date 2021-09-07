<!--begin::Form-->
{{-- title, description, is_active, is_requested, --}}
{{ csrf_field() }}
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
                            <label class="form-control-label">* Course Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Course Name"
                                value="{{ old('title', isset($course->title) ? $course->title : null) }}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-6" id="description">
                           <label class="form-control-label">* Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description"
                            value="{{ old('description', isset($course->description) ? $course->description : null) }}">
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group row">
                    <label class="col-4 col-form-label">Status</label>
                    <div class="col-4">
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox"
                                    {{ isset($course->is_active) && $course->is_active == '1' ? 'checked' : '' }}
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
                <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>

@section('page-script')
    <script src="{{ asset('resources/back/assets/plugins/custom/tinymce/tinymce.bundle.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('resources/back/assets/js/pages/crud/forms/editors/tinymce.js') }}" type="text/javascript">
    </script>
    <script>
        var KTFormControls = function() {
            var demo2 = function() {
                $("#kt_form_2").validate({
                    rules: {
                        title: {
                            required: true
                        },
                        description: {
                            required: true
                        }
                    },
                    invalidHandler: function(event, validator) {
                        swal.fire({
                            "title": "",
                            "text": "There are some errors in your submission. Please correct them.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            "onClose": function(e) {
                                console.log()
                            }
                        });
                        event.preventDefault();
                    },
                    submitHandler: function(form) {
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
                init: function() {
                    demo2();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormControls.init();
        });
    </script>

@endsection
