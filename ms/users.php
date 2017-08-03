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


            <div class="content-page" page="users">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">用户管理</h4>
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
                                        <div class="col-sm-4 col-lg-6">
                                            <form role="form">
                                                <div class="form-group contact-search m-b-30">
                                                    <input type="text" id="search" class="form-control" placeholder="搜索分行、子机构、客户经理...">
                                                </div>
                                            </form>
                                        </div>
                                            <div class="col-md-2">
                                                <select class="selectpicker m-b-0" multiple data-max-options="1" data-style="btn-white">
                                                    <option selected="">全部类目</option>
                                                    <option>分行</option>
                                                    <option>子机构</option>
                                                    <option>客户经理</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary waves-effect waves-light">查询</button>
                                            </div>

                                    </div>

                        			<div class="table-responsive">
                                        <table class="table table-actions-bar">
                                            <thead>
                                                <tr>
                                                    <th>账号名称</th>
                                                    <th>姓名</th>
                                                     <th>分行</th>
                                                     <th>子机构</th>
                                                    <th style="min-width: 80px;">用户角色</th>
                                                    <th>更新权限</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td>
                                                        <a href="" class="text-dark">
                                                            xxxxxx
                                                        </a>
                                                    </td>
                                                    <td>张三</td>
                                                    <td>北京分行</td>
                                                    <td>海淀支行</td>
                                                    <td>
                                                        <select class="selectpicker" multiple data-style="btn-white">
                                                            <!-- <option selected="">全部</option> -->
                                                            <option selected="">管理员</option>
                                                            <option selected="">客户经理</option>
                                                            <option selected="">分行角色</option>
                                                            <option selected="">子机构角色</option>
                                                            <option selected="">商城角色</option>                                                            
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input id="checkbox1-2" type="checkbox"> <label for="checkbox1-2"> 选择</label>
                                                    </td>
                                                <tr>                                                	                                                	                                                	                                                	

                                            <td colspan="5">
<input id="checkbox2" type="checkbox">
                                                <label for="checkbox2">
                                                    全选
                                                </label> 
                                            </td>
                                            <td>
                                            <button class="btn btn-default waves-effect waves-light">更新</button>
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