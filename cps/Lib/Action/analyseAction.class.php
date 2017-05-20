<?php

class analyseAction extends baseAction
{
	function index()
	{
		
		//        $order_list = M('commission')->where("item_id={$_REQUEST['item_id']} AND shop_id={$_REQUEST['shop_id']} ")->order('click DESC')->limit(10)->select();
		
		
		//搜索
		$where = '1=1 AND data_state=1 AND status=1 ';
		// 所有客户经理和及机构看到自己所在分行信息
		if (($_SESSION['admin_info']['role_id'] == 5) || ($_SESSION['admin_info']['role_id'] == 6)) {
			$id = get_platform_id($_SESSION['admin_info']);
			$where .= ' AND platform_id= '.$id ;
		}elseif ($_SESSION['admin_info']['role_id'] == 4){
			$where .= ' AND platform_id= '.$_SESSION['admin_info']['id'] ;
		}
		

		// 机构销售业绩排行
		//        $order_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
		$order_list = M('orderlist')->field(array('platform_id',"count(item_id)"=>"cnt", "title", "item_id","sum(sum_price)"=>"sum_price","sum(item_count)"=>"sum_count","SUM(sum_price)"=>"sum_price"))->where(" $where ")->group('platform_id')->order('sum_price DESC')->limit(10)->select();

		foreach ($order_list as $k => $val) {
			$order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
		}

		$this->assign('order_list', $order_list);

		// 机构销售佣金收益排行
		//        $commission_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
		$commission_list = M('orderlist')->field(array('platform_id',"count(item_id)"=>"cnt", "title", "item_id","sum(sum_price)"=>"sum_price","sum(item_count)"=>"sum_count","SUM(sum_price)"=>"sum_price","SUM(commission)"=>"sum_commission"))->where(" $where ")->group('platform_id')->order('sum_commission DESC')->limit(10)->select();
		foreach ($commission_list as $k => $val) {
			$commission_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
		}
		$this->assign('commission_list', $commission_list);

		// 热销商品排行
		$where .= ' AND 1=1';
		$items_list = M('orderlist')->field(array("count(item_id)"=>"cnt", "title", "item_id","sum(sum_price)"=>"sum_price","sum(item_count)"=>"sum_count","SUM(sum_price)"=>"sum_price"))->where(" $where ")->group('item_id')->order('sum_count DESC')->limit(10)->select();
		//        $model->where($opt)->field(array("count(comment)"=>"countCom", "title", "artid")->group('artid')->select();
		//        var_dump($items_list);
		$this->assign('items_list', $items_list);

		$this->display();
	}

	function add()
	{
		if (isset($_POST['dosubmit'])) {

			$flink_mod = M('flink');
			$data = array();
			$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : $this->error(L('input') . L('flink_name'));
			$url = isset($_POST['url']) && trim($_POST['url']) ? trim($_POST['url']) : $this->error(L('input') . L('flink_url'));
			$exist = $flink_mod->where("url='" . $url . "'")->count();
			if ($exist != 0) {
				$this->error('该链接已经存在');
			}
			$data = $flink_mod->create();

			if ($_FILES['img']['name'] != '') {
				$upload_list = $this->_upload($_FILES['img']);
				$data['img'] = $upload_list['0']['savename'];
			}

			$flink_mod->add($data);
			$this->success(L('operation_success'), '', '', 'add');
		} else {
			$flink_cate_mod = D('flink_cate');
			$flink_cate_list = $flink_cate_mod->select();
			$this->assign('flink_cate_list', $flink_cate_list);

			$this->assign('show_header', false);
			$this->display();
		}
	}

	function edit()
	{
		if (isset($_POST['dosubmit'])) {
			$flink_mod = M('flink');
			$data = $flink_mod->create();

			if ($_FILES['img']['name'] != '') {
				$upload_list = $this->_upload($_FILES['img']);
				$data['img'] = $upload_list['0']['savename'];
			}

			$result = $flink_mod->where("id=" . $data['id'])->save($data);
			if (false !== $result) {
				$this->success(L('operation_success'), '', '', 'edit');
			} else {
				$this->error(L('operation_failure'));
			}
		} else {
			$flink_mod = M('flink');
			if (isset($_GET['id'])) {
				$flink_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('请选择要编辑的链接');
			}
			$flink_cate_mod = D('flink_cate');
			$flink_cate_list = $flink_cate_mod->select();
			$this->assign('flink_cate_list', $flink_cate_list);

			$flink_info = $flink_mod->where('id=' . $flink_id)->find();
			$this->assign('flink_info', $flink_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	function del()
	{
		$flink_mod = M('flink');
		if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
			$this->error('请选择要删除的链接！');
		}
		if (isset($_POST['id']) && is_array($_POST['id'])) {
			$flink_ids = implode(',', $_POST['id']);
			$flink_mod->delete($flink_ids);
		} else {
			$flink_id = intval($_GET['id']);
			$flink_mod->where('id=' . $flink_id)->delete();
		}
		$this->success(L('operation_success'));
	}

	function ordid()
	{
		$flink_mod = D('flink');
		if (isset($_POST['listorders'])) {
			foreach ($_POST['listorders'] as $id => $sort_order) {
				$data['ordid'] = $sort_order;
				$flink_mod->where('id=' . $id)->save($data);
			}
			$this->success(L('operation_success'));
		}
		$this->error(L('operation_failure'));
	}

	//修改状态
	function status()
	{
		$flink_mod = D('flink');
		$id = intval($_REQUEST['id']);
		$type = trim($_REQUEST['type']);
		$sql = "update " . C('DB_PREFIX') . "flink set $type=($type+1)%2 where id='$id'";
		$res = $flink_mod->execute($sql);
		$values = $flink_mod->where('id=' . $id)->find();
		$this->ajaxReturn($values[$type]);
	}

}

?>