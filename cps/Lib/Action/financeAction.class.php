<?php
class financeAction extends baseAction {
	// 佣金管理
	function commission() {

		//		$items_mod = M('items');
		$commission_mod = M('commission');
		import("ORG.Util.Page");

		//搜索
		$where = '1=1';
		$where .= " AND con_id>0 ";

		if ($_SESSION['admin_info']['commission_id']==3) {
			$where .= " AND shop_id={$_SESSION['admin_info']['id']} ";
		}if ($_SESSION['admin_info']['commission_id']==4) {
			$where .= " AND platform_id={$_SESSION['admin_info']['id']} ";
		}if ($_SESSION['admin_info']['commission_id']==5) {
			$where .= " AND platform_id={$_SESSION['admin_info']['id']} ";
		}if ($_SESSION['admin_info']['commission_id']==6) {
			$where .= " AND platform_id={$_SESSION['admin_info']['id']} ";
		}

		if (isset($_GET['keyword']) && trim($_GET['keyword'])) {
			$where .= " AND (title like '%{$_GET['keyword']}%' OR contract like '%{$_GET['keyword']}%') ";
			$this->assign('keyword', $_GET['keyword']);
		}
		//		if (isset($_POST['id']) && intval($_POST['id'])) {
		//			$where .= " AND con_id=" . $_POST['id'];
		//			$this->assign('con_id', $_POST['id']);
		//		}

		if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
			$where .= " AND con_id={$_REQUEST['id']} ";
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
		$p = new Page($count, 10);
		$commission_list = $commission_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

		$key = 1;

		// 判断角色  分行和商城直接看角色  支行和客户经理看分行  暂时屏蔽
		$commission_id = $_SESSION['admin_info']['commission_id'];
		if (($_SESSION['admin_info']['commission_id'] == 5)) { // 支行
			$commission_id = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('commission_id');
		} elseif (($_SESSION['admin_info']['commission_id'] == 6)) { // 客户经理
			$pid = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('pid');
			$commission_id = M('admin')->where('id=' . $pid)->getField('commission_id');
		}

		foreach ($commission_list as $k => $val) {
			$commission_list[$k]['key'] = ++$p->firstRow;
			//            $commission_list[$k]['title'] = M('items')->where(" item_id={$val['item_id']} ")->getField('title')?:'未入库';
			$commission_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			// 分润  根据分行设置 暂时屏蔽
			//			$profit = M('commission')->where(" con_id<1 AND item_id={$val['item_id']} AND  shop_id={$val['shop_id']} AND  commission_id={$commission_id} ")->find() ?: array();
			$profit = M('commission')->where(" con_id<1 AND item_id={$val['item_id']}   ")->order('id desc')->find() ?: array();
			$commission_list[$k]['commission2'] = $profit['commission']?:$val['commission'];
			$commission_list[$k]['rate2'] = $profit['rate']?:$val['rate'];
			$commission_list[$k]['item'] = M('items')->where(" item_id={$val['item_id']}  AND shop_id={$val['shop_id']}  ")->find() ?: array();
			//            $commission_list[$k]['contract'] = M('contract')->where(" id={$val['con_id']} ")->find()?:'未入库';
		}

		//		var_dump($commission_list);exit;

		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('site_root', $this->site_root);
		$this->assign('commission_list', $commission_list);
		$this->display();
	}

