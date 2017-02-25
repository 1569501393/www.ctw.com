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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><form action="<?php echo u('items_cate/'.ACTION_NAME);?>" method="post" name="myform" id="myform"  enctype="multipart/form-data" style="margin-top:10px;"><div class="pad-10"><div style="padding:10px; overflow:hidden;"><div class="main_top" style="clear:both;"><h4>添加时请仔细阅读下面文字：</h4><p class="green">1.分类名称为前台显示的分类</p><p class="green">			2.关键字为同步数据的时候的调取关键词			
			</p><p>				3.<span style="color:red;">关键字可以不填写，不填写关键字将和分类名称保持一致，如果填写关键字，关键字顺序要和分类顺序保持一致</span></span></p><p>4.多个关键词以回车分割开</p></div></div><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">批量添加</li></ul><div id="div_setting_1" class="contentList pad-10"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th></th><td><input type="hidden" name="id" class="input-text" value="<?php echo ($items_cate_info["id"]); ?>"></td></tr><tr><th><?php echo L('pid');?>：</th><td><select name="pid" style="width:150px;"><option value="0" <?php if($items_cate_info["pid"] == 0): ?>selected="selected"<?php endif; ?>>--顶级分类--</option><?php if(is_array($items_cate_list)): $i = 0; $__LIST__ = $items_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($items_cate_info["pid"] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$val['level']); echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select><span>　　　提示：上级分类不要选择三级分类，不然后台将无法显示添加的数据，前台也无法调用</span></td></tr><tr><th width="100" style="vertical-align: bottom;"><?php echo L('name');?> :</th><td style="vertical-align: middle;"><textarea cols=20 rows=10 name="name" id="name"></textarea>				&nbsp;&nbsp;&nbsp;&nbsp;
				<span style="color:#666;"><?php echo L('keyword');?></span>:
				<textarea cols=20 rows=10 name="keywords" id="keywords"></textarea></td></tr></table></div><div class="bk15"></div><div class="btn"><input type="submit" value="<?php echo (L("submit")); ?>"  name="dosubmit" class="button" id="dosubmit"></div></div></div></form><script type="text/javascript">function SwapTab(name,cls_show,cls_hide,cnt,cur){
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
</script></body></html>