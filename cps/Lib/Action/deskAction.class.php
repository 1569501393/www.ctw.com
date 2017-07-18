<?php
header("Content-type: text/html; charset=utf-8");

//class deskAction extends baseAction
class deskAction extends Action
{
    /**
     * +----------------------------------------------------------
     * 默认操作
     * +----------------------------------------------------------
     */
    public function index()
    {
        $where = '1=1 AND data_state=1 AND status=1 ';

        // 角色，用户
        $where .= ' AND sid = ' . $_SESSION['admin_info']['id'];
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

    //点击找回密码执行找回操作
    public function ac_pwd()
    {
        //执行修改密码操作
        if (isset($_POST['dosubmit']) && isset($_POST['k'])) {
            $k = setFormString($_POST['k']);
            $pass = setFormString(trim($_POST['password']));
            $rpass = setFormString(trim($_POST['rpassword']));

            $pass_log_mod = D('find_password_log');
            $rel = $pass_log_mod->where("md5='{$k}'")->find();
            if (count($rel) > 0) {
                if ($pass == $rpass) {
                    if ($rel['status'] == 0) {   //只有状态为0的时候才可以激活
                        //修改密码
                        //						$user_mod=$this->user_mod;
                        $user_mod = M('admin');
                        $data = array();
                        $data['passwd'] = md5($pass);
                        //判断原来的密码和现在的是否相等
                        $user_rel = $user_mod->where("id='{$rel['uid']}' AND passwd='{$data['passwd']}'")->find();
                        if ($user_rel) {
                            $this->error('此密码与原来的密码相同');
                        }
                        $user_rel = $user_mod->where("id='{$rel['uid']}'")->save($data);
                        if ($user_rel) {
                            //修改状态
                            $status = array();
                            $status['status'] = 1;
                            $pass_log_mod->where("md5='{$k}'")->save($status);
                            $this->success('恭喜您，修改密码成功，请重新登录');
                            //							$this->assign('url',$this->setting['site_domain'].'/index.php?m=uc&a=login');
                        } else {
                            $this->error('修改密码失败请重新修改');
                            //							$this->assign('url',$this->setting['site_domain'].'/index.php?a=find_password&m=uc');
                        }
                    }
                }
            } else {
                $this->error('请通过正规的方式修改密码');
            }
        } else {
            //执行修改显示操作
            if (!isset($_GET['k'])) {
                //				$this->assign('url',$this->setting['site_domain']);
                $this->assign('您的链接地址不正确，请通过正规方式找回密码');
            } else {
                $k = trim($_GET['k']);
                $pass_log_mod = D('find_password_log');

                $rel = $pass_log_mod->where("md5='{$k}'")->find();
                if (count($rel > 0)) {

                    if ($rel['status'] == 0) {
                        $now_time = time();
                        if (($now_time - $rel['create_time']) > 60 * 60 * 2) {
                            //							$this->assign('url',$this->setting['site_domain']);
                            $this->assign('您的链接地址已经过期，请重新找回密码');
                            //错误，时间大于俩小时
                        } else {
                            $this->assign('k', $k);
                            //执行修改密码操作
                            $this->assign('ac_pwd', '重置密码');
                        }
                    } else {
                        //						$this->assign('url',$this->setting['site_domain']);
                        $this->error('您已经激活过密码了此链接不可用');
                    }


                } else {
                    //					$this->assign('url',$this->setting['site_domain']);
                    $this->error('您的链接地址不正确，请通过正规方式找回密码');
                }
            }

        }

        $this->display();
    }

    //找回密码
    public function find_password()
    {
        if (isset($_POST['dosubmit']) && $_POST['find_password'] == 'find_password') {
            $find_password_log_mod = D('find_password_log');
            $uname = trim($_POST['name']);
            $email = trim($_POST['email']);
            $user_rel = $this->user_mod->where("name='{$uname}' AND email='{$email}'")->find();
            //执行入库操作
            if ($user_rel > 0) {
                $uid = $user_rel['id'];
                $create_time = time();
                $ip = $_SERVER['REMOTE_ADDR'];
                $md5_data = md5(rand(0, 1000) . $uid . $create_time . $ip);
                $add_data = array(
                    'uid' => $uid,
                    'md5' => $md5_data,
                    'create_time' => $create_time,
                    'ip' => $ip
                );
                if ($find_password_log_mod->add($add_data)) {
                    $url = $this->setting['site_domain'] . '?a=ac_pwd&m=uc&k=' . $md5_data;
                    $address = $email;
                    $title = '找回' . $user_rel['name'] . '在' . $this->setting['site_name'] . '的密码';
                    $message = '<p>' . $user_rel['name'] . ' 您好:</p>
					<p>请点击下面的地址或将下面的地址输入到浏览器地址栏完成取回密码操作。 (注意：如果您没有进行过取回密码操作，请不要点击此链接)</p>	
					<p><a href="' . $url . '" target="_blank">' . $url . '</a></p>		
					<p>(本地址在24小时内有效)</p>								
					';
                    //增加成功 发送邮件
                    $this->sendMail($address, $title, $message);
                    $this->assign('err', array('err' => 1, 'msg' => '恭喜您,提交信息成功 ,请查收邮件'));
                }

            } else {
                $this->assign('err', array('err' => 0, 'msg' => '您的用户名或者邮箱输入错误'));
            }

        }
        $this->display();
    }

    // 发送邮件
    public function send_email()
    {
        $address = $email;
        $title = '找回' . $user_rel['name'] . '在' . $this->setting['site_name'] . '的密码';
        $message = '<p>' . $user_rel['name'] . ' 您好:</p>
		<p>请点击下面的地址或将下面的地址输入到浏览器地址栏完成取回密码操作。 (注意：如果您没有进行过取回密码操作，请不要点击此链接)</p>	
		<p><a href="' . $url . '" target="_blank">' . $url . '</a></p>		
		<p>(本地址在24小时内有效)</p>								
		';
        //增加成功 发送邮件
        $this->sendMail($address, $title, $message);
    }

    // 推广链接跳转
    public function prom()
    {
        //        var_dump($_REQUEST);
        M('commission')->where("item_id='{$_REQUEST['item_id']}' AND shop_id={$_REQUEST['shop_id']} ")->setInc('click');

        $url = M('commission')->where("item_id='{$_REQUEST['item_id']}' AND shop_id={$_REQUEST['shop_id']} ")->getField('url');

        if (strpos($url,'?') === false){
            $res_url = "$url?sid={$_GET['sid']}&item_id={$_GET['item_id']}&push_id={$_GET['push_id']}&con_id={$_GET['con_id']}&shop_id={$_GET['shop_id']}&bank_id={$_GET['bank_id']}&bank_subid={$_GET['bank_subid']}";
        }else{
            $res_url = "$url&sid={$_GET['sid']}&item_id={$_GET['item_id']}&push_id={$_GET['push_id']}&con_id={$_GET['con_id']}&shop_id={$_GET['shop_id']}&bank_id={$_GET['bank_id']}&bank_subid={$_GET['bank_subid']}";
        }

//        var_dump($res_url);
        redirect($res_url);exit;


        $_GET['add_time'] = $_GET['update_time'] = time();
        $_GET['op_time'] = date('Y-m-d H:i:s');
        $_GET['status'] = $_GET['data_state'] = 1;
        $_GET['add_time'] = time();
        //		$_GET['add_time'] = time();
        //         var_dump($_GET);
        M('push_log')->add($_GET);

        var_dump("这是跳转页面,您是由{$_GET['sid']}({$_GET['sname']}-{$_GET['user_id']})推广的,我要到商城购物去喽~~");
        //		$url =u('desk/buy',array('sid'=>$_SESSION['admin_info']['id'],'sname'=>$_SESSION['admin_info']['user_name'],'item_id'=>$_GET['item_id'],'push_id'=>$_GET['id'],'shop_id'=>$_GET['shop_id'],'con_id'=>$_GET['con_id'],'rate'=>$_GET['rate'],'cate_id'=>$_GET['cate_id'],'shop_id'=>$_GET['shop_id'],'bank_id'=>$_GET['bank_id'],'bank_subid'=>$_SESSION['admin_info']['pid'],'user_id'=>$_SESSION['admin_info']['user_id'] ));
        $url = u('desk/buy', array('sid' => $_GET['sid'], 'seller_name' => $_GET['sname'], 'item_id' => $_GET['item_id'], 'push_id' => $_GET['id'], 'shop_id' => $_GET['shop_id'], 'con_id' => $_GET['con_id'], 'rate' => $_GET['rate'], 'cate_id' => $_GET['cate_id'], 'cate_name' => $_GET['cate_name'], 'shop_id' => $_GET['shop_id'], 'bank_id' => $_GET['bank_id'], 'bank_subid' => $_GET['bank_subid']));
        echo("模拟购买~<a href='$url'>点击购买</a>");
        //		$this->assign('sort', $sort);
        //		$this->display();
        //        redirect('http://baidu.com');
    }

    // 推广链接跳转
    public function buy()
    {
        $item_info = M('items')->where(" shop_id={$_GET['shop_id']} AND item_id='{$_GET['item_id']}' ")->find();


        $commission_info = M('commission')->where(" shop_id={$_GET['shop_id']} AND item_id='{$_GET['item_id']}' AND platform_id={$_GET['bank_id']} ")->select();
//        var_dump(M('commission')->getLastSql());exit;
        if (is_array($commission_info) && count($commission_info) > 1) {
            if ($commission_info[0]['con_id'] > 0) {
                $rate = $commission_info[0]['rate'];
                $rate2 = $commission_info[1]['rate'];
            } else {
                $rate = $commission_info[1]['rate'];
                $rate2 = $commission_info[0]['rate'];
            }
        } else {
            $rate = $rate2 = $commission_info[0]['rate'];
        }


//		var_dump(M('commission')->getLastSql(),$commission_info,$item_info);exit;

        // TODO by jieqiang 测试屏蔽
		if (empty($commission_info) || empty($item_info)) {
            echo json_encode(array('status'=>0,'msg'=>'推广信息错误,status=0','data'=>array()));
            exit;
//		 $this->error('推广信息错误');
		 }
        /*var_dump(M('commission')->getLastSql());
//		 var_dump($item_info);
        var_dump($commission_info);exit;*/
        $_GET['order_id'] = $_GET['order_id'] ?: time();
        $_GET['order_time'] = time();
        $_GET['item_count'] = $_GET['item_count'] ?: 1;
        $_GET['platform_id'] = $_GET['bank_id'] ?: 1;
        $_GET['item_price'] = $_GET['item_price'] ?: $item_info['price'];
        /*$_GET['commission'] = $_GET['item_price']*$_GET['item_count']*$_GET['rate']/100;// 佣金
        $_GET['commission2'] = $_GET['item_price']*$_GET['item_count']*$_GET['rate2']/100;// 分润*/
        $_GET['commission'] = $_GET['item_price'] * $_GET['item_count'] * $rate / 100;// 佣金
        $_GET['commission2'] = $_GET['item_price'] * $_GET['item_count'] * $rate2 / 100;// 分润

        $_GET['sum_price'] = $_GET['item_price'] * $_GET['item_count'];
        $_GET['title'] = $_GET['title'] ?: $item_info['title'];
        //		$_GET['cate_id'] = $_GET['cate_id']?:$item_info['cate_id'];
        $_GET['cate_name'] = $_GET['cate_name'] ?: $item_info['cate_name'];
        //		var_dump($_GET);exit;
        // 查找订单号
        $order_has = M('orderlist')->where(" shop_id={$_GET['shop_id']} AND order_id='{$_GET['order_id']}' ")->find();

//        var_dump($order_has);

        if ($order_has) {
            $order_id = M('orderlist')->where(" shop_id={$_GET['shop_id']} AND order_id='{$_GET['order_id']}' ")->save(array('status' => $_GET['status']));
            echo json_encode(array('status'=>1,'msg'=>'购买成功,status=1','data'=>array()));
            exit;
            		var_dump(M('orderlist')->getLastSql());
            var_dump($order_id);
            /*if ($order_id) {
                echo json_encode(array('status'=>1,'msg'=>'购买成功,status=1','data'=>array()));
                 exit;
//                $this->success('购买成功,status=1');
            }*/
        } else {
            $order_id = M('orderlist')->add($_GET);
            //		var_dump(M('orderlist')->getLastSql());
            if ($order_id) {
                echo json_encode(array('status'=>1,'msg'=>'购买成功','data'=>array()));
                 exit;
//                $this->success('购买成功');
            }
        }

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