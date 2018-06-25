<div class="left_list">
    <div class="nav_title">关于我们</div>
    <div class="sidemenu">
        <ul>
            <li @if($index == 1) class="active" @endif><a href="/about">公司简介</a></li>
            <li @if($index == 2) class="active" @endif><a href="/about/team">团队介绍</a></li>
            <li @if($index == 3) class="active" @endif><a href="/about/structure">组织架构</a></li>
            <li @if($index == 4) class="active" @endif><a href="/about/datebook">大事记</a></li>
            <li @if($index == 5) class="active" @endif><a href="/about/datebook/development">发展战略</a></li>
        </ul>
    </div>
    <div class="contact">
        <a href="/contact/form"><img src="{{asset('images/tel.png')}}" /></a>
    </div>
</div>