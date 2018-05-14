@extends('layout.master')
@section('title', '科技研发|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset('css/news.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/technology.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/technology">科技研发</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;成果发布</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.technologyTab',['index'=>3])
            <div class="right_content">
                <div class="con_title">成果详情</div>
                <div class="con_box">
                    <div class="ny_tdbk">
                        <div class="ny_jlxqt">能源战略与运筹研究中心</div>
                        <div class="ny_jlxqxt">发布时间：<font>2017-09-13 17:06:57</font>&nbsp;&nbsp;&nbsp;</div>
                        <div class="ny_jlxqjj">
                            <br>
                            <p>2017年9 月 11 日至12日，2017中美绿色能源高峰论坛在蓉盛大举行。300多名来自中美两国电力行业、可再生能源行业、信息技术行业和互联网行业的领军人物和行业人士出席论坛。本次论坛由清华四川能源互联网研究院承办，美中绿色能源促进会、四川省外事侨务办、中国电机工程学会等单位主办，聚焦全球能源转型，共同探讨推广绿色能源、满足全球电力需求、减少大气污染等举世瞩目的话题。</p>
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