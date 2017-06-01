<?php
/**
 * 基础Action
 */
header("Content-type: text/html; charset=utf-8");
class baseAction extends Action {
	public $user_mode='';  //用户模型
	public $user_info='';  //用户模型
	public $admin_mod='';  //管理员模型
	//	public $items_cate_mod='';   //项目分类
	public $album_mod='';   //专辑模型
	public $album_cate_mod='';   //专辑分类
	public $role_mod='';//权限表
	public $sendMsg_mod='';
	protected $seo_mod;
	function mod_init(){
		//		$this->admin_mod=D('admin');
		//		$this->items_cate_mod=D('items_cate');
		//		$this->user_mode=D('user');
		//		$this->user_info=D('user_info');
		//		$this->album_mod=D('album');
		//		$this->album_cate_mod=D('album_cate');
		//        $this->sendMsg_mod=M('UserMsg');
		//        $this->seo_mod = M('seo');
	}


	// 菜单页面
	public function menu(){
		//显示菜单项
		//		$id	=	intval($_REQUEST['tag'])==0?6:intval($_REQUEST['tag']);
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
		//        $_SESSION['admin_info']['id'] =1;   // TODO jieqiangtest 写死=1
		//		var_dump($_SESSION['admin_info']);
		/*if($_SESSION['admin_info']['id'] == 1) {
		 $where = "auth_type<>2 AND status=1 AND is_show=0 AND group_id=".$id;
		 }else{
		 $where = "auth_type<>2 AND status=1 AND is_show=0 AND id in ($ids) AND group_id=".$id;
		 }*/

		// 去除组别，显示所有权限，不分组
		if($_SESSION['admin_info']['id'] == 1) {
			$where = "auth_type<>2 AND status=1 AND is_show=0 ";
		}else{
			$where = "auth_type<>2 AND status=1 AND is_show=0 AND id in ($ids)";
		}


		//		$list	=$node->where($where)->field('id,action,action_name,module,module_name,data')->order('sort DESC')->select();
		$list	=$node->where($where)->field('id,action,action_name,module,module_name,data')->order('sort ASC')->select();

		//		var_dump('getLastSql==',$node->getLastSql());
		//		var_dump('$list==',$list);

		foreach($list as $key=>$action) {
			//			var_dump('$key=='.$key,'$action==',$action);
			$data_arg = array();
			if ($action['data']){
				$data_arr = explode('&', $action['data']);
				foreach ($data_arr as $data_one) {
					$data_one_arr = explode('=', $data_one);
					$data_arg[$data_one_arr[0]] = $data_one_arr[1];
				}
			}
			$action['url'] = U($action['module'].'/'.$action['action'], $data_arg);

			// 修改图标 by jieqiang 201705031308  module和action确定唯一图标
			//			var_dump('$action=======',$action['module'].'_'.$action['action']);
			//			$action['module'] = 'user';
			switch ($action['module'].'_'.$action['action']){
				case 'role_index': // 权限管理
					$action['module2'] = 'key';
					break;
				case 'finance_push': // 推广管理
					$action['module2'] = 'bar-chart';
					break;
				case 'contract_index':// 合同管理
					$action['module2'] = 'clipboard';
					break;
				case 'finance_finance':// 财务管理
					$action['module2'] = 'write';
					break;
				case 'admin_index':// 用户管理
					$action['module2'] = 'user';
					break;
				case 'article_index':// 公告管理
					$action['module2'] = 'announcement';
					break;
				case 'analyse_index':// 数据分析
					$action['module2'] = 'pie-chart';
					break;
				case 'finance_commission':// 佣金管理
					$action['module2'] = 'money';
					break;
				case 'finance_settle':// 结算管理
					$action['module2'] = 'wallet';
					break;
				case 'items_poster':// 海报管理
					$action['module2'] = 'image';
					break;
				case 'items_index':// 推广商品
					$action['module2'] = 'shopping-cart';
					break;
				case 'admin_pwd':// 账号管理
					$action['module2'] = 'lock';
					break;
				case 'items_cate_index':// 分类管理
					$action['module2'] = 'save';
					break;
				default:
					$action['module2'] = 'key';
			}

			if ($action['action']) {
				$menu[$action['module']]['navs'][] = $action;
			}
			$menu[$action['module']]['name']	= $action['module_name'];
			$menu[$action['module']]['id']	= $action['id'];
			//			var_dump('$action==',$action);
			//			var_dump('name==='.$menu[$action['module']]['name']);
		}

		return  $menu;
	}


