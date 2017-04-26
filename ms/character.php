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


            <div class="content-page" page="character">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">角色管理</h4>
                                <ol class="breadcrumb">
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">


                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">角色权限设定</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">添加新角色</span> 
                                        </a> 
                                    </li> 
                                </ul> 


                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home"> 
                                        
                                    <div class="row m-t-10 m-b-10">
                                        <div class="col-sm-4 col-lg-6">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="搜索角色名...">
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary waves-effect waves-light">搜索</button>
                                            </div>

                                    </div>



                                    <div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>角色名</th>
                                                    <th>设定日期</th>
                                                    <th style="min-width: 80px;">角色权限</th>
                                                    <th>更新权限</th>
                                                    <th>删除</th>
                                                    <th>编辑</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            管理员
                                                        </a>
                                                    </td>
                                                    <td>2016-01-01</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">机构管理</option>
                                                            <option selected="">佣金管理</option>
                                                            <option selected="">订单明细</option>
                                                            <option selected="">结算管理</option>
                                                            <option selected="">账户管理</option>
                                                            <option >推广商品</option>
                                                            <option >推广管理</option>
                                                            <option >合同管理</option>
                                                            <option >财务管理</option>
                                                            <option >权限管理</option>
                                                            <option >公告管理</option>
                                                            <option >数据分析</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2-2" type="checkbox"> <label for="checkbox2-2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <a href="character-edit.php">编辑</a>
                                                    </td>
                                                <tr>

                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            广告主
                                                        </a>
                                                    </td>
                                                    <td>2016-01-01</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">机构管理</option>
                                                            <option selected="">佣金管理</option>
                                                            <option selected="">订单明细</option>
                                                            <option selected="">结算管理</option>
                                                            <option selected="">账户管理</option>
                                                            <option >推广商品</option>
                                                            <option >推广管理</option>
                                                            <option >合同管理</option>
                                                            <option selected="">财务管理</option>
                                                            <option selected="">权限管理</option>
                                                            <option >公告管理</option>
                                                            <option >数据分析</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-3" type="checkbox"> <label for="checkbox1-3"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2-3" type="checkbox"> <label for="checkbox2-3"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <a href="character-edit.php">编辑</a>
                                                    </td>
                                                <tr>


                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            客户经理
                                                        </a>
                                                    </td>
                                                    <td>2016-01-01</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">机构管理</option>
                                                            <option selected="">佣金管理</option>
                                                            <option selected="">订单明细</option>
                                                            <option selected="">结算管理</option>
                                                            <option selected="">账户管理</option>
                                                            <option selected="">推广商品</option>
                                                            <option selected="">推广管理</option>
                                                            <option >合同管理</option>
                                                            <option >财务管理</option>
                                                            <option >权限管理</option>
                                                            <option >公告管理</option>
                                                            <option >数据分析</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-4" type="checkbox"> <label for="checkbox1-4"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2-4" type="checkbox"> <label for="checkbox2-4"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <a href="character-edit.php">编辑</a>
                                                    </td>
                                                <tr>


                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            分行角色
                                                        </a>
                                                    </td>
                                                    <td>2016-01-01</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">机构管理</option>
                                                            <option selected="">佣金管理</option>
                                                            <option selected="">订单明细</option>
                                                            <option selected="">结算管理</option>
                                                            <option selected="">账户管理</option>
                                                            <option >推广商品</option>
                                                            <option >推广管理</option>
                                                            <option >合同管理</option>
                                                            <option >财务管理</option>
                                                            <option >权限管理</option>
                                                            <option >公告管理</option>
                                                            <option selected="" >数据分析</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <a href="character-edit.php">编辑</a>
                                                    </td>
                                                <tr>


                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            子机构角色
                                                        </a>
                                                    </td>
                                                    <td>2016-01-01</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">机构管理</option>
                                                            <option selected="">佣金管理</option>
                                                            <option selected="">订单明细</option>
                                                            <option selected="">结算管理</option>
                                                            <option selected="">账户管理</option>
                                                            <option >推广商品</option>
                                                            <option >推广管理</option>
                                                            <option >合同管理</option>
                                                            <option >财务管理</option>
                                                            <option >权限管理</option>
                                                            <option >公告管理</option>
                                                            <option >数据分析</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox2" type="checkbox"> <label for="checkbox2"> 选择</label>
                                                    </td>
                                                    <td>
                                                        <a href="character-edit.php">编辑</a>
                                                    </td>
                                                <tr>

                                            <td colspan="3">
                                            </td>
                                            <td>
                                            <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label>
                                            </td>
                                            <td>
                                            <input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3">
                                            </td>
                                            <td>
                                                <button class="btn btn-default waves-effect waves-light">更新</button>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger waves-effect waves-light">删除</button>

                                            </td>
                                        </tr>



                                            </tbody>
                                        </table>
                                    </div>

                                    </div>


                                    <div class="tab-pane" id="home-2"> 


                                    <div style="width: 40%">
                                        <form class="form-horizontal m-t-20" action="">
                                        <div class="form-group">
                                            <label for="name">角色名<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" placeholder="角色名">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">角色权限<span class="text-danger">*</span></label>
                                                <select class="selectpicker" multiple data-style="btn-white">
                                                    <!-- <option selected="">全部</option> -->
                                                    <option >机构管理</option>
                                                    <option >佣金管理</option>
                                                    <option >订单明细</option>
                                                    <option >结算管理</option>
                                                    <option >账户管理</option>
                                                    <option >推广商品</option>
                                                    <option >推广管理</option>
                                                    <option >合同管理</option>
                                                    <option >财务管理</option>
                                                    <option >权限管理</option>
                                                    <option >公告管理</option>
                                                    <option >数据分析</option>
                                                </select>
                                        </div>



                                        <div class="form-group">
                                            <button class="btn btn-default btn-block text-uppercase waves-effect waves-light btn-lg" type="submit">
                                                添加
                                            </button>
                                        </div>


                                        </form>
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