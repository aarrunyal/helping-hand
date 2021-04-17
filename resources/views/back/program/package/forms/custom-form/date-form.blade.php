@if(!empty($dates) && $dates->count()>0)
    @foreach($dates as $date)
        <div class="form-group row date-form">
            <input type="text" name="id[]" value="{{$date->id}}" hidden>
            <div class="col-lg-4 col-md-4">
                <label class="form-control-label">* Start From</label>
                <input type="date" name="start_from[]" class="form-control" placeholder="Price" value="{{formatDate($date->start_from)}}">
            </div>

            <div class="col-lg-4 col-md-4">
                <label class="form-control-label">* End To</label>
                <input type="date" name="end_to[]" class="form-control" placeholder="Period"  value="{{formatDate($date->end_to)}}">
            </div>

            <div class="col-lg-2 col-md-2 mt-4">
                <div class="col-6 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               name="is_active[]">
        																<span></span>
        															</label>
        														</span>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 mt-4">
                <div class="col-6 text-right" onclick="removeDate(this)">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="form-group row date-form">
    <div class="col-lg-4 col-md-4">
        <label class="form-control-label">* Start From</label>
        <input type="date" name="start_from[]" class="form-control" placeholder="Price">
    </div>

    <div class="col-lg-4 col-md-4">
        <label class="form-control-label">* End To</label>
        <input type="date" name="end_to[]" class="form-control" placeholder="Period">
    </div>

    <div class="col-lg-2 col-md-2 mt-4">
        <div class="col-6 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               name="is_active[]">
        																<span></span>
        															</label>
        														</span>
        </div>
    </div>
    <div class="col-lg-1 col-md-1 mt-4">
        <div class="col-6 text-right" onclick="removeDate(this)">
            <i class="fas fa-trash"></i>
        </div>
    </div>
</div>
