<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>进销存beta0.1管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Public/statics/css/bootstrap.min.css">
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
<link rel="stylesheet" type="text/css" href="/Public/statics/css/sale.css">
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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main"
             style="margin-left: 10%;">
            <h1 class="page-header">天津广源润泽科技有限公司</h1>
            <div class="company_name">地址：天津市河西区洞庭路24号天津荣缘信通科技孵化器A207&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：13820189760
            </div>
            <div style="padding-bottom: 5px;">销售日期：<?php echo ($date); ?><h3 style="text-align: center">销售单</h3></div>
            <form action="/Home/Project/edit" method="post">
                <!--<div class="form-group">-->
                <!--<label for="company_name">公司名称</label>-->
                <!--<input type="text" id="company_name" name="company_name" value="<?php echo ($projectInfo['company_name']); ?>"-->
                <!--class="form-control"-->
                <!--required autocomplete="off">-->
                <!--&lt;!&ndash;<span class="prompt-text">这将是它在站点上显示的名字。</span>&ndash;&gt;-->

                <!--<input type="hidden" name="siteId" id="siteId" value="<?php echo $siteId?>"/>-->
                <!--<input type="hidden" name="siteName" id="siteName" value=""/>-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<label for="contact_name">联系人</label>-->
                <!--<input type="text" id="contact_name" name="contact_name" value="<?php echo ($projectInfo['contact_name']); ?>"-->
                <!--class="form-control"-->
                <!--required autocomplete="off">-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<label for="contact_tel">联系人电话</label>-->
                <!--<input type="text" id="contact_tel" name="contact_tel" value="<?php echo ($projectInfo['contact_tel']); ?>"-->
                <!--class="form-control"-->
                <!--required autocomplete="off">-->
                <!--</div>-->
                <!--<div class="form-group">-->
                <!--<label for="project_name[]">产品</label>-->
                <!--<input type="text" id="project_name[]" name="project_name[]" value="<?php echo ($projectInfo['contact_tel']); ?>"-->
                <!--class="form-control"-->
                <!--required autocomplete="off">-->
                <!--</div>-->

                <!--<div class="form-group">-->
                <!--<label for="category-describe">备注</label>-->
                <!--<textarea class="form-control" id="category-describe" name="remark" rows="4" autocomplete="off"><?php echo ($projectInfo['remark']); ?></textarea>-->
                <!--</div>-->
                <!--<input type="hidden" value="<?php echo ($projectInfo['id']); ?>" name="projectId"/>-->
                <!--<button class="btn btn-primary" type="submit" name="submit_1">更新</button>-->
            </form>


            <table class="table table-hover" border="1">
                <tr>
                    <td colspan="2" style="border-top:#000000" class="srinput">
                        <p style="float: left;width: 26%;padding-top: 10px;">客户名称：</p>
                        <input type="text" id="company_name" name="company_name" value="<?php echo ($projectInfo['company_name']); ?>"
                               style="width:69%;float: right" ;
                               required autocomplete="off">

                        <ul id='dealerInfo' style="display: none">

                        </ul>
                        <input type="hidden" name="siteId" id="siteId" value="<?php echo $siteId?>"/>
                        <input type="hidden" name="siteName" id="siteName" value=""/>
                    </td>
                    <td colspan="4" style="border-top:#000000">
                        <p style="float: left;width: 17%;padding-top: 10px;">联系人：</p>
                        <input type="text" id="contact_name" name="contact_name" value="<?php echo ($projectInfo['contact_tel']); ?>"
                               style="width:82%;float: right" ;
                               required autocomplete="off">

                    </td>
                    <td colspan="2" style="border-top:#000000">
                        <p style="float: left;width: 17%;padding-top: 10px;">电话：</p>
                        <input type="text" id="contact_tel" name="contact_tel" value="<?php echo ($projectInfo['contact_tel']); ?>"
                               style="width:82%;float: right" ;
                               required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <th width="20%">商品全名</th>
                    <th width="10%">规格</th>
                    <th width="10%">单位</th>
                    <th width="10%">数量</th>
                    <th width="10%">单价</th>
                    <th width="10%">金额</th>
                    <th width="10%">结款方式</th>
                    <th>备注</th>
                </tr>
                <tr>
                    <td><input oninput="testFun(1)" id="project_1" type="text" name="text" value="" style=""/></td>
                    <td><input type="text" name="standard[]" id="standard_1"/></td>
                    <td><input type="text" name="unit[]" id="unit_1"/></td>
                    <td><input type="text" name="number[]" id="number_1"/></td>
                    <td><input type="text" name="price[]" id="price_1"/></td>
                    <td><input type="text" name="money[]" id="money_1" value=""/></td>
                    <td><input type="text" name="type_sale" id="type_sale_1"/></td>
                    <td><input type="text" name="remark" id="remark_1"/></td>
                    <input type="hidden" id="projectId_1" name="projectId_1" value="">
                </tr>
                <tr>
                    <td><input oninput="testFun(2)" id="project_2" type="text" name="text" value="" style=""
                               datatype="test"/></td>
                    <td><input type="text" name="standard[]" id="standard_2"/></td>
                    <td><input type="text" name="unit[]" id="unit_2"/></td>
                    <td><input type="text" name="number[]" id="number_2"/></td>
                    <td><input type="text" name="price[]" id="price_2"/></td>
                    <td><input type="text" name="money[]" id="money_2" value=""/></td>
                    <td><input type="text" name="type_sale" id="type_sale_2"/></td>
                    <td><input type="text" name="remark" id="remark_2"/></td>

                    <input type="hidden" id="projectId_2" name="projectId_2" value="">
                </tr>
                <tr>
                    <td><input oninput="testFun(3)" id="project_3" type="text" name="text" value="" style=""
                               datatype="test"/></td>
                    <td><input type="text" name="standard[]" id="standard_3"/></td>
                    <td><input type="text" name="unit[]" id="unit_3"/></td>
                    <td><input type="text" name="number[]" id="number_3"/></td>
                    <td><input type="text" name="price[]" id="price_3"/></td>
                    <td><input type="text" name="money[]" id="money_3" value=""/></td>
                    <td><input type="text" name="type_sale" id="type_sale_3"/></td>
                    <td><input type="text" name="remark" id="remark_3"/></td>

                    <input type="hidden" id="projectId_3" name="projectId_3" value="">
                </tr>
                <tr>
                    <td><input oninput="testFun(4)" id="project_4" type="text" name="text" value="" style=""
                               datatype="test"/></td>
                    <td><input type="text" name="standard[]" id="standard_4"/></td>
                    <td><input type="text" name="unit[]" id="unit_4"/></td>
                    <td><input type="text" name="number[]" id="number_4"/></td>
                    <td><input type="text" name="price[]" id="price_4"/></td>
                    <td><input type="text" name="money[]" id="money_4" value=""/></td>
                    <td><input type="text" name="type_sale" id="type_sale_4"/></td>
                    <td><input type="text" name="remark" id="remark_4"/></td>

                    <input type="hidden" id="projectId_4" name="projectId_4" value="">
                </tr>

                <tr>
                    <td>总计</td>
                    <td colspan="2"><input type="text" value="" id="chineseTotal"></td>
                    <td><input id='numberTotal' type="text" name="numberTotal" value="" onclick="getProjectNum()"></td>
                    <td></td>
                    <td><input type="text" id="total" name="total" value="" onclick="getTotal()"></td>
                    <td colspan='2'></td>
                </tr>
                <tr>
                    <td>备注</td>
                    <td colspan='7'>白联为仓库联，粉联为应收联，蓝联为财务联，黄联为客户联</td>
                </tr>

            </table>
            <div>库管：　　　　　　　　　　　　　
                提货人：　　　　　　　　　　　　
                收货人：　　　　　　　　　　　　
                经办人：　　　　　　　　　　　　
                交款人：　　　　　　　　　　　　
            </div>
        </div>
    </div>
</section>
<script src="/Public/statics/js/bootstrap.min.js"></script>
<script src="/Public/statics/js/admin-scripts.js"></script>
<script src="/Public/statics/js/convertCurrency.js"></script>
<script src="/Public/statics/js/sale.js"></script>
</body>
</html>