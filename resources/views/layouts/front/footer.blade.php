<div class="row  wrapper wrapper-3 footer">
    <div class="container">
        <div class="row mt-2">
            @if($menus->count()>0)
                @foreach($menus as $menu)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <h4 class=" text-light ">{{$menu->title}}</h4>
                        <ul>
                            @if($menu->children->count()>0)
                                @foreach($menu->children as $child)
                                    <li class="mt-1"><a href="{{$child->link}}">{{ucwords($child->title)}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endforeach
            @endif
            <div class="col-xs-12 col-sm-6 col-md-4">
                @if($footer_menus->count()>0)
                    <ul>
                        @foreach($footer_menus as $page)
                            <li class="mt-1">
                                <a href="{{$page->link}}">{{ucwords($page->title)}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 text-center font-weight-light mt-4">
                @if(getSetting('SETTING_ADDRESS'))
                    <address>
                        {{getSetting('SETTING_ADDRESS')}}
                    </address>
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
