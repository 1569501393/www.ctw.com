<?php

include 'header.php';

?>


        <!-- Begin page -->
        <div id="wrapper">

<?php

include 'topBar.php';

include 'leftMenu.php';

?>


            <div class="content-page" page="settle">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">结算管理</h4>
                                <ol class="breadcrumb">
<!--                                     <li><a href="#">Ubold</a></li>
                                    <li><a href="#">eCommerce</a></li>
                                    <li class="active">Orders</li>
 -->                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                        		<div class="card-box">
                        			<div class="row m-t-10 m-b-10">
			                        	<div class="col-sm-6 col-lg-8">
			                        		<form role="form">
			                                    <div class="form-group contact-search m-b-30">
			                                    	<input type="text" id="search" class="form-control" placeholder="搜索订单号、商品名称、推广人、订单状态...">
			                                        <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
			                                    </div> <!-- form-group -->
			                                </form>
			                        	</div>

                                        <div class="col-sm-6 col-lg-4">
<!--                                             <div class="h5 m-0">
                                                <span class="vertical-middle">排序:</span>
                                                <div class="btn-group vertical-middle" data-toggle="buttons">
                                                     <label class="btn btn-white btn-md waves-effect active">
                                                        <input type="radio" autocomplete="off" checked="">按状态
                                                     </label>
                                                     <label class="btn btn-white btn-md waves-effect">
                                                        <input type="radio" autocomplete="off">按类型
                                                     </label>
                                                     <label class="btn btn-white btn-md waves-effect">
                                                        <input type="radio" autocomplete="off">按名称
                                                     </label>
                                                </div>
                                            </div>
 -->                                        </div>
			                        </div>

                        			<div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>订单号</th>
                                                    <th>商品名称</th>
                                                    <!-- <th>推广时间</th> -->
                                                    <th>单价(元)</th>
                                                    <th>数量</th>
                                                    <th>佣金比例</th>
                                                    <th>总金额</th>
                                                    <th>下单时间</th>
                                                    <!-- <th>完成时间</th> -->
                                                    <th>推广人</th>
                                                    <!-- <th>结算佣金比例</th> -->
                                                    <th style="min-width: 80px;">结算金额</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td><a href="#">UB#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">苹果Iphone 7Plus 64GB.</a>
                                                    </td>
<!--                                                     <td>2016-4-10 至 2017-4-10</td>
 -->                                                    <td>¥4,888</td>
                                                    <td>99<td>0.5%</td>
                                                    <td>¥125,699</td>
                                                    <td>2017-3-20</td>
                                                    <td>章三</td>

                                                    <td>
                                                    ¥999
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                        		</div>
                                
                            </div> <!-- end col -->

                            
                        </div>

                        
                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->


            </div>
            
            
            <!-- Modal -->
<!-- 			<div id="custom-modal" class="modal-demo">
			    <button type="button" class="close" onclick="Custombox.close();">
			        <span>&times;</span><span class="sr-only">Close</span>
			    </button>
			    <h4 class="custom-modal-title">Add Seller</h4>
			    <div class="custom-modal-text text-left">
			        <form role="form">
			        	<div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group">
                            <label for="position">Contact number</label>
                            <input type="text" class="form-control" id="position" placeholder="Enter number">
                        </div>
                        
                        
                        <button type="submit" class="btn btn-default waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">已取消</button>
                    </form>
			    </div>
			</div>
 -->


<?php

include 'footer.php';

?>