@extends('layouts.front.layout')
@section('content')
        <div class="row wrapper wrapper-1">
            <div class="col-lg-12 my-5">
                <h1 class="text-center">Inquiry</h1>
            </div>

        </div>
    <div class="wrapper wrapper-2 ">
        <div class=" my-4">
            <h2 class="text-center" style="color: #4265a2;">Complete The Form Below To Receive Your FREE Volunteer Information
                Pack.</h2>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 offset-lg-3 offset-md-2">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="form-group">
                                <input class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Telephone No.">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Complete Address">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="0" selected="selected">When are you planning to volunteer?</option>
                                    <option value="As soon as possible">As soon as possible</option>
                                    <option value="Within one month">Within one month</option>
                                    <option value="Within three months">Within three months</option>
                                    <option value="Within six months">Within six months</option>
                                    <option value="Within a year">Within a year</option>
                                    <option value="I am not sure">I am not sure</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" required="">
                                    <option value="0" selected="selected">Country of choice</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="India">India</option>
                                    <option value="China">China</option>
                                    <option value="Thailand(Surin)">Thailand(Surin)</option>
                                    <option value="Thailand(Ayutthaya)">Thailand(Ayutthaya)</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Guatemala(Xela)">Guatemala(Xela)</option>
                                    <option value="Guatemala(Antigua)">Guatemala(Antigua)</option>

                                    <option value="Brazil">Brazil</option>
                                    <option value="Bali">Indonesia(Bali)</option>

                                    <option value="Mexico">Mexico</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Africa">Africa</option>
                                    <option value="Asia">Asia</option>
                                    <option value="Latin America">Latin America</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" required="">
                                    <option value="0">Select Projects</option>
                                    <option value="Work in orphanage (Delhi, Jaipur)">Work in orphanage (Delhi,
                                        Jaipur)
                                    </option>
                                    <option value="Teaching English(Delhi, Jaipur)">Teaching English(Delhi, Jaipur)
                                    </option>
                                    <option value="Medical/Health Project(Delhi)">Medical/Health Project(Delhi)</option>
                                    <option value="Women Empowerment Project(Jaipur)">Women Empowerment
                                        Project(Jaipur)
                                    </option>
                                    <option value="HIV/AIDS Project(Delhi)">HIV/AIDS Project(Delhi)</option>
                                    <option value="Street Children/Children at Risk(Delhi, Jaipur)">Street
                                        Children/Children at Risk(Delhi, Jaipur)
                                    </option>
                                    <option value="Teaching in Slum(Delhi)">Teaching in Slum(Delhi)</option>
                                    <option value="Hands on Medical Volunteer Program">Hands on Medical Volunteer
                                        Program
                                    </option>
                                    <option value="Summer Volunteer and Adventure Program India">Summer Volunteer and
                                        Adventure Program India
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="We'd appreciate if you explain in detail the kind of volunteering project you're passionate about so we can offer you the most rewarding volunteer experience"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" required="" value="0">
                                    <option value="0" selected="selected">Do you give us consent to send text messages
                                        to expedite communication?
                                    </option>
                                    <option value="Yes, I give consent to receive texts to expedite communication.">Yes,
                                        I give consent to receive texts to expedite communication.
                                    </option>
                                    <option value="No, I do not want to receive text messages at this time.">No, I do
                                        not want to receive text messages at this time.
                                    </option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-group text-center">
                                    <input type="submit" value="Send Me My Information Pack" class="btn-default" disabled="">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
@section('page-script')
    <link rel="stylesheet" href="{{asset('resources/front/css/horizontal-slide.css')}}">
@endsection
