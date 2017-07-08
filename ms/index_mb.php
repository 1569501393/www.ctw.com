<?php

include 'header_mb.php';

?>
<title>民商智惠CPS</title>
</head>


<div id="wrapper">


<ul class="bottombar">

    <a href="index_mb.php">
        <li class="bottomnav home active">
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
        <span class="navtitle">我的推广</span>
        </li>
    </a>
    <a href="baobiao_mb.php">
        <li class="bottomnav baobiao">
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

            <div class="content-page">

                <div class="content">
                    <div class="container">

                        <div class="row fiexdsearch">
                            <div class="input-group searchinput">
                                <!-- <span class="input-group-btn"> -->
                                
                                <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="请输入商品名称或者ID搜索"><button type="button" class="btn waves-effect waves-light btn-primary"><i class="fa fa-search"></i></button>
                                <!-- </span> -->
                            </div>
                        </div>


                        <div class="row">
                            <a href="#">
                            <div class="homebanner">
                            <img class="wid" src="./assets/images/huawei.jpg">
                            </div>
                            </a>
                        </div>


                        <div class="row">
                            <button type="button" class="btn btn-default notification">
                            <span class="notiTitle">公告:</span>

                            <span class="noticontent">
                            <span class="title">公告标题</span>
                            <span class="detials">公告内容公告内容公告内容公告内容公告内容公告内容</span>
                            </span>

                            <span class="btn-label btn-label-right"><i class="fa fa-arrow-right"></i>
                            </span>
                            </button>
                        </div>



                        <div class="row goodslist contentlist">
                            
                            <div class="areatitle">
                            推荐商品
                            </div>


                            <div class="singlegoods">
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <div class="goodsinfo">
                                    <span class="goodstitle">华为 （HUAWEI） nova 4GB+64GB 全金属机身、超级好用</span>
                                    <span class="goodsdetials">价格:<span class="num">100 </span></span>
                                    <span class="goodsdetials importantinfo">佣金:<span class="num">30</span> <span class="linespace"></span>佣金比例:<span class="num">30%</span></span>
                                    <button type="button" class="btn btn-default btn-rounded waves-effect waves-light right" onclick="promote(this);" promoteid="goodsid">立即推广</button>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>




            </div>

        </div>




<?php

include 'footer_mb.php';

?>

