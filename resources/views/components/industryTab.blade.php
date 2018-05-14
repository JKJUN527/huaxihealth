<div class="left_list">
    <div class="nav_title">产业服务</div>
    <div class="sidemenu">
        <ul>
            <li @if($index == 1) class="active" @endif><a href="/industry">产业动态</a></li>
            <li @if($index == 2) class="active" @endif><a href="/industry/policy">政策聚焦</a></li>
            <li @if($index == 3) class="active" @endif><a href="/industry/hatch">孵化培育</a></li>
            <li @if($index == 3) class="active" @endif><a href="/industry/fund">投资与基金</a></li>
        </ul>
    </div>
    <div class="contact">
        <a href="/contact"><img src="{{asset('images/tel.jpg')}}" /></a>
    </div>
</div>