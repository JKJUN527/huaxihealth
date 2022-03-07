<div class="footer">
<div class="wrapper clearfix">
    <div class="footer-links">
        <a href="javascript:;" class="weixin">
            <i class="iconfont icon-wechat"></i>
            <div class="code">
                <img src="{{asset('images/wechatcode.jpg')}}">
                <span>微信公众号</span>
                <em></em>
            </div>
        </a>
        {{--<a href="javascript:;">--}}
            {{--<i class="iconfont" style="font-size:24px;"></i>--}}
            {{--<div class="code">--}}
                {{--<img src="/Public/images/qr-phone.png">--}}
                {{--<span>手机版</span>--}}
                {{--<em></em>--}}
            {{--</div>--}}
        {{--</a>--}}
    </div>
    <div class="footer-left">
        ©2018&nbsp;成都华西精准医学产业技术研究院有限公司&nbsp;&nbsp;ALL RIGHTS RESERVED.<br>
        <a href="mailto:jkjun0527@foxmail.com" target="_blank" class="linking">技术支持：Four2Nine</a>
    </div>
    <div class="footer-right">
        <a href="javascript:;" class="links-btn">友情链接</a><span>|</span>
        {{--<a href="http://www.cnzz.com/stat/website.php?web_id=1271872433" target="_blank">站长统计</a>--}}
        <a href="/contact/form">联系我们</a>
        <br>
        <i class="iconfont icon-adress"></i>
        {{$about->address}}&nbsp;&nbsp;&nbsp;&nbsp;
        <img src="{{asset('images/beian.png')}}"><a href="https://beian.miit.gov.cn/">蜀ICP备18016547号-1</a>
        <br>
        <img src="{{asset('images/beian1.png')}}"> <a href="http://www.beian.gov.cn/">川公网安备 51012202000796号</a>
        <br>
        <i class="iconfont icon-tel-copy"></i>
        联系电话：{{$about->tel}}
    </div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery-1.11.0.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('plugins/layer/layer.js')}}" ></script>
<?php $links = explode(';',$about->link);?>
<script type="text/javascript">
    $('.links-btn').click(function(){
                layer.open({
                    type:1,
                    area: ['600px', '400px'],
                    title: '友情链接',
                    content: '<div class="links-list"><ul>' +
                            @foreach($links as $item)
                                <?php $link = explode('@',$item);?>
                                '<li><a href="{{$link[1]}}"  target="_blank">{{$link[0]}}</a></li>' +
                            @endforeach
                    '</ul>' +
                    '</div>'
                });
        return;
    });
</script>