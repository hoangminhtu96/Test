<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>NT Demo Laravel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{!! url('font-end/css/bootstrap.css') !!}" rel="stylesheet">
<link href="{!! url('font-end/css/bootstrap-responsive.css') !!}" rel="stylesheet">
<link href="{!! url('font-end/css/style.css') !!}" rel="stylesheet">
<link href="{!! url('font-end/css/flexslider.css') !!}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{!! url('font-end/css/jquery.fancybox.css') !!}" rel="stylesheet">
<link href="{!! url('font-end/css/cloud-zoom.css') !!}" rel="stylesheet">
<link href="{!! url('font-end/css/portfolio.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="{!! url('font-end/css/font-awesome.min.css') !!}">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{!! asset('font-end/assets/ico/favicon.ico')!!}">
</head>
<body>
<!-- Header Start -->
<header>

    <!-- Include Header -->
    @include('font-end.layouts.header')
    
    <div class="container">
        @include('font-end.layouts.header-detail')
        @include('font-end.layouts.nav-menu')
    </div>
</header>
<!-- Header End -->

<div id="maincontainer">
    <img src="" alt="">
    <!-- Slider Start-->
    <!-- Slider End-->
    @yield('slider')
    <!--  @yield('slider') -->
    <!-- Section Start-->
    @yield('other-detail')
    <!-- @yield('other-detail') -->
    <!-- Section End-->

    <!--  Nội dung chính  -->
    <!-- Home-->
    @yield('home')
    <!-- cates -->
    @yield('cate')
    <!-- Product-detail-->
    @yield('product-detail')
    @yield('contact')
    @yield('shopping-cart')
    @yield('checkout')
    @yield('complete')
    @yield('register')
    <!--  End Nội dung chính  -->

<!-- Footer -->
@include('font-end.layouts.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! url('font-end/js/jquery.js') !!}"></script> 
<script src="{!! url('font-end/js/bootstrap.js') !!}"></script> 
<script src="{!! url('font-end/js/respond.min.js') !!}"></script> 
<script src="{!! url('font-end/js/application.js') !!}"></script> 
<script src="{!! url('font-end/js/bootstrap-tooltip.js') !!}"></script> 
<script defer src="{!! url('font-end/js/jquery.fancybox.js') !!}"></script> 
<script defer src="{!! url('font-end/js/jquery.flexslider.js') !!}"></script> 
<script type="text/javascript" src="{!! url('font-end/js/jquery.tweet.js') !!}"></script> 
<script  src="{!! url('font-end/js/cloud-zoom.1.0.2.js') !!}"></script> 
<script  type="text/javascript" src="{!! url('font-end/js/jquery.validate.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('font-end/js/jquery.carouFredSel-6.1.0-packed.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('font-end/js/jquery.mousewheel.min.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('font-end/js/jquery.touchSwipe.min.js') !!}"></script> 
<script type="text/javascript"  src="{!! url('font-end/js/jquery.ba-throttle-debounce.min.js') !!}"></script> 
<script src="{!! url('font-end/js/jquery.isotope.min.js')!!}"></script> 
<script defer src="{!! url('font-end/js/custom.js')!!}"></script>
<!-- MyJs -->
<script src="{!! url('font-end/js/myjs.js')!!}"></script> 
</body>
</html>