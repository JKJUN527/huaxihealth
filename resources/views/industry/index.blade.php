@extends('layout.master')
@section('title', '产业服务|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="{{asset('css/news.css')}}" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/industry">产业服务</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;产业动态</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.industryTab',['index'=>1])
            <div class="right_content">
                <div class="con_title">产业动态</div>
                <div class="con_box">
                    @forelse($data['data'] as $new)
                        <div class="ny_tdbk">
                            <div class="ny_dtimbk">
                                <div class="ny_dtim">
                                    <a href="/industry/detail?nid={{$new->id}}">
                                        @if($new->picture != null)
                                            <?php
                                            $pics = explode(';', $new->picture);
                                            $baseurl = explode('@', $pics[0])[0];
                                            $baseurl = substr($baseurl, 0, strlen($baseurl) - 1);
                                            $imagepath = explode('@', $pics[0])[1];
                                            ?>
                                            <img src="{{$baseurl}}{{$imagepath}}" width="140" height="95"/>
                                        @else
                                            <img src="{{asset('/images/testnews.jpg')}}" width="140" height="95"/>
                                        @endif
                                    </a>
                                </div>
                                <div class="ny_dtimrt">
                                    <div class="ny_dtimtt">
                                        <a href="/industry/detail?nid={{$new->id}}">
                                            {{$new->title}}
                                        </a>
                                        <span style="float:right">{{substr($new->created_at,0,10)}}</span>
                                    </div>
                                    <div class="ny_dtimjj">
                                        {{--{{mb_substr(strip_tags($new->content),0,120,'utf-8')}}--}}
                                        <a href="/industry/detail?nid={{$new->id}}">[详情]</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="ny_tdbk">
                            暂无产业动态发布
                        </div>
                @endforelse

                <!--分页-->
                    <nav>
                        {!! $data['data']->render() !!}
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