<!-- Start Main Top Bar -->

<div id="top-bar">
  <div class="container row">
    <div class="top-bar-nav section" id="top-bar-nav" name="Top Navigation">
      <div class="widget LinkList" data-version="2" id="LinkList72">
        <div class="widget-content">
          <ul>
            <li><a href="{{route('home')}}">Acceuil</a></li>
            <li><a href="{{route('show.about_me')}}">À propos de nous</a></li>
            <li><a href="{{route('show.contact_form')}}">Contacter nous</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Top Social -->
    <div class="top-bar-social social section" id="top-bar-social" name="Social Top">
      <div class="widget LinkList" data-version="2" id="LinkList73">
        <div class="widget-content">
          <ul>
            <li class="facebook">
              <a href="#" target="_blank" title="facebook"></a>
            </li>

            <li class="twitter">
              <a href="#" target="_blank" title="twitter"></a>
            </li>

            <li class="instagram">
              <a href="#" target="_blank" title="instagram"></a>
            </li>

            <li class="pinterest">
              <a href="#" target="_blank" title="pinterest"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- End Main Top Bar -->

<!-- Start Header Wrapper -->

<div id="header-wrap">
  <div class="header-header">
    <div class="container row">
      <div class="header-logo section" id="header-logo" name="Header Logo">
        <div class="widget Header" data-version="2" id="Header1">
          <div class="header-widget">
            <a class="header-image-wrapper" href="{{route('home')}}">
              <img alt="Enfold" data-height="60" data-width="138" src="{{ asset('enfold/images/enfold.png') }}" />
            </a>
          </div>
        </div>
      </div>

      <div class="header-ads section" id="header-ads" name="Header Ads 728x90">
        <div class="widget HTML" data-version="2" id="HTML1">
          <div class="widget-content" class="row">
          <div class="slideshow-container" style="height:20%;">

            <!-- Full-width images with number and caption text -->
            {{-- <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img src="{{asset('enfold/images/aircraft-1183171_960_720.jpg')}}" style="width:20%">
              <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img src="{{asset('enfold/images/looks006-690x455-1442922083.jpg')}}" style="width:20%">
              <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img src="{{asset('enfold/images/photographer-1150052_960_720.jpg')}}" style="width:20%">
              <div class="text">Caption Three</div>
            </div> --}}
          </div>
            {{-- <div style="float:right;" >
            <img src="{{ asset('enfold/images/ad728.gif') }}" alt="header ads"/>
            </div>
            <div style="float:left;"> ENFOLD
              <p><a href="route('home')"> Suivez les Dernières actualités du monde sur enfold</a></p>
            </div> --}}
            {{-- <a href="https://example.com/">
              <video fullscreen="false" webkit-playsinline controls autoplay muted poster="http://example.com/thumbnail.gif">
              <source src="https://www.adspeed.com/mp4/big_buck_bunny.mp4" type="video/mp4">
              </video>
            </a> --}}
          </div>
        </div>
      </div>

    </div>
  </div>

<!-- PUB -->

