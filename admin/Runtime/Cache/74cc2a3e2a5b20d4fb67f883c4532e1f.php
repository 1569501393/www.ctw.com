<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><link href="__ROOT__/statics/admin/css/style.css" rel="stylesheet" type="text/css"/><link href="__ROOT__/statics/css/dialog.css" rel="stylesheet" type="text/css" /><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidator.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidatorregex.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/admin/js/admin_common.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/dialog.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/iColorPicker.js"></script><script language="javascript">var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var APP	 =	 '__APP__';
var lang_please_select = "<?php echo (L("please_select")); ?>";
var def=<?php echo ($def); ?>;
$(function($){
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
});

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><style type="text/css">.contentList table tr td input {
    margin: 0 5px 0 10px;
}
.contentList table{
	margin:15px 0px;
}
</style><form action="<?php echo u('banspider/update');?>" method="post" name="myform" id="myform" style="margin-top:10px;"><div class="pad-10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">屏蔽蜘蛛</li></ul><div id="div_setting_1" class="contentList pad-10"><div style="padding:10px; overflow:hidden;"><div class="main_top" style="clear:both;"><h4>温馨提示:</h4><p class="green">屏蔽对应的搜索引擎只要选中对应的搜索引擎即可 。</p><p class="green">屏蔽对应的搜索引擎后，对应的搜索引擎将没法访问你的网站。 </p></div></div><table class="banip"><tr><td class="left"><p>选择屏蔽的蜘蛛名称：<br></p></td><td class="right"><input type="checkbox" name="ban_spider[]" value="baiduspider">百度<input type="checkbox" name="ban_spider[]" value="googlebot">谷歌<input type="checkbox" name="ban_spider[]" value="sogou">搜狗<input type="checkbox" name="ban_spider[]" value="sosospider">腾讯SOSO<input type="checkbox" name="ban_spider[]" value="slurp">雅虎<input type="checkbox" checked="checked" name="ban_spider[]" value="youdaobot">有道<input type="checkbox" checked="checked" name="ban_spider[]" value="bingbot">Bing<input type="checkbox" name="ban_spider[]" value="msnbot">MSN<input type="checkbox" name="ban_spider[]" value="ia_archiver">Alexa
						</td></tr></table></div><div class="btn"><input type="submit" value="执行" id="runQuery" name="dosubmit" class="button"></div></div></div></form></body></html>