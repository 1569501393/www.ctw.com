<?php
header("Content-type: text/html; charset=utf-8");
//class deskAction extends baseAction
class deskAction extends Action
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

	// 推广链接跳转
	public function prom()
	{
		//        var_dump($_REQUEST);
		M('commission')->where("item_id={$_REQUEST['item_id']} AND shop_id={$_REQUEST['shop_id']} ")->setInc('click');
		$_GET['add_time'] =$_GET['update_time']=  time();
		$_GET['op_time'] =  date('Y-m-d H:i:s');
		$_GET['status'] = $_GET['data_state'] =1;
		$_GET['add_time'] = time();
//		$_GET['add_time'] = time();
		//         var_dump($_GET);
		M('push_log')->add($_GET);

		var_dump("这是跳转页面,您是由{$_GET['sid']}({$_GET['sname']}-{$_GET['user_id']})推广的,我要到商城购物去喽~~");
//		$url =u('desk/buy',array('sid'=>$_SESSION['admin_info']['id'],'sname'=>$_SESSION['admin_info']['user_name'],'item_id'=>$_GET['item_id'],'push_id'=>$_GET['id'],'shop_id'=>$_GET['shop_id'],'con_id'=>$_GET['con_id'],'rate'=>$_GET['rate'],'cate_id'=>$_GET['cate_id'],'shop_id'=>$_GET['shop_id'],'bank_id'=>$_GET['bank_id'],'bank_subid'=>$_SESSION['admin_info']['pid'],'user_id'=>$_SESSION['admin_info']['user_id'] ));
		$url =u('desk/buy',array('sid'=>$_GET['sid'],'seller_name'=>$_GET['sname'],'item_id'=>$_GET['item_id'],'push_id'=>$_GET['id'],'shop_id'=>$_GET['shop_id'],'con_id'=>$_GET['con_id'],'rate'=>$_GET['rate'],'cate_id'=>$_GET['cate_id'],'cate_name'=>$_GET['cate_name'],'shop_id'=>$_GET['shop_id'],'bank_id'=>$_GET['bank_id'],'bank_subid'=>$_GET['bank_subid']));
		echo("模拟购买~<a href='$url'>点击购买</a>");
		//		$this->assign('sort', $sort);
		//		$this->display();
		//        redirect('http://baidu.com');
	}
	
	// 推广链接跳转
	public function buy()
	{
		$item_info = M('items')->where(" shop_id={$_GET['shop_id']} AND item_id={$_GET['item_id']}")->find();
		$commission_info = M('commission')->where(" shop_id={$_GET['shop_id']} AND item_id={$_GET['item_id']} AND platform_id={$_GET['bank_id']} ")->find();
		/*if (empty($commission_info) || empty($item_info)) {
			$this->error('推广信息错误');
		}
		var_dump($item_info);
		var_dump($commission_info);exit;*/
		$_GET['order_id'] = time();
		$_GET['order_time'] = time();
		$_GET['item_count'] = $_GET['item_count']?:1;
		$_GET['item_price'] = $_GET['item_price']?:$item_info['price'];
		$_GET['commission'] = $_GET['item_price']*$_GET['item_count']*$_GET['rate']/100;
		$_GET['sum_price'] = $_GET['item_price']*$_GET['item_count'];
		$_GET['title'] = $_GET['title']?:$item_info['title'];
//		$_GET['cate_id'] = $_GET['cate_id']?:$item_info['cate_id'];
		$_GET['cate_name'] = $_GET['cate_name']?:$item_info['cate_name'];
		$_GET['order_id'] = time();
//		var_dump($_GET);exit;
		$order_id = M('orderlist')->add($_GET);
//		var_dump(M('orderlist')->getLastSql());
		if ($order_id) {
			$this->success('购买成功');
		}
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