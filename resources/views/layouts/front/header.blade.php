<div class="row py-2">
    <div class="col-xs-12 col-6 text-right">
<span id="phone" class="">
                                      @if(getSetting('SETTING_PHONE'))
        <i class="fas fa-phone"></i>
        {{getSetting('SETTING_PHONE')}}
    @endif
                                          <br>
                                            <small id="email" class="flex-row mb-3">
                                              @if(getSetting('SETTING_PHONE'))
                                                    <i class="fas fa-at"></i>
                                                    {{getSetting('SETTING_EMAIL')}}
                                                @endif
                                            </small>
                                      </span>
    </div>
    <div class="col-xs-12 col-6 social-icon mt-2 text-right">
        @if(getSetting('SETTING_FACEBOOK_URL'))
            <a href="{{getSetting('SETTING_FACEBOOK_URL')}}" class="social rounded-circle p-2"><i
                    class="fab fa-facebook-f"></i></a>
        @endif
        @if(getSetting('SETTING_TWITTER_URL'))
            <a href="{{getSetting('SETTING_TWITTER_URL')}}" class="social rounded-circle p-2"><i
                    class="fab fa-twitter"></i></a>
        @endif
        @if(getSetting('SETTING_INSTAGRAM_URL'))
            <a href="{{getSetting('SETTING_INSTAGRAM_URL')}}" class="social rounded-circle p-2"><i
                    class="fab fa-instagram-square"></i></a>
        @endif
    </div>
</div>
<div class="row" id="header">

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand ml-5" href="#">
            <img src="{{asset('resources/front/image/logo.png')}}" alt="logo" id="logo" height="75px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">

                <!-- <li class="nav-item mr-2">
    <a class="nav-link" href="#">Link</a>
  </li> -->
                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ABOUT US
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item p-1" href="#">About HHFN</a>
                        <a class="dropdown-item p-1" href="#">Our Team</a>
                        <a class="dropdown-item p-1" href="#">Become a
                            volunteers</a>
                    </div>
                </li>
                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        VOLUNTEERING PROGRAM
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item p-1" href="#">About HHFN</a>
                        <a class="dropdown-item p-1" href="#">Our Team</a>
                        <a class="dropdown-item p-1" href="#">Become a
                            volunteers</a>
                    </div>
                </li>
                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        WORK CAMP
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item p-1" href="#">About HHFN</a>
                        <a class="dropdown-item p-1" href="#">Our Team</a>
                        <a class="dropdown-item p-1" href="#">Become a
                            volunteers</a>
                    </div>
                </li>
                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CHARITY TREK
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item p-1" href="#">About HHFN</a>
                        <a class="dropdown-item p-1" href="#">Our Team</a>
                        <a class="dropdown-item p-1" href="#">Become a
                            volunteers</a>
                    </div>
                </li>
                <li class="nav-item mr-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CONNECT WITH US
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item p-1" href="#">About HHFN</a>
                        <a class="dropdown-item p-1" href="#">Our Team</a>
                        <a class="dropdown-item p-1" href="#">Become a
                            volunteers</a>
                    </div>
                </li>


            </ul>

        </div>
    </nav>
</div>
