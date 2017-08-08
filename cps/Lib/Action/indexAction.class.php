<?php

class indexAction extends baseAction
// class indexAction extends Action
{
	/**
	 * +----------------------------------------------------------
	 * 默认操作
	 * +----------------------------------------------------------
	 */
	public function index()
	{
		$where = '1=1 AND data_state=1 AND status=1 ';
		// 统计累计总高销量前三
		//        $top = M('orderlist')->field('cate_id,sum(item_count) AS sum_count')->where(" $where ")->group('cate_id')->order('sum_count DESC')->limit(3)->select();
		$top = M('orderlist')->field('cate_name,sum(item_count) AS sum_count')->where(" $where ")->group('cate_name')->order('sum_count DESC')->limit(3)->select();
		foreach ($top as $k => $v) {
			switch ($k) {
				case 0:
					$top[$k]['color'] = '#36404a';
					break;
				case 1:
					$top[$k]['color'] = '#5fbeaa';
					break;
				case 2:
					$top[$k]['color'] = '#5d9cec';
					break;
			}
		}
		$this->assign('top', $top);

		// ajax数据曲线图
		if ($_GET['ajax'] == 1) {
			// 统计累计总高销量前三
			/*$where = ' 1=1 AND data_state=1 ';
			 $top = M('orderlist')->field('cate_id,sum(item_count) AS sum_count')->where(" $where ")->group('cate_id')->order('sum_count DESC')->limit(3)->select();*/

			foreach ($top as $v) {
				$cate_id[] = $v['cate_name'];
			}
			//            $cate_ids = implode(',', $cate_id);
			$cate_ids = implode('\',\'', $cate_id);
			$cate_ids = " '$cate_ids' ";

			// 按月统计
			//            $result = M('orderlist')->field('from_unixtime(`order_time`,\'%Y%m\') as months,cate_id, count(id) as count')->where(" $where AND cate_id in ($cate_ids)  ")->group('months,cate_id')->order('months ASC')->select();
			$result = M('orderlist')->field('from_unixtime(`order_time`,\'%Y%m\') as months,cate_name, count(id) as count')->where(" $where AND cate_name in ($cate_ids)  ")->group('months,cate_name')->order('months ASC')->select();
			//            var_dump(M('orderlist')->getLastSql());
			//            var_dump($result);
			foreach ($result as $v) {
				$months[] = $v['months'];
			}

			$months = array_values(array_unique($months));

			$result_new = array();
			foreach ($months as $val) {
				foreach ($cate_id as $v) {
					$result_new[$val]['y'] = $val;
					//                    $result_new[$val][$v] = M('orderlist')->where(" $where AND cate_id ='$v' AND from_unixtime(`order_time`,'%Y%m')=$val ")->getField('count(id) as count');
					$result_new[$val][$v] = M('orderlist')->where(" $where AND cate_name ='$v' AND from_unixtime(`order_time`,'%Y%m')=$val ")->getField('count(id) as count');
				}
			}

			/*$result_new2['data'] = array(
			 array(y => '1月', a => 10, b => 20, c => 30,),
			 array(y => '2月', a => 10, b => 20, c => 30,),
			 array(y => '3月', a => 30, b => 20, c => 30,),
			 array(y => '4月', a => 20, b => 20, c => 30,),
			 array(y => '5月', a => 10, b => 20, c => 30,),
			 array(y => '6月', a => 40, b => 20, c => 30,),
			 array(y => '7月', a => 150, b => 20, c => 30,),
			 array(y => '8月', a => 10, b => 20, c => 30,),
			 array(y => '9月', a => 10, b => 20, c => 30,),
			 );*/

//            var_dump($cate_id);
//            var_dump($result_new);
			
			$result_new2 = array();
			// 获取数量
			foreach ($result_new as $v) {
				//                $result_new2[] = array('y' => $v['y'], 'a' => $v['3'], 'b' => $v['2'], 'c' => $v['1']);
				//                $result_new2['data'][] = array('y' => $v['y'], 'a' => $v['3'], 'b' => $v['2'], 'c' => $v['1']);
				//                $result_new2['data'][] = array('y' => $v['y'], 'a' => $v['数码3'], 'b' => $v['食品3'], 'c' => $v['包包']);
				//                $result_new2['data'][] = array('y' => $v['y'], 'a' => $v[$cate_id[0]], 'b' => $v[$cate_id[2]], 'c' => $v[$cate_id[1]]);
//				$result_new2['data'][] = array('y' => $v['y'], 'a' => $v[$cate_id[2]], 'b' => $v[$cate_id[1]], 'c' => $v[$cate_id[0]]);
				$result_new2['data'][] = array('y' => $v['y'], 'a' => $v[$cate_id[0]], 'b' => $v[$cate_id[1]], 'c' => $v[$cate_id[2]]);
			}


			$result_new2['cate_ids'] = $cate_id;
			//            $result_new2['cate_ids'] = json_encode($cate_id);
			
			echo json_encode($result_new2);
//			$this->display();
			exit;
		}

		// 角色，用户
		if ($_SESSION['admin_info']['role_id'] == 6) { // 客户经理
			$where .= ' AND sid = ' . $_SESSION['admin_info']['id'];
		} elseif ($_SESSION['admin_info']['role_id'] == 5) { // 支行
			$where .= ' AND bank_subid = ' . $_SESSION['admin_info']['id'];
		} elseif ($_SESSION['admin_info']['role_id'] == 4) { // 分行
			$where .= ' AND bank_id = ' . $_SESSION['admin_info']['id'];
		} elseif ($_SESSION['admin_info']['role_id'] == 3) { // 商城
			$where .= ' AND shop_id = ' . $_SESSION['admin_info']['id'];
		} else { // 其它
			//    		$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
		}


		// 获取所在平台id
		/*$platform_id = get_platform_id($_SESSION['admin_info']);
		 if ($platform_id) {
		 $where .= ' AND platform_id= '.$platform_id ;
		 }*/

		// 总计收入
		$result['total_commission'] = round(M('orderlist')->where(" $where ")->getField('SUM(commission)'),2);

		// 销售单数
		$result['total_sales'] = M('orderlist')->where(" $where ")->getField('count(1)');

		// 展示数
		$result['show'] = M('push_log')->where(" $where ")->getField('count(1)');

		// 转化率
		//    	var_dump($result['total_seller']);exit;
//		$result['conversion'] = sprintf("%.2f", $result['total_sales'] / $result['show'] * 100);
		$result['conversion'] = round($result['total_sales'] / $result['show'] * 100, 2);

		// 昨天销售总计
		$result['yesterday_sales'] = round(M('orderlist')->where(" $where AND DATEDIFF(NOW(),FROM_UNIXTIME(order_time))=1 ")->getField('sum(sum_price)'),2);

		// 今日销售总计
		$result['today_sales'] =  round(M('orderlist')->where(" $where AND DATEDIFF(NOW(),FROM_UNIXTIME(order_time))=0 ")->getField('sum(sum_price)'),2);



		// 上周
		$result['lastweek_sales'] = round(M('orderlist')->where(" $where AND DATEDIFF(NOW(),FROM_UNIXTIME(order_time))<=7 ")->getField('sum(sum_price)'),2);

		// 上个月
		$result['lastmonth_sales'] = round(M('orderlist')->where(" $where AND DATEDIFF(NOW(),FROM_UNIXTIME(order_time))<=30 ")->getField('sum(sum_price)'),2);


		// 目标
		$result['today_target'] = round($result['yesterday_sales']?$result['yesterday_sales'] * 1.1:$result['lastmonth_sales']/30 * 1.1,2);

		// 目标完成度
		$result['today_target_rate'] = round($result['today_sales']/$result['today_target']*100,2);
		if ($result['today_target_rate']>100){
			$result['today_target_rate'] = 100;
		}

		// 近期订单
		$result['recent_orders'] = M('orderlist')->where(" $where ")->order('id DESC')->limit(9)->select();
        foreach ($result['recent_orders'] as $k=>$v){
            $item = M('items')->where(" item_id={$v['item_id']} AND shop_id={$v['shop_id']} ")->find();
            $result['recent_orders'][$k]['url'] = $item['url'];
            $result['recent_orders'][$k]['img'] = $item['img'];
        }

		// 统计信息
		//		$result['statistics'] = M('orderlist')->where(" $where ")->order('id DESC')->limit(6)->select();
		/*$result['statistics'] = array(
		array(y => '1月', a => 10, b => 20, c => 30,),
		array(y => '2月', a => 10, b => 20, c => 30,),
		array(y => '3月', a => 30, b => 20, c => 30,),
		array(y => '4月', a => 20, b => 20, c => 30,),
		array(y => '5月', a => 10, b => 20, c => 30,),
		array(y => '6月', a => 40, b => 20, c => 30,),
		array(y => '7月', a => 150, b => 20, c => 30,),
		array(y => '8月', a => 10, b => 20, c => 30,),
		array(y => '9月', a => 10, b => 20, c => 30,),
		);*/

		//        var_dump(json_encode($result['statistics']));
		//        var_dump($result['statistics']);


		$this->assign('result', $result);
        // 角色，用户
        if ($_SESSION['admin_info']['role_id'] == 6) { // 客户经理 6

            $where = '1=1 AND data_state=1  ';
            $platform_id = get_platform_id($_SESSION['admin_info']);

            $where .= " AND status=1 AND (platform_id={$platform_id} OR platform_id=0) ";
            $article_list = D('article')->where($where)->limit('0,1')->order('id DESC,ordid ASC')->select();
//            var_dump($article_list);exit;
            $this->assign('article_list',$article_list);

            $commission_mod = M('commission');
            import("ORG.Util.Page");


            //搜索
//            $where = '1=1 AND con_id>0 ';
            $where = '1=1 AND con_id<1 ';
            $platform_id = get_platform_id($_SESSION['admin_info']);
            $where .= " AND platform_id=" . $platform_id;



            if (isset($_REQUEST['keyword']) && trim($_REQUEST['keyword'])) {

                $where .= " AND (title like '%{$_REQUEST['keyword']}%' OR contract like '%{$_REQUEST['keyword']}%') ";
                $this->assign('keyword', $_REQUEST['keyword']);
            }

            if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
                $where .= " AND con_id=" . $_REQUEST['id'];
                $this->assign('id', $_REQUEST['id']);
            }


            // 分类
            if (isset($_GET['cate_id']) && !empty($_GET['cate_id'])) {
                $where .= " AND cate_name= '{$_GET['cate_id']}' ";
                $this->assign('cate_id', $_GET['cate_id']);
            }

            // 分类表
            $cates = M('items_cate')->where(" status=1 AND data_state=1 ")->select();
            $this->assign('cates', $cates);

            $count = $commission_mod->where($where)->count();
            $this->assign('count', $count);

            // 每页记录数
            $p = new Page($count, 5);
            $commission_list = $commission_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();
//var_dump($commission_mod->getLastSql(),$commission_list);exit;
            $bank_id = get_platform_id($_SESSION['admin_info']);
            //		var_dump($bank_id);exit;
            $key = 1;
            foreach ($commission_list as $k => $val) {
                $commission_list[$k]['key'] = ++$p->firstRow;
                //            $commission_list[$k]['title'] = M('items')->where(" item_id='{$val['item_id']}' ")->getField('title')?:'未入库';
                $commission_list[$k]['bank_id'] = $bank_id;
                //			$commission_list[$k]['bank_subid'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
                $commission_list[$k]['platform_name'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
                $commission_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND status=1 AND data_state=1 ")->select() ?: array();

                // 分润  根据分行设置 暂时屏蔽
                //			$profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}' AND  shop_id={$val['shop_id']} AND  role_id={$role_id} ")->find() ?: array();
                $profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}' AND  shop_id={$val['shop_id']} AND  role_id={$bank_id} ")->find() ?: array();
                $commission_list[$k]['commission2'] = $profit['commission']?:$val['commission'];
                $commission_list[$k]['rate2'] = $profit['rate']?:$val['rate'];

            }
            //		var_dump($commission_list);exit;

            $page = $p->show();
            $this->assign('page', $page);

            // 获取分页页码
            if($_GET['nextrow']){
                $commission_list = $commission_mod->where($where)->limit($_GET['nextrow'] . ','.$p->listRows)->order('id DESC')->select();

                $bank_id = get_platform_id($_SESSION['admin_info']);
                foreach ($commission_list as $k => $val) {
                    $commission_list[$k]['key'] = ++$p->firstRow;
                    $commission_list[$k]['bank_id'] = $bank_id;
                    $commission_list[$k]['platform_name'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
                    $commission_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND status=1 AND data_state=1 ")->select() ?: array();
//                    $profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}'     ")->order('id desc')->find() ?: array();
                    $profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}' AND  shop_id={$val['shop_id']} AND  role_id={$bank_id} ")->find() ?: array();
                    $commission_list[$k]['commission2'] = $profit['commission']?:$val['commission'];
                    $commission_list[$k]['rate2'] = $profit['rate']?:$val['rate'];
                }
                if ($commission_list){
                    $res['data'] = $commission_list;
                    $res['admin_info'] = $_SESSION['admin_info'];
                    echo json_encode( $res );
                }else{
                    echo "1";
                }
                exit;
            }

            $this->assign('commission_list', $commission_list);

            $this->display('index_mb');
        }else{
            $this->display();
        }

	}

	public function ajaxData()
	{
		$result = array(
		array(y => '1月', a => 10, b => 20, c => 30,),
		array(y => '2月', a => 10, b => 20, c => 30,),
		array(y => '3月', a => 30, b => 20, c => 30,),
		array(y => '4月', a => 20, b => 20, c => 30,),
		array(y => '5月', a => 10, b => 20, c => 30,),
		array(y => '6月', a => 40, b => 20, c => 30,),
		array(y => '7月', a => 150, b => 20, c => 30,),
		array(y => '8月', a => 10, b => 20, c => 30,),
		array(y => '9月', a => 10, b => 20, c => 30,),
		//            array('y' => '4月', 'a' => 10, 'b' => 20, 'c' => 30,),
		//            array('y' => '5月', 'a' => 10, 'b' => 20, 'c' => 30,),
		//            array('y' => '6月', 'a' => 10, 'b' => 20, 'c' => 30,),
		//            array('y' => '7月', 'a' => 10, 'b' => 20, 'c' => 30,),
		//            array('y' => '8月', 'a' => 10, 'b' => 20, 'c' => 30,),
		//            array('y' => '9月', 'a' => 10, 'b' => 20, 'c' => 30,),
		);
		//        echo json_encode($result);exit;

		// 统计累计总高销量前三
		$where = ' 1=1 AND data_state=1 ';
		$top = M('orderlist')->field('cate_id,sum(item_count) AS sum_count')->where(" $where ")->group('cate_id')->order('sum_count DESC')->limit(3)->select();

		foreach ($top as $v) {
			$cate_id[] = $v['cate_id'];
		}

		$cate_ids = implode(',', $cate_id);

		// 按月统计
		$result = M('orderlist')->field('from_unixtime(`order_time`,\'%Y%m\') as months,cate_id, count(id) as count')->where(" $where AND cate_id in ($cate_ids)  ")->group('months,cate_id')->order('months ASC')->select();

		foreach ($result as $v) {
			$months[] = $v['months'];
		}

		$months = array_values(array_unique($months));

		foreach ($months as $val) {
			foreach ($cate_id as $v) {
				$result_new[$val]['y'] = $val;
				$result_new[$val][$v] = M('orderlist')->where(" $where AND cate_id ='$v' AND from_unixtime(`order_time`,'%Y%m')=$val ")->getField('count(id) as count');
			}
		}

		foreach ($result_new as $v) {
			$result_new2[] = array('y' => $v['y'], 'a' => $v['3'], 'b' => $v['2'], 'c' => $v['1']);
		}
		echo json_encode($result_new2);
		exit;
	}

	public function qrcode()
	{
		//        $value = I('text'); //获取生成二维码的地址
		$value = 'http://baidu.com'; //获取生成二维码的地址
		$matrixPointSize = I('size', 4, 'intval'); //获取生成二维码的大小，默认4
		if (strpos($value, "http") === 0) {
			$value = urldecode($value);
		}
		vendor("phpqrcode.phpqrcode");
		$errorCorrectionLevel = 'L';//容错级别
		$filepath = './data/upload/';
		//        $QR = $filepath . 'qrcode/' . md5($value) . '.png';
		//        $logo = './logo.png';//已经生成的原始二维码图  背景图

		$logo = 'qrcode_' . time() . '.png';

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
			$scale = $logo_width / $logo_qr_width;
			$logo_qr_height = $logo_height / $scale;
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

		$r = M('node')->field('group_id,module_name,action_name')->where('id=' . $menuid)->find();
		if ($r) {
			$group_id = $r['group_id'];
		}

		$group = M('group')->field('title')->where('id=' . $group_id)->find();
		if ($group) {
			echo $group['title'];
		}
		if ($r) {
			echo '->' . $r['module_name'] . '->' . $r['action_name'];
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


		if (is_dir(CACHE_PATH)) {
			$dir->del(CACHE_PATH);
		}
		if (is_dir(TEMP_PATH)) {
			$dir->del(TEMP_PATH);
		}
		if (is_dir(LOG_PATH)) {
			$dir->del(LOG_PATH);
		}
		if (is_dir(DATA_PATH . '_fields/')) {
			$dir->del(DATA_PATH . '_fields/');
		}

		if (is_dir("./index/Runtime/Cache/")) {
			$dir->del("./index/Runtime/Cache/");
		}

		if (is_dir("./index/Runtime/Temp/")) {
			$dir->del("./index/Runtime/Temp/");
		}

		if (is_dir("./index/Runtime/Logs/")) {
			$dir->del("./index/Runtime/Logs/");
		}

		if (is_dir("./index/Runtime/Data/_fields/")) {
			$dir->del("./index/Runtime/Data/_fields/");
		}
		$this->display('index');
	}
}

?>