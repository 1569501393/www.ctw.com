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
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/index.css" />
<script type="text/javascript" src="__TMPL__public/js/user_tip.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.KinSlideshow-1.2.1.min.js"></script>
<div class="content">
	 <div class="step"><img src="__TMPL__public/images/step.png" /></div>
     <div class="index_top box_shadow mt15 clearfix">
        	<div class="index_focus fl">
            	<script type="text/javascript">
				$(function(){	
						$("#KinSlideshow").KinSlideshow({
								moveStyle:"down",
								intervalTime:5,
								mouseEvent:"mouseover",
								isHasTitleFont:true,
								isHasTitleBar:true,
								titleFont:{TitleFont_size:13,TitleFont_color:"#FF0000"},
								titleBar:{titleBar_height:30,titleBar_alpha:0.5}
						});
				});
				</script>
            	<div id="KinSlideshow" style="visibility:hidden;">
				<?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><a href="<?php echo u('focus/click',array('id'=>$ad['id']));?>" target='_blank'><img src="__ROOT__/<?php echo ($ad["img"]); ?>" alt="<?php echo ($ad["title"]); ?>" width="610" height="280"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
        	</div>
        	<div class="index_active fr">
          		<h3 class="f16">热门<em class="red">活动</em></h3>
         		<div class="hot_area">
            		<div class="l_pic fl">
                    	<a target="_blank" href="<?php if($top_actives['url'] != ''): echo ($top_actives["url"]); else: echo u('article/index',array('id'=>$top_actives['id'])); endif; ?>"><img alt="<?php echo ($top_actives["title"]); ?>" style="width:80px; height:80px;" src="__ROOT__/data/news/<?php echo ($top_actives["img"]); ?>"></a>
                    </div>
            		<div class="r_txt fl">
              			<h3 class="f14"><a target="_blank" href="<?php if($top_actives['url'] != ''): echo ($top_actives["url"]); else: echo u('article/index',array('id'=>$top_actives['id'])); endif; ?>" class="red"><?php echo ($top_actives["title"]); ?></a></h3>
              			<p class="des"><?php echo ($top_actives["abst"]); ?></p>
            		</div>
                    <div class="clearfix"></div>
                    <div class="g_txt mt15">
                      <ul>
                    	<?php if(is_array($hot_actives)): $key = 0; $__LIST__ = $hot_actives;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><li class="clearfix"> <b class="fl"><?php echo ($key); ?></b> <a class="fl f14" target="_blank" href="<?php if($val['url'] != ''): echo ($val["url"]); else: echo u('article/index',array('id'=>$val['id'])); endif; ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>
                    </div>
          		</div>
        	</div>
      	</div>

<?php if($display_b2c_ad == 1): ?><!--B2C随机广告-->
	<div class="mt15">
		<?php if(is_array($ad_rel)): $key = 0; $__LIST__ = $ad_rel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key == 1): ?><a href="javascript:void(0)" style="border:none; margin-right:20px;" onclick="window.open('<?php echo ($val['click_url']); ?>')"><img src="<?php echo ($val["pic_url"]); ?>" /></a>
				<?php else: ?>
				<a href="javascript:void(0)" style="border:none;" onclick="window.open('<?php echo ($val['click_url']); ?>')"><img src="<?php echo ($val["pic_url"]); ?>" /></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div><?php endif; ?>
<!--B2C随机广告结束-->
<!--大家正在喜欢-->
<div class="main_3">
		<div class="latestLike box-shadow">
			<div class="hd">
				<h2><span class="more"><a href="<?php echo u('search/index');?>" target="_blank">更多&gt;</a></span>大家刚刚喜欢了...</h2>
			</div>
			<div class="bd" id="J_LatestLike">
				<div class="luckyMask"></div>
				<ul style="margin-left: 0px; opacity: 1; ">				
					<?php if(is_array($lately_like)): $i = 0; $__LIST__ = $lately_like;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li style="display: list-item; ">
							<div class="luckyBaobei">
								<a href="<?php echo u('item/index',array('id'=>$val['items_id']));?>" target="_blank" title="<?php echo ($val['title']); ?>"><img src="<?php echo ($val["img"]); ?>" alt="<?php echo ($val["title"]); ?>" style="width:120px;" /></a>
							</div>
							<div class="user">						
								<a href="<?php echo u('uc/index',array('uid'=>$val['uid']));?>"><img src="<?php echo getUserFace($val['uid']);?>" class="tipuser" uid='<?php echo ($val['uid']); ?>' width="30px" height="30px"/></a>
								<span class="name ofh"><a href="<?php echo u('uc/index',array('uid'=>$val['uid']));?>" title="<?php echo ($val['uname']); ?>" target="_blank"><?php echo ($val['uname']); ?></a></span>
								<span class="baobeiNum">
									<?php echo ($val['time']); ?>分钟前
								</span>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
	            </ul>
			</div>
		</div>
</div>

