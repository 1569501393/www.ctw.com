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
                                <h4 class="page-title">海报编辑</h4>
                                <ol class="breadcrumb">
                                    <!-- <li><a href="#">Ubold</a></li> -->
                                    <li><a href="posters.php">海报管理</a></li>
                                    <li class="active">更改海报图片</li>
                                </ol>
                               
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs">编辑海报</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="table-responsive active" id="postmanager"> 

										<!-- <div class="col-md-6"> -->
                        					<!-- <h4 class="m-t-0 header-title"><b></b></h4> -->
                        					<p class="text-muted m-b-30 font-13">
                                                    <span class="" style="margin-right: 5%">商品名称：<b>苹果Iphone 7Plus 64GB.</b></span>
                                                    <span class="" style="margin-right: 5%">价格：¥4,888</span>
                                                    <span class="" style="margin-right: 5%">上传时间：2016-01-01</span>
												<!-- 您还可以创建999+个子机构. -->
											</p>
											
                                    <div class="col-lg-12">
                                        <div class="dropzone" id="dropzone">
                                        <div class="form-group m-b-0">
                                            <label class="control-label">上传本地图片</label>
                                            <input type="file" class="filestyle" data-buttonname="btn-primary">
                                        </div>
                                        <div class="clearfix pull-right m-t-15">
                                            <button type="button" class="btn btn-pink btn-rounded waves-effect waves-light">上传</button>
                                        </div>
                                          
                                        </div>
                                    </div>
                                        <div style="padding:10px;height:10px;margin:10px; display: block;position: relative;clear: both;">
                                      </div>

                                    <div class="col-lg-12">
                                        <div action="#" class="dropzone" id="dropzone">
                                        <a  href="#custom-modal" class="" data-animation="fadein" data-plugin="custommodal" 
                                                        data-overlaySpeed="200" data-overlayColor="#36404a">
                                          <div class="fallback">
                                            图片预览：
                                          </div>

                                          <img src="./assets/images/gallery/101.jpg" class="img-thumbnail" style="width: 30%;margin-left: 35%">
                                          查看大图</a>
                                        </div>
                                        <div class="clearfix pull-right m-t-15">
                                      </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <button class="btn btn-default btn-block text-uppercase waves-effect waves-light btn-lg" type="submit">保存</button>

                                    </div>


                        			</div>

                                </div> 
                            </div> 

                        </div>
                         <!-- end row -->
                         



        </div>
        <!-- END wrapper -->


<?php

include 'footer.php';

?>