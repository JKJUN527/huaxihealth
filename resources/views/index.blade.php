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
    <style>
        .tempWrap{
            width: 100%;
        }
    </style>
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
            <ul><li class="first">新闻中心</li><li class="second">产业动态</li><li class="third">学术研讨</li></ul>
        </div>
        <div class="bd">
            <div class="box">
                <a href="/news" class="more">MORE+</a>
                <ul class="clearfix">
                    @forelse($data['news'] as $new)
                        <li>
                            <a href="/news/detail?nid={{$new->id}}">
                                @if($new->picture != null)
                                    <?php
                                    $pics = explode(';', $new->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                        <img src="{{$baseurl}}{{$imagepath}}"/>
                                @else
                                        <img src="{{asset('images/wechatcode.jpg')}}"/>
                                @endif
                                <h4>{{$new->title}}</h4>
                                <span class="date">{{mb_substr($new->created_at,0,10,'utf-8')}}</span>
                            </a>
                        </li>
                    @empty
                        <li>暂无新闻</li>
                    @endforelse
            </div>
            <div class="box">
                <a href="/industry" class="more">MORE+</a>
                <ul class="clearfix">
                    @forelse($data['industry'] as $new)
                        <li>
                            <a href="/news/detail?nid={{$new->id}}">
                                @if($new->picture != null)
                                    <?php
                                    $pics = explode(';', $new->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                    <img src="{{$baseurl}}{{$imagepath}}"/>
                                @else
                                    <img src="{{asset('images/wechatcode.jpg')}}"/>
                                @endif
                                <h4>{{$new->title}}</h4>
                                <span class="date">{{mb_substr($new->created_at,0,10,'utf-8')}}</span>
                            </a>
                        </li>
                    @empty
                        <li>暂无产业动态</li>
                    @endforelse
                </ul>
            </div>
            <div class="box">
                <a href="/cooperation" class="more">MORE+</a>
                <ul class="clearfix">
                    @forelse($data['cooperation'] as $new)
                        <li>
                            <a href="/news/detail?nid={{$new->id}}">
                                @if($new->picture != null)
                                    <?php
                                    $pics = explode(';', $new->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                    <img src="{{$baseurl}}{{$imagepath}}"/>
                                @else
                                    <img src="{{asset('images/wechatcode.jpg')}}"/>
                                @endif
                                <h4>{{$new->title}}</h4>
                                <span class="date">{{mb_substr($new->created_at,0,10,'utf-8')}}</span>
                            </a>
                        </li>
                    @empty
                        <li>暂无学术研讨</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="right_box">
        <!--notice-->
        <div class="notice">
            <div class="n_title">
                <b>最新通知</b>
                <a href="/news/notes">MORE+</a>
            </div>
            <div class="bd">
                <ul class="infoList">
                    @forelse($data['notes'] as $note)
                        <li>
                            {{$note->content}}
                            <span class="date">{{mb_substr($note->created_at,0,10,'utf-8')}}</span>
                        </li>
                    @empty
                        <li>
                            <a>暂无公告</a>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <!--code-->
        <div class="code">
            <img src="{{asset('images/wechatcode.jpg')}}" />
        </div>
    </div>
    <div class="clear"></div>
    <div class="friend_link">
        <b>友情链接：</b>
        <a href="http://www.schxjk.com:8899" target="_blank">四川华西健康</a>
        <a href="http://www.cd120.com/" target="_blank">华西医院官网</a>
    </div>
</div>
@endsection
@section('footer')
    @include('components.footer')
@endsection
@section('custom-script')
@endsection