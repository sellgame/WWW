<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:55:"U:\phpStudy_A\WWW/search/usercenter\view\login\uin.html";i:1488156778;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\public\header.html";i:1488156801;s:60:"U:\phpStudy_A\WWW/search/usercenter\view\Public\sidebar.html";i:1488156808;s:59:"U:\phpStudy_A\WWW/search/usercenter\view\Public\footer.html";i:1488156794;}*/ ?>
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

#search_auto {
    position: absolute;
    display: none;
    z-index: 100;
    Margin-top: 1px;
    border: 1px solid #4783EB;
    padding: 0px;
}

#search_auto ul {
    margin-bottom: 0px;
    padding: 0px;
    list-style-type: none;
}

#search_auto li {
    background: #FFF;
    text-align: left;
    padding-left: 5px;
}

#search_auto li.cls {
    text-align: right;
    background: #EFF0EF;
    padding-right: 5px;
}

#search_auto li a {
    display: block;
    cursor: pointer;
    color: #666;
}

#search_auto li a:hover {
    text-decoration: none;
    color: #000;
}

#searchlist {
    position: absolute;
    display: none;
    Margin-top: 1px;
    padding: 0px;
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
            <li><a href="<?php echo Url('index/index/index'); ?>">首页</a></li>
            <li><a href="<?php echo Url('index/index/document'); ?>?type=J">期刊文献</a></li>
            <li><a href="<?php echo Url('index/index/document'); ?>?type=C">会议文献</a></li>
            <li><a href="<?php echo Url('index/index/document'); ?>?type=R">科技报告</a></li>
            <li><a href="<?php echo Url('index/index/document'); ?>?type=D">学位论文</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">其他分类 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/index/document'); ?>?type=G">汇编文献</a></li>
                    <li><a href="<?php echo Url('index/index/document'); ?>?type=S">技术标准</a></li>
                    <li><a href="<?php echo Url('index/index/document'); ?>?type=P">专利文献</a></li>
                    <li><a href="<?php echo Url('index/index/document'); ?>?type=M">专著文献</a></li>
                    <li><a href="<?php echo Url('index/index/document'); ?>?type=K">参考工具</a></li>
                </ul>
            </li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文摘数据 <span class="am-icon-caret-down"></span></a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo Url('index/index/alist'); ?>?cid=12">NTIS</a></li>
                    <li><a href="<?php echo Url('index/index/alist'); ?>?cid=13">INSPEC</a></li>
                    <li><a href="<?php echo Url('index/index/alist'); ?>?cid=14">EI</a></li>
                    <li><a href="<?php echo Url('index/index/alist'); ?>?cid=15">AERO</a></li>
                    <li><a href="<?php echo Url('index/index/alist'); ?>?cid=16">电子科技文摘</a></li>
                </ul>
            </li>
        </ul>
        <div class="am-topbar-right">
            <ul class="am-nav am-nav-pills am-topbar-nav">
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
                        <li><a href="<?php echo Url('login/uinfo'); ?>">个人信息</a></li>
                        <li><a href="<?php echo Url('index/index'); ?>">用户中心</a></li>
                        <li><a href="<?php echo Url('login/uout'); ?>">退出登录</a></li>
                    </ul>
                    <?php endswitch; ?>
                </li>
            </ul>
        </div>
    </div>
</header>

    <div class="am-container">
        <div class="am-center" style="width:450px;margin-top:30px">
            <form method="post" action="" class="am-form">
                <fieldset>
                    <legend>用户登录</legend>
                    <div class="am-form-group">
                        <label for="doc-ipt-email-1">登录账号</label> <span class="am-kai">(注册的邮箱地址)</span>
                        <input type="email" name="uname" class="" id="doc-ipt-email-1" placeholder="输入邮件地址" required/>
                    </div>
                    <div class="am-form-group">
                        <label for="doc-ipt-pwd-1">登录密码</label>
                        <input type="password" name="pass" class="" id="doc-ipt-pwd-1" placeholder="输入登录密码" required/>
                    </div>
                    <p>
                        <button type="submit" class="am-btn am-btn-default">登录</button>
                    </p>
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

</body>

</html>
