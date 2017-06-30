var dom = document.getElementById("company_name");
dom.oninput = function () {
    $("#dealerInfo").show();
    var param = $(this).val();
    $.ajax({
        type: 'GET',
        url: '/Home/Dealer/getLikeDealers/name/' + param,
        data: '',
        dataType: 'json',
        success: function (result) {
            var html = '';
            $(result).each(function (i) {
                $("#dealerInfo").html("");
                $("#siteId").val($(this)[0].id);
                $("#siteName").val($(this)[0].name);
                html += "<li onclick='getSiteId(" + $(this)[0].id + ",\"" + $(this)[0].name + "\" )'>" + $(this)[0].name + "</li>";
            });
            $("#dealerInfo").append(html);
        }
    });
};

function getSiteId(id, name) {
    $("#siteId").val(id);
    $("#siteName").val(name);
    $("#company_name").val(name);

    getDealerInfo(id);
    $("#dealerInfo").hide();
}

/**
 * 获取商家信息
 * @param id int 商家id
 */
function getDealerInfo(id) {
    $.ajax({
        type: 'GET',
        url: '/Home/Dealer/getDealerInfo/id/' + id,
        data: '',
        dataType: 'json',
        success: function (result) {
            $(result).each(function (i) {
                if ($(this)[0].contact_name) {
                    $("#contact_name").val($(this)[0].contact_name);
                    $("#contact_tel").val($(this)[0].contact_tel);
                } else {
                    $("#contact_name").val('');
                    $("#contact_tel").val('');
                }

            });
        }
    });
}

/**
 * 异步模糊查询产品名称
 * @param id int 第id个td
 */
function testFun(id) {
    var projectName = $('#project_' + id).val();
    $("#dealerInfo").show();
    $('#dealerInfo').addClass('color:green');
    $.ajax({
        type: 'GET',
        url: '/Home/Project/getLikeProjects/name/' + projectName,
        data: '',
        dataType: 'json',
        success: function (result) {
            var html = '';
            $(result).each(function (i) {
                $("#dealerInfo").html("");

                html += "<li onclick='getProjectId(" + id + "," + $(this)[0].id + ",\"" + $(this)[0].name + "\" )'>" + $(this)[0].name + "</li>";
            });
            $("#dealerInfo").append(html);
        }
    });
}

function getProjectId(tdId, id, name) {
    var projectTd = 'project_' + tdId;
    $("#projectId_" + tdId).val(id);
    $("#" + projectTd).val(name);
    getProjectInfo(tdId,id);
    $("#dealerInfo").hide();
}


function getProjectInfo(tdId,id) {
    $.ajax({
        type: 'GET',
        url: '/Home/Project/getProjectInfo/id/' + id,
        data: '',
        dataType: 'json',
        success: function (result) {
            $(result).each(function (i) {
                $("#standard_" + tdId).val($(this)[0].standard);
                $("#unit_" + tdId).val($(this)[0].unitName);
            });
        }
    });
}

/**
 * 获取金额总数
 */
function getTotal() {
    var total = 0;
    for (var i = 1; i < 8; i++) {
        money = $('#money_' + i).val();
        if (typeof(money) == "undefined" || money == '') {
            mon = parseInt(0);
        } else {
            mon = parseInt(money);
        }

        total += mon;
    }

    var chineseTotal = convertCurrency(total);
    $('#chineseTotal').val(chineseTotal);
    $("#total").val(total);
}

/**
 * 获取商品总数
 */
function getProjectNum() {
    var numberTotal = 0;
    for (var i = 1; i < 8; i++) {
        number = $('#number_' + i).val();
        if (typeof(number) == "undefined" || number == '') {
            number = parseInt(0);
        } else {
            number = parseInt(number);
        }

        numberTotal += number;
    }

    $("#numberTotal").val(numberTotal);
}

