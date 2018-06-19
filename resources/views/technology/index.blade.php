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
                        @foreach($data['teamfirst'] as $item)
                            <a class="teachername" href="/technology/detail?id={{$item->id}}">{{$item->name}}</a>
                        @endforeach
                    </div>
                    <div class="team" style="margin-top: 2rem;">
                        <div class="wrap"><h3>委员<span></span> </h3></div>
                        @foreach($data['teamsecend'] as $item)
                            <a class="teachername" href="/technology/detail?id={{$item->id}}">{{$item->name}}</a>
                        @endforeach
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