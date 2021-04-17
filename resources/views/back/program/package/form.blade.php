<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical"
                         data-tabs="tabs">
                        <a class="nav-link active" id="v-pills-details-tab" data-toggle="tab" href="#v-pills-details"
                           role="tab" aria-controls="v-pills-details" aria-selected="true">Details</a>
                        <a class="nav-link" id="v-pills-pricing-tab" data-toggle="tab" href="#v-pills-pricing"
                           role="tab" aria-controls="v-pills-pricing" aria-selected="false">Pricing</a>
                        <a class="nav-link" id="v-pills-dates-tab" data-toggle="tab" href="#v-pills-dates"
                           role="tab" aria-controls="v-pills-dates" aria-selected="false">Dates</a>
                        <a class="nav-link" id="v-pills-itinerary-tab" data-toggle="tab" href="#v-pills-itinerary"
                           role="tab" aria-controls="v-pills-itinerary" aria-selected="false">Itinerary</a>
                        <a class="nav-link" id="v-pills-faq-tab" data-toggle="tab" href="#v-pills-faq"
                           role="tab" aria-controls="v-pills-faq" aria-selected="false">Faqs</a></div>
                    <div class="tab-content ml-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                             aria-labelledby="v-pills-details-tab">
                            @include('back.program.package.forms.package-from')
                        </div>
                        <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel"
                             aria-labelledby="v-pills-pricing-tab">
                            @include('back.program.package.forms.pricing-from')
                        </div>
                        <div class="tab-pane fade" id="v-pills-dates" role="tabpanel"
                             aria-labelledby="v-pills-dates-tab">
                            @include('back.program.package.forms.dates-from')
                        </div>
                        <div class="tab-pane fade" id="v-pills-itinerary" role="tabpanel"
                             aria-labelledby="v-pills-itinerary-tab">
                            @include('back.program.package.forms.itinerary-from')
                        </div>
                        <div class="tab-pane fade" id="v-pills-faq" role="tabpanel"
                             aria-labelledby="v-pills-faq-tab">
                            @include('back.program.package.forms.faq-from')
                        </div>
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
                <a href="{{route('package.index')}}" class="btn btn-secondary">Cancel</a>
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
    <script src="{{asset('resources/back/assets/js/tags/tags.js')}}" type="text/javascript"></script>
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
                tinymce.init({
                    selector: '#more_info',
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
