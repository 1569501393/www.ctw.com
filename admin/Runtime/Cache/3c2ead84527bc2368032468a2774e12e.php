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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><div class="pad_10"><form action="<?php echo u('seller_list/insert');?>" method="post" name="myform" id="myform" enctype="multipart/form-data"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="80"><?php echo L('name');?> :</th><td><input type="text" name="name" id="name" class="input-text"></td></tr><tr><th width="80"><?php echo L('cash_back_rate');?> :</th><td><input type="text" name="cash_back_rate" id="cash_back_rate" class="input-text"></td></tr><tr><th><?php echo L('site_logo');?> : </th><td><input type="file" name="img" id="img" class="input-text" size=21 /></td></tr><tr><th><?php echo L('net_logo');?> :</th><td><input class="input-text" type="text" name="net_logo" class="input-text" style="width:400px;" value=""/></td></tr><tr><th><?php echo L('url');?> :</th><td><input type="text" name="click_url"  id="click_url" class="input-text" style="width:400px;" value="" /></td></tr><tr><th><?php echo L('recommend');?> :</th><td><input type="radio" name="recommend" class="radio_style" value="1" checked="checked" > &nbsp;是&nbsp;&nbsp;&nbsp;
    		<input type="radio" name="recommend" class="radio_style" value="0"> &nbsp;否
		</td></tr><tr><th><?php echo L('sort');?> :</th><td><input type="text" name="sort" id="sort" class="input-text"></td></tr><tr><th><?php echo L('description');?> :</th><td><textarea name="description" style="width:400px; height:120px;"></textarea></td></tr><tr><th class="text_right"><?php echo L('services');?> :</th><td class="text_left">			&nbsp;<input type="checkbox" name="freeshipment" value="1" />			免费送货&nbsp;
			<input type="checkbox" name="installment" value="1" />			分期付款&nbsp;
			<input type="checkbox" name="has_invoice" value="1" />			&nbsp;有发票  	
		</td></tr><tr><th class="text_right">所属分类 :</th><td class="text_left"><?php echo ($cate_str); ?></td></tr><tr><th><?php echo L('state');?> :</th><td><input type="radio" name="status" class="radio_style" value="1" checked="checked" > &nbsp;有效&nbsp;&nbsp;&nbsp;
        <input type="radio" name="status" class="radio_style" value="0"> &nbsp;禁用
      </td></tr></table><input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" "></form><script type="text/javascript">	$(function(){
		$.formValidator.initConfig({
			formid:"myform",
			autotip:true,
			onerror:function(msg,obj){
				window.top.art.dialog({
					content:msg,
					lock:true,
					width:'200',
					height:'50'},
					 function()
					 {
					 	this.close();
						$(obj).focus();
					 })
		}});		
		
		$("#name").formValidator({
			onshow:"不能为空",onfocus:"不能为空"
		}).inputValidator({
			min:1,onerror:"请填写分类名称"
		});
	})
</script></div></body></html>