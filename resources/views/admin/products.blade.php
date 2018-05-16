@extends('layout.admin')
@section('title', '产品列表')

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
    @include('components.adminAside', ['title' => 'products', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        产品列表
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addRegionModal1">添加新产品</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped" id="cu-admin-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>类型</th>
                            <th>中文名</th>
                            <th>英文名</th>
                            <th>型号</th>
                            <th>包装</th>
                            <th>cas编号</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['products'] as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->typename}}</td>
                                <td>{{$product->ch_name}}</td>
                                <td>{{$product->en_name}}</td>
                                <td>{{$product->model}}</td>
                                <td>{{$product->package}}</td>
                                <td>{{$product->cas_code}}</td>
                                <td>
                                    <i class="material-icons delete" data-content="{{$product->id}}">delete</i>
                                    <i class="material-icons set-hot @if($product->is_urgency == 1) hot @endif"
                                       data-content="{{$product->id}}">whatshot</i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">暂无产品</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav>
                        {!! $data['products']->render() !!}
                    </nav>
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
                    <h4 class="modal-title" id="defaultModalLabel">添加产品</h4>
                </div>
                <form role="form" method="post" id="add_region_province_form">
                    <div class="modal-body">

                        <label for="name">中文品名</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="ch_name" name="ch_name" class="form-control"
                                       placeholder="中文名称">
                            </div>
                            <label id="ch_name-error" class="error" for="ch_name"></label>
                        </div>
                        <label for="name">英文品名</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="en_name" name="en_name" class="form-control"
                                       placeholder="英文名称">
                            </div>
                            <label id="en_name-error" class="error" for="en_name"></label>
                        </div>
                        <label for="name">规格</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="model" name="model" class="form-control"
                                       placeholder="规格">
                            </div>
                            <label id="model-error" class="error" for="model"></label>
                        </div>
                        <label for="name">包装</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="package_mode" name="package_mode" class="form-control"
                                       placeholder="包装">
                            </div>
                            <label id="package_mode-error" class="error" for="package_mode"></label>
                        </div>
                        <label for="name">CAS编码</label>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="cas" name="cas" class="form-control"
                                       placeholder="cas编码">
                            </div>
                            <label id="cas-error" class="error" for="cas"></label>
                        </div>

                        <label for="parent-place">产品类别</label>
                        <div class="form-group">
                            {{--如果想要添加动态查找，向select中添加属性：data-live-search="true"--}}
                            <select class="form-control show-tick selectpicker" data-live-search="true"
                                    id="parent-place" name="parent-place" data-live-search="true">
                                <option value="0">请选择产品分类</option>
                                @forelse($data['region'] as $region)
                                    <option value="{{$region->id}}">{{$region->ch_name}}</option>
                                @endforeach
                            </select>
                            <label id="name-error" class="error" for="parent-place"></label>
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
            var model = $("#model");
            var package_mode = $("#package_mode");
            var cas = $("#cas");
            var parent_id = $("select[name='parent-place']");

            if (parent_id.val() == 0) {
                setError(parent_id, 'parent-place', '不能为空');
                return;
            } else {
                removeError(parent_id, 'parent-place');
            }
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
//            if (model.val() === '') {
//                setError(model, 'model', '不能为空');
//                return;
//            } else {
//                removeError(model, 'model');
//            }
//            if (package1.val() === '') {
//                setError(package1, 'package1', '不能为空');
//                return;
//            } else {
//                removeError(package1, 'package1');
//            }
//            if (cas.val() === '') {
//                setError(cas, 'cas', '不能为空');
//                return;
//            } else {
//                removeError(cas, 'cas');
//            }

            var formData = new FormData();
            formData.append("ch_name", ch_name.val());
            formData.append("en_name", en_name.val());
            formData.append("model", model.val());
            formData.append("package", package_mode.val());
            formData.append("cas", cas.val());
            formData.append("type", parent_id.val());

            $.ajax({
                url: "/admin/products/add",
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
                text: "确定删除该产品吗？",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/products/delete?rid=" + element.attr("data-content"),
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
        $(".set-hot").click(function () {
            var element = $(this);
            var setUrgency = element.hasClass("hot") ? 0 : 1;
            var text = "";
            if(setUrgency == 0)
                text = "确定取消该优势产品吗?";
            else
                text= "确定设置该产品为优势产品吗?";

            swal({
                type: "warning",
                title: "确认",
                text: text,
                confirmButtonText: "确定",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/products/urgency?rid=" + element.attr("data-content")+ "&urgency=" + setUrgency,
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], '操作成功', data['msg'], null);
                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                })
            });

        })
    </script>
@show
