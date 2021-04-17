<script src="{{asset('resources/back/assets/plugins/custom/tinymce/tinymce.bundle.js')}}"
        type="text/javascript"></script>
<script src="{{asset('resources/back/assets/js/pages/crud/forms/editors/tinymce.js')}}"
        type="text/javascript"></script>
<link rel="stylesheet" src="{{asset('resources/back/assets/css/tags/tags.css')}}">
<script src="{{asset('resources/back/assets/js/tags/tags.js')}}" type="text/javascript"></script>
<script src="{{asset('resources/back/assets/js/ajax.js')}}"></script>
<script src="{{asset('resources/back/assets/js/custom-validation.js')}}"></script>

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
    $('input[name="tags"]').amsifySuggestags();
    /*validation*/
    var KTFormControls = function () {
        // Private functions
        var demo2 = function () {
            $("#package-form").validate({
                // define validation rules
                rules: {
                    //= Client Information(step 3)
                    // Billing Information
                    title: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    program_id: {
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


{{--Pricing scriptis--}}
<script>
    function getPricingForm() {
        let url = '{{route("package-pricing-custom-form")}}'
        ajaxCall('GET', url, 'HTML', '', '#pricing-form-id', function (response, selector) {
                $(selector).append(response);
            }, function (error) {
            }
        );
    }

    $("#pricing-form").submit((e) => {
        let flag = [];
        $.each($(".pricing-form"), (k, v) => {
            let price = $(v).find('input[name="price[]"]').val()
            let period = $(v).find('input[name="period[]"]').val()
            let unit = $(v).find('input[name="unit[]"]').val()
            let temp = true;
            temp = validateNumber(price, 'input[name="price[]"]', "Not a valid input");
            flag.push(temp)
            temp = isNotNull(period, 'input[name="period[]"]');
            flag.push(temp)
            temp = isNotNull(unit, 'input[name="unit[]"]')
            flag.push(temp)
        })
        if (flag.includes(false))
            return false
        return true
    })

    function removePricing(e) {
        $(e).closest('.pricing-form').remove()
    }
</script>

{{--Date script--}}
<script>
    function getDateForm() {
        let url = '{{route("package-date-custom-form")}}'
        ajaxCall('GET', url, 'HTML', '', '#date-form-id', function (response, selector) {
                $(selector).append(response);
            }, function (error) {
            }
        );
    }

    $("#date-form").submit((e) => {
        let flag = [];
        $.each($(".date-form"), (k, v) => {
            let start_from = $(v).find('input[name="start_from[]"]').val()
            let end_to = $(v).find('input[name="end_to[]"]').val()
            let temp = true;
            temp = isNotNull(start_from, 'input[name="start_from[]"]');
            flag.push(temp)
            temp = isNotNull(end_to, 'input[name="end_to[]"]')
            flag.push(temp)
        })
        if (flag.includes(false))
            return false
        return true
    })

    function removeDate(e) {
        $(e).closest('.date-form').remove()
    }
</script>

{{--Itineary script--}}
<script>
    function getItineraryForm() {
        let url = '{{route("package-itinerary-custom-form")}}'
        ajaxCall('GET', url, 'HTML', '', '#itinerary-form-id', function (response, selector) {
                $(selector).append(response);
            }, function (error) {
            }
        );
    }

    function removeItinerary(e) {
        $(e).closest('.itinerary-form').remove()
    }

    $("#itinerary-form").submit((e) => {
        let flag = [];
        $.each($(".itinerary-form"), (k, v) => {
            let title = $(v).find('input[name="title[]"]').val()
            let description = $(v).find('textarea[name="description[]"]').val()
            let temp = true;
            temp = isNotNull(title, 'input[name="title[]"]');
            flag.push(temp)
            temp = isNotNull(description, 'textarea[name="description[]"]')
            flag.push(temp)
        })
        if (flag.includes(false))
            return false
        return true
    })
</script>

{{--FAQ script--}}
<script>
    function getFaqForm() {
        let url = '{{route("package-faq-custom-form")}}'
        ajaxCall('GET', url, 'HTML', '', '#faq-form-id', function (response, selector) {
                $(selector).append(response);
            }, function (error) {
            }
        );
    }

    function removeFaq(e) {
        $(e).closest('.faq-form').remove()
    }

    $("#faq-form").submit((e) => {
        let flag = [];
        $.each($(".faq-form"), (k, v) => {
            let title = $(v).find('input[name="title[]"]').val()
            let description = $(v).find('textarea[name="description[]"]').val()
            let temp = true;
            temp = isNotNull(title, 'input[name="title[]"]');
            flag.push(temp)
            temp = isNotNull(description, 'textarea[name="description[]"]')
            flag.push(temp)
        })
        if (flag.includes(false))
            return false
        return true
    })
</script>
