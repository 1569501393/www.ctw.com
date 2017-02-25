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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><div class="pad-10" ><table width="100%" cellspacing="0" class="search-form"><tbody><tr><td><div class="explain-col">            	时间范围：
            	<link rel="stylesheet" type="text/css" href="__ROOT__/statics/js/calendar/calendar-blue.css"/><script type="text/javascript" src="__ROOT__/statics/js/calendar/calendar.js"></script><input class="date input-text" type="text" name="star_time" id="star_time" size="18" value="<?php echo ($date); ?>" /><script language="javascript" type="text/javascript">	                    Calendar.setup({
	                        inputField     :    "star_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script>                                        到
                
		<input class="date input-text" type="text" name="end_time" id="end_time" size="18" value="<?php echo ($date); ?>" /><script language="javascript" type="text/javascript">	                    Calendar.setup({
	                        inputField     :    "end_time",
	                        ifFormat       :    "%Y-%m-%d",
	                        showsTime      :    "true",
	                        timeFormat     :    "24"
	                    });
	     </script><input type="button" name="button" class="button" id="button" value="立即获取" /></div></td></tr></tbody></table></div><script language="javascript">$(function(){
	$('#button').click(function(){
		var star=$('#star_time').val();
		var end=$('#end_time').val();
		collect(star,end);
	});
});	
	
function collect(star_data, end_data) {
	window.top.art.dialog({id:'getorder'}).close();
	window.top.art.dialog({title:'淘宝订单采集',id:'getorder',iframe:'?m=miao_order&a=get_tao_order_jump&star_data='+star_data+'&end_data='+end_data,width:'430',height:'160'});
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
		
		$("#star_time").formValidator({
			onshow:"",onfocus:"开始时间不能为空哦"
		}).inputValidator({
			min:1,onerror:"请选择开始时间"
		});	
		$("#end_time").formValidator({
			onshow:"",onfocus:"结束时间不能为空哦"
		}).inputValidator({
			min:1,onerror:"请选择结束时间"
		});
				
})
</script></body></html>