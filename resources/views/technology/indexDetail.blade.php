@extends('layout.master')
@section('title', '委员详情|成都华西精准医学产业技术研究院')

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
                        <div class="wrap">
                            <h3>
                                @if($data['info']->type == 0)
                                    主任委员
                                @else
                                    委员
                                @endif
                                <span></span>
                            </h3>
                        </div>
                        <div class="activity">
                            <div class="team-detail">
                                <div class="team-head">

                                    <img class="fl" src="{{$data['info']->photo or asset('images/photo_default.jpg')}}">
                                    <div class="team-info">
                                        <h2>{{$data['info']->name}}</h2>
                                        <p class="lable">{{$data['info']->academic_title}}</p>
                                        <p>最高学历：
                                            <span>
                                                @if($data['info']->education == 0)
                                                    学士
                                                @elseif($data['info']->education == 1)
                                                    硕士
                                                @elseif($data['info']->education == 2)
                                                    博士
                                                @elseif($data['info']->education == 3)
                                                    博士后
                                                @elseif($data['info']->education == 4)
                                                    访问学者
                                                @endif
                                            </span>
                                        </p>
                                        <p>研究方向：
                                            <span>
                                                {{$data['info']->direction}}
                                            </span>
                                        </p>
                                        <p>技术职称：
                                            <span>
                                                {{$data['info']->title}}
                                            </span>
                                        </p>
                                        {{--<p>电话：<span></span></p>--}}
                                        <!-- <p>地址：<span></span></p>
                                         <p>邮编：<span>网络空间安全</span></p>-->
                                    </div>
                                </div>
                                <div class="team-detailcon">
                                    <p><b>&nbsp;{{$data['info']->name}}简介</b></p>
                                    <p>&nbsp;</p>
                                    {!! $data['info']->brief !!}
                                </div>
                            </div>
                        </div>
                    </div>
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