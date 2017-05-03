<?php

include 'header.php';


?>

        <div class="account-pages">
            
        <table class="table">
                <thead>
                    <tr>
                        <th>范例</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-basic">普通提示</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-title">提示带描述</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-success">成功！</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-warning">二次确认提示</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-params">二次确认提示2</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-image">图标提示</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="btn btn-info waves-effect waves-light btn-sm" id="sa-close">自动关闭提示</button>
                        </td>
                    </tr>
                </tbody>
            </table>



        </div>
        <div class="clearfix"></div>





        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/detect.js"></script>
        <script src="./assets/js/fastclick.js"></script>
        <script src="./assets/js/jquery.slimscroll.js"></script>
        <script src="./assets/js/jquery.blockUI.js"></script>
        <script src="./assets/js/waves.js"></script>
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/jquery.nicescroll.js"></script>
        <script src="./assets/js/jquery.scrollTo.min.js"></script>
        <script src="./assets/js/jquery.core.js"></script>
        <script src="./assets/js/jquery.app.js"></script>



        <!-- 弹窗提示  -->
        <script src="assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="assets/pages/jquery.sweet-alert.init.js"></script> -->
        <!-- 弹窗提示 end -->



<script type="text/javascript">
    
    !function($) {
    "use strict";

    var SweetAlert = function() {};

    //examples 
    SweetAlert.prototype.init = function() {
        
    //Basic
    $('#sa-basic').click(function(){
        swal("欢迎进入管理系统!");
    });

    //A title with a text under
    $('#sa-title').click(function(){
        swal("欢迎进入管理系统!", "今天天气不错！")
    });

    //Success Message
    $('#sa-success').click(function(){
        swal("成功!", "欢迎进入管理系统！", "success")
    });

    //Warning Message
    $('#sa-warning').click(function(){
        swal({   
            title: "是否确认删除图片?",   
            text: "删除后无法恢复，请确认!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "确认删除!",   
            closeOnConfirm: false 
        }, function(){   
            swal("已删除!", "已将文件彻底删除！", "success"); 
        });
    });

    //Parameter
    $('#sa-params').click(function(){
        swal({   
            title: "是否确认删除图片?",   
            text: "删除后无法恢复，请确认!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "确认删除!",   
            cancelButtonText: "取消!",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                swal("已删除!", "已将文件彻底删除！", "success");   
            } else {     
                swal("已取消", "未进行任何操作", "error");   
            } 
        });
    });

    //Custom Image
    $('#sa-image').click(function(){
        swal({   
            title: "你获得了第1名!",   
            text: "太棒了！恭喜！",   
            imageUrl: "assets/plugins/sweetalert/thumbs-up.jpg" 
        });
    });

    //Auto Close Timer
    $('#sa-close').click(function(){
         swal({   
            title: "登陆成功!",   
            text: "3秒后自动跳转.",   
            timer: 3000,   
            showConfirmButton: false 
        });
    });


    },
    //init
    $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.SweetAlert.init()
}(window.jQuery);


</script>


    </body>
</html>
