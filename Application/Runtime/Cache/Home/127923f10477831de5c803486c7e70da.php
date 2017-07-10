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
            <h1 class="page-header">添加、修改产品</h1>
            <form action="/Home/Project/edit" method="post">
                <div class="form-group">
                    <label for="category-name">产品名称</label>
                    <input type="text" id="category-name" name="name" value="<?php echo ($projectInfo['name']); ?>"
                           class="form-control"
                           required autocomplete="off">
                    <!--<span class="prompt-text">这将是它在站点上显示的名字。</span>-->
                </div>
                <div class="form-group">
                    <label for="category-alias">产品规格</label>
                    <input type="text" id="category-alias" name="standard" value="<?php echo ($projectInfo['standard']); ?>"
                           class="form-control"
                           required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="category-fname">最小单位</label>
                    <select id="category-fname" class="form-control" name="unit">
                        <?php if(is_array($unitInfo)): foreach($unitInfo as $key=>$units): ?><option value="<?php echo ($units['id']); ?>"
                            <?php if($projectInfo['unit'] == $units['id']): ?>selected='selected'<?php endif; ?>
                            ><?php echo ($units['name']); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="category-describe">备注</label>
                    <textarea class="form-control" id="category-describe" name="remark" rows="4" autocomplete="off"><?php echo ($projectInfo['remark']); ?></textarea>
                </div>
                <input type="hidden" value="<?php echo ($projectInfo['id']); ?>" name="projectId"/>
                <button class="btn btn-primary" type="submit" name="submit_1">更新</button>
            </form>
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
    $(function () {
        $('form').bootstrapValidator({
            message: '不能为空',
            feedbackIcons: {
                valid: 'glyphicon',
                invalid: 'glyphicon',
                validating: 'glyphicon'
            },

            fields: {
                name: {
                    message: '用户名验证失败',
                    validators: {
                        notEmpty: {
                            message: '用户名不能为空'
                        },

                        remote: {
                            url: '/Home/Project/getProjectName',//验证地址
                            message: '用户已存在',//提示消息
//                            delay :  2000,//每输入一个字符，就发ajax请求，服务器压力还是太大，设置2秒发送一次ajax（默认输入一个字符，提交一次，服务器压力太大）
                            type: 'POST'//请求方式
                            /**自定义提交数据，默认值提交当前input value
                             *  data: function(validator) {
                               return {
                                   password: $('[name="passwordNameAttributeInYourForm"]').val(),
                                   whatever: $('[name="whateverNameAttributeInYourForm"]').val()
                               };
                            }
                             */
                        }

                    }
                }
            }
        });

    })

</script>
</body>
</html>