@if(!empty($includeExcludes) && $includeExcludes->count()>0)
    @foreach($includeExcludes as $d)
        <div class="form-group row include-exclude-form">
            <input type="text" name="id[]" value="{{$d->id}}" hidden>
            <div class="col-lg-6 col-md-6">
                <label class="form-control-label">* Title</label>
                <input type="text" name="title[]" class="form-control" placeholder="Title"
                       value="{{$d->title}}">
            </div>
            <div class="col-lg-4 col-md-4">
                <label class="form-control-label">* Type</label>
                <select name="type[]" id="" class="form-control">
                    <option value="">Select Type</option>
                    <option value="include" {{$d->type =="include"?"selected":null}}>Include</option>
                    <option value="exclude" {{$d->type =="exclude"?"selected":null}}>Exclude</option>
                </select>
            </div>
            <div class="col-lg-1 col-md-1 mt-4 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               {{(isset($d->is_active) && $d->is_active =='1')?"checked":''}}
                                                                               name="is_active[]">
        																<span></span>
        															</label>
        														</span>
            </div>
            <div class="col-lg-1 col-md-1 mt-4">
                <div class="col-6 text-right" onclick="removeIncludeExclude(this)">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <label class="form-control-label">* Description</label>
                <textarea name="description[]" rows="2" class="form-control">{{$d->description}}</textarea>
            </div>


        </div>
    @endforeach
@endif
<div class="form-group row include-exclude-form">
    <div class="col-lg-6 col-md-6">
        <label class="form-control-label">* Title</label>
        <input type="text" name="title[]" class="form-control" placeholder="Title"
        >
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="form-control-label">* Type</label>
        <select name="type[]" id="" class="form-control">
            <option value="">Select Type</option>
            <option value="include">Include</option>
            <option value="include">Exclude</option>
        </select>
    </div>

    <div class="col-lg-1 col-md-1 mt-4 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               name="is_active[]">
        																<span></span>
        															</label>
        														</span>
    </div>
    <div class="col-lg-1 col-md-1 mt-4">
        <div class="col-6 text-right" onclick="removeIncludeExclude(this)">
            <i class="fas fa-trash"></i>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <label class="form-control-label">* Description</label>
        <textarea name="description[]" rows="2" class="form-control"></textarea>
    </div>


</div>
