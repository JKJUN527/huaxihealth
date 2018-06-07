<div class="left_list">
    <div class="nav_title">联系我们</div>
    <div class="sidemenu">
        <ul>
            <li @if($index == 1) class="active" @endif><a href="/contact">人才招聘</a></li>
            <li @if($index == 2) class="active" @endif><a href="/contact/form">联系方式</a></li>
        </ul>
    </div>
    <div class="contact">
        <a href="/contact/form"><img src="{{asset('images/tel.jpg')}}" /></a>
    </div>
</div>