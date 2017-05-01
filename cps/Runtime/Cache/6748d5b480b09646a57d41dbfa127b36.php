<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <script>var jyc_begin=new Date().getTime();</script>

    <link rel="shortcut icon" href="__ROOT__/statics/cps/images/favicon_1.ico">

    <title>CPS System</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="__ROOT__/statics/cps/plugins/morris/morris.css">
    <link href="__ROOT__/statics/cps/plugins/summernote/dist/summernote.css" rel="stylesheet" />

    <link href="__ROOT__/statics/cps/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/css/core.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/css/components.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/statics/cps/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="__ROOT__/statics/cps/js/modernizr.min.js"></script>


</head>

<body class="fixed-left" identity="shangcheng">



<div id="wrapper">


                <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><i class="icon-c-logo"><img src="__ROOT__/statics/cps/images/logo_ms.png"></i><span><img src="__ROOT__/statics/cps/images/logoText_ms.png">CPS</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <!-- <input type="text" placeholder="Search..." class="form-control"> -->
			                     <!-- <a href=""><i class="fa fa-search"></i></a> -->
			                </form>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="__ROOT__/statics/cps/images/users/avatar-7.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="user.php"><i class="ti-settings m-r-5"></i>账户设置</a></li>
                                        <li><a href="login.php"><i class="ti-power-off m-r-5"></i>退出登陆</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


                <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>


                            <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><!-- <h3 class="f14"><span class="switchs cu on" title="<?php echo ($lang["expand_or_contract"]); ?>"></span><?php echo ($item["name"]); ?></h3> -->
                                <?php if(is_array($item['navs'])): $i = 0; $__LIST__ = $item['navs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><!-- <li id="_MP<?php echo ($nav["id"]); ?>" class="sub_menu"><a href="javascript:_MP(<?php echo ($nav["id"]); ?>,'<?php echo ($nav["url"]); ?>');" hidefocus="true" style="outline:none;"><?php echo ($nav["action_name"]); ?></a></li> -->
                                    <li class="">
                                <a href="<?php echo ($nav["url"]); ?>" class="waves-effect left-menu" page="announcements"><i class="ti-announcement"></i><span> <?php echo ($nav["action_name"]); ?></span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">公告发布及撤除</a></li> -->
                                <!-- </ul> -->
                            </li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

                        	<!-- <li class="text-muted menu-title">Navigation</li> -->
                            <li class="">
                                <a href="cps.php?" class="waves-effect left-menu" page="announcements"><i class="ti-announcement"></i><span> 联盟公告</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">公告发布及撤除</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <!-- <li class="has_sub"> -->
                            <li>
                                <a href="groupmanager.php" class="waves-effect left-menu" page="groupmanager"><i class="ti-home"></i> <span>机构管理</span> </a>
                                <!-- <ul class="list-unstyled"> -->
                                <!-- <a href="groupmanager.php"><span>机构管理</span> </a> -->
                                    <!-- <li><a href="#">创建子机构</a></li> -->
                                    <!-- <li><a href="#">开通子机构账号</a></li> -->
                                    <!-- <li><a href="#">批量导入</a></li> -->
                                    <!-- <li><a href="#">批量审核</a></li> -->
                                    <!-- <li><a href="#">客户经理账号设置</a></li> -->
                                    <!-- <li><a href="#">删除、注销子机构</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="commisionmanager.php" class="waves-effect left-menu" page="commisionmanager"><i class="ti-money"></i> <span>佣金管理</span> </a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">佣金比例设置</a></li> -->
                                    <!-- <li><a href="#">按照子机构设置</a></li> -->
                                    <!-- <li><a href="#">按照员工设置</a></li> -->
                                    <!-- <li><a href="#">分支主题</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li>
                                <a href="orders.php" class="waves-effect left-menu" page="orders"><i class="ti-files"></i><span> 订单管理</span> </a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="orders.php">查看订单</a></li> -->
                                    <!-- <li><a href="#">来源子机构</a></li> -->
                                    <!-- <li><a href="#">来源客户经理</a></li> -->
                                    <!-- <li><a href="#">佣金扣率</a></li> -->
                                    <!-- <li><a href="#">佣金金额</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="settle.php" class="waves-effect left-menu" page="settle"><i class="ti-wallet"></i> <span>结算管理</span> </a>
                                <!-- <ul class="list-unstyled"> -->
                                	<!-- <li><a href="#">以子机构为单位</a></li> -->
                                    <!-- <li><a href="#">可选择待结算/已结算</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="user.php" class="waves-effect left-menu" page="user"><i class="ti-user"></i><span> 账户管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">用户名密码重置</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="promotion.php" class="waves-effect left-menu" page="promotion"><i class="ti-shopping-cart"></i><span> 推广商品</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">推广商品选择</a></li> -->
                                    <!-- <li><a href="#">链接生成和获取</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <!-- <li id="split-line" class="text-muted menu-title">____________________________</li> -->


                            <li class="">
                                <a href="promotionmanager.php" class="waves-effect left-menu" page="promotionmanager"><i class="ti-bar-chart"></i><span> 推广管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                	<!-- <li><a href="#">推广平台管理</a></li> -->
                                    <!-- <li><a href="promotion2.php" class="left-menu" page="promotion2">推广商品</a></li> -->
                                    <!-- <li><a href="commisionmanager2.php" class="left-menu" page="commisionmanager2">佣金管理</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="contractmanager.php" class="waves-effect left-menu" page="contractmanager"><i class="ti-clipboard"></i><span> 合同管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">分销银行机构合同管理(佣金分润设置)</a></li> -->
                                <!-- </ul> -->
                            </li>
                            <li class="">
                                <a href="finansialmanager.php" class="waves-effect left-menu" page="finansialmanager"><i class="ti-write"></i><span> 财务管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">分销银行机构合同管理(佣金分润设置)</a></li> -->
                                <!-- </ul> -->
                            </li>


                            <li class="">
                                <a href="character.php" class="waves-effect left-menu" page="character"><i class="ti-key"></i><span> 权限管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                	<!-- <li><a href="#">角色设定</a></li> -->
                                    <!-- <li><a href="#">角色权限设定</a></li> -->
                                <!-- </ul> -->
                            </li>
                            <li class="">
                                <a href="users.php" class="waves-effect left-menu" page="users"><i class="ti-user"></i><span> 用户管理</span></a>
                                <!-- <ul class="list-unstyled">
                                	<li><a href="#">角色设定</a></li>
                                    <li><a href="#">角色权限设定</a></li>
                                </ul> -->
                            </li>
                            <li class="">
                                <a href="announcementmanager.php" class="waves-effect left-menu" page="announcementmanager"><i class="ti-announcement"></i><span> 公告管理</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="extra-profile.html">公告发布及撤除</a></li> -->
                                <!-- </ul> -->
                            </li>

                            <li class="">
                                <a href="statistics.php" class="waves-effect left-menu" page="statistics"><i class="ti-pie-chart"></i><span> 数据分析</span></a>
                                <!-- <ul class="list-unstyled"> -->
                                    <!-- <li><a href="#">数据统计</a></li> -->
                                <!-- </ul> -->
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->





    <div class="content-page">

        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <!-- <h4 class="page-title">Dashboard</h4> -->
                        <!-- <p class="text-muted page-title-alt">欢迎回来! X经理!</p> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <div class="bg-icon bg-icon-info pull-left">
                                <i class="md text-info">¥</i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">31,570</b></h3>
                                <p class="text-muted">总计收入</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-pink pull-left">
                                <i class="md md-add-shopping-cart text-pink"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">280</b></h3>
                                <p class="text-muted">销售单数</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-purple pull-left">
                                <i class="md md-equalizer text-purple"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
                                <p class="text-muted">转化率</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="widget-bg-color-icon card-box">
                            <div class="bg-icon bg-icon-success pull-left">
                                <i class="md md-remove-red-eye text-success"></i>
                            </div>
                            <div class="text-right">
                                <h3 class="text-dark"><b class="counter">64,570</b></h3>
                                <p class="text-muted">展示数</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="card-box">
                            <h4 class="text-dark header-title m-t-0 m-b-30">今日目标</h4>

                            <div class="widget-chart text-center">
                                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
                                <h5 class="text-muted m-t-20">今日销售总计</h5>
                                <h2 class="font-600">¥75</h2>
                                <ul class="list-inline m-t-15">
                                    <li>
                                        <h5 class="text-muted m-t-20">目标</h5>
                                        <h4 class="m-b-0">¥1000</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">上周</h5>
                                        <h4 class="m-b-0">¥523</h4>
                                    </li>
                                    <li>
                                        <h5 class="text-muted m-t-20">上个月</h5>
                                        <h4 class="m-b-0">¥965</h4>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="portlet">
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark">统计信息</h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet4"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet4" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #36404a;"></i>日用品</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>家用电器</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>食品</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="morris-line-example" style="height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card-box">
                            <a href="orders.php" class="pull-right btn btn-default btn-sm waves-effect waves-light">查看全部</a>
                            <h4 class="text-dark header-title m-t-0">近期订单</h4>
                            <p class="text-muted m-b-30 font-13">
                                点击可以查看详情
                            </p>

                            <div class="table-responsive">
                                <table class="table table-actions-bar m-b-0">
                                    <thead>
                                    <tr>
                                        <th>商品信息</th>
                                        <th>交易额</th>
                                        <th style="min-width: 80px;">管理</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><img src="__ROOT__/statics/cps/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                        <td><span class="text-custom">+¥1230</span></td>
                                        <td>
                                            <a href="#">我要推广</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="__ROOT__/statics/cps/images/products/samsung.jpg" class="thumb-sm pull-left m-r-10" alt=""> 三星盖乐世7</td>
                                        <td><span class="text-custom">+¥1154</span></td>
                                        <td>
                                            <a href="#">我要推广</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="__ROOT__/statics/cps/images/products/imac.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果iMAC </td>
                                        <td><span class="text-custom">+¥11850</span></td>
                                        <td>
                                            <a href="#">我要推广</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="__ROOT__/statics/cps/images/products/macbook.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果Macbook </td>
                                        <td><span class="text-custom">+¥1560</span></td>
                                        <td>
                                            <a href="#">我要推广</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><img src="__ROOT__/statics/cps/images/products/lumia.jpg" class="thumb-sm pull-left m-r-10" alt=""> 诺基亚 Lumia920</td>
                                        <td><span class="text-custom">+¥1230</span></td>
                                        <td>
                                            <a href="#">我要推广</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>

        <footer class="footer text-right">
            2017 © MS CPS SYSTEM.
        </footer>

    </div>

</div>

<script type="text/javascript">
function check(){
	if($("#myform").attr('action') == '<?php echo u(MODULE_NAME."/delete");?>') {
		var ids='';
		$("input[name='id[]']:checked").each(function(i, n){
			ids += $(n).val() + ',';
		});
		if(ids=='') {
			window.top.art.dialog({content:lang_please_select,lock:true,width:'200',height:'50',time:1.5},function(){});
			return false;
		}
	}
	return true;
}
function status(id,type){
    $.get("<?php echo u(MODULE_NAME.'/status');?>", { id: id, type: type }, function(jsondata){
		var return_data  = eval("("+jsondata+")");
//		$("#"+type+"_"+id+" img").attr('src', '__ROOT__/statics/images/status_'+return_data.data+'.gif');
		$("#"+type+"_"+id+" img").attr('src', "__ROOT__/statics/images/status_"+return_data.data+'.gif');
	});
}
</script>
</body>
</html>