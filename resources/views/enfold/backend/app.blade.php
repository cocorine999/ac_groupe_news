<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icon de logo du Site -->
    <link rel="shortcut icon" href="{{asset('enfold/images/enfold.png')}}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Blogger') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('backend/plugins/node-waves/waves.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Styles -->
    @stack('css')


    <!-- Animation Css -->
    <link href="{{ asset('backend/plugins/animate-css/animate.css') }}" rel="stylesheet">

    <!-- Preloader Css -->
    <link href="{{ asset('backend/plugins/material-design-preloader/md-preloader.css') }}" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="{{ asset('backend/plugins/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('backend/css/themes/all-themes.css') }}" rel="stylesheet">

</head>

<body class="theme-cyan">


    <!-- ---------------------------- Page Loader ---------------------------------------------- -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
                </svg>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- ------------x---------------  Page Loader --------------------------x------------------- -->


    <!-- ---------------------------- Overlay For Sidebars ---------------------------------------------- -->
    <div class="overlay"></div>
    <!-- ------------x---------------  Overlay For Sidebars --------------------------x------------------- -->


    <!-- ---------------------------- Search Bar ---------------------------------------------- -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- ------------x---------------  Search Bar --------------------------x------------------- -->


    <!-- ---------------------------- Top Bar ---------------------------------------------- -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Blogger - Administration</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ------------x---------------  Top Bar --------------------------x------------------- -->


    <!-- ----------------------------  Sidebars ---------------------------------------------- -->

    <section>

        <!-- ----------------------------  Left Sidebar ---------------------------------------------- -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset(Auth::user()->image)}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->username}} {{Auth::user()->name}}</div>
                    <div class="email">{{Auth::user()->role->name}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">

                            @if (Request::is('administration/administrateur*'))
                                <li><a href="{{ route('admin.parametre.index') }}"><i class="material-icons">person</i>Profil</a></li>
                            @elseif (Request::is('administration/blogueur*'))
                                <li><a href="{{ route('blogger.parametre.index') }}"><i class="material-icons">person</i>Profil</a></li>
                            @endif

                            <li role="seperator" class="divider"></li>
                            <li>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i>{{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    @if (Request::is('administration/administrateur*'))

                        <li class="{{Request::is('administration/administrateur/dashboard')?'active':''}}">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="material-icons">dashboard</i>
                                <span>TABLEAU DE BORD</span>
                            </a>

                        </li>

                        <li class="{{Request::is('administration/administrateur/posts*')?'active':''}}">
                            <a href="{{ route('admin.posts.index') }}">
                                <i class="material-icons">library_books</i>
                                <span>ARTICLES</span>
                            </a>
                        </li>


                        <li class="{{Request::is('administration/administrateur/pending/posts')?'active':''}}">
                            <a href="{{ route('admin.posts.pending') }}">
                                <i class="material-icons">article</i>
                                <span>ARTICLES NON AUTORISÉ </span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/administrateur/favorite*')?'active':''}}">
                            <a href="{{ route('admin.favorite.index') }}">
                                <i class="material-icons">favorite_border</i>
                                <span>FAVORIS ARTICLES</span>
                            </a>
                        </li>


                        <li class="{{Request::is('administration/blogueur/unpublished/posts')?'active':''}}">
                            <a href="{{ route('admin.posts.unpublished') }}">
                                <i class="material-icons">wysiwyg</i>
                                <span>ARTICLE NON PUBLIÉ</span>
                            </a>
                        </li>           

                        <li class="{{Request::is('administration/administrateur/abonnements*')?'active':''}}">
                            <a href="{{ route('admin.abonnements.index') }}">
                                <i class="material-icons">people</i>
                                <span>ABONNÉS</span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/administrateur/blogueurs*')?'active':''}}">
                            <a href="{{ route('admin.show.blogueurs') }}">
                                <i class="material-icons">supervisor_account</i>
                                <span>BLOGUEURS</span>
                            </a>
                        </li>
                        
                        <li class="{{Request::is('administration/administrateur/messages*')?'active':''}}">
                            <a href="{{ route('admin.messages.index') }}">
                                <i class="material-icons">feedback</i>
                                <span>MESSAGES</span>
                            </a>
                        </li>             

                        <li class="{{Request::is('administration/administrateur/commentaires*')?'active':''}}">
                            <a href="{{ route('admin.commentaires.index') }}">
                                <i class="material-icons">question_answer</i>
                                <span>COMMENTAIRES</span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/administrateur/tags*')?'active':''}}">
                            <a href="{{ route('admin.tags.index') }}">
                                <i class="material-icons">tag</i>
                                <span>TAGS</span>
                            </a>
                        </li>


                        <li class="{{Request::is('administration/administrateur/categories*')?'active':''}}">
                            <a href="{{ route('admin.categories.index') }}">
                                <i class="material-icons">apps</i>
                                <span>CATÉGORIES</span>
                            </a>
                        </li>
                        
                    @endif


                    @if (Request::is('administration/blogueur*'))

                        <li class="{{Request::is('administration/blogueur/dashboard')?'active':''}}">
                            <a href="{{route('blogger.dashboard')}}">
                                <i class="material-icons">dashboard</i>
                                <span>TABLEAU DE BORD</span>
                            </a>

                        </li>

                        <li class="{{Request::is('administration/blogueur/posts*')?'active':''}}">
                            <a href="{{ route('blogger.posts.index') }}">
                                <i class="material-icons">library_books</i>
                                <span>ARTICLES</span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/blogueur/pending/posts')?'active':''}}">
                            <a href="{{ route('blogger.posts.pending') }}">
                                <i class="material-icons">article</i>
                                <span>ARTICLE NON VALIDER</span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/blogueur/favorite*')?'active':''}}">
                            <a href="{{ route('blogger.favorite.index') }}">
                                <i class="material-icons">favorite_border</i>
                                <span>FAVORIS ARTICLE</span>
                            </a>
                        </li>

                        <li class="{{Request::is('administration/blogueur/unpublished/posts')?'active':''}}">
                            <a href="{{ route('blogger.posts.unpublished') }}">
                                <i class="material-icons">wysiwyg</i>
                                <span>ARTICLE NON PUBLIÉ</span>
                            </a>
                        </li>                            
                        <li class="{{Request::is('administration/blogueur/messages*')?'active':''}}">
                            <a href="{{ route('blogger.messages.index') }}">
                                <i class="material-icons">feedback</i>
                                <span>MESSAGES</span>
                            </a>
                        </li>                     
                        <li class="{{Request::is('administration/blogueur/commentaires*')?'active':''}}">
                            <a href="{{ route('blogger.commentaires.index') }}">
                                <i class="material-icons">question_answer</i>
                                <span>COMMENTAIRES</span>
                            </a>
                        </li>

                    @endif

                    <li class="header">Systeme</li>

                    @if(Request::is('administration/administrateur*'))

                        <li class="{{Request::is('administration/administrateur/parametre')?'active':''}}">
                            <a href="{{ route('admin.parametre.index') }}">
                                <i class="material-icons">settings</i>
                                <span>PARAMETRE</span>
                            </a>
                        </li>

                    @elseif(Request::is('administration/blogueur*'))

                        <li class="{{Request::is('administration/blogueur/parametre')?'active':''}}">
                            <a href="{{ route('blogger.parametre.index') }}">
                                <i class="material-icons">settings</i>
                                <span>PARAMETRE</span>
                            </a>
                        </li>

                    @endif
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="material-icons">arrow_back</i>
                            <span>ALLER AU BLOG</span>
                        </a>
                    </li>

                    <li>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>
                            <span>{{ __('SE DECONNECTER') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 <a href="javascript:void(0);">Blogger - Administration</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.3
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- ------------x---------------  Left Sidebar --------------------------x------------------- -->

    </section>

    <!-- ------------x---------------  Sidebars --------------------------x------------------- -->


    <!----------------------------- Main Site Section ------------ ------------------------------>

    <section class="content">
        @yield('content')
    </section>

    <!---------------x------------- Main Site Section ---------------------------x-------------->

    <!-- Scripts -->

    <!-- Jquery Core Js -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    {{-- <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('backend/plugins/node-waves/waves.js') }}"></script>

    <!-- Toastr Plugin Js -->
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @stack('js')
    <!-- Custom Js -->
    <script src="{{ asset('backend/js/admin.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('backend/js/demo.js') }}"></script>
</body>

</html>