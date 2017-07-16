<?php

include 'header.php';

?>
    <body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">


<?php

include 'topBar.php';

include 'leftMenu.php';

?>


    <!-- Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">关闭</span>
        </button>
        <h4 class="custom-modal-title">苹果iphone7plus 64gb 海报预览</h4>
        <div class="custom-modal-text">

        <img src="./assets/images/gallery/102.jpg" alt="image" class="img-responsive">

        </div>
    </div>

<!-- 演示用 建议用Ajax动态生成图片预览 -->
    <div id="custom-modal2" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">关闭</span>
        </button>
        <h4 class="custom-modal-title">苹果iphone7plus 64gb 海报预览</h4>
        <div class="custom-modal-text">

        <img src="./assets/images/gallery/101.jpg" alt="image" class="img-responsive">

        </div>
    </div>



            <div class="content-page" page="posters">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">海报管理</h4>
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
                                        <a href="#postmanager" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs">海报管理</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="postmanager"> 


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
                                                    <option>分类</option>
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
                                                    <th>海报预览</th>
                                                    <th>推广日期</th>
                                                    <th style="min-width: 80px;">编辑</th>
                                                    <!-- <th>编辑</th> -->
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
                                                    <td><a href="#custom-modal" class="" data-animation="fadein" data-plugin="custommodal" 
                                                        data-overlaySpeed="200" data-overlayColor="#36404a">
                                                            
                                                        <img src="./assets/images/gallery/102.jpg" alt="image" class="thumb-md">
                                                        查看大图

                                                        </a></td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php">编辑海报</a>
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
                                                    <td><a href="#custom-modal2" class="" data-animation="fadein" data-plugin="custommodal" 
                                                        data-overlaySpeed="200" data-overlayColor="#36404a">
                                                            
                                                        <img src="./assets/images/gallery/101.jpg" alt="image" class="thumb-md">
                                                        查看大图

                                                        </a></td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php">编辑海报</a>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 5Plus 34GB.
                                                        </a>
                                                    </td>
                                                    <td>¥2,888</td>
                                                    <td>尚未上传海报</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php"><i class="ti-upload"></i> 上传海报</a>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 5Plus 34GB.
                                                        </a>
                                                    </td>
                                                    <td>¥2,888</td>
                                                    <td>尚未上传海报</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php"><i class="ti-upload"></i> 上传海报</a>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 5Plus 34GB.
                                                        </a>
                                                    </td>
                                                    <td>¥2,888</td>
                                                    <td>尚未上传海报</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php"><i class="ti-upload"></i> 上传海报</a>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 5Plus 34GB.
                                                        </a>
                                                    </td>
                                                    <td>¥2,888</td>
                                                    <td>尚未上传海报</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php"><i class="ti-upload"></i> 上传海报</a>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            <img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt="">
                                                            苹果Iphone 5Plus 34GB.
                                                        </a>
                                                    </td>
                                                    <td>¥2,888</td>
                                                    <td>尚未上传海报</td>
                                                    <td>2016-01-01</td>
                                                    <td><a href="postedit.php"><i class="ti-upload"></i> 上传海报</a>
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