<?php
class publicAction extends baseAction
{
	// 菜单页面
	public function menu(){
		//显示菜单项
		$id	=	intval($_REQUEST['tag'])==0?6:intval($_REQUEST['tag']);
		$menu  = array();
		$role_id = D('admin')->where('id='.$_SESSION['admin_info']['id'])->getField('role_id');
		$node_ids_res = D("access")->where("role_id=".$role_id)->field("node_id")->select();

		$node_ids = array();
		foreach ($node_ids_res as $row) {
			array_push($node_ids,$row['node_id']);
		}

		// var_dump($node_ids);
		$ids = implode(',', $node_ids);

		//读取数据库模块列表生成菜单项
		$node    =   M("node");
		//		$where = "auth_type<>2 AND status=1 AND is_show=0 AND group_id=".$id;
		// 增加在cms_access的条件
		//如果是超级管理员，则可以执行所有操作
		if($_SESSION['admin_info']['id'] == 1) {
			$where = "auth_type<>2 AND status=1 AND is_show=0 AND group_id=".$id;
		}else{
			$where = "auth_type<>2 AND status=1 AND is_show=0 AND id in ($ids) AND group_id=".$id;
		}

		$list	=$node->where($where)->field('id,action,action_name,module,module_name,data')->order('sort ASC')->select();

		foreach($list as $key=>$action) {
			$data_arg = array();
			if ($action['data']){
				$data_arr = explode('&', $action['data']);
				foreach ($data_arr as $data_one) {
					$data_one_arr = explode('=', $data_one);
					$data_arg[$data_one_arr[0]] = $data_one_arr[1];
				}
			}
			$action['url'] = U($action['module'].'/'.$action['action'], $data_arg);
			if ($action['action']) {
				$menu[$action['module']]['navs'][] = $action;
			}
			$menu[$action['module']]['name']	= $action['module_name'];
			$menu[$action['module']]['id']	= $action['id'];
		}
		$this->assign('menu',$menu);
		$this->display('left');
	}

