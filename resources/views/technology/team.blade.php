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
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/technology">科技研发</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;科研团队</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.technologyTab',['index'=>2])
            <div class="right_content">
                <div class="con_title">科研团队</div>
                <div class="con_box">
                    <ul class="items-list">
                        @forelse($data['team'] as $item)
                            <li><a href="/technology/team/detail?id={{$item->id}}">
                                    {{mb_substr($item->title,0,50,'utf-8')}}
                                </a><span class="date">{{substr($item->created_at,0,10)}}</span></li>
                        @empty
                            <li>暂无团队发布</li>
                        @endforelse
                    </ul>
                    <nav>
                        {!! $data['team']->render() !!}
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