	function _initialize(){
		//过滤所有的GET POST请求
		//判断是否允许ip访问
		$banip=getBanip();


		if($banip){
			foreach ($banip as $key=>$value){
				banip($value[0], $value[1]);
			}
		}
		include ROOT_PATH.'/includes/lib_common.php';
		$this->mod_init();

		$this->site_root="http://".$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT']).__ROOT__."/";

		$this->assign('site_root',$this->site_root);
		// 用户权限检查

		//	TODO 暂时屏蔽
		//		if ( (ACTION_NAME !== 'login')|| (ACTION_NAME !== 'register') ||(ACTION_NAME !== 'recover')) {
		if ( !in_array(ACTION_NAME, array('login','register','recover'))) {
			$this->check_priv();
		}

		// 菜单
		//		var_dump($this->menu());
		$this->assign('menu',$this->menu());

		//需要登陆
		$admin_info =$_SESSION['admin_info'];

		$this->role_mod=D("role");
		//获取用户角色
		$admin_level=$this->role_mod->field('id','name')->where('id='.$_SESSION['admin_info']['role_id'].'')->find();

		$this->assign('admin_level',$admin_level);
		$this->assign('my_info', $admin_info);

		// 顶部菜单
		$model	=	M("group");
		//		$top_menu	=$model->field('id,title')->where('status=1')->order('sort ASC')->select();
		$role_id = D('admin')->where('id='.$_SESSION['admin_info']['id'])->getField('role_id');
		$node_ids_res = D("access")->where("role_id=".$role_id)->field("node_id")->select();


		$node_ids = array();
		foreach ($node_ids_res as $row) {
			array_push($node_ids,$row['node_id']);
		}

		// var_dump($node_ids);
		// 节点id
		$ids = implode(',', $node_ids);
		// 增加在cms_access的条件
		//如果是超级管理员，则可以执行所有操作
		// $id	=	intval($_REQUEST['tag'])==0?6:intval($_REQUEST['tag']);
		if($_SESSION['admin_info']['id'] == 1) {
			$where = "auth_type<>2 AND status=1 AND is_show=0 ";
		}else{
			$where = "auth_type<>2 AND status=1 AND is_show=0 AND id in ($ids)";
		}

		// var_dump($where);
		$list	=M("node")->where($where)->Distinct(true)->field('group_id')->order('sort DESC')->select();
		// var_dump($list);
		// var_dump(count($list));
		if (count($list) == 1) {
			// 分组id
			$gId = $list[0] ['group_id'];
			$top_menu	=$model->field('id,title')->where("status=1 AND id = $gId")->order('sort ASC')->select();
		} else {
			// 分组id
			foreach ($list as $key => $value) {
				$gIds[] = $value['group_id'];
			}
			$gIds = implode(',', $gIds);
			$top_menu	=$model->field('id,title')->where("status=1 AND id in ($gIds)")->order('sort ASC')->select();
		}


		$this->assign('top_menu',$top_menu);

		//		var_dump($top_menu);
		//获取网站配置信息
		$setting_mod = M('setting');
		$setting = $setting_mod->select();
		foreach ( $setting as $val ) {
			$set[$val['name']] = $val['data'];
		}
		$this->setting = $set;

		//返现形式
		$this->assign('cashback_type', $this->setting['cashback_type']);
		//tb_fanxian_name 淘宝返现名称
		$this->assign('tb_fanxian_name', $this->setting['tb_fanxian_name']);
		//tb_fanxian_unit 淘宝返现单位
		$this->assign('tb_fanxian_unit', $this->setting['tb_fanxian_unit']);
		//tb_fanxian_bili  淘宝返现比例
		$this->assign('tb_fanxian_bili', $this->setting['tb_fanxian_bili']);


		$this->assign('show_header', true);
		$this->assign('const',get_defined_constants());

		$this->assign('iframe',$_REQUEST['iframe']);
		$def=array(
			'request'=>$_REQUEST
		);
		$this->assign('def',json_encode($def));

	}
	//检查权限
	public function check_priv()
	{
		if ((!isset($_SESSION['admin_info']) || !$_SESSION['admin_info']) && !in_array(ACTION_NAME, array('login','verify_code'))) {
			$this->redirect('public/login');
		}
		//如果是超级管理员，则可以执行所有操作
		if($_SESSION['admin_info']['id'] == 1) {
			return true;
		}
		if(in_array(ACTION_NAME,array('status','sort_order','ordid'))){
			return true;
		}
		//排除一些不必要的权限检查
		foreach (C('IGNORE_PRIV_LIST') as $key=>$val){
			if(MODULE_NAME==$val['module_name']){
				if(count($val['action_list'])==0)return true;

				foreach($val['action_list'] as $action_item){
					if(ACTION_NAME==$action_item)return true;
				}
			}
		}
		$node_mod = D('node');
		// 权限到模块，不到操作  By jieqiang20170506
		//		$node_id = $node_mod->where(array('module'=>MODULE_NAME, 'action'=>ACTION_NAME))->getField('id');
		$node_id = $node_mod->field('id')->where(array('module'=>MODULE_NAME))->select();
		foreach ($node_id as $v){
			$ids[] = $v['id'];
		}

		$access_mod = D('access');
		//		$rel = $access_mod->where(array('node_id'=>$node_id, 'role_id'=>$_SESSION['admin_info']['role_id']))->count();
		$rel = $access_mod->where(array('node_id'=>array('in',$ids), 'role_id'=>$_SESSION['admin_info']['role_id']))->count();

		//		var_dump($node_id,$node_mod->getLastSql(),$access_mod->getLastSql(),$rel);exit;
		if ($rel==0) {
			$this->error(L('_VALID_ACCESS_'));
		}
	}
	//配置淘宝的基本信息
	public function taobao_client()
	{
		vendor('Taobaotop.TopClient');
		vendor('Taobaotop.RequestCheckUtil');
		vendor('Taobaotop.Logger');
		$tb_top = new TopClient;
		$tb_top->appkey = $this->setting['taobao_appkey'];
		$tb_top->secretKey = $this->setting['taobao_appsecret'];
		return $tb_top;
	}
	//配置  微购  api基本信息
	public function wegoApiSearch($q='',$page='')
	{

		if(S('wegoapi')){
			$wegoapi = S('wegoapi');
		}else{
			//网站配置
			$wegoapi_mod = M('wegoapi');
			$setting = $wegoapi_mod->select();
			foreach ($setting as $val) {
				$wegoapi[$val['name']] = $val['data'];
			}
			S('wegoapi',$wegoapi,'3600');
		}
		$name=$wegoapi['username'];
		$pwd=$wegoapi['password'];
		$token=$wegoapi['token'];
		$sales=$wegoapi['tao_collect_set']; //促销方式
		if($sales==0){
			$sales='';
		}
		$order=$wegoapi['order'];   //排序方式
		if($order==0){
			$order='';
		}
		if($page==''){
			$page=1;
		}
		$p_start=$wegoapi['price_min']; //最小价格
		$p_end=$wegoapi['price_max'];  //最大价格

		//commission_rate_min 佣金比例

		$ratio=$wegoapi['commission_rate_min'];


		$q=urlencode($q);
		//password     weburl  token   commission_rate_min commission_rate_max
		//levelstart   levelend    tao_collect_set
		//order
		$url="http://m.showcoo.net/collection_tbk.htm?name=$name&pwd=$pwd&token=$token&sales=$sales&p_start=$p_start&p_end=$p_end&order=$order&ratio=$ratio&page=$page&q=$q";

		$content=file_get_contents($url);
		$json_content=json_decode($content);
		return $json_content;
	}
	//配置V购api基本信息
	public function miao_client()
	{
		define('API_CACHETIME','0');  //缓存时间默认为小时   0表示不缓存
		define('API_CACHEPATH','Runtime/Api59miao_cache'); //缓存目录
		define('CHARSET','UTF-8');  //编码
		define('APIURL','http://api.59miao.com/Router/Rest?');  //请求地址
		define('API_CLEARCACHE','1 23 * *');   //自动清除缓存时间
		vendor('api59miao.init');
		$appkey = $this->setting['miao_appkey'];
		$appsecret = $this->setting['miao_appsecret'];
		//引入59秒api文件
		$AppKeySecret=Api59miao_Toos::GetAppkeySecret($appkey,$appsecret);   //获取appkey appsecret
		$_api59miao=new Api59miao($AppKeySecret);
		return $_api59miao;
	}

