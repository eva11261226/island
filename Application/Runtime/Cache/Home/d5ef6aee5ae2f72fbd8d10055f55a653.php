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
<link rel="stylesheet" type="text/css" href="/Public/statics/css/sale.css">
<body class="user-select">
<section class="container-fluid">

    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main"
             style="width:80%;margin: auto 10% auto 10%">
            <!--<h1 class="page-header">天津广源润泽科技有限公司</h1>-->
            <!--<div class="company_name">地址：天津市河西区洞庭路24号天津荣缘信通科技孵化器A207&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：13820189760-->
            <!--</div>-->
            <h3 style="text-align: center;padding-bottom: 10px;">进货单</h3>
            <form action="/Home/Buy/edit" method="post">


                <div class="srinput">
                    <ul id='dealerInfo' style="display: none"></ul>
                </div>
                <input type="hidden" name="dealerId" id="siteId" value=""/>
                <input type="hidden" name="dealerName" id="siteName" value=""/>
                <table class="table table-hover" border="1">
                    <tr style="border-top:#000000">
                        <td colspan="3">
                            <p style="float: left;padding-top: 5px;padding-left: 5px">客户名称：</p>
                            <input type="text" id="company_name" name="company_name"
                                   value="<?php echo ($projectInfo['company_name']); ?>"
                                   style="width:82%;float: right;text-align: left" ;
                                   required autocomplete="off">

                        </td>
                        <td colspan="3">
                            <p style="float: left;padding-top: 5px;padding-left: 5px">联系人：</p>
                            <input type="text" id="contact_name" name="contact_name"
                                   value="<?php echo ($projectInfo['contact_tel']); ?>"
                                   style="width:80%;float: right;text-align: left" ;
                                   required autocomplete="off">

                        </td>
                        <td colspan="2">
                            <p style="float: left;padding-top: 5px;padding-left: 5px">地址：</p>
                            <input type="text" id="contact_tel" name="contact_tel" value="<?php echo ($projectInfo['contact_tel']); ?>"
                                   style="width:85%;float: right;text-align: left" ;
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
                        <th width="20%">结款方式</th>
                        <th>备注</th>
                    </tr>
                    <tr>
                        <td><input oninput="testFun(1)" id="project_1" type="text" name="text" value=""/></td>
                        <td><input type="text" name="standard[]" id="standard_1"/></td>
                        <td><input type="text" name="unit[]" id="unit_1"/></td>
                        <td><input type="text" name="number[]" id="number_1"/></td>
                        <td><input type="text" name="price[]" id="price_1"/></td>
                        <td><input type="text" name="money[]" id="money_1" value=""/></td>
                        <td><input type="text" name="type_sale[]" id="type_sale_1"/></td>
                        <td><input type="text" name="remark[]" id="remark_1"/></td>
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
                        <td><input type="text" name="type_sale[]" id="type_sale_2"/></td>
                        <td><input type="text" name="remark[]" id="remark_2"/></td>

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
                        <td><input type="text" name="type_sale[]" id="type_sale_3"/></td>
                        <td><input type="text" name="remark[]" id="remark_3"/></td>

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
                        <td><input type="text" name="type_sale[]" id="type_sale_4"/></td>
                        <td><input type="text" name="remark[]" id="remark_4"/></td>

                        <input type="hidden" id="projectId_4" name="projectId_4" value="">
                    </tr>

                    <tr>
                        <td>总计</td>
                        <td colspan="2"><input type="text" value="" id="chineseTotal"></td>
                        <td><input id='numberTotal' type="text" name="numberTotal" value="" onclick="getProjectNum()">
                        </td>
                        <td></td>
                        <td><input type="text" id="total" name="moneyTotal" value="" onclick="getTotal()"></td>
                        <td colspan='2'></td>
                    </tr>
                </table>

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
<script src="/Public/statics/js/convertCurrency.js"></script>
<script src="/Public/statics/js/sale.js"></script>
</body>
</html>