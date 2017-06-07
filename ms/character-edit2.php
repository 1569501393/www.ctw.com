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
                                        

                                    <div >
                                        <form class="form-horizontal m-t-20" action="">
                                        <div class="form-group">
                                            <label for="name">角色名<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" placeholder="管理员">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">角色权限<span class="text-danger">*</span></label>

                                            <div class="p-20">
                                                <table class="table m-0">
                                                    
                                                    <!-- <thead>
                                                        <tr>
                                                            <th class="active">
                                                            <input type="checkbox" name="characterManger" id="characterManger">
                                                            <label for="characterManger">角色管理</label>
                                                            </th>
                                                        
                                                            <td>
                                                            <input type="checkbox" name="powerManger" id="powerManger">
                                                            <label for="powerManger">权限管理</label>
                                                            </td>
                                                        </tr
                                                        >
                                                    </thead> -->
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <td>
                                                            <input type="checkbox" name="userManger" id="userManger">
                                                            <label for="userManger">用户管理</label>
                                                            </td>
                                                            

                                                            <td>
                                                            <input type="checkbox" name="accountManger" id="accountManger">
                                                            <label for="accountManger">账号管理</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        
                                                            <td>
                                                            <input type="checkbox" name="announceManger2" id="announceManger2">
                                                            <label for="announceManger2">公告管理</label>
                                                            </td>
                                                        </tr
                                                        >
                                                        <tr>
                                                            <th class="active">
                                                            <input type="checkbox" name="goodsManger" id="goodsManger">
                                                            <label for="goodsManger">商品管理</label>
                                                            </th>
                                                            
                                                            <td>
                                                            <input type="checkbox" name="commdManger" id="commdManger">
                                                            <label for="commdManger">推广商品</label>
                                                            </td>
                                                            

                                                            <td>
                                                            <input type="checkbox" name="postManger" id="postManger">
                                                            <label for="postManger">海报管理</label>
                                                            </td>
                                                        </tr
                                                        >
                                                        <tr>
                                                            <th class="active">
                                                            <input type="checkbox" name="alyManger" id="alyManger">
                                                            <label for="alyManger">数据分析</label>
                                                            </th>
                                                        
                                                            <td>
                                                            <input type="checkbox" name="alyManger2" id="alyManger2">
                                                            <label for="alyManger2">数据分析</label>
                                                            </td>
                                                        </tr
                                                        >
                                                        <tr>
                                                            <th class="active">
                                                            <input type="checkbox" name="contractManger" id="contractManger">
                                                            <label for="contractManger">合同管理</label>
                                                            </th>
                                                        
                                                            <td>
                                                            <input type="checkbox" name="contractManger2" id="contractManger2">
                                                            <label for="contractManger2">合同管理</label>
                                                            </td>
                                                        </tr
                                                        >
                                                        <tr>
                                                            <th class="active">
                                                            <input type="checkbox" name="moneyManger" id="moneyManger">
                                                            <label for="moneyManger">财务相关</label>
                                                            </th>
                                                            
                                                            <td>
                                                            <input type="checkbox" name="commisionmanager" id="commisionmanager">
                                                            <label for="commisionmanager">佣金管理</label>
                                                            </td>
                                                            

                                                            <td>
                                                            <input type="checkbox" name="finansialmanager" id="finansialmanager">
                                                            <label for="finansialmanager">财务管理</label>
                                                            </td>
                                                            

                                                            <td>
                                                            <input type="checkbox" name="promotionmanager" id="promotionmanager">
                                                            <label for="promotionmanager">推广管理</label>
                                                            </td>
                                                            

                                                            <td>
                                                            <input type="checkbox" name="settlemanager" id="settlemanager">
                                                            <label for="settlemanager">结算管理</label>
                                                            </td>
                                                        </tr
                                                        >
                                                    </tbody>
                                                </table>
                                            </div>



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