	//截取中文字符串
	public function mubstr($str,$start,$length)
	{
		import('ORG.Util.String');
		$a = new String();
		$b = $a->msubstr($str,$start,$length);
		return($b);
	}


	//失败页面重写  默认时间改成0 by jieqiang 20170506
	protected function error($message, $url_forward='',$ms = 0, $dialog=false, $ajax=false, $returnjs = '')
	{
		$this->jumpUrl = $url_forward;
		$this->waitSecond = $ms;
		$this->assign('dialog',$dialog);
		$this->assign('returnjs',$returnjs);
		parent::error($message, $ajax);
	}
	//成功页面重写
	protected function success($message, $url_forward='',$ms = 0, $dialog=false, $ajax=false, $returnjs = '')
	{
		$this->jumpUrl = $url_forward;
		$this->waitSecond = $ms;
		$this->assign('dialog',$dialog);
		$this->assign('returnjs',$returnjs);
		parent::success($message, $ajax);
	}





	public function simplexml_obj2array($obj)
	{
		if ($obj instanceof SimpleXMLElement) {
			$obj = (array)$obj;
		}

		if (is_array($obj)) {
			$result = $keys = array();
			foreach ( $obj as $key=>$value) {
				isset($keys[$key]) ? ($keys[$key] += 1) : ($keys[$key] = 1);

				if ( $keys[$key] == 1 ) {
					$result[$key] = self::simplexml_obj2array($value);
				} elseif ( $keys[$key] == 2 ) {
					$result[$key] = array($result[$key], self::simplexml_obj2array($value));
				} else if( $keys[$key] > 2 ) {
					$result[$key][] = self::simplexml_obj2array($value);
				}
			}
			return $result;
		} else {
			return $obj;
		}
	}
	public function saddslashes($value)
	{
		if (empty($value)) {
			return $value;
		} else {
			return is_array($value) ? array_map(array('BaseAction','saddslashes'), $value) : addslashes($value);
		}
	}
	/*
	 * 通用删除操作
	 * */
	public function delete(){
		$mod=D(MODULE_NAME);

		if (isset($_POST['id']) && is_array($_POST['id'])) {
			$ids = implode(',', $_POST['id']);
			$result=$mod->delete($ids);
		} else {
			$id = intval($_GET['id']);
			$result=$mod->delete($id);
		}

		if($result){
			$this->success(L('operation_success'));
		}else{
			$this->error(L('operation_failure'));
		}
	}
	public function check_res($result){
		if($result){
			$this->success(L('operation_success'));
		}else{
			$this->error(L('operation_failure'));
		}
	}
	/*
	 * 通用改变状态
	 * */
	public function status(){
		$mod = D(MODULE_NAME);
		$id     = intval($_REQUEST['id']);
		$type   = trim($_REQUEST['type']);
		$sql    = "update ".C('DB_PREFIX').MODULE_NAME." set $type=($type+1)%2 where id='$id'";
		$res    = $mod->execute($sql);
		$values = $mod->where('id='.$id)->find();
		$this->ajaxReturn($values[$type]);
	}
	/*
	 * 通用排序方法单个排序
	 * */
	public function sort(){
		$mod = D(MODULE_NAME);
		$id     = intval($_REQUEST['id']);
		$type   = trim($_REQUEST['type']);
		$num=trim($_REQUEST['num']);
		if(!is_numeric($num)){
			$values = $mod->where('id='.$id)->find();
			$this->ajaxReturn($values[$type]);
			exit;
		}
		$sql    = "update ".C('DB_PREFIX').MODULE_NAME." set $type=$num where id='$id'";

		$res    = $mod->execute($sql);
		$values = $mod->where('id='.$id)->find();
		$this->ajaxReturn($values[$type]);
	}

