<?php

class adminAction extends baseAction
{
    // 修改密码
    public function pwd()
    {
        $id = $_GET['id'] ?: $_SESSION['admin_info']['id'];
        if (isset($_POST['dosubmit'])) {
            $admin_mod = D('admin');
            // dump($_POST);exit;

            $count = $admin_mod->where("id!={$id} and user_name='" . $_POST['user_name'] . "'")->count();
            if ($count > 0) {
                $this->error('用户名已经存在！');
            }

            if ($_POST['dosubmit'] == 2) {
                if ($_POST['inipassword']) {
                    // 匹配原始密码
                    $count = $admin_mod->where("id={$id} and password='" . md5($_POST['inipassword']) . "'")->count();

                    if ($count < 1) {
                        $this->error('原始密码错误！');
                        exit;
                    }


                    if ($_POST['password']) {
                        if ($_POST['password'] != $_POST['repassword']) {
                            $this->error('两次输入的密码不相同');
                        }
                        $_POST['password'] = md5($_POST['password']);
                    } else {
                        unset($_POST['password']);
                    }
                    unset($_POST['repassword']);;
                } else {
                    $this->error('原始密码错误不能为空');
                }

            }


            // 更新时间
            $_POST['update_time'] = time();

            $data = $admin_mod->create();
            if (false === $data) {
                $this->error($admin_mod->getError());
            }

            $result = $admin_mod->where(" id={$id} ")->save();
            //			var_dump($admin_mod->save(),$admin_mod->create(),$admin_mod->getLastSql());exit;

             $log = $admin_mod->getLastSql();
                // 添加日志
            admin_log($log_op = '修改', $log_obj = '用户_'.$_POST['user_id'], $log_desc = json_encode($data), $log, $score = 0, $app = 0, $status = 0, $product = 0, $op_table = 'admin');
             
            
            if (false !== $result) {
                $this->success(L('operation_success'), '', '', 'edit');
            } else {
                $this->error(L('operation_failure'));
            }
        } else {
            /*if( isset($_GET['id']) ){
             $id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
             }*/

            $role_mod = D('role');
            $role_list = $role_mod->where('status=1')->select();
            $this->assign('role_list', $role_list);

            $admin_mod = D('admin');
            $admin_info = $admin_mod->where('id=' . $id)->find();
            //            var_dump($admin_info);exit;
            $this->assign('admin_info', $admin_info);
            $this->assign('show_header', false);


            $result = $admin_mod->order('id ASC')->select();
            $admin_list = array();
            foreach ($result as $val) {
                if ($val['pid'] == 0) {
                    $admin_list['parent'][$val['id']] = $val;
                } else {
                    $admin_list['sub'][$val['pid']][] = $val;
                }
            }
            $this->assign('admin_list', $admin_list);
            //		    var_dump($admin_list);

            $this->display();
        }
    }

