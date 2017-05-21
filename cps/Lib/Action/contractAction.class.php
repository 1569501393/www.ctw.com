<?php

class contractAction extends baseAction
{
	function index()
	{
		$contract_mod = M('contract');
		import("ORG.Util.Page");
		$prex = C('DB_PREFIX');

		//搜索
		$where = '1=1';

		// 判断是否是商城管理员  1超级管理员  3 商城  2编辑
		if (($_SESSION['admin_info']['role_id'] == 4)) {
			$where .= ' AND platform_id=' . $_SESSION['admin_info']['id'];
		}

		if (isset($_GET['keyword']) && trim($_GET['keyword'])) {
			$where .= " AND (" . $prex . "contract.name LIKE '%" . $_GET['keyword'] . "%' or url LIKE '%" . $_GET['keyword'] . "%')";
			$this->assign('keyword', $_GET['keyword']);
		}
		if (isset($_GET['begin_time']) && intval($_GET['begin_time'])) {
			$where .= " AND begin_time>=" . strtotime($_GET['begin_time']);
			$this->assign('begin_time', $_GET['begin_time']);
		}

		if (isset($_GET['end_time']) && intval($_GET['end_time'])) {
			$date_obj = new DateTime($_GET['end_time']);
			//            $_GET['end_time'] = $date_obj->format('U')?:0;
			$where .= " AND end_time<=" . $date_obj->format('U');
			$this->assign('end_time', $_GET['end_time']);
		}

		if (isset($_GET['con_id']) && !empty($_GET['con_id'])) {
			$where .= " AND con_id='{$_GET['con_id']}' " ;
			$this->assign('con_id', $_GET['con_id']);
		}

		if (isset($_GET['shop_id']) && intval($_GET['shop_id'])) {
			$where .= " AND shop_id=" . $_GET['shop_id'];
			$this->assign('shop_id', $_GET['shop_id']);
		}
		if (isset($_GET['platform_id']) && intval($_GET['platform_id'])) {
			$where .= " AND platform_id=" . $_GET['platform_id'];
			$this->assign('platform_id', $_GET['platform_id']);
		}
		if (isset($_GET['status']) && intval($_GET['status'])) {
			$where .= " AND status=" . $_GET['status'];
			$this->assign('status', $_GET['status']);
		}
		if (isset($_GET['period']) && intval($_GET['period'])) {
			$where .= " AND period=" . $_GET['period'];
			$this->assign('period_input', $_GET['period']);
			//            var_dump($_GET['period']);
		}

		if ($_SESSION['admin_info']['role_id'] ==1 ) {
			// CPS:分销平台  分行
			//		$platforms = M('admin')->where('role_id=4 AND status=1 ')->select();
			$platforms = M('admin')->where('(role_id=4 OR role_id=1 ) AND status=1 ')->select();
			// 商家
			$shops = M('admin')->where('(role_id=3 OR role_id=1 ) AND status=1 ')->select();
		}elseif ($_SESSION['admin_info']['role_id'] ==3 ){
			// 商家:分销平台  分行
			$platforms = M('admin')->where('(role_id=1 ) AND status=1 ')->select();

			// 商家
			$shops = M('admin')->where('role_id=3 AND status=1 ')->select();
			$where .= " AND shop_id= {$_SESSION['admin_info']['id']} " ;		
		}else{
			// 分行:分销平台  分行
			$platforms = M('admin')->where('(role_id=4 ) AND status=1 ')->select();

			// 商家
			$shops = M('admin')->where('role_id=1 AND status=1 ')->select();
			$where .= " AND platform_id= {$_SESSION['admin_info']['id']} " ;
		}

		$count = $contract_mod->where($where)->count();
		$p = new Page($count, 10);
		//		$contract_list = $contract_mod->where($where)->field($prex . 'contract.*,' . $prex . 'contract_cate.name as cate_name')->join('LEFT JOIN ' . $prex . 'contract_cate ON ' . $prex . 'contract.cate_id = ' . $prex . 'contract_cate.id ')->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'contract.ordid ASC')->select();
		$contract_list = $contract_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

		$key = 1;
		foreach ($contract_list as $k => $val) {
			$contract_list[$k]['key'] = ++$p->firstRow;
			$contract_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			// 审批人
			$contract_list[$k]['approver_name'] = D('admin')->where('id=' . $val['uid'])->getField('user_name') ?: '全部';
			// $contract_list[$k]['con_type_name'] = D('admin')->where('id='.$val['con_type'])->getField('user_name')?:'全部';
			$contract_list[$k]['con_type_name'] = D('role')->where('id=' . $val['con_type'])->getField('name') ?: '全部';
			$contract_list[$k]['shop_name'] = D('admin')->where('id=' . $val['shop_id'])->getField('user_name') ?: '全部';
			$contract_list[$k]['status_name'] = D('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'check_status\' AND parameter_id=' . $val['status'])->getField('parameter_value') ?: '全部';
		}

		

//		var_dump($shops);

		// 角色
//		$roles = M('role')->where('1=1 AND status=1 ')->select();

		$this->assign('platforms', $platforms);
		$this->assign('shops', $shops);
//		$this->assign('roles', $roles);

		// 结算周期 审核状态 收款方
		$period = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'period\' ')->select();
		$this->assign('period', $period);

