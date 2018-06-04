@extends('layout.admin')
@section('title', '专家委员会')

@section('custom-style')
    <style>
        ul.mdl-menu,
        li.mdl-menu__item {
            padding: 0;
        }

        li.mdl-menu__item a {
            cursor: pointer;
            display: block;
            padding: 0 16px;
        }

        i.material-icons {
            cursor: pointer;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'technology', 'subtitle'=>'expertList', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        委员列表
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a href="/admin/technology/addExpertList">添加委员</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>类别</th>
                            <th>姓名</th>
                            <th>头衔</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['expert'] as $expert)
                            <tr>
                                <td>{{$expert->id}}</td>
                                <td>
                                    @if($expert->type == 0)
                                        主任委员
                                    @else
                                        委员
                                    @endif
                                </td>
                                <td>{{$expert->name}}</td>
                                <td>{{$expert->academic_title}}</td>
                                <td>
                                    <i class="material-icons delete" data-content="{{$expert->id}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">暂无委员</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav>
                        {!! $data['expert']->render() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
@endsection

@section('custom-script')
    <script type="text/javascript">

        $(".delete").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认该委员吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/technology/del?id=" + element.attr('data-content'),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], "删除成功", data['msg'], null);

                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                });
            });
        })
    </script>
@show
