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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><form action="<?php echo u(MODULE_NAME.'/'.ACTION_NAME);?>" method="post" name="myform" id="myform" style="margin-top:10px;"><div class="pad-10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">执行sql</li></ul><div id="div_setting_1" class="contentList pad-10"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><textarea id="execSql" style="width:100%; font-size:13px; height:212px; line-height:18px;"></textarea></td><td width="10">&nbsp;
        					
        				</td><td width="260" valign="top"><select name="table_name" id="tableName" multiple="multiple" style="width:100%; font-size:13px; height:212px; line-height:18px;"><?php if(is_array($tables)): foreach($tables as $key=>$table): ?><option value="<?php echo ($table); ?>"><?php echo ($table); ?></option><?php endforeach; endif; ?></select></td></tr></table></div><div class="btn"><input type="button" value="执行" id="runQuery" name="dosubmit" class="button"><span style="color: red;">查询数据库请谨慎使用！</span></div></div></div></form><fieldset id="queryBox" style="margin:10px;"><legend>数据库查询结果 <strong class="blue" id="resultNum"></strong></legend><div id="sqlResult" style="margin:10px;"></div></fieldset><script type="text/javascript">jQuery(function($){
	$("#runQuery").click(function(){
		var sql = $.trim($("#execSql").val());
		if(sql == '')
			return;
		
		$("#runQuery").attr({"disabled":true});
		$.ajax({
			url: "<?php echo U('database/doExecute');?>",
            type:"POST",
			cache: false,
			data:{"sql":sql},
			dataType:"json",
			success: function(result){
				$("#resultNum").html(result.info);
				$("#sqlResult").html(result.html);
				$("#runQuery").attr({"disabled":false});
			},
			error:function(){
				$("#runQuery").attr({"disabled":false});	
			}
		});
	});
	
	$("#tableName").dblclick(function(){
		var sql = $("#execSql").val();
		$("#execSql").val(sql + ' ' + this.value);
	});
});
</script></body></html>