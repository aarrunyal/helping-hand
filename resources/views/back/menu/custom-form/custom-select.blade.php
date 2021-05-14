<label class="form-control-label">* Reference</label>
<select class="form-control" name="reference_id" id="reference_id">
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
