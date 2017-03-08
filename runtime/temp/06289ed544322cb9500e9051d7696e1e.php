<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:52:"U:\phpStudy_A\WWW/search/index\view\index\index.html";i:1488158146;s:54:"U:\phpStudy_A\WWW/search/index\view\public\header.html";i:1488156917;s:55:"U:\phpStudy_A\WWW/search/index\view\Public\sidebar.html";i:1488156923;s:54:"U:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1488156911;}*/ ?>
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

    <div class="am-container">
        <div class="logoimg">
            <img src="<?php echo \think\Config::get('img_path'); ?>logo_b.png">
        </div>
        <div class="am-center searchinput">
            <form method="post" action="<?php echo Url('search'); ?>">
                <div class="am-input-group" id="pm">
                    <input type="text" name="keys" id="keys" class="am-form-field" placeholder="请输入关键词，尽量不要带特殊标点符号">
                    <span class="am-input-group-btn">
                <button class="am-btn am-btn-primary" type="submit">试试手气</button>
            </span>
                </div>
            </form>
            <div id="search_auto"></div>
            <div style="margin-top:20px; text-align:center;" id="counts"></div>
        </div>
        <div class="am-center imglist">
            <div class="carousel">
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l012.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="<?php echo Url('statis'); ?>" class="itemtitle" title="数据统计">数据统计</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l015.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="./Web/special.html" class="itemtitle" title="专题列表">专题列表</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l011.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="./Web/hot.html" class="itemtitle" title="热点查看">热点查看</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l014.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="/" class="itemtitle" title="carousel item">栏目待定</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l001.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="/" class="itemtitle" title="carousel item">栏目待定</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l007.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="/" class="itemtitle" title="carousel item">栏目待定</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l002.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="/" class="itemtitle" title="carousel item">栏目待定</a>
                </div>
                <div class="item">
                    <img src="<?php echo \think\Config::get('img_path'); ?>l/l009.png" alt="carousel item" />
                    <div class="item-background background-color"></div>
                    <a href="/" class="itemtitle" title="carousel item">栏目待定</a>
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

    <script>
    <!--
    $(document).ready(function() {
        $.get('<?php echo Url('counts'); ?>',
            function(data) {
                if (data != 'null') $('#counts').html('（知识库当前共有文档 ' + data + ' 篇）');
            });

        $('#search_auto').css({
            'width': $('#pm input[name="keys"]').width() + 18
        });
        $('#pm input[name="keys"]').keyup(function() {
            $.post('<?php echo Url('keywords'); ?>', {
                    'qstr': $(this).val()
                },
                function(data) {
                    var tstr = '';
                    if (data == 'null' || data == '') {
                        tstr = '<li>无类似关键词</li>';
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            tstr = tstr + '<li><a href="javascript:void(0)" onclick="visits(\'' + data[i].keyname + '\')">' + data[i].keyname + '</a></li>';
                        }
                    }
                    tstr = '<ul>' + tstr + '<li class="cls"><a href="javascript:void(0)" onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a></li></ul>';
                    $('#search_auto').html(tstr).css('display', 'block');
                });
        });
    });

    function visits(str) {
        $('#keys').val(str);
        //$('#search_auto').css('display','none');
    }
    //-->
    </script>
</body>

</html>
