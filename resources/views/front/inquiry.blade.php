@extends('layouts.front.layout')
@section('content')
    <div class="row wrapper wrapper-1">
        <div class="col-lg-12 my-5">
            <h1 class="text-center">Inquiry</h1>
        </div>

    </div>
    <div class="container wrapper wrapper-2 ">
        <div class=" my-4">
            <h2 class="text-center" style="color: #4265a2;">Complete The Form Below To Receive Your FREE Volunteer
                Information
                Pack.</h2>
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
            <form action="{{route('submit-inquiry')}}" method="POST" id="inquiryNow">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 offset-lg-3 offset-md-2">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <input class="form-control" placeholder="First name" name="first_name"
                                           id="first_name" value="{{old('first_name')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last name" name="last_name" id="last_name"
                                           value="{{old('last_name')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Telephone No." name="phone_no"
                                           id="phone_no" value="{{old('phone_no')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" id="emailId"
                                           value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Complete Address" name="address"
                                           id="address" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="planed_for" id="planed_for">
                                        <option value="" selected="selected">When are you planning to volunteer?
                                        </option>
                                        <option
                                            {{old('planed_for'=='as_soon_as_possible'?'selected':'')}} value="as_soon_as_possible">
                                            As soon as possible
                                        </option>
                                        <option
                                            {{old('planed_for'=='within_one_mont'?'selected':'')}} value="within_one_mont">
                                            Within one month
                                        </option>
                                        <option
                                            {{old('planed_for'=='within_three_month'?'selected':'')}} value="within_three_month">
                                            Within three months
                                        </option>
                                        <option
                                            {{old('planed_for'=='within_six_month'?'selected':'')}} value="within_six_month">
                                            Within six months
                                        </option>
                                        <option
                                            {{old('planed_for'=='within_a_year'?'selected':'')}} value="within_a_year">
                                            Within a year
                                        </option>
                                        <option {{old('planed_for'=='not_sure'?'selected':'')}} value="not_sure">I am
                                            not sure
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="destination_id" id="destination_id"
                                            onchange="getPrograms()">
                                        <option value="" selected="selected">Country of choice</option>
                                        @if($destinations->count()>0)
                                            @foreach($destinations as $destination)
                                                <option
                                                    {{old('destination_id') == $destination->id ?"selected":null}} value="{{$destination->id}}">{{$destination->title}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="program_id" id="program_id">
                                        <option value="">Select Projects</option>
                                    </select>
                                </div>
                            </div> <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="message_permitted"
                                            id="message_permitted">
                                        <option value="" selected="selected">Do you give us consent to send text
                                            messages
                                            to expedite communication?
                                        </option>
                                        <option {{!empty(old('message_permitted')) && old('message_permitted')==1?'selected':null}} value="1">Yes,
                                            I give consent to receive texts to expedite communication.
                                        </option>
                                        <option {{(!empty(old('message_permitted')) && old('message_permitted')==0)?'selected':null}}  value="0">No, I do
                                            not want to receive text messages at this time.
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <textarea name="description" id="description" rows="5" class="form-control"
                                          placeholder="We'd appreciate if you explain in detail the kind of volunteering project you're passionate about so we can offer you the most rewarding volunteer experience">{{old('description')}}</textarea>
                                </div>
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
                                            Send Me My Information Pack
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </form>
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
        $("#inquiryNow").submit(() => {
            let temp = [];
            temp.push(isNotNull('#first_name', "First Name is required"));
            temp.push(isNotNull('#last_name', "Last Name is required"));
            temp.push(isNotNull('#phone_no', "Phone No is required"));
            temp.push(isNotNull('#emailId', "Email is required"));
            temp.push(isNotNull('#address', "Address is required"));
            temp.push(isNotNull('#planed_for', "Field is required"));
            temp.push(isNotNull('#destination_id', "Destination is required"));
            temp.push(isNotNull('#program_id', "Program is required"));
            temp.push(isNotNull('#message_permitted', "Field is required"));
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

        function buildSelect(value, showOnFirst, displayBy = null) {
            let options = `<option  value="">${showOnFirst}</option>`
            value.forEach((k, v) => {
                options += `<option value="${k.id}">${displayBy ? k[displayBy] : k.title}</option>`
            });
            return options;
        }
    </script>
@endsection
