<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"U:\phpStudy_A\WWW/search/usercenter\view\index\special_edit.html";i:1488251944;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\public\header.html";i:1488156801;s:61:"U:\phpStudy_A\WWW/search/usercenter\view\Public\usidebar.html";i:1488156814;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\Public\footer.html";i:1488156794;}*/ ?>
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
            <form class="am-form">
                <fieldset>
                    <legend>编辑专题</legend>
                    <div class="am-form-group">
                        <label for="doc-ipt-email-1">专题名称</label>
                        <input type="text" id="stitle" value="" placeholder="请输入专题名称">
                    </div>
                    <div class="am-form-group">
                        <label for="doc-ipt-email-1">专题说明</label>
                        <textarea rows="5" id="snote"></textarea>
                    </div>
                    <div class="am-form-group">
                        <label for="doc-ipt-email-1">是否共享： </label>
                        <input type="checkbox" id="share">
                    </div>
                    <input type="hidden" id="uid" value="<?php echo $uid; ?>">
                    <input type="hidden" id="sid" value="<?php echo $sid; ?>">
                    <div class="am-alert am-alert-danger" id="alert" style="display: none"></div>
                    <button type="button" class="am-btn am-btn-success" onclick="postdata();">编 辑</button>
                </fieldset>
            </form>
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

    <script>
    <!--
    $(document).ready(function() {
        $.AMUI.progress.configure({
            parent: "#footer"
        });
        getdata();
    });

    function postdata() {
        $.AMUI.progress.start();
        if($('#share').is(':checked')) {var share = 1}
        else{ var share = 0};
        $.post('<?php echo Url('special/sedit'); ?>', {
                uid: $('#uid').val(),
                sid: $('#sid').val(),
                stitle: $('#stitle').val(),
                snote: $('#snote').val(),
                share: share
            },
            function(data, status) {
                var alerts = $('#alert');
                if (data.a == 'success') {
                    alerts.removeClass('am-alert-danger');
                    alerts.addClass('am-alert-success')
                    alerts.html('专题修改成功 (' + data.b + ')').show();
                } else {
                    alerts.removeClass('am-alert-success');
                    alerts.addClass('am-alert-danger')
                    alerts.html('专题修改失败').show();
                }
                $.AMUI.progress.done();
            });
    }

    function getdata() {
        $.AMUI.progress.start();
        $.post('<?php echo Url('special/getspecial'); ?>', {
                uid: <?php echo $uid; ?>,
                sid: <?php echo $sid; ?>
            },
            function(data, status) {
                if (status == 'success') {
                    $('#stitle').val(data.sname);
                    $('#snote').val(data.snote);
                    if(data.share==1){ $('#share').prop('checked', true)}
                    else { $('#share').prop('checked', false)};
                }
                $.AMUI.progress.done();
            });
    }
    //-->
    </script>
</body>

</html>
