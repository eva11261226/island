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

    <div class="row" style="padding-left: 5px;">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main"
             style="width:80%;margin: auto 10% auto 10%">
            <div style="padding-bottom: 5px;">销售日期：<?php echo ($buyInfo['add_time']); ?><h3 style="text-align: center">销售单</h3></div>
            <div class="srinput">
                <ul id='dealerInfo' style="display: none"></ul>
            </div>
            <table class="table table-hover" border="1">
                <tr style="border-top:#000000">
                    <td colspan="3">
                        客户名称：<?php echo ($buyInfo['dealer_name']); ?>
                    </td>
                    <td colspan="3">
                        联系人:<?php echo ($dealerInfo['contact_name']); ?>
                    </td>
                    <td colspan="2">
                        地址：<?php echo ($dealerInfo['address']); ?>
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

                <?php if(is_array($buyProjectInfo)): foreach($buyProjectInfo as $key=>$projects): ?><tr>
                        <td><?php echo ($projects['projectName']); ?></td>
                        <td><?php echo ($projects['standard']); ?></td>
                        <td><?php echo ($projects['unit']); ?></td>
                        <td><?php echo ($projects['number']); ?></td>
                        <td><?php echo ($projects['price']); ?></td>
                        <td><?php echo ($projects['money']); ?></td>
                        <td><?php echo ($projects['buy_type']); ?></td>
                        <td><?php echo ($projects['remark']); ?></td>
                    </tr><?php endforeach; endif; ?>

                <?php $__FOR_START_8371__=0;$__FOR_END_8371__=$count;for($i=$__FOR_START_8371__;$i < $__FOR_END_8371__;$i+=1){ ?><tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr><?php } ?>

                <tr>
                    <td>总计</td>
                    <td colspan="2" id="chineseTotal"></td>
                    <td><?php echo ($buyInfo['number_total']); ?>
                    </td>
                    <td></td>
                    <td><?php echo ($buyInfo['money_total']); ?></td>
                    <td colspan='2'></td>
                </tr>

            </table>

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
<script src="/Public/statics/js/buy.js"></script>
<script>
    var money = "<?php echo ($buyInfo['money_total']); ?>";
    var chinese = convertCurrency(money);
    $('#chineseTotal').html(chinese);
</script>


</body>
</html>