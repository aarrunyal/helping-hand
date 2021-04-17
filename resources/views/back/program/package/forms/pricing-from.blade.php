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

{{--                <div class="col-lg-6 col-md-6 mt-2">--}}
{{--                    <label class="form-control-label">Category</label>--}}
{{--                    <select name="category_id" id="category_id" class="form-control"--}}
{{--                            onchange="getSubCategories()">--}}
{{--                        <option value="">Select Category</option>--}}
{{--                        @if($categories->count()>0)--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <option--}}
{{--                                    value="{{$category->id}}" {{!empty($program) && $category->id == $program->category_id?"selected":null}}>{{$category->title}}</option>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </select>--}}
{{--                    <span class="text-danger">{{ $errors->first('short_description') }}</span>--}}
{{--                </div>--}}
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
