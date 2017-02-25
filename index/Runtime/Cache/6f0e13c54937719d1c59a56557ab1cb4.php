<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo ($seo["seo_title"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["seo_keys"]); ?>" />
<meta name="description" content="<?php echo ($seo["seo_desc"]); ?>" />
<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey=21211383"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/style.css" />
<script type="text/javascript">
var def=<?php echo ($def); ?>;
</script> 
<script type="text/javascript" src="__ROOT__/statics/js/loadindex.js"></script>
<link rel="stylesheet" type="text/css" href="__ROOT__/statics/js/artDialog5.0/skins/mogujie.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/ie.css" />
<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.corner.js"></script>
<script type="text/javascript">
$(function(){ 
	$('.jq_corner').corner();
});
</script>
<![endif]-->
</head>
<body>
<div class="head">
	<div class="header">
		<h1> 	
			<a title="<?php echo ($site_name); ?>" href="<?php echo ($site_domain); ?>"> 
            	<img id="logoimg" alt="<?php echo ($site_name); ?>" src="__ROOT__/<?php echo ($site_logo); ?>" style="max-height:90px;"> 
         	</a> 
        </h1>
		<div id="search">			
			<!--
			<form method="post" action="<?php echo u('bsearch/index');?>" onsubmit="return check_search(this);">
			-->
			<form method="get" action="index.php" name="searchForm" target="_blank">				
				<div class="slt">
					<span>
						<?php if(MODULE_NAME == 'search'): ?><a id="ish_1" onclick="SearchSelect(1,'300家B2C网站商城商品，轻松搜索，一键分享！','bsearch');">分享宝贝</a>				
							<a id="ish_2" onclick="SearchSelect(2,'衣服，包包等热门分享内容，轻松查找！','search');" class="on">找商品</a>
							<a id="ish_3" onclick="SearchSelect(3,'千万淘宝数据一键查找','tsearch');">查淘宝</a>
						<?php elseif(MODULE_NAME == 'rebate'): ?>						
							<a id="ish_1" onclick="SearchSelect(1,'300家B2C网站商城商品，轻松搜索，一键分享！','bsearch');">分享宝贝</a>				
							<a id="ish_2" onclick="SearchSelect(2,'衣服，包包等热门分享内容，轻松查找！','search');">找商品</a>
							<a id="ish_3" onclick="SearchSelect(3,'千万淘宝数据一键查找','tsearch');" class="on">查淘宝</a>					
						<?php else: ?>
							<a id="ish_1" onclick="SearchSelect(1,'300家B2C网站商城商品，轻松搜索，一键分享！','bsearch');" class="on">分享宝贝</a>				
							<a id="ish_2" onclick="SearchSelect(2,'衣服，包包等热门分享内容，轻松查找！','search');">找商品</a>
							<a id="ish_3" onclick="SearchSelect(3,'千万淘宝数据一键查找','tsearch');">查淘宝</a><?php endif; ?>
					</span>
				</div>
				<?php if(MODULE_NAME == 'search'): ?><input id="m" type="hidden" name="m" value="search"/>
				<?php elseif(MODULE_NAME == 'rebate'): ?>
					<input id="m" type="hidden" name="m" value="tsearch"/>
				<?php else: ?>
					<input id="m" type="hidden" name="m" value="bsearch"/><?php endif; ?>
				
				<input id="a" type="hidden" name="a" value="index"/>
				<div class="input_submit">
					<input type="text" value="<?php if($keywords != ''): echo ($keywords); else: ?>300家B2C网站商城商品，轻松搜索，一键分享！<?php endif; ?>" autocomplete="off" name="keywords" id="search_hd" />			

					<button type="submit" class="search" title="搜索" onclick="return checkSearch();">搜 索</button>
				</div>
			</form>		
		</div>
		<div class="login_top">			
				<?php if(isset($user)): ?><ul>
						<li class="l1">							
							<div class="user_relation">	
								<p>
									<span class="l"><?php echo ($user["name"]); ?></span>
									<span class="r"> </span>
								</p>							
								<ul style="display:none;">
									<li><a href="<?php echo u('uc/like');?>">我的主页</a></li>
									<li><a href="<?php echo u('uc/account_face');?>">头像设置</a></li>
									<li><a href="<?php echo u('uc/account_basic');?>">账号设置</a></li>
									<?php if($is_cashback == 1): ?><li><a href="<?php echo u('uc/account_commission');?>">返利管理</a></li><?php endif; ?>
									<li><a href="<?php echo u('uc/account_message');?>">短消息</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div id="share_goods" class="left top_share">
								<div class="button"><a href="javascript:void(0)">分享宝贝</a></div>
							</div>
						</li>
						<?php if($is_cashback == 1): ?><li><a href="<?php echo u('uc/account_get_cash');?>">提现 </a></li><?php endif; ?>
						<li class="last"><a href="<?php echo u('uc/logout');?>">退出</a></li>
					</ul>
				 <?php else: ?>	
					<ul>	
						<li><a href="<?php echo u('uc/tao_login');?>"><img src="__TMPL__/public/images/taobao.png" /></a></li>
						<li><a href="<?php echo u('uc/sina_login');?>"><img src="__TMPL__/public/images/sina.png" /></a></li>				
						<li><a href="<?php echo u('uc/qq_login');?>"><img src="__TMPL__/public/images/qq.png" /></a></li>
						<li><a href="<?php echo u('uc/login');?>">登录</a></li>
						<li class="last"><a href="<?php echo u('uc/register');?>">注册</a></li>
					</ul><?php endif; ?>  
			 
		</div>
    </div>
</div>
<div class="nav">
	<div class="naver">
    	<ul>        
         	 <!-- <li style="border-left:none;" class="dangqian"><a href="<?php echo ($site_domain); ?>" <?php if(MODULE_NAME == 'index'): ?>class="hover"<?php endif; ?>>首 页</a></li> -->
         	 <li style="border-left:none;" class="dangqian"><a href="__ROOT__/" <?php if(MODULE_NAME == 'index'): ?>class="hover"<?php endif; ?>>首 页</a></li>
             <?php if(is_array($nav_list['main'])): $i = 0; $__LIST__ = $nav_list['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
					<?php if($val['system'] == 1): ?><!--系统默认导航-->										
	                   	 <a href="<?php echo u(''.$val['alias'].'/index');?>" title="<?php echo ($val["name"]); ?>" <?php if(MODULE_NAME == $val['alias']): ?>class="hover"<?php endif; ?>>
							 
					<?php else: ?>	
						<?php if($val['in_site'] == '0'): ?><!--站外链接-->
		                    <a href="<?php echo ($val["url"]); ?>" title="<?php echo ($val["name"]); ?>" target="_blank" <?php if($val['system'] == 0): ?>class="f12 fnormal"<?php endif; ?>>
						<?php else: ?>
							<a href="<?php echo u('cate/index', array('cid'=>$val['items_cate_id']));?>" title="<?php echo ($val["name"]); ?>" <?php if((MODULE_NAME == 'cate') AND ($val['items_cate_id'] == $select_pid)): ?>class="hover"<?php endif; ?>><?php endif; endif; ?>	
                    <?php echo ($val["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
$(function(){
	$("#search_hd").focus(function(){	
		if($(this).val()=='300家B2C网站商城商品，轻松搜索，一键分享！' || $(this).val()=='衣服，包包等热门分享内容，轻松查找！' || $(this).val()=='千万淘宝数据一键查找'){
			$(this).val('');
		}
		else{
			$(this).val();
		}		
	}).blur(function(){
		if($(this).val()=='300家B2C网站商城商品，轻松搜索，一键分享！' || $(this).val()=='衣服，包包等热门分享内容，轻松查找！' || $(this).val()=='千万淘宝数据一键查找'){
			$(this).val('');
		}
		else{
			$(this).val();
		}
	});
});
function checkSearch(){
	var fm = document.searchForm;	
	if (fm.keywords.value == '300家B2C网站商城商品，轻松搜索，一键分享！' || fm.keywords.value=='衣服，包包等热门分享内容，轻松查找！'  || fm.keywords.value=='千万淘宝数据一键查找') {
		fm.keywords.value='';
		fm.keywords.focus();
		return false;
	}
	else if(fm.keywords.value ==''){
		fm.keywords.value='';
		fm.keywords.focus();
		return false;
	}
}
function SearchSelect(n,val,m){	
	var fm = document.searchForm;	
	if (fm.keywords.value == '300家B2C网站商城商品，轻松搜索，一键分享！' || fm.keywords.value=='衣服，包包等热门分享内容，轻松查找！' || fm.keywords.value=='千万淘宝数据一键查找') {
		$id('search_hd').value = val;
	}
	$id('m').value = m;
	for(var i=1;i<4;i++){
		$id('ish_' + i).className = '';
	}
	$id('ish_' + n).className = 'on';
}
function $id(val){
	return document.getElementById(val);
}

</script>
<div class="wrapper clearfix">
<script type="text/javascript">
$(function(){
	/*交换商品*/
	$('.exchange_btn').click(function(){ 		
		var goods_id = $(this).attr('exchange_id');
		var goods_title = $(this).attr('exchange_title');		
		var btn=$(this);
		if(def.user_id==null){ 
			login();
			return;	
		}
		//信息检测
		$.post(def.root+"index.php?m=exchange_goods&a=check_info",{goods_id:goods_id},function(data){
			if(data=='not_login'){ 
				login();
				return false;
			}
			else if(data=='no_goods'){ 
				messagebox('商品id异常!','error');
				return false;
			}
			else if(data=='score_short'){ 
				messagebox('您的积分不足，无法兑换此商品!','error');
				return false;
			}			
			else if(data=='stock_short'){ 
				messagebox('对不起，此商品库存不足无法兑换此商品!','error');
				return false;
			}
			else if(data=='max_exchange'){
				messagebox('您的兑换次数不能大于每人限兑的次数，请兑换其他商品!','error');
				return false;
			}
			else{ //执行入库操作
				
				set_order(goods_id,goods_title);		
				
			}
			
		});
		//获取地址信息
							   
	});	
})
function set_order(goods_id,goods_title){
	$.post(def.root+"index.php?m=exchange_goods&a=order_dialog",function(data){ 
			try{ 
				var error= eval("("+data+")");
				if(error.data=='not_login'){ 
					login();
					return;	
				}
			}catch(e){}
			
			var exchange_goods_dialg=art.dialog({
				title:'兑换商品',
				id:'exchange_goods_dialg',
				content:data,
				width:'570',
				height:'60',
				lock:true
			});	
			$("#good_title").html(goods_title);	  //给弹出的对话框赋值		
			var dlg=$(".exchange_goods_dialg");				
			
			var submit=$('.submit');			
			submit.click(function(){ 	
				var address=$.trim($('#address').val());  //地址
				var zip=$.trim($('#zip').val());   //邮编				
				var consignee=$.trim($('#consignee').val());  //收货人 				
				var mobile_phone=$.trim($('#mobile_phone').val());   //手机				
				var fax_phone=$.trim($('#fax_phone').val());   //固定电话				 
				var email=$.trim($('#email').val());				
				var qq=$.trim($('#qq').val());				
				var remark=$.trim($('#remark').val());			
				if(address==''){
					messagebox('地址不得为空!','error');
					return false;
				}
				if(address.length>500){
					messagebox('地址不得大于500!','error');
					return false;
				}
				if(zip==''){
					messagebox('邮政编码不得为空!','error');
					return false;
				}				
				if(consignee==''){
					messagebox('收货人不得为空!','error');
					return false;
				}
				if(email==''){
					messagebox('电子邮件不得为空!','error');
					return false;
				}				
				if(remark.length>1000){
					messagebox('描述不得大于1000!','error');
					return false;
				}				
				$.post(def.root+"index.php?m=exchange_goods&a=order", 
					{goods_id:goods_id,address:address,zip:zip,consignee:consignee,mobile_phone:mobile_phone,fax_phone:fax_phone,email:email,qq:qq,submit:"submit"},
					function(data){
						if(data=='success'){
							window.location.href=""; 
							messagebox('恭喜您订单提交成功!');
						}
						else{
							messagebox('对不起订单提交失败,请与管理员联系!','error');
						}
						//判断返回结果
						
					}); 																	
			});						
		});		
}
</script>
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/exchange_goods.css" />
<div class="jfsc">
	<div class="jfsc_left">
		<?php if(is_array($ex_list)): $k = 0; $__LIST__ = $ex_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><div class="jfsc_left_a">
		    	<div class="jfsc_left_a1"><img src="__ROOT__/<?php echo ($val["img"]); ?>" height="230" /></div>
		    	<div class="jfsc_left_a2"><?php echo ($val["name"]); ?></div>
		        <div class="jfsc_left_a3">
		        	<div class="jfsc_left_a3a">
		            	<ul>
		                	<li>库存剩余:<span><?php echo ($val["stock"]); ?></span> </li>
							<li>已兑数量:<span><?php echo ($val["buy_count"]); ?></span></li>
		                    <li>每人限兑:<span><?php echo ($val["user_num"]); ?></span></li>
		                </ul>
		            </div>
		            <div class="jfsc_left_a3b"><a class="exchange_btn" href="javascript:;" exchange_id=<?php echo ($val["id"]); ?> exchange_title=<?php echo ($val["name"]); ?>><?php echo ($val["integral"]); ?>积分</a></div>
		            <div style="clear:both;"></div>
		        </div>
		    </div><?php endforeach; endif; else: echo "" ;endif; ?> 
		<div class="page_b"><?php echo ($page); ?></div>
    </div>
    
    
	<div class="jfsc_right">
        
        <?php if(($u["id"]) == ""): ?><div class="jfsc_rightaa">
			<dl>
				<dd>
					<div class="er_link">
						<a href="<?php echo u('uc/login');?>">
						<img src="__TMPL__public/images/login.jpg">
						</a>
					</div>
					<div class="er_rule">
                    <li>
						<a target="_blank" href="<?php echo u('article/index',array('id'=>13));?>">如何赚取积分？</a>
					</div>
				</dd>
			</dl>
		</div>
		<?php else: ?>
<div class="ucenter">
        <div class="ucface"><img src="<?php echo getUserFace($u['id'],'m');?>"/></div>
        <div class="ucenter_right">
            <span class="ucenter_name"><?php echo ($u["name"]); ?></span>

            <span class="ucenter_set"><?php echo ($u["integral"]); ?>积分</span>
            
        </div>
        <div class="ucenter_content">
            <span id="user_info_span"><?php echo ($u["info"]); ?></span>
        </div>
        <div class="ucenter_tl">
            <ul>
                <li><span><?php echo ($u["share_num"]); ?></span><br/>分享</li>
                <li class="solid"><span><?php echo ($u["album_num"]); ?></span><br/>专辑</li>
                <li><span><?php echo ($u["like_num"]); ?></span><br/>喜欢</li>
            </ul>
        </div>
        
        
        <div class="ucenter-list">
            <ul>
                <li><span class="li1"></span><a href="<?php echo u('uc/index');?>">我的专辑</a></li>
                <li><span class="li2"></span><a href="<?php echo u('uc/like');?>">我的喜欢</a></li>
                <li><span class="li3"></span><a href="<?php echo u('uc/share');?>">我的分享</a></li>
            </ul>
        </div>
    <br clear="all"/>
    </div><?php endif; ?>
    	<div class="jfsc_righta">
        	<div class="jfsc_righta_a">积分排行<span>TOP10</span></div>
            <div class="jfsc_righta_b">
            	<ul>
            		<?php if(is_array($top10integral)): $k = 0; $__LIST__ = $top10integral;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k < 4 ): ?><li>
		                    	<div class="jfsc_righta_b1"><span class="jfsc_righta_b1s"><?php echo ($k); ?></span><?php echo ($val["name"]); ?></div>
		                        <div class="jfsc_righta_b2"><?php echo ($val["integral"]); ?></div>
		                    </li>
						<?php else: ?> 
							<li>
		                    	<div class="jfsc_righta_b1"><span><?php echo ($k); ?></span><?php echo ($val["name"]); ?></div>
		                        <div class="jfsc_righta_b2"><?php echo ($val["integral"]); ?></div>
		                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>	                    
                </ul>
            </div>
        </div>        
        <div class="jfsc_righta">
        	<div class="jfsc_righta_a">兑换排行<span>TOP10</span></div>
            <div class="jfsc_righta_b">
            	<ul>
                	 <?php if(is_array($top10ex)): $k = 0; $__LIST__ = $top10ex;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($k < 4 ): ?><li>
		                    	<div class="jfsc_righta_b1"><span class="jfsc_righta_b1s"><?php echo ($k); ?></span><?php echo ($val["name"]); ?></div>
		                        <div class="jfsc_righta_b2"><?php echo ($val["exchange_num"]); ?></div>
		                    </li>
						<?php else: ?> 
		                	<li>
		                    	<div class="jfsc_righta_b1"><span><?php echo ($k); ?></span><?php echo ($val["name"]); ?></div>
		                        <div class="jfsc_righta_b2"><?php echo ($val["exchange_num"]); ?></div>
		                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>	
                </ul>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
</div>
<div class="foot">
	<div class="footer">
    	<div class="footlj">
        	<div class="logo2"><a href="./"><img src="__TMPL__public/images/logo2.png" /></a></div>
            <div class="footlj_a">
            	<h6>逛宝贝</h6>
            	<ul>
                	<li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>548));?>">衣服</a></li>
                    <li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>2));?>">鞋子</a></li>
                    <li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>3));?>">包包</a></li>
                    <li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>4));?>">配饰</a></li>
					<li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>5));?>">美妆</a></li>
					<li><a target="_blank" href="<?php echo U('cate/index',array('cid'=>6));?>">家居</a></li>
                </ul>
            </div>
            
            <div class="footlj_a">
            	<h6>关于我们</h6>
            	<ul>
                <?php if(is_array($fabout)): $i = 0; $__LIST__ = $fabout;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php if(($vo["url"]) == ""): echo u('article/index',array('id'=>$vo['id'])); else: echo ($vo["url"]); endif; ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>                     
                </ul>
            </div>
            
            <div class="footlj_a">
            	<h6>合作伙伴</h6>
            	<ul>       
					<?php if(is_array($huoban_list)): $i = 0; $__LIST__ = $huoban_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($val["url"]); ?>"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            
		<div class="footlj_a footlj_b">
            	<h6>友情链接</h6>
		       	  <ul>  
					  <?php if(is_array($flink_list)): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($val["url"]); ?>" class="f_links fl"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		          </ul>
        </div>
            
            <div class="footlj_a footlj_c">
            	<h6>关注我们</h6>
            	<ul> 
                	<?php if(($follow_us["weibo_url"]) != ""): ?><li><a href="<?php echo ($follow_us["weibo_url"]); ?>">新浪微博</a></li><?php endif; ?>
                    <?php if(($follow_us["qqweibo_url"]) != ""): ?><li><a href="<?php echo ($follow_us["qqweibo_url"]); ?>" style="background:url(__TMPL__public/images/guanz5.png) no-repeat;">腾讯微博</a></li><?php endif; ?>
                    <?php if(($follow_us["163_url"]) != ""): ?><li><a href="<?php echo ($follow_us["163_url"]); ?>" style="background:url(__TMPL__public/images/guanz6.png) no-repeat;">网易微博</a></li><?php endif; ?>
                    <?php if(($follow_us["qqzone_url"]) != ""): ?><li><a href="<?php echo ($follow_us["qqzone_url"]); ?>" style="background:url(__TMPL__public/images/guanz2.png) no-repeat;">QQ空间</a></li><?php endif; ?>
                    <?php if(($follow_us["douban_url"]) != ""): ?><li><a href="<?php echo ($follow_us["douban_url"]); ?>" style="background:url(__TMPL__public/images/guanz3.png) no-repeat;">豆瓣</a></li><?php endif; ?>
                    <?php if(($follow_us["renren_url"]) != ""): ?><li><a href="<?php echo ($follow_us["renren_url"]); ?>" style="background:url(__TMPL__public/images/guanz4.png) no-repeat;">人人网</a></li><?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="banquan">Powered by <a href="<?php echo ($site_domain); ?>"><?php echo ($site_name); ?></a>&nbsp;&nbsp;<?php echo ($site_icp); ?></div>
		<div  class="banquan"><?php echo ($statistics_code); ?></div>
		<div class="banquan"><?php echo ($site_share); ?></div>
        <div class="browse none_f"> 
        	<a class="close_z"></a> 
        	温馨提示：你正在使用的<b>IE6浏览器</b>，网购支付不安全，<?php echo ($site_name); ?>推荐 
            <a class="jisuie" href="http://download.microsoft.com/download/1/6/1/16174D37-73C1-4F76-A305-902E9D32BAC9/IE8-WindowsXP-x86-CHS.exe" target="_blank">IE8浏览器</a>，
            <a class="jisugg" href="http://www.google.cn/intl/zh-CN/chrome/browser/" target="_blank">Chrome浏览器</a>，
            <a class="jisuff" href="http://download.firefox.com.cn/releases/partners/baidu/webins3.0/zh-CN/Firefox-setup.exe" target="_blank">firefox浏览器</a>，
            网速更快更安全。
        </div>
        
    </div>
</div>

<div style="display:none;" id="gotopbtn" class="to_top"></div>

<div id="user_info_tip" style="display:none;">
	<div class="tip_info">		
		<img src="__ROOT__/statics/images/loading_60.gif" />
	</div>
</div>
<script type="text/javascript">
    //IE6提示
    var isIE6= /msie 6/i.test(navigator.userAgent);
    if(isIE6){
        $(".none_f").css("display","block");
        $(".close_z").click(function(){
            $(".none_f").css("display","none")
        })
    }
</script>
<script>
        $(function(){
            var classname;
            $(".ucenter-list ul li").each(function(){
                $(this).mousemove(function(){
                    $(this).css("background","#FFF3F3");
                    classname = $(this).find("span").attr('class');
                    $(this).find("span").addClass('n'+classname);
                    
                }).mouseout(function(){
                    $(this).css("background","#F9F7F8");
                    $(this).find("span").removeClass('n'+classname);                    
                })
            })
        })
</script>
</body>
</html>