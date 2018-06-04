<!-- Side Bar-->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li
                        @if($title === 'dashboard')
                        class="active"
                        @endif
                >
                    <a href="/admin/dashboard">
                        <i class="material-icons">home</i>
                        <span>网站信息</span>
                    </a>
                </li>

                <li
                        @if($title === 'admin')
                        class="active"
                        @endif
                >
                    <a href="/admin/admin">
                        <i class="material-icons">verified_user</i>
                        <span>管理员</span>
                    </a>
                </li>
                <li
                        @if($title === 'aboutus')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">subject</i>
                        <span>关于我们</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'ourteam')
                                class="active"
                                @endif
                        >
                            <a href="/admin/about/team">团队介绍</a>
                        </li>
                        <li
                                @if($subtitle === 'structure')
                                class="active"
                                @endif
                        >
                            <a href="/admin/about/structure">组织架构</a>
                        </li>
                        <li
                                @if($subtitle === 'datebook')
                                class="active"
                                @endif
                        >
                            <a href="/admin/about/datebook">大事记</a>
                        </li>
                        <li
                                @if($subtitle === 'development ')
                                class="active"
                                @endif
                        >
                            <a href="/admin/about/development ">发展战略</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'news')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">message</i>
                        <span>新闻中心</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'newsList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/news">公司要闻</a>
                        </li>
                        <li
                                @if($subtitle === 'notesList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/notes">公示公告</a>
                        </li>
                        <li
                                @if($subtitle === 'addNews')
                                class="active"
                                @endif
                        >
                            <a href="/admin/addNews">发布新闻</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'technology')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">work</i>
                        <span>科技研发</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'expertList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology">专家委员会</a>
                        </li>
                        <li
                                @if($subtitle === 'expertAdd')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology/addExpert">新增委员</a>
                        </li>
                        <li
                                @if($subtitle === 'teamList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology/team">科研团队</a>
                        </li>
                        <li
                                @if($subtitle === 'teamAdd')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology/addTeam">发布科研团队</a>
                        </li>
                        <li
                                @if($subtitle === 'achievementsList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology/achievements">科研成果</a>
                        </li>
                        <li
                                @if($subtitle === 'achievementsAdd')
                                class="active"
                                @endif
                        >
                            <a href="/admin/technology/achievementsAdd">成果发布</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'products')
                        class="active"
                        @endif
                >
                    <a href="/admin/products">
                        <i class="material-icons">business</i>
                        <span>产品列表</span>
                    </a>
                </li>

                <li
                        @if($title === 'ad')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business_center</i>
                        <span>企业展示照片</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'adList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/ads">展示照片列表</a>
                        </li>
                        <li
                                @if($subtitle === 'addAds')
                                class="active"
                                @endif
                        >
                            <a href="/admin/addAds">新增展示照片</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'message')
                        class="active"
                        @endif
                >
                    <a href="/admin/message">
                        <i class="material-icons">message</i>
                        <span>留言板</span>
                    </a>
                </li>

                <li class="header"></li>

                <li>
                    <a>
                        <i class="material-icons">person</i>
                        <span>欢迎 {{$username or 'xxx admin'}}</span>
                    </a>
                </li>

                <li>
                    <a id="cu-logout" href="/admin/logout">
                        <i class="material-icons">exit_to_app</i>
                        <span>退出</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);">&copy; 2017-2018|four2nine - dashboard</a>
                </li>
            </ul>
        </div>

    </aside>
    <!-- #END# Left Sidebar -->
</section>
<!-- #END# Side Bar-->
