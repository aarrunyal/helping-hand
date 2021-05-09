<div class="card">
    <div class="card-body">
        <p>{{$inquiry->description}}</p>
        <hr>
        <form action="{{route('inquiry.update', $inquiry->id)}}" class="mt-5" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-4">
                    <label for="">Read</label>
                    <br>
                    <span class="kt-switch kt-switch--success">
            <label>
                <input type="checkbox"
                       {{(isset($inquiry->is_read) && $inquiry->is_read =='1')?"checked":''}}
                       name="is_read">
                <span>Read</span>
            </label>
    </span>
                </div>
                <div class="col-4">
                    <label for="">Emailed</label>
                    <br>
                    <span class="kt-switch kt-switch--success">
            <label>
                <input type="checkbox"
                       {{(isset($inquiry->is_email_forwarded) && $inquiry->is_email_forwarded =='1')?"checked":''}}
                       name="is_email_forwarded">
                <span></span>
            </label>
    </span>
                </div>
                <div class="col-4">
                    <label for="">Served</label>
                    <br>
                    <span class="kt-switch kt-switch--success">
            <label>
                <input type="checkbox"
                       {{(isset($inquiry->is_served) && $inquiry->is_served =='1')?"checked":''}}
                       name="is_served">
                <span></span>
            </label>
    </span>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
