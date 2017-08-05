// 客户经理手机端相关js


jQuery(document).ready(function(){
	// alert('ok!');
	$('.navbar').children('.pull-left').remove();
	$('.topbar').click(function(){
		$('html, body').animate({scrollTop:0},500,function(){
			refresh();
		});
		
	});

  $(window).scroll(function() {  
  	var nextrow=$("#nextrow").val();	//下次加载从nextrow条开始	
  	// alert(nextrow);
      //当内容滚动到底部时加载新的内容  
    if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 20) {  
          //当前要加载的页码  

          var type = checkContentType();

          //先出加载动画
          loadingstart(type);

          //在加载程序的最后 移除加载动画
          loadSingle(type,nextrow);  

    }

    $("#nextrow").val(parseInt(nextrow)+10);	//每次加载10条  
 
  });  	

  $('.allinorder .singlelib').hide();

});

function checkContentType(){
	var type = $('.contentlist').hasClass('goodslist') ? 'goodslist' : 'shopslist';
	return type;
}

// function 点击按钮调用的方法
function refresh(){
    window.location.reload();//刷新当前页面.
    //或者下方刷新方法
    //parent.location.reload()刷新父亲对象（用于框架）--需在iframe框架内使用
    // opener.location.reload()刷新父窗口对象（用于单开窗口
  //top.location.reload()刷新最顶端对象（用于多开窗口）
}

function promote(which,id,item_id,shop_id,commission,rate,price,title,img,sid,bank_subid,user_id){
	// ajax调取数据
	// var goodsid = $(which).attr('goodsid');

	// var content = {
	// 	'id':goodsid,

	// }

	var url = 'cps.php?m=items&a=index&id='+id+'&item_id='+item_id+'&shop_id='+shop_id+'&commission='+commission+'&rate='+rate+'&price='+price+'&json=1';
	$.get(url,function(data,status){
		
		var json = JSON.parse(data);
		// alert(json.data);
		var imgs = json.data;
		var imgs_html = '';
		//这个是弹窗
		$('#wrapper').append("<div class='promotemask'><div class='promote portlet'><div class='portlet-heading'><h3 class='portlet-title text-dark'>"+imgs[0].origin_name+"</h3><div class='portlet-widgets'><span class='divider'></span><a href='#' data-toggle='remove'><i class='fa fa-times closepromote'></i></a></div></div></div></div>");
		$('.promote').append("<ul class='nav nav-tabs tabs'><li class='tab' style='width:49%'><a href='#linkshare' data-toggle='tab' aria-expanded='false'><span class='visible-xs'>链接推广</span><span class='hidden-xs'>链接推广</span></a></li><li class='tab active' style='width:49%'><a href='#imageshare' data-toggle='tab' aria-expanded='flase'><span class='visible-xs'>图片推广</span><span class='hidden-xs'>图片推广</span></a></li><div class='indicator'></div></ul><div class='tab-content'><div class='tab-pane' id='linkshare'></div><div class='tab-pane active' id='imageshare'></div></div> ");
		
		$('#linkshare').append("<p class='linkcontent'>"+json.url+"</p>");

		for(var o in imgs){   
	        imgs_html = imgs_html+"<div class='swiper-slide'><a href='./cps.php?m=items&a=create_poster&sid="+sid+"&item_id="+imgs[o].item_id+"&commission_id="+imgs[o].commission_id+"&shop_id="+imgs[o].shop_id+"&bank_subid="+bank_subid+"&user_id="+
user_id+"&img="+imgs[o].bimg+"&title="+title+"' target='_blank'><img class='wid' src='"+imgs[o].bimg+"'></a></div>";	        

	    }  
	    // alert(imgs_html);

		$('#imageshare').append("<div class='postpreview'><div class='swiper-container'><div class='swiper-wrapper'>"+imgs_html+"</div><div class='swiper-pagination'></div></div></div>");
		//这里是把内容添加到弹窗里
		initSwiper();
	});


}

