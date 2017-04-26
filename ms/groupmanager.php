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


            <div class="content-page" page="groupmanager">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">机构管理</h4>
                                <ol class="breadcrumb">
<!--                                     <li><a href="#">Ubold</a></li>
                                    <li><a href="#">UI Kit</a></li>
                                    <li class="active">Tabs &amp; Accordions</li>
 -->                                </ol>
                               
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">创建子机构</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">批量导入</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home-2"> 

										<!-- <div class="col-md-6"> -->
                        					<h4 class="m-t-0 header-title"><b>创建子机构</b></h4>
                        					<p class="text-muted m-b-30 font-13">
												您还可以创建999+个子机构.
											</p>
											
											<form role="form">
	                                            <div class="form-group">
	                                                <label for="name">子机构名称</label>
	                                                <input type="name" class="form-control" id="name" placeholder="请输入子机构名称">
	                                            </div>
	                                            <div class="form-group">
	                                                <label for="number">子机构号</label>
	                                                <input type="text" class="form-control" id="number" placeholder="请输入子机构号">
	                                            </div>
	                                            <button type="submit" class="btn btn-purple waves-effect waves-light">创建</button>
	                                        </form>
                        				<!-- </div> -->
                        			</div>

                                    <!-- </div>  -->
                                    <div class="tab-pane" id="profile-2">


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
										<br/>
										<br/>
                        			<div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>客户经理编号(唯一)<span class="text-danger">*</span></th>
                                                    <th>姓名</th>
                                                    <th>手机<span class="text-danger">*</span></th>
                                                    <th>联系邮箱<span class="text-danger">*</span></th>
                                                    <th>所属网点</th>
                                                    <th>结算账户</th>
                                                    <th>子机构名称<span class="text-danger">*</span></th>
                                                    <th>子机构号<span class="text-danger">*</span></th>
                                                    <!-- <th>选择</th> -->
                                                    <!-- <th>订单状态</th> -->
                                                    <th style="min-width: 80px;">选择</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td><a href="#">KHJL#160924</a></td>
                                                    <td>
                                                        <a href="" class="text-dark">章三</a>
                                                    </td>
                                                    <td>13818181818</td>
                                                    <td>zhangsan@minsheng.com</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>某某分行</td>
                                                    <td>12345</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
	                                                </td>
                                                </tr>


                                                <tr>
                                                    <td colspan="8">
	                                                	<button class="btn btn-default waves-effect waves-light">通过审核</button>
	                                                	<button class="btn btn-danger waves-effect waves-light">删除</button>
	                                                	<button class="btn btn-inverse waves-effect waves-light">注销</button>
                                                    </td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
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
                                    <div class="tab-pane" id="messages-2">

                                    </div> 
                                    <div class="tab-pane" id="settings-2">

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