<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Icon de logo du Site -->
    <link rel="shortcut icon" href="{{asset('enfold/images/enfold.png')}}" type="image/x-icon">
    <meta content="#f8f8f8" name="theme-color" />
    <!-- Windows Phone -->
    <meta content="#f8f8f8" name="msapplication-navbutton-color" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Enfold') }}</title>

    <!-- --------------------------- Fonts ---------------------------------------- -->

    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" media="all" rel="stylesheet" type="text/css" />
    <!-- -------------x------------- Fonts --------------------x------------------- -->


    <!-- --------------------------- Styles ---------------------------------------- -->

	<link rel="stylesheet" href="{{ asset('enfold/css/breaking-news-ticker.min.css')}}">
    <link href="{{ asset('enfold/css/TemplateStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/Typography.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/BlogTemplateStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/sliderwrapper.css') }}" rel="stylesheet">
    <link href="{{ asset('enfold/css/font-awesome/4-7-0/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{asset('enfold/css/jquerysctipttop.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('enfold/css/master.css')}}">
    <style>
        .demo3 {
            font-family: Arial, sans-serif;
            border: 1px solid #0077b5;
            margin: 28px 0;
            font-style: normal;
            position: relative;
            padding: 0 0 0 80px;
            box-shadow: 0 2px 5px -3px #000;
            border-radius: 3px;
        }
        .demo3:before {
            content: "Dernières nouvelles";
            display: inline-block;
            font-style: normal;
            background: #0077b5;
            padding: 10px;
            color: #FFF;
            font-weight: bold;
            position: absolute;
            top: 0;
            left: 0;
        }
        .demo3:after {
            content: '';
            display: block;
            font-weight: bold;
            top: 0;
            left: 0;
            background: linear-gradient(#FFF, rgba(255, 255, 255, 0));
            height: 20px;
        }
        .demo3 ul li {
            list-style: none;
            padding: 10px 0;
            margin-left:17% !important;
        }

        @media screen and (max-width: 800px) {
            .demo3 ul li {
                list-style: none;
                padding: 10px 0;
                margin-left:17% !important;
            }
        }

        @media screen and (max-width: 745px) {
            .demo3 ul li {
                list-style: none;
                padding: 10px 0;
                margin-left:16.6% !important;
            }
        }

        @media screen and (max-width: 710px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-3% !important;
            }
        }

        @media screen and (max-width: 710px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-4% !important;
            }
        }

        @media screen and (max-width: 680px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-4% !important;
            }
        }

        @media screen and (max-width: 650px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-4.5% !important;
            }
        }

        @media screen and (max-width: 630px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-4.5% !important;
            }
        }

        @media screen and (max-width: 620px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-5% !important;
            }
        }

        @media screen and (max-width: 610px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-5% !important;
            }
        }

        @media screen and (max-width: 600px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-5.4% !important;
            }
        }

        @media screen and (max-width: 580px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-5.6% !important;
            }
        }

        @media screen and (max-width: 540px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-6% !important;
            }
        }

        @media screen and (max-width: 500px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-6.4% !important;
            }
        }

        @media screen and (max-width: 490px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-7% !important;
            }
        }

        @media screen and (max-width: 450px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-7.4% !important;
            }
        }

        @media screen and (max-width: 425px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-9% !important;
            }
        }

        @media screen and (max-width: 390px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-19% !important;
            }
        }

        @media screen and (max-width: 380px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-10% !important;
            }
        }

        @media screen and (max-width: 370px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-10.3% !important;
            }
        }

        @media screen and (max-width: 360px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-18% !important;
            }
        }


        @media screen and (max-width: 345px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-11% !important;
            }
        }


        @media screen and (max-width: 335px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-12% !important;
            }
        }


        @media screen and (max-width: 325px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-12.8% !important;
            }
        }

        @media screen and (max-width: 320px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-13% !important;
            }
        }

        @media screen and (max-width: 315px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-14% !important;
            }
        }

        @media screen and (max-width: 310px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-15% !important;
            }
        }

        @media screen and (max-width: 305px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-16% !important;
            }
        }

        @media screen and (max-width: 300px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-17% !important;
            }
        }

        @media screen and (max-width: 290px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-18% !important;
            }
        }

        @media screen and (max-width: 260px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-20% !important;
            }
        }

        @media screen and (max-width: 240px) {

            .demo3:before {
                content: "\f09d";
            }
            .demo3 ul li {
                margin-left:-25% !important;
            }
        }
    </style>
    
    @stack('css')
    <!-- -------------x------------- Styles --------------------x------------------- -->


    <!-- --------------------------- Scripts ---------------------------------------- -->

    <script src="{{ asset('enfold/js/GlobalVariables.js') }}" type="text/javascript"></script>
    <!-- -------------x------------- Scripts --------------------x------------------- -->

