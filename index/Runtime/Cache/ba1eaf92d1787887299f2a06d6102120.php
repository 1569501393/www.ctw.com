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
var items_id="<?php echo ($items_id); ?>";
</script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.masonry.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.infinitescroll.js"></script>
<script type="text/javascript" src="__TMPL__public/js/item.js"></script>
<script type="text/javascript" src="__TMPL__public/js/comments.js"></script>
<script type="text/javascript" src="__TMPL__public/js/album.js"></script>
<script type="text/javascript" src="__TMPL__public/js/user.js"></script>
<script type="text/javascript" src="__TMPL__public/js/user_tip.js"></script>
<style type="text/css">
	.item_article{		
		 background: none repeat scroll 0 0 #FFFFFF;
	     border-radius: 4px 4px 4px 4px;
	     box-shadow: 0 1px 3px rgba(34, 25, 25, 0.2);
		 padding:10px;		 
		 overflow:hidden;
		 margin-top:5px;
		 border: 1px solid #DDDDDD;
	}
	.item_article ul li{
		height:24px;
		line-height:24px;
		overflow:hidden;
	}
</style>
<div class="content" style="background:#fff;">
	<div class="mt15">
		<script language="javascript" src="<?php echo u('advert/index', array('id'=>4));?>"></script>
    </div>
