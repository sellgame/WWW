<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"U:\phpStudy_A\WWW/search/index\view\index\searchs.html";i:1480572027;s:54:"U:\phpStudy_A\WWW/search/index\view\public\header.html";i:1479391973;s:55:"U:\phpStudy_A\WWW/search/index\view\Public\sidebar.html";i:1479393192;s:54:"U:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1479392056;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>国外军事电子知识库</title>
<link href="<?php echo \think\Config::get('css_path'); ?>amazeui.min.css" rel="stylesheet" />

<style type="text/css">
	#artgroup{ padding: 15px 5px; word-break: break-all; }
	#artgroup a{ font-size:18px; height:40px; line-height:50px; padding-right:10px; }
	#artgroup a:hover{ color:#F00; text-decoration:underline; }
	#artgroup .tags0{color: #1b961b; font-size: 26px; }
    #artgroup .tags1{color: #0b6fa2; font-size: 24px}
    #artgroup .tags2{color: #a4241f; font-size: 22px; }
    #artgroup .tags3{color: #c10802; font-size: 20px}
    #artgroup .tags4{color: #ffbe40; font-size: 18px; font-weight:bold; }
    #artgroup .tags5{color: darksalmon; font-size: 16px}
    #artgroup .tags6{color: darkorchid; font-size: 14px}
    #artgroup .tags7{color: #0c7cb5; font-size: 12px; font-weight:bold; }
    #artgroup .tags8{color: #eda4a2; font-size: 16px}
    #artgroup .tags9{color: black; font-size: 20px; font-weight:bold; }
	#grouplist a{ height:26px; line-height:26px; padding-left: 10px; padding-right: 10px; }
	#grouplist a:hover{ color:#F00; text-decoration:underline; }
	.huanle{ position: relative; top: -10px; left: 0px;	/*徽标位置*/
</style>
</head>
<noscript unselectable="on" id="noscript">
	<div class="aw-404 aw-404-wrap container">
		<img src="<?php echo IMG; ?>no-js.jpg">
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
			<li><a href="<?php echo Url('Index/index'); ?>">首页</a></li>
			<li><a href="<?php echo Url('Publication/index'); ?>?type=J">期刊文献</a></li>
			<li><a href="<?php echo Url('Publication/index'); ?>?type=C">会议文献</a></li>
			<li><a href="<?php echo Url('Publication/index'); ?>?type=R">科技报告</a></li>
			<li><a href="<?php echo Url('Publication/index'); ?>?type=D">学位论文</a></li>
			<li class="am-dropdown" data-am-dropdown>
				<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">其他分类 <span class="am-icon-caret-down"></span></a>
				<ul class="am-dropdown-content">
					<li><a href="<?php echo Url('Publication/index'); ?>?type=G">汇编文献</a></li>
					<li><a href="<?php echo Url('Publication/index'); ?>?type=S">技术标准</a></li>
					<li><a href="<?php echo Url('Publication/index'); ?>?type=P">专利文献</a></li>
					<li><a href="<?php echo Url('Publication/index'); ?>?type=M">专著文献</a></li>
					<li><a href="<?php echo Url('Publication/index'); ?>?type=K">参考工具</a></li>
				</ul>
			</li>
			<li class="am-dropdown" data-am-dropdown>
				<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">文摘数据 <span class="am-icon-caret-down"></span></a>
				<ul class="am-dropdown-content">
					<li><a href="<?php echo Url('Article/clist'); ?>?cid=12">NTIS</a></li>
					<li><a href="<?php echo Url('Article/clist'); ?>?cid=13">INSPEC</a></li>
					<li><a href="<?php echo Url('Article/clist'); ?>?cid=14">EI</a></li>
					<li><a href="<?php echo Url('Article/clist'); ?>?cid=15">AERO</a></li>
					<li><a href="<?php echo Url('Article/clist'); ?>?cid=16">电子科技文摘</a></li>
				</ul>
			</li>
		</ul>
		<div class="am-topbar-right">
			<ul class="am-nav am-nav-pills am-topbar-nav">
				<li class="am-dropdown" data-am-dropdown>
				<?php switch($username): case "": ?>
					<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">登陆/注册 <span class="am-icon-caret-down"></span></a>
					<ul class="am-dropdown-content" id="userlist">
						<li><a href="<?php echo Url('UserCenter/Login/uin'); ?>">用户登陆</a></li>
						<li><a href="<?php echo Url('UserCenter/Login/reg'); ?>">用户注册</a></li>
					</ul>
					<?php break; default: ?>
					<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;" id="usercenter">会员：<?php echo $username; ?> <span class="am-icon-caret-down"></span></a>
					<ul class="am-dropdown-content" id="userlist">
						<li><a href="<?php echo Url('UserCenter/Login/uinfo'); ?>">个人信息</a></li>
						<li><a href="<?php echo Url('UserCenter/Index/index'); ?>">用户中心</a></li>
						<li><a href="<?php echo Url('UserCenter/Login/uout'); ?>">退出登录</a></li>
					</ul>
				<?php endswitch; ?>
				</li>
			</ul>
		</div>
	</div>
</header>
<div class="am-g" style="margin: 20px 0;">
    <form class="am-form-inline" role="form" action="<?php echo Url('Search/index'); ?>">
		<div class="am-form-group">
			<span style="margin-left:10px; margin-right:20px"><img src="<?php echo \think\Config::get('img_path'); ?>logo-bar.png"></span>
		</div>	
		<div class="am-form-group">
			<input type="text" class="am-form-field am-form-success" style="width:400px" name="keys" placeholder="请输入关键词">
			<input type="hidden" id="okeys" value="<?php echo $keys; ?>">
			<input type="hidden" id="year" name="year" value="<?php echo $year; ?>">
			<input type="hidden" id="issue" name="issue" value="<?php echo $issue; ?>">
		</div>
		<div class="am-form-group">
			<button type="submit" class="am-btn am-btn-success">搜一下</button>
		</div>
    </form>
</div>

<hr data-am-widget="divider" style="" class="am-divider am-divider-default" />

<div class="am-g">
	<div class="am-u-lg-8">
		<div id="tip">相关匹配文献 <span id="counts"></span> 篇 (<span class="am-kai" id="setime">本次搜索用时<?php echo $data['times']; ?></span>)</div>
		<section data-am-widget="accordion" id="alist" class="am-accordion am-accordion-basic" data-am-accordion='{  }'>
		
		</section>
		<div style="margin-top:30px" id="showpage">
			<ul id="page" class="am-pagination"><?php echo $page; ?></ul>
		</div>
	</div>
	<div class="am-u-lg-3 am-u-lg-offset-1" id="year">
		<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
            <h2 class="am-titlebar-title ">分组浏览</h2>
        </div>
        <div class="am-gp" id="artgroup"></div>
	</div>
</div>
<div id="yvilist">
</div>

<script id="entry-template" type="text/x-handlebars-template">
    {{#each this}}
    <dl class="am-accordion-item">
        <dt class="am-accordion-title am-text-truncate">{{mtitle}}</dt>
        <dd class="am-accordion-bd am-collapse ">
            <div class="am-accordion-content">
                并列题名：{{stitle}} <br/>
                个人著者：{{authors}} <br/>
                个人著者单位：{{authorunit}} <br/>
                <a href="<?php echo Url('article'); ?>?id={{docid}}" target="_blank">[查看文档详细信息]</a> <br/>
            </div>
        </dd>
    </dl>
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
	var myTemplate = Handlebars.compile($('#entry-template').html());
	$('#alist').html(myTemplate(<?php echo $data['res']; ?>));
	showpage(1,<?php echo $data['tpage']; ?>);
});

function searchs(cpage){
	$.AMUI.progress.start();
	$.post("<?php echo Url('searchs'); ?>",{
		keys: $('#okeys').val(),
		p: cpage,
		year: $('#year').val(),
		issue: $('#issue').val()
	},function(data,status){
		if(status=='success'){
			var myTemplate = Handlebars.compile($('#entry-template').html());
			$('#alist').html(myTemplate(data.data));
			$('#setime').html("本次搜索用时"+data.setime);
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

function groupby(){
	$('#artgroup').html('<img class="am-img-responsive" src="<?php echo \think\Config::get('img_path'); ?>loading.gif">');
	$.post('<?php echo Url('groupby'); ?>',{
		cid: $('#cid').val(),
		sid: $('#sid').val(),
		keys: $('#okeys').val(),
		dtype: $('#dtype').val()
	},function(data,status){
		if(status=='success'){
			var artgroups = '';
			var grouplist = '';
			var c=0;
			if($('#dtype').val()=='J'){
				var x = 9;
                var y = 0;
				for(i in data){
					var rand = parseInt(Math.random() * (x - y + 1) + y);
					artgroups = artgroups + '<a href="javascript:void(0)" class="tags'+rand+'" data-am-modal="{target: \'#popup'+i+'\'}">' + i  + '</a>';
					var yi=1;
					var tempstr = "";
					for(n in data[i]){
						tempstr = tempstr + ' [<a href="javascript:void(0)" onclick="isearch(\''+ i +'\',\''+ data[i][n].issues +'\')">' + i + '年-' + data[i][n].issue + '期</a>] ';
						if(yi%3==0 && yi>2){
							tempstr = tempstr + '<br>';
						}
						yi++;
					}
					grouplist = grouplist + '<div class="am-modal am-modal-alert" tabindex="-1" id="popup'+ i +'">';
                    grouplist = grouplist + '   <div class="am-modal-dialog">';
                    grouplist = grouplist + '       <div class="am-modal-hd">';
                    grouplist = grouplist + '           <h4 class="am-popup-title">'+ i +' 年相关卷期</h4>';
                    grouplist = grouplist + '       </div>';
                    grouplist = grouplist + '       <div class="am-modal-bd" id="grouplist">';
                    grouplist = grouplist + tempstr;
                    grouplist = grouplist + '       </div>';
                    grouplist = grouplist + '       <div class="am-modal-footer">';
                    grouplist = grouplist + '           <span class="am-modal-btn">确定</span>';
                    grouplist = grouplist + '       </div>';
                    grouplist = grouplist + '   </div>';
                    grouplist = grouplist + '</div>'; 
				}
			} else {
				for(i in data){
					artgroups = artgroups + '<a href="javascript:void(0)" onclick="ysearch('+ data[i].year +')">' + data[i].year + '<span class="am-badge am-badge-success am-round huanle">'+ data[i].count +'</span></a>';
					c++;
					if(c%2==0) artgroups = artgroups + '<br>';
				}
			}
			$('#artgroup').html(artgroups);
			$('#yvilist').html(grouplist);
		} else{
			$('#artgroup').html('没有分类信息');
		}
	});
}

function ysearch(year){
	$('#year').val(year);
	searchs(1);
}

function isearch(year,issue){
	$('#year').val(year);
	$('#issue').val(issue);
	var $modal = $('#popup' + year);
    $modal.modal('close');
	searchs(1);
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
			//searchs(cpage);
		}
	});
}
//-->
</script>
</body>
</html>