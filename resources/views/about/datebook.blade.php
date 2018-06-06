@extends('layout.master')
@section('title', '大事迹|成都华西精准医学产业技术研究院')

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
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/about">关于我们</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;大事迹</span>
            </div>
        </div>
        <div class="c_area">
@include('components.aboutTab',['index'=>4])
            <div class="right_content">
                <div class="con_title">大事迹</div>
                <div class="con_box">
                    <p style="text-align: center"><span style="font-size: 22px"><span><strong><span>成都华西精准医学产业技术研究院大事迹</span></strong></span></span></p>
                    <ul class="img-list">
                        @forelse($data['datebook'] as $datebook)
                        <li>
                            <a href="/about/datebook/detail?id={{$datebook->id}}">
                                @if($datebook->picture != null)
                                    <?php
                                    $pics = explode(';', $datebook->picture);
                                    $baseurl = explode('@', $pics[0])[0];
                                    $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                    $imagepath = explode('@', $pics[0])[1];
                                    ?>
                                    <img src="{{$baseurl}}{{$imagepath}}"/>
                                @else
                                    <img src="{{asset('images/n6.jpg')}}"/>
                                @endif
                                <b>{{$datebook->title}}</b>
                            </a>
                        </li>
                        @empty
                            <li>暂无大事迹</li>
                        @endforelse
                    </ul>
                </div>
                <nav>
                    {!! $data['datebook']->render() !!}
                </nav>
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