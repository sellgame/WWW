<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"U:\phpStudy_A\WWW/search/index\view\index\downpdf.html";i:1485140515;s:54:"U:\phpStudy_A\WWW/search/index\view\public\header.html";i:1479391973;s:54:"U:\phpStudy_A\WWW/search/index\view\Public\footer.html";i:1479392056;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>国外军事电子知识库</title>
<link href="<?php echo \think\Config::get('css_path'); ?>amazeui.min.css" rel="stylesheet" />

<div class="am-g" style="margin: 20px 20px;">
	<p> 本期共有 <span id="counts"></span> 篇，请使用下载软件批量下载</p>
	<span id="pdflist"></span>
</div>
<script id="entry-template" type="text/x-handlebars-template">
    {{#each this}}
    <a href="<?php echo \think\Config::get('downpath'); ?>{{filepath}}">{{filename}}</a><br>
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
<script>
<!--
$(document).ready(function(){
	$.AMUI.progress.configure({ parent: "#footer" });	
	searchs();
});
function searchs(){
	$.AMUI.progress.start();
	$.post("<?php echo Url('publication/downpdf'); ?>",{
		sid: <?php echo $sid; ?>,
		year: <?php echo $year; ?>,
		issue: '<?php echo $issue; ?>'
	},function(data,status){
		if(status=='success'){
			var myTemplate = Handlebars.compile($('#entry-template').html());
			$('#pdflist').html(myTemplate(data.res));
			$('#counts').html(data.counts);
		}
		$.AMUI.progress.done();
	});
}
//-->
</script>
</body>
</html>