    function index()
    {
        $admin_mod = M('admin');
        import("ORG.Util.Page");
        $prex = C('DB_PREFIX');
        
        
	    

        //搜索
        // $where = '1=1 AND ' . $prex . 'admin.id!=1 ';
        $where = '1=1 ';
        
        // 角色
		if (isset($_GET['role_id']) && !empty($_GET['role_id'])) {
			$where .= " AND role_id= '{$_GET['role_id']}' ";
			$this->assign('role_id', $_GET['role_id']);
		}
        // 角色表
		$roles = M('role')->where(" status=1 AND data_state=1 ")->select();
		$this->assign('roles', $roles);

        // 分行
        if ($_SESSION['admin_info']['role_id'] == 4 || $_SESSION['admin_info']['role_id'] == 5) {
            $where .= '  AND pid= ' . $_SESSION['admin_info']['id'];
        }

        if (isset($_GET['keyword']) && trim($_GET['keyword'])) {
            $where .= " AND (user_name LIKE '%{$_GET['keyword']}%' OR user_id LIKE '%{$_GET['keyword']}%' ) ";
            $this->assign('keyword', $_GET['keyword']);
        }

        $count = $admin_mod->where($where)->count();
        $p = new Page($count, 10);

        $admin_list = $admin_mod->field($prex . 'admin.*,' . $prex . 'role.name as role_name')->join('LEFT JOIN ' . $prex . 'role ON ' . $prex . 'admin.role_id = ' . $prex . 'role.id ')->where($where)->limit($p->firstRow . ',' . $p->listRows)->order($prex . 'admin.add_time DESC')->order($prex . 'admin.id DESC ')->select();

        $admin_list2 = $admin_mod->select();

        // 重组数组
        foreach ($admin_list2 as $val) {
            $admin_list_new[$val['id']] = $val;
        }

        $key = 1;
        foreach ($admin_list as $k => $val) {
            if ($val['pid'] < 1) {
                $admin_list[$k]['pid_name'] = '顶级';
            } else {
//                $admin_list[$k]['pid_name'] = $admin_list_new[$val['pid']]['user_name'];
                $admin_list[$k]['pid_name'] = $admin_list_new[$val['pid']]['user_id'];
            }
        }


        $admin_list3 = array();
        foreach ($admin_list2 as $val) {
            if ($val['pid'] == 0) {
                $admin_list3['parent'][$val['id']] = $val;
            } else {
                $admin_list3['sub'][$val['pid']][] = $val;
            }
        }
        $this->assign('admin_list3', $admin_list3);


        $role_mod = D('role');
        $role_list = $role_mod->where('status=1')->select();
        $this->assign('role_list', $role_list);


        // 导出数据
        if ($_REQUEST['dosubmit'] == 2) {
            $xlsData = $admin_mod->field($prex . 'admin.*,' . $prex . 'role.name as role_name')->join('LEFT JOIN ' . $prex . 'role ON ' . $prex . 'admin.role_id = ' . $prex . 'role.id ')->where($where)->order($prex . 'admin.add_time DESC')->order($prex . 'admin.id DESC ')->select();
            $xlsName = "用户详情";
            $xlsCell = array(
//                array('id', '序号'),
                array('user_name', '账号名称'),
                array('user_id', '姓名'),
                array('mobile', ' 电话'),
                array('email', '邮箱'),
                array('account', ' 结算账号'),
                array('address', '地址'),
                // array('role_id', 'role_id'),
                // array('pid', 'pid'),
            );

            if ($_SESSION['admin_info']['role_id'] == 1) {
                $xlsCell[] = array('role_id', 'role_id');
                $xlsCell[] = array('pid', 'pid');
            }
//            $xlsData = $admin_list;

            //			var_dump($orderlist_mod->getLastSql(),$xlsData);exit;
            foreach ($xlsData as $k => $v) {
                $xlsData[$k]['account'] = ' ' . $v['account'];
                $xlsData[$k]['mobile'] = ' ' . $v['mobile'];
//                $xlsData[$k]['account'] = (string)$v['account'];
//                $xlsData[$k]['order_time'] = date('Y-m-d H:i:s', $v['order_time']);

//                $xlsData[$k]['rate'] = $v['commission'] / $v['sum_price'];
            }
            exportExcel(array(), $xlsName, $xlsCell, $xlsData, $xlsName);

        }


        //		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=admin&a=add\', title:\'添加管理员\', width:\'480\', height:\'520\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', '添加管理员');

        //        $p->setConfig('header','个会员');
        //        $p->setConfig('theme',"%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%");
        $page = $p->show();

        $this->assign('page', $page);
        //		$this->assign('big_menu', $big_menu);
        $this->assign('admin_list', $admin_list);


        $this->display();
    }