<!--刚刚喜欢结束-->
<!--商品循环开始-->
<div id="container">
<?php if(is_array($index_group_cates)): $i = 0; $__LIST__ = $index_group_cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="mt20 clearfix">
    	<span class="fr"><a target="_blank" class="gray" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>">更多<samp>&gt;&gt;</samp></a></span>
        <h2 class="fl index_h2"><span class="bea77d">微购族分享的</span> <a target="_blank" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>"><span class="red" style="font-size:20px;"><?php echo ($val["name"]); ?></span></a></h2>
        <ul class="guide_links fl">
        	<?php if(is_array($val['s'])): $i = 0; $__LIST__ = $val['s'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$sval['id']));?>"><?php echo ($sval["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>    
    <?php if(is_array($val['g'])): $key = 0; $__LIST__ = $val['g'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gval): $mod = ($key % 2 );++$key;?><div class="cate_box <?php if($key%4 == 1): ?>alpha<?php elseif($key%4 == 0): ?>omega<?php endif; ?>">
		<div class="box_shadow mt15 group_box">
		<div class="groupbg">
			<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>"><?php echo ($gval["name"]); ?></a></h3>
			<!--a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="mt5 cursor block g_db_bg"></a-->
				<ul>
	            	<?php if(is_array($gval['items'])): $gikey = 0; $__LIST__ = $gval['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($gikey % 2 );++$gikey;?><li <?php if($gikey == 1): ?>class="first"<?php endif; ?> <?php if(($gikey == 2) or ($gikey == 3) or ($gikey == 6)): ?>style="margin-right: 0;"<?php endif; ?>><a title="<?php echo ($gi['title']); ?>" target="_blank" href="<?php echo U('item/index',array('id'=>$gi['id']));?>"><img alt="<?php echo ($gi['title']); ?>" <?php if($gikey == 1): ?>style="height:130px; max-width:130px;"<?php endif; ?>  url="<?php echo base64_encode($gi['simg']);?>" src="__TMPL__public/images/grey.gif" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			
			<div class="group_desc mt10">
				<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="white">去看看</a></span>
				<span class="share_nums gray"><?php echo ($gval["item_nums"]); ?>个宝贝</span>
			</div>
			<div class="mt10"></div>
		</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clearfix"></div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
<!--广告开始-->
<div class="mt15"><script language="javascript" src="<?php echo u('advert/index', array('id'=>6));?>"></script></div>
<!--广告结束-->
<!--banner效果-->
<script type="text/javascript">
	var photo = "";
	if(photo == ""){
		photo = "http://static.guang.com/images/user/photo/avatar-50.png";
	}else{
		photo = "http://img.guang.com/"+photo;
	}
	GUANGER = { 
		userId:"",
		userPhoto:photo,
		nick:"",
		path:"",
		isBlack: "",
		checkInTotalScore: "", 
		checkInDays: "",
		referer : "",
		login : ""
	}	
</script>
<script type="text/javascript" src="__TMPL__public/js/fan-min.js"></script>
<script type="text/javascript">
$(function() {
	
	var likerLen = $("#J_LatestLike ul").children().length;
	for(var i = 1;i < likerLen;i++){
		var num = likerLen-1-i;
		$("#J_LatestLike ul li:eq("+num+")").appendTo($("#J_LatestLike ul"));
	} 
	for(var j = 0;j < 5;j++){
		$("#J_LatestLike ul").find("li:last").prependTo($("#J_LatestLike ul"));
	}
	$("#J_LatestLike").feedSlider({direction: "right"});
	$("#J_login").click(function(){
		jQuery.guang.dialog.isLogin();
	});
	$("body").css("height","auto");
	$(".startbtn").click(function(){
		$(".startbg").animate({
			marginTop: -1 * $("body").height()
		},500,function(){			
			$(".startbg").hide();
			$(".thepage").fadeIn();
			$("body").css("height","auto");
		});
	});
	$(".startpage .guys li").hover(
		function(){
			$(this).find(".name").animate({
				bottom:0
			},200);
		},
		function(){
			$(this).find(".name").animate({
				bottom:-18
			},200);
		}
	);
	$(".guys").data("loaded",false);
	
	//滚动图初始函数
	$(".scrollable").scrollImg({
		timer:10000,
		startHandle:function(api){
			if(api){
				setTimeout(function(){
					api.playlol(0);
					api.changeClass(0);
					api.autoPlay();
				},10000)
			}
			var lazyScroll = null;
			$(".navi li").each(function(i){
				$(this).unbind();
				$(this).hover(function(){
					if(lazyScroll!=null)clearTimeout(lazyScroll);
					lazyScroll = setTimeout(function(){
						api.changeClass(i);
						api.stopAuto();
						api.playlol(i);
					},200)
				},function(){
					if(lazyScroll!=null)clearTimeout(lazyScroll);
					api.autoPlay();
				})
			}) 
		}
	});
	//延迟加载图片
    $("#container img").lazyload({ 
		effect : "fadeIn",
        threshold : 200
	});

});
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