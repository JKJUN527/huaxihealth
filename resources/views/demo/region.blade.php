@extends('layout.admin')
@section('title', '产品分类')

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
    @include('components.adminAside', ['title' => 'region', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        产品类别列表
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addRegionModal1">添加产品分类</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>中文名</th>
                            <th>英文名</th>
                            <th>描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['region'] as $region)
                            <tr>
                                <td>{{$region->id}}</td>
                                <td>
                                    {{$region->ch_name}}
                                </td>
                                <td>{{$region->en_name}}</td>
                                <td>{{$region->describe}}</td>
                                <td>
                                    <i class="material-icons delete" data-content="{{$region->id}}">delete</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">暂无产品分类</td>
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
                    <h4 class="modal-title" id="defaultModalLabel">添加产品分类</h4>
                </div>
                <form role="form" method="post" id="add_region_province_form">
                    <div class="modal-body">

                        <label for="name">中文名称</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="ch_name" name="ch_name" class="form-control"
                                       placeholder="中文名称">
                            </div>
                            <label id="ch_name-error" class="error" for="ch_name"></label>
                        </div>
                        <label for="name">英文名称</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="en_name" name="en_name" class="form-control"
                                       placeholder="英文名称">
                            </div>
                            <label id="en_name-error" class="error" for="en_name"></label>
                        </div>
                        <label for="name">分类描述</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="describe" name="describe" class="form-control"
                                       placeholder="添加描述（选填）">
                            </div>
                            <label id="describe-error" class="error" for="describe"></label>
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
        $("#add_region_province_form").submit(function (event) {
            event.preventDefault();

            var ch_name = $("#ch_name");
            var en_name = $("#en_name");
            var describe = $("#describe");

            if (ch_name.val() === '') {
                setError(ch_name, 'ch_name', '不能为空');
                return;
            } else {
                removeError(ch_name, 'ch_name');
            }
            if (en_name.val() === '') {
                setError(en_name, 'en_name', '不能为空');
                return;
            } else {
                removeError(en_name, 'en_name');
            }

            var formData = new FormData();
            formData.append("ch_name", ch_name.val());
            formData.append("en_name", en_name.val());
            formData.append("describe", describe.val());

            $.ajax({
                url: "/admin/region/add",
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
                text: "确定删除该地区吗?将删除该分类下的所有产品，不可逆。",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/region/delete?rid=" + element.attr("data-content"),
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
