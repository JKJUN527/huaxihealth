@extends('layout.master')
@section('title', '公司简介|成都华西精准医学产业技术研究院')

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
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/about">关于我们</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;公司简介</span>
            </div>
        </div>
        <div class="c_area">
            <div class="left_list">
                <div class="nav_title">关于我们</div>
                <div class="sidemenu">
                    <ul>
                        <li class="active"><a href="/about">公司简介</a></li>
                        <li><a href="/about/team">团队介绍</a></li>
                        <li><a href="">组织架构</a></li>
                        <li><a href="">大事记</a></li>
                        <li><a href="">发展战略</a></li>
                    </ul>
                </div>
                <div class="contact">
                    <a href="/contact"><img src="{{asset('images/tel.jpg')}}" /></a>
                </div>
            </div>
            <div class="right_content">
                <div class="con_title">公司简介</div>
                <div class="con_box">
                    <p style="text-align: center"><span style="font-size: 22px"><span><strong><span>成都华西精准医学产业技术研究院简介</span></strong></span></span></p>
                    <p>秘书是领导者、主事者身边的综合辅助者和公务服务者，是以辅助决策、综合协调、沟通信息、办文办会办事等为主要职能活动的领导者、决策者的参谋助手。秘书学是以秘书工作为研究对象，研究其主体与客体及其相互关系的一门学科。它研究秘书工作的产生与发展、职能与环境、性质与作用、规律与特征、原则与要求、程序与环节、方法与艺术、机构与人员，以及秘书工作规范化、科学化、现代化的发展趋势等问题，以促进秘书工作适应社会发展的需要。</p>
                    <p>秘书是领导者、主事者身边的综合辅助者和公务服务者，是以辅助决策、综合协调、沟通信息、办文办会办事等为主要职能活动的领导者、决策者的参谋助手。秘书学是以秘书工作为研究对象，研究其主体与客体及其相互关系的一门学科。它研究秘书工作的产生与发展、职能与环境、性质与作用、规律与特征、原则与要求、程序与环节、方法与艺术、机构与人员，以及秘书工作规范化、科学化、现代化的发展趋势等问题，以促进秘书工作适应社会发展的需要。</p>
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