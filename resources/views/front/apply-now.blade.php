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
                    <p>We are happy that you have decided to join IFRE Volunteer's Program. To reserve your spot, please fill out this form CAREFULLY and submit it with a refundable deposit of $99 (see our refund policy). This deposit is a part of the total application fee of $299.
                    </p>
                    <p>
                        Helping Hand Volunteer guarantees your placement, otherwise, your deposit will be refunded. No application will be valid if the $99 deposit is not paid. We are committed to offering you a life changing and professional volunteer abroad experience. We look forward to receiving your application and working with you.</p>
                    <div class="row text-sm">
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
                                <input class="form-control" placeholder="Phone No">
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
                            <div class=" form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" placeholder="Date of Birth">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="0" selected="selected">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Nationality">
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
                                <select class="form-control" >
                                    <option selected="selected" value="0">Select Start Date</option>
                                    <option value="First Monday - September 7, 2020">First Monday - September 7, 2020</option>
                                    <option value="Second Monday - September 14, 2020">Second Monday - September 14, 2020</option>
                                    <option value="Third Monday - September 21, 2020">Third Monday - September 21, 2020</option>
                                    <option value="Fourth Monday - September 28, 2020">Fourth Monday - September 28, 2020</option>
                                    <option value="First Monday - October 5, 2020">First Monday - October 5, 2020</option>
                                    <option value="Second Monday - October 12, 2020">Second Monday - October 12, 2020</option>
                                    <option value="Third Monday - October 19, 2020">Third Monday - October 19, 2020</option>
                                    <option value="Fourth Monday - October 26, 2020">Fourth Monday - October 26, 2020</option>
                                    <option value="First Monday - November 2, 2020">First Monday - November 2, 2020"</option>
                                    <option value="Second Monday - November 9, 2020">Second Monday - November 9, 2020</option>
                                    <option value="Third Monday - November 16, 2020">Third Monday - November 16, 2020</option>
                                    <option value="Fourth Monday - November 23, 2020">Fourth Monday - November 23, 2020</option>
                                    <option value="Fifth Monday - November 30, 2020">Fifth Monday - November 30, 2020</option>
                                    <option value="First Monday - December 7, 2020">First Monday - December 7, 2020</option>
                                    <option value="Second Monday - December 14, 2020">Second Monday - December 14, 2020</option>
                                    <option value="Third Monday - December 21, 2020">Third Monday - December 21, 2020</option>
                                    <option value="Fourth Monday - December 28, 2020">Fourth Monday - December 28, 2020</option>
                                    <option value="First Monday - January 4, 2021">First Monday - January 4, 2021</option>
                                    <option value="Second Monday - January 11, 2021">Second Monday - January 11, 2021</option>
                                    <option value="Third Monday - January 18, 2021">Third Monday - January 18, 2021</option>
                                    <option value="Fourth Monday - January 25, 2021">Fourth Monday - January 25, 2021</option>
                                    <option value="First Monday - February 1, 2021">First Monday - February 1, 2021</option>
                                    <option value="Second Monday - February 8, 2021">Second Monday - February 8, 2021</option>
                                    <option value="Third Monday - February 15, 2021">Third Monday - February 15, 2021</option>
                                    <option value="Fourth Monday - February 22, 2021">Fourth Monday - February 22, 2021</option>
                                    <option value="First Monday - March 1, 2021">First Monday - March 1, 2021</option>
                                    <option value="Second Monday - March 8, 2021">Second Monday - March 8, 2021</option>
                                    <option value="Third Monday - March 15, 2021">Third Monday - March 15, 2021</option>
                                    <option value="Fourth Monday - March 22, 2021">Fourth Monday - March 22, 2021</option>
                                    <option value="Fifth Monday - March 29, 2021">Fifth Monday - March 29, 2021</option>
                                    <option value="First Monday - April 5, 2021">First Monday - April 5, 2021</option>
                                    <option value="Second Monday - April 12, 2021">Second Monday - April 12, 2021</option>
                                    <option value="Third Monday - April 19, 2021">Third Monday - April 19, 2021</option>
                                    <option value="Fourth Monday - April 26, 2021">Fourth Monday - April 26, 2021</option>
                                    <option value="First Monday - May 3, 2021">First Monday - May 3, 2021</option>
                                    <option value="Second Monday - May 10, 2021">Second Monday - May 10, 2021</option>
                                    <option value="Third Monday - May 17, 2021">Third Monday - May 17, 2021</option>
                                    <option value="Fourth Monday - May 24, 2021">Fourth Monday - May 24, 2021</option>
                                    <option value="Fifth Monday - May 31, 2021">Fifth Monday - May 31, 2021</option>
                                    <option value="First Monday - June 7, 2021">First Monday - June 7, 2021</option>
                                    <option value="Second Monday - June 14, 2021">Second Monday - June 14, 2021</option>
                                    <option value="Third Monday - June 21, 2021">Third Monday - June 21, 2021</option>
                                    <option value="Fourth Monday - June 28, 2021">Fourth Monday - June 28, 2021</option>

                                    <option value="First Monday - July 5, 2021">First Monday - July 5, 2021</option>
                                    <option value="Second Monday - July 12, 2021">Second Monday - July 12, 2021</option>
                                    <option value="Third Monday - July 19, 2021">Third Monday - July 19, 2021</option>
                                    <option value="Fourth Monday - July 26, 2021">Fourth Monday - July 26, 2021</option>

                                    <option value="First Monday - August 2, 2021">First Monday - August 2, 2021</option>
                                    <option value="Second Monday - August 9, 2021">Second Monday - August 9, 2021</option>
                                    <option value="Third Monday - August 16, 2021">Third Monday - August 16, 2021</option>
                                    <option value="Fourth Monday - August 23, 2021">Fourth Monday - August 23, 2021</option>
                                    <option value="Fifth Monday - August 30, 2021">Fifth Monday - August 30, 2021</option>

                                    <option value="First Monday - September 6, 2021">First Monday - September 6, 2021</option>
                                    <option value="Second Monday - September 13, 2021">Second Monday - September 13, 2021</option>
                                    <option value="Third Monday - September 20, 2021">Third Monday - September 20, 2021</option>
                                    <option value="Fourth Monday - September 27, 2021">Fourth Monday - September 27, 2021</option>


                                    <option value="First Monday - October 4, 2021">First Monday - October 4, 2021</option>
                                    <option value="Second Monday - October 11, 2021">Second Monday - October 11, 2021</option>
                                    <option value="Third Monday - October 18, 2021">Third Monday - October 18, 2021</option>
                                    <option value="Fourth Monday - October 25, 2021">Fourth Monday - October 25, 2021</option>

                                    <option value="First Monday - November 1, 2021">First Monday - November 1, 2021"</option>
                                    <option value="Second Monday - November 8, 2021">Second Monday - November 8, 2021</option>
                                    <option value="Third Monday - November 15, 2021">Third Monday - November 15, 2021</option>
                                    <option value="Fourth Monday - November 22, 2021">Fourth Monday - November 22, 2021</option>
                                    <option value="Fifth Monday - November 29, 2021">Fifth Monday - November 29, 2021</option>

                                    <option value="First Monday - December 6, 2021">First Monday - December 6, 2021</option>
                                    <option value="Second Monday - December 13, 2021">Second Monday - December 13, 2021</option>
                                    <option value="Third Monday - December 20, 2021">Third Monday - December 20, 2021</option>
                                    <option value="Fourth Monday - December 27, 2021">Fourth Monday - December 27, 2021</option>




                                    <option value="First Monday - January 3, 2022">First Monday - January 3, 2022</option>
                                    <option value="Second Monday - January 10, 2022">Second Monday - January 10, 2022</option>
                                    <option value="Third Monday - January 17, 2022">Third Monday - January 17, 2022</option>
                                    <option value="Fourth Monday - January 24, 2022">Fourth Monday - January 24, 2022</option>
                                    <option value="Fifth Monday - January 31, 2022">Fifth Monday - January 31, 2022</option>

                                    <option value="First Monday - February 7, 2022">First Monday - February 7, 2022</option>
                                    <option value="Second Monday - February 14, 2022">Second Monday - February 14, 2022</option>
                                    <option value="Third Monday - February 21, 2022">Third Monday - February 21, 2022</option>
                                    <option value="Fourth Monday - February 28, 2022">Fourth Monday - February 28, 2022</option>

                                    <option value="First Monday - March 7, 2022">First Monday - March 7, 2022</option>
                                    <option value="Second Monday - March 14, 2022">Second Monday - March 14, 2022</option>
                                    <option value="Third Monday - March 21, 2022">Third Monday - March 21, 2022</option>
                                    <option value="Fourth Monday - March 28, 2022">Fourth Monday - March 28, 2022</option>


                                    <option value="First Monday - April 4, 2022">First Monday - April 4, 2022</option>
                                    <option value="Second Monday - April 11, 2022">Second Monday - April 11, 2022</option>
                                    <option value="Third Monday - April 18, 2022">Third Monday - April 18, 2022</option>
                                    <option value="Fourth Monday - April 25, 2022">Fourth Monday - April 25, 2022</option>

                                    <option value="First Monday - May 2, 2022">First Monday - May 2, 2022</option>
                                    <option value="Second Monday - May 9, 2022">Second Monday - May 9, 2022</option>
                                    <option value="Third Monday - May 16, 2022">Third Monday - May 16, 2022</option>
                                    <option value="Fourth Monday - May 24, 2022">Fourth Monday - May 23, 2022</option>
                                    <option value="Fourth Monday - May 23, 2022">Fifth Monday - May 30, 2022</option>

                                    <option value="First Monday - June 6, 2022">First Monday - June 6, 2022</option>
                                    <option value="Second Monday - June 13, 2022">Second Monday - June 13, 2022</option>
                                    <option value="Third Monday - June 20, 2022">Third Monday - June 20, 2022</option>
                                    <option value="Fourth Monday - June 27, 2022">Fourth Monday - June 27, 2022</option>

                                    <option value="First Monday - July 4, 2022">First Monday - July 4, 2022</option>
                                    <option value="Second Monday - July 11, 2022">Second Monday - July 11, 2022</option>
                                    <option value="Third Monday - July 18, 2022">Third Monday - July 18, 2022</option>
                                    <option value="Fourth Monday - July 25, 2022">Fourth Monday - July 25, 2022</option>

                                    <option value="First Monday - August 1, 2022">First Monday - August 1, 2022</option>
                                    <option value="Second Monday - August 8, 2022">Second Monday - August 8, 2022</option>
                                    <option value="Third Monday - August 15, 2022">Third Monday - August 15, 2022</option>
                                    <option value="Fourth Monday - August 22, 2022">Fourth Monday - August 22, 2022</option>
                                    <option value="Fifth Monday - August 29, 2022">Fifth Monday - August 29, 2022</option>

                                    <option value="First Monday - September 5, 2022">First Monday - September 5, 2022</option>
                                    <option value="Second Monday - September 12, 2022">Second Monday - September 12, 2022</option>
                                    <option value="Third Monday - September 19, 2022">Third Monday - September 19, 2022</option>
                                    <option value="Fourth Monday - September 26, 2022">Fourth Monday - September 26, 2022</option>


                                    <option value="First Monday - October 3, 2022">First Monday - October 3, 2022</option>
                                    <option value="Second Monday - October 10, 2022">Second Monday - October 10, 2022</option>
                                    <option value="Third Monday - October 17, 2022">Third Monday - October 17, 2022</option>
                                    <option value="Fourth Monday - October 24, 2022">Fourth Monday - October 24, 2022</option>
                                    <option value="Fifth Monday - October 31, 2022">Fourth Monday - October 31, 2022</option>

                                    <option value="First Monday - November 7, 2022">First Monday - November 7, 2022"</option>
                                    <option value="Second Monday - November 14, 2022">Second Monday - November 14, 2022</option>
                                    <option value="Third Monday - November 21, 2022">Third Monday - November 21, 2022</option>
                                    <option value="Fourth Monday - November 28, 2022">Fourth Monday - November 28, 2022</option>


                                    <option value="First Monday - December 5, 2022">First Monday - December 5, 2022</option>
                                    <option value="Second Monday - December 12, 2022">Second Monday - December 12, 2022</option>
                                    <option value="Third Monday - December 19, 2022">Third Monday - December 19, 2022</option>
                                    <option value="Fourth Monday - December 26, 2022">Fourth Monday - December 26, 2022</option>



                                    <option value="First Monday - January 2, 2023">First Monday - January 2, 2023</option>
                                    <option value="Second Monday - January 9, 2023">Second Monday - January 9, 2023</option>
                                    <option value="Third Monday - January 16, 2023">Third Monday - January 16, 2023</option>
                                    <option value="Fourth Monday - January 23, 2023">Fourth Monday - January 23, 2023</option>
                                    <option value="Fifth Monday - January 30, 2023">Fifth Monday - January 30, 2023</option>

                                    <option value="First Monday - February 6, 2023">First Monday - February 6, 2023</option>
                                    <option value="Second Monday - February 13, 2023">Second Monday - February 13, 2023</option>
                                    <option value="Third Monday - February 20, 2023">Third Monday - February 20, 2023</option>
                                    <option value="Fourth Monday - February 27, 2023">Fourth Monday - February 27, 2023</option>

                                    <option value="First Monday - March 6, 2023">First Monday - March 6, 2023</option>
                                    <option value="Second Monday - March 13, 2023">Second Monday - March 13, 2023</option>
                                    <option value="Third Monday - March 20, 2023">Third Monday - March 20, 2023</option>
                                    <option value="Fourth Monday - March 27, 2023">Fourth Monday - March 27, 2023</option>


                                    <option value="First Monday - April 3, 2023">First Monday - April 3, 2023</option>
                                    <option value="Second Monday - April 10, 2023">Second Monday - April 10, 2023</option>
                                    <option value="Third Monday - April 17, 2023">Third Monday - April 17, 2023</option>
                                    <option value="Fourth Monday - April 24, 2023">Fourth Monday - April 24, 2023</option>

                                    <option value="First Monday - May 1, 2023">First Monday - May 1, 2023</option>
                                    <option value="Second Monday - May 8, 2023">Second Monday - May 8, 2023</option>
                                    <option value="Third Monday - May 15, 2023">Third Monday - May 15, 2023</option>
                                    <option value="Fourth Monday - May 22, 2023">Fourth Monday - May 22, 2023</option>
                                    <option value="Fourth Monday - May 29, 2023">Fifth Monday - May 29, 2023</option>

                                    <option value="First Monday - June 5, 2023">First Monday - June 5, 2023</option>
                                    <option value="Second Monday - June 12, 2023">Second Monday - June 12, 2023</option>
                                    <option value="Third Monday - June 19, 2023">Third Monday - June 19, 2023</option>
                                    <option value="Fourth Monday - June 26, 2023">Fourth Monday - June 26, 2023</option>

                                    <option value="First Monday - July 3, 2023">First Monday - July 3, 2023</option>
                                    <option value="Second Monday - July 10, 2023">Second Monday - July 10, 2023</option>
                                    <option value="Third Monday - July 17, 2023">Third Monday - July 17, 2023</option>
                                    <option value="Fourth Monday - July 24, 2023">Fourth Monday - July 24, 2023</option>
                                    <option value="Fifth Monday - July 31, 2023">Fourth Monday - July 31, 2023</option>

                                    <option value="First Monday - August 7, 2023">First Monday - August 7, 2023</option>
                                    <option value="Second Monday - August 14, 2023">Second Monday - August 14, 2023</option>
                                    <option value="Third Monday - August 21, 2023">Third Monday - August 21, 2023</option>
                                    <option value="Fourth Monday - August 28, 2023">Fourth Monday - August 28, 2023</option>


                                    <option value="First Monday - September 4, 2023">First Monday - September 4, 2023</option>
                                    <option value="Second Monday - September 11, 2023">Second Monday - September 11, 2023</option>
                                    <option value="Third Monday - September 18, 2023">Third Monday - September 18, 2023</option>
                                    <option value="Fourth Monday - September 25, 2023">Fourth Monday - September 25, 2023</option>


                                    <option value="First Monday - October 2, 2023">First Monday - October 2, 2023</option>
                                    <option value="Second Monday - October 9, 2023">Second Monday - October 9, 2023</option>
                                    <option value="Third Monday - October 16, 2023">Third Monday - October 16, 2023</option>
                                    <option value="Fourth Monday - October 23, 2023">Fourth Monday - October 23, 2023</option>
                                    <option value="Fifth Monday - October 30, 2023">Fourth Monday - October 30, 2023</option>

                                    <option value="First Monday - November 6, 2023">First Monday - November 6, 2023"</option>
                                    <option value="Second Monday - November 13, 2023">Second Monday - November 13, 2023</option>
                                    <option value="Third Monday - November 20, 2023">Third Monday - November 20, 2023</option>
                                    <option value="Fourth Monday - November 27, 2023">Fourth Monday - November 27, 2023</option>


                                    <option value="First Monday - December 4, 2023">First Monday - December 4, 2023</option>
                                    <option value="Second Monday - December 11, 2023">Second Monday - December 11, 2023</option>
                                    <option value="Third Monday - December 18, 2023">Third Monday - December 18, 2023</option>
                                    <option value="Fourth Monday - December 25, 2023">Fourth Monday - December 25, 2023</option>



                                    <option value="First Monday - January 1, 2024">First Monday - January 1, 2024</option>
                                    <option value="Second Monday - January 8, 2024">Second Monday - January 8, 2024</option>
                                    <option value="Third Monday - January 15, 2024">Third Monday - January 15, 2024</option>
                                    <option value="Fourth Monday - January 22, 2024">Fourth Monday - January 22, 2024</option>
                                    <option value="Fifth Monday - January 29, 2024">Fifth Monday - January 29, 2024</option>

                                    <option value="First Monday - February 5, 2024">First Monday - February 5, 2024</option>
                                    <option value="Second Monday - February 12, 2024">Second Monday - February 12, 2024</option>
                                    <option value="Third Monday - February 19, 2024">Third Monday - February 19, 2024</option>
                                    <option value="Fourth Monday - February 26, 2024">Fourth Monday - February 26, 2024</option>

                                    <option value="First Monday - March 4, 2024">First Monday - March 4, 2024</option>
                                    <option value="Second Monday - March 11, 2024">Second Monday - March 11, 2024</option>
                                    <option value="Third Monday - March 18, 2024">Third Monday - March 18, 2024</option>
                                    <option value="Fourth Monday - March 25, 2024">Fourth Monday - March 25, 2024</option>


                                    <option value="First Monday - April 1, 2024">First Monday - April 1, 2024</option>
                                    <option value="Second Monday - April 8, 2024">Second Monday - April 8, 2024</option>
                                    <option value="Third Monday - April 15, 2024">Third Monday - April 15, 2024</option>
                                    <option value="Fourth Monday - April 22, 2024">Fourth Monday - April 22, 2024</option>
                                    <option value="Fifth Monday - April 29, 2024">Fourth Monday - April 29, 2024</option>

                                    <option value="First Monday - May 6, 2024">First Monday - May 6, 2024</option>
                                    <option value="Second Monday - May 13, 2024">Second Monday - May 13, 2024</option>
                                    <option value="Third Monday - May 20, 2024">Third Monday - May 20, 2024</option>
                                    <option value="Fourth Monday - May 27, 2024">Fourth Monday - May 27, 2024</option>


                                    <option value="First Monday - June 3, 2024">First Monday - June 3, 2024</option>
                                    <option value="Second Monday - June 10, 2024">Second Monday - June 10, 2024</option>
                                    <option value="Third Monday - June 17, 2024">Third Monday - June 17, 2024</option>
                                    <option value="Fourth Monday - June 24, 2024">Fourth Monday - June 24, 2024</option>

                                    <option value="First Monday - July 1, 2024">First Monday - July 1, 2024</option>
                                    <option value="Second Monday - July 8, 2024">Second Monday - July 8, 2024</option>
                                    <option value="Third Monday - July 15, 2024">Third Monday - July 15, 2024</option>
                                    <option value="Fourth Monday - July 22, 2024">Fourth Monday - July 22, 2024</option>
                                    <option value="Fifth Monday - July 29, 2024">Fifth Monday - July 29, 2024</option>

                                    <option value="First Monday - August 5, 2024">First Monday - August 5, 2024</option>
                                    <option value="Second Monday - August 12, 2024">Second Monday - August 12, 2024</option>
                                    <option value="Third Monday - August 19, 2024">Third Monday - August 19, 2024</option>
                                    <option value="Fourth Monday - August 26, 2024">Fourth Monday - August 26, 2024</option>


                                    <option value="First Monday - September 2, 2024">First Monday - September 2, 2024</option>
                                    <option value="Second Monday - September 9, 2024">Second Monday - September 9, 2024</option>
                                    <option value="Third Monday - September 16, 2024">Third Monday - September 16, 2024</option>
                                    <option value="Fourth Monday - September 23, 2024">Fourth Monday - September 23, 2024</option>
                                    <option value="Fifth Monday - September 30, 2024">Fifth Monday - September 30, 2024</option>

                                    <option value="First Monday - October 7, 2024">First Monday - October 7, 2024</option>
                                    <option value="Second Monday - October 14, 2024">Second Monday - October 14, 2024</option>
                                    <option value="Third Monday - October 21, 2024">Third Monday - October 21, 2024</option>
                                    <option value="Fourth Monday - October 28, 2024">Fourth Monday - October 28, 2024</option>
                                    <option value="First Monday - November 4, 2024">First Monday - November 4, 2024</option>
                                    <option value="Second Monday - November 11, 2024">Second Monday - November 11, 2024</option>
                                    <option value="Third Monday - November 18, 2024">Third Monday - November 18, 2024</option>
                                    <option value="Fourth Monday - November 25, 2024">Fourth Monday - November 25, 2024</option>
                                    <option value="First Monday - December 2, 2024">First Monday - December 2, 2024</option>
                                    <option value="Second Monday - December 9, 2024">Second Monday - December 9, 2024</option>
                                    <option value="Third Monday - December 16, 2024">Third Monday - December 16, 2024</option>
                                    <option value="Fourth Monday - December 23, 2024">Fourth Monday - December 23, 2024</option>
                                    <option value="Fifth Monday - December 30, 2024">Fifth Monday - December 30, 2024</option>
                                    <option value="First Monday - January 6, 2025">First Monday - January 6, 2025</option>
                                    <option value="Second Monday - January 13, 2025">Second Monday - January 13, 2025</option>
                                    <option value="Third Monday - January 20, 2025">Third Monday - January 20, 2025</option>
                                    <option value="Fourth Monday - January 27, 2025">Fourth Monday - January 27, 2025</option>
                                    <option value="First Monday - February 3, 2025">First Monday - February 3, 2025</option>
                                    <option value="Second Monday - February 10, 2025">Second Monday - February 10, 2025</option>
                                    <option value="Third Monday - February 17, 2025">Third Monday - February 17, 2025</option>
                                    <option value="Fourth Monday - February 24, 2025">Fourth Monday - February 24, 2025</option>
                                    <option value="First Monday - March 3, 2025">First Monday - March 3, 2025</option>
                                    <option value="Second Monday - March 10, 2025">Second Monday - March 10, 2025</option>
                                    <option value="Third Monday - March 17, 2025">Third Monday - March 17, 2025</option>
                                    <option value="Fourth Monday - March 24, 2025">Fourth Monday - March 24, 2025</option>
                                    <option value="Fourth Monday - March 31, 2025">Fourth Monday - March 31, 2025</option>
                                    <option value="First Monday - April 7, 2025">First Monday - April 7, 2025</option>
                                    <option value="Second Monday - April 14, 2025">Second Monday - April 14, 2025</option>
                                    <option value="Third Monday - April 21, 2025">Third Monday - April 21, 2025</option>
                                    <option value="Fourth Monday - April 28, 2025">Fourth Monday - April 28, 2025</option>
                                    <option value="First Monday - May 5, 2025">First Monday - May 5, 2025</option>
                                    <option value="Second Monday - May 12, 2025">Second Monday - May 12, 2025</option>
                                    <option value="Third Monday - May 19, 2025">Third Monday - May 19, 2025</option>
                                    <option value="Fourth Monday - May 26, 2025">Fourth Monday - May 26, 2025</option>
                                    <option value="First Monday - June 2, 2025">First Monday - June 2, 2025</option>
                                    <option value="Second Monday - June 9, 2025">Second Monday - June 9, 2025</option>
                                    <option value="Third Monday - June 16, 2025">Third Monday - June 16, 2025</option>
                                    <option value="Fourth Monday - June 23, 2025">Fourth Monday - June 23, 2025</option>
                                    <option value="Fifth Monday - June 30, 2025">Fifth Monday - June 30, 2025</option>
                                    <option value="First Monday - July 7, 2025">First Monday - July 7, 2025</option>
                                    <option value="Second Monday - July 14, 2025">Second Monday - July 14, 2025</option>
                                    <option value="Third Monday - July 21, 2025">Third Monday - July 21, 2025</option>
                                    <option value="Fourth Monday - July 28, 2025">Fourth Monday - July 28, 2025</option>
                                    <option value="First Monday - August 4, 2025">First Monday - August 4, 2025</option>
                                    <option value="Second Monday - August 11, 2025">Second Monday - August 11, 2025</option>
                                    <option value="Third Monday - August 18, 2025">Third Monday - August 18, 2025</option>
                                    <option value="Fourth Monday - August 25, 2025">Fourth Monday - August 25, 2025</option>
                                    <option value="First Monday - September 1, 2025">First Monday - September 1, 2025</option>
                                    <option value="Second Monday - September 8, 2025">Second Monday - September 8, 2025</option>
                                    <option value="Third Monday - September 15, 2025">Third Monday - September 15, 2025</option>
                                    <option value="Fourth Monday - September 22, 2025">Fourth Monday - September 22, 2025</option>
                                    <option value="Fifth Monday - September 29, 2025">Fifth Monday - September 29, 2025</option>
                                    <option value="First Monday - October 6, 2025">First Monday - October 6, 2025</option>
                                    <option value="Second Monday - October 13, 2025">Second Monday - October 13, 2025</option>
                                    <option value="Third Monday - October 20, 2025">Third Monday - October 20, 2025</option>
                                    <option value="Fourth Monday - October 27, 2025">Fourth Monday - October 27, 2025</option>
                                    <option value="First Monday - November 3, 2025">First Monday - November 3, 2025</option>
                                    <option value="Second Monday - November 10, 2025">Second Monday - November 10, 2025</option>
                                    <option value="Third Monday - November 17, 2025">Third Monday - November 17, 2025</option>
                                    <option value="Fourth Monday - November 24, 2025">Fourth Monday - November 24, 2025</option>
                                    <option value="First Monday - December 1, 2025">First Monday - December 1, 2025</option>
                                    <option value="Second Monday - December 8, 2025">Second Monday - December 8, 2025</option>
                                    <option value="Third Monday - December 15, 2025">Third Monday - December 15, 2025</option>
                                    <option value="Fourth Monday - December 22, 2025">Fourth Monday - December 22, 2025</option>
                                    <option value="Fifth Monday - December 29, 2025">Fifth Monday - December 29, 2025</option>
                                </select>
                            </div>
                        </div>      <div class="col-12">
                            <div class="form-group">
                                <select class="form-control" >
                                    <option selected="selected" value="0">Duration of Stay</option>
                                    <option selected="selected" value="0">Select Weeks</option>
                                    <option value="1 Week">1 Week</option>
                                    <option value="2 Weeks">2 Weeks</option>
                                    <option value="3 Weeks">3 Weeks</option>
                                    <option value="4 Weeks">4 Weeks</option>
                                    <option value="5 Weeks">5 Weeks</option>
                                    <option value="6 Weeks">6 Weeks</option>
                                    <option value="7 Weeks">7 Weeks</option>
                                    <option value="8 Weeks">8 Weeks</option>
                                    <option value="9 Weeks">9 Weeks</option>
                                    <option value="10 Weeks">10 Weeks</option>
                                    <option value="11 Weeks">11 Weeks</option>
                                    <option value="12 Weeks">12 Weeks</option>
                                    <option value="More 12 Weeks">More 12 Weeks</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="Emergency contact (name, address, relationship, and phone number)"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="Please explain your academic qualification and any relevant experience: *"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="Are you in good health mentally and physically for traveling and volunteer work? Have you ever been convicted of a felony? Please explain any medical conditions or legal problems. "></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="Are you traveling with other applicants ? If yes write the name of the other applicant/s."></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="Please write your concerns or questions (if any)"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea name="" id="" rows="5" class="form-control"
                                          placeholder="If you are applying as a high school/college/university group, please list the names of each and every participant."></textarea>
                            </div>
                        </div>
                        <div class="col-12">

                           <p>  <input type="checkbox"> Before making the program deposit, I (We) acknowledge that I (We) thoroughly read all of IFRE's Terms and Conditions
                               <a href="">(Volunteer-Terms and Conditions)</a> for my volunteer placement. I (We) hereby agree on all the terms and conditions given by IFRE

                               <a href="">Privacy Policy</a></p>
                        </div>

                            <div class="col-12">
                                <div class="form-group text-center">
                                    <input type="submit" value="Submit your application" class="btn-default" disabled="">
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
