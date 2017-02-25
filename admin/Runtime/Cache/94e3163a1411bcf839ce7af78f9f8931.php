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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><form action="<?php echo u('items/add');?>" method="post" name="myform" id="myform"  enctype="multipart/form-data" style="margin-top:10px;"><div class="pad-10"><div class="col-tab"><ul class="tabBut cu-li"><li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',2,1);">基本信息</li><li id="tab_setting_2" onclick="SwapTab('setting','on','',2,2);">SEO设置</li></ul><div id="div_setting_1" class="contentList pad-10"><div style="padding:10px; overflow:hidden;"><div class="main_top" style="clear:both;"><h4>温馨提示：</h4><p class="green">如果想手动添加商品，请直接点击获取</p><p class="green">注：只需要输入淘宝，天猫,或者<a href="<?php echo u('seller_list/index');?>" style="color:blue;">b2c商家</a>的商品的详细链接地址即可,如：</p><p class="green"><font color=red><b>http://detail.tmall.com/item.htm?id=13925978724</b></font></p><p class="green"><font color=red><b>http://www.360buy.com/product/292547.html</b></font></p></div></div><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100"><?php echo L('collect_url');?>  :</th><td><input type="text" name="collect_url" id="collect_url" class="input-text" size="60"><input type="button" value="获取" class="button" onclick="collect_item();"></td></tr><tbody id="item_body" style="display:none;"><tr><th width="100"><?php echo L('title');?> :</th><td><input type="text" name="title" id="title" class="input-text" size="60"><span id="no_data" style="color:red;"></span></td></tr><tr><th><?php echo L('cid');?> :</th><td><select id="parent_cate" onchange="get_child_cates(this)"><option value="0">--请选择分类--</option><?php if(is_array($cate_list['parent'])): $i = 0; $__LIST__ = $cate_list['parent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><optgroup label="<?php echo ($val["name"]); ?>"></optgroup><?php if(is_array($cate_list['sub'][$val['id']])): $i = 0; $__LIST__ = $cate_list['sub'][$val['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sval["id"]); ?>" <?php if($item_pid == $sval['id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($sval["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?></select><select id="second_cate" name="cid" style="display:none;"></select></td></tr><tr><th><?php echo L('img');?> :</th><td><img id="img_show" src="" style="display:none" style="width:200px; height:200px;" /><br /><br /><input type="file" name="img" id="img" class="input-text" size=21 /></td></tr><tr><th><?php echo L('sid');?>:</th><td><select name="sid" id="sid"><option value="0" selected="selected">--选择来源--</option><?php if(is_array($site_list)): $i = 0; $__LIST__ = $site_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" alias="<?php echo ($val["alias"]); ?>"><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr><tr><th><?php echo L('url');?>:</th><td><input type="text" name="url" id="url" class="input-text" size="60"></td></tr><tr><th><?php echo L('tags');?> :</th><td><input type="text" name="tags" id="tags" class="input-text" size="60"></td></tr><tr><th><?php echo L('price');?> :</th><td><input type="text" name="price" id="price" class="input-text" size="20">元</td></tr></tbody></table></div><div id="div_setting_2" class="contentList pad-10 hidden"><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="100"><?php echo (L("seo_title")); ?> :</th><td><input type="text" name="seo_title" id="seo_title" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_keys")); ?> :</th><td><input type="text" name="seo_keys" id="seo_keys" class="input-text" size="60"></td></tr><tr><th><?php echo (L("seo_desc")); ?> :</th><td><textarea name="seo_desc" id="seo_desc" cols="80" rows="8"></textarea></td></tr></table></div><div class="bk15"><input type="hidden" name="item_key" id="item_key" value="" /><input type="hidden" name="input_img" id="input_img" value="" /><input type="hidden" name="simg" id="simg" value="" /><input type="hidden" name="bimg" id="bimg" value="" /><input type="hidden" name="author" id="author" value="" /><input type="hidden" name="seller_name" id="seller_name" value="" /><input type="hidden" name="cash_back_rate" id="cash_back_rate" value="" /></div><div class="btn"><input type="submit" onclick="return check(); " value="<?php echo (L("submit")); ?>" name="dosubmit" class="button" id="dosubmit"></div></div></div></form><script type="text/javascript">function SwapTab(name,cls_show,cls_hide,cnt,cur){
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
function check(){
	if($('#title').val()==''){
		alert('请填写商品名称');
		return false;
	}else if($('#parent_cate').val()=='0'){		
		alert('请选择分类');
		return false;
	}else if($('url').val()==''){
		alert('请填写商品跳转地址');
		return false;
	}else if($('#price').val()==''){
		alert('商品价格不得为空');
		return false;		
	}		
}
function collect_item(){
	var url = $("#collect_url").val();
    $.post("<?php echo u('items/collect_item');?>", { url: url }, function(jsondata){
		
		
		if(jsondata.data.err=='remote_not_exist'){
			$('#no_data').html('可能您填写的url有误，没有抓取远程数据，请手动添加');
		}else if(jsondata.data.err=='yet_exist'){
			alert('此商品已经存在');
			return true;
		}
		else{
			$("#title").val(jsondata.data.title);
			$("#url").val(jsondata.data.url);
			$("#tags").val(jsondata.data.tags);
			$("#price").val(jsondata.data.price);
			$("#item_key").val(jsondata.data.item_key);
			$("#input_img").val(jsondata.data.img);
			$("#simg").val(jsondata.data.simg);
			$("#bimg").val(jsondata.data.bimg);
			$("#author").val(jsondata.data.author);
			$("#seller_name").val(jsondata.data.seller_name);
			$("#cash_back_rate").val(jsondata.data.cash_back_rate);
			$("#sid option[alias='"+jsondata.data.author+"']").attr('selected',true);
			$("#cid option[value='"+jsondata.data.cid+"']").attr('selected',true);
			$("#img_show").attr('src', jsondata.data.img).show();
		}
		$("#item_body").show();

	},'json'); 
}
function get_child_cates(obj)
{
	$('#second_cate').css("display","");
	var parent_id = $(obj).val();
	if( parent_id ){
		$.get('?m=items&a=get_child_cates&parent_id='+parent_id,function(data){				
			$('#second_cate').html(data);
	    });		
    }
}
</script></body></html>