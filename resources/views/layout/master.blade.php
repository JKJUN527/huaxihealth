<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content="华西健康,华西精准医学产业技术研究院,成都,华西,精准医学,华西研究院"/>
    <meta name="description" content="华西精准医学产业技术研究院官网"/>
    <meta name="baidu-site-verification" content="POJms2hOXE" />
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('style/iconfont/iconfont.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{asset('plugins/layer/layer.js')}}"></script>
    <link href="{{asset('plugins/layer/theme/default/layer.css')}}" rel='stylesheet' type='text/css' />
    <style>
        nav{
            text-align: center;
        }
        .bdshare-button-style0-32 a {
            float: left;
            width: 32px;
            line-height: 32px;
            height: 32px;
            background-image: url(../img/share/icons_0_32.png?v=7f3ed0f4.png);
            background-repeat: no-repeat;
            cursor: pointer;
            margin: 6px 6px 6px 0;
            text-indent: -100em;
            overflow: hidden;
            color: #3a8ceb;
        }
    </style>
    @section('custom-style')
    @show
</head>
<body>
<!--header-->
<!--logo and nav-->
@section('header-tab')
@show

@section('header-nav')
@show
<!--banner-->
@section('content')
@show
<!--footer-->
@section('footer')
@show
<script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}" ></script>
{{--<script type="text/javascript" src="{{asset('js/jquery.js')}}" ></script>--}}
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
