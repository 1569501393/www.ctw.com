<?php

include 'header.php';

?>

    <div id="wrapper">

<?php

include 'topBar.php';

include 'leftMenu.php';

?>


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
                                                    <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                                    <td><span class="text-custom">+¥1230</span></td>
                                                    <td>
                                                    <a href="#">我要推广</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="assets/images/products/samsung.jpg" class="thumb-sm pull-left m-r-10" alt=""> 三星盖乐世7</td>
                                                    <td><span class="text-custom">+¥1154</span></td>
                                                    <td>
                                                    <a href="#">我要推广</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="assets/images/products/imac.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果iMAC </td>
                                                    <td><span class="text-custom">+¥11850</span></td>
                                                    <td>
                                                    <a href="#">我要推广</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="assets/images/products/macbook.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果Macbook </td>
                                                    <td><span class="text-custom">+¥1560</span></td>
                                                    <td>
                                                    <a href="#">我要推广</a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><img src="assets/images/products/lumia.jpg" class="thumb-sm pull-left m-r-10" alt=""> 诺基亚 Lumia920</td>
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

<?php

include 'footer.php';

?>