	// 推广管理
	function push() {
		//		$items_mod = M('items');
		$commission_mod = M('commission');
		import("ORG.Util.Page");

		//搜索
		$where = '1=1 AND con_id>0 ';
		if (isset($_GET['keyword']) && trim($_GET['keyword'])) {

			$where .= " AND (title like '%{$_GET['keyword']}%' OR contract like '%{$_GET['keyword']}%') ";
			$this->assign('keyword', $_GET['keyword']);
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
		$p = new Page($count, 10);
		$commission_list = $commission_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

		$bank_id = get_platform_id($_SESSION['admin_info']);
		//		var_dump($bank_id);exit;
		$key = 1;
		foreach ($commission_list as $k => $val) {
			$commission_list[$k]['key'] = ++$p->firstRow;
			//            $commission_list[$k]['title'] = M('items')->where(" item_id={$val['item_id']} ")->getField('title')?:'未入库';
			$commission_list[$k]['band_id'] = $bank_id;
			//			$commission_list[$k]['band_subid'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			$commission_list[$k]['platform_name'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			//			$commission_list[$k]['file'] = M('file')->where(" item_id={$val['item_id']} AND status=1 AND data_state=1 ")->select() ?: array();
			// 分润  根据分行设置 暂时屏蔽
			//			$profit = M('commission')->where(" con_id<1 AND item_id={$val['item_id']} AND  shop_id={$val['shop_id']} AND  commission_id={$commission_id} ")->find() ?: array();
			$profit = M('commission')->where(" con_id<1 AND item_id={$val['item_id']}   ")->order('id desc')->find() ?: array();
			$commission_list[$k]['commission2'] = $profit['commission']?:$val['commission'];
			$commission_list[$k]['rate2'] = $profit['rate']?:$val['rate'];

		}

		//		var_dump($commission_list);exit;

		$page = $p->show();
		$this->assign('page', $page);

		$this->assign('commission_list', $commission_list);
		$this->display();
	}

	// 财务管理
	function finance() {
		//搜索
		$where = '1=1 AND data_state=1 AND status=1 ';
		// 角色，用户
		if ($_SESSION['admin_info']['commission_id'] == 6) { // 客户经理
			$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 5) { // 支行
			$where .= ' AND bank_subid = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 4) { // 分行
			$where .= ' AND bank_id = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 3) { // 商城
			$where .= ' AND shop_id = '.$_SESSION['admin_info']['id'];
		}else { // 其它
			//    		$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
		}
		if (isset($_GET['title']) && trim($_GET['title'])) {
			$where .= " AND title like '%{$_GET['title']}%' ";
			$this->assign('title', $_GET['title']);
		}
		if (isset($_GET['seller_name']) && trim($_GET['seller_name'])) {
			$where .= " AND seller_name like '%{$_GET['seller_name']}%' ";
			$this->assign('seller_name', $_GET['seller_name']);
		}

		if (isset($_GET['begin_time']) && intval($_GET['begin_time'])) {
			$where .= " AND order_time>=" . strtotime($_GET['begin_time']);
			$this->assign('begin_time', $_GET['begin_time']);
		}

		if (isset($_GET['end_time']) && intval($_GET['end_time'])) {
			$date_obj = new DateTime($_GET['end_time']);
			$where .= " AND order_time<=" . $date_obj->format('U');
			$this->assign('end_time', $_GET['end_time']);
		}

		//		if (isset($_GET['settle_status']) && intval($_GET['settle_status'])) {
		if ( isset($_GET['settle_status']) && $_GET['settle_status']!== '' ) {
			$where .= " AND settle_status=" . $_GET['settle_status'];
			$this->assign('settle_status', $_GET['settle_status']);
		}


		$orderlist_mod =M('orderlist');

		// 导出数据
		if ($_REQUEST['dosubmit']== 2) {
			$xlsName = "财务详情";
			$xlsCell = array(
			//			array('id', '序号'),
			array('order_id', '订单号'),
			array('title', '商品名称'),
			array('item_price', '单价(元)'),
			array('item_count', '数量'),
			array('sum_price', '总金额'),
			array('rate2', '分润比例'),
			array('commission2', '分润'),
			array('order_time', '下单时间'),
			array('seller_name', '推广人'),
			);

			if ($_SESSION['admin_info']['commission_id'] !=6 ) {
				$xlsCell[] = array('rate', '佣金比例');
				$xlsCell[] = array('commission', '佣金');
			}
			//			$xlsData = $orderlist_mod->Field('id,order_id,title,item_price,item_count,sum_price,commission,order_time,seller_name,settle_price')->where($where)->order('id DESC')->select();
			$xlsData = $orderlist_mod->Field('*')->where($where)->order('id DESC')->select();

			//			var_dump($orderlist_mod->getLastSql(),$xlsData);exit;
			foreach ($xlsData as $k => $v) {
				/*$xlsData[$k]['order_time'] = date('Y-m-d H:i:s', $v['order_time']);
				 $xlsData[$k]['rate'] = $v['commission']/$v['item_price'];
				 // 转化为百分比
				 $xlsData[$k]['rate'] = $xlsData[$k]['rate']*100 .'%';*/

				$xlsData[$k]['order_time'] = date('Y-m-d H:i:s', $v['order_time']);
				$xlsData[$k]['order_id'] = ' '.$v['order_id'];
				$xlsData[$k]['rate'] = $v['commission']/$v['item_price'];
				$xlsData[$k]['commission'] = $v['commission']*$v['item_count'];

				$xlsData[$k]['rate2'] = $v['commission2']/$v['item_price']?:$xlsData[$k]['rate'];
				$xlsData[$k]['commission2'] = $v['commission2']*$v['item_count']?:$xlsData[$k]['commission'];

				// 转化为百分比
				$xlsData[$k]['rate'] = $xlsData[$k]['rate']*100 .'%';
				$xlsData[$k]['rate2'] = $xlsData[$k]['rate2']*100 .'%';

			}
			$this->exportExcel(array(), $xlsName, $xlsCell, $xlsData, $xlsName);

		}
		import("ORG.Util.Page");
		$count = $orderlist_mod->where($where)->count();
		$p = new Page($count, 10);
		$order_list = $orderlist_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();

		$key = 1;
		foreach ($order_list as $k => $val) {
			$order_list[$k]['key'] = ++$p->firstRow;
			$order_list[$k]['rate'] = $val['commission']/$val['sum_price'];
			//			$order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';

			$item = M('items')->where(" item_id={$val['item_id']} AND shop_id={$val['shop_id']} ")->find();
			$order_list[$k]['url'] = $item['url'];
			$order_list[$k]['img'] = $item['img'];

			$order_list[$k]['rate2'] = $val['commission2']/$val['item_price']?:$order_list[$k]['rate'];
			$order_list[$k]['commission2'] = $val['commission2']*$val['item_count']?:$order_list[$k]['commission'];
		}
		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('order_list', $order_list);

		// 结算状态
		$settle_status_arr = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'settle_status\' ')->select();
		$this->assign('settle_status_arr', $settle_status_arr);

		$this->display();
	}

