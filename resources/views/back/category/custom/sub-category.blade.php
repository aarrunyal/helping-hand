<label class="form-control-label">Sub Category</label>
<select name="sub_category_id" id="sub_category_id" class="form-control">
    <option value="">Select Sub Category</option>
    @if($categories->count()>0)
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    @endif
</select>