function initSwiper(){
	var wid = $('.postpreview').width();
	var count = $('.swiper-wrapper .swiper-slide').length;
	var wids = wid*count;
	$('.swiper-wrapper').width(wids);
    var swiper = new Swiper('.swiper-container', {
        zoom: true,
        pagination: '.swiper-pagination',
        // nextButton: '.swiper-button-next',
        // prevButton: '.swiper-button-prev'
    });
}

function loadSingle(type,nextrow){
    //这个地方放置 动态加载的语句. 如果加载速度不快的话。建议加一个局部菊花效果. 用ajax重写Content

    if (type=='goodslist') {
	    // var content = "<div class='singlegoods'><a href='#'><div class='thumbs'><img class='wid' src='./assets/images/unknown.jpeg'></div></a><div class='goodsinfo'><span class='goodstitle'>华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</span><span class='goodsdetials'>价格:<span class='num'>100</span></span><span class='goodsdetials importantinfo'>佣金:<span class='num'>30</span><span class='linespace'></span>佣金比例:<span class='num'>30%</span></span><button type='button' class='btn btn-default btn-rounded waves-effect waves-light right' onclick='promote(this);' promoteid='goodsid'>立即推广</button></div></div>";


	    var url = 'cps.php?m=index&a=index&json=1&nextrow='+nextrow;
	    $.get(url,function(data,status){
		
		// var json = JSON.parse(data);
		var json = data;
		alert(json.data);
		var imgs = json.data;
		var imgs_html = '';

		for(var o in imgs){   
	        imgs_html = imgs_html+imgs[o].title;	        

	    }  
	    alert(imgs_html);

	});


    }else if(type=='shopslist'){
    	var content = "<div class='singleshop'><a href='#'><div class='thumbs'><img class='wid' src='./assets/images/unknown.jpeg'></div></a><div class='goodsinfo'><span class='goodstitle'>华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</span><span class='goodsdetials'>价格:<span class='num'>100 </span></span><span class='goodsdetials importantinfo'>佣金:<span class='num'>30</span> <span class='linespace'></span>佣金比例:<span class='num'>30%</span></span></div><div class='bottominfo'><p>活动时间: <span class='num'>2017年11月11日</span> 至 <span class='num'>2017年11月18日</span></p></div><div class='bottomfunc'><button type='button' class='btn btn-default btn-rounded waves-effect waves-light' onclick='promote(this);' promoteid='goodsid'>立即推广</button></div></div>";
    }

    $('.'+type).append(content);

    //移除加载动画
    loadingend();

}

function loadingstart(type){
    $('.'+type).append("<div class='partloading'><i class='loadingicon ion-load-c fa-spin'></i></div>");
}

function loadingend(){
	$('.partloading').remove();
}


function customincomesearch(form){
	// alert(form.start.value);
	$('.tab.active').removeClass('active').children('a').removeClass('active');
	$('.tab-content .tab-pane.active').removeClass('active');
	$('#customincometab').addClass('active');
	$('.tab-content .tab-pane').each(function(){
		$(this).hide();
	});

	// ajax调取数据
	// $.get();
	$('.tab-content #custom').empty().addClass('active');
	$('.tab-content #custom').append("<div class='recentsingle'><h5>引入订单量</h5><p>13333333</p></div><div class='recentsingle'><h5>引入订单金额</h5><p>¥1333333333</p></div><div class='recentsingle'><h5>预计佣金</h5><p>¥1313333333</p></div>");
	
	$('.tab-content .tab-pane.active').toggle();

}

function extendorder(which){
	if ($(which).hasClass('open')) {
		$(which).parent().children('.allinorder').children('.singlelib').hide();
		$(which).children('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
		$(which).children('span').empty().text('全部商品订单');
		$(which).removeClass('open');
	}else{
		$(which).parent().children('.allinorder').children('.singlelib').show();
		$(which).children('.fa').removeClass('fa-angle-down').addClass('fa-angle-up');
		$(which).children('span').empty().text('收起');
		$(which).addClass('open');
	}
}

