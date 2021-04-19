@extends('layouts.front.layout')
@section('content')
    <div class="row detail-hero-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{asset('resources/front/image/cover.jpg')}}');">
        <div class="col-lg-12">
            <h1 class="text-center mt-5">{{$program->title}} </h1>

            <div class="highLight">
                {!! $program->short_description!!}
            </div>

            <div class="text-center mt-4 mb-3">
                <a class="btn-default" href="inquiry.html">GET MORE INFO </a>
            </div>
            <p class="text-center small-text"> Take a minute to complete the form and we will be
                in touch.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row wrapper">
            <div class="col-xs-12 col-sm-4 col-md-3 side-bar pt-4">
                <div class="row side-heading text-center mb-2">
                    <div class="col">
                        <h3 class="text-center p-2"> Volunteer Nepal</h3>
                    </div>
                </div>
                <ul class="">
                    <li class="border-bottom mb-2"> <a  href="https://www.ifrevolunteers.org/nepal/volunteer_in_nepal.php">Nepal Home </a> </li>
                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/work_in_orphanage.php">Work in Orphanage </a> </li>
                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/teaching_english.php">Teaching English </a> </li>
                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/work_local_health_project.php"> Work in Health Project</a> </li>
                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/teach_buddhist_monk.php"> Teaching Buddhist Monk</a> </li>

                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/conservation_work.php"> Conservation Work</a> </li>

                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/photo_journalism_project.php"> Photo Journalism Project</a> </li>

                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/photo_journalism_project.php"> Language &amp; Culture</a> </li>

                    <li class="border-bottom mb-2"> <a href="https://www.ifrevolunteers.org/nepal/nepal_reviews.php"> Volunteers' Reviews</a> </li>


                </ul>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 wrapper-1 pt-4">
                <br>

                <h2>  Project Summary </h2>
                <p>Dates: 21-June-2021 to 23-July-2021  </p>
                <p>Program Fee: $2099 for 5-week program including 14-day Annapurna Trek</p>

                <h3 style="margin-bottom:25px;"> <a href="https://www.ifrevolunteers.org/nepal/volunteer_nepal_summer_program_details.php" style="text-decoration:underline;">View detail itinerary </a> </h3>


                <p> Nestled in the lap of the Himalaya Mountains between India and China, Nepal is indeed a true natural wonder. Although a small country, Nepal offers a wide range of diversity (both geographically and ethnically). Its natural wonders are incredible and there are abundant examples of unique flora and fauna. The country is populated by vivid ethnic groups and spotted with colorful festivals. IFRE’s summer program offers a rare chance to submerge into the Nepal’s charismatic culture, dedicate valuable time and effort to a local orphanage project and experience all the majestic natural beauty this Himalayan kingdom has to offer! IFRE invites volunteers to have a summer adventure in Nepal and balance humanitarian and travel experiences as they embark on this meaningful journey of a lifetime.</p>

                <br>

                <h2> Orientation, Language And Cultural Immersion In Katmandu (7 Days) </h2>
                <p>Summer adventure volunteers begin with a Language and Cultural immersion program. The first week in Katmandu – a vibrant city with temples and shrines and the Living Goddess – is full of Nepali language and cultural classes and excursions to charming tourist bazaars in Thamel. In addition, volunteers will stay in a rural village (Lamatar) and explore village life for three days: hiking and visiting temples, monasteries and the numerous sites of cultural importance.</p>

                <br>

                <h2> Service Projects – Work In An Orphanage (14 Days) </h2>
                <p>In this phase, volunteers will work on an orphanage project (Kathmandu or Chitwan) and bring a ray of hope into the lives of needy orphans. Volunteers will teach basic, conversational English to the children and organize fun, yet educational, activities. Volunteers also lend a helping hand with orphanage and kitchen operation. There is free time to hike the beautiful areas surrounding Kathmandu Valley and experience the peace and tranquility of amazing Nepal. </p>
                <br>

                <h2> Explore Nepal: Annapurna Base Camp Trek (14 Days) </h2>
                <p>Now it is time to engage in the most popular tourist activity in Nepal – trekking! These 14-days offer natural discovery via a Himalayan hiking experience.Trekkers depart from Pokhara and spend 14-days trekking this world famous Himalayan route. The Himalayan range is one of the most enthralling treks in the world. The Annapurna and Everest hike is not only a hiking destination, but also an incredible and life-changing journey through diverse communities, cultures, religions. Incredibly, this trek is supported by the world famous Gurung or Sherpa cult - the most widely known climbers of the world. </p>

                <p class="emph_text"> This program itinerary is merely a proposed sample and may be altered to meet the needs of the volunteers and changes in field conditions. This proposed itinerary will be finalized during orientation program.</p>

                <br>
                <div class="text-center mt-4 mb-3">
                    <a class="btn-default" href="inquiry.html">GET MORE INFO </a>
                </div>
                <br> <br>

                <!--<h4> <a href="https://www.ifrevolunteers.org/nepal/volunteer_in_nepal.php"> Learn more about Nepal programs </a> </h4>-->

                <section class="related-project">
                    <h3 class="text-default"> Related Programs </h3>

                    <ul class="">
                        <!--<li><a href="https://www.ifrevolunteers.org/nepal/volunteer_nepal_summer_program.php"> Summer Volunteer - Nepal </a> </li>-->
                        <li><a href="https://www.ifrevolunteers.org/india/volunteer_india_summer_program.php"> Summer Volunteer - India  </a> </li>
                        <li><a href="https://www.ifrevolunteers.org/kenya/volunteer_kenya_summer_program.php"> Summer Volunteer - Kenya  </a> </li>
                        <li><a href="https://www.ifrevolunteers.org/ghana/volunteer_ghana_summer_program.php"> Summer Volunteer - Ghana</a> </li>
                        <li><a href="https://www.ifrevolunteers.org/tanzania/volunteer_tanzania_summer_program.php"> Summer Volunteer - Tanzania  </a> </li>
                        <li><a href="https://www.ifrevolunteers.org/peru/volunteer_peru_summer_program.php"> Summer Volunteer - Peru  </a> </li>
                        <li><a href="https://www.ifrevolunteers.org/costarica/volunteer_costarica_summer_program.php"> Summer Volunteer - Costa Rica </a> </li>
                    </ul>

                </section>
            </div>
        </div>
    </div>

@endsection