</head>

<body class="index home">

    <!-- Theme Options -->
    <div class="theme-options" style="display: none;">
        <div class="sora-panel section" id="sora-panel" name="Theme Options">
            <div class="widget LinkList" data-version="2" id="LinkList70">
                <style type="text/css">
                    #outer-wrapper {
                        max-width: none;
                    }
                </style>
            </div>
            <div class="widget LinkList" data-version="2" id="LinkList71">
                <script type="text/javascript">
                    //<![CDATA[
                    /* var disqusShortname = "soratemplates";
                    var commentsSystem = "blogger"; */
                    var fixedSidebar = true;
                    var fixedMenu = true;
                    var postPerPage = 5;
                    //]]>
                </script>
            </div>
        </div>
    </div>

    <!-- Outer Wrapper -->
    <div id="outer-wrapper">

        <!-- --------------------------- Header ---------------------------------------- -->

        <!-- Start Menu -->

        @include('enfold.componants.header')

        <!-- End Menu -->

        <!-- -------------x------------- Header --------------------x------------------- -->

        <!-- START CONTAINER -->

        <!-- Content Wrapper -->

        <div class="clearfix"></div>

        <!-- --------------------------- Content   ---------------------------------------- -->

        <div class="row" id="content-wrapper">
            <div class="container">

                <!-- Start Main Wrapper -->

                <div id="main-wrapper">
                    @yield('content')
                </div>

                <!-- End Main Wrapper -->

                <!-- Start Sidebar Wrapper -->

                <div id="sidebar-wrapper">

                    @yield('sidebar')
                </div>

                <!-- End Sidebar Wrapper -->
            </div>
        </div>

        <!-- -------------x------------- Content --------------------x------------------- -->

        <!-- START CONTAINER -->

        <!-- START FOOTER -->

        <!-- Footer Wrapper -->

        <div class="clearfix"></div>

        <!-- --------------------------- Footer ---------------------------------------- -->
        <div id="footer-wrapper">
            @include('enfold.componants.footer')
        </div>
        <!-- -------------x------------- Footer --------------------x------------------- -->

        <!-- START FOOTER -->
    </div>
    <!-- --------------------------- Scripts ---------------------------------------- -->

    @stack('js')

    <script defer src="{{asset('enfold/js/main.js')}}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
	<script src="{{asset('enfold/js/jquery.js')}}"></script>
    <script src="{{asset('enfold/js/jquery.easy-ticker.js')}}"></script> 
    <script src="{{asset('enfold/js/jquery.easing.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/GlobalVariables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/theiaStickySidebar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/ThemeFunctions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/Pagination.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/facebook-sdk.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/69258925-widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/rearrange.js') }}" type="text/javascript"></script>
    <script src="{{ asset('enfold/js/breakingnews.js') }}" type="text/javascript"></script>

    <script>
		$(function(){
			
			$('.demo3').easyTicker({
				visible: 1,
				interval: 6000
			});
		});
	</script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('ul.tabs li').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            });
        });
    </script>

    <script type="text/javascript">
		var slideIndex = 0;
        showSlides();

        function plusSlides(n) {
            
            showSlide(slideIndex += n);
        }
        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            if (slideIndex > slides.length) {slideIndex = 1}
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 20000); // Change image every 2 seconds
        }


        function showSlide(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
	</script>

    <style type="text/css">

        /* Slideshow container */
        .slideshow-container {
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #fff;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
            font-weight:bold;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
        }
    </style>

    <!-- -------------x------------- Scripts --------------------x------------------- -->

    <!-- Toastr Plugin Js -->
    <script src="{{asset('enfold/js/toastr.min.js')}}" type="text/javascript"></script>

    {!! Toastr::message() !!}

    <!-- Overlay and Back To Top -->
    <div class="overlay"></div>
    <div class="back-top" title="Back to Top"></div>
</body>

</html>