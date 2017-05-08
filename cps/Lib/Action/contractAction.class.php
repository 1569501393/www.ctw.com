<?php
class contractAction extends baseAction {
	function index() {
		$contract_mod = M('contract');
		import("ORG.Util.Page");
		$prex = C('DB_PREFIX');

		//搜索
		$where = '1=1';
		if (isset($_POST['keyword']) && trim($_POST['keyword'])) {
			$where .= " AND (" . $prex . "contract.name LIKE '%" . $_POST['keyword'] . "%' or url LIKE '%" . $_POST['keyword'] . "%')";
			$this->assign('keyword', $_POST['keyword']);
		}
		if (isset($_POST['cate_id']) && intval($_POST['cate_id'])) {
			$where .= " AND cate_id=" . $_POST['cate_id'];
			$this->assign('cate_id', $_POST['cate_id']);
		}

		$count = $contract_mod->where($where)->count();
		$p = new Page($count, 20);
//		$contract_list = $contract_mod->where($where)->field($prex . 'contract.*,' . $prex . 'contract_cate.name as cate_name')->join('LEFT JOIN ' . $prex . 'contract_cate ON ' . $prex . 'contract.cate_id = ' . $prex . 'contract_cate.id ')->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'contract.ordid ASC')->select();
		$contract_list = $contract_mod->where($where)->order('id DESC')->select();
		
		$key = 1;
		foreach ($contract_list as $k => $val) {
			$contract_list[$k]['key'] = ++$p->firstRow;
            $contract_list[$k]['platform_name'] = D('admin')->where('id='.$val['platform_id'])->getField('user_name')?:'全部';
            $contract_list[$k]['con_type_name'] = D('admin')->where('id='.$val['con_type'])->getField('user_name')?:'全部';
            $contract_list[$k]['shop_name'] = D('admin')->where('id='.$val['shop_id'])->getField('user_name')?:'全部';
            $contract_list[$k]['status_name'] = D('parameters')->where('parameter_id='.$val['status'])->getField('parameter_value')?:'全部';
		}
		// 分销平台  分行
		$platforms = M('admin')->where('role_id=4 AND status=1 ')->select();
		
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

//        var_dump($periods);

		$contract_cate_mod = D('contract_cate');
		$contract_cate_list = $contract_cate_mod->select();
		$this->assign('contract_cate_list', $contract_cate_list);

		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=contract&a=add\', title:\'' . L('add_contract') . '\', width:\'550\', height:\'350\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('add_contract') );
		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('big_menu', $big_menu);
		$this->assign('contract_list', $contract_list);
		$this->display();
	}

	function add() {
		if (isset($_POST['dosubmit'])) {

			$contract_mod = M('contract');
			$data = array();
//			$name = isset($_POST['name']) && trim($_POST['name']) ? trim($_POST['name']) : $this->error(L('input') . L('contract_name'));
//			$url = isset($_POST['url']) && trim($_POST['url']) ? trim($_POST['url']) : $this->error(L('input') . L('contract_url'));
//			$exist = $contract_mod->where("url='" . $url . "'")->count();
			/*if ($exist != 0) {
				$this->error('该链接已经存在');
			}*/
			
			
			// 合同开始时间
			$_POST['begin_time']=strtotime($_POST['begin_time']);
			$_POST['end_time']=strtotime($_POST['end_time']);
			$_POST['uid']=$_SESSION['admin_info']['id'];
			$_POST['add_time']=$_POST['update_time']=time();
			$data = $contract_mod->create();
			
//			if ($_FILES['img']['name'] != '') {
//				$upload_list=$this->_upload($_FILES['img']);
//				$data['img'] = $upload_list['0']['savename'];
//			}
			
			$contract_mod->add($data);
			$this->success(L('operation_success'), '', '', 'add');
		} else {
			$contract_cate_mod = D('contract_cate');
			$contract_cate_list = $contract_cate_mod->select();
			$this->assign('contract_cate_list', $contract_cate_list);

			$this->assign('show_header', false);
			$this->display();
		}
	}

	function edit() {
		if (isset($_POST['dosubmit'])) {
			$contract_mod = M('contract');
			$data = $contract_mod->create();
			
			if ($_FILES['img']['name'] != '') {
				$upload_list=$this->_upload($_FILES['img']);
				$data['img'] = $upload_list['0']['savename'];
			}
			
			$result = $contract_mod->where("id=" . $data['id'])->save($data);
			if (false !== $result) {
				$this->success(L('operation_success'), '', '', 'edit');
			} else {
				$this->error(L('operation_failure'));
			}
		} else {
			$contract_mod = M('contract');
			if (isset($_POST['id'])) {
				$contract_id = isset($_POST['id']) && intval($_POST['id']) ? intval($_POST['id']) : $this->error('请选择要编辑的链接');
			}
			$contract_cate_mod = D('contract_cate');
			$contract_cate_list = $contract_cate_mod->select();
			$this->assign('contract_cate_list', $contract_cate_list);

			$contract_info = $contract_mod->where('id=' . $contract_id)->find();
			$this->assign('contract_info', $contract_info);
			$this->assign('show_header', false);
			$this->display();
		}
	}

	function del() {
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

	function ordid() {
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
	function status() {
		$contract_mod = D('contract');
		$id = intval($_REQUEST['id']);
		$type = trim($_REQUEST['type']);
		$sql = "update " . C('DB_PREFIX') . "contract set $type=($type+1)%2 where id='$id'";
		$res = $contract_mod->execute($sql);
		$values = $contract_mod->where('id=' . $id)->find();
		$this->ajaxReturn($values[$type]);
	}

	public function _upload() {
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		//$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
		$upload->savePath = ROOT_PATH.'/data/contract/';

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