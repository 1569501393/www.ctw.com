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
</style><script type="text/javascript">	function insertText(id, text){
		var contents = $('#'+id).val();
		if(contents) text = "\r\n"+text;
		$('#'+id).focus();
		$('#'+id).val(contents + text);
	}
</script><form action="<?php echo u('banip/update');?>" method="post" name="myform" id="myform" style="margin-top:10px;"><div class="pad-10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">屏蔽蜘蛛</li></ul><div id="div_setting_1" class="contentList pad-10"><div style="padding:10px; overflow:hidden;"><div class="main_top" style="clear:both;"><h4>温馨提示:</h4><p class="green">如不了解此功能请不要开启, 请把文本框保留为空! </p><p class="green">点击左边示例, 可以查看屏蔽IP输入格式.</p><p class="green">每输入一个ip地址或者地址段的时候一回车分割.</p><p class="green">如果想删除屏蔽，删除文本框的对应蜘蛛即可。</p></div></div><table style="margin-left:40px;"><tr><td class="left"><p>填写屏蔽的IP地址</p><p>一行一组IP地址</p><br/><font class="red">点击查看示例：</font><br/><u class="cu" title="直接填写单个IP" onclick="insertText('banip', '127.0.0.2')">屏蔽单个IP</u>							|
							<u class="cu" title="用“-”分隔IP范围" onclick="insertText('banip', '123.123.123.5-123.123.123.18')">屏蔽IP范围</u></td><td class="right"><textarea name="ban_content" rows="16" cols="40" id="banip"><?php echo ($banip); ?></textarea></td></tr><tr><th></th><td><input class="submit" type="submit" value="提交" name="send" style="margin-top:10px;" /></td></tr></table></div><div class="btn"><input type="submit" value="执行" id="runQuery" name="dosubmit" class="button"></div></div></div></form></body></html>