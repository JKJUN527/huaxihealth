@extends('layout.admin')
@section('title', '留言板')

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
            margin-right: 12px;
        }

        .hot {
            color: #F44336;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'position', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        留言信息
                    </h2>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>姓名</th>
                            <th>邮箱</th>
                            <th>留言</th>
                            <th>时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['message'] as $message)
                            <tr>
                                <td>{{$message->id}}</td>
                                <td>{{$message->name or '无'}}</td>
                                <td>{{$message->email or '无'}}</td>
                                <td>{{mb_substr($message->content, 0, 20)}}</td>
                                <td>{{$message->created_at}}</td>
                                <td>
                                    <i class="material-icons detail" data-content="{{$message->id}}"
                                       data-toggle='modal' data-target='#detailNewsModal'>visibility</i>
                                    <i class="material-icons delete" data-content="{{$message->id}}"
                                       style="margin-left: 16px;">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">暂无留言</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <nav>
                {!! $data['message']->render() !!}
            </nav>
        </div>
    </div>

    <div class="modal fade" id="detailNewsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">留言详情</h4>
                </div>
                <div class="modal-body">
                    <span class="news-time"></span>
                    <br>
                    <div class="news-content"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $(".detail").click(function () {
            var element = $(this);
            var nid = element.attr("data-content");

            $.ajax({
                url: "/admin/message/detail?id=" + nid,
                type: "get",
                success: function (data) {
                    var news = data['message'];

                    $(".news-time").html(news['created_at']);

                    var content = news['content'];

                    $(".news-content").html(content);
                }
            });
        });


        $(".delete").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认该留言吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/message/del?id=" + element.attr('data-content'),
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
