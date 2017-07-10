<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>进销存beta0.1管理系统</title>
    <link rel="stylesheet" media="screen" type="text/css" href="/Public/statics/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/statics/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/statics/css/login.css">
    <link rel="stylesheet" type="text/css" href="/Public/statics/css/bootstrapValidator.min.css">
    <script src="/Public/statics/js/jquery-2.1.4.min.js"></script>
    <script src="/Public/statics/js/bootstrapValidator.min.js"></script>
    <!--[if gte IE 9]>
    <script src="/Public/statics/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/Public/statics/js/html5shiv.min.js" type="text/javascript"></script>
    <script src="/Public/statics/js/respond.min.js" type="text/javascript"></script>
    <script src="/Public/statics/js/selectivizr-min.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script>window.location.href = 'upgrade-browser.html';</script>
    <![endif]-->
</head>
<link href="/Public/statics/css/bootstrap-datetimepicker.min.css">
<link href="/Public/statics/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="all">

<script src="/Public/statics/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/statics/js/moment.js"></script>
<script src="/Public/statics/js/daterangepicker.js"></script>
<body class="user-select">
<section class="container-fluid">
    <header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="/">进销存beta0.1</a> </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <!--<li><a href="">消息 <span class="badge">1</span></a></li>-->
                    <!--<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>-->
                        <!--<ul class="dropdown-menu dropdown-menu-left">-->
                            <!--<li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>-->
                            <!--<li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>-->
                        <!--</ul>-->
                    <!--</li>-->
                    <li><a href="/Home/Login/logout" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                    <!--<li><a data-toggle="modal" data-target="#WeChat">帮助</a></li>-->
                </ul>
                <!--<form action="" method="post" class="navbar-form navbar-right" role="search">-->
                    <!--<div class="input-group">-->
                        <!--<input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">-->
                        <!--<span class="input-group-btn">-->
              <!--<button class="btn btn-default" type="submit">搜索</button>-->
              <!--</span> </div>-->
                <!--</form>-->
            </div>
        </div>
    </nav>
</header>
    <div class="row">
        <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
    <ul class="nav nav-sidebar">
        <li id="index" class="active"><a href="/Home/Index/index">首页</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li id="menu_project"><a href="/Home/Project/index">产品汇总</a></li>
        <li id="menu_sale"><a href="/Home/Sale/index">销货汇总</a></li>
        <li id="menu_buy"><a href="/Home/Buy/index">进货汇总</a></li>
        <!--<li><a href="/Home/Sale/addSale">销售单</a></li>-->
        <!--<li><a href="/Home/Buy/addBuy">进货单</a></li>-->
        <li id="menu_dealer"><a href="/Home/Dealer/index">经销商</a></li>
        <li id="menu_unit"><a href="/Home/Unit/index">最小单位</a></li>
        <!--<li><a data-toggle="tooltip" data-placement="bottom" title="网站暂无留言功能">留言</a></li>-->
    </ul>
</aside>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
            <h1 class="page-header">销售列表</h1>

            <ol class="breadcrumb">
                <li><a href="/Home/Sale/add">
                    <button class="btn btn-info">新增</button>
                </a>
                </li>
            </ol>

            <form action="/Home/Sale/index" method="post" class="navbar-form " role="search">


                <fieldset style="float: left">
                    <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend input-group">
                                <input type="text" readonly style="width: 200px" name="reservation" id="reservation"
                                       class="form-control" value="" placeholder="时间段"/>
                            </div>
                        </div>
                    </div>
                </fieldset>
                &nbsp;&nbsp;&nbsp;
                <input type="hidden" name="start_time" value="<?php echo ($startTime); ?>" id="start_time">
                <input type="hidden" name="end_time" value="<?php echo ($endTime); ?>" id="end_time">

                <div class="input-group">
                    <input type="text" class="form-control" name="search_name" value="<?php echo ($searchName); ?>" autocomplete="off"
                           placeholder="搜索公司名称" maxlength="15">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">搜索</button>
                    </span>
                </div>
            </form>


            <h1 class="page-header"></h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th style="text-align: center;"><span class="glyphicon"></span> <span
                                class="visible-lg">公司名称</span></th>
                        <!--<th style="text-align: center;"><span class="glyphicon"></span> <span-->
                        <!--class="visible-lg">数量</span></th>-->
                        <th style="text-align: center;" class="hidden-sm"><span class="glyphicon"></span> <span
                                class="visible-lg">总数量</span></th>
                        <th style="text-align: center;" class="hidden-sm"><span class="glyphicon"></span> <span
                                class="visible-lg">总价格</span></th>
                        <th style="text-align: center;"><span class="glyphicon"></span> <span
                                class="visible-lg">销售时间</span></th>
                        <th style="text-align: center;"><span class="glyphicon"></span> <span
                                class="visible-lg">操作</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($saleAllInfo)): foreach($saleAllInfo as $key=>$sales): ?><tr>
                            <td align="center" class="article-title"><?php echo ($sales['dealer_name']); ?></td>
                            <!--<td align="center"><?php echo ($sales['number']); ?></td>-->
                            <td align="center" class="hidden-sm"><?php echo ($sales['number_total']); ?></td>
                            <td align="center" class="hidden-sm"><?php echo ($sales['money_total']); ?></td>
                            <td align="center"><?php echo ($sales['add_time']); ?></td>
                            <td align="center">
                                <a href="/Home/Sale/detail/saleId/<?php echo ($sales['id']); ?>" style="color: blue">详情</a>
                                <a href="/Home/Sale/del/saleId/<?php echo ($sales['id']); ?>" style="color: red"
                                   rel="1">删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <?php echo ($page); ?>
            <input type="hidden" id="page_type" value="sale">
        </div>
    </div>
</section>
<script src="/Public/statics/js/bootstrap.min.js"></script>
<script src="/Public/statics/js/admin-scripts.js"></script>
<script>
    $('.nav-sidebar li').removeClass('active');
    var type = $('#page_type').val();
    if (typeof(type) == 'undefined') {
        $('#index').addClass('active');
    } else {
        $('#menu_' + type).addClass('active');
    }
</script>

<script>
    //是否确认删除
    $(function () {
        $("#main table tbody tr td a").click(function () {
            var name = $(this);
            var id = name.attr("rel"); //对应id
            if (event.srcElement.outerText == "删除") {
                if (window.confirm("此操作不可逆，是否确认？")) {
                    $.ajax({
                        type: "POST",
                        url: "/Article/delete",
                        data: "id=" + id,
                        cache: false, //不缓存此页面
                        success: function (data) {
                            window.location.reload();
                        }
                    });
                }
            }
        });
    });

    var startTime = $('#start_time').val();
    var endTime = $('#end_time').val();

    if ((typeof(startTime) != 'undefined') && (startTime != '')) {
        $('#reservation').val(startTime + ' - ' + endTime);
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#reservation').daterangepicker(null, function (start, end, label) {
            var startTime = start.toStringAdd();
            var endTime = end.toStringAdd();
            $("#start_time").val(startTime);
            $("#end_time").val(endTime)
        });
    });
</script>

</body>
</html>