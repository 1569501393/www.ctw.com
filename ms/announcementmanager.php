<?php

include 'header.php';

?>


<!-- Begin page -->
<div id="wrapper">

<?php

include 'topBar.php';

include 'leftMenu.php';

?>


            <div class="content-page" page="announcementmanager">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">公告管理</h4>
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
                                            <span class="hidden-xs">发布新公告</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">修改/删除公告</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="table-responsive active" id="home-2"> 

										<!-- <div class="col-md-6"> -->
                        					<h4 class="m-t-0 header-title"><b>发布新公告</b></h4>
                        					<p class="text-muted m-b-30 font-13">
												<!-- 您还可以创建999+个子机构. -->
											</p>
											
											<form role="form">
	                                            <div class="form-group">
	                                                <label for="title">公告标题</label>
	                                                <input type="text" class="form-control" id="title" placeholder="">
	                                            </div>

                                                <div class="form-group">
                                                    <label for="title">时间</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="2017-1-2" id="datepicker-autoclose" name="enddate">
                                                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                    </div><!-- input-group -->
                                                </div>

                                                <div class="form-group">
                                                    <label for="number">接收人</label>
                                                    <select class="selectpicker" multiple data-style="btn-white">
                                                        <!-- <option selected="">全部</option> -->
                                                        <option selected="">分行</option>
                                                        <option >机构</option>
                                                        <option >客户经理</option>
                                                    </select>
                                                </div>

                                                <label for="content">公告内容</label>

                                                    <div class="summernote" id="content">
                                                        <h3>请输入公告内容</h3>
                                                    </div>

	                                            <button type="submit" class="btn btn-default waves-effect waves-light">发布</button>
	                                        </form>
                        				<!-- </div> -->
                        			</div>

                                    <!-- </div>  -->
                                    <div class="tab-pane" id="profile-2">


                        			<div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>文章标题</th>
                                                    <th>公告时间</th>
                                                    <th>作者</th>
                                                    <th>操作</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><a href="announcement.php">这是一条公告！！！</a></td>
                                                    <td>2017-1-1</td>
                                                    <td>章三</td>
                                                    <td>
                                                        <button class="btn btn-default waves-effect waves-light">编辑</button>
                                                        <button class="btn btn-danger waves-effect waves-light">删除</button>
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