    function add()
    {
        if (isset($_POST['dosubmit'])) {
            $admin_mod = M('admin');
            if ($_POST['dosubmit'] == 1) {
                if (!isset($_POST['user_name']) || ($_POST['user_name'] == '')) {
                    $this->error('用户名不能为空');
                }
                if ($_POST['password'] != $_POST['repassword']) {
                    $this->error('两次输入的密码不相同');
                }
                $result = $admin_mod->where("user_name='" . $_POST['user_name'] . "'")->count();
                if ($result) {
                    $this->error('管理员' . $_POST['user_name'] . '已经存在');
                }
                unset($_POST['repassword']);
                //			$_POST['password'] = md5($_POST['password']);
                $_POST['password'] = md5('a123456');
                $data = $admin_mod->create();

                // 判断级别
                // 分行
                if ($_SESSION['admin_info']['role_id'] == 4) {
                    $admin_mod->role_id = 5;
                    $admin_mod->pid = $_SESSION['admin_info']['id'];
                } elseif ($_SESSION['admin_info']['role_id'] == 5) {
                    $admin_mod->role_id = 6;
                    $admin_mod->pid = $_SESSION['admin_info']['id'];
                }

                $admin_mod->add_time = time();
                $admin_mod->last_time = time();
                $result = $admin_mod->add();
                
                $log = $admin_mod->getLastSql();
                // 添加日志
                admin_log($log_op = '添加', $log_obj = '用户_'.$_POST['user_id'], $log_desc = json_encode($data), $log, $score = 0, $app = 0, $status = 0, $product = 0, $op_table = 'admin');
                
                
                if ($result) {
                    $this->success(L('operation_success'), '', '', 'add');
                } else {
                    $this->error(L('operation_failure'));
                }
            } else {
                // 导入用户
                $upload_list = $this->_upload();
                vendor("PHPExcel.PHPExcel");
                $file_name = $upload_list[0]['savepath'] . $upload_list[0]['savename'];
                //				var_dump($file_name);exit;

                if ($upload_list[0]['extension'] == 'xlsx') {
                    $objReader = new PHPExcel_Reader_Excel2007();
                } else {
                    $objReader = new PHPExcel_Reader_Excel5();
                }

                $objPHPExcel = $objReader->load($file_name, $encode = 'utf-8');
                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow(); // 取得总行数
                $highestColumn = $sheet->getHighestColumn(); // 取得总列数


                // 分行
                if ($_SESSION['admin_info']['role_id'] == 4) {
                    $role_id = 5;
                    $pid = $_SESSION['admin_info']['id'];
                } elseif ($_SESSION['admin_info']['role_id'] == 5) {
                    $role_id = 6;
                    $pid = $_SESSION['admin_info']['id'];
                }

                for ($i = 2; $i <= $highestRow; $i++) {
                    // 添加用户
                    $data = $_POST;
                    $data['user_name'] = $objPHPExcel->getActiveSheet()->getCell("A" . $i)->getValue();
                    // 开始格式化
                    if (is_object($data['user_name'])) {
                        $data['user_name'] = $data['user_name']->__toString();
                    }

                    $data['user_id'] = $objPHPExcel->getActiveSheet()->getCell("B" . $i)->getValue();
                    $data['mobile'] = $objPHPExcel->getActiveSheet()->getCell("C" . $i)->getValue();
                    $data['email'] = $objPHPExcel->getActiveSheet()->getCell("D" . $i)->getValue();
                    $data['account'] = $objPHPExcel->getActiveSheet()->getCell("E" . $i)->getValue();
                    $data['address'] = $objPHPExcel->getActiveSheet()->getCell("F" . $i)->getValue();

                    if ($role_id) {
                        $data['role_id'] = $role_id;
                        $data['pid'] = $pid;
                    } else {
                        $data['role_id'] = $objPHPExcel->getActiveSheet()->getCell("G" . $i)->getValue() ?: 6;
                        $data['pid'] = $objPHPExcel->getActiveSheet()->getCell("H" . $i)->getValue() ?: 19;

                    }
                    //					$data['password'] = 'e10adc3949ba59abbe56e057f20f883e'; // md5('1234566');
                    $data['password'] = 'dc483e80a7a0bd9ef71d8cf973673924'; // md5('a1234566');
                    // 佣金表 cate_id
                    $data['status'] = $data['data_state'] = 1;
                    $data['ip'] = get_client_ip();
                    $data['add_time'] = $data['last_time'] = $data['update_time'] = time();
                    // 写入用户表
                    $admin_flag = $admin_mod->where(" user_name='{$data['user_name']}' ")->find();
                    if ($admin_flag) {
                        $user_exist[] = $data['user_name'];
                        //						$admin_mod->where(" item_id={$data['item_id']}  AND  shop_id={$data['shop_id']} ")->save($data);
                    } else {
                        $admin_mod->add($data);
                    }

                    $log[] = $admin_mod->getLastSql();
                    $log_data[] = $data;

                }
                // 添加日志
                admin_log($log_op = '批量添加', $log_obj = '用户', $log_desc = json_encode($log_data), json_encode($log), $score = 0, $app = 0, $status = 0, $product = 0, $op_table = 'admin');
                if ($user_exist) {
                    $user_exist_string = implode(',', $user_exist);
                    $this->success(L('operation_success') . "   {$user_exist_string}   已存在", U('admin/index'));
                } else {
                    $this->success(L('operation_success'), U('admin/index'));
                }
                exit;
            }

        } else {
            $role_mod = D('role');
            $role_list = $role_mod->where('status=1')->select();
            $this->assign('role_list', $role_list);

            $this->assign('show_header', false);
            $this->display();
        }
    }

