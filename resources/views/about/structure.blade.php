@extends('layout.master')
@section('title', '组织架构|成都华西精准医学产业技术研究院')

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
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/about">关于我们</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;组织架构</span>
            </div>
        </div>
        <div class="c_area">
@include('components.aboutTab',['index'=>3])
            <div class="right_content">
                <div class="con_title">组织架构</div>
                <div class="con_box">
                    <p style="text-align: center"><span style="font-size: 22px"><span><strong><span>成都华西精准医学产业技术研究院组织架构</span></strong></span></span></p>
                    <p style="padding-right: 16px; padding-left: 16px; font-size: 16px; padding-bottom: 16px; line-height: 200%; padding-top: 16px; font-family: 宋体">
                        <span>
                            <img alt="" src="{{$data['webinfo']->structure or asset('images/structure.png')}}" width="750" height="511" align="middle">
                        </span>
                    </p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
@endsection
@section('footer')
    @include('components.footer',['about'=>$data['aboutinfo']])
@endsection
@section('custom-script')
@endsection