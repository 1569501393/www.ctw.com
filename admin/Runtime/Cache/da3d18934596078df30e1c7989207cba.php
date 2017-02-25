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

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><form id="myform" name="myform" action="<?php echo u('cash_setting/index');?>" method="post"><div class="pad-10"><div style="padding:10px; overflow:hidden;"><div class="main_top" style="clear:both;"><h4>温馨提示：</h4><p class="green">						1.默认b2c返现模式是返现金
					</p><p class="green">						2.如果淘宝返现模式是集分宝的话，则100集分宝相当于1块钱
					</p></div></div><table width="100%" cellpadding="2" cellspacing="1" class="table_form"><tr><th width="120">是否返现 :</th><td><input type="radio" <?php if($set["is_cashback"] == '1'): ?>checked="checked"<?php endif; ?> onclick="" value="1" name="site[is_cashback]" /> 开启 &nbsp;&nbsp;
                <input type="radio" <?php if($set["is_cashback"] == '0'): ?>checked="checked"<?php endif; ?> onclick="" value="0" name="site[is_cashback]" /> 关闭 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>如果关闭返现功能将不返现，所有佣金都给站长(包括 b2c返现和淘宝返现)</span></td></tr><tr><th>淘宝返现形式 :</th><td><input type="radio" id="jifenbao" <?php if($set["cashback_type"] == '1'): ?>checked="checked"<?php endif; ?>  value="1" name="site[cashback_type]" /> 集分宝 &nbsp;&nbsp;
                  <input type="radio" id="zidingyi" <?php if($set["cashback_type"] == '0'): ?>checked="checked"<?php endif; ?>  value="0" name="site[cashback_type]" /> 自定义 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;				
			  </td></tr><tr id="zidingyi_geshi" <?php if($set["cashback_type"] == '1'): ?>style="display:none;"<?php endif; ?>><th>自定义淘宝返现 :</th><td>		                      名称：
				<input id="tb_fanxian_name" class="input-text" type="text" style="width:50px;" value="<?php echo ($set["tb_fanxian_name"]); ?>" name="site[tb_fanxian_name]">				 单位：
				<input id="tb_fanxian_unit" class="input-text" type="text" style="width:30px;" value="<?php echo ($set["tb_fanxian_unit"]); ?>" name="site[tb_fanxian_unit]">				 比例：
				<input id="tb_fanxian_bili" class="input-text" type="text" value="<?php echo ($set["tb_fanxian_bili"]); ?>" name="site[tb_fanxian_bili]" style="width:40px" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">				例如返现名称是"<?php if($set["cashback_type"] == '1'): ?>集分宝<?php else: echo ($set["tb_fanxian_name"]); endif; ?>"，返现比例为100 ，则表示 100个<?php if($set["cashback_type"] == '1'): ?>集分宝<?php else: echo ($set["tb_fanxian_name"]); endif; ?>相当于1块钱的人民币，<?php if($set["cashback_type"] == '1'): ?>集分宝<?php else: echo ($set["tb_fanxian_name"]); endif; ?>与人民币的比例为100:1		
			  </td></tr><tr><th>返现比例 :</th><td><input type="text" name="site[cashback_rate]" id="cashback_rate" class="input-text" value="<?php echo ($set["cashback_rate"]); ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"><span>(填写0-100）如 10% 表示返现总佣金的10%，支付给购买者，或者发布者 &nbsp;<span style="color:red">此规则适用于淘宝和b2c</span></span></td></tr><tr><th>B2C最低提现金额:</th><td><input type="text" name="site[lowest_get_cash]" id="lowest_get_cash" class="input-text" value="<?php echo ($set["lowest_get_cash"]); ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"><span> 元</span><span>&nbsp;&nbsp;&nbsp;最低提现金额</span></td></tr><tr><th>淘宝最低提现<?php if($set["cashback_type"] == '1'): ?>集分宝
			  <?php else: echo ($set["tb_fanxian_name"]); endif; ?>			  :</th><td><input type="text" name="site[lowest_get_jifen_cash]" id="lowest_get_jifen_cash" class="input-text" value="<?php echo ($set["lowest_get_jifen_cash"]); ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"><span> 元</span><span>&nbsp;&nbsp;&nbsp;最低提现<?php if($set["cashback_type"] == '1'): ?>集分宝
					  <?php else: echo ($set["tb_fanxian_name"]); endif; ?></span></td></tr><tr><th>反积分比例 :</th><td><input type="text" name="site[integralback_rate]" id="integralback_rate" class="input-text" value="<?php echo ($set["integralback_rate"]); ?>" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"><span>(填写0-100）如 10% 返利同时赠送一定比例的积分，按照实际给会员的返利计算，取整,例如：用户获取10元佣金则可以获得10*10%=1个积分</span></td></tr></table><div class="bk15"></div><div class="btn"><input type="submit" value="<?php echo (L("submit")); ?>" onclick="return submitFrom();" name="dosubmit" class="button" id="dosubmit"></div></div></div><script type="text/javascript"> 	$(function(){		
		$('#jifenbao').click(function(){
			$('#zidingyi_geshi').css("display","none");
		});
		$('#zidingyi').click(function(){
			$('#zidingyi_geshi').css("display","");
		})
	})
 </script></form></body></html>