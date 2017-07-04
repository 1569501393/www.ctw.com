<?php

include 'header_mb.php';
// include 'mobile.php';

?>

    <div id="wrapper">

<?php

// include 'leftMenu.php';

?>

<ul class="bottombar">

    <a href="index_mb.php">
        <li class="bottomnav home">
        <i class="bottomicon glyphicon glyphicon-home"></i>
        <span class="navtitle">首页</span>
        </li>
    </a>
    <a href="shop_mb.php">
        <li class="bottomnav home">
        <i class="bottomicon glyphicon glyphicon-shopping-cart"></i>
        <span class="navtitle">推广商品</span>
        </li>
    </a>
    <a href="lib_mb.php">
        <li class="bottomnav lib">
        <i class="bottomicon glyphicon glyphicon-folder-open"></i>
        <span class="navtitle">推广库</span>
        </li>
    </a>
    <a href="baobiao_mb.php">
        <li class="bottomnav baobiao active">
        <i class="bottomicon glyphicon glyphicon-list-alt"></i>
        <span class="navtitle">报表</span>
        </li>
    </a>
    <a href="account_mb.php">
        <li class="bottomnav account">
        <i class="bottomicon glyphicon glyphicon-user"></i>
        <span class="navtitle">账户</span>
        </li>
    </a>

</ul>

<!-- Top Bar Start -->
<div class="topbar">
        <!-- <i class="backicon glyphicon glyphicon-chevron-left"></i> -->
    <!-- LOGO -->
    报表
    <!-- Button mobile view to collapse sidebar menu -->
</div>
<!-- Top Bar End -->


            <div class="content-page">

                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="input-group searchinput">
                                <!-- <span class="input-group-btn"> -->
                                
                                <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="请输入商品名称或者ID搜索"><button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
                                <!-- </span> -->
                            </div>
                        </div>

                        <div class="row mbselect">
                            
                            <select class="selectpicker" data-max-options="1" data-style="btn-white">
                                <option selected="selected">全部分类</option>
                                <option>数码产品</option>
                                <option>电脑产品</option>
                                <option>电脑附件</option>
                                <option>数码</option>
                                <option>其他</option>
                            </select> 

                        </div>
                        <div class="row mbselect weakselect">
                            
                            <select class="selectpicker" data-max-options="1" data-style="btn-white">
                                <option selected="selected">综合排序</option>
                                <option>单价从高到低</option>
                                <option>押金从低到高</option>
                                <option>佣金比例从高到低</option>
                                <option>30天引入订单从高到低</option>
                                <option>30天累计支出佣金从高到低</option>
                            </select> 

                        </div>


                        <div class="row shopslist contentlist">
                            
                            <div class="singleshop">
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <div class="goodsinfo">
                                    <span class="goodstitle">华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</span>
                                    <span class="goodsdetials">价格:<span class="num">100 </span></span>
                                    <span class="goodsdetials importantinfo">佣金:<span class="num">30</span> <span class="linespace"></span>佣金比例:<span class="num">30%</span></span>
                                </div>
                                <div class="bottomfunc">
                                    <button type="button" class="btn btn-default btn-rounded waves-effect waves-light" onclick="promote(this);" promoteid="goodsid">立即推广</button>
                                    <!-- <button type="button" class="btn btn-white btn-rounded waves-effect waves-light" onclick="promote(this);" promoteid="goodsid">复制链接</button> -->
                                </div>
                            </div>



                        </div>
                    </div>

                </div>

                <footer class="footer text-right">
                    2017 © MS CPS SYSTEM.
                </footer>

            </div>

        </div>




<?php

include 'footer_mb.php';

?>
