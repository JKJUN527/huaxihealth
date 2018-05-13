@extends('layout.master')
@section('title', '新闻中心|成都华西精准医学产业技术研究院')

@section('header-nav')
    @include('components.headerNav')
@endsection

@section('header-tab')
    @include('components.headerTab',['title'=>"index"])
@endsection
@section('custom-style')
    <link href="css/news.css" rel='stylesheet' type='text/css' />
@endsection
@section('content')
    <!--content-->
    <div class="i_content">
        <div class="adr_wrap">
            <div class="adr">
                <span class="adr_link"><a href="/">首   页</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<a href="/news">新闻中心</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;公司要闻</span>
            </div>
        </div>
        <div class="c_area">
            @include('components.newsTab',['index'=>1])
            <div class="right_content">
                <div class="con_title">公司要闻</div>
                <div class="con_box">
                    <div class="ny_tdbk">
                        <div class="ny_dtimbk">
                            <div class="ny_dtim"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">
                                    <img src="/images/testnews.jpg" width="140" height="95">
                                </a>
                            </div>
                            <div class="ny_dtimrt">
                                <div class="ny_dtimtt"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">【重磅新闻】大咖云集，共话全球能源转型——2017中美绿色能源高峰论坛盛大...</a><span style="float:right">2017.09.13 </span></div>
                                <div class="ny_dtimjj"> 2017年9 月 11 日至12日，2017中美绿色能源高峰论坛在蓉盛大举行。300多名来自中美两国电力行业、可再生能源行业、信息技术行业和互联网行业的领军人物和行业人士出席论坛。 ...<a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">[详情]</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ny_tdbk">
                        <div class="ny_dtimbk">
                            <div class="ny_dtim"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">
                                    <img src="/images/testnews.jpg" width="140" height="95">
                                </a>
                            </div>
                            <div class="ny_dtimrt">
                                <div class="ny_dtimtt"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">【重磅新闻】大咖云集，共话全球能源转型——2017中美绿色能源高峰论坛盛大...</a><span style="float:right">2017.09.13 </span></div>
                                <div class="ny_dtimjj"> 2017年9 月 11 日至12日，2017中美绿色能源高峰论坛在蓉盛大举行。300多名来自中美两国电力行业、可再生能源行业、信息技术行业和互联网行业的领军人物和行业人士出席论坛。 ...<a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">[详情]</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ny_tdbk">
                        <div class="ny_dtimbk">
                            <div class="ny_dtim"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">
                                    <img src="/images/testnews.jpg" width="140" height="95">
                                </a>
                            </div>
                            <div class="ny_dtimrt">
                                <div class="ny_dtimtt"><a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">【重磅新闻】大咖云集，共话全球能源转型——2017中美绿色能源高峰论坛盛大...</a><span style="float:right">2017.09.13 </span></div>
                                <div class="ny_dtimjj"> 2017年9 月 11 日至12日，2017中美绿色能源高峰论坛在蓉盛大举行。300多名来自中美两国电力行业、可再生能源行业、信息技术行业和互联网行业的领军人物和行业人士出席论坛。 ...<a href="/publish/eiri/1325/2017/20170913170657401892991/20170913170657401892991_.html">[详情]</a></div>
                            </div>
                        </div>
                    </div>

                    <!--分页-->
                    <div class="record">
                        <span class="prev"><a href="">上一页</a></span>
                        <span class="word"><a href="">1</a></span>
                        <span class="word"><a href="">2</a></span>
                        <span class="word"><a href="">3</a></span>
                        <span class="word"><a href="">4</a></span>
                        <span class="word"><a href="">5</a></span>
                        <span class="word"><a href="">6</a></span>
                        <span class="next"><a href="">下一页</a></span>
                        <span class="sum">共6页</span>
                    </div>
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