<div class="row mt-4 child-form">

    <div class="col-4">
        <label class="form-control-label">* Reference</label>
        <select class="form-control" name="child_reference_id[]">
            <option value="" selected>Select {{$type}}</option>
            @if($type =='page' && !empty($pages) )
                @foreach($pages as $page)
                    <option value="{{$page->id}}">{{$page->title}}</option>
                @endforeach
            @endif
            @if($type =='package' && !empty($packages) )
                @foreach($packages as $package)
                    <option value="{{$package->id}}">{{$package->title}}</option>
                @endforeach
            @endif
            @if($type =='program' && !empty($programs) )
                @foreach($programs as $program)
                    <option value="{{$program->id}}">{{$program->title}}</option>
                @endforeach
            @endif
            @if($type =='blog' && !empty($blogs) )
                @foreach($blogs as $blog)
                    <option value="{{$blog->id}}">{{$blog->title}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col-4">
        <label class="form-control-label">* Title</label>
        <input type="text" name="child_title[]" class="form-control"
               placeholder="Menu Title">
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-outline-dark mt-4" onclick="removeForm(this)">
            <i class="fas fa-trash"></i>
        </button>
    </div>

</div>
