@if(!empty($pricings) && $pricings->count()>0)
    @foreach($pricings as $price)
        <div class="form-group row pricing-form">
            <input type="text" name="id[]" class="form-control" placeholder="Price" value="{{!empty($price)?$price->id:null}}" hidden>
            <div class="col-lg-3 col-md-3">
                <label class="form-control-label">* Price</label>
                <input type="text" name="price[]" class="form-control" placeholder="Price" value="{{!empty($price)?$price->price:null}}">
            </div>

            <div class="col-lg-3 col-md-3">
                <label class="form-control-label">* Period</label>
                <input type="text" name="period[]" class="form-control" placeholder="Period" value="{{!empty($price)?$price->period:null}}">
            </div>
            <div class="col-lg-3 col-md-3">
                <label class="form-control-label">Period Unit</label>
                <input type="text" name="unit[]" class="form-control" placeholder="Unit" value="{{!empty($price)?$price->unit:null}}">
            </div>

            <div class="col-lg-2 col-md-2 mt-4">
                <div class="col-6 text-right">
                                 <span class="kt-switch kt-switch--success">
        															<label>
        																<input type="checkbox"
                                                                               {{(isset($price->is_active) && $price->is_active =='1')?"checked":''}}
                                                                               name="is_active[]">
        																<span></span>
        															</label>
        														</span>
                </div>
            </div><div class="col-lg-1 col-md-1 mt-4">
                <div class="col-6 text-right" onclick="removePricing(this)">
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        </div>
    @endforeach
@endif
<div class="form-group row pricing-form">
    <div class="col-lg-3 col-md-3">
        <label class="form-control-label">* Price</label>
        <input type="text" name="price[]" class="form-control" placeholder="Price">
    </div>

    <div class="col-lg-3 col-md-3">
        <label class="form-control-label">* Period</label>
        <input type="text" name="period[]" class="form-control" placeholder="Period">
    </div>
    <div class="col-lg-3 col-md-3">
        <label class="form-control-label">Period Unit</label>
        <input type="text" name="unit[]" class="form-control" placeholder="Unit">
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
        <div class="col-6 text-right" onclick="removePricing(this)">
                               <i class="fas fa-trash"></i>
        </div>
    </div>
</div>
