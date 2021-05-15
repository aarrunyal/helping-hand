<div class="row  wrapper wrapper-3 footer">
    <div class="container">
        <div class="row mt-2">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <h4 class="text-center text-light">GROUP VOLUNTEERING</h4>
                <ul>
                    <li class="mt-1"><a href="https://www.ifrevolunteers.org/hands-on-medical-volunteer/">Hands
                            Medical Volunteer</a></li>
                    <li class="mt-1"><a href="https://www.ifrevolunteers.org/family-volunteer/"> Family
                            volunteering
                        </a></li>
                    <li class="mt-1"><a href="https://www.ifrevolunteers.org/alternative-spring-break/">
                            Alternative
                            spring break </a></li>
                    <li class="mt-1"><a
                            href="https://www.ifrevolunteers.org/college-university-students-volunteer-abroad-program/">
                            University group program</a></li>
                    <li class="mt-1"><a href="https://www.ifrevolunteers.org/high-school-volunteer-abroad/">
                            High
                            school group program </a></li>
                    <li class="mt-1"><a href="https://www.ifrevolunteers.org/volunteer-abroad-programs/"> All
                            Volunteer Programs </a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <h4 class="text-center text-light">SUMMER:</h4>
                <ul>
                    <li class="mt-1">Youth Volunteer - Nepal</li>
                    <li class="mt-1">Youth Volunteer - India</li>
                    <li class="mt-1">Youth Volunteer - Kenya</li>
                    <li class="mt-1">Youth Volunteer - Ghana</li>
                    <li class="mt-1">Youth Volunteer - Tanzania</li>
                    <li class="mt-1">Youth Volunteer - Peru</li>
                    <li class="mt-1">Youth Volunteer - Costa Rica</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <h4 class="text-center text-light">ASIA:</h4>
                <ul>
                    <li class="mt-1">Volunteer in Combodia</li>
                    <li class="mt-1">Volunteer in China</li>
                    <li class="mt-1">Volunteer in India</li>
                    <li class="mt-1">Volunteer in Nepal</li>
                    <li class="mt-1">Volunteer in Sri Lanka</li>
                    <li class="mt-1">Volunteer in Thailand</li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                @if($pages->count()>0)
                    <ul>
                        @foreach($pages as $page)
                            <li class="mt-1">
                                <a href="{{route('page', $page->slug)}}">{{ucwords($page->title)}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row  wrapper wrapper-1">
    <div class="col-12 text-center mt-2">
        <p class=""> {{getSetting("SETTING_COPYRIGHT_TEXT")}} </p>
    </div>
</div>
</div>


</div>

</div>
<script src="{{asset('resources/front/js/jquery.js')}}"></script>
<script src="{{asset('resources/front/js/popper-min.js')}}"></script>
<script src="{{asset('resources/front/js/bootstrap.js')}}"></script>
@if(getSetting("SETTING_CUSTOM_HEADER_SCRIPTS"))
    {!! getSetting("SETTING_CUSTOM_FOOTER_SCRIPTS") !!}
@endif
<script type="text/javascript">
</script>
@yield('page-script')
</body>

</html>
