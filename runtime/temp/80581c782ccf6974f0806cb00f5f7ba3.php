<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:55:"G:\phpStudy_A\WWW/search/index\view\index\document.html";i:1488156861;s:54:"G:\phpStudy_A\WWW/search/index\view\public\header.html";i:1488156917;s:55:"G:\phpStudy_A\WWW/search/index\view\Public\sidebar.html";i:1488156923;s:54:"G:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1488156911;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>国外军事电子知识库</title>
    <link href="<?php echo \think\Config::get('css_path'); ?>amazeui.min.css" rel="stylesheet" />

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

    <div class="am-g" style="margin: 20px 0;">
        <form class="am-form-inline" role="form">
            <div class="am-form-group">
                <span style="margin-left:10px; margin-right:20px"><img src="<?php echo \think\Config::get('img_path'); ?>logo-bar.png"></span>
            </div>
            <div class="am-form-group">
                <input type="text" class="am-form-field am-form-success" style="width:400px" id="pname" placeholder="请输入文献名称或者 ISSN/ISBN 号">
            </div>
            <div class="am-form-group am-form-group-sm">
                <select class="am-form-field" id="stype">
                    <option value="opt1">刊名</option>
                    <option value="opt2">ISSN</option>
                    <option value="opt3">ISBN</option>
                </select>
                <input type="hidden" id="type" value="<?php echo $type; ?>">
            </div>
            <div class="am-form-group">
                <button type="button" class="am-btn am-btn-success" onclick="searchs(1)">搜一下</button>
            </div>
        </form>
    </div>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
    <div class="am-g">
        <div class="am-u-lg-8">
            <div id="tip">本类目下共有刊物 <span id="counts"></span> 种 (<span class="am-kai" id="setime">本次搜索用时 0s</span>)</div>
            <section data-am-widget="accordion" id="publist" class="am-accordion am-accordion-basic" data-am-accordion='{  }'>
            </section>
            <div style="margin-top:30px" id="showpage">
                <ul id="page" class="am-pagination"><?php echo $page; ?></ul>
            </div>
        </div>
        <div class="am-u-lg-3 am-u-lg-offset-1"></div>
    </div>
    <script id="entry-template" type="text/x-handlebars-template">
        {{#each this}}
        <dl class="am-accordion-item">
            <dt class="am-accordion-title am-text-truncate">{{sourcename}}</dt>
            <dd class="am-accordion-bd am-collapse ">
                <div class="am-accordion-content">
                    馆藏单位：{{collectiontunit}}
                    <br/> 标准书号(ISBN)：{{isbn}}
                    <br/> 国际标准连续出版物号(ISSN)：{{issn}}
                    <br/> 刊名识别代码(CODEN码)：{{coden}}
                    <br/> 国内统一连续出版物号(CN号)：{{cnnumber}}
                    <br/> 出版单位名称：{{pubunit}}
                    <br/> 出版单位通信地址：{{pubaddress}}
                    <br/> 会议地址：{{confaddress}}
                    <br/> 会议时间：{{confdate}}
                    <br/> 母体文献责任者：{{sourceresponsible}}
                    <br/>
                    <a href="<?php echo Url('Index/plist'); ?>?sid={{s_id}}" target="_blank">[查看相关文档]</a>
                    <br/>
                </div>
            </dd>
        </dl>
        {{/each}}
    </script>
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
    <script src="<?php echo \think\Config::get('js_path'); ?>jqPaginator.min.js"></script>
    <script>
    <!--
    $(document).ready(function() {
        $.AMUI.progress.configure({
            parent: "#footer"
        });
        showpage(1, 1);
    });

    function searchs(cpage) {
        $.AMUI.progress.start();
        $.post("<?php echo Url('publication/index'); ?>", {
            pname: $('#pname').val(),
            stype: $('#stype').val(),
            type: $('#type').val(),
            cpage: cpage
        }, function(data, status) {
            if (status == 'success') {
                var myTemplate = Handlebars.compile($('#entry-template').html());
                $('#publist').html(myTemplate(data.res));
                $('#setime').html("本次搜索用时" + data.times);
                $('#counts').html(data.counts);
                //重新初始化折叠事件
                $.AMUI.accordion.init();
                //重置分页属性
                $('#page').jqPaginator('option', {
                    totalPages: data.tpage,
                    currentPage: cpage
                });
            }
            $.AMUI.progress.done();
        });
    }

    //分页显示
    function showpage(currentPage, totalPages) {
        $("#page").jqPaginator({
            totalPages: totalPages,
            visiblePages: 8,
            currentPage: currentPage,
            first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
            prev: '<li class="prev"><a href="javascript:void(0);"><i class="arrow arrow2"><\/i>上一页<\/a><\/li>',
            next: '<li class="next"><a href="javascript:void(0);">下一页<i class="arrow arrow3"><\/i><\/a><\/li>',
            last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
            page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
            onPageChange: function(cpage) {
                searchs(cpage);
            }
        });
    }
    //-->
    </script>
</body>

</html>