		$check_status = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'check_status\' ')->select();
		$this->assign('check_status', $check_status);

		$payee = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'payee\' ')->select();
		$this->assign('payee', $payee);

		/*$contract_cate_mod = D('contract_cate');
		 $contract_cate_list = $contract_cate_mod->select();
		 $this->assign('contract_cate_list', $contract_cate_list);*/

		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('contract_list', $contract_list);

		unset($where);
		if ($_POST['dosubmit']==2) {
			//搜索
			$where = '1=1';
			if (isset($_POST['begin_time']) && intval($_POST['begin_time'])) {
				$where .= " AND begin_time>=" . strtotime($_POST['begin_time']);
				$this->assign('begin_time', $_POST['begin_time']);
			}

			if (isset($_POST['end_time']) && intval($_POST['end_time'])) {
				//				$where .= " AND end_time<=" . strtotime($_POST['end_time']);
				$date_obj = new DateTime($_POST['end_time']);
				//            $_POST['end_time'] = $date_obj->format('U')?:0;
				$where .= " AND end_time<=" . $date_obj->format('U');
				$this->assign('end_time', $_POST['end_time']);
			}

			if (isset($_POST['user_name']) && trim($_POST['user_name'])) {
				$where .= " AND user_name like '%{$_POST['user_name']}%' ";
				$this->assign('user_name', $_POST['user_name']);
			}

			if (isset($_POST['ip']) && trim($_POST['ip'])) {
				$where .= " AND ip='{$_POST['ip']}' ";
				$this->assign('ip', $_POST['ip']);
			}
			if (isset($_POST['op_desc']) && trim($_POST['op_desc'])) {
				$where .= " AND op_desc like '%{$_POST['op_desc']}%' ";
				$this->assign('op_desc', $_POST['op_desc']);
			}

		}
		$count2 = M('op_log')->where($where)->count();
		$p2 = new Page($count2, 10);
		$log_list = M('op_log')->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('log_id DESC')->select();
		$page2 = $p2->show();
		$this->assign('page2', $page2);
		$this->assign('log_list', $log_list);

		// 默认当前时间
		$contract_info['begin_time']=$contract_info['end_time']=time();
		$this->assign('contract_info', $contract_info);

		$this->display();
	}

	function add()
	{
		if (isset($_POST['dosubmit'])) {

			$contract_mod = M('contract');
			$data = array();

			//            var_dump(I('con_id'));
			$result = $contract_mod->where('con_id=' . " '{$_REQUEST['con_id']}' ")->count();
			//            var_dump($contract_mod->getLastSql());

			if ($result) {
				$this->error('合同编号' . I('con_id') . '已经存在');
			}

			// 合同开始时间
			$_POST['begin_time'] = strtotime($_POST['begin_time']);
			//			$_POST['end_time'] = strtotime($_POST['end_time']);
			$date_obj = new DateTime($_POST['end_time']);
			//                $_POST['end_time'] = $date_obj->getTimestamp()?:0;
			$_POST['end_time'] = $date_obj->format('U')?:0;
			$_POST['uid'] = $_SESSION['admin_info']['id'];
			$_POST['add_time'] = $_POST['update_time'] = time();
			$data = $contract_mod->create();

			$contract_mod->add($data);

			// 添加合同日志
			admin_log($log_op = '添加', $log_obj = '合同', $log_desc = json_encode($_POST), $contract_mod->getLastSql(), $score = 0, $app = 0, $status = 0, $product = 0);

			$this->success(L('operation_success'), '', '', 'add');
		} else {
			$this->display();
		}
	}


	/**
	 *
	 * 导出Excel
	 */
	function export()
	{
		$xlsName = "commission";
		$xlsCell = array(
		array('id', '序号'),
		//            array('platform_id', '分销平台'),
		//            array('con_type', '合同类型'),
		array('item_id', '商品编号'),
		array('title', '商品名称'),
		array('cate_id', '商品分类'),
		array('price', '商品价格'),
		array('rate', '佣金比例'),
		array('commission', '佣金金额'),
		array('add_time', ' 添加时间'),
		);
		$xlsModel = M('commission');
		$xlsData = $xlsModel->Field('id,item_id,title,cate_id,price,rate,commission,add_time')->where('con_id=' . $_GET['id'])->order('id DESC')->select();
		//        $xlsData = $xlsModel->where('con_id='.$_GET['id'])->select();

		foreach ($xlsData as $k => $v) {
			$xlsData[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
			// 商品名称
			//            $xlsData[$k]['item_name'] = '商品名称';
		}

		// 重组另外一张表
		$contract['cell'] = array(
		array('id', '序号'),
		array('con_id', '合同编号'),
		array('platform_id', '分销平台'),
		array('con_type', '合同类型'),
		array('shop_id', '商家名称'),
		array('title', '合同名称'),
		array('period', '账期'),
		array('begin_time', '开始时间'),
		array('end_time', '结束时间'),
		array('status', ' 状态'),
		array('approver', ' 审批人'),
		array('add_time', ' 添加时间'),
		);
		//        $contract['data'] = M('contract')->where('id=' . $_GET['id'])->find();
		$contract['data'] = M('contract')->where('id=' . $_GET['id'])->select();
		//        $contract['data'] = M('contract')->Field('id,platform_id,con_type,shop_id,title,period,begin_time,end_time,status,approver,add_time')->where('id=' . $_GET['id'])->select();
		foreach ($contract['data'] as $k => $v) {
			$contract['data'][$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
			$contract['data'][$k]['begin_time'] = date('Y-m-d H:i:s', $v['begin_time']);
			$contract['data'][$k]['end_time'] = date('Y-m-d H:i:s', $v['end_time']);

			$contract['data'][$k]['platform_id'] = D('admin')->where('id=' . $v['platform_id'])->getField('user_name') ?: '全部';
			// 审批人
			$contract['data'][$k]['approver'] = D('admin')->where('id=' . $v['uid'])->getField('user_name') ?: '全部';
			$contract['data'][$k]['con_type'] = D('role')->where('id=' . $v['con_type'])->getField('name') ?: '全部';
			$contract['data'][$k]['shop_id'] = D('admin')->where('id=' . $v['shop_id'])->getField('user_name') ?: '全部';
			$contract['data'][$k]['status'] = D('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'check_status\' AND parameter_id=' . $v['status'])->getField('parameter_value') ?: '全部';
		}

		//        $this->exportExcel($contract, $xlsName, $xlsCell, $xlsData, 'commission');
		$this->exportExcel($contract, $xlsName, $xlsCell, $xlsData, "合同详情_{$contract['data'][0]['con_id']}_{$contract['data'][0]['title']}");

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

		$objPHPExcel->getActiveSheet()->setTitle('商品佣金信息'); //设置工作表名称

		// Miscellaneous glyphs, UTF-8
		for ($i = 0; $i < $dataNum; $i++) {
			for ($j = 0; $j < $cellNum; $j++) {
				$objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
			}
		}


		//创建一个新的工作空间(sheet)  合同内容
		//创建第二个工作表
		$msgWorkSheet = new PHPExcel_Worksheet($objPHPExcel, '合同信息'); //创建一个工作表
		$objPHPExcel->addSheet($msgWorkSheet); //插入工作表
		//        $objPHPExcel->createSheet();
		$objPHPExcel->setactivesheetindex(1);
		/*//写入多行数据
		 foreach($header as $k=>$v){
		 $k = $k+1;
		 $objPHPExcel->getactivesheet()->setcellvalue('A'.$k, $v[0]);
		 $objPHPExcel->getactivesheet()->setcellvalue('B'.$k, $v[1]);
		 $objPHPExcel->getactivesheet()->setcellvalue('C'.$k, $v[2]);
		 }*/
		$cellNum2 = count($header['cell']);
		$dataNum2 = count($header['data']);
		$objPHPExcel->getactivesheet()->mergeCells('A1:' . $cellName[$cellNum2 - 1] . '1');//合并单元格
		// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
		for ($i = 0; $i < $cellNum2; $i++) {
			$objPHPExcel->getactivesheet()->setCellValue($cellName[$i] . '2', $header['cell'][$i][1]);
		}
		// Miscellaneous glyphs, UTF-8
		for ($i = 0; $i < $dataNum2; $i++) {
			for ($j = 0; $j < $cellNum2; $j++) {
				$objPHPExcel->getactivesheet()->setCellValue($cellName[$j] . ($i + 3), $header['data'][$i][$header['cell'][$j][0]]);
			}
		}

		header('pragma:public');
		header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
		header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
	}

	// 合同编辑
	function edit()
	{
		if (isset($_POST['dosubmit'])) {
			// 导入商品
			if ($_POST['dosubmit'] == 2) {
				$upload_list = $this->_upload('contract');
//				$file_name = $this->_upload('contract');
				vendor("PHPExcel.PHPExcel");
				$file_name = $upload_list[0]['savepath'] . $upload_list[0]['savename'];
				//				var_dump($file_name);exit;

//				$objReader = new PHPExcel_Reader_Excel2007();
				if ($upload_list[0]['extension'] == 'xlsx') {
					$objReader = new PHPExcel_Reader_Excel2007();
				} else {
					$objReader = new PHPExcel_Reader_Excel5();
				}

				$objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
				$sheet = $objPHPExcel->getSheet(0);
				$highestRow = $sheet->getHighestRow(); // 取得总行数
				$highestColumn = $sheet->getHighestColumn(); // 取得总列数

				for ($i = 2; $i <= $highestRow; $i++) {
					// 添加商品
					$data = $_POST;

					$data['item_id'] = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
					$data['rate']  = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
					$data['commission'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
					$data['cid'] = $data['cate_id'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
					$data['price'] = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
					$data['title'] = $objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();

					//                    $data['last_login_time'] = 0;
					//                    $data['create_time'] = $data['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
					//                    $data['login_count'] = 0;
					//                    $data['join'] = 0;
					//                    $data['avatar'] = '';
					//                    $data['password'] = md5('123456');
					//                    $data['contract'] = $_POST['contract'];
					//                    $data['shop_id'] = $_POST['shop_id'];
					//                    $data['platform_id'] = $_POST['platform_id'];

					$data['con_id'] = $_POST['id'];
					// 佣金表 cate_id
					$data['cate_id'] = $_POST['cid'];
					unset($data['id']);
					$data['shop_id'] = $_POST['shop_id']?:0;
					$data['uid'] = $_SESSION['admin_info']['id'];
					$data['add_time'] = $data['update_time'] = time();

					if ($data['rate'] && $data['commission'] && ($data['rate'] !=($data['commission']/$data['price']*100))) {
						$this->error('佣金和佣金比例设置不对，请重新设置！');
					}

					if ($data['commission'] ) {
						$data['rate'] = $data['commission']/$data['price']*100;
					}

					if ($data['rate'] ) {
						$data['commission'] = $data['rate']*$data['price']/100;
					}

					// 写入商品表  价格
					// 判断是否存在
					//					$result_flag = M('items')->where(" item_id={$data['item_id']} ")->find();
					$result_flag = M('items')->where(" item_id={$data['item_id']} AND  shop_id={$data['shop_id']}")->find();
					if ($result_flag) {
						//						M('items')->where(" item_id={$data['item_id']} ")->save($data);
						M('items')->where(" item_id={$data['item_id']}  AND  shop_id={$data['shop_id']} ")->save($data);
					}else{
						M('items')->add($data);
					}
					// 写入佣金表
					//					M('commission')->add($data);

					$commission_flag = M('commission')->where(" item_id={$data['item_id']} AND  shop_id={$data['shop_id']}")->find();

					if ($commission_flag) {
						//						M('items')->where(" item_id={$data['item_id']} ")->save($data);
						M('commission')->where(" item_id={$data['item_id']}  AND  shop_id={$data['shop_id']} ")->save($data);
					}else{
						M('commission')->add($data);
					}

					$log[] = M('items')->getLastSql();
					$log_data[] = $data;
					$log_commission[] = M('commission')->getLastSql();

				}

				// 添加合同日志
				//				admin_log($log_op = '修改', $log_obj = '合同（导入商品）', $log_desc = json_encode($_POST), M('commission')->getLastSql(), $score = 0, $app = 0, $status = 0, $product = 0);
				admin_log($log_op = '修改', $log_obj = '合同（导入商品佣金）', $log_desc = json_encode($_POST), json_encode($log_commission), $score = 0, $app = 0, $status = 0, $product = 0);
				admin_log($log_op = '修改', $log_obj = '合同（导入商品内容）', $log_desc = json_encode($log_data), json_encode($log), $score = 0, $app = 0, $status = 0, $product = 0);

				//				$this->success(L('operation_success'), U('finance/push',array('id'=>$data['con_id'])));

				if ($_REQUEST['profit']) {
					$this->success(L('operation_success'), U('finance/commission',array('id'=>$data['con_id'])));

				}else{
					$this->success(L('operation_success'), U('finance/push',array('id'=>$data['con_id'])));

				}
				exit;
			} elseif($_POST['dosubmit'] == 3) {
				if ((empty($_POST['price'])) && (!isset($_POST['price']) )) {
					$this->error('请选择要删除的链接！');
				}

				if ($_POST['rate'] && $_POST['commission'] && ($_POST['rate'] !=($_POST['commission']/$_POST['price']*100))) {
					$this->error('佣金和佣金比例设置不对，请重新设置！');
				}

				if ($_POST['commission'] ) {
					$_POST['rate'] = $_POST['commission']/$_POST['price']*100;
				}

				if ($_POST['rate'] ) {
					$_POST['commission'] = $_POST['rate']*$_POST['price']/100;
				}

				// 添加商品
				$data = $_POST;
				$data['con_id'] = $_POST['id'];
				// 佣金表 cate_id
				$data['cate_id'] = $_POST['cid'];
				unset($data['id']);
				$data['shop_id'] = $_POST['shop_id'];
				$data['uid'] = $_SESSION['admin_info']['id'];
				$data['add_time'] = $data['update_time'] = time();

				// 写入商品表  价格
				// 判断是否存在
				$result_flag = M('items')->where(" item_id={$data['item_id']} ")->find();
				if ($result_flag) {
					$result = M('items')->where(" item_id={$data['item_id']} ")->save($data);
				}else{
					$result = M('items')->add($data);
				}

				// 写入佣金表
				// M('commission')->add($data);

				$commission_flag = M('commission')->where(" item_id={$data['item_id']} AND  shop_id={$data['shop_id']}")->find();

				if ($commission_flag) {
					//						M('items')->where(" item_id={$data['item_id']} ")->save($data);
					M('commission')->where(" item_id={$data['item_id']}  AND  shop_id={$data['shop_id']} ")->save($data);
				}else{
					M('commission')->add($data);
				}
					

				// 添加合同日志
				admin_log($log_op = '添加', $log_obj = '商品', $log_desc = json_encode($_POST), M('items')->getLastSql(), $score = 0, $app = 0, $status = 0, $product = 0);
				admin_log($log_op = '添加', $log_obj = '佣金', $log_desc = json_encode($_POST), M('commission')->getLastSql(), $score = 0, $app = 0, $status = 0, $product = 0);

				if (false !== $result) {
					$this->success(L('operation_success'), U('finance/push',array('id'=>$data['con_id'])));
				} else {
					$this->error(L('operation_failure'));
				}
			}else {
				$contract_mod = M('contract');
					
				// 合同开始时间
				//                var_dump($_POST);
				$_POST['begin_time'] = strtotime($_POST['begin_time']);
				//				$_POST['end_time'] = strtotime($_POST['end_time'])?:0;
				$date_obj = new DateTime($_POST['end_time']);
				//                $_POST['end_time'] = $date_obj->getTimestamp()?:0;
				$_POST['end_time'] = $date_obj->format('U')?:0;
				$_POST['uid'] = $_SESSION['admin_info']['id'];
				$_POST['update_time'] = time();

				//                var_dump($_POST);exit;
				$data = $contract_mod->create();
				$result = $contract_mod->where("id=" . $data['id'])->save($data);

				// 添加合同日志
				admin_log($log_op = '修改', $log_obj = '合同', $log_desc = json_encode($_POST), $contract_mod->getLastSql(), $score = 0, $app = 0, $status = 0, $product = 0);

				if (false !== $result) {
					$this->success(L('operation_success'), '', '', 'edit');
				} else {
					$this->error(L('operation_failure'));
				}
			}
		} else {
			$contract_mod = M('contract');
			if (isset($_POST['id'])) {
				$contract_id = isset($_POST['id']) && intval($_POST['id']) ? intval($_POST['id']) : $this->error('请选择要编辑的链接');
			}

			// 合同信息
			$contract_id = $_REQUEST['id'];
			$contract_info = $contract_mod->where('id=' . $contract_id)->find();

			// 分销平台  分行
			//		$platforms = M('admin')->where('role_id=4 AND status=1 ')->select();
			$platforms = M('admin')->where('(role_id=4 OR role_id=1 ) AND status=1 ')->select();

			// 商家
			$shops = M('admin')->where('role_id=3 AND status=1 ')->select();

			// 角色
			$roles = M('role')->where('1=1 AND status=1 ')->select();

			$this->assign('platforms', $platforms);
			$this->assign('shops', $shops);
			$this->assign('roles', $roles);

			// 结算周期 审核状态 收款方
			$period = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'period\' ')->select();
			$this->assign('period', $period);

			$check_status = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'check_status\' ')->select();
			$this->assign('check_status', $check_status);

			$payee = M('parameters')->where('1=1 AND data_state=1 AND parameter_name=\'payee\' ')->select();
			$this->assign('payee', $payee);



			//			var_dump($contract_mod->getLastSql());exit;
			$this->assign('contract_info', $contract_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	function del()
	{
		$contract_mod = M('contract');
		if ((!isset($_POST['id']) || empty($_POST['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
			$this->error('请选择要删除的链接！');
		}
		if (isset($_POST['id']) && is_array($_POST['id'])) {
			$contract_ids = implode(',', $_POST['id']);
			$contract_mod->delete($contract_ids);
		} else {
			$contract_id = intval($_POST['id']);
			$contract_mod->where('id=' . $contract_id)->delete();
		}
		$this->success(L('operation_success'));
	}

	function ordid()
	{
		$contract_mod = D('contract');
		if (isset($_POST['listorders'])) {
			foreach ($_POST['listorders'] as $id => $sort_order) {
				$data['ordid'] = $sort_order;
				$contract_mod->where('id=' . $id)->save($data);
			}
			$this->success(L('operation_success'));
		}
		$this->error(L('operation_failure'));
	}

	//修改状态
	function status()
	{
		$contract_mod = D('contract');
		$id = intval($_REQUEST['id']);
		$type = trim($_REQUEST['type']);
		$sql = "update " . C('DB_PREFIX') . "contract set $type=($type+1)%2 where id='$id'";
		$res = $contract_mod->execute($sql);
		$values = $contract_mod->where('id=' . $id)->find();
		$this->ajaxReturn($values[$type]);
	}

	public function _upload()
	{
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
		$upload->savePath = ROOT_PATH . '/data/contract/';

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

}

?>