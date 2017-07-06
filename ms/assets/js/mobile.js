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
      //当内容滚动到底部时加载新的内容  
      if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 20) {  
          //当前要加载的页码  

          var type = checkContentType();

          //先出加载动画
          loadingstart(type);

          //在加载程序的最后 移除加载动画
          loadSingle(type);  
      }  
  });  	

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

function promote(which){
	// ajax调取数据
	// var goodsid = $(which).attr('goodsid');

	// var content = {
	// 	'id':goodsid,

	// }

	// var url = 'url.php';
	// $.get(url,content,function(data,status){
		//这个是弹窗
		$('#wrapper').append("<div class='promotemask'><div class='promote portlet'><div class='portlet-heading'><h3 class='portlet-title text-dark'>华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</h3><div class='portlet-widgets'><span class='divider'></span><a href='#' data-toggle='remove'><i class='ion-close-round'></i></a></div></div></div></div>");
		$('.promote').append("<ul class='nav nav-tabs tabs'><li class='tab' style='width:49%'><a href='#linkshare' data-toggle='tab' aria-expanded='false'><span class='visible-xs'>链接推广</span><span class='hidden-xs'>链接推广</span></a></li><li class='tab active' style='width:49%'><a href='#imageshare' data-toggle='tab' aria-expanded='flase'><span class='visible-xs'>图片推广</span><span class='hidden-xs'>图片推广</span></a></li><div class='indicator'></div></ul><div class='tab-content'><div class='tab-pane' id='linkshare'></div><div class='tab-pane active' id='imageshare'></div></div> ");
		
		$('#linkshare').append("<p class='linkcontent'>http://union-click.jd.com/jdc?e=0&p=AyIHZR1eFQITAlweWyUCFQZdH1IdARsFZV8ETVxNNwxeHlQJDBkNXg9JHUlSSkkFSRwSAFQTXxwKEQ5XBAJQXk83VBgySVhqUgt5LUlqa3tTXydtVFtaAxdXewETB1MHWhIeEQREG1IeABsMURJrFDISBlQaWBwAFQRWK2sVAiJGOx1aEwoXN1wdXhYEFg9SG2sVBxoOVRhdHQAbAVweaxcCItDzr4KFv8aY0sLrsNS4qWUrayU%3D&t=W1dCFBBFC1pXUwkEAEAdQFkJBVsSAxoDXBNYHAANXhBHBg%3D%3D</p>");
		$('#imageshare').append("<div class='postpreview'><div class='swiper-container'><div class='swiper-wrapper'><div class='swiper-slide'><img class='wid' src='./assets/images/gallery/101.jpg'></div><div class='swiper-slide'><img class='wid' src='./assets/images/gallery/101.jpg'></div><div class='swiper-slide'><img class='wid' src='./assets/images/gallery/103.jpg'></div></div><div class='swiper-pagination'></div></div></div>");
		//这里是把内容添加到弹窗里
		initSwiper();
	// });


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

function loadSingle(type){
    //这个地方放置 动态加载的语句. 如果加载速度不快的话。建议加一个局部菊花效果. 用ajax重写Content

    if (type=='goodslist') {
	    var content = "<div class='singlegoods'><a href='#'><div class='thumbs'><img class='wid' src='./assets/images/unknown.jpeg'></div></a><div class='goodsinfo'><span class='goodstitle'>华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</span><span class='goodsdetials'>价格:<span class='num'>100</span></span><span class='goodsdetials importantinfo'>佣金:<span class='num'>30</span><span class='linespace'></span>佣金比例:<span class='num'>30%</span></span><button type='button' class='btn btn-default btn-rounded waves-effect waves-light right' onclick='promote(this);' promoteid='goodsid'>立即推广</button></div></div>";
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

