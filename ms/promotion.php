<?php

include 'header.php';

?>


        <!-- Begin page -->
        <div id="wrapper">

<?php

include 'topBar.php';

include 'leftMenu.php';

?>


            <div class="content-page" page="promotion">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">推广商品</h4>
                                <ol class="breadcrumb">
<!--                                     <li><a href="#">Ubold</a></li>
                                    <li><a href="#">eCommerce</a></li>
                                    <li class="active">Orders</li>
 -->                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">


                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">选择推广商品</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">推广商品列表</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home-2"> 


                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-4 col-lg-6">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="搜索商品名称、商品id...">
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-2">
                                                <select class="selectpicker m-b-0" multiple data-max-options="1" data-style="btn-white">
                                                    <option selected="">全部类目</option>
                                                    <option>商品名称</option>
                                                    <option>商品ID</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary waves-effect waves-light">搜索</button>
                                            </div>

                                    </div>



                                    <div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>商品名称</th>
                                                    <th>单价(元)</th>
                                                    <th>佣金比例</th>
                                                    <th>推广日期</th>
                                                    <th style="min-width: 80px;">推广</th>
                                                    <!-- <th>选择</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                </tr>



                                        <tr>
                                            <td colspan="4">
                                            </td>
                                            <td>
                                            <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                            </td>
                                            <td>
                                                <button class="btn btn-default waves-effect waves-light">确定推广</button>

                                            </td>
                                        </tr>



                                            </tbody>
                                        </table>
                                    </div>


                                    </div>


                                    <div class="tab-pane" id="profile-2">

                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-4 col-lg-6">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="搜索商品名称、商品id...">
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-2">
                                                <select class="selectpicker m-b-0" multiple data-max-options="1" data-style="btn-white">
                                                    <option selected="">全部类目</option>
                                                    <option>商品名称</option>
                                                    <option>商品ID</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary waves-effect waves-light">搜索</button>
                                            </div>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>商品名称</th>
                                                    <th>类别</th>
                                                    <th>单价(元)</th>
                                                    <th>佣金比例</th>
                                                    <th>推广日期</th>
                                                    <th style="min-width: 80px;">获取推广链接</th>
                                                    <th>取消推广</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>数码家电</td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="#"><i class="ti-link"></i>获取推广链接</a></td>
                                                    <td><input id="checkbox3" type="checkbox"><label for="checkbox3">选择</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>数码家电</td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="#"><i class="ti-link"></i>获取推广链接</a></td>
                                                    <td><input id="checkbox3" type="checkbox"><label for="checkbox3">选择</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>数码家电</td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="#"><i class="ti-link"></i>获取推广链接</a></td>
                                                    <td><input id="checkbox3" type="checkbox"><label for="checkbox3">选择</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>数码家电</td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="#"><i class="ti-link"></i>获取推广链接</a></td>
                                                    <td><input id="checkbox3" type="checkbox"><label for="checkbox3">选择</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 7Plus 64GB.
                                                        </a>
                                                    </td>
                                                    <td>数码家电</td>
                                                    <td>¥4,888</td>
                                                    <td>0.5%</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="#"><i class="ti-link"></i>获取推广链接</a></td>
                                                    <td><input id="checkbox3" type="checkbox"><label for="checkbox3">选择</label>
                                                    </td>
                                                </tr>





                                        <tr>
                                            <td colspan="6">
                                            </td>
                                            <td>
                                            <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="6">
                                            </td>
                                            <td>
                                                <button class="btn btn-default waves-effect waves-light">取消推广</button>

                                            </td>
                                        </tr>


                                            </tbody>
                                        </table>
                                    </div>

                                    </div> 
                                </div> 
                            </div> 

                            
                        </div>

                        
                        
                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->


            </div>
            


<?php

include 'footer.php';

?>