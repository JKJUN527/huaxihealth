@extends('layout.admin')
@section('title', '公示公告')

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
    @include('components.adminAside', ['title' => 'news', 'subtitle'=>'notesList', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        公示公告列表
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addRegionModal1">新增公告</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['notes'] as $note)
                            <tr>
                                <td>{{$note->id}}</td>
                                <td>
                                    {{$note->title}}
                                </td>
                                <td>{{$note->created_at}}</td>
                                <td>
                                    <i class="material-icons delete" data-content="{{$note->id}}">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">暂无公告</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="addRegionModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">添加公告</h4>
                </div>
                <form role="form" method="post" id="add_notes_form">
                    <div class="modal-body">

                        <label for="title">公告内容</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="title" name="title" class="form-control" placeholder="公告标题">
                            </div>
                            <label id="title-error" class="error" for="title"></label>
                        </div>

                        <label for="content">公告内容</label>
                        <div class="input-group">
                            <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" id="content" name="content" placeholder="在这里输入公告内容..." required></textarea>
                            </div>
                            <label id="content-error" class="error" for="content"></label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">添加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $("#add_notes_form").submit(function (event) {
            event.preventDefault();

            var title = $("#title");
            var content = $("#content");

            if (title.val() === '') {
                setError(title, 'title', '不能为空');
                return;
            } else {
                removeError(title, 'title');
            }
            var testContent = content.val().replace(/\r\n/g, '');
            testContent = testContent.replace(/\n/g, '');
            testContent = testContent.replace(/\s/g, '');

            if (testContent === '') {
                setError(content, 'content', '不能为空');
                return;
            } else {
                removeError(content, 'content');
            }
            // 将content中的换行 "\r\n" 或者 "\n" 换成 <br>
            // '\s'空格替换成"&nbsp;"
            // 这样可以保持新闻内容的编辑格式
            var newsContent = content.val().replace(/\r\n/g, '<br>');
            newsContent = newsContent.replace(/\n/g, '<br>');
            newsContent = newsContent.replace(/\s/g, '&nbsp;');

            var formData = new FormData();
            formData.append("title", title.val());
            formData.append("content", newsContent);

            $.ajax({
                url: "/admin/notes/add",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#addRegionModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "操作成功", result.msg, null);

                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $(".delete").click(function () {
            var element = $(this);

            swal({
                type: "warning",
                title: "确认",
                text: "确定删除该公告吗?",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/notes/del?id=" + element.attr("data-content"),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], data['msg'], data['msg'], null);
                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                })
            });
        })
    </script>
@show
