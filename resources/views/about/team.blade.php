@extends('layout.master')
@section('title', '团队介绍|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset('css/team.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/about">关于我们</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;团队介绍</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.aboutTab',['index'=>2])
            <div class="right_content">
                <div class="con_title">团队介绍</div>
                <div class="con_box">
                    @forelse($data['team'] as $team)
                    <div class="team-show" style="display:none;">
                        <div class="col-md-8 col-sm-8 col-xs-12 show-left">
                            <b>{{$team->name}}</b>
                            <em>{{$team->byname}}</em>
                            <p></p>
                            <p>{!! $team->brief !!}</p>
                            <p></p>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 show-right">
                            <img src="{{$team->picture or asset('images/photo_default.jpg')}}" style="">
                        </div>
                        <i class="show-close">关闭</i>
                    </div>
                    @empty
                        <div class="team-show" style="display: block;">
                            暂无团队介绍
                        </div>
                    @endforelse
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>于旭波</b>--}}
                            {{--<em>党组副书记、董事、总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于对外经济贸易大学，国际贸易专业，中欧国际工商学院EMBA。1988年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K330Z4.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>万早田</b>--}}
                            {{--<em>党组副书记、副总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于华中农业大学，农学专业，北京大学行政管理硕士。2006年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K411394.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>迟京涛</b>--}}
                            {{--<em>党组成员、常务副总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于装甲兵工程学院，车辆与机械工程专业，对外经济贸易大学EMBA。2003年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K433525.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>马建平</b>--}}
                            {{--<em>党组成员、副总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于对外经济贸易大学，会计专业，对外经济贸易大学EMBA。1986年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K51XK.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>栾日成</b>--}}
                            {{--<em>党组成员、副总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于山东大学，中国古代文学硕士，中欧国际工商学院EMBA，曾任中纺集团总经理。2016年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K53aV.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>马王军</b>--}}
                            {{--<em>党组成员、总会计师</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于北京商学院，会计专业，长江商学院EMBA。1988年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K602133.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>周政</b>--}}
                            {{--<em>党组成员、副总裁</em>--}}
                            {{--<p>--}}
                            {{--</p><p>--}}
                                {{--毕业于南昌航空大学，北京航空航天大学航空宇航制造工程硕士，国务院特殊津贴专家。1993年加入中粮集团。</p>--}}

                            {{--<p></p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/uploads/170616/9-1F6161K6214X.jpg" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}
                    {{--<div class="team-show" style="display: none;">--}}
                        {{--<div class="col-md-8 col-sm-8 col-xs-12 show-left">--}}
                            {{--<b>袁久强</b>--}}
                            {{--<em>党组成员、党组纪检组组长</em>--}}
                            {{--<p>--}}

                            {{--</p>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-sm-4 col-xs-12 show-right">--}}
                            {{--<img src="/images/defaultpic.gif" style="">--}}
                        {{--</div>--}}
                        {{--<i class="show-close">关闭</i>--}}
                    {{--</div>--}}

                    <ul class="row team-box">
                        @foreach($data['team'] as $team)
                            <li class="col-md-3 col-sm-3 col-xs-4">
                                <div class="team-list">
                                    <h1 class="h1-hover">{{$team->name}}</h1>
                                    <p>{{$team->byname}}</p>
                                    <em class=""><!--这里是箭头哦--></em>
                                </div>
                            </li>
                        @endforeach
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">于旭波</h1>--}}
                                {{--<p>党组副书记、董事、总裁</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">万早田</h1>--}}
                                {{--<p>党组副书记、副总裁</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">迟京涛</h1>--}}
                                {{--<p>党组成员、常务副总裁</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">马建平</h1>--}}
                                {{--<p>党组成员、副总裁</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">栾日成</h1>--}}
                                {{--<p>党组成员、副总裁</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="">马王军</h1>--}}
                                {{--<p>党组成员、总会计师</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list">--}}
                                {{--<h1 class="h1-hover">周政</h1>--}}
                                {{--<p>党组成员、副总裁</p>--}}
                                {{--<em class="em-hover"><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="col-md-3 col-sm-3 col-xs-4">--}}
                            {{--<div class="team-list nohover">--}}
                                {{--<h1 class="">袁久强</h1>--}}
                                {{--<p>党组纪检组组长</p>--}}
                                {{--<em class=""><!--这里是箭头哦--></em>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                    </ul>
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
    {{--<script type="text/javascript" src="{{asset('js/jquery.js')}}" ></script>--}}
    <script>
        $(function(){
            var firstTeam = $(".team-box").find("li").eq(0);
            firstTeam.find("h1").addClass("h1-hover");
            firstTeam.find("em").addClass("em-hover");
            $(".team-show").eq(0).show();
            $(".team-box .team-list").eq(-1).addClass("nohover");

            $(".team-box .team-list").on("click", function () {
                if ($(this).text().indexOf("袁久强") < 0) {
                    var index = $(this).parents("li").index();
                    $(".team-box").find("h1").removeClass("h1-hover");
                    $(".team-box").find("em").removeClass("em-hover");
                    $(this).parents("li").find("h1").addClass("h1-hover");
                    $(this).parents("li").find("em").addClass("em-hover");
                    $(".team-show").hide();
                    if ($(".team-show").eq(index).find("img").attr("src") != "/images/defaultpic.gif") {
                        $(".team-show").eq(index).show();
                    }
                    if ($(window).scrollTop() != $(".right_content").offset().top) {
                        if (!$("html,body").is(":animated")) {
                            $("html,body").animate({ scrollTop: $(".right_content").offset().top }, 1000);
                        }
                    }
                }
            })

            $(".show-close").on("click", function () {
                $(this).parents(".team-show").hide();
                $(".team-box").find("h1").removeClass("h1-hover");
                $(".team-box").find("em").removeClass("em-hover");
            })
        })

    </script>
@endsection