	/*
	 * 通用检查值是否存在,存在则返回true
	 * */
	public function ajax_check_exist(){
		$mod = D(MODULE_NAME);
		$clientid=$_REQUEST['clientid'];
		if(!isset($clientid))exit;

		$clientid_val=$_REQUEST[$clientid];
		$id=intval($_REQUEST['id']);
		if($id>0){
			//edit
			$where="$clientid='$clientid_val' and id!=$id";
		}else{
			//add
			$where="$clientid='$clientid_val'";
		}
		$this->ajaxReturn($mod->where($where)->count()>0);
	}
	/*
	 * 通用排序
	 * */
	public function sort_order(){
		$mod = D(MODULE_NAME);
		if (isset($_POST['listorders'])) {
			foreach ($_POST['listorders'] as $id=>$sort_order) {
				$data['sort_order'] = $sort_order;
				$mod->where('id='.$id)->save($data);
			}
			$this->success(L('operation_success'));
		}
		$this->error(L('operation_failure'));
	}
	public function _stripcslashes($arr){
		if(ini_get('magic_quotes_gpc')!='1')return $arr;
		foreach ($arr as $key=>$val){
			$arr[$key]=stripcslashes($val);
		}
		return $arr;
	}
	//返回分页信息
	public function pager($count,$pagesize=20){
		import("ORG.Util.Page");
		$pager=new Page($count,$pagesize);
		$this->assign('page', $pager->show());
		return $pager;
	}
	public function append_user($res){
		foreach($res as $key=>$val){
			$res[$key]['user']=$this->user_mode->where('id='.$val['uid'])->find();
		}
		return $res;
	}
	//公共上传图片方法
	public function _upload($savePath)
	{
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 32922000;
		$upload->allowExts = explode(',', 'jpg,gif,png,jpeg,xlsx');
		$upload->savePath = ROOT_PATH.'/data/'.$savePath.'/';
		$upload->saveRule = uniqid;

		if (!$upload->upload()) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		} else {
			//取得成功上传的文件信息
			$uploadList = $upload->getUploadFileInfo();
		}
		$uploadList='./data/'.$savePath.'/'.$uploadList['0']['savename'];

