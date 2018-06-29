@extends('layout.admin')
@section('title', '添加委员')

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

        button[type="submit"] {
            margin-top: 16px;
        }

        .news-content--title {
            position: relative;
            height: 50px;
            border-bottom: 1px solid #ebebeb;
            margin: 64px 0 32px 0;
        }

        .news-content--title h6 {
            display: inline-block;
            margin: 0;
            vertical-align: middle;
        }

        #insert-image {
            /*position: absolute;*/
            /*right: 0;*/
            vertical-align: middle;
        }

        .preview {
            margin-top: 16px;
            border: 1px solid #F5F5F5;
            position: relative;
        }

        .preview label {
            margin: 0 24px 0 16px;
        }

        .preview p {
            display: inline-block;
            /*position: absolute;*/
            /*top: 30px;*/
            /*left:116px;*/
            font-size: 12px;
        }

        .preview p span {
            cursor: pointer;
            margin-right: 6px;
            padding: 2px 4px;
        }

        span.insert:hover {
            text-decoration: underline;
        }

        span.delete:hover {
            background-color: #ebebeb;
        }

        span.delete {
            color: #aaaaaa;
            border: 2px solid #ebebeb;
            background-color: #f5f5f5;
        }

        span.insert {
            color: #4CAF50;
        }

        .preview img {
            padding: 5px;
            border: 1px solid #f5f5f5;
            background-color: #f5f5f5;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'technology', 'subtitle'=>'expertAdd', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        新增委员
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a href="/admin/technology">返回委员列表</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="body">
                    <form role="form" method="post" id="add-expert-form">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control" placeholder="姓名">
                            </div>
                            <label id="name-error" class="error" for="name"></label>
                        </div>

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="academic" name="academic" class="form-control"
                                    placeholder="头衔">
                            </div>
                            <label id="academic-error" class="error" for="academic"></label>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="direction" name="direction" class="form-control"
                                       placeholder="研究方向">
                            </div>
                            <label id="direction-error" class="error" for="direction"></label>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="title" name="title" class="form-control"
                                       placeholder="技术职称">
                            </div>
                            <label id="title-error" class="error" for="title"></label>
                        </div>

                        <div class="form-group">
                            {{--如果想要添加动态查找，向select中添加属性：data-live-search="true"--}}
                            <select class="form-control show-tick selectpicker"
                                id="education" name="education">
                                <option value="-1">请选择委员学历</option>
                                <option value="0">学士</option>
                                <option value="1">硕士</option>
                                <option value="2">博士</option>
                                <option value="3">博士后</option>
                                <option value="4">访问学者</option>
                            </select>
                            <label class="education-error" for="education"></label>
                        </div>

                        <div class="form-group">
                            {{--如果想要添加动态查找，向select中添加属性：data-live-search="true"--}}
                            <select class="form-control show-tick selectpicker"
                                    id="type" name="type">
                                <option value="-1">请选择委员所属类别</option>
                                <option value="0">主任委员</option>
                                <option value="1">委员</option>
                            </select>
                            <label class="type-error" for="type"></label>
                        </div>

                        <div class="news-content--title">
                            <h6>个人简介内容</h6>
                        </div>

                        <div class="input-group">
                            <div id="wangeditor">
                            </div>

                            <label id="content-error" class="error" for="content"></label>
                        </div>
                        <div class="input-group">
                            <a id="insert-image" onclick="insertImage(this)"
                               class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-link">
                                添加头像
                            </a>
                        </div>

                        <input hidden type='file' name="pic" value="" onchange='showPreview(this)'/>
                        <div id="preview-holder">
                        </div>

                        <br>

                        <button id="submit-news"
                                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-blue-sky">
                            添加委员
                        </button>
                    </form>
                </div><!-- #END# .body-->
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript" src="{{asset('js/wangEditor/wangEditor.min.js')}}"></script>
    <script type="text/javascript">
//        var index = 1;
        var previewHolder = $("#preview-holder");
        var appendFileInput = true;

        var E = window.wangEditor;
        var editor = new E('#wangeditor');
        editor.customConfig.menus = [
            'head',
            'bold',
            'foreColor',  // 文字颜色
            'quote',  // 引用
            'emoticon',  // 表情
            'code',  // 插入代码
            'table',  // 表格
            'italic',
            'fontSize',  // 字号
            'underline'
        ];
        editor.create();


        function insertImage() {
//            alert(editor.txt.html());

            if (appendFileInput) {
//                previewHolder.append("<input type='file' name='pic' hidden onchange='showPreview(this)'/>");
                appendFileInput = false;
            }

            $("input[name='pic']").click();
        }

        function showPreview(element) {
            var isCorrect = true;

            var file = element.files[0];
            var anyWindow = window.URL || window.webkitURL;
            var objectUrl = anyWindow.createObjectURL(file);
            window.URL.revokeObjectURL(file);

            var picture = $("input[name='pic']");
            var imagePath = picture.val();

            if (!/.(jpg|jpeg|png|JPG|JPEG|PNG)$/.test(imagePath)) {
                isCorrect = false;
                picture.val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片格式错误，支持：.jpg .jpeg .png类型。请选择正确格式的图片后再试！",
                    cancelButtonText: "关闭",
                    showCancelButton: true,
                    showConfirmButton: false
                });
            } else if (file.size > 2 * 1024 * 1024) {
                isCorrect = false;
                picture.val("");
                swal({
                    title: "错误",
                    type: "error",
                    text: "图片文件最大支持：2MB",
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

                        if (width > 1000 || height > 1000) {
                            isCorrect = false;
                            picture.val("");
                            swal({
                                title: "错误",
                                type: "error",
                                text: "当前选择图片分辨率为: " + width + "px * " + height + "px \n图片分辨率应小于 1000像素 * 1000像素",
                                cancelButtonText: "关闭",
                                showCancelButton: true,
                                showConfirmButton: false
                            });
                        } else if (isCorrect) {
                            previewHolder.append("<div class='preview'>" +
                                "<img src='" + objectUrl + "' width='150'>" +
                                "&nbsp;&nbsp;<label>[头像]</label>" +
                                "<span class='delete' onclick='deleteImage(this)'>删除</span></p></div>");

//                            insertImageCode(i);
                            appendFileInput = true;
                        }
                    };
                    image.src = data;
                };
                reader.readAsDataURL(file);
            }
        }

        function deleteImage(element) {
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

//                var content = $("#content");
//                var pictureIndex = $("input[name='picture-index']");

//                content.val(content.val().replace("[图片" + i + "]", ""));
//                editor.txt.html(editor.txt.html().replace("[图片" + i + "]", ""));
                {{--pictureIndex.val(pictureIndex.val().replace("@" + i, ""));--}}


                element.parentNode.parentNode.remove();
                $("input[name='pic']").val("");
            });
        }

        {{--function insertImageCode(i) {--}}
            {{--var content = $("#content");--}}
            {{--var pictureIndex = $("input[name='picture-index']");--}}

            {{--content.val(content.val() + "[图片" + i + "]");--}}
{{--//            editor.txt.html(editor.txt.html() + "[图片" + i + "]");--}}
            {{--pictureIndex.val(pictureIndex.val() + "@" + i);--}}
        {{--}--}}

        /**
         * 添加新闻
         *
         * 传递参数：
         * title
         * content （带格式）
         * pictureIndex 表示传递的图片编号，形式为：1@2@5@7
         *                               表示：传递了4张图片，input name 分别为: pic-1, pic-2, pic-5, pic-7
         * pic-X 图片文件 input type=file name=pic-X
         */
        $("#submit-news").click(function (event) {
            event.preventDefault();

            var name = $("#name");
            var academic = $("#academic");
            var direction = $("#direction");
            var title = $("#title");
            var education = $("#education");
            var type = $("#type");

            var content = $("#content");
            var file = $("input[name='pic']");

            if (name.val() === '') {
                setError(name, 'name', "姓名不能为空");
                return;
            } else {
                removeError(name, 'name');
            }
            if (academic.val() === '') {
                setError(academic, 'academic', "头衔不能为空");
                return;
            } else {
                removeError(academic, 'academic');
            }
            if (direction.val() === '') {
                setError(direction, 'direction', "研究方向不能为空");
                return;
            } else {
                removeError(direction, 'direction');
            }
            if (title.val() === '') {
                setError(title, 'title', "技术职称不能为空");
                return;
            } else {
                removeError(title, 'title');
            }
            if (education.val() == -1) {
                swal("","请选择委员学历","error");
                return;
            }
            if (type.val() == -1) {
                swal("","请选择委员所属类型","error");
                return;
            }

            if(editor.txt.text().length === 0){
                setError(content, 'content', '简介不能为空');
                return;
            }
//            if(file.val() === ""){
//                swal("","必须上传头像","error");
//                return;
//            }

            var formData = new FormData();
            formData.append("name", name.val());
            formData.append("academic", academic.val());
            formData.append("direction", direction.val());
            formData.append("title", title.val());
            formData.append("education", education.val());
            formData.append("type", type.val());

            formData.append("brief", editor.txt.html());
            if(file.val() != "") {
                formData.append("pic", $("input[name='pic']").prop("files")[0]);
            }

            $.ajax({
                url: "/admin/technology/addExpert",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    var result = JSON.parse(data);

                    checkResult(result.status, "添加成功", result.msg, null);

                    if (result.status === 200) {
                        setTimeout(function () {
                            self.location = '/admin/technology';
                        }, 1200);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal(xhr.status + "：" + thrownError);
                }
            })

        })
    </script>
@show
