<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="kt-section__content" id="destination-input-container">
                    <div class="row mt-3">
                        <div class=" col-lg-4 col-md-4">
                            <label class="form-control-label">* Type</label>
                            <select class="form-control" name="type" id="type" onchange="getCustomForm()">
                                {{--                                <option value="" selected>Select Type</option>--}}
                                <option
                                    {{old('type',(!empty($menu)?$menu->type:'')=='single'?'selected':null)}} value="single">
                                    Single
                                </option>
                                <option
                                    {{old('type',(!empty($menu)?$menu->type:'')=='page'?'selected':null)}} value="page">
                                    Page
                                </option>
                                <option
                                    {{old('type',(!empty($menu)?$menu->type:'')=='blog'?'selected':null)}} value="blog">
                                    Blog
                                </option>
                                <option
                                    {{old('type',(!empty($menu)?$menu->type:'')=='program'?'selected':null)}} value="program">
                                    Program
                                </option>
                                <option
                                    {{old('type',(!empty($menu)?$menu->type:'')=='package'?'selected':null)}} value="package">
                                    Package
                                </option>
                            </select>
                        </div>
                        <div class=" col-lg-4 col-md-4">
                            <label class="form-control-label">* Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{old('title',!empty($menu)?$menu->title:null)}}" placeholder="Menu Title">
                        </div>
                        <div class=" col-lg-4 col-md-4">
                            <label class="form-control-label">* Position</label>
                            <select name="position" id="" class="form-control">
                                @for($i=1; $i<=10; $i++)
                                    <option
                                        value="{{$i}}" {{old('position', (!empty($menu)&&$menu->position?$menu->position:'10')=='10'?'selected':'')}}> {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class=" col-lg-4 col-md-4 mt-3" id="link_div">
                            <label class="form-control-label">* Link</label>
                            <input type="text" name="link" id="link" class="form-control"
                                   value="{{old('link', !empty($menu)?$menu->link:null)}}" placeholder="Menu Link">
                        </div>
                        <div class=" col-lg-4 col-md-4 mt-3" id="reference_id_div">
                            @if(!empty($menu) && $menu->is_parent == 0)
                                <select id="reference_id" name="reference_id">
                                    <option value="{{$menu->reference_id}}" selected>{{$menu->reference_id}}</option>
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-5" id="child_section">
                    <div class="col-6">
                        <h5>Child Menu</h5>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-outline-dark"
                                onclick="getCustomChildForm()">
                            <i class="fas fa-plus"></i>
                        </button>

                    </div>
                    <div class="col-12" id="child_div">
                        @if(!empty($menu) && $menu->children->count()>0)
                            @foreach($menu->children as $child)
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-control-label">* Title</label>
                                        <input type="text" name="child_reference_id[]" value="{{$child->reference_id}}"
                                               hidden>
                                        <input type="text" name="child_id[]" value="{{$child->id}}" hidden>
                                        <input type="text" name="child_title[]" class="form-control"
                                               value="{{$child->title}}"
                                               placeholder="Menu Title" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-control-label">* Link</label>
                                        <input type="text" class="form-control" value="{{$child->link}}"
                                               placeholder="Menu Link" readonly>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-outline-dark mt-4"
                                                onclick="removeForm(this)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">

                <div class="form-group row mt-3">
                    <label class="col-1 col-form-label">Have no children</label>
                    <span class="kt-switch kt-switch--success ml-5">
															<label>
																<input type="checkbox"
                                                                       onchange="triggerEventForNonParent()"
                                                                       {{(isset($menu->is_parent) && $menu->is_parent =='1')?"checked":''}}
                                                                       name="is_parent" id="is_parent">
																<span></span>
															</label>
														</span>
                </div>
                <div class="form-group row mt-3">
                    <label class="col-1 col-form-label">Status</label>
                    <span class="kt-switch kt-switch--success ml-5">
															<label>
																<input type="checkbox"
                                                                       {{(isset($menu->is_active) && $menu->is_active =='1')?"checked":''}}
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
    <script src="{{asset('resources/back/assets/js/ajax.js')}}"></script>
    <script src="{{asset('resources/back/assets/js/custom-validation.js')}}"></script>
    <script>
        $(document).ready(() => {
            // $("#link_div").hide()
            $("#reference_id_div").hide()
            $("#child_section").hide()
            @if(!empty($menu))
            $("#link_div").show()
            @if($menu->is_parent && $menu->children->count()>0)
            $("#is_parent").prop('checked', true)
            triggerEventForNonParent()
            @endif
            @endif
        })

        function removeForm(e) {
            $(e).closest('.row').remove();
        }

        $('select[name="type"]').change(() => {
            $("#link_div").hide()
            $("#reference_id_div").hide()
            let selection = $('select[name="type"]').val();
            if (selection == 'single') {
                $("#link_div").show()
            } else {
                $("#reference_id_div").show()
            }
        })

        $("#menu").submit((e) => {
            let title = $("input[name='title']").val()
            let link = $("input[name='link']").val()
            let type = $("select[name='type']").val()
            let referenceId = $("select[name='reference_id']").val()
            let isParent = $("input[name='is_parent']").prop("checked")
            let flag = [];
            flag.push(isNotNull(title, "input[name='title']"));
            flag.push(isNotNull(type, "select[name='type']"));
            if (!isParent) {
                if (type == 'single')
                    flag.push(isNotNull(link, "input[name='link']"));
                else
                    flag.push(isNotNull(referenceId, "select[name='reference_id']"));
            }
            console.log(flag)
            if (flag.includes(false))
                return false;
            if (isParent)
                return validateChildren()
            return true;
        })

        function getCustomForm() {
            let type = $("select[name='type']").val()
            if (type == 'single')
                return false;
            let url = '{{route('menu.custom-form', ':type')}}';
            url = url.replace(':type', type);
            ajaxCall('GET', url, 'HTML', '', '#reference_id_div', function (response, selector) {
                $(selector).html('')
                $(selector).html(response)
            }, function (error) {

            })
        }

        function triggerEventForNonParent() {
            let isParent = $('#is_parent').prop('checked');
            if (isParent) {
                $("#child_section").show()
                $("#link_div").hide()
                $("#reference_id_div").html('')
                getCustomChildForm()
            } else {
                $("#child_div").html('')
                $("#reference_id_div").show()
                getCustomForm()
            }
        }

        // $("#is_parent").change(() => {
        //
        // })

        function getCustomChildForm() {
            let type = $("select[name='type']").val()
            let url = '{{route("menu.child-form", ":type")}}';
            url = url.replace(':type', type);
            ajaxCall('GET', url, 'HTML', '', '#child_div', function (response, selector) {
                $(selector).append(response)
            }, function (error) {

            })
        }

        function validateChildren() {
            let flag = [];
            $.each($(".child-form"), (i, v) => {
                flag = [];
                let select = $(v).find('select').val();
                let title = $(v).find('input').val();
                flag.push(isNotNull(select, "select[name='child_reference_id[]']", 'This field is required'));
                flag.push(isNotNull(title, "input[name='child_title[]']", 'Title is required'));
            })
            if (flag.includes(false))
                return false;
            return true;
        }

    </script>


    <!--end::Page Scripts -->
@endsection
