<?php

include 'header_mb.php';

?>

<title>我的推广</title>
</head>

<div id="wrapper">

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
        <li class="bottomnav lib active">
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

<!-- Top Bar Start -->
<!-- <div class="topbar"> -->
    <!-- 单个标题直接写名字就好 -->
    <!-- 推广库 -->


    <!-- 需要做切换到时候用 -->
    <!-- <a href="#"><div class="togglenav active">推广商品库</div></a> -->
    <!-- <a href="#"><div class="togglenav">推广活动库</div></a> -->
    
    <!-- Button mobile view to collapse sidebar menu -->
<!-- </div> -->
<!-- Top Bar End -->


            <div class="content-page">

                <div class="content">
                    <div class="container">

                        <div class="row libdate">
                            <form name="">
                                开始时间:
                                <input type="date" class="mbdate" placeholder="2017-11-11" name="start" />至
                                <input type="date" class="mbdate" placeholder="2017-11-18" name="end" />
                                <button type="button" class="btn waves-effect waves-light btn-primary" name="confirm">确定</button>
                            </form>
                        </div>

                        <div class="row liblist contentlist">
                            <div class="singlelib">
                                <div class="promotiondate">
                                    分享时间:<span class="info">2017-11-11</span>
                                    <a href="promotions_mb.php"><div class="enterbtn">查看商品<i class="settingenter ti-angle-right"></i></div></a>
                                </div>
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <a href="#"><div class="thumbs"><img class="wid" src="./assets/images/unknown.jpeg"></div></a>
                                <div class="libdetials">
                                    <!-- 创建时间:<span class="weakinfo">2011-11-11 13:33</span> -->
                                    商品数:<span class="num">4</span>
                                </div>
                                <div class="bottomfunc">
<!--                                     <button type="button" class="btn btn-default btn-rounded waves-effect waves-light right" onclick="promote(this);" promoteid="goodsid">立即推广</button> -->
                                    <button type="button" class="btn btn-white btn-rounded waves-effect waves-light right">添加商品</button>
                                    <button type="button" class="btn btn-white btn-rounded waves-effect waves-light right">删除</button>
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