	// 结算管理
	function settle() {
		//搜索
		$where = '1=1 AND data_state=1 AND status=1 ';
		// 角色，用户
		if ($_SESSION['admin_info']['commission_id'] == 6) { // 客户经理
			$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 5) { // 支行
			$where .= ' AND bank_subid = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 4) { // 分行
			$where .= ' AND bank_id = '.$_SESSION['admin_info']['id'];
		}elseif ($_SESSION['admin_info']['commission_id'] == 3) { // 商城
			$where .= ' AND shop_id = '.$_SESSION['admin_info']['id'];
		}else { // 其它
			//    		$where .= ' AND sid = '.$_SESSION['admin_info']['id'];
		}
		if (isset($_GET['title']) && trim($_GET['title'])) {
			$where .= " AND title like '%{$_GET['title']}%' ";
			$this->assign('title', $_POST['title']);
		}
		if (isset($_GET['seller_name']) && trim($_GET['seller_name'])) {
			$where .= " AND seller_name like '%{$_GET['seller_name']}%' ";
			$this->assign('seller_name', $_GET['seller_name']);
		}

		// 分类
		if (isset($_GET['cate_id']) && !empty($_GET['cate_id'])) {
			$where .= " AND cate_name= '{$_GET['cate_id']}' ";
			$this->assign('cate_id', $_GET['cate_id']);
		}

		// 分类表
		$cates = M('items_cate')->where(" status=1 AND data_state=1 ")->select();
		$this->assign('cates', $cates);

		$orderlist_mod =M('orderlist');

		// 导出数据
		if ($_REQUEST['dosubmit']== 2) {
			$xlsName = "结算详情";
			$xlsCell = array(
			//			array('id', '序号'),
			array('order_id', '订单号'),
			array('title', '商品名称'),
			array('item_price', '单价(元)'),
			array('item_count', '数量'),
			array('sum_price', '总金额'),
			array('rate2', '分润比例'),
			array('commission2', '分润'),
			array('order_time', '下单时间'),
			array('seller_name', '推广人'),
			);

			if ($_SESSION['admin_info']['commission_id'] !=6 && $_SESSION['admin_info']['commission_id'] !=5 ) {
				$xlsCell[] = array('rate', '佣金比例');
				$xlsCell[] = array('commission', '佣金');
			}
			//			$xlsData = $orderlist_mod->Field('id,order_id,title,item_price,item_count,sum_price,commission,order_time,seller_name,settle_price')->where($where)->order('id DESC')->select();
			$xlsData = $orderlist_mod->Field('*')->where($where)->order('id DESC')->select();

			//			var_dump($orderlist_mod->getLastSql(),$xlsData);exit;
			foreach ($xlsData as $k => $v) {
				$xlsData[$k]['order_time'] = date('Y-m-d H:i:s', $v['order_time']);
				$xlsData[$k]['order_id'] = ' '.$v['order_id'];
				$xlsData[$k]['rate'] = $v['commission']/$v['item_price'];
				$xlsData[$k]['commission'] = $v['commission']*$v['item_count'];

				$xlsData[$k]['rate2'] = $v['commission2']/$v['item_price']?:$xlsData[$k]['rate'];
				$xlsData[$k]['commission2'] = $v['commission2']*$v['item_count']?:$xlsData[$k]['commission'];

				// 转化为百分比
				$xlsData[$k]['rate'] = $xlsData[$k]['rate']*100 .'%';
				$xlsData[$k]['rate2'] = $xlsData[$k]['rate2']*100 .'%';
			}
			$this->exportExcel(array(), $xlsName, $xlsCell, $xlsData, $xlsName);

		}
		import("ORG.Util.Page");
		$count = $orderlist_mod->where($where)->count();
		$p = new Page($count, 10);
		$order_list = $orderlist_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();

		$key = 1;
		foreach ($order_list as $k => $val) {
			$order_list[$k]['key'] = ++$p->firstRow;
			$order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			$order_list[$k]['settle_status'] = ($val['settle_status3_ctb'] && $val['settle_status4_btc']) ?:0;
			$order_list[$k]['rate2'] = $val['commission2']/$val['item_price']?:$order_list[$k]['rate'];
			$order_list[$k]['commission2'] = $val['commission2']*$val['item_count']?:$order_list[$k]['commission'];

			$item = M('items')->where(" item_id={$val['item_id']} AND shop_id={$val['shop_id']} ")->find();
			$order_list[$k]['url'] = $item['url'];
			$order_list[$k]['img'] = $item['img'];
		}
		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('order_list', $order_list);
		$this->display();
	}

