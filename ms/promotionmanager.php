<?php

include 'header.php';

?>


        <!-- Begin page -->
        <div id="wrapper">

<?php

include 'topBar.php';

include 'leftMenu.php';

?>


            <div class="content-page" page="promotionmanager">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">推广商品</h4>
                                <ol class="breadcrumb">
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">


                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">指定推广商品</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab">
                                        <a href="#yongjin" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">佣金设置</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#shangchuan" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">导入</span> 
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
                                                    <th style="min-width: 80px;">推广给</th>
                                                    <th>选择</th>
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
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option>子机构1</option>
                                                            <option>子机构2</option>
                                                            <option>子机构3</option>
                                                            <option>子机构4</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox11" type="checkbox"> <label for="checkbox11"> 选择</label>
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
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option>子机构1</option>
                                                            <option>子机构2</option>
                                                            <option>子机构3</option>
                                                            <option>子机构4</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox12" type="checkbox"> <label for="checkbox12"> 选择</label>
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
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option>子机构1</option>
                                                            <option>子机构2</option>
                                                            <option>子机构3</option>
                                                            <option>子机构4</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox13" type="checkbox"> <label for="checkbox13"> 选择</label>
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
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option>子机构1</option>
                                                            <option>子机构2</option>
                                                            <option>子机构3</option>
                                                            <option>子机构4</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox14" type="checkbox"> <label for="checkbox14"> 选择</label>
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
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option>子机构1</option>
                                                            <option>子机构2</option>
                                                            <option>子机构3</option>
                                                            <option>子机构4</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox15" type="checkbox"> <label for="checkbox15"> 选择</label>
                                                    </td>
                                                </tr>







                                        <tr>
                                            <td colspan="5">
                                            </td>
                                            <td>
                                            <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5">
                                            </td>
                                            <td>
                                                <button class="btn btn-default waves-effect waves-light">确定</button>

                                            </td>
                                        </tr>



                                            </tbody>
                                        </table>
                                    </div>


                                    </div>



                        <div class="table-responsive active" id="yongjin"> 

                            <div class="col-sm-12 col-lg-12">
                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-4 col-lg-6">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="搜索子机构、类别、商品名称...">
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-2">
                                                <select class="selectpicker m-b-0" multiple data-max-options="1" data-style="btn-white">
                                                    <option selected="">全部类目</option>
                                                    <option>子机构</option>
                                                    <option>类别</option>
                                                    <option>商品名称</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary waves-effect waves-light">搜索</button>
                                            </div>

                                    </div>
                                <table class="table table-actions-bar">
                                    <thead>
                                        <tr>
                                            <th>子机构</th>
                                            <th>类别</th>
                                            <th>商品名称</th>
                                            <th>单价</th>
                                            <th>结算佣金比例</th>
                                            <th>操作</th>
                                            <!-- <th>子机构名称<span class="text-danger">*</span></th> -->
                                            <!-- <th>子机构号<span class="text-danger">*</span></th> -->
                                            <!-- <th>选择</th> -->
                                            <!-- <th>订单状态</th> -->
                                            <!-- <th style="min-width: 80px;">选择</th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>子机构名称</td>
                                            <td>
                                                子机构类别
                                            </td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                            <td>¥4999</td>
                                            <td>5%</td>
                                            <td><a href="#"><i class="md md-edit"></i>修改</a></td>
                                            <!-- <td>某某分行</td> -->
                                            <!-- <td>12345</td> -->
                                            <td>
                                            <input id="checkbox21" type="checkbox"><label for="checkbox21">选择</label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>子机构名称</td>
                                            <td>
                                                子机构类别
                                            </td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                            <td>¥4999</td>
                                            <td>5%</td>
                                            <td><a href="#"><i class="md md-edit"></i>修改</a></td>
                                            <!-- <td>某某分行</td> -->
                                            <!-- <td>12345</td> -->
                                            <td>
                                            <input id="checkbox22" type="checkbox">
                                                <label for="checkbox22">
                                                    选择
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>子机构名称</td>
                                            <td>
                                                子机构类别
                                            </td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                            <td>¥4999</td>
                                            <td>5%</td>
                                            <td><a href="#"><i class="md md-edit"></i>修改</a></td>
                                            <!-- <td>某某分行</td> -->
                                            <!-- <td>12345</td> -->
                                            <td>
                                            <input id="checkbox23" type="checkbox">
                                                <label for="checkbox23">
                                                    选择
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>子机构名称</td>
                                            <td>
                                                子机构类别
                                            </td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                            <td>¥4999</td>
                                            <td>5%</td>
                                            <td><a href="#"><i class="md md-edit"></i>修改</a></td>
                                            <!-- <td>某某分行</td> -->
                                            <!-- <td>12345</td> -->
                                            <td>
                                            <input id="checkbox24" type="checkbox">
                                                <label for="checkbox24">
                                                    选择
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>子机构名称</td>
                                            <td>
                                                子机构类别
                                            </td>
                                            <td><img src="assets/images/products/iphone.jpg" class="thumb-sm pull-left m-r-10" alt=""> 苹果6S plus </td>
                                            <td>¥4999</td>
                                            <td>5%</td>
                                            <td><a href="#"><i class="md md-edit"></i>修改</a></td>
                                            <!-- <td>某某分行</td> -->
                                            <!-- <td>12345</td> -->
                                            <td>
                                            <input id="checkbox25" type="checkbox">
                                                <label for="checkbox25">
                                                    选择
                                                </label>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="5">
                                                <button class="btn btn-default waves-effect waves-light">确定修改</button>
                                            </td>
                                            <td>
                                            <a href="#"><i class="md md-edit"></i>批量修改</a>
                                            </td>
                                            <td>
                                            <input id="checkbox26" type="checkbox">
                                                <label for="checkbox26">
                                                    全选
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td colspan="9">
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" aria-controls="datatable" tabindex="0" id="datatable_previous"><a href="#">上一页</a></li>
                                <li class="paginate_button active" aria-controls="datatable" tabindex="0"><a href="#">1</a></li>
                                <li class="paginate_button " aria-controls="datatable" tabindex="0"><a href="#">2</a></li>
                                <li class="paginate_button " aria-controls="datatable" tabindex="0"><a href="#">3</a></li>
                                <li class="paginate_button " aria-controls="datatable" tabindex="0"><a href="#">4</a></li>
                                <li class="paginate_button " aria-controls="datatable" tabindex="0"><a href="#">5</a></li>
                                <li class="paginate_button " aria-controls="datatable" tabindex="0"><a href="#">6</a></li>
                                <li class="paginate_button next" aria-controls="datatable" tabindex="0" id="datatable_next"><a href="#">下一页</a></li>
                            </ul>
                        </div> 

                        <div class="table-responsive" id="shangchuan">
                        <div class="form-group m-b-0">
                            <label class="control-label">选择Excel文件进行上传</label>
                                <input type="file" class="filestyle" data-buttonname="btn-primary" id="filestyle-4" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                                <div class="bootstrap-filestyle input-group">
                                    <input type="text" class="form-control " placeholder="" disabled="">
                                    <span class="group-span-filestyle input-group-btn" tabindex="0">
                                    <label for="filestyle-4" class="btn btn-primary ">
                                    <span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span>
                                    <span class="buttonText">选择文件</span>
                                    </label>
                                    </span>
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