<div style="padding:0px 7px 7px 7px;">
	<div class="item_left fl">
    	<div class="single_item mt15 clearfix">
        	<dl class="twitter_top">
                <?php if(($item["uid"]) == "0"): ?><dt>                	
                	<img src="__ROOT__/data/author/32_<?php echo ($item["items_site"]["site_logo"]); ?>">
               	</dt>
                <dd>
                    <span style="color:#ccc;" class="fr"><?php echo (date("m月 d日 H:i",$item["add_time"])); ?></span>
                    <a href="javascript:void(0)" class="red"><?php echo ($item["items_site"]["name"]); ?></a>
                    <span class="gray">分享的</span>
                    <span><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="red f12">#<?php echo ($item["items_cate"]["name"]); ?>#</a></span>
                </dd>
                <?php else: ?>
                <dt>
                	<a target="_blank" href="<?php echo u('uc/index',array('uid'=>$item['uid']));?>">
                		<img src="<?php echo getUserFace($item['uid']);?>"></a>
               	</dt>
                <dd>
                    <span style="color:#ccc;" class="fr"><?php echo (date("m月 d日 H:i",$item["add_time"])); ?></span>
                    <a target="_blank" href="<?php echo u('uc/index',array('uid'=>$item['uid']));?>" class="red"><?php echo getUserName($item['uid']);?></a>
                    <span class="gray">分享的</span>
                    <span><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="red f12">#<?php echo ($item["items_cate"]["name"]); ?>#</a></span>
                </dd><?php endif; ?>
                
                <dd class="quote_goods_title break_word"><?php echo ($item["title"]); ?></dd>
            </dl>            
        	<div class="item_pic" style="width:450px; height:450px; overflow:hidden;">
				<a onclick="window.open('<?php if($site == tao): echo u('item/tao',array('id'=>$item['id'],'uid'=>$uid)); else: echo u('item/b2c',array('id'=>$item['id'],'uid'=>$uid)); endif; ?>')" href="javascript:void(0)">
                <?php if($seo['goods_save_images']){ ?>
                <!--
					<img url="<?php echo base64ImagesPath($item['id'],450);?>" class="encode_url" style="max-width:450px;"/>
				-->
				<img src="upload/<?php echo replace_url($item['bimg'],1);?>" style="max-width:450px; max-height:450px;" alt="<?php echo ($item['title']); ?>"/>
                <?php }else{ ?>
                <img url="<?php echo base64_encode($item['bimg']);?>" class="encode_url" style="max-width:450px; max-height:450px;"/>
                <?php } ?>
                </a>
			</div>
            <div class="item_detail">
            	<div class="break_word" style="position: relative;">
            	<p class="item_title f14 bold">
            		<a onclick="window.open('<?php if($site == tao): echo u('item/tao',array('id'=>$item['id'],'uid'=>$uid)); else: echo u('item/b2c',array('id'=>$item['id'],'uid'=>$uid)); endif; ?>')" href="javascript:void(0)"><?php if($item['seller_name'] != '' ): ?><span class="fanxian">【<?php echo ($item["seller_name"]); ?>】
						<?php if($is_cashback==1){ ?>										
								<span class="price">￥<?php echo ($item["price"]); ?>&nbsp;&nbsp;
									<?php if($item['sid']==1){ ?>									
											立返：<?php echo intval($item['cash_back_rate'])*$tb_fanxian_bili*$cashback_rate/100; ?>	 <?php if($cashback_type==1){ ?>个集分宝<?php }else{ echo ($tb_fanxian_unit); echo ($tb_fanxian_name); } ?>
									<?php }else{ ?>							
											立返：<?php if(strpos($item['cash_back_rate'],"%") !==false){if(strpos($item['cash_back_rate'],"-") === false){echo round($item['price'] * substr($item['cash_back_rate'],0,strlen($item['cash_back_rate'])-1)/100,1)."元";}else{echo round($item['price'] * substr($item['cash_back_rate'],0,strpos($item['cash_back_rate'],"-"))/100,1)."-".round($item['price'] * substr($item['cash_back_rate'],strpos($item['cash_back_rate'],"-"),strlen($item['cash_back_rate'])-1)/100,1)."元";}}else{echo $item['cash_back_rate'];} ?>									
									<?php } ?>
								</span>						
						<?php } ?>
						</span><?php endif; ?>&nbsp;&nbsp;  <?php echo ($item["title"]); ?></a>
				</p>
                    <div class="clearfix" style="padding:12px 0;">
                        <p class="fl">价格:<span style="color:#FF679A;font-weight:bolder; font-size:30px;"><?php echo ($item["price"]); ?></span>元</p>
                    </div>  
					<?php if($seller_logo != ''): ?><div class="item_seller_logo">
							<div class="fl seller_logo">
								<img src="<?php echo ($seller_logo); ?>" alt="<?php echo ($item["seller_name"]); ?>">
							</div>
							<?php if($is_cashback == 1): ?><div class="fl sheng">
									<p>立省：</p>
									<p class="red">
										<?php if(strpos($item['cash_back_rate'],"%") !==false) { if(strpos($item['cash_back_rate'],"-") === false) { echo round($item['price'] * substr($item['cash_back_rate'],0,strlen($item['cash_back_rate'])-1)/100,1)."元"; } else { echo round($item['price'] * substr($item['cash_back_rate'],0,strpos($item['cash_back_rate'],"-"))/100,1)."-".round($item['price'] * substr($item['cash_back_rate'],strpos($item['cash_back_rate'],"-"),strlen($item['cash_back_rate'])-1)/100,1)."元"; } }else { echo $item['cash_back_rate']; } ?>
									</p>
								</div><?php endif; ?>
						</div><?php endif; ?> 					           	
					<p style="margin-top:20px;">					
						<a onclick="window.open('<?php if($site == tao): echo u('item/tao',array('id'=>$item['id'],'uid'=>$uid)); else: echo u('item/b2c',array('id'=>$item['id'],'uid'=>$uid)); endif; ?>')" href="javascript:void(0)" class="red f16"><img src="__TMPL__/public/images/qgm.png"" />
						</a>
					</p>
                   
                </div>
            </div>
            <?php if(isset($likelist)): ?><div class="item_like_user">
            	<p>喜欢这件宝贝的用户……</p>
                <ul>
                <?php if(is_array($likelist)): $i = 0; $__LIST__ = $likelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <a href="javascript:void(0)">
                            <img width="30px" height="30px" uid="<?php echo ($vo["uid"]); ?>" class="tipuser" src="<?php echo getUserFace($vo['uid'],'s');?>"/>
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
            <div class="item_tags clearfix">
				<span class="fl">宝贝标签：</span>
                <?php if(is_array($item['items_tags'])): $i = 0; $__LIST__ = $item['items_tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo u('cate/tag',array('id'=>$val['id']));?>"><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>

            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare mt10" style="float:right;">
                <a class="bds_qzone"></a>
                <a class="bds_tsina"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <span class="bds_more"></span>
            </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
            /**
             * 在这里定义bds_config
             */
            var bds_config = {
            	'bdPic':base64_decode("<?php echo base64_encode($item['bimg']);?>")//'请参考自定义分享出去的图片'
            }				
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
            </script>
            <!-- Baidu Button END -->
            <span class="fr mt15"><b class="red f14" id="comments_count"><?php echo ($comments["count"]); ?></b>评论&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <div class="clearfix"></div>

            <div id="items_comments" class="clearfix comments">
				<div class="arrow"></div>            		
                <textarea id="comments_box" class="comments_box" maxlength="300" def="对心爱的宝贝说几句话吧~！" maxlength="2000">
                </textarea>
                <div class="clearfix mt10">
                    <span class="plcount">您还可以输入100个汉字</span>
                	<a id="comments_btn" class="comments_btn" pid="<?php echo ($items_id); ?>">评论</a>
                </div>
                <div class="list_wrap">
                <div class="list">
                    <ul>
                        <?php if(is_array($comments['list'])): $i = 0; $__LIST__ = $comments['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="clearfix">
                            <em class="avatar">
                            	<a href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>" title="<?php echo ($val["user"]["name"]); ?>" target="_blank">
                                    <img src="<?php echo getUserFace($val['user']['id']);?>"/>                
                                </if>
                            </a></em>
                            <div class="item_info">
                            	<div class="left">
                                    <a class="name" href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>" target="_blank"><?php echo ($val["user"]["name"]); ?>：</a>
                                    <?php echo ($val["info"]); ?>                
                                </div>
                                <?php if(MODULE_NAME == 'item'): ?><div class="right">
                                        <i><?php echo date("Y-n-j   H:i:s",$val["add_time"]);?></i>
                                    </div><?php endif; ?>
                                <div class="clear"></div>
                			</div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <?php if(strlen(trim($comments['page'])) != 0): ?><div id="page_wrap">
                    <div id="page" class="page mt20 clearfix comments" style="display:block;">
                	    <div class="page_num"><?php echo ($comments["page"]); ?></div>
                    </div>
                </div><?php endif; ?> 
                <script type="text/javascript">
                $(function(){ 
                	if(def.module=="album"){ 
                		$('.comments .unprev,.comments .prev').html('<');
                		$('.comments .unnext,.comments .next').html('>');
                	}else{
                		$('.comments .unprev,.comments .prev').html('上一页');
                		$('.comments .unnext,.comments .next').html('下一页');	
                	}			   	
                	$('#items_comments span').each(function(){ 
                		if($(this).attr('class')=='unprev'||$(this).attr('class')=='prev'||$(this).attr('class')=='unnext'||$(this).attr('class')=='next'){ 
                			$(this).hide();
                		}										
                	});
                });
                </script>

                </div>
            </div>
          
        </div>
    </div>
    <div class="item_right fr">    	
    	<div class="album_like" style="margin-top:24px;">
    		<ul>    			
    			<li class="album_like1"> 
					<div class="like_already" ></div>  
					<span><a onclick="javascript:void(0);" class="like_it" iid="<?php echo ($item["id"]); ?>" style="background:none; float:none; display:inline;">喜欢(<span class="nums" id="like_num_<?php echo ($item["id"]); ?>"><?php echo ($item["likes"]); ?></span>)</a></span> 	
				</li>
				<li class="album_like2"><a href="javascript:comment()">评论 (<?php echo ($item["comments"]); ?>)</a></li>
				<li class="album_like3"><a href="javascript:void(0)">浏览(<?php echo ($item["browse_num"]); ?>)</a></li>
				<li class="album_like4"><a iid="<?php echo ($item["id"]); ?>" class="img_album_btn_c" href="javascript:;">加入专辑</a></li>
    		</ul>
    		<div class="clearfix"></div>
    	</div>
    	<?php if($item['items_cate']['id'] != ''): ?><h3 class="f16 mt15">所在分类</h3>
	    	<div class="box_shadow mt15 group_box">
				<div class="groupbg">
					<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>"><?php echo ($item["items_cate"]["name"]); ?></a></h3>					
					<ul>
						<?php if(is_array($this_cate_group)): $key = 0; $__LIST__ = $this_cate_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><li <?php if($key == 1): ?>class="first"<?php endif; ?> <?php if(($key == 2) or ($key == 3) or ($key == 6)): ?>style="margin-right: 0;"<?php endif; ?>>
								<a href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" title="<?php echo ($val["title"]); ?>" target="_blank">
									<?php if($seo['goods_save_images']){ ?>
										<img class="pg_pic_s"  src="upload/<?php echo replace_url($val['simg'],1);?>" <?php if($key == 1): ?>style="width:130px;height:130px; margin:0 auto;"<?php endif; ?> alt="<?php echo ($val["title"]); ?>" />
					                <?php }else{ ?>
					               		<img class="pg_pic_s encode_url"  url="<?php echo base64_encode($val['simg']);?>" <?php if($key == 1): ?>style="width:130px;height:130px; margin:0 auto;"<?php endif; ?> alt="<?php echo ($val["title"]); ?>" />
					                <?php } ?>
								</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>	
					</ul>					
					<div class="group_desc mt10">
						<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="white">去看看</a></span>
						<span class="share_nums gray"><?php echo ($item["items_cate"]["item_nums"]); ?>个分享</span>
					</div>
					<div class="mt10"></div>
				</div>
			</div><?php endif; ?>			
	       <div class="clearfix"></div>
			<h3 class="f16 mt15">热门文章</h3>
			<div class="item_article">
				<ul>					
					<?php if(is_array($article_list)): $key = 0; $__LIST__ = $article_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><li><a href="<?php echo u('article/index',array('id'=>$val['id']));?>" target="_blank" title="<?php echo ($val["title"]); ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
    </div>
	<div class="clearfix"></div>
	</div>
	<div style="padding-left:5px;">
        <h3 class="f16 mt15 red">也许你还喜欢~~</h3>
        <div class="detail_item_list infinite_scroll">     
		   <?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="item mt15 masonry_brick jq_corner" data-corner="7px" iid="<?php echo ($val['id']); ?>">
        <div class="item_t">
            <div class="img tc"> 
            	<a target="_blank" href="<?php echo u('item/index',array('id'=>$val['id']));?>" hidefocus="true" rel="nofollow">            		
                    <?php if($seo['goods_save_images']){ ?>                   	 	
						<img src="__TMPL__public/images/grey.gif" url="upload/<?php echo replace_url($val['img'],1);?>" class="no_encode_url" alt="<?php echo ($val['title']); ?>"/>
                    <?php }else{ ?>
                    <img alt="<?php echo ($val["title"]); ?>" url="<?php echo base64_encode($val['img']);?>" style="display:inline;" class="encode_url" src="__TMPL__public/images/grey.gif"/>
                    <?php } ?>                    
            	</a>
                <span class="price">￥<?php echo ($val["price"]); ?>&nbsp;&nbsp;
					<?php if($is_cashback == 1): if($val['sid'] == 1): ?>返：<?php echo intval($val['cash_back_rate'])*$tb_fanxian_bili*$cashback_rate/100; ?>	<?php if($cashback_type == '1'): ?>个集分宝<?php else: echo ($tb_fanxian_unit); echo ($tb_fanxian_name); endif; ?>
						<?php else: ?>							
								返：<?php if(strpos($val['cash_back_rate'],"%") !==false){if(strpos($val['cash_back_rate'],"-") === false){echo round($val['price'] * substr($val['cash_back_rate'],0,strlen($val['cash_back_rate'])-1)/100,1)."元";}else{echo round($val['price'] * substr($val['cash_back_rate'],0,strpos($val['cash_back_rate'],"-"))/100,1)."-".round($val['price'] * substr($val['cash_back_rate'],strpos($val['cash_back_rate'],"-"),strlen($val['cash_back_rate'])-1)/100,1)."元";}}else{echo $val['cash_back_rate'];} endif; endif; ?>
				</span> 
                <div class="like_already_list" ></div>
                <div class="btns">
                	<a href="javascript:;" class="like_btn" iid="<?php echo ($val["id"]); ?>"></a>               
                </div>
                <div class="btns">
                	<a href="javascript:;" class="img_album_btn" iid="<?php echo ($val["id"]); ?>"></a>               
                </div>
                <div class="btns">
                	<a href="javascript:;" class="item_commnets" iid="<?php echo ($val["id"]); ?>"></a>               
                </div>
         	</div>
            <div class="title">
                <span><?php if($val['seller_name'] != '' ): ?><span class="fanxian">【<?php echo ($val["seller_name"]); ?>】</span><?php endif; ?><a alt="<?php echo ($val["title"]); ?>" target="_blank" href="<?php echo U('item/index',array('id'=>$val['id']));?>">&nbsp;<?php echo ($val["title"]); ?></a></span>
            </div>
        </div>
        <div class="item_b clearfix" style="position: relative;">
            <!--返利<?php echo ($val["cash_back_rate"]); ?>-->
            <div class="items_likes fl"> 
            	<b href="javascript:;" class="item_commnet" iid="<?php echo ($val["id"]); ?>" iurl="<?php echo u('item/index',array('id'=>$val['id']));?>">喜欢</b>
                <em class="red" id="like_num_<?php echo ($val["id"]); ?>"><?php echo ($val["likes"]); ?></em> 
           	</div>
            <div class="items_comment">
            	<!--a href="<?php echo u('item/index',array('id'=>$val['id']));?>#items_comments" target="_blank">评论</a-->
                <b href="javascript:void(0);" class="item_commnet" id="<?php echo ($val["id"]); ?>">评论</b>
                <em class="red" id="cm_<?php echo ($val["id"]); ?>"><?php echo ($val["comments"]); ?></em> 
            </div>
        </div>  

<div class="user clearfix">
	        	<div class="clearfix comm_share">
	            	<div class="div_fx">
		               <span class="fx"></span><span class="sz"><?php echo ($val["count"]); ?></span> 
					</div>
                    <div class="fxuser">
                    <?php if(is_array($val['likelist'])): $i = 0; $__LIST__ = $val['likelist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="<?php echo getUserFace($vo['uid']);?>"  width="30px" height="30px"/><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
	            </div>		
	  
 
	<?php if(isset($val['three_comments'])): if(is_array($val['three_comments'])): $i = 0; $__LIST__ = $val['three_comments'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comments): $mod = ($i % 2 );++$i;?><div class="clearfix comm_share">
			            	<div class="avatar">
				                <a href="<?php echo u('uc/index',array('uid'=>$comments['user']['id']));?>"><img src="<?php echo getUserFace($comments['user']['id']);?>" class="tipuser" uid='<?php echo ($comments['user']['id']); ?>' width="32px" height="32px"/></a> 
							</div>               
			               <p>
			                	<a href="<?php echo u('uc/index',array('uid'=>$comments['user']['id']));?>"><em><?php echo (msubstr($comments["user"]["name"],0, 10, "utf-8", false)); ?> </em></a>
			                    <span>	                        
			                            <?php echo ($comments["info"]); ?>		                       
			                    </span>
			                </p>
			            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <?php if(isset($val['user'])): ?><div class="clearfix comm_share">
	            	<div class="avatar">
		               <a href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>"><img src="<?php echo getUserFace($val['user']['id']);?>" class="tipuser" uid='<?php echo ($val['user']['id']); ?>' width="32px" height="32px"/></a> 
					</div>
					 <p>
	                	<a href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>"><em><?php echo ($val["user"]["name"]); ?>:</em> </a>分享  
	                    <span>
	                        <?php if($val["remark_status"] == 1): echo ($val["remark"]); endif; ?>
	                    </span>
			         </p>
	            </div><?php endif; ?> 
                <div class="clearfix comm_share" id="comment_<?php echo ($val["id"]); ?>" style="display: none;">
                    <textarea class="plcontent_<?php echo ($val["id"]); ?>" style="width: 200px; height:48px;"></textarea>
	            	<div class="div_fx_pl">
		               <span class="plcount_<?php echo ($val["id"]); ?>" style="display: block;float:left;">100/100</span>
                       <span style="display: block;float: right;"><input class="onsubmit" type="button"/></span>
					</div>
	            </div>
                
                
	<div style="hight:0px;"></div>   
</div>   
        
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
		
        </div>
	</div>
</div>
<script type="text/javascript">
/*
function comment(){
		$('#comments_box').focus();
	}	
	$(function(){
		var iid=<?php echo ($iid); ?>;
		var sid=<?php echo ($sid); ?>;
		$.post("index.php?m=item&a=checkItem", { iid:iid,sid:sid} );
	})
*/	
</script>
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