	function index() {
		$link_mod = M('commission');
		import("ORG.Util.Page");
		$prex = C('DB_PREFIX');

		//搜索
		$where = '1=1';
		if (isset($_GET['keyword']) && trim($_GET['keyword'])) {
			$where .= " AND (" . $prex . "commission.name LIKE '%" . $_GET['keyword'] . "%' or url LIKE '%" . $_GET['keyword'] . "%')";
			$this->assign('keyword', $_GET['keyword']);
		}
		if (isset($_GET['cate_id']) && intval($_GET['cate_id'])) {
			$where .= " AND cate_id=" . $_GET['cate_id'];
			$this->assign('cate_id', $_GET['cate_id']);
		}

		$count = $link_mod->where($where)->count();
		$p = new Page($count, 10);
		$link_list = $link_mod->where($where)->field($prex . 'commission.*,' . $prex . 'commission_cate.name as cate_name')->join('LEFT JOIN ' . $prex . 'commission_cate ON ' . $prex . 'commission.cate_id = ' . $prex . 'commission_cate.id ')->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'commission.ordid ASC')->select();

		$key = 1;
		foreach ($link_list as $k => $val) {
			$link_list[$k]['key'] = ++$p->firstRow;
		}
		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('big_menu', $big_menu);
		$this->assign('link_list', $link_list);
		$this->display();
	}

	function add() {
		if (isset($_REQUEST['dosubmit'])) {

			$commission_mod = M('commission');
			$data = array();
			$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : $this->error(L('input') . L('commission_name'));
			$url = isset($_POST['url']) && trim($_POST['url']) ? trim($_POST['url']) : $this->error(L('input') . L('commission_url'));
			$exist = $commission_mod->where("url='" . $url . "'")->count();
			if ($exist != 0) {
				$this->error('该链接已经存在');
			}
			$data = $commission_mod->create();

			if ($_FILES['img']['name'] != '') {
				$upload_list=$this->_upload($_FILES['img']);
				$data['img'] = $upload_list['0']['savename'];
			}

			$commission_mod->add($data);
			$this->success(L('operation_success'), '', '', 'add');
		} else {
			$commission_cate_mod = D('commission_cate');
			$commission_cate_list = $commission_cate_mod->select();
			$this->assign('commission_cate_list', $commission_cate_list);

			$this->assign('show_header', false);
			$this->display();
		}
	}


	// 编辑单个佣金
	function edit_commission() {
		if(isset($_POST['dosubmit'])){
			$commission_mod = D('commission');
			if (false === $commission_mod->create()) {
				$this->error($commission_mod->getError());
			}
			$result = $commission_mod->save();
//			var_dump($commission_mod->getLastSql());exit;
			if(false !== $result){
				$this->success(L('operation_success'), '', '', 'index');
			}else{
				$this->error(L('operation_failure'));
			}
		}else{
			if( isset($_GET['id']) ){
				$id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
			}
			$commission_mod = D('commission');
			$commission_info = $commission_mod->where('id='.$id)->find();
			$this->assign('commission_info', $commission_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}


	function edit() {
		if (isset($_POST['dosubmit'])) {
			$commission_mod = M('commission');
			$data = $commission_mod->create();

			if ($_FILES['img']['name'] != '') {
				$upload_list=$this->_upload($_FILES['img']);
				$data['img'] = $upload_list['0']['savename'];
			}

			$result = $commission_mod->where("id=" . $data['id'])->save($data);
			if (false !== $result) {
				$this->success(L('operation_success'), '', '', 'edit');
			} else {
				$this->error(L('operation_failure'));
			}
		} else {
			$commission_mod = M('commission');
			if (isset($_GET['id'])) {
				$commission_id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('请选择要编辑的链接');
			}
			$commission_cate_mod = D('commission_cate');
			$commission_cate_list = $commission_cate_mod->select();
			$this->assign('commission_cate_list', $commission_cate_list);

			$commission_info = $commission_mod->where('id=' . $commission_id)->find();
			$this->assign('commission_info', $commission_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	function del() {
		$commission_mod = M('commission');
		if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
			$this->error('请选择要删除的链接！');
		}
		if (isset($_POST['id']) && is_array($_POST['id'])) {
			$commission_ids = implode(',', $_POST['id']);
			$commission_mod->delete($commission_ids);
		} else {
			$commission_id = intval($_GET['id']);
			$commission_mod->where('id=' . $commission_id)->delete();
		}
		$this->success(L('operation_success'));
	}

	function ordid() {
		$commission_mod = D('commission');
		if (isset($_POST['listorders'])) {
			foreach ($_POST['listorders'] as $id => $sort_order) {
				$data['ordid'] = $sort_order;
				$commission_mod->where('id=' . $id)->save($data);
			}
			$this->success(L('operation_success'));
		}
		$this->error(L('operation_failure'));
	}

	//修改状态
	function status() {
		$commission_mod = M('orderlist');
		$id = intval($_REQUEST['id']);
		$type = trim($_REQUEST['type']);
		$sql = "update " . C('DB_PREFIX') . "orderlist set $type=($type+1)%2 where id='$id'";
		Log::write('$sql==='.$sql);
		//		var_dump($sql);
		$res = $commission_mod->execute($sql);
		$values = $commission_mod->where('id=' . $id)->find();
		$this->ajaxReturn($values[$type]);
	}

	public function _upload() {
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
		$upload->savePath = ROOT_PATH.'/data/commission/';

		$upload->saveRule = uniqid;
		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		} else {
			//取得成功上传的文件信息
			$uploadList = $upload->getUploadFileInfo();
		}
		return $uploadList;
	}

	public function exportExcel($header = array(), $expTitle, $expCellName, $expTableData, $fileName = 'file')
	{
		$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
		$fileName = $fileName . date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
		$cellNum = count($expCellName);
		$dataNum = count($expTableData);

		vendor("PHPExcel.PHPExcel");

		$objPHPExcel = new \PHPExcel();
		$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
		$objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
		for ($i = 0; $i < $cellNum; $i++) {
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
		}

		$objPHPExcel->getActiveSheet()->setTitle($expTitle); //设置工作表名称

		// Miscellaneous glyphs, UTF-8
		for ($i = 0; $i < $dataNum; $i++) {
			for ($j = 0; $j < $cellNum; $j++) {
				$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
			}
		}

		header('pragma:public');
		header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
		header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

}

?>