	/**
	 * 后台主页
	 */
	public function main()
	{
		$security_info=array();
		if(is_dir(ROOT_PATH."/install")){
			$security_info[]="强烈建议删除安装文件夹,点击<a href='".u('public/delete_install')."'>【删除】</a>";
		}
		if(APP_DEBUG==true){
			$security_info[]="强烈建议您网站上线后，建议关闭 DEBUG （前台错误提示）";
		}
		if(count($security_info)<=0){
			$this->assign('no_security_info',0);
		}
		else{
			$this->assign('no_security_info',1);
		}
		$this->assign('security_info',$security_info);
		$disk_space = @disk_free_space(".")/pow(1024,2);
		$server_info = array(
		    '程序版本'=>'3.0 [<a href="http://bbs.wego360.com/" target="_blank">查看最新版本</a>]',		
            '操作系统'=>PHP_OS,
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],	
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',		
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round($disk_space < 1024 ? $disk_space:$disk_space/1024 ,2).($disk_space<1024?'M':'G'),
		);
		$this->assign('set',$this->setting);
		$this->assign('server_info',$server_info);
		$this->display();
	}

	//找回密码
	public function recover(){
		//		var_dump($_POST);
		if(isset($_POST['dosubmit'])&&$_POST['find_password']=='find_password'){
			$find_password_log_mod=D('find_password_log');
			$uname=trim($_POST['username']);
			$email=trim($_POST['email']);
			$user_rel=M('admin')->where("user_name='{$uname}' AND email='{$email}'")->find();
			//执行入库操作
			if($user_rel>0){
				$uid=$user_rel['id'];
				$create_time=time();
				$ip=$_SERVER['REMOTE_ADDR'];
				$md5_data=md5(rand(0, 1000).$uid.$create_time.$ip);
				$add_data=array(
					'uid'=>$uid,
					'md5'=>$md5_data,
					'create_time'=>$create_time,
					'ip'=>$ip					
				);
				if($find_password_log_mod->add($add_data)){
					$address=$email;
					$password='a'.rand(100000, 999999);
					$url=$this->setting['site_domain'].'/cps.php?a=ac_pwd&m=public&k='.$md5_data.'&password='.$password.'&uid='.$uid;
					$title='找回'.$user_rel['user_name'].'在'.$this->setting['site_name'].'的密码';
					/*$message='<p>'.$user_rel['name'].' 您好:</p>
					<p>请点击下面的地址或将下面的地址输入到浏览器地址栏完成取回密码操作。 (注意：如果您没有进行过取回密码操作，请不要点击此链接)</p>	
					<p><a href="'.$url.'" target="_blank">重置密码为:'.$password.'</a></p>			
					<p>(本地址在2小时内有效)</p>								
					';*/
					
					$message='<p>'.$user_rel['user_name'].' 您好:</p>
					<p>请点击下面的地址或将下面的地址输入到浏览器地址栏完成取回密码操作。 (注意：如果您没有进行过取回密码操作，请不要点击此链接)</p>	
					<p><a href="'.$url.'" target="_blank">重置密码为:'.$password.'</a></p>			
					<p>(本地址在2小时内有效)</p>								
					';
					
					$message = str_replace(array('<p>','</p>'), " \n ", $message);
						
						
					$add_data['title']= $title;
					$add_data['address']= $address;
					$add_data['message']= $message;
					M('send_email_log')->add($add_data);
					//增加成功 发送邮件
					$this->sendMail($address, $title, $message);
					$this->success('恭喜您,提交信息成功 ,请查收邮件',U('public/recover'));exit;
				}

			}else{
				$this->error('您的用户名或者邮箱输入错误');
			}

		}
		$this->display();
	}


	//点击找回密码执行找回操作
	public function ac_pwd(){
		//执行修改密码操作
		if(isset($_POST['dosubmit'])&&isset($_POST['k'])){
			$k=setFormString($_POST['k']);
			$pass=setFormString(trim($_POST['password']));
			$rpass=setFormString(trim($_POST['rpassword']));

			$pass_log_mod=D('find_password_log');
			$rel=$pass_log_mod->where("md5='{$k}'")->find();
			if(count($rel)>0){
				if($pass==$rpass){
					if($rel['status']==0){   //只有状态为0的时候才可以激活
						//修改密码
						//						$user_mod=$this->user_mod;
						$user_mod=M('admin');
						$data=array();
						$data['passwd']=md5($pass);
						//判断原来的密码和现在的是否相等
						$user_rel=$user_mod->where("id='{$rel['uid']}' AND passwd='{$data['passwd']}'")->find();
						if($user_rel){
							$this->error('此密码与原来的密码相同');
						}
						$user_rel=$user_mod->where("id='{$rel['uid']}'")->save($data);
						if($user_rel){
							//修改状态
							$status=array();
							$status['status']=1;
							$pass_log_mod->where("md5='{$k}'")->save($status);
							$this->success('恭喜您，修改密码成功，请重新登录');
							//							$this->assign('url',$this->setting['site_domain'].'/index.php?m=uc&a=login');
						}
						else{
							$this->error('修改密码失败请重新修改');
							//							$this->assign('url',$this->setting['site_domain'].'/index.php?a=find_password&m=uc');
						}
					}
				}
			}else{
				$this->error('请通过正规的方式修改密码');
			}
		}else{
			//执行修改显示操作
			if(!isset($_GET['k'])){
				//				$this->assign('url',$this->setting['site_domain']);
				$this->error('您的链接地址不正确，请通过正规方式找回密码',U('public/recover'));
			}else{
				$k=trim($_GET['k']);
				$pass_log_mod=M('find_password_log');

				//				$rel=$pass_log_mod->where("md5='{$k}'")->find();
				$rel=$pass_log_mod->where("md5='{$k}' AND uid={$_GET['uid']}")->find();
				if(count($rel>0)){

					if($rel['status']==0){
						$now_time=time();
						if(($now_time-$rel['create_time'])>60*60*2){
							//							$this->assign('url',$this->setting['site_domain']);
							$this->error('您的链接地址已经过期，请重新找回密码',U('public/recover'));
							//错误，时间大于俩小时
						}else{
							//修改密码
							//						$user_mod=$this->user_mod;
							$user_mod=M('admin');
							$data=array();
							$data['password']=md5($_GET['password']);
							//判断原来的密码和现在的是否相等
							/*$user_rel=$user_mod->where("id='{$_GET['uid']}' AND password='{$data['password']}'")->find();
							if($user_rel){
								$this->error('此密码与原来的密码相同');
							}*/
							$user_rel=$user_mod->where("id='{$rel['uid']}'")->save($data);
							if($user_rel){
								//修改状态
								$status=array();
								$status['status']=1;
								$pass_log_mod->where("md5='{$k}'")->save($status);
								$this->success('恭喜您，修改密码成功，请重新登录',U('public/login'));
								//							$this->assign('url',$this->setting['site_domain'].'/index.php?m=uc&a=login');
							}
							$this->assign('k',$k);
							//执行修改密码操作
							$this->assign('ac_pwd','重置密码');
						}
					}
					else{
						//						$this->assign('url',$this->setting['site_domain']);
						$this->error('您已经激活过密码了此链接不可用',U('public/recover'));
					}


				}
				else{
					//					$this->assign('url',$this->setting['site_domain']);
					$this->error('您的链接地址不正确，请通过正规方式找回密码',U('public/recover'));
				}
			}

		}

		$this->display();
	}


	// 注册
	function register() {
		if ($_POST) {
			//		if (0) {

			$admin_mod = D('admin');
			if(!isset($_POST['user_name'])||($_POST['user_name']=='')){
				$this->error('用户名不能为空');
				//				echo('用户名不能为空');exit;
			}

			if(!isset($_POST['password'])||($_POST['password']=='')){
				$this->error('密码不能为空');
				//				echo('用户名不能为空');exit;
			}

			if(!isset($_POST['repassword'])||($_POST['repassword']=='') || ($_POST['password'] != $_POST['repassword'])){
				$this->error('两次输入的密码不相同');
			}

			//			var_dump(111);exit;

			$result = $admin_mod->where("user_name='".$_POST['user_name']."'")->count();
			if($result){
				$this->error('管理员'.$_POST['user_name'].'已经存在');
				//			    echo('管理员'.$_POST['user_name'].'已经存在');exit;
			}
			unset($_POST['repassword']);
			$_POST['password'] = md5($_POST['password']);
			$admin_mod->create();

			// Log::write('$_POST======'.json_encode($_POST), $level);
			$admin_mod->add_time = time();
			$admin_mod->last_time = time();
			$result = $admin_mod->add();
			// Log::write('getLastSql=$_POST======'.$admin_mod->getLastSql(), $level);

			if($result){
				$admin_info=$admin_mod->where("user_name='{$_POST['user_name']}'")->find();
				// Log::write('getLastSql=$_POST2======'.$admin_mod->getLastSql(), $level);
				//使用用户名、密码和状态的方式进行认证
				if(false === $admin_info) {
					$this->error('帐号不存在或已禁用！');
				}else {
					$_SESSION['admin_info'] =$admin_info;
					if($authInfo['user_name']=='admin') {
						$_SESSION['administrator'] = true;
					}
					$this->success('登录成功！',u('index/index'));
					exit;
				}
					
				//				echo('成功');exit;
				$this->success(L('operation_success'),u('index/index'));
			}else{
				//				echo('失败');exit;
				$this->error(L('operation_failure'));
			}

		}
		$this->display();
	}

	public function login()
	{
		//unset($_SESSION);
		$admin_mod=M('admin');
		if ($_POST) {
			$username = $_POST['username'] && trim($_POST['username']) ? trim($_POST['username']) : '';
			$password = $_POST['password'] && trim($_POST['password']) ? trim($_POST['password']) : '';
			if (!$username || !$password) {
				redirect(u('public/login'));
			}
			if($this->setting['check_code']==1){
				if ($_SESSION['verify'] != md5($_POST['verify']))
				{
					$this->error(L('verify_error'));
				}
			}
			//生成认证条件
			$map  = array();
			// 支持使用绑定帐号登录
			$map['user_name']	= $username;
			$map["status"]	=	array('gt',0);
			//			$admin_info=$admin_mod->where("user_name='$username'")->find();
			$admin_info=$admin_mod->where($map)->find();
			//            var_dump($admin_mod->getLastSql());exit;
			//使用用户名、密码和状态的方式进行认证
			//			if(false === $admin_info) {
			if(empty($admin_info) ) {
				$this->error('帐号不存在或已禁用！');
			}else {
				if($admin_info['password'] != md5($password)) {
					$this->error('密码错误！');
				}

				$_SESSION['admin_info'] =$admin_info;
				if($authInfo['user_name']=='admin') {
					$_SESSION['administrator'] = true;
				}
				$this->success('登录成功！',u('index/index'));
				exit;
			}
		}
		$this->assign('set',$this->setting);
		$this->display();
	}

	public function logout()
	{
		if(isset($_SESSION['admin_info'])) {
			unset($_SESSION['admin_info']);
			$this->success('退出登录成功！',u('public/login'));
		}else {
			$this->error('已经退出登录！');
		}
	}
	public function delete_install(){
		import("ORG.Io.Dir");
		$dir = new Dir;
		$dir->delDir(ROOT_PATH."/install");
		@unlink(ROOT_PATH.'/install.php');
		if(!is_dir(ROOT_PATH."/install")){
			$this->success(L('operation_success'));
		}
	}
}
?>