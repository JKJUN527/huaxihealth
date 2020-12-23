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
                        @if($title === 'ad')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business_center</i>
                        <span>首页轮播图</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'adList')
                                class="active"
                                @endif
                        >
                            <a href="/admin/ads">轮播图列表</a>
                        </li>
                        <li
                                @if($subtitle === 'addAds')
                                class="active"
                                @endif
                        >
                            <a href="/admin/addAds">新增轮播照片</a>
                        </li>
                    </ul>
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
                        <li
                                @if($subtitle === 'addNotes')
                                class="active"
                                @endif
                        >
                            <a href="/admin/addNotes">发布公告</a>
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
                            <a href="/admin/technology/addAchievements">成果发布</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'industry')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business</i>
                        <span>产业服务</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'industry')
                                class="active"
                                @endif
                        >
                            <a href="/admin/industry">产业动态</a>
                        </li>
                        <li
                                @if($subtitle === 'policy')
                                class="active"
                                @endif
                        >
                            <a href="/admin/industry/policy">政策聚焦</a>
                        </li>
                        <li
                                @if($subtitle === 'hatch')
                                class="active"
                                @endif
                        >
                            <a href="/admin/industry/hatch">孵化培育</a>
                        </li>
                        <li
                                @if($subtitle === 'fund')
                                class="active"
                                @endif
                        >
                            <a href="/admin/industry/fund">投资与基金</a>
                        </li>
                    </ul>
                </li>

                <li
                        @if($title === 'cooperation')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business_center</i>
                        <span>合作交流</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'cooperation')
                                class="active"
                                @endif
                        >
                            <a href="/admin/cooperation">学术研讨</a>
                        </li>
                        <li
                                @if($subtitle === 'out')
                                class="active"
                                @endif
                        >
                            <a href="/admin/cooperation/out">对外合作</a>
                        </li>
                    </ul>
                </li>
                <li
                        @if($title === 'contact')
                        class="active"
                        @endif
                >
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">message</i>
                        <span>联系我们</span>
                    </a>
                    <ul class="ml-menu">
                        <li
                                @if($subtitle === 'contact')
                                class="active"
                                @endif
                        >
                            <a href="/admin/contact">人才招聘</a>
                        </li>
                        <li
                                @if($subtitle === 'form')
                                class="active"
                                @endif
                        >
                            <a href="/admin/contact/form">联系方式</a>
                        </li>
                    </ul>
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
