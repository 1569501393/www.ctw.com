<?php

include 'header_mb.php';

?>

<title>个人设置</title>
</head>

<div id="wrapper" class="secondpage userpage personalset">


<!-- Top Bar Start -->
    <div class="topnavbar">
            <a href="account_mb.php"><i class="backicon glyphicon glyphicon-chevron-left"></i></a>
        <!-- LOGO -->
        个人设置
        <!-- Button mobile view to collapse sidebar menu -->
    </div>


    <div class="content-page">

        <div class="content">

            
            <div class="row">
                <div class="col-lg-12"> 
                    <ul class="nav nav-tabs tabs">
                        <li class="active tab">
                            <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs">我的个人信息</span> 
                                <span class="hidden-xs">我的个人信息</span> 
                            </a> 
                        </li> 
                        <li class="tab"> 
                            <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs">密码修改</span> 
                                <span class="hidden-xs">密码修改</span> 
                            </a> 
                        </li> 
                    </ul> 
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="home-2"> 

                                <!-- <div class=" col-lg-6"> -->
                                <form role="form" >
                                    <div class="form-group">
                                        <label for="name">账号</label>
                                        <input type="name" class="form-control" id="name" placeholder="zheshizhanghao2017" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">姓名</label>
                                        <input type="text" class="form-control" id="number" placeholder="章三">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">分行</label>
                                        <input type="text" class="form-control" id="number" placeholder="朝阳分行">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">子机构</label>
                                        <input type="text" class="form-control" id="number" placeholder="网络部">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">电话</label>
                                        <input type="text" class="form-control" id="number" placeholder="13818181818">
                                    </div>
                                    <div class="form-group">
                                        <label for="number">地址</label>
                                        <input type="text" class="form-control" id="number" placeholder="">
                                    </div>
                                    <button type="submit" class="btn-block btn-default waves-effect waves-light">确定</button>
                                </form>
                            <!-- </div> -->
                        </div>

                        <!-- </div>  -->
                        <div class="tab-pane" id="profile-2">


                        <div class="form-group m-b-0">

                            <form role="form" >
                                <div class="form-group">
                                    <label for="password">原密码</label>
                                    <input type="password" class="form-control" id="password" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">新密码</label>
                                    <input type="password" class="form-control" id="newPassword" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="newPasswordConfirm">确认新密码</label>
                                    <input type="password" class="form-control" id="newPasswordConfirm" placeholder="">
                                </div>
                                <button type="submit" class="btn-block btn-default waves-effect waves-light">确定</button>
                            </form>

                        </div>

                    </div> 
                </div> 

            </div>
             <!-- end row -->

        </div>

    </div>


<?php

include 'footer_mb.php';

?>
