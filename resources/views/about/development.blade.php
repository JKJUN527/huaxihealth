@extends('layout.master')
@section('title', '发展战略|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset("css/news.css")}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/about">关于我们</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;发展战略</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.aboutTab',['index'=>5])
            <div class="right_content">
                <div class="con_title">大事记详情</div>
                <div class="con_box">
                    <p style="text-align: center"><span style="font-size: 22px"><span><strong><span>成都华西精准医学产业技术研究院发展战略</span></strong></span></span></p>
                    <div class="ny_tdbk">
                        <div class="ny_jlxqjj">
                            {!! $data['webinfo']->strategy_content !!}
                        </div>
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