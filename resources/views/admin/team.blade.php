@extends('layout.admin')
@section('title', '团队列表')

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
        .hot {
            color: #F44336;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'aboutus', 'subtitle'=>'ourteam', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        团队介绍
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addRegionModal1">添加新成员</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>姓名</th>
                            <th>头衔</th>
                            <th>简介</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['team'] as $team)
                            <tr>
                                <td>{{$team->id}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->byname}}</td>
                                <td>{{mb_substr($team->brief,0,30,'utf-8')}}</td>
                                <td>
                                    <i class="material-icons delete" data-content="{{$team->id}}">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">暂无团队</td>
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
                    <h4 class="modal-title" id="defaultModalLabel">添加新成员</h4>
                </div>
                <form role="form" method="post" id="add_region_province_form">
                    <div class="modal-body">

                        <label for="name">姓名</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="请填写姓名">
                            </div>
                            <label id="name-error" class="error" for="name"></label>
                        </div>
                        <label for="name">头衔</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="byname" name="byname" class="form-control"
                                       placeholder="请填写头衔（eg:董事长、教授...）">
                            </div>
                            <label id="byname-error" class="error" for="byname"></label>
                        </div>
                        <label for="name">个人简介</label>
                        <div class="input-group">
                            <div class="form-line">
                                <textarea rows="4" class="form-control no-resize" id="brief" name="brief"
                                          placeholder="请输入个人简介..." required></textarea>
                            </div>
                            <label id="brief-error" class="error" for="brief"></label>
                        </div>
                        <label for="type">所属类别</label>
                        <div class="form-group">
                            {{--如果想要添加动态查找，向select中添加属性：data-live-search="true"--}}
                            <select class="form-control show-tick selectpicker"
                                    id="type" name="type">
                                <option value="-1">请选择成员分类</option>
                                <option value="0">主任委员</option>
                                <option value="1">委员</option>
                            </select>
                            <label id="type-error" class="error" for="type"></label>
                        </div>
                        <label for="picture">头像</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="file" id="picture" name="picture" class="form-control" placeholder="点击上传头像" onchange="showPreview(this)">
                                <img id="preimg" src="{{asset('images/a1.jpg')}}" style="margin-top: 1rem;display: none;">
                                {{--<img src="{{asset('images/icon_close.png')}}">--}}
                            </div>
                            <label id="picture-error" class="error" for="picture"></label>
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
        function showPreview(element) {
            var isCorrect = true;

            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var ImagePath = $("input[name='picture']").val();
            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(ImagePath)) {
                isCorrect = false;
                $("#picture").val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片格式错误，支持：.jpg .jpeg .png类型。请选择正确格式的图片后再试！",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else if (file.size > 5 * 1024 * 1024) {
                isCorrect = false;
                $("#picture").val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片文件最大支持：5MB",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var data = e.target.result;
                    //加载图片获取图片真实宽度和高度
                    var image = new Image();
                    image.onload = function () {
                        var width = image.width;
                        var height = image.height;
                        console.log(width + "//" + height);

                        if (width < 200 || height < 200) {
                            isCorrect = false;
                            $("#picture").val("");
                            swal({
                                title: "错误",
                                type: "error",
                                text: "当前选择图片分辨率为: " + width + "px * " + height + "px \n头像分辨率应大于 200像素 * 200像素",
                                cancelButtonText: "关闭",
                                showCancelButton: true,
                                showConfirmButton: false
                            });
                        } else if (isCorrect) {
                            $("#preimg").attr('src',objectUrl);
                            $("#preimg").show();
                        }
                    };
                    image.src = data;
                };
                reader.readAsDataURL(file);
            }
        }
        $("#add_region_province_form").submit(function (event) {
            event.preventDefault();

            var name = $("#name");
            var byname = $("#byname");
            var brief = $("#brief");
            var type = $("select[name='type']");
            var file = $("#picture");

            var Content = brief.val().replace(/\r\n/g, '<br>');
            Content = Content.replace(/\n/g, '<br>');
            Content = Content.replace(/\s/g, '&nbsp;');

            if (name.val() == 0) {
                setError(name, 'name', '姓名不能为空');
                return;
            } else {
                removeError(name, 'name');
            }
            if (byname.val() === '') {
                setError(byname, 'byname', '头衔不能为空');
                return;
            } else {
                removeError(byname, 'byname');
            }
            if (Content === '') {
                setError(brief, 'brief', '个人简介不能为空');
                return;
            } else {
                removeError(brief, 'brief');
            }
            if (type.val() === "-1") {
                setError(type, 'type', '请选择类别');
                return;
            } else {
                removeError(type, 'type');
            }
            if (file.prop("files")[0] === undefined) {
                console.log("file is empty");
                setError(file, 'picture', "请上传头像，像素大于200*200");
                return;
            } else {
                removeError(file, 'picture');
            }

            var formData = new FormData();
            formData.append("name", name.val());
            formData.append("byname", byname.val());
            formData.append("brief", Content);
            formData.append("type", type.val());
            formData.append('picture', file.prop("files")[0]);

            $.ajax({
                url: "/admin/about/team/add",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#addRegionModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "添加成功", result.msg, null);

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
                text: "确定删除该成员吗？",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/about/team/delete?id=" + element.attr("data-content"),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], '操作成功', data['msg'], null);
                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                })
            });
        });

    </script>
@show
