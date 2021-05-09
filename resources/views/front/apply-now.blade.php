@extends('layouts.front.layout')
@section('content')
    <div class="row wrapper wrapper-1">
        <div class="col-lg-12 my-5">
            <h1 class="text-center">Online Booking Form</h1>
        </div>

    </div>
    <div class="container wrapper wrapper-2 ">
        <div class=" my-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 offset-lg-3 offset-md-2">
                    <p>We are happy that you have decided to join IFRE Volunteer's Program. To reserve your spot, please
                        fill out this form CAREFULLY and submit it with a refundable deposit of $99 (see our refund
                        policy). This deposit is a part of the total application fee of $299.
                    </p>
                    <p>
                        Helping Hand Volunteer guarantees your placement, otherwise, your deposit will be refunded. No
                        application will be valid if the $99 deposit is not paid. We are committed to offering you a
                        life changing and professional volunteer abroad experience. We look forward to receiving your
                        application and working with you.</p>
                    @if(session()->get('msg') =="success")
                        <div class="alert alert-success" role="alert">
                            Your application has been submitted successfully. We will contact you shortly.
                        </div>
                    @endif
                    @if(session()->get('msg') =="error")
                        <div class="alert alert-danger" role="alert">
                            We are having trouble right now please try again later
                        </div>
                    @endif
                    <form action="{{route('application')}}" id="applyNow" method="POST">
                        {{csrf_field()}}
                        <div class="row text-sm">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <input class="form-control" placeholder="First name" id="first_name"
                                           name="first_name" value="{{old('first_name')}}">
                                    <span class="text-danger">{{$errors->first('first_name')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last name" id="last_name" name="last_name"
                                           value="{{old('last_name')}}">
                                    <span class="text-danger">{{$errors->first('last_name')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Phone No" id="phone_no" name="phone_no"
                                           value="{{old('phone_no')}}">
                                    <span class="text-danger">{{$errors->first('phone_no')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" id="emailId"
                                           name="email" value="{{old('email')}}"
                                           type="email">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Complete Address" id="address"
                                           name="address" value="{{old('address')}}">
                                    <span class="text-danger">{{$errors->first('address')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class=" form-group">
                                    <label for="">Date of Birth</label>
                                    <input type="date" class="form-control" placeholder="Date of Birth"
                                           id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth')}}">
                                    <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" id="genderId" name="gender">
                                        <option>Gender</option>
                                        <option value="male" {{old('gender')=='male'?'selected':''}}>Male</option>
                                        <option value="female" {{old('gender')=='female'?'selected':''}}>Female</option>
                                    </select>
                                    <span class="text-danger">{{$errors->first('gender')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nationality" id="nationality"
                                           name="nationality" value="{{old('nationality')}}">
                                    <span class="text-danger">{{$errors->first('nationality')}}</span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" onchange="getPrograms()"
                                            id="destination_id" name="destination_id">
                                        <option value="">Country of choice</option>
                                        @if($destinations->count()>0)
                                            @foreach($destinations as $destination)
                                                <option value="{{$destination->id}}">{{$destination->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="text-danger">{{$errors->first('destination_id')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" onchange="getPackages()" id="program_id"
                                            name="program_id">
                                        <option value="" selected="selected">Select Program</option>
                                    </select>
                                    <span class="text-danger">{{$errors->first('program_id')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" id="package_id" name="package_id"
                                            onchange="getPackageDates()">
                                        <option value="" selected="selected">Select Package</option>
                                    </select>
                                    <span class="text-danger">{{$errors->first('package_id')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="date_id" id="date_id">
                                        <option selected="selected" value="">Select Date</option>

                                    </select>
                                    <span class="text-danger">{{$errors->first('date_id')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="pricing_id" id="pricing_id">
                                        <option selected="selected" value="">Duration of Stay</option>
                                    </select>
                                    <span class="text-danger">{{$errors->first('pricing_id')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea name="emergency_contact_details" id="emergency_contact_details" rows="5"
                                          class="form-control"
                                          placeholder="Emergency contact (name, address, relationship, and phone number)"
                                >{{old('emergency_contact_details')}}</textarea>
                                    <span class="text-danger">{{$errors->first('emergency_contact_details')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea id="academic_qualification" rows="5" class="form-control"
                                          name="academic_qualification"
                                          placeholder="Please explain your academic qualification and any relevant experience: *">{{old('academic_qualification')}}</textarea>
                                    <span class="text-danger">{{$errors->first('academic_qualification')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea id="" rows="5" class="form-control" name="health_condition"
                                          placeholder="Are you in good health mentally and physically for traveling and volunteer work? Have you ever been convicted of a felony? Please explain any medical conditions or legal problems. ">{{old('health_condition')}}</textarea>
                                    {{--                                    <span class="text-danger">{{$errors->first('health_condition')}}</span>--}}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea name="other_applicant_details" id="" rows="5" class="form-control"
                                          placeholder="Are you traveling with other applicants ? If yes write the name of the other applicant/s.">{{old('other_applicant_details')}}</textarea>
                                    {{--                                    <span class="text-danger">{{$errors->first('other_applicant_details')}}</span>--}}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea name="applicant_questions" id="" rows="5" class="form-control"
                                          placeholder="Please write your concerns or questions (if any)">{{old('applicant_questions')}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea name="academic_group_details" id="" rows="5" class="form-control"
                                          placeholder="If you are applying as a high school/college/university group, please list the names of each and every participant.">{{old('academic_group_details')}}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>
                                    <input type="checkbox" id="term_and_condition" name="term_and_condition">
                                    &nbsp;&nbsp;Before making the program deposit, I (We) acknowledge that I
                                    (We)
                                    thoroughly read all of IFRE's Terms and Conditions
                                    <a href="">(Volunteer-Terms and Conditions)</a> for my volunteer placement. I (We)
                                    hereby agree on all the terms and conditions given by IFRE

                                    <a href="">Privacy Policy</a></p>
                                <span class="text-danger">{{$errors->first('first_name')}}</span>
                            </div>

                            <div class="col-12 offset-2">
                                <div class="form-group text-center ml-4">
                                    {!! htmlFormSnippet() !!}
                                    <span class="text-danger">{{$errors->first(' g-recaptcha-response')}}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-default">
                                        Submit your application
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/horizontal-slide.css')}}">
@endsection
@section('page-script')
    <script src="{{asset("resources/front/js/ajax.js")}}"></script>
    <script src="{{asset("resources/front/js/custom-validation.js")}}"></script>
    <script>
        $("#applyNow").submit(() => {
            let temp = [];
            temp.push(isNotNull('#first_name', "First Name is required"));
            temp.push(isNotNull('#last_name', "Last Name is required"));
            temp.push(isNotNull('#phone_no', "Phone No is required"));
            temp.push(isNotNull('#emailId', "Email is required"));
            temp.push(isNotNull('#address', "Address is required"));
            temp.push(isNotNull('#date_of_birth', "Date of birth is required"));
            temp.push(isNotNull('#genderId', "Gender is required"));
            temp.push(isNotNull('#nationality', "Nationality is required"));
            temp.push(isNotNull('#destination_id', "Country is required"));
            temp.push(isNotNull('#program_id', "Program is required"));
            temp.push(isNotNull('#package_id', "Package is required"));
            temp.push(isNotNull('#date_id', "Date is required"));
            temp.push(isNotNull('#pricing_id', "Duration is required"));
            temp.push(isNotNull('#emergency_contact_details', "Emergency Contact Detail is required"));
            temp.push(isNotNull('#academic_qualification', "Academic Qualification is required"));
            temp.push(isChecked('#term_and_condition', "Terms and condition not checked"));
            // health_condition
            // other_applicant_details
            // applicant_questions
            // academic_group_details
            console.log(temp)
            if (temp.includes(false))
                return false
            return true;
        })

        function getPrograms() {
            let destinationId = $("#destination_id").val();
            let url = "{{route('programs-by-destination', ":destination_id")}}"
            url = url.replace(":destination_id", destinationId)
            ajaxCall("GET", url, "JSON", null, "#program_id", function (response, selector) {
                $(selector).html("");
                $(selector).html(buildSelect(response, "Select Program"))
            }, function (response) {
            })
        }

        function getPackages() {
            let programId = $("#program_id").val();
            let url = "{{route('packages-by-program', ":program_id")}}"
            url = url.replace(":program_id", programId)
            ajaxCall("GET", url, "JSON", null, "#package_id", function (response, selector) {
                $(selector).html("");
                $(selector).html(buildSelect(response, "Select Package"))
            }, function (response) {
            })
        }

        function getPackageDates() {
            let packageId = $("#package_id").val();
            let url = "{{route('dates-by-package', ":package_id")}}"
            url = url.replace(":package_id", packageId)
            ajaxCall("GET", url, "JSON", null, "#date_id", function (response, selector) {
                $(selector).html("");
                $(selector).html(buildSelect(response, "Select Dates", 'start_from_text'))
                getPackagePricing()
            }, function (response) {
            })
        }

        function getPackagePricing() {
            let packageId = $("#package_id").val();
            let url = "{{route('prices-by-package', ":package_id")}}"
            url = url.replace(":package_id", packageId)
            ajaxCall("GET", url, "JSON", null, "#pricing_id", function (response, selector) {
                $(selector).html(buildSelect(response, "Select Pricing", 'duration'))
            }, function (response) {
            })
        }

        function buildSelect(value, showOnFirst, displayBy = null) {
            let options = `<option  value="">${showOnFirst}</option>`
            value.forEach((k, v) => {
                options += `<option value="${k.id}">${displayBy ? k[displayBy] : k.title}</option>`
            });
            return options;
        }
    </script>
@endsection
