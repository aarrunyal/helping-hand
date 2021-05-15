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

    <nav class="navbar navbar-expand-lg navbar-light ml-5">
        <a class="navbar-brand " href="/">
            <img src="{{asset('resources/front/image/logo.png')}}" alt="logo" id="logo" height="75px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @if($menus->count()>0)
                    @foreach($menus as $menu)
                        @if($menu->is_parent)
                            <li class="nav-item mr-2 dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ucwords($menu->title)}}
                                </a>
                                @if($menu->children->count()>0)
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($menu->children as $child)
                                            <a class="dropdown-item p-1"
                                               href="{{$child->link}}">{{ucwords($child->title)}}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </li>
                        @else
                            <li class="nav-item mr-2 dropdown">
                                <a class="nav-link " href="{{$menu->link}}" role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{$menu->title}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
            <div class="ml-auto mt-1">
                <a href="{{'apply-now'}}" class="btn-apply-now ">Apply Now</a>
            </div>

        </div>
    </nav>


</div>
