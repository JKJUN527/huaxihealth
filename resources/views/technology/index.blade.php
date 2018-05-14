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
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/technology">科技研发</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;专家委员会</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.technologyTab',['index'=>1])
            <div class="right_content">
                <div class="con_title">专家委员会</div>
                <div class="con_box">
                    <div class="team">
                        <div class="wrap"><h3>主任委员<span></span> </h3></div>
                        <div class="activity">
                            <div class="team-detail">
                                <div class="team-head">

                                    <img class="fl" src="/public/uploads/">
                                    <div class="team-info">
                                        <h2>陈兴蜀</h2>
                                        <p class="lable">常务副院长、博士、教授、博士生导师</p>
                                        <p>专业：<span>网络空间安全</span></p>
                                        <p>研究方向：<span></span></p>
                                        <p>Email：<span></span></p>
                                        <p>电话：<span></span></p>
                                        <!-- <p>地址：<span></span></p>
                                         <p>邮编：<span>网络空间安全</span></p>-->
                                    </div>
                                </div>
                                <div class="team-detailcon">
                                    <p>&nbsp;陈兴蜀教授简介</p>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team">
                        <div class="wrap"><h3>委员<span></span> </h3></div>

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