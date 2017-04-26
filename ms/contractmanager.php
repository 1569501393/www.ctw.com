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


            <div class="content-page" page="contractmanager">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">合同管理</h4>
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
                                        <a href="#guanli" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">合同管理</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#luru" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">合同录入</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#rizhi" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">合同日志</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#daochu" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">导出合同</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="table-responsive active" id="guanli"> 

                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-12">
                                            <form role="form">

                                                <label class="col-sm-1 control-label">开始时间</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="startdate">
                                                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                                <label class="col-sm-1 control-label">结束时间</label>
                                                <div class="col-sm-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose2" name="enddate">
                                                        <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            
                                                <label class="col-sm-1 control-label" for="contractNumber">合同编号</label>
                                                <div class="col-sm-3">
                                                    <input type="text" id="contractNumber" name="contractNumber" class="form-control" placeholder="">
                                                </div>

                                                <p style="min-height:10px; display: block;">&nbsp;</p>

                                                    <label class="col-sm-1 control-label">商家</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>商家名称1</option>
                                                            <option>商家名称2</option>
                                                            <option>商家名称3</option>
                                                            <option>商家名称4</option>
                                                            <option>商家名称5</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1 control-label">分销平台</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>分销平台1</option>
                                                            <option>分销平台2</option>
                                                            <option>分销平台3</option>
                                                            <option>分销平台4</option>
                                                            <option>分销平台5</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1 control-label">审核状态</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>已通过</option>
                                                            <option>审核中</option>
                                                            <option>已打回</option>
                                                        </select>
                                                    </div>

                                                <p style="min-height:10px; display: block;">&nbsp;</p>

                                            <!-- <div class="form-group"> -->
                                                <label class="col-sm-1 control-label">结算周期</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control">
                                                        <option>半月</option>
                                                        <option>月</option>
                                                        <option>季度</option>
                                                        <option>年度</option>
                                                    </select>
                                                </div>


                                                <div class="col-sm-1">
                                                    <button class="btn btn-primary waves-effect waves-light">查询</button>
                                                </div>

                                            </form>


                                                <p style="min-height:10px; display: block;">&nbsp;</p>
                                                <p style="min-height:10px; display: block;">&nbsp;</p>
                                        </div>

                                    </div>


                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>分销平台</th>
                                                    <th>合同编号</th>
                                                    <th>合同类型</th>
                                                    <th>商家名称</th>
                                                    <th>结算周期</th>
                                                    <th>账期</th>
                                                    <th>开始时间</th>
                                                    <th>结束时间</th>
                                                    <th>状态</th>
                                                    <th>修改人</th>
                                                    <th>修改时间</th>
                                                    <th>审批人</th>
                                                    <th>选择</th>
                                                    <!-- <th>修改时间</th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>某平台</td>
                                                    <td>HT00001</td>
                                                    <td>合同类型</td>
                                                    <td>某商家</td>
                                                    <td>半年</td>
                                                    <td>半年</td>
                                                    <td>2015-1-1</td>
                                                    <td>2017-1-1</td>
                                                    <td>已通过</td>
                                                    <td>章三</td>
                                                    <td>2016-1-1</td>
                                                    <td>李斯</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>某平台</td>
                                                    <td>HT00001</td>
                                                    <td>合同类型</td>
                                                    <td>某商家</td>
                                                    <td>半年</td>
                                                    <td>半年</td>
                                                    <td>2015-1-1</td>
                                                    <td>2017-1-1</td>
                                                    <td>已通过</td>
                                                    <td>章三</td>
                                                    <td>2016-1-1</td>
                                                    <td>李斯</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>某平台</td>
                                                    <td>HT00001</td>
                                                    <td>合同类型</td>
                                                    <td>某商家</td>
                                                    <td>半年</td>
                                                    <td>半年</td>
                                                    <td>2015-1-1</td>
                                                    <td>2017-1-1</td>
                                                    <td>已通过</td>
                                                    <td>章三</td>
                                                    <td>2016-1-1</td>
                                                    <td>李斯</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>某平台</td>
                                                    <td>HT00001</td>
                                                    <td>合同类型</td>
                                                    <td>某商家</td>
                                                    <td>半年</td>
                                                    <td>半年</td>
                                                    <td>2015-1-1</td>
                                                    <td>2017-1-1</td>
                                                    <td>已通过</td>
                                                    <td>章三</td>
                                                    <td>2016-1-1</td>
                                                    <td>李斯</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>某平台</td>
                                                    <td>HT00001</td>
                                                    <td>合同类型</td>
                                                    <td>某商家</td>
                                                    <td>半年</td>
                                                    <td>半年</td>
                                                    <td>2015-1-1</td>
                                                    <td>2017-1-1</td>
                                                    <td>已通过</td>
                                                    <td>章三</td>
                                                    <td>2016-1-1</td>
                                                    <td>李斯</td>
                                                    <td>
                                                    <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            选择
                                                        </label>
                                                    </td>

                                                </tr>


                                        </table>
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

                                    <!-- </div>  -->
                                    <div class="table-responsive" id="luru">
                                            <form role="form2">
                                                <!-- <div class="form-group"> -->
                                                    <label class="col-sm-1 control-label" for="contractNumber">合同编号</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="contractNumber" name="contractNumber" class="form-control" placeholder="">
                                                    </div>
                                            <!-- <div class="form-group"> -->
                                                <label class="col-sm-1 control-label">合同类型</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control">
                                                        <option>商家</option>
                                                        <option>子机构</option>
                                                        <option>客户经理</option>
                                                    </select>
                                                </div>
                                            <!-- </div> -->
                                                    <label class="col-sm-1 control-label">商家</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>商家名称1</option>
                                                            <option>商家名称2</option>
                                                            <option>商家名称3</option>
                                                            <option>商家名称4</option>
                                                            <option>商家名称5</option>
                                                        </select>
                                                    </div>
                                                <p style="min-height:10px; display: block;">&nbsp;</p>
                                            <!-- <div class="form-group"> -->
                                                <label class="col-sm-1 control-label">结算周期</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control">
                                                        <option>半月</option>
                                                        <option>月</option>
                                                        <option>季度</option>
                                                        <option>年度</option>
                                                    </select>
                                                </div>
                                                    <label class="col-sm-1 control-label">分销平台</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>分销平台1</option>
                                                            <option>分销平台2</option>
                                                            <option>分销平台3</option>
                                                            <option>分销平台4</option>
                                                            <option>分销平台5</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-sm-1 control-label">收款方</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control">
                                                            <option>民生银行信用卡中心</option>
                                                            <option>其他银行?</option>
                                                        </select>
                                                    </div>
                                                <p style="min-height:10px; display: block;">&nbsp;</p>
                                                    <label class="col-sm-1 control-label">开始时间</label>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="startdate">
                                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                        </div><!-- input-group -->
                                                    </div>
                                                    <label class="col-sm-1 control-label">结束时间</label>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="enddate">
                                                            <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                                        </div><!-- input-group -->
                                                    </div>
                                                    <label class="col-sm-1 control-label" for="long">账期(天)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="long" name="long" class="form-control" placeholder="">
                                                    </div>
                                                <p style="min-height:10px; display: block;">&nbsp;</p>

                                                    <label class="col-sm-1 control-label" for="ship">运费(元)</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="ship" name="ship" class="form-control" placeholder="">
                                                    </div>


                                                <p style="min-height:10px; display: block;">&nbsp;</p>
                                                <p style="min-height:10px; display: block;">&nbsp;</p>

                                                    <button class="btn btn-default btn-block text-uppercase waves-effect waves-light btn-lg" type="submit">提交</button>
                                                <!-- </div> -->
                                                <p style="min-height:10px; display: block;">&nbsp;</p>

                                            </form>


                                    </div> 


                                    <div class="table-responsive" id="rizhi">
                                        
                                    </div>
                                    <div class="table-responsive" id="daochu">
                                        
                                    </div>
                            </div> 

                        </div>
                         <!-- end row -->
                         



        </div>
        <!-- END wrapper -->


<?php

include 'footer.php';

?>