<?php
class indexAction extends baseAction
// class indexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
    	$where = '1=1 AND data_state=1 AND status=1 ';
    	
    	// 角色，用户
    	$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
    	// 总计收入
    	$total_commission = M('orderlist')->where(" $where ")->getField('SUM(commission)');
//    	var_dump(M('orderlist')->getLastSql());
//		var_dump($total_commission);exit;
    	// 销售单数
    	// 转化率
    	// 展示数  
    	// 今日销售总计 
    	// 目标 
    	// 上周 
    	// 上个月 
    	// 近期订单
        $this->display('index');
    }


    public function qrcode()
    {
//        $value = I('text'); //获取生成二维码的地址
        $value = 'http://baidu.com'; //获取生成二维码的地址
        $matrixPointSize = I('size',4,'intval'); //获取生成二维码的大小，默认4
        if(strpos($value, "http")===0){
            $value = urldecode($value);
        }
        vendor("phpqrcode.phpqrcode");
        $errorCorrectionLevel = 'L';//容错级别
        $filepath ='./data/upload/';
//        $QR = $filepath . 'qrcode/' . md5($value) . '.png';
//        $logo = './logo.png';//已经生成的原始二维码图  背景图

        $logo = 'qrcode_'.time().'.png';

        //生成二维码图片
//        \QRcode::png($value, $QR, $errorCorrectionLevel, $matrixPointSize, 2, true);
        \QRcode::png($value, $logo, $errorCorrectionLevel, $matrixPointSize, 2);
        // $logo = 'logo.png';//准备好的logo图片
        $QR = 'logo.png';//已经生成的原始二维码图  背景图

        if ($logo !== FALSE) {
            $QR = imagecreatefromstring(file_get_contents($QR));
//            $logo = imagecreatefromstring(file_get_contents($logo));
            $logo_file = imagecreatefromstring(file_get_contents($logo));


            $QR_width = imagesx($QR);//二维码图片宽度
//            var_dump($QR_width,$QR,$logo);exit;
            $QR_height = imagesy($QR);//二维码图片高度
            $logo_width = imagesx($logo_file);//logo图片宽度
            $logo_height = imagesy($logo_file);//logo图片高度
//            $logo_qr_width = $QR_width / 5;
            $logo_qr_width = $QR_width / 2.5;
            $scale = $logo_width/$logo_qr_width;
            $logo_qr_height = $logo_height/$scale;
            $from_width = ($QR_width - $logo_qr_width) / 2;
            //重新组合图片并调整大小
            imagecopyresampled($QR, $logo_file, $from_width, $from_width, 0, 0, $logo_qr_width,
                $logo_qr_height, $logo_width, $logo_height);
        }

//        header("Content-type: image/png");
        // 输出图像
//        imagepng($QR);
        //输出图片
        imagepng($QR, 'helloweba.png');
        echo '<img src="helloweba.png">';
        imagedestroy($QR);




//        $this->display('index');
    }

	/*当前位置*/
    public function current_pos()
    {
        $group_id = intval($_REQUEST['tag']);
        $menuid = intval($_REQUEST['menuid']);

        $r = M('node')->field('group_id,module_name,action_name')->where('id='.$menuid)->find();
        if($r)
        {
            $group_id = $r['group_id'];
        }

        $group = M('group')->field('title')->where('id='.$group_id)->find();
        if($group)
        {
            echo $group['title'];
        }
        if($r)
        {
            echo '->'.$r['module_name'].'->'.$r['action_name'];
        }
        exit;
    }
	/*
	 * 清除缓存
	 * */
    function clearCache()
    {
    	import("ORG.Io.Dir");
    	$dir = new Dir;


    	if (is_dir(CACHE_PATH) )
		{
			$dir->del(CACHE_PATH);
		}
		if (is_dir(TEMP_PATH) )
		{
			$dir->del(TEMP_PATH);
		}
		if (is_dir(LOG_PATH) )
		{
			$dir->del(LOG_PATH);
		}
		if (is_dir(DATA_PATH.'_fields/') )
		{
			$dir->del(DATA_PATH.'_fields/');
		}

		if (is_dir("./index/Runtime/Cache/") )
		{
			$dir->del("./index/Runtime/Cache/");
		}

		if (is_dir("./index/Runtime/Temp/") )
		{
			$dir->del("./index/Runtime/Temp/");
		}

		if (is_dir("./index/Runtime/Logs/") )
		{
			$dir->del("./index/Runtime/Logs/");
		}

		if (is_dir("./index/Runtime/Data/_fields/") )
		{
			$dir->del("./index/Runtime/Data/_fields/");
		}
		$this->display('index');
    }
}
?>