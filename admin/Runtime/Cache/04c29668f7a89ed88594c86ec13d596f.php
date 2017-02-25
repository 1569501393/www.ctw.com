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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><form action="<?php echo u('exchange_goods/insert');?>" method="post" name="myform" id="myform" enctype="multipart/form-data" style="margin-top:10px;"><div class="pad_10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);"><?php echo (L("general_info")); ?></li><!--li id="tab_setting_2" onclick="SwapTab('setting','on','',2,2);"><?php echo (L("article_seo")); ?></li--></ul><div id="div_setting_1" class="contentList pad-10"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="150"><?php echo L('name');?> :</th><td><input type="text" class="textinput requireinput" name="name" id="name" value="" size="80"/></td></tr><tr><th><?php echo L(goods_type);?> :</th><td><select name="goods_type"><option value="1"><?php echo L(goods_type_0);?></option><option value="2"><?php echo L(goods_type_1);?></option></select></td></tr><tr><th><?php echo L('img');?> :</th><td><input type="file" name="img" id="img" class="input-text" size=21 /></td></tr><tr><th><?php echo L('integral');?> :</th><td><input type="text" class="textinput" name="integral" id="integral" value="10" /></td></tr><tr><th><?php echo L('stock');?> :</th><td><input type="text" class="textinput" name="stock" id="stock" value="1" /></td></tr><tr><th><?php echo L('user_num');?> :</th><td><input type="text" class="textinput" name="user_num" id="user_num" value="1" /></td></tr><tr><th><?php echo L('is_best');?> :</th><td><label><input type="radio" name="is_best" value="1"><?php echo L('yes');?></label>　
					<label><input type="radio" name="is_best" value="0" checked="checked"><?php echo L('no');?></label></td></tr><tr><th><?php echo L('begin_time');?> :</th><td><link rel="stylesheet" type="text/css" href="__ROOT__/statics/js/calendar/calendar-blue.css"/><script type="text/javascript" src="__ROOT__/statics/js/calendar/calendar.js"></script><input class="date input-text" type="text" name="begin_time" id="begin_time" size="18" value="" /><script language="javascript" type="text/javascript">	                    Calendar.setup({
	                        inputField     :    "begin_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script></td></tr><tr><th><?php echo L('end_time');?> :</th><td><input class="date input-text" type="text" name="end_time" id="end_time" size="18" value="" /><script language="javascript" type="text/javascript">	                    Calendar.setup({
	                        inputField     :    "end_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script></td></tr><tr><th><?php echo L('sort');?> :</th><td><input type="text" class="textinput" name="sort" size="10" value="100" /></td></tr><tr><th><?php echo L('state');?> :</th><td><input type="radio" name="status" class="radio_style" value="1" checked="checked" > &nbsp;有效&nbsp;&nbsp;&nbsp;
		        <input type="radio" name="status" class="radio_style" value="0"> &nbsp;禁用
		      </td></tr><tr><th><?php echo L('content');?> :</th><td><script type="text/javascript" src="__ROOT__/includes/kindeditor/kindeditor.js"></script><script type="text/javascript" src="__ROOT__/includes/kindeditor/lang/zh_CN.js"></script><script> var editor; KindEditor.ready(function(K) { editor = K.create('#content');});</script><textarea id="content" style="width:68%;height:50px;" name="content" ></textarea></td></tr></table></div><div id="div_setting_2" class="contentList pad-10 hidden"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100"><?php echo (L("seo_title")); ?> :</th><td><input type="text" name="seo_title" id="seo_title" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_keys")); ?> :</th><td><input type="text" name="seo_keys" id="seo_keys" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_desc")); ?> :</th><td><textarea name="seo_desc" id="seo_desc" cols="80" rows="8"></textarea></td></tr></table></div><div class="btn"><input type="submit" value="<?php echo (L("submit")); ?>" name="dosubmit" class="button" id="dosubmit"></div></div></div></form><script type="text/javascript">	function SwapTab(name,cls_show,cls_hide,cnt,cur){
    for(i=1;i<=cnt;i++){
		if(i==cur){
				 $('#div_'+name+'_'+i).show();
				 $('#tab_'+name+'_'+i).attr('class',cls_show);
			}else{
				 $('#div_'+name+'_'+i).hide();
				 $('#tab_'+name+'_'+i).attr('class',cls_hide);
			}
		}
	}
	
	$(function(){
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
			onshow:"不能为空",onfocus:"标题不能为空哦"
		}).inputValidator({
			min:1,onerror:"请输入商品名称"
		});	
		$("#integral").formValidator({onshow:"请输入积分（1-100000）",onfocus:"只能输入1-100000之间的数字哦",oncorrect:"恭喜你,输入正确"}).inputValidator({min:1,max:100000,type:"value",onerrormin:"你输入的值必须大于等于1",onerror:"积分必须在1-100000之间，必须是数字，请确认"}).defaultPassed();
		$("#stock").formValidator({onshow:"请输入库存（0-100000的数字）",onfocus:"只能输入0-100000之间的数字哦",oncorrect:"恭喜你,输入正确"}).inputValidator({min:0,max:100000,type:"value",onerrormin:"你输入的值必须大于等于0",onerror:"库存必须在0-100000之间，必须是数字，请确认"}).defaultPassed();
		$("#user_num").formValidator({onshow:"请输入（1-100000的数字）",onfocus:"只能输入1-100000之间的数字哦",oncorrect:"恭喜你,输入正确"}).inputValidator({min:1,max:100000,type:"value",onerrormin:"你输入的值必须大于等于1",onerror:"每人限兑必须在1-100000之间，必须是数字，请确认"}).defaultPassed();
				
	})
</script></body></html>