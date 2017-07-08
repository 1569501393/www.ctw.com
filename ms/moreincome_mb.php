<?php

include 'header_mb.php';

?>

<title>报表详情</title>
</head>

<div id="wrapper" class="secondpage incomepage">


<!-- Top Bar Start -->
<div class="topnavbar">
        <a href="baobiao_mb.php"><i class="backicon glyphicon glyphicon-chevron-left"></i></a>
    <!-- LOGO -->
    报表详情
    <!-- Button mobile view to collapse sidebar menu -->
</div>


            <div class="content-page">

                <div class="content">
                    <div class="container">

                        <div class="row libdate">
                            <form name="customincome">
                                开始时间:
                                <input type="date" class="mbdate" placeholder="2017-11-11" name="start" value="2017-11-11" />至
                                <input type="date" class="mbdate" placeholder="2017-11-18" name="end" value="2017-11-18" />
                                <button type="button" class="btn waves-effect waves-light btn-primary" name="confirm" onclick="javascript:customincomesearch(form);">查询</button>
                            </form>
                        </div>


            <div class="row recentincome">
                
                <ul class="nav nav-tabs tabs">
                    <li class="tab active">
                        <a href="#weekly" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs">最近7天</span>
                        <span class="hidden-xs">最近7天</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#monthly" data-toggle="tab" aria-expanded="flase">
                        <span class="visible-xs">最近30天</span>
                        <span class="hidden-xs">最近30天</span>
                        </a>
                    </li>
                    <li class="tab" id="customincometab">
                        <a href="#custom" data-toggle="tab" aria-expanded="flase">
                        <span class="visible-xs">自定义查询</span>
                        <span class="hidden-xs">自定义查询</span>
                        </a>
                    </li>

                </ul>


                <div class="tab-content">

                    <div class="tab-pane active" id="weekly">

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

                        <!-- <div class="portlet"> -->
                            <div id="portlet01" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>点击量</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>预估佣金</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="morris-line-example" style="height:11rem;"></div>
                                </div>
                            </div>
                        <!-- </div> -->


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
                        
                        <!-- <div class="portlet"> -->
                            <div id="portlet02" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="text-center">
                                        <ul class="list-inline chart-detail-list">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>点击量</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>预估佣金</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="morris-line-example" style="height:11rem;"></div>
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>

                    
                    <div class="tab-pane" id="custom">



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
