@extends('layout.admin')
@section('title', '发展战略')

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
    @include('components.adminAside', ['title' => 'aboutus', 'subtitle'=>'development', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        发展战略
                    </h2>
                    <div class="mdl-card__menu">

                        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons">more_vert</i>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            for="demo-menu-lower-right">
                            <li class="mdl-menu__item">
                                <a href="/admin/about/addStrategy">重新编辑发展战略</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="body table-responsive">
                    <div class="modal-body">
                        <div class="news-content">
                            {!! $data['webinfo']->strategy_content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="detailNewsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel"></h4>
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
            var id = element.attr("data-content");

            $.ajax({
                url: "/admin/about/datebook/detail?id=" + id,
                type: "get",
                success: function (data) {
                    var datebook = data['datebook'];

                    $("#defaultModalLabel").html(datebook['title']);
                    $(".news-time").html(datebook['created_at']);

                    var content = datebook['content'];
                    var images = datebook['picture'];
                    if(images != null){
                        var imageTemp = images.split(";");
                        var imagesArray = [];

                        for (var i in imageTemp) {
                            imagesArray[i + ''] = imageTemp[i + ''].split("@");
                        }

                        var baseUrl = imagesArray[0][0].substring(0, imagesArray[0][0].length - 1);
                        imagesArray[0][0] = imagesArray[0][0].replace(baseUrl, '');

                        console.log(imagesArray);
                        console.log(baseUrl);
                        console.log();

                        for (var j = 0; j < imagesArray.length; j++) {
                            content = content.replace("[图片" + imagesArray[j][0] + "]", "<img src='" + baseUrl + imagesArray[j][1] + "' width='100%'/>");
                        }
                    }
                    $(".news-content").html(content);
                }
            });
        });


        $(".delete").click(function () {
            var element = $(this);

            swal({
                title: "确认",
                text: "确认该大事迹吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/about/datebook/del?id=" + element.attr('data-content'),
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
