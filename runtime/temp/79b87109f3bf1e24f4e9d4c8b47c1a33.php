<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:53:"U:\phpStudy_A\WWW/search/index\view\index\statis.html";i:1488157924;s:54:"U:\phpStudy_A\WWW/search/index\view\public\header.html";i:1488156917;s:55:"U:\phpStudy_A\WWW/search/index\view\Public\sidebar.html";i:1488156923;s:54:"U:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1488156911;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国外军事电子知识库</title>
    <link href="<?php echo \think\Config::get('css_path'); ?>amazeui.min.css" rel="stylesheet" />

<style>
#ylist {
    margin-top: 20px;
    text-align: center;
}

#ylist a {
    margin-right: 20px;
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
            <li><a href="<?php echo Url('index/document'); ?>?type=J">期刊文献</a></li>
            <li><a href="<?php echo Url('index/document'); ?>?type=C">会议文献</a></li>
            <li><a href="<?php echo Url('index/document'); ?>?type=R">科技报告</a></li>
            <li><a href="<?php echo Url('index/document'); ?>?type=D">学位论文</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">其他分类 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/document'); ?>?type=G">汇编文献</a></li>
                    <li><a href="<?php echo Url('index/document'); ?>?type=S">技术标准</a></li>
                    <li><a href="<?php echo Url('index/document'); ?>?type=P">专利文献</a></li>
                    <li><a href="<?php echo Url('index/document'); ?>?type=M">专著文献</a></li>
                    <li><a href="<?php echo Url('index/document'); ?>?type=K">参考工具</a></li>
                </ul>
            </li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文摘数据 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/alist'); ?>?cid=12">NTIS</a></li>
                    <li><a href="<?php echo Url('index/alist'); ?>?cid=13">INSPEC</a></li>
                    <li><a href="<?php echo Url('index/alist'); ?>?cid=14">EI</a></li>
                    <li><a href="<?php echo Url('index/alist'); ?>?cid=15">AERO</a></li>
                    <li><a href="<?php echo Url('index/alist'); ?>?cid=16">电子科技文摘</a></li>
                </ul>
            </li>
        </ul>
        <div class="am-topbar-right">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-dropdown" data-am-dropdown>
                    <?php switch($username): case "": ?>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">登陆/注册 <span class="am-icon-caret-down"></span></a>
                    <ul class="am-dropdown-content" id="userlist">
                        <li><a href="<?php echo Url('usercenter/login/uin'); ?>">用户登陆</a></li>
                        <li><a href="<?php echo Url('usercenter/login/reg'); ?>">用户注册</a></li>
                    </ul>
                    <?php break; default: ?>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">会员：<?php echo $username; ?> <span class="am-icon-caret-down"></span></a>
                    <ul class="am-dropdown-content" id="userlist">
                        <li><a href="<?php echo Url('usercenter/index/uinfo'); ?>">个人信息</a></li>
                        <li><a href="<?php echo Url('usercenter/index/index'); ?>">用户中心</a></li>
                        <li><a href="<?php echo Url('usercenter/login/uout'); ?>">退出登录</a></li>
                    </ul>
                    <?php endswitch; ?>
                </li>
            </ul>
        </div>
    </div>
</header>

    <div class="am-g" style="margin-top: 30px">
        <div class="am-u-lg-3">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
                <h2 class="am-titlebar-title ">统计项目</h2>
            </div>
            <div class="am-gp" style="padding:20px 10px">
                <ul class="am-list">
                    <li style="border:none">
                        <a href="#" onclick="get_a()">十五年数据分布图</a>
                    </li>
                    <li style="border:none">
                        <a href="#" onclick="get_b(2016,1)">分库分年数据对比</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="am-u-lg-9">
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            <div id="ylist"></div>
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

    <script src="<?php echo \think\Config::get('js_path'); ?>Highcharts-4.2.3/js/highcharts.js" type="text/javascript"></script>
    <script src="<?php echo \think\Config::get('js_path'); ?>Highcharts-4.2.3/js/modules/exporting.js" type="text/javascript"></script>
    <script LANGUAGE="JavaScript">
    function get_a() {
        $.AMUI.progress.start();
        $('#ylist').html('');
        $.get('<?php echo Url('cluster/aaa'); ?>',
            function(data, status) {
                if (data != 'null') {
                    var n = [];
                    for (var i = 0; i < data.n.length; i++) {
                        n[i] = Number(data.n[i]);
                    }
                    $('#container').highcharts({
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: '近十五年文献出版分布图',
                            x: -20 //center
                        },
                        xAxis: {
                            categories: data.y
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
                            name: '全库',
                            data: n
                        }]
                    });
                } else {
                    $('#container').html('没有统计数据');
                }
                $.AMUI.progress.done();
            });
    }

    function get_b(years, ac) {
        $.AMUI.progress.start();
        $.post('<?php echo Url('cluster/bbb'); ?>', {
                years: years
            },
            function(data, status) {
                if (data != 'null') {
                    var n = [];
                    for (var i = 0; i < data.n.length; i++) {
                        n[i] = [];
                        n[i][0] = data.c[i];
                        n[i][1] = Number(data.n[i]);
                    }
                    $('#container').highcharts({
                        credits: {
                            enabled: false
                        },
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: years + ' 各来源库数据更新情况图'
                        },
                        xAxis: {
                            type: 'category',
                            labels: {
                                rotation: -45,
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '单位：篇'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        tooltip: {
                            pointFormat: years + '年更新数据: <b>{point.y} 篇</b>'
                        },
                        series: [{
                            name: '更新量',
                            data: n
                        }]
                    });

                } else {
                    $('#container').html('没有统计数据');
                }
                $.AMUI.progress.done();
            });

        if (ac == 1) {
            get_c();
        }
    }

    function get_c() {
        $.get('<?php echo Url('cluster/ylist'); ?>',
            function(data, status) {
                if (data != 'null') {
                    var alist = '';
                    for (var i = 0; i < data.length; i++) {
                        alist = alist + '<a href="#" onclick="get_b(' + data[i].pyear + ',0)">' + data[i].pyear + '</a> ';
                        if ((i + 1) % 10 == 0) {
                            alist = alist + '<br>';
                        }
                    }
                    $('#ylist').html(alist);
                } else {
                    $('#ylist').html('没有年份数据');
                }
            });
    }

    $(document).ready(function() {
        $.AMUI.progress.configure({
            parent: '#footer'
        });
        get_a();
    });
    </script>
</body>

</html>
