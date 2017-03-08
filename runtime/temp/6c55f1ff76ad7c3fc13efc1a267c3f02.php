<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"U:\phpStudy_A\WWW/search/usercenter\view\index\statisd.html";i:1488158641;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\public\header.html";i:1488156801;s:61:"U:\phpStudy_A\WWW/search/usercenter\view\Public\usidebar.html";i:1488156814;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\Public\footer.html";i:1488156794;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国外军事电子知识库</title>
    <link href="<?php echo \think\Config::get('css_path'); ?>amazeui.min.css" rel="stylesheet" />

<link href="<?php echo \think\Config::get('css_path'); ?>style.css" rel="stylesheet" />
<style type="text/css">
.logoimg {
    margin: 30px 0;
    width: 100%;
    text-align: center;
}

.searchinput {
    margin-top: 50px;
    width: 500px;
}

.imglist {
    margin-top: 20px;
    width: 500px;
}
</style>
</head>
<noscript unselectable="on" id="noscript">
    <div class="aw-404 aw-404-wrap container">
        <img src="<?php echo \think\Config::get('img_path'); ?>no-js.jpg">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>

<body>
    <header class="am-topbar am-topbar-inverse am-topbar-fixed-top">
    <h1 class="am-topbar-brand">
		<a href="#" class="am-text-ir">国外军事电子知识库</a>
	</h1>
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse-4'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse-4">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li><a href="<?php echo Url('index/index'); ?>">首页</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">数据统计 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/statiss'); ?>">检索统计</a></li>
                    <li><a href="<?php echo Url('index/statisd'); ?>">下载统计</a></li>
                </ul>
            </li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">专题管理 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/special'); ?>">专题列表</a></li>
                    <li><a href="<?php echo Url('index/special_add'); ?>">添加专题</a></li>
                </ul>
            </li>
        </ul>
        <div class="am-topbar-right">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li><a href="<?php echo Url('index/index/index'); ?>">返回前台</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <?php switch($username): case "": ?>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">登陆/注册 <span class="am-icon-caret-down"></span></a>
                    <ul class="am-dropdown-content" id="userlist">
                        <li><a href="<?php echo Url('login/uin'); ?>">用户登陆</a></li>
                        <li><a href="<?php echo Url('login/reg'); ?>">用户注册</a></li>
                    </ul>
                    <?php break; default: ?>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">会员：<?php echo $username; ?> <span class="am-icon-caret-down"></span></a>
                    <ul class="am-dropdown-content" id="userlist">
                        <li><a href="<?php echo Url('login/uinfo'); ?>?uid=<?php echo $userid; ?>">个人信息</a></li>
                        <li><a href="<?php echo Url('login/uout'); ?>?uid=<?php echo $userid; ?>">退出登录</a></li>
                    </ul>
                    <?php endswitch; ?>
                </li>
            </ul>
        </div>
    </div>
</header>

    <div class="am-container">
        <div class="am-g" style="margin-top:50px">
            <div class="am-alert am-alert-danger" id="my-alert" style="display: none">
                <p>开始日期应小于结束日期！</p>
            </div>
            <div class="am-g">
                <div class="am-u-md-4">
                    <button type="button" class="am-btn am-btn-default am-margin-right" id="my-start">开始日期</button><span id="st"><?php echo $sdate; ?></span>
                </div>
                <div class="am-u-md-4">
                    <button type="button" class="am-btn am-btn-default am-margin-right" id="my-end">结束日期</button><span id="et"><?php echo $edate; ?></span>
                </div>
                <div class="am-u-md-4">
                    <button class="am-btn am-btn-primary" onclick="searchs()">查询</button>
                </div>
            </div>
            <hr>
            <div class="am-g" style="margin-top:60px">
                <div class="am-center">
                    <div id="container" class="am-container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
    <div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="返回顶部">
        <img class="am-gotop-icon-custom" src="<?php echo \think\Config::get('img_path'); ?>goTop.gif" />
    </a>
</div>
<footer class="am-footer am-footer-default am-topbar-fixed-bottom" id="footer">
    <div class="am-footer-miscs ">
        <p>由 <a href="http://www.eisc.com.cn/" title="信息中心" target="_blank" class="">信息中心</a> 提供技术支持</p>
    </div>
</footer>
<script src="<?php echo \think\Config::get('js_path'); ?>jquery.min.js"></script>
<script src="<?php echo \think\Config::get('js_path'); ?>amazeui.min.js"></script>

    <script src="<?php echo \think\Config::get('js_path'); ?>handlebars.min.js"></script>
    <script src="<?php echo \think\Config::get('js_path'); ?>Highcharts-4.2.3/js/highcharts.js"></script>
    <script src="<?php echo \think\Config::get('js_path'); ?>Highcharts-4.2.3/js/modules/exporting.js" type="text/javascript"></script>
    <script>
    <!--
    $(document).ready(function() {
        $.AMUI.progress.configure({
            parent: "#footer"
        });
        postdata('近十五天下载统计');
    });

    $(function() {
        var startDate = new Date('<?php echo $sdate; ?>');
        var endDate = new Date('<?php echo $edate; ?>');
        var $alert = $('#my-alert');
        $('#my-start').datepicker().
        on('changeDate.datepicker.amui', function(event) {
            if (event.date.valueOf() > endDate.valueOf()) {
                $alert.find('p').text('开始日期应小于结束日期！').end().show();
            } else {
                $alert.hide();
                startDate = new Date(event.date);
                $('#st').text($('#my-start').data('date'));
            }
            $(this).datepicker('close');
        });

        $('#my-end').datepicker().
        on('changeDate.datepicker.amui', function(event) {
            if (event.date.valueOf() < startDate.valueOf()) {
                $alert.find('p').text('结束日期应大于开始日期！').end().show();
            } else {
                $alert.hide();
                endDate = new Date(event.date);
                $('#et').text($('#my-end').data('date'));
            }
            $(this).datepicker('close');
        });
    });

    function searchs() {
        postdata('下载统计查询结果')
    }

    function postdata(titles) {
        $.AMUI.progress.start();
        $.post('<?php echo Url('statis/sdown'); ?>', {
                uid: <?php echo $uid; ?>,
                st: $('#st').html(),
                et: $('#et').html()
            },
            function(data, status) {
                if (status == 'success') {
                    var n = [];
                    var allnums = 0;
                    for (var i = 0; i < data.n.length; i++) {
                        n[i] = Number(data.n[i]);
                        allnums += Number(data.n[i]);
                    }
                    display(titles + '(总计: ' + allnums + '篇)', data.d, n);
                } else {
                    $('#container').html('没有统计数据');
                }
                $.AMUI.progress.done();
            });
    }

    function display(s, d, n) {
        $('#container').highcharts({
            credits: {
                enabled: false
            },
            title: {
                text: s,
                x: -20
            },
            xAxis: {
                categories: d
            },
            yAxis: {
                title: {
                    text: '单位：篇'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '篇'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: '数量',
                data: n
            }]
        });
    }
    //-->
    </script>
</body>

</html>
