<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content="华西健康"/>
    <meta name="description" content="华西健康"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    @section('custom-style')
    @show
</head>
<body>
<!--header-->
@section('header-nav')
@show
<!--logo and nav-->
@section('header-tab')
@show
<!--banner-->
@section('content')
@show
<!--footer-->
@section('footer')
@show
<script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('js/jquery.SuperSlide.2.1.js')}}" ></script>
<script type="text/javascript" src="{{asset('js/common.js')}}" ></script>
<script type="text/javascript">
    //banner滚动效果
    jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });
    //tab切换效果
    jQuery(".left_tab").slide();
    //news滚动效果
    jQuery(".notice").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:3});
</script>
@section('custom-script')
@show
</body>
</html>
