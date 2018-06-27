@extends('layout.master')
@section('title', '成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset('css/index.css')}}" rel='stylesheet' type='text/css' />
    <style>
        .tempWrap{
            width: 100%;
        }
        .infoList li{
            height: 60px !important;
        }
    </style>
@endsection
@section('content')
<div class="banner">
    <div class="bd">
        <ul>
            <?php $picturs = explode(';',$data['aboutinfo']->picture);?>
            @foreach($picturs as $pic)
                <li class="first" style="background: url({{$pic}}) center center no-repeat"><a href="javascript:void(0);"></a></li>
            @endforeach
            {{--<li class="second"><a href="javascript:void(0);"></a></li>--}}
            {{--<li class="third"><a href="javascript:void(0);"></a></li>--}}
            {{--<li class="fourth"><a href="javascript:void(0);"></a></li>--}}
            {{--<li class="fifth"><a href="javascript:void(0);"></a></li>--}}
        </ul>
    </div>
    <div class="hd"><ul></ul></div>
</div>
<!--content-->
<div class="content">
    <div class="left_tab">
        <div class="hd">
            <ul>
                <li class="first"><i class="iconfont icon-xinwen"></i>新闻中心</li>
                <li class="second"><i class="iconfont icon-haiduchanye" style="font-size: 1.8rem"></i>产业动态</li>
                <li class="third"><i class="iconfont icon-study"></i>学术研讨</li>
            </ul>
        </div>
        <div class="bd">
            <div class="box">
                <a href="/news" class="more" style="top: -50px;">MORE+</a>
                    <div class="con" id="list1">
                        {{--<a href="/news/group-news/" target="_blank" class="more">更多»</a>--}}
                        @if(count($data['news']) >= 1)
                            <dl class="clearfix">
                                <div class="image">
                                    <a href="/news/detail?nid={{$data['news'][0]->id}}" target="_blank">

                            @if($data['news'][0]->picture != null)
                                <?php
                                $pics = explode(';', $data['news'][0]->picture);
                                $baseurl = explode('@', $pics[0])[0];
                                $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                $imagepath = explode('@', $pics[0])[1];
                                ?>
                                    <img src="{{$baseurl}}{{$imagepath}}" alt="">
                            @else
                                    <img src="http://140.143.97.128/storage/newspic/2018-06-14-10-58-07-5b21d9bf06d77news1.jpg" alt="">
                            @endif
                                    </a>
                                </div>
                                <div class="text">
                                    <strong><em>{{substr($data['news'][0]->created_at,0,10)}}</em>
                                        <a href="/news/detail?nid={{$data['news'][0]->id}}" target="_blank" title="">{{$data['news'][0]->title}}</a></strong>
                                    <p>{{strip_tags($data['news'][0]->content)}}
                                        <a href="/news/detail?nid={{$data['news'][0]->id}}" target="_blank">[详情]</a></p>
                                </div>
                            </dl>
                        @endif
                        <ul>
                            <?php $i = 0;?>
                            @foreach($data['news'] as $item)
                                @if($i++ > 0)
                                    <li>
                                        <a href="/news/detail?nid={{$item->id}}" target="_blank" title="">{{$item->title}}</a>
                                        <span>{{mb_substr($item->created_at,0,10,'utf-8')}}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
            </div>
            <div class="box">
                <a href="/industry" class="more">MORE+</a>
                <ul class="clearfix">
                    @forelse($data['industry'] as $new)
                        <li>
                            <a href="/industry/detail?nid={{$new->id}}">
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
                            <a href="/cooperation/detail?nid={{$new->id}}">
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
        <div class="index-news2">
            <h2>
                <a href="/notes" class="tabs current" rel="list11"><i class="iconfont icon-Notes"></i>公示公告</a>
                <a href="/news/general-news/" class="tabs" rel="list12"><i class="iconfont icon-fuwutixi"></i>对外合作</a>
            </h2>
            <div class="con" id="list11" style="display: block;">
                <ul>
                    @forelse($data['notes'] as $note)
                        <li>
                            <a href="/news/notes/detail?nid={{$note->id}}" target="_blank">{{$note->title}}</a>
                            <span class="date">{{mb_substr($note->created_at,0,10,'utf-8')}}</span>
                        </li>
                    @empty
                        <li>
                            <a>暂无公告</a>
                        </li>
                    @endforelse
                </ul>
                <a href="/news/notes" class="more">更多»</a>
            </div>
            <div class="con" id="list12" style="display:none">
                @if(count($data['out']) >= 1)
                    <dl class="clearfix">
                        <div class="image">
                            <a href="/cooperation/out/detail?nid={{$data['out'][0]->id}}" target="_blank">
                    @if($data['out'][0]->picture != null )
                        <?php
                        $pics = explode(';', $data['out'][0]->picture);
                        $baseurl = explode('@', $pics[0])[0];
                        $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                        $imagepath = explode('@', $pics[0])[1];
                        ?>
                            <img src="{{$baseurl}}{{$imagepath}}" alt=""></a>
                    @else
                            <img src="{{asset('images/testnews.jpg')}}" alt=""></a>
                    @endif
                    </div>
                    <div class="text">
                        <strong>
                            <a href="/cooperation/out/detail?nid={{$data['out'][0]->id}}" target="_blank" title="">{{$data['out'][0]->title}}</a>
                        </strong>
                        <span>{{$data['out'][0]->created_at}}</span>
                    </div>
                </dl>
                @endif
                <ul>
                    <?php $i = 0;?>
                    @foreach($data['out'] as $item)
                        @if($i++ > 0)
                            <li><a href="/cooperation/out/detail?nid={{$item->id}}" target="_blank" title="">{{$item->title}}</a>
                                <span>{{mb_substr($item->created_at,0,10,'utf-8')}}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <a href="/cooperation/out" class="more">更多»</a>
            </div>
        </div>
    </div>
    <div class="right_box">
        <!--notice-->
        <div class="notice">
            <div class="n_title">
                <b><i class="iconfont icon-team"></i>科研团队</b>
                <a href="/technology/team">MORE+</a>
            </div>
            <div class="bd">
                <ul class="infoList">
                    @forelse($data['techTeam'] as $team)
                        <li>
                            <a href="/technology/team/detail?id={{$team->id}}" target="_blank">{{$team->title}}</a>
                            <span class="date">{{mb_substr($team->created_at,0,10,'utf-8')}}</span>
                        </li>
                    @empty
                        <li>
                            <a>暂无团队介绍</a>
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
    {{--<div class="friend_link">--}}
        {{--<b>友情链接：</b>--}}
        {{--<a href="http://www.schxjk.com:8899" target="_blank">四川华西健康</a>--}}
        {{--<a href="http://www.cd120.com/" target="_blank">华西医院官网</a>--}}
    {{--</div>--}}
</div>
@endsection
@section('footer')
    @include('components.footer',['about'=>$data['aboutinfo']])
@endsection
@section('custom-script')
    <script>
        $(".tempWrap").css("height","280px");
        $('.tabs').mouseover(function () {
            $(this).addClass('current');
            $(this).siblings().removeClass('current');
            if($(this).attr('rel') == "list11"){
                $('#list11').show();
                $('#list12').hide();
            }else{
                $('#list11').hide();
                $('#list12').show();
            }
        });
    </script>
@endsection