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
                        <div class="ny_jlxqt">{{$data['detail']->title}}</div>
                        <div class="ny_jlxqxt">责任编辑：<font>{{$data['detail']->author}}</font>&nbsp;&nbsp;&nbsp;发布时间：<font>{{$data['detail']->created_at}}</font>&nbsp;&nbsp;&nbsp;</div>
                        <div class="ny_jlxqjj">
                            <br>
                            {!! $data['detail']->content !!}
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