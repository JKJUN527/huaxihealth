@extends('layout.admin')
@section('title', 'Add Ads')

@section('custom-style')
    <style>
        .top-border {
            border-top: 1px solid #f5f5f5;
        }

        .operate-btn {
            height: 80px !important;
            margin-bottom: 16px !important;
            cursor: pointer !important;
        }

        .operate-content {
            min-height: 400px;
        }

        .operate-content > p {
            text-align: center;
            margin-top: 24px;
        }

        .preview-holder {
            margin: 16px 0;
        }

        .preview-holder .delete-image {
            cursor: pointer;
            font-size: 18px;
            margin-left: 8px;
            color: #D32F2F;
            border: 2px solid #F44336;
            border-radius: 20px;
        }

        .preview-holder .delete-image:hover {
            background-color: #f5f5f5;
        }

        .image-preview img {
            border: 3px solid #f5f5f5;
        }

        .search-position {
            padding: 16px;
            background-color: #f5f5f5;
        }

        .search-position .form-line {
            width: 350px;
            display: inline-block;
            margin-right: 24px;
        }

        .search-position .form-line input {
            display: inline-block;
            width: 300px;
            background-color: #f5f5f5;
        }

        .big-image--ad,
        .small-image--ad,
        .word--ad {
            padding: 24px;
        }

        .dropdown-menu {
            max-height: 300px !important;
        }

    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'ad', 'subtitle'=>'addAds', 'username' => $data['username']])
@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    新增首页轮播图片
                </h2>
            </div>
            <div class="top-border operate-content">
                <div class="big-image--ad">
                    <form role="form" method="post" id="add-big-image--form">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="file" id="picture-big" name="picture-big" class="form-control"
                                       onchange='showBigPreview(this)'/>
                            </div>
                            <div class="help-info" for="picture-big">.jpg 或 .png格式，200×200 像素</div>
                            <label id="picture-big-error" class="error" for="picture-big"></label>
                        </div>

                        <div id="preview-holder-big" class="preview-holder">
                        </div>

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="title-big" name="title-big" class="form-control"
                                       placeholder="标题,例如车间图">
                            </div>
                            <label id="title-big-error" class="error" for="title-big"></label>
                        </div>

                        <button type="submit"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-blue-sky">
                            发布
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        var bigImageAd = $(".big-image--ad");

        var undefinedType = $(".undefined-type");

        function showBigPreview(element) {
            var isCorrect = true;

            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var bigImagePath = $("input[name='picture-big']").val();
            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(bigImagePath)) {
                isCorrect = false;
                $("#picture-big").val("");
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
                $("#picture-big").val("");
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

                        if (width < 1580 || height < 450) {
                            isCorrect = false;
                            $("#picture-big").val("");
                            swal({
                                title: "错误",
                                type: "error",
                                text: "当前选择图片分辨率为: " + width + "px * " + height + "px \n大图片广告分辨率应为 1580像素 * 450像素",
                                cancelButtonText: "关闭",
                                showCancelButton: true,
                                showConfirmButton: false
                            });
                        } else if (isCorrect) {
                            $("#preview-holder-big").html("<div class='image-preview'>" +
                                "<img src='" + objectUrl + "' width='316' height='90'>" +
                                "<i class='material-icons delete-image' onclick='deleteBigImage(this)'>close</i></div>");
                        }
                    };
                    image.src = data;
                };
                reader.readAsDataURL(file);
            }
        }

        function deleteBigImage(element) {

            var imageHolder = element.parentNode;

            swal({
                title: "确认",
                text: "确认删除图片吗",
                type: "info",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: false
            }, function () {
                swal("图片已删除");
                $("#picture-big").val(null);
                imageHolder.remove();
            });
        }

        $("#add-big-image--form").submit(function (event) {
            event.preventDefault();

            var file = $("#picture-big");
            var title = $("input[name='title-big']");

            if (title.val() === '') {
                setError(title, 'title-big', "不能为空");
                return;
            } else {
                removeError(title, 'title-big');
            }

            var formData = new FormData();

            if (file.prop("files")[0] === undefined) {
                console.log("file is empty");
                setError(file, 'picture-big', "请上传广告图片1580像素 * 450像素");
                return;
            } else {
                removeError(file, 'picture-big');
                formData.append('adpic', file.prop("files")[0]);
            }
            formData.append('title', title.val());

            $.ajax({
                url: "/admin/ads/add",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);
                    checkResult(result.status, "添加成功", result.msg, null);
                     setTimeout(function () {
                         location.href="/admin/ads";
                     }, 500);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            });
        });
    </script>
@show
