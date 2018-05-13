@extends('layout.master')
@section('title', '公示公告|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    {{--<link href="css/news.css" rel='stylesheet' type='text/css' />--}}
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/news">新闻中心</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;公示公告</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.newsTab',['index'=>2])
            <div class="right_content">
                <div class="con_title">公示公告</div>
                <div class="con_box">
                    <ul class="items-list">
                        <li><a href="sDetail.html">公告1</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告2</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告3</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告4</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告5</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告6</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告7</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告8</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告9</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">公告10</a><span class="date">2016-05-05</span></li>
                    </ul>
                    <!--分页-->
                    <div class="record">
                        <span class="prev"><a href="">上一页</a></span>
                        <span class="word"><a href="">1</a></span>
                        <span class="word"><a href="">2</a></span>
                        <span class="word"><a href="">3</a></span>
                        <span class="word"><a href="">4</a></span>
                        <span class="word"><a href="">5</a></span>
                        <span class="word"><a href="">6</a></span>
                        <span class="next"><a href="">下一页</a></span>
                        <span class="sum">共6页</span>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
@section('footer')
    @include('components.footer')
@endsection
@section('custom-script')
@endsection