<div class="clearfix"></div>
<div class="row" id="hot-wrapper">

  {{--   
    <div class="demo3" style="position: relative; height: 36px; overflow: hidden;">
      <ul style="margin: 10%; position: absolute; top: 0px;">
        <li style=" margin-left: 10% !important ; display: list-item;">WordPress Mobify mobile theme, CSS</li>
        <li style=" margin-left: 10% !important ; display: list-item;">Gridview with Table.Rows.Count ==0 to show Footer row that include checkbox with imageurl cast</li>
        <li style=" margin-left: 10% !important ; display: list-item;">JS/jQuery - animated random name picker</li>
        <li style=" margin-left: 10% !important ; display: list-item;">what's causing the layout to break? Attempting to make a horizontal layout website ?</li>
      </ul>
    </div> 
  --}}
  
  <div class="demo-box" style="margin: 28px 0; box-shadow: 0 2px 5px -3px #000; border-radius: 5px;">
      <div class="bn-breaking-news" id="newsTicker11">
          <div class="bn-label">Dernières nouvelles</div>
              <div class="bn-news">
                  <ul>
                      <li><a href="#">There many variations of passages of Lorem Ipsum available There many variations of passages of Lorem Ipsum available</a></li>
                  </ul>
              </div>
              <div class="bn-controls">
                  <button><span class="bn-arrow bn-prev"></span></button>
                  <button><span class="bn-action"></span></button>
                  <button><span class="bn-arrow bn-next"></span></button>
              </div>
          </div>
      </div>
  </div>

  <div class="mobile-header">
    <span class="slide-menu-toggle"></span>
    <div class="mobile-logo section" id="mobile-logo" name="Mobile Logo">
      <div class="widget Image" data-version="2" id="Image70">
        <div class="logo-content">
          <a href="{{route('home')}}"><img alt="Enfold" src="{{ asset('enfold/images/enfold_mobile.png') }}" /></a>
        </div>
      </div>
    </div>
    <span class="show-mobile-search"></span>
    <form action="{{route('search.posts','search')}}" class="mobile-search-form" role="search">
      <input class="mobile-search-input" name="query" placeholder="Search this blog" type="search" value="" />
      <span class="hide-mobile-search"></span>
    </form>
    <div class="mobile-menu"></div>
  </div>

  <div class="header-menu">
    <div class="container row">
      <div class="main-menu section" id="main-menu" name="Main Menu">
        <div class="widget LinkList" data-version="2" id="LinkList74">
          <ul id="main-menu-nav" role="menubar">

            <li class="hub-home">
              <a href="{{route('home')}}"><i class="fa fa-home" style="font-size: 20px;"></i></a>
            </li>


            @foreach ( $categories as $category)
            <li>
              <a href="{{route('show.category.posts',"search&index=".$category->id."&query=".$category->slug)}}" role="menuitem">{{$category->name}}</a>
            </li>
            @endforeach

            <li style="float: right;margin-right: 6.5%;">
              <a href="" role="menuitem">
                <i class="fa fa-user" style="font-size: 20px;"></i> Compte
              </a>
            </li>

            @guest
                <li>
                  <a href="{{route('login')}}" role="menuitem">_Se connecter</a>
                </li>

                <li>
                  <a href="{{route('register')}}" role="menuitem">_S'inscrire</a>
                </li>
            @else

                @if(Auth::user()->role_id==1)

                  <li>
                    <a href="" role="menuitem">_{{ (Auth::user()->name) }}</a>
                  </li>

                @else

                  <li>
                    <a href="{{route('login')}}" role="menuitem">_{{ (Auth::user()->name) }}</a>
                  </li>

                @endif

                <li>
                  <a href="" role="menuitem" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">_Déconnexion</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>

            @endguest

          </ul>
        </div>

        <div id="nav-search">
          <form action="{{route('search.posts','search')}}" class="search-form" role="search">
            <input autocomplete="off" class="search-input" name="query" placeholder="Search this blog" type="search" value="" />
            <span class="hide-search"></span>
          </form>
        </div>

        <span class="show-search"></span>

      </div>
    </div>
  </div>
</div>

<!-- End Header Wrapper -->


<!-- Start Hot Wrapper -->

<div class="clearfix"></div>
<div class="row" id="hot-wrapper">

  @yield('hot-wrapper')

</div>
<!-- End Hot Wrapper -->

<!-- Start Slider Wrapper -->

<div class="clearfix"></div>
<div class="row" id="hot-wrapper">
  <div class="row" id="slider-wrapper" style="margin-top: 30px;">

    @yield('slider-wrapper')

  </div>
</div>

<!-- End Slider Wrapper -->

<!-- Start Tybox Wrapper -->

<div class="clearfix"></div>
<div class="row" id="hot-wrapper" style="margin-top: 30px;">
  @yield('tybox-wrapper')

</div>
<!-- End Tybox Wrapper -->