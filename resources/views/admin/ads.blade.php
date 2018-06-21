@extends('layout.admin')
@section('title', '企业展示列表')

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
        .big-image--btn{
            border: 1px solid antiquewhite;
        }
        .big-image--btn h5{
            text-align: center;
        }
        .big-image--btn img{
            width: 100% !important;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'ad', 'subtitle'=>'adList', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <?php
                    $pics = explode(';', $data['picture']->picture);
                    ?>
                    @if(count($pics) <=0 )
                            <p>暂无图片</p>
                    @else
                        @foreach($pics as $pic)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 operate-btn big-image--btn">
                                <img src="{{$pic}}"/>
                                <input class="delete" type="button" data-content="{{$pic}}" value="删除"/>
                            </div>
                        @endforeach

                    @endif
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript">
        $(".delete").click(function () {
            var element = $(this);
            swal({
                title: "确认",
                text: "确认该展示图吗?",
                type: "warning",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                showCancelButton: true,
                closeOnConfirm: true
            }, function () {
                $.ajax({
                    url: "/admin/ads/del?keyword=" + element.attr('data-content'),
                    type: "get",
                    success: function (data) {
                        checkResult(data['status'], "删除成功", data['msg'], null);

                        setTimeout(function () {
                            location.reload();
                        }, 1200);
                    }
                })
            });
        })
    </script>
@show
