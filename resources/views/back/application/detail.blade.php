<div class="card">
    <div class="card-body">
        {{--        emergency_contact_details--}}
        {{--        academic_qualification--}}
        {{--        health_condition--}}
        {{--        other_applicant_details--}}
        {{--        applicant_questions--}}
        {{--        academic_group_details--}}
        @if(!empty($application->emergency_contact_details))
            <label><strong>Emergency Contact Detail</strong></label>
            <p>{{$application->emergency_contact_details}}</p>
            <hr>
        @endif
        @if(!empty($application->academic_qualification))
            <label><strong>Academic Qualification</strong></label>
            <p>{{$application->academic_qualification}}</p>
            <hr>
        @endif
        @if(!empty($application->health_condition))
            <label><strong>Health Condition</strong></label>
            <p>{{$application->health_condition}}</p>
            <hr>
        @endif
        @if(!empty($application->other_applicant_details))
            <label><strong>Other Applicant Details</strong></label>
            <p>{{$application->other_applicant_details}}</p>
            <hr>
        @endif
        @if(!empty($application->academic_group_details))
            <label><strong>Academic Group Detail</strong></label>
            <p>{{$application->academic_group_details}}</p>
            <hr>
        @endif
        <form action="{{route('application.update', $application->id)}}" class="mt-5" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-4">
                    <label for="">Read</label>
                    <br>
                    <span class="kt-switch kt-switch--success">
            <label>
                <input type="checkbox"
                       {{(isset($application->is_read) && $application->is_read =='1')?"checked":''}}
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
                       {{(isset($application->is_email_forwarded) && $application->is_email_forwarded =='1')?"checked":''}}
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
                       {{(isset($application->is_served) && $application->is_served =='1')?"checked":''}}
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
