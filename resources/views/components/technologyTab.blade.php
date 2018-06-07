<div class="left_list">
    <div class="nav_title">科技研发</div>
    <div class="sidemenu">
        <ul>
            <li @if($index == 1) class="active" @endif><a href="/technology">专家委员会</a></li>
            <li @if($index == 2) class="active" @endif><a href="/technology/team">科研团队</a></li>
            <li @if($index == 3) class="active" @endif><a href="/technology/achievements">成果发布</a></li>
        </ul>
    </div>
    <div class="contact">
        <a href="/contact/form"><img src="{{asset('images/tel.jpg')}}" /></a>
    </div>
</div>