    function edit()
    {
        if (isset($_POST['dosubmit'])) {
            $admin_mod = M('admin');
            $count = $admin_mod->where("id!=" . $_POST['id'] . " and user_name='" . $_POST['user_name'] . "'")->count();
            if ($count > 0) {
                $this->error('用户名已经存在！');
            }
            //print_r($count);exit;
            if ($_POST['password']) {
                if ($_POST['password'] != $_POST['repassword']) {
                    $this->error('两次输入的密码不相同');
                }
                $_POST['password'] = md5($_POST['password']);
            } else {
                unset($_POST['password']);
            }
            unset($_POST['repassword']);
            $data = $admin_mod->create();
            if (false === $data) {
                $this->error($admin_mod->getError());
            }

            $result = $admin_mod->save();
            
            $log = $admin_mod->getLastSql();
                // 添加日志
            admin_log($log_op = '修改', $log_obj = '用户_'.$_POST['user_id'], $log_desc = json_encode($data), $log, $score = 0, $app = 0, $status = 0, $product = 0, $op_table = 'admin');
                
            if (false !== $result) {
                $this->success(L('operation_success'), '', '', 'edit');
            } else {
                $this->error(L('operation_failure'));
            }
        } else {
            if (isset($_GET['id'])) {
                $id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : $this->error('参数错误');
            }
            $role_mod = D('role');
            $role_list = $role_mod->where('status=1')->select();
            $this->assign('role_list', $role_list);

            $admin_mod = D('admin');
            $admin_info = $admin_mod->where('id=' . $id)->find();
            $this->assign('admin_info', $admin_info);
            $this->assign('show_header', false);
            $this->display();
        }
    }

    function delete()
    {
        if ((!isset($_GET['id']) || empty($_GET['id'])) && (!isset($_POST['id']) || empty($_POST['id']))) {
            $this->error('请选择要删除的会员！');
        }
        $admin_mod = D('admin');
        if (isset($_POST['id']) && is_array($_POST['id'])) {
            $ids = implode(',', $_POST['id']);
            $admin_mod->delete($ids);
        } else {
            $id = intval($_GET['id']);
            $admin_mod->delete($id);
        }
        $this->success(L('operation_success'));
    }

    public function ajax_check_username()
    {
        $user_name = $_GET['user_name'];
        $id = isset($_GET['id']) && intval($_GET['id']) ? intval($_GET['id']) : '';
        if (D('admin')->check_username($user_name, $id)) {
            //不存在
            echo '1';
        } else {
            //存在
            echo '0';
        }
        exit;
    }

    function ajax_check_used()
    {
        $admin_mod = D('admin');
        $count = $admin_mod->where("id!=" . $_get['id'] . " and user_name='" . $_get['user_name'] . "'")->count();
        echo $count;
        exit;
        if ($count > 0) {
            echo "0";
        } else {
            echo "1";
        }
    }

    //修改状态
    function status()
    {
        $admin_mod = D('admin');
        $id = intval($_REQUEST['id']);
        $type = trim($_REQUEST['type']);
        $sql = "update " . C('DB_PREFIX') . "admin set $type=($type+1)%2 where id='$id'";
        $res = $admin_mod->execute($sql);
        $values = $admin_mod->where('id=' . $id)->find();
//        var_dump($values);
        $this->ajaxReturn($values[$type]);
    }

    public function _upload()
    {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 3292200;
        //$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
        $upload->savePath = ROOT_PATH . '/data/admin/';

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