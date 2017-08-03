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


            <div class="content-page" page="character-edit">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">编辑角色</h4>
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
                                            <span class="hidden-xs">编辑角色</span> 
                                        </a> 
                                    </li> 
                                </ul> 


                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home"> 
                                        

                                    <div style="width: 40%">
                                        <form class="form-horizontal m-t-20" action="">
                                        <div class="form-group">
                                            <label for="name">角色名<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" placeholder="管理员">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">角色权限<span class="text-danger">*</span></label>
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
                                        </div>



                                        <div class="form-group">
                                            <button class="btn btn-default btn-block text-uppercase waves-effect waves-light btn-lg" type="submit">
                                                确定
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