		return $uploadList;
	}
	//发送邮件
	/*address 表示收件人地址
	 *title 表示邮件标题
	 *message表示邮件内容
	 *
	 * */
	public function sendMail($address,$title,$message){
		vendor('mail.mail');
		$message   = preg_replace('/\\\\/','', $message);
		$mail=new PHPMailer();
		$mail->IsSMTP();     // 设置PHPMailer使用SMTP服务器发送Email
		$mail->CharSet='UTF-8';     // 设置邮件的字符编码，若不指定，则为'UTF-8'
		$mail->Port= $this->setting['mail_port'];    //端口号
		$mail->AddAddress($address);   // 添加收件人地址，可以多次使用来添加多个收件人
		$mail->Body=$message;     // 设置邮件正文
		$mail->From=$this->setting['mail_username'];    // 设置邮件头的From字段。
		$mail->FromName=$this->setting['mail_fromname'];   // 设置发件人名字
		$mail->Subject=$title;     // 设置邮件标题
		$mail->Host=$this->setting['mail_smtp'];        // 设置SMTP服务器。
		$mail->SMTPAuth=true;   // 设置为“需要验证”
		$mail->Username=$this->setting['mail_username'];     // 设置用户名和密码。
		$mail->Password=$this->setting['mail_password'];    // 发送邮件。
		return($mail->Send());
	}
	/*
	 发送站内信
	 array(to_user,form_user,title,content,date)
	 */
	function sendMsg($array){

		if(is_array($array)){
			$this->sendMsg_mod->add($array);
		}
		return;
	}
	//查询母个商品的返现金额
	public function get_commission($title,$num_iid,$p='commission'){
		$tb_top = $this->taobao_client();
		$req = $tb_top->load_api('TaobaokeItemsGetRequest');
		$req->setFields("num_iid,title,nick,pic_url,price,click_url,shop_click_url,commission");
		$req->setPid($this->setting['taobao_pid']);
		$req->setNick($this->setting['taobao_usernick']);
		$req->setKeyword($title);
		$req->setPageNo(1);
		$req->setPageSize(40);
		$goods_list = get_object_vars_final($tb_top->execute($req));
		if($goods_list['total_results']>0){
			$good_list_rel=$goods_list['taobaoke_items']['taobaoke_item'];
		}
		else{
			if($p=='commission'){
				return '0';
			}else{
				return;
			}

		}
		if(!is_array($good_list_rel)){
			if($p=='commission'){
				return '0';
			}
			else{
				return;
			}

		}
		$c=count($good_list_rel);
		for($i=0;$i<$c;$i++){
			if($good_list_rel[$i]['num_iid']==$num_iid && strip_tags($good_list_rel[$i]['title'])==strip_tags($title)){
				$re=$good_list_rel[$i];
			}
		}
		if($p=='commission') return $re['commission'];
		if($p=='click_url') return $re['click_url'];
	}
	function getSign(){
		$setting_mod = M('wegoapi');
		$res = $setting_mod->where("name='weburl' OR name='sign'")->select();

		foreach( $res as $val )
		{
			$wegoapi[$val['name']] = $val['data'];
		}
		if($_SERVER['HTTP_HOST']!=$wegoapi['weburl']){
			return 0;
		}
		$apiurl="http://www.wego360.com/wegoapi/api.php?url={$wegoapi['weburl']}&sign={$wegoapi['sign']}";
		$result=file_get_contents($apiurl);
		return $result;
	}
}
?>
