@extends('layout.master')
@section('title', '成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    {{--<link href="css/index.css" rel='stylesheet' type='text/css' />--}}
@endsection
@section('content')
<div class="banner">
    <div class="bd">
        <ul>
            <li class="first"><a href="javascript:void(0);"></a></li>
            <li class="second"><a href="javascript:void(0);"></a></li>
            <li class="third"><a href="javascript:void(0);"></a></li>
            <li class="fourth"><a href="javascript:void(0);"></a></li>
            <li class="fifth"><a href="javascript:void(0);"></a></li>
        </ul>
    </div>
    <div class="hd"><ul></ul></div>
</div>
<!--content-->
<div class="content">
    <div class="left_tab">
        <div class="hd">
            <ul><li class="first">秘书学简介</li><li class="second">秘书节</li><li class="third">文秘系新闻</li></ul>
        </div>
        <div class="bd">
            <div class="box">
                <a href="about1.html" class="more">MORE+</a>
                <ul class="clearfix">
                    <li><a href="about1.html"><img src="images/a1.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="about1.html"><img src="images/a2.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="about1.html"><img src="images/a3.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="about1.html"><img src="images/a4.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="about1.html"><img src="images/a5.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="about1.html"><img src="images/a6.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                </ul>
            </div>
            <div class="box">
                <a href="secret.html" class="more">MORE+</a>
                <ul class="clearfix">
                    <li><a href="secret.html"><img src="images/s1.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="secret.html"><img src="images/s2.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="secret.html"><img src="images/s3.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="secret.html"><img src="images/s4.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="secret.html"><img src="images/s5.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="secret.html"><img src="images/s6.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                </ul>
            </div>
            <div class="box">
                <a href="news.html" class="more">MORE+</a>
                <ul class="clearfix">
                    <li><a href="nDetail.html"><img src="images/n1.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="nDetail.html"><img src="images/n2.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="nDetail.html"><img src="images/n3.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="nDetail.html"><img src="images/n4.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="nDetail.html"><img src="images/n5.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                    <li><a href="nDetail.html"><img src="images/n6.jpg" /><h4>标题名称标题名称标题名称标题名称标题名称</h4><span class="date">2016-05-05</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="right_box">
        <!--notice-->
        <div class="notice">
            <div class="n_title">
                <b>最新通知</b>
                <a href="notice.html">MORE+</a>
            </div>
            <div class="bd">
                <ul class="infoList">
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                    <li><a href="nDetail.html">通知标题通知标题，通知标题通知标题通知标题通知标题。</a><span class="date">2016-05-11</span></li>
                </ul>
            </div>
        </div>
        <!--code-->
        <div class="code">
            <img src="images/er.jpg" />
        </div>
    </div>
    <div class="clear"></div>
    <div class="friend_link">
        <b>友情链接：</b><a href="" target="_blank">XX研究中心</a><a href="" target="_blank">XX研究所</a>
    </div>
</div>
@endsection
@section('footer')
    @include('components.footer')
@endsection
@section('custom-script')
@endsection