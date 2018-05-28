@extends('layout.admin')
@section('title', '组织架构')

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
        #structurePic{
            max-width: 100%;
        }
        #preimg{
            width: 300px;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'aboutus', 'subtitle'=>'structure', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        组织架构
                    </h2>
                    <div class="mdl-card__menu">
                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a data-toggle="modal" data-target="#addRegionModal1">更换组织架构图</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <img id="structurePic" src="{{$data['webinfo']->structure or asset('/images/structure.png')}}" />
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
                    <h4 class="modal-title" id="defaultModalLabel">更换组织架构图</h4>
                </div>
                <form role="form" method="post" id="add_region_province_form">
                    <div class="modal-body">
                        <label for="picture">上传组织架构图</label>
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
                        <button type="submit" class="btn btn-primary waves-effect">确定</button>
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

            var file = $("#picture");

            if (file.prop("files")[0] === undefined) {
                console.log("file is empty");
                setError(file, 'picture', "请上传头像，像素大于200*200");
                return;
            } else {
                removeError(file, 'picture');
            }

            var formData = new FormData();
            formData.append('picture', file.prop("files")[0]);

            $.ajax({
                url: "/admin/about/structure/add",
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

    </script>
@show
