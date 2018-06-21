<div class="footer_wrap">
    <div class="line"></div>
    <div class="footer">
        <div class="f_left">
            <img src="{{asset('images/logo.png')}}" class="f_logo" />
            <div class="contact">
                <p><a href="/contact/form">联系我们</a><a href="javascrip:void(0);">站长统计</a></p>
                <p>联系电话：{{$about->tel}}&nbsp;&nbsp;&nbsp;&nbsp;所在地址：{{$about->address}}</p>
                <p>版权所有：  成都华西精准医学产业技术研究院有限公司&nbsp;&nbsp;&nbsp;&nbsp;备案号:蜀ICP备18016547号</p>
            </div>
        </div>
        <?php $links = explode(';',$about->link);?>
        <div class="f_right">
            <p><a href="http://www.cd120.com/" style="text-decoration: underline;">华西官网入口</a></p>
            <p><a href=""></a></p>
            <div class="bdsharebuttonbox pku_share2 bdshare-button-style0-32">
                <a style="padding-right:18px;background:url({{asset("images/share01.png")}}) no-repeat;" href="{{$links[0]}}" target="_blank" title="微博主页"></a>
                {{--<a style="padding-right:18px;background:url({{asset("images/share02.png")}}) no-repeat;" href="" id="wechat"></a>--}}
                <a class="bds_isohu" style="padding-right:18px;background:url({{asset("images/share08.png")}}) no-repeat;" data-cmd="isohu" href="{{$links[1]}}" title="搜狐主页"></a>
                {{--<a class="bds_sqq" data-cmd="sqq" style="background:url({{asset("images/share03.png")}}) no-repeat;" href="" title="分享到QQ好友"></a>--}}
                <a class="bds_tqq" style="padding-right:18px;background:url({{asset("images/share04.png")}}) no-repeat;" data-cmd="tqq" href="{{$links[2]}}" title="腾讯微博主页"></a>
                <a class="bds_douban" style="padding-right:18px;background:url({{asset("images/share05.png")}}) no-repeat;" data-cmd="douban" href="{{$links[3]}}" title="豆瓣主页"></a>
                {{--<a class="bds_renren" style="padding-right:18px;background:url({{asset("images/share06.png")}}) no-repeat;" data-cmd="renren" href="" title="分享到人人网"></a>--}}
                {{--<a class="bds_tqf" data-cmd="tqf" style="background:url({{asset("images/share07.png")}}) no-repeat;" href="" title="分享到腾讯朋友"></a>--}}
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>