<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"U:\phpStudy_A\WWW/search/index\view\index\article.html";i:1488156855;s:54:"U:\phpStudy_A\WWW/search/index\view\public\header.html";i:1488156917;s:55:"U:\phpStudy_A\WWW/search/index\view\Public\sidebar.html";i:1488156923;s:54:"U:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1488156911;}*/ ?>
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
        <div class="am-u-lg-8">
            <div id="tip"></div>
            <article class="am-article" id="article">
                <div class="am-article-hd">
                    <h1 class="am-article-title"><?php echo $data['mtitle']; ?></h1>
                    <notempty name="data.stitle">
                        <blockquote>
                            <p>副标题：<?php echo $data['stitle']; ?></p>
                        </blockquote>
                    </notempty>
                    <p class="am-article-meta">出版时间：
                        <notempty name="data.year"><?php echo $data['year']; ?> 年</notempty>
                        <notempty name="data.vol"><?php echo $data['vol']; ?> 卷</notempty>
                        <notempty name="data.issue"><?php echo $data['issue']; ?> 期</notempty>
                    </p>
                    <p class="am-article-meta">个人著者：<?php echo $data['authors']; ?></p>
                    <p class="am-article-meta">个人著者单位：<?php echo $data['authorunit']; ?></p>
                    <notempty name="data.corporateauthor">
                        <p class="am-article-meta">团体著者：<?php echo $data['corporateauthor']; ?></p>
                    </notempty>
                </div>
                <div class="am-article-bd">
                    <h1 class="am-article-lead">文档摘要：<br/><?php echo $data['abstracts']; ?></h1>
                    <notempty name="data.filepath">
                        <blockquote>
                            <p>查看全文：<a href="javascript:void(0)" onclick="downs('<?php echo $data['docid']; ?>','<?php echo \think\Config::get('downpath'); ?><?php echo $data['filepath']; ?>');"><?php echo $data['filename']; ?></a>&nbsp;&nbsp;( <?php echo $data['filesize']; ?> ) &nbsp;&nbsp;<a data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 200, height: 200}">移动下载</a></p>
                        </blockquote>
                    </notempty>
                    <hr class="am-article-divider" />
                    <p class="am-article-meta">主题词：<?php echo $data['keyword']; ?></p>
                    <p class="am-article-meta">自由词：<?php echo $data['freeword']; ?></p>
                    <p class="am-article-meta">注释：<?php echo $data['notes']; ?></p>
                    <p class="am-article-meta">DOI号：<?php echo $data['doi']; ?></p>
                    <hr class="am-article-divider" />
                    <p class="am-article-meta">母体文献(主)：<?php echo $data['sourcename']; ?></p>
                    <notempty name="data.sourcename_a">
                        <p class="am-article-meta">母体文献(副)：<?php echo $data['sourcename_a']; ?></p>
                    </notempty>
                    <notempty name="data.pubdate">
                        <p class="am-article-meta">出版时间：<?php echo $data['pubdate']; ?></p>
                    </notempty>
                    <notempty name="data.pubaddress">
                        <p class="am-article-meta">出版商：<?php echo $data['pubaddress']; ?></p>
                    </notempty>
                    <notempty name="data.confaddress">
                        <p class="am-article-meta">会议地点：<?php echo $data['confaddress']; ?></p>
                    </notempty>
                    <notempty name="data.confdate">
                        <p class="am-article-meta">会议时间：<?php echo $data['confdate']; ?></p>
                    </notempty>
                    <hr class="am-article-divider" />
                    <p class="am-article-meta">其他信息1：<?php echo $data['temp01']; ?></p>
                    <p class="am-article-meta">其他信息2：<?php echo $data['temp02']; ?></p>
                    <p class="am-article-meta">其他信息3：<?php echo $data['temp03']; ?></p>
                    <p class="am-article-meta">其他信息4：<?php echo $data['temp04']; ?></p>
                    <p class="am-article-meta">其他信息5：<?php echo $data['temp05']; ?></p>
                    <p class="am-article-meta">其他信息6：<?php echo $data['temp06']; ?></p>
                    <p class="am-article-meta">其他信息7：<?php echo $data['temp07']; ?></p>
                    <p class="am-article-meta">其他信息8：<?php echo $data['temp08']; ?></p>
                    <p class="am-article-meta">其他信息9：<?php echo $data['temp09']; ?></p>
                </div>
            </article>
        </div>
        <div class="am-u-lg-4"> </div>
    </div>
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">微信扫描二维码
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
                <img src="<?php echo url('qrcode',['text'=>$text]); ?>">
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
    function downs(docid, filepath) {
        $.post("<?php echo URL('record/adowns'); ?>", {
            did: docid
        }, function(data, status) {
            if (data == 'success') parent.window.location = filepath;
        });
    }
    //-->
    </script>
</body>

</html>
