<?php

include 'header_mb.php';

?>

<title>效果报表</title>
</head>

<div id="wrapper" class="incomepage">

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
        <span class="navtitle">我的推广</span>
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
<!-- <div class="topbar"> -->
        <!-- <i class="backicon glyphicon glyphicon-chevron-left"></i> -->
    <!-- LOGO -->
    <!-- 报表 -->
    <!-- Button mobile view to collapse sidebar menu -->
<!-- </div> -->
<!-- Top Bar End -->


<div class="content-page">

    <div class="content">
        <div class="container">

            <div class="row">

                <div class="income">
                    
                    <div class="incomehalf">
                    <h4>可结算金额</h4>
                    <p>¥1,170</p>
                    </div>
                    
                    <div class="incomehalf">
                    <h4>年度收入总额</h4>
                    <p>¥1,170,000</p>
                    </div>


                    <button type="button"  class="btn btn-white incomebtn" value="">申请提现</button>
                    <button type="button"  class="btn btn-white incomebtn" value="">申请记录</button>

                </div>

            </div>

            <dir class="row recentincome">
                
                <ul class="nav nav-tabs tabs">
                    <li class="tab active" style="width:33%">
                        <a href="#yesterday" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs">昨日</span>
                        <span class="hidden-xs">昨日</span>
                        </a>
                    </li>
                    <li class="tab" style="width:33%">
                        <a href="#weekly" data-toggle="tab" aria-expanded="flase">
                        <span class="visible-xs">最近7天</span>
                        <span class="hidden-xs">最近7天</span>
                        </a>
                    </li>
                    <li class="tab" style="width:33%">
                        <a href="#monthly" data-toggle="tab" aria-expanded="flase">
                        <span class="visible-xs">最近30天</span>
                        <span class="hidden-xs">最近30天</span>
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="yesterday">

                        <div class="recentsingle">
                            <h5>引入订单量</h5>
                            <p>13</p>
                        </div>
                        <div class="recentsingle">
                            <h5>引入订单金额</h5>
                            <p>¥133</p>
                        </div>
                        <div class="recentsingle">
                            <h5>预计佣金</h5>
                            <p>¥131</p>
                        </div>

                    <div class="row bottomfunc">
                        <a class="btn btn-white incomebtn" href="moreincome_mb.php">查看更多</a> 
                    </div>

                    </div>
                    <div class="tab-pane " id="weekly">

                        <div class="recentsingle">
                            <h5>引入订单量</h5>
                            <p>133</p>
                        </div>
                        <div class="recentsingle">
                            <h5>引入订单金额</h5>
                            <p>¥1333</p>
                        </div>
                        <div class="recentsingle">
                            <h5>预计佣金</h5>
                            <p>¥1313</p>
                        </div>

                    <div class="row bottomfunc">
                        <button type="button"  class="btn btn-white incomebtn" value="">查看更多</button> 
                    </div>

                    </div>
                    <div class="tab-pane " id="monthly">

                        <div class="recentsingle">
                            <h5>引入订单量</h5>
                            <p>1333</p>
                        </div>
                        <div class="recentsingle">
                            <h5>引入订单金额</h5>
                            <p>¥13333</p>
                        </div>
                        <div class="recentsingle">
                            <h5>预计佣金</h5>
                            <p>¥13133</p>
                        </div>

                    <div class="row bottomfunc">
                        <button type="button"  class="btn btn-white incomebtn" value="">查看更多</button> 
                    </div>


                    </div>
                </div>


            </dir>


                
            <div class="row setting">

                <a href="incomedetials_mb.php">
                    <div class="settingsingle">
                        收入明细<i class="settingenter ti-angle-right"></i>
                    </div>
                </a>
                <div class="settingline"></div>
                <a href="orderdetials_mb.php">
                    <div class="settingsingle">
                        订单明细<i class="settingenter ti-angle-right"></i>
                    </div>
                </a>

            </div>




            </div>
        </div>

    </div>


    </div>

</div>




<?php

include 'footer_mb.php';

?>
