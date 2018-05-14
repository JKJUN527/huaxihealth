@extends('layout.master')
@section('title', '科技研发|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset('css/technology.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/technology">科技研发</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;科研团队</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.technologyTab',['index'=>2])
            <div class="right_content">
                <div class="con_title">科研团队</div>
                <div class="con_box">
                    <ul class="items-list">
                        <li><a href="/technology/team/detail">团队1</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队2</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队3</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队4</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队5</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队6</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队7</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队8</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队9</a><span class="date">2016-05-05</span></li>
                        <li><a href="sDetail.html">团队10</a><span class="date">2016-05-05</span></li>
                    </ul>
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