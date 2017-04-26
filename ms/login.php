<?php

include 'header.php';


?>


        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading">
                    <img src="assets/images/logo_color.jpg">CPS
                <h3 class="text-center"><strong class="text-custom">登陆</strong> </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="index.html">
                
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="用户名">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required="" placeholder="密码">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                                记住此账号
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-default btn-block text-uppercase waves-effect waves-light btn-lg" type="submit">登陆</button>

                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="recover.php" class="text-dark"><i class="fa fa-lock m-r-5"></i>找回密码</a>
                    </div>
                    <div style="padding-top: 35px; text-align: center;">
                    <a href="index.php?identity=fenhang"><button type="button" class="btn btn-inverse btn-custom waves-effect waves-light">分行</button></a>
                    <a href="index.php?identity=zijigou"><button type="button" class="btn btn-purple btn-custom waves-effect waves-light">子机构</button></a>
                    <a href="index.php?identity=kehujingli"><button type="button" class="btn btn-pink btn-custom waves-effect waves-light">客户经理</button></a>
                    </div>
                </div>
            </form> 
            
            </div>   
            </div>                              
                <div class="row">
            	<div class="col-sm-12 text-center">
            		<p>尚未注册账号？<a href="register.php" class="text-primary m-l-5"><b>注册新账号</b></a></p>
                        
                    </div>
            </div>
            
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>