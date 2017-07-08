<?php

include 'header_mb.php';
// include 'mobile.php';

?>
<title>消息列表</title>
</head>

<div id="wrapper">

    <!-- <div class="topnavbar"> -->
            <!-- <a href="account_mb.php"><i class="backicon glyphicon glyphicon-chevron-left"></i></a> -->
        <!-- LOGO -->
        <!-- 消息列表 -->
        <!-- Button mobile view to collapse sidebar menu -->
    <!-- </div> -->



    <div class="content-page messagepage">

        <div class="content">


            <div class="row">
                    <ul class="nav nav-tabs tabs">
                        <li class="active tab">
                            <a href="#personal" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs">个人消息</span> 
                                <span class="hidden-xs">个人消息</span> 
                            </a> 
                        </li> 
                        <li class="tab"> 
                            <a href="#system" data-toggle="tab" aria-expanded="false"> 
                                <span class="visible-xs">系统通知</span> 
                                <span class="hidden-xs">系统通知</span> 
                            </a> 
                        </li> 
                    </ul> 
                    <div class="tab-content"> 
                        <div class="tab-pane setting active" id="personal"> 
                            <a href="message_mb.php">
                                <div class="settingsingle">

                                    <div class="redpoint"></div>

                                    <i class="settingicon ti-comment-alt"></i>这里写上消息名称<i class="settingenter ti-angle-right"></i>
                                </div>
                            </a>
                            <div class="settingline"></div>
                            <a href="message_mb.php">
                                <div class="settingsingle">
                                    <i class="settingicon ti-comment-alt"></i>这里写上消息名称<i class="settingenter ti-angle-right"></i>
                                </div>
                            </a>
                            <div class="settingline"></div>
                            <a href="message_mb.php">
                                <div class="settingsingle">
                                    <i class="settingicon ti-comment-alt"></i>这里写上消息名称<i class="settingenter ti-angle-right"></i>
                                </div>
                            </a>

                        </div>
                        <div class="tab-pane setting" id="system">

                            <a href="message_mb.php">
                                <div class="settingsingle">
                                    <i class="settingicon ti-comment-alt"></i>这里写上消息名称<i class="settingenter ti-angle-right"></i>
                                </div>
                            </a>

                            <div class="settingline"></div>
                            <a href="message_mb.php">
                                <div class="settingsingle">
                                    <i class="settingicon ti-comment-alt"></i>这里写上消息名称<i class="settingenter ti-angle-right"></i>
                                </div>
                            </a>


                        </div> 
                    </div> 

           

        </div>


    </div>



<?php

include 'footer_mb.php';

?>
