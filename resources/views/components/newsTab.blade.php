<div class="left_list">
    <div class="nav_title">新闻中心</div>
    <div class="sidemenu">
        <ul>
            <li @if($index == 1) class="active" @endif><a href="/news">公司要闻</a></li>
            <li @if($index == 2) class="active" @endif><a href="/news/notes">公示公告</a></li>
        </ul>
    </div>
    <div class="contact">
        <a href="/contact/form"><img src="{{asset('images/tel.png')}}" /></a>
    </div>
</div>