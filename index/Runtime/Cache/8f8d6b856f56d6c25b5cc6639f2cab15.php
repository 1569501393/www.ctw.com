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
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.masonry.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.infinitescroll.js"></script>
<script type="text/javascript" src="__TMPL__public/js/item.js"></script>
<script type="text/javascript" src="__TMPL__public/js/comments.js"></script>
<script type="text/javascript" src="__TMPL__public/js/album.js"></script>
<script type="text/javascript" src="__TMPL__public/js/user.js"></script>
<script type="text/javascript" src="__TMPL__public/js/user_tip.js"></script>
<div class="content">
	
<?php if($type == 'search'): ?><div class="search_top box_shadow mt15">
        <div class="search_box">
            <form method="get" action="<?php echo u('search/index');?>" onsubmit="return check_search(this);">
                <input type="text" value="<?php echo ($keywords); ?>" name="keywords" id="keyword" class="fl">
                <input type="submit" value="搜索" id="search_btn" class="white tc fl cursor">
            </form>
        </div>
    </div><?php endif; ?>    

    <div class="search_result">
        <?php if($items_list == ''): ?><div class="no_result break_word mt15">很抱歉，没有找到与“<span class="keyword"><?php echo ($keywords); ?></span>”相关的内容</div>
            <?php else: ?>
            <div class="result_header clearfix">
            	<?php if(!empty($keywords)): ?><div class="fl">找到<?php echo ($items_total); ?>条与“<span class="keyword"><?php echo ($keywords); ?></span>”相关的宝贝</div><?php endif; ?>
                <div class="fr">
                    <a href="<?php echo u('search/index',array('sortby'=>'likes','keywords'=>$keywords));?>" <?php if($sortby == 'likes'): ?>class="red"<?php endif; ?>>按喜欢排序</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo u('search/index',array('sortby'=>'time','keywords'=>$keywords));?>" <?php if($sortby == 'time'): ?>class="red"<?php endif; ?>>按时间排序</a>
                </div>
            </div><?php endif; ?>
            <div class="item_list infinite_scroll">  

<?php if($type == 'guang'): ?><div class="box_shadow masonry_brick mt15" style="position: absolute; top: 0px; left: 0px;">
                    <div class="catalog search_catalog clearfix">
                        <div class="catalog_item">
                            <h3 class="no">社区热荐</h3>
                            <div class="clearfix">
                                <a href="<?php echo u('search/index',array('sortby'=>'likes'));?>" class="<?php if($sortby == 'likes'): ?>bg_red<?php endif; ?> jq_corner" data-corner="10px">24小时最热</a>
                                <a href="<?php echo u('search/index',array('sortby'=>'sort_order'));?>" class="<?php if($sortby == 'sort_order'): ?>bg_red<?php endif; ?> jq_corner" data-corner="10px">推荐</a>
                                <a href="<?php echo u('search/index',array('sortby'=>'time'));?>" class="<?php if($sortby == 'time'): ?>bg_red<?php endif; ?> jq_corner" data-corner="10px">最新</a>
                            </div>
                        </div>    
                        <div class="catalog_item">
                            <h3 class="no">热门搜索</h3>
                            <div class="clearfix">
                            	<?php if(is_array($search_keywords)): $i = 0; $__LIST__ = $search_keywords;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo u('search/index',array('keywords'=>$val));?>" 
                                	class="<?php if($request["keywords"] == $val): ?>bg_red<?php endif; ?> jq_corner" 
                                    data-corner="10px"><?php echo ($val); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								 <a href="<?php echo u('search/nocid',array('cid'=>no));?>" class="<?php if(($request["cid"] == $cid) AND ($cid != "")): ?>bg_red<?php endif; ?> jq_corner" >大杂烩</a>
                            </div>
                        </div>                                    	
                    </div>
                </div><?php endif; ?>

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
            <?php if($show_sp == 1): ?><div id="more" class="center"><a href="<?php echo u('search/index',array('sp'=>2,'p'=>$p,'keywords'=>$keywords));?>" hidefocus="true"></a></div><?php endif; ?>
            <?php if($page != ''): ?><div id="page" class="page mt20" style="display: none;"><div class="page_num"><?php echo ($page); ?></div></div><?php endif; ?>
        </if>
    </div>
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