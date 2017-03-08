<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"U:\phpStudy_A\WWW/search/admin\view\index\special.html";i:1486971929;s:54:"U:\phpStudy_A\WWW/search/admin\view\public\header.html";i:1479391973;s:56:"U:\phpStudy_A\WWW/search/admin\view\Public\usidebar.html";i:1486971647;s:54:"U:\phpStudy_A\WWW/search/admin\view\Public\footer.html";i:1479392056;}*/ ?>
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
.logoimg{ margin: 30px 0; width:100%; text-align: center;}
.searchinput{ margin-top:50px; width: 500px;}
.imglist{ margin-top:20px; width: 500px; }
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
				</ul>
			</li>
			<li class="am-dropdown" data-am-dropdown>
				<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文献管理 <span class="am-icon-caret-down"></span></a>
				<ul class="am-dropdown-content">
					<li><a href="<?php echo Url('index/publist'); ?>">刊物管理</a></li>
					<li><a href="<?php echo Url('index/article'); ?>">文章管理</a></li>
				</ul>
			</li>
			<li class="am-dropdown" data-am-dropdown>
				<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">来源管理 <span class="am-icon-caret-down"></span></a>
				<ul class="am-dropdown-content">
					<li><a href="<?php echo Url('index/datalist'); ?>">来源列表</a></li>
					<li><a href="<?php echo Url('index/dataadd'); ?>">添加来源</a></li>
				</ul>
			</li>
			<li class="am-dropdown" data-am-dropdown>
				<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">用户管理 <span class="am-icon-caret-down"></span></a>
				<ul class="am-dropdown-content">
					<li><a href="<?php echo Url('index/userlist'); ?>">用户列表</a></li>
					<li><a href="<?php echo Url('index/useradd'); ?>">用户添加</a></li>
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
		<table class="am-table am-table-striped am-table-hover">
			<tbody id="container">
			</tbody>
		</table>
		<div class="am-g" style="margin-top:30px" id="showpage">
			<ul id="page" class="am-pagination"><?php echo $page; ?></ul>
		</div>
	</div>
</div>
<script id="template01" type="text/x-handlebars-template">
    {{#each this}}
    <tr>
	    <td>
	    	<a class="am-fl" href="javascript:void(0);" onclick="">{{sname}}</a> 
	    </td>
	    <td class="am-text-center" width="150px">
	    	<a href="javascript:void(0);" onclick="edit({{id}})">编辑</a>
	    	<a href="javascript:void(0);" onclick="delete({{id}})">删除</a>
	    	<a href="javascript:void(0);" onclick="update({{id}})">更新</a>
	    </td>
    </tr>
    {{/each}}
</script>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
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
$(document).ready(function(){
	$.AMUI.progress.configure({ parent: "#footer" });	
	showpage(1,1);
});

function postdata(cpage){
	$.AMUI.progress.start();
	$.post('<?php echo Url('special/slist'); ?>',{
		uid: '',
		cpage: cpage
	},function(data,status){
		if(status=='success'){
			var myTemplate01 = Handlebars.compile($('#template01').html());
			$('#container').html(myTemplate01(data.res));
		} else {
			$('#container').html('没有检索数据');
			data.tpage = 1;
		}
		//重置分页属性
		$('#page').jqPaginator('option', {
			totalPages: data.tpage,
			currentPage: cpage
		});
		$.AMUI.progress.done();
	});
}

//分页显示
function showpage(currentPage,totalPages){
	$("#page").jqPaginator({
		totalPages: totalPages,
		visiblePages: 8,
		currentPage: currentPage,
		first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
		prev: '<li class="prev"><a href="javascript:void(0);"><i class="arrow arrow2"><\/i>上一页<\/a><\/li>',
		next: '<li class="next"><a href="javascript:void(0);">下一页<i class="arrow arrow3"><\/i><\/a><\/li>',
		last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
		page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
		onPageChange: function(cpage){
			postdata(cpage);
		}
	});
}
//-->
</script>
</body>
</html>