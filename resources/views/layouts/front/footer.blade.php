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
                            <li class="mt-1">{{ucwords($page->title)}}</li>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
</body>

</html>
