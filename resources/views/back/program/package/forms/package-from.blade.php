<form class="kt-form kt-form--label-right" id="package-form" method="POST" enctype="multipart/form-data"
      @if(empty($package))  action="{{route('package.store')}}"
      @else action="{{route('package-update', $package->slug)}}" @endif
>
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-8 col-md-8">
            {{--        <ul>--}}
            {{--            @foreach ($errors->all() as $error)--}}
            {{--                <li>{{ $error }}</li>--}}
            {{--            @endforeach--}}
            {{--        </ul>--}}
            <span>

                        </span>
            <div class="kt-section__content">
                <div class="form-group row">

                    <div class="col-lg-6 col-md-6">
                        <label class="form-control-label">* Package Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Package Title"
                               value="{{old('title', isset($package->title)?$package->title:null)}}">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="" for="image">Feature Image</label>
                        <input type="file" class="form-control" id="" name="image">
                    </div>


                    <div class="col-lg-6 col-md-6 mt-4">
                        <label class="form-control-label">Category</label>
                        <select name="program_id" id="program_id" class="form-control">
                            <option value="">Select Category</option>
                            @if($programs->count()>0)
                                @foreach($programs as $program)
                                    <option
                                        value="{{$program->id}}" {{!empty($package) && $program->id == $package->program_id?"selected":null}}>{{$program->title}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    </div>

                    <div class="col-lg-6 col-md-6 mt-4">
                        <label class="form-control-label">Destinations</label>
                        <select name="destination_id" id="destination_id" class="form-control">
                            <option value="">Select Destination</option>
                            @if($destinations->count()>0)
                                @foreach($destinations as $destination)
                                    <option
                                        value="{{$destination->id}}" {{!empty($package) && $destination->id == $package->destination_id?"selected":null}}>{{$destination->title}}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    </div>

                    <div class="col-lg-12 col-md-12 mt-2">
                        <label class="form-control-label">Package Short Description</label>
                        <textarea class="form-control"
                                  id="short_description"
                                  name="short_description">{{old('short_description', isset($package->short_description)?$package->short_description:null)}}</textarea>
                        <span class="text-danger">{{ $errors->first('short_description') }}</span>
                    </div>

                    <div class="col-lg-12 col-md-12 mt-4">
                        <label class="form-control-label">Package Description</label>
                        <textarea id="kt-tinymce-4" class="form-control"
                                  name="description">{{old('description', isset($package->description)?$package->description:null)}}</textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-4">
                        <label class="form-control-label">Other Details</label>
                        <textarea class="form-control" name="more_info"
                                  id="more_info"
                                  placeholder="Other Details">{{old('more_info', isset($package->more_info)?$package->more_info:null)}}</textarea>
                    </div>
                </div>
            </div>

            <div class="kt-section__content">
                <div class="form-group row">
                    <div class="col-lg-12 col-md-12">
                        <label class="form-control-label">Seo Title</label>
                        <input type="text" name="seo_title" class="form-control" placeholder="Seo Title"
                               value="{{old('seo_title', isset($package->seo_title)?$package->seo_title:null)}}">
                        <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-3" id="content">
                        <label for="form-control-label">SEO Description</label>
                        <textarea id="kt-tinymce-3" name="seo_description"
                                  class="tox-target">{{old('seo_description', isset($package->seo_description)?$package->seo_description:null)}}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">

            <div class="form-group row mt-4 ">
                <div class="col">
                    <label for="form-control-label">COST description</label>
                    <textarea class="form-control" name="cost_description" id="cost_description"
                              placeholder="Cost">{{old('cost_description', isset($package->cost_description)?$package->cost_description:null)}}</textarea>
                </div>
            </div>
            <div class="form-group row mt-4 ">
                <div class="col">
                    <label for="form-control-label">Dates description</label>
                    <textarea class="form-control" name="dates_description" id="dates_description"
                              placeholder="Dates">{{old('dates_description', isset($package->dates_description)?$package->dates_description:null)}}</textarea>
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-6">
                    <label class="col-form-label">Is Free</label>
                </div>
                <div class="col-6 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               {{(isset($package->is_free) && $package->is_free =='1')?"checked":''}}
                                                                               name="is_free" id="is_free">
        																<span></span>
        															</label>
        														</span>

                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-6">
                    <label class="col-form-label">Dates Availability</label>
                </div>
                <div class="col-6 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               {{(isset($package->dates_available) && $package->dates_available =='1')?"checked":''}}
                                                                               name="dates_available"
                                                                               id="dates_available">
        																<span></span>
        															</label>
        														</span>

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
                                                                               {{(isset($package->is_active) && $package->is_active =='1')?"checked":''}}
                                                                               name="is_active">
        																<span></span>
        															</label>
        														</span>

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
</form>
