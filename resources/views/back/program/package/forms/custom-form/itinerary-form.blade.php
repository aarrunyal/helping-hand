@if (!empty($itineraries) && $itineraries->count() > 0)
    @foreach ($itineraries as $itinerary)
        <div class="form-group row itinerary-form">
            <input type="text" name="id[]" value="{{ $itinerary->id }}" hidden>
            <div class="col-lg-8 col-md-8">
                <label class="form-control-label">* Title</label>
                <input type="text" name="title[]" class="form-control" placeholder="Title"
                    value="{{ $itinerary->title }}">
            </div>
            <div class="col-lg-3 col-md-3 mt-4 text-right">
                <span class="kt-switch kt-switch--success">
                    <label>
                        <input type="checkbox"
                            {{ isset($itinerary->is_active) && $itinerary->is_active == '1' ? 'checked' : '' }}
                            name="is_active[]">
                        <span></span>
                    </label>
                </span>
            </div>
            <div class="col-lg-1 col-md-1 mt-4">
                <div class="col-6 text-right" onclick="removeItinerary(this)">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <label class="form-control-label">* Description</label>
                <textarea name="description[]" rows="2" class="form-control">{{ $itinerary->description }}</textarea>
            </div>
        </div>
    @endforeach
@endif
<div class="form-group row itinerary-form">
    <div class="col-lg-8 col-md-8">
        <label class="form-control-label">* Title</label>
        <input type="text" name="title[]" class="form-control" placeholder="Title">
    </div>
    <div class="col-lg-3 col-md-3 mt-4 text-right">
        <span class="kt-switch kt-switch--success">
            <label>
                <input type="checkbox" name="is_active[]">
                <span></span>
            </label>
        </span>
    </div>
    <div class="col-lg-1 col-md-1 mt-4">
        <div class="col-6 text-right" onclick="removeItinerary(this)">
            <i class="fas fa-trash"></i>
        </div>
    </div>
    <div class="col-lg-12 col-md-12">
        <label class="form-control-label">* Description</label>
        <textarea name="description[]" rows="2" class="form-control"></textarea>
    </div>
</div>
