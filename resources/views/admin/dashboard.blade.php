@extends('layout.admin')
@section('title', '网站信息')

@section('custom-style')
    <style>
        .btn:hover,
        .btn:focus {
            color: #ffffff;
        }
    </style>
@endsection

@section('sidebar')
    @include('components.adminAside', ['title' => 'dashboard', 'subtitle'=>'', 'username' => $data['username']])
@endsection

@section('content')
    <div class="row clearfix">

        <div class="address-panel">
            <div class="container">

                <dl>
                    <dt><span>电话</span></dt>
                    <dd><span>{{$data['webinfo']->tel or '联系电话未填写'}}</span></dd>
                </dl>

                <dl>
                    <dt><span>邮箱</span></dt>
                    <dd><span>{{$data['webinfo']->email or '邮箱未填写'}}</span>
                    </dd>
                </dl>
                {{--<dl>--}}
                    {{--<dt><span>传真</span></dt>--}}
                    {{--<dd><span>{{$data['webinfo']->fax or '传真未填写'}}</span></dd>--}}
                {{--</dl>--}}

                <dl>
                    <dt><span>地址</span></dt>
                    <dd>
                        <span>{{$data['webinfo']->address or '地址未填写'}}</span>
                    </dd>
                </dl>
                <dl>
                    <dt><span>邮编</span></dt>
                    <dd><span>{{$data['webinfo']->postcode or '邮编未填写'}}</span>
                    </dd>
                </dl>
                <dl>
                    <dt><span>公司简介</span></dt>
                    <dd>
                        <span>{!! $data['webinfo']->ebrief or '无介绍' !!}</span>
                    </dd>
                </dl>
                <?php $links = explode(';',$data['webinfo']->link);?>
                <dl>
                    <dt><span>微博链接</span></dt>
                    <dd>
                        <span>{!! $links[0] or '无微博链接' !!}</span>
                    </dd>
                </dl>
                <dl>
                    <dt><span>搜狐链接</span></dt>
                    <dd>
                        <span>{!! $links[1] or '无搜狐链接' !!}</span>
                    </dd>
                </dl>
                <dl>
                    <dt><span>腾讯微博链接</span></dt>
                    <dd>
                        <span>{!! $links[2] or '无腾讯微博链接' !!}</span>
                    </dd>
                </dl>
                <dl>
                    <dt><span>豆瓣链接</span></dt>
                    <dd>
                        <span>{!! $links[3] or '无豆瓣链接' !!}</span>
                    </dd>
                </dl>
            </div>
        </div>

        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setTelModal">修改公司电话
        </button>
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setEmailModal">修改公司邮箱
        </button>
        {{--<button class="btn bg-teal waves-effect"--}}
                {{--data-toggle="modal" data-target="#setFaxModal">修改公司传真--}}
        {{--</button>--}}
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setCodeModal">修改邮编
        </button>
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setAddressModal">修改公司地址
        </button>
        {{--<button class="btn bg-teal waves-effect">修改公司工作时间</button>--}}
        {{--<button class="btn bg-teal waves-effect">修改副标题</button>--}}
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setContentModal">修改公司简介
        </button>
        <button class="btn bg-teal waves-effect"
                data-toggle="modal" data-target="#setLinkModal">修改外部链接
        </button>

    </div>

    <div class="modal fade" id="setTelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司电话</h4>
                </div>
                <form role="form" method="post" id="set-phone-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="tel" id="tel" name="tel" class="form-control"
                                       placeholder="公司联系电话">
                            </div>
                            <label id="tel-error" class="error" for="tel"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setFaxModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司传真</h4>
                </div>
                <form role="form" method="post" id="set-fax-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="fax" name="fax" class="form-control"
                                       placeholder="公司传真">
                            </div>
                            <label id="tel-error" class="error" for="fax"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setCodeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置邮编</h4>
                </div>
                <form role="form" method="post" id="set-code-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="code" name="code" class="form-control"
                                       placeholder="公司邮编">
                            </div>
                            <label id="tel-error" class="error" for="code"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setEmailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司邮箱</h4>
                </div>
                <form role="form" method="post" id="set-email-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="email" name="email" class="form-control"
                                       placeholder="公司联系邮箱">
                            </div>
                            <label id="email-error" class="error" for="email"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setAddressModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置公司地址</h4>
                </div>
                <form role="form" method="post" id="set-address-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <textarea type="text" rows="3" id="address" name="address" class="form-control"
                                          placeholder="公司地址"></textarea>
                            </div>
                            <label id="address-error" class="error" for="address"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setContentModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置网站介绍</h4>
                </div>
                <form role="form" method="post" id="set-content-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <textarea type="text" rows="3" id="content" name="content" class="form-control"
                                          placeholder="网站介绍"></textarea>
                            </div>
                            <label id="content-error" class="error" for="content"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="setLinkModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">设置外部链接</h4>
                </div>
                <form role="form" method="post" id="set-link-form">
                    <div class="modal-body">

                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="weibo" name="weibo" class="form-control"
                                       value="{{$links[0]}}"
                                       placeholder="微博链接(请以http://开头)">
                            </div>
                            <label id="weibo-error" class="error" for="weibo"></label>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="sohu" name="sohu" class="form-control"
                                       value="{{$links[1]}}"
                                       placeholder="搜狐链接(请以http://开头)">
                            </div>
                            <label id="sohu-error" class="error" for="sohu"></label>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="tengxun" name="tengxun" class="form-control"
                                       value="{{$links[2]}}"
                                       placeholder="腾讯微博链接(请以http://开头)">
                            </div>
                            <label id="tengxun-error" class="error" for="tengxun"></label>
                        </div>
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="douban" name="douban" class="form-control"
                                       value="{{$links[3]}}"
                                       placeholder="豆瓣链接(请以http://开头)">
                            </div>
                            <label id="douban-error" class="error" for="douban"></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary waves-effect">设置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('custom-script')
    <script type="text/javascript">
        $("#set-phone-form").submit(function (event) {
            event.preventDefault();
            var phone = $("#tel");

            if (phone.val() === '') {
                setError(phone, 'tel', "不能为空");
                return;
            } else {
                removeError(phone, 'tel');
            }

            var formData = new FormData();
            formData.append("tel", phone.val());

            $.ajax({
                url: "/admin/about/setPhone",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setTelModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })

        });
        $("#set-fax-form").submit(function (event) {
            event.preventDefault();
            var fax = $("#fax");

            if (fax.val() === '') {
                setError(fax, 'fax', "不能为空");
                return;
            } else {
                removeError(fax, 'fax');
            }

            var formData = new FormData();
            formData.append("fax", fax.val());

            $.ajax({
                url: "/admin/about/setFax",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setFaxModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })

        });
        $("#set-code-form").submit(function (event) {
            event.preventDefault();
            var code = $("#code");

            if (code.val() === '') {
                setError(code, 'code', "不能为空");
                return;
            } else {
                removeError(code, 'code');
            }

            var formData = new FormData();
            formData.append("code", code.val());

            $.ajax({
                url: "/admin/about/setCode",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setCodeModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })

        });

        $("#set-email-form").submit(function (event) {
            event.preventDefault();
            var email = $("#email");

            if (email.val() === '') {
                setError(email, 'email', "不能为空");
                return;
            } else {
                removeError(email, 'email');
            }

            var formData = new FormData();
            formData.append("email", email.val());

            $.ajax({
                url: "/admin/about/setEmail",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setEmailModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $("#set-address-form").submit(function (event) {
            event.preventDefault();
            var address = $("#address");

            if (address.val() === '') {
                setError(address, 'address', "不能为空");
                return;
            } else {
                removeError(address, 'address');
            }

            var formData = new FormData();
            formData.append("address", address.val());

            $.ajax({
                url: "/admin/about/setAddress",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setAddressModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });

        $("#set-content-form").submit(function (event) {
            event.preventDefault();
            var content = $("#content");
            var newsContent = content.val().replace(/\r\n/g, '<br>');
            newsContent = newsContent.replace(/\n/g, '<br>');
            newsContent = newsContent.replace(/\s/g, '&nbsp;');

            if (content.val() === '') {
                setError(content, 'content', "不能为空");
                return;
            } else {
                removeError(content, 'content');
            }

            var formData = new FormData();
            formData.append("content", newsContent);

            $.ajax({
                url: "/admin/about/setContent",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setContentModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });
        $("#set-link-form").submit(function (event) {
            event.preventDefault();
            var weibo = $("#weibo");
            var sohu = $("#sohu");
            var tengxun = $("#tengxun");
            var douban = $("#douban");

            var link = weibo.val() + ';' +sohu.val()+ ';' +tengxun.val()+';'+douban.val();

            var formData = new FormData();
            formData.append("link", link);

            $.ajax({
                url: "/admin/about/setLink",
                type: "post",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (data) {
                    $("#setContentModal").modal('toggle');
                    var result = JSON.parse(data);

                    checkResult(result.status, "修改成功", result.msg, null);
                    setTimeout(function () {
                        location.reload();
                    }, 1200);
                }
            })
        });
    </script>
@show
