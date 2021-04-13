<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="kt-section__content" id="destination-input-container">
                    <div class="row mt-3">
                        <div class=" col-lg-10 col-md-10">
                            <label class="form-control-label">* Title</label>
                                <input type="text" name="title[]" class="form-control" value="{{!empty($destination)?$destination->title:null}}" placeholder="Destination Title">
                        </div>
                        @if(empty($destination))
                            <div class=" col-lg-2 col-md-2 mt-4">
                                <button type="button" class="btn btn-outline-dark" onclick="removeForm(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                @if(empty($destination))
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 mt-4">
                            <button type="button" class="btn btn-outline-dark" id="btn-add">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                @endif

            </div>

            <div class="col-lg-4 col-md-4">

                <div class="form-group row mt-3">
                    <label class="col-1 col-form-label">Status</label>
                    <span class="kt-switch kt-switch--success ml-5">
															<label>
																<input type="checkbox"
                                                                       {{(isset($destination->is_active) && $destination->is_active =='1')?"checked":''}}
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
                <button type="submit" class="btn btn-brand" id="btn-save">Save</button>
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
        $("#btn-add").click(() => {
            let html = `  <div class="row mt-3">
                            <div class=" col-lg-10 col-md-10">
                                <label class="form-control-label">* Title</label>
                                <input type="text" name="title[]" class="form-control" placeholder="Destination Title">
                            </div>
                            <div class=" col-lg-2 col-md-2 mt-4">
                                <button type="button" class="btn btn-outline-dark" onclick="removeForm(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                    </div>`
            $("#destination-input-container").append(html);
        })


        function removeForm(e) {
            $(e).closest('.row').html("");
        }

        $("#destination-create").submit((e) => {
            let flag = [];
            $.each($('input[name="title[]"]'), (i, v) => {
                if (!$(v).val()) {
                    flag.push(false);
                    $(v).css({"border": "1px solid red"});
                    $(v).next('span').remove()
                    $(v).after(`<span class="text-danger">Field is required</span>`)
                    setTimeout(() => {
                        $(v).css({"border": "1px solid lightgrey"});
                        $(v).next('span').remove()
                    }, 3000)
                } else {
                    flag.push(true);
                }
            })
            if (flag.includes(false))
                return false;
            return true;
        })

    </script>


    <!--end::Page Scripts -->
@endsection
