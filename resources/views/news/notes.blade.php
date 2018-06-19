@extends('layout.master')
@section('title', '公示公告|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    {{--<link href="css/news.css" rel='stylesheet' type='text/css' />--}}
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/news">新闻中心</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;公示公告</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.newsTab',['index'=>2])
            <div class="right_content">
                <div class="con_title">公示公告</div>
                <div class="con_box">
                    <ul class="items-list">
                        @forelse($data['notes'] as $note)
                            <li><a href="/news/notes/detail?nid={{$note->id}}">{{$note->title}}</a><span class="date">{{substr($note->created_at,0,10)}}</span></li>
                        @empty
                            <li>暂无公告发布</li>
                        @endforelse
                    </ul>
                    <!--分页-->
                    <nav>
                        {!! $data['notes']->render() !!}
                    </nav>
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