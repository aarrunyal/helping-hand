<!--begin::Form-->
{{-- title, description, is_active, is_requested, --}}
{{ csrf_field() }}
<div class="kt-portlet__body">
    <div class="kt-section">
        <h3 class="kt-section__title">
            Create New
        </h3>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="kt-section__content">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="form-control-label">* Document Name</label>
                            <input type="text" name="title" class="form-control" placeholder="Document Name"
                                value="{{ old('title', isset($document->title) ? $document->title : null) }}">
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                        </div>
                        <div class="col-lg-6" id="description">
                            <label class="form-control-label">* Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description"
                                value="{{ old('description', isset($document->description) ? $document->description : null) }}">
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                        <div class="col-lg-6" id="course_id">
                            <label class="form-control-label">Course Name</label>
                            <select class="form-control" name="course_id" id="course_id">
                                <option value="">Select Course</option>
                                @if ($courses->count() > 0)
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id', isset($document->course_id) ? $document->course_id : '') == $course->id ? 'selected' : '' }}>
                                            {{ ucwords($course->title) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-6" id="access_type">
                            <label class="form-control-label">Access Type</label>
                            <select class="form-control" name="access_type" id="course_id">
                                <option value="">Select Access Type</option>
                                <option value="all"
                                    {{ old('access_type', isset($document->access_type) &&  $document->access_type == 'all' ? $document->access_type : '') ? 'selected' : '' }}>
                                    All</option>
                                <option value="teacher"
                                    {{ old('access_type', isset($document->access_type) &&  $document->access_type == 'teacher'  ? $document->access_type : '') ? 'selected' : '' }}>
                                    Teacher</option>
                                <option value="staff"
                                    {{ old('access_type', isset($document->access_type) &&  $document->access_type == 'staff'  ? $document->access_type : '') ? 'selected' : '' }}>
                                    Staff</option>
                                <option value="student"
                                    {{ old('access_type', isset($document->access_type) &&  $document->access_type == 'student'  ? $document->access_type : '') ? 'selected' : '' }}>
                                    Student</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('access_type') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="form-group row">
                    <label class="col-4 col-form-label">Downloadable</label>
                    <div class="col-4">
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox"
                                    {{ isset($document->downloadable) && $document->downloadable == '1' ? 'checked' : '' }}
                                    name="downloadable">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                  <div class="col-lg-6" id="is_active">
                            <div class="form-group row mt-4">
                                <label class="col-4 col-form-label">Status</label>
                                <div class="col-4">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox"
                                                {{ isset($document->is_active) && $document->is_active == '1' ? 'checked' : '' }}
                                                name="is_active">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                {{-- <div class="form-group row">
                    <label class="col-4 col-form-label">Viewable</label>
                    <div class="col-4">
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox"
                                    {{ isset($document->viewable) && $document->viewable == '1' ? 'checked' : '' }}
                                    name="viewable">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div> --}}
            </div>
        </div>

    </div>
</div>
<div class="kt-portlet__foot">
    <div class="kt-form__actions">
        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-brand">Save</button>
                <a href="{{ route('document.index') }}" class="btn btn-secondary">Cancel</a>
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
                        },
                        access_type: {
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
