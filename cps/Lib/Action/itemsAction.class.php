<?php

class itemsAction extends baseAction
{
	public function create_qrcode($value)
	{
//        var_dump($value);exit;
		//        $matrixPointSize = I('size', 12, 'intval'); //获取生成二维码的大小，默认4
		$matrixPointSize = I('size', 4, 'intval'); //获取生成二维码的大小，默认4
		//		$matrixPointSize = I('size',7,'intval'); //获取生成二维码的大小，默认4
		//        		$matrixPointSize = 1; //获取生成二维码的大小，默认4
		if (strpos($value, "http") === 0) {
			$value = urldecode($value);
		}
		vendor("phpqrcode.phpqrcode");
		$errorCorrectionLevel = 'H';//容错级别
		$qrcode = './data/qrcode/tmp/ssqrcode_' . time() . '.jpg';
		Log::write('$$qrcode==' . $qrcode);
		//生成二维码图片
		//        \QRcode::png($value, $QR, $errorCorrectionLevel, $matrixPointSize, 2, true);
		\QRcode::png($value, $qrcode, $errorCorrectionLevel, $matrixPointSize, 2);
		return $qrcode;
		exit;
	}

	// 生成海报
	public function create_poster($poster_bg = '/qrcode/poster_bg.jpg', $qrcode = '/qrcode/qrcode.jpg', $head_source = '/qrcode/header.jpg')
	{
		
		$APP_URL = 'http://' . $_SERVER['HTTP_HOST'] . '/';
//		$APP_URL = 'http://localhost/99_ctw/msec3.jieqiangtec.com/';
//		var_dump($APP_URL);exit;
		$file = $_REQUEST['img'];
		// 判断是否有底图
		if ($file) {
			//			$poster_bg = $APP_URL.__ROOT__.$file['img'];  // 海报背景图  从库中取得
//			$poster_bg = $APP_URL . __ROOT__ . $file;  // 海报背景图
			$poster_bg = $APP_URL . __ROOT__.'/' . $file;  // 海报背景图
//			var_dump(__ROOT__,$poster_bg);exit;
		} else {
			$poster_bg = $APP_URL . __ROOT__ . '/data' . $poster_bg;  // 海报背景图
		}

		$head_source = $APP_URL . __ROOT__ . '/data' . $head_source;

		// 商品信息取商品表
		/*$item = M('commission')->where(" item_id={$_REQUEST['item_id']} ")->find();
		 $text = $item['title'];
		 $text = "{$_REQUEST['sname']}向您推荐好货 \n $text ";*/
		//        $text = "{$_REQUEST['user_id']}({$_REQUEST['sname']})向您推荐好货 \n {$_REQUEST['title']} ";
		$text = "{$_REQUEST['user_id']}向您推荐好货 \n {$_REQUEST['title']} ";
		// $qrcode = $APP_URL.__ROOT__.'/data'.$qrcode; // 二维码  jiu
		//		$qrcode = $this->create_qrcode(U('items/prom',array('sid'=>$_SESSION['admin_info']['id'],'item_id'=>$_REQUEST['item_id'],'shop_id'=>$_REQUEST['shop_id'],'con_id'=>$_REQUEST['con_id'],'rate'=>$_REQUEST['rate'],'cate_id'=>$_REQUEST['cate_id'] )));

        // 重置bank_id
        $_REQUEST['bank_id'] = get_platform_id($_SESSION['admin_info']);

		$qrcode = $this->create_qrcode($APP_URL . U('desk/prom', $_REQUEST)); //生产二维码

//		$qrcode = $this->create_qrcode("{$_REQUEST['url']}?sid={$_SESSION['admin_info']['id']}&item_id={$_REQUEST['item_id']}&commission_id={$_REQUEST['id']}&shop_id={$_REQUEST['shop_id']}&con_id={$_REQUEST['con_id']}&bank_id={$_REQUEST['bank_id']}&bank_subid={$_SESSION['admin_info']['pid']}"); //生产二维码
		$qrcode_url = $APP_URL . __ROOT__ . $qrcode; // 二维码

		$head_source = @imagecreatefromjpeg($head_source); // imagecreatefromjpeg — 由文件或URL创建一个新图象
		$qrcode_path = $poster_path = './data/qrcode/'; //存放目录
		$poster_name = 'poster_' . $_REQUEST['sid'] . '_' . $_REQUEST['sname'] . '_' . $_REQUEST['item_id'] . '_' . $_REQUEST['shop_id'] . '_' . time(); // 文件命名
		//        var_dump(imagecreatefromjpeg($qrcode));exit;

		// 测试时屏蔽
		header("Content-type: image/jpeg");

		//创建目标图像
		//$dst_im = imagecreatetruecolor(150, 150);
		$dst_im = @imagecreatefromjpeg($poster_bg);

		//源图像
		//		$qrcode_srouce = @imagecreatefromjpeg($qrcode);
		$qrcode_srouce = imagecreatefromstring(file_get_contents($qrcode_url)); // 读取二维码图像

		//微信二维码默认是430像素，将其缩放成300像素，核心代码如下
		//        $qrcode_thumb = imagecreatetruecolor(300, 300);
		$qrcode_thumb = imagecreatetruecolor(200, 200);
		//        imagecopyresampled($qrcode_thumb, $qrcode_srouce, 0, 0, 0, 0, 300, 300, 430, 430);
		$QR_width = imagesx($qrcode_srouce);//二维码图片宽度
		//重新组合图片并调整大小  二维码图片大小
		//        imagecopyresampled($qrcode_thumb, $qrcode_srouce, 0, 0, 0, 0, 300, 300, $QR_width, $QR_width);
		imagecopyresampled($qrcode_thumb, $qrcode_srouce, 0, 0, 0, 0, 200, 200, $QR_width, $QR_width);

		//头像合成到二维码图片上
		//        imagecopy($qrcode_thumb, $head_source, 118, 118, 0, 0, 64, 64);

		//拷贝源图像左上角起始 150px 150px
		//imagecopy( $dst_im, $src_im, 0, 0, 0, 0, 430,  430 );

		//加水印
		//imagecopy($dst_im, $src_im, 212, 410, 0, 0, 300, 300);    //水印位置
		imagecopy($dst_im, $qrcode_thumb, 165, 410, 0, 0, 200, 200);    //水印位置  左距185上距410

		//        imagecreatetruecolor — 新建一个真彩色图像
		$im = imagecreatetruecolor(400, 30);
		$textcolor = imagecolorallocate($im, 255, 255, 255);  // 白色

		//        $font = 'arial.ttf';
		$font = './statics/cps/fonts/simsun.ttc';   // 支持中文

		//文字合成到海报中
		imagettftext($dst_im, 28, 0, 20, 85, $textcolor, $font, $text);
		//		imagettftext($dst_im, 30, 0, 40, 170, $textcolor, $font, $text);
		// Add the text
		//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

		//输出拷贝后图像
		$poster_img = $qrcode_path . $poster_name . ".jpg";
		//		写入二维码表，商品表
		Log::write('$poster_img==' . $poster_img);
		M('items')->where("id={$_REQUEST['origin_id']}")->save(array('qrcode' => $poster_img));

		// 写入海报表
		$data = array('img' => $poster_img, 'origin_name' => $_REQUEST['title'], 'origin_id' => $_REQUEST['origin_id'], 'item_id' => $_REQUEST['item_id'], 'con_id' => $_REQUEST['con_id'], 'shop_id' => $_REQUEST['shop_id'], 'add_time' => date('Y-m-d H:i:s'), 'update_time' => date('Y-m-d H:i:s'), 'status' => 1, 'data_state' => 1);
		M('poster')->add(array_merge($data));
		//		var_dump(M('items')->getLastSql());exit;
		//        var_dump($qrcode_img);
		imagejpeg($dst_im);//输出
		imagejpeg($dst_im, $poster_img, 90);// TODO 生产环境屏蔽 保存图片  上线后屏蔽
		//		imagejpeg($dst_im, 'aaa'.time().'.jpg', 90);// TODO 生产环境屏蔽 保存图片  上线后屏蔽
		unlink($qrcode); // 删除二维码图片

		imagedestroy($dst_im);
		//		return $qrcode_img;
		//		exit;
	}


	// 海报管理
	/*public function poster()
	 {
	 //		$file_mod = M('file');
	 $file_mod = M('file');
	 //		$file_mod = M('commission');
	 import("ORG.Util.Page");

	 //搜索
	 $where = '1=1';

	 // 判断角色  分行和商城直接看角色  支行和客户经理看分行  暂时屏蔽
	 //        if (($_SESSION['admin_info']['role_id'] == 3) || ($_SESSION['admin_info']['role_id'] == 4)) {
	 //            $where .= " AND (platform_id ={$_SESSION['admin_info']['role_id']} ) ";
	 //        } else {
	 //            if (($_SESSION['admin_info']['role_id'] == 5)) { // 支行
	 //                $role_id = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('role_id');
	 //                $where .= " AND (platform_id ={$role_id}) ";
	 //            } elseif (($_SESSION['admin_info']['role_id'] == 6)) { // 客户经理
	 //                $pid = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('pid');
	 //                $role_id = M('admin')->where('id=' . $pid)->getField('role_id');
	 //                $where .= " AND (platform_id ={$role_id}) ";
	 //            }
	 //        }


	 if (isset($_REQUEST['keyword']) && trim($_REQUEST['keyword'])) {
	 //            $where .= " AND (title like '%{$_REQUEST['keyword']}%' OR contract like '%{$_REQUEST['keyword']}%') ";
	 $where .= " AND (origin_name like '%{$_REQUEST['keyword']}%' ) ";
	 $this->assign('keyword', $_REQUEST['keyword']);
	 }
	 if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
	 $where .= " AND con_id=" . $_REQUEST['id'];
	 $this->assign('con_id', $_REQUEST['id']);
	 }


	 $count = $file_mod->where($where)->count();
	 $p = new Page($count, 10);
	 $file_list = $file_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

	 $key = 1;
	 //        foreach ($file_list as $k => $val) {
	 //            $file_list[$k]['key'] = ++$p->firstRow;
	 //            $file_list[$k]['item'] = M('items')->where('id=' . $val['origin_id'])->find() ?: array();
	 //        }

	 $page = $p->show();
	 $this->assign('page', $page);
	 $this->assign('site_root', $this->site_root);
	 $this->assign('file_list', $file_list);
	 $this->display();
	 }*/

    // 海报管理
    public function poster()
    {
        $items_mod = M('items');
        import("ORG.Util.Page");

        //搜索
        $where = '1=1 AND data_state=1';

        if (isset($_REQUEST['keyword']) && trim($_REQUEST['keyword'])) {
            //            $where .= " AND (title like '%{$_REQUEST['keyword']}%' OR contract like '%{$_REQUEST['keyword']}%') ";
            $where .= " AND (title like '%{$_REQUEST['keyword']}%' ) ";
            $this->assign('keyword', $_REQUEST['keyword']);
        }

        if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
            $where .= " AND con_id=" . $_REQUEST['id'];
            $this->assign('con_id', $_REQUEST['id']);
        }

        // 分类
        if (isset($_REQUEST['cate_id']) && !empty($_REQUEST['cate_id'])) {
            $where .= " AND cate_name= '{$_REQUEST['cate_id']}' ";
            $this->assign('cate_id', $_REQUEST['cate_id']);
        }


        // 导出excel
        if ($_REQUEST['dosubmit'] ==2){
            $items_list = $items_mod->where($where)->order('id DESC')->select();
            foreach ($items_list as $k => $v) {
                $items_list[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
                $items_list[$k]['shop_name'] = M('admin')->where(' id= '.$v['shop_id'])->getField('user_id')?:'商铺名称';
            }

            $expCellName = array(
                //		array('id', '序号'),
                //            array('platform_id', '分销平台'),
                //            array('con_type', '合同类型'),
                array('item_id', '商品编号'),
                array('rate', '佣金比例'),
                array('commission', '佣金金额'),
                array('cate_name', '商品分类'),
                array('price', '商品价格'),
                array('title', '商品名称'),
                array('img', '图片地址'),
                array('url', '链接'),
                //		array('cate_id', '商品分类'),
                array('add_time', '添加时间'),
                array('shop_id', 'shop_id'),
                array('shop_name', '商铺名称'),
            );


            exportExcel('商品详情', $expCellName, $items_list, $fileName = '商品详情');

        }
        // 分类表
        $cates = M('items_cate')->where(" status=1 AND data_state=1 ")->select();
        $this->assign('cates', $cates);

        $count = $items_mod->where($where)->count();
        $p = new Page($count, 10);
        $items_list = $items_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

        $key = 1;
        foreach ($items_list as $k => $val) {
            $items_list[$k]['key'] = ++$p->firstRow;
            $items_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND status=1 AND data_state=1 ")->select() ?: array();
            //            var_dump($items_list[$k]['file']);
        }


        $page = $p->show();
        $this->assign('page', $page);
        //        var_dump(substr($this->site_root, -1));exit;
        $this->assign('site_root', substr($this->site_root, -1));
        $this->assign('items_list', $items_list);
        $this->display();
    }

	// 推广链接跳转
	public function prom()
	{

		//        var_dump($_REQUEST);
		M('commission')->where("item_id='{$_REQUEST['item_id']}' AND shop_id={$_REQUEST['shop_id']} ")->setInc('click');
		$_REQUEST['add_time'] = $_REQUEST['update_time'] = time();
		$_REQUEST['op_time'] = date('Y-m-d H:i:s');
		$_REQUEST['status'] = $_REQUEST['data_state'] = 1;
		$_REQUEST['add_time'] = time();
		$_REQUEST['add_time'] = time();
		M('push_log')->add($_REQUEST);

		var_dump("这是跳转页面,您是由{$_REQUEST['sid']}({$_REQUEST['sname']}-{$_REQUEST['user_id']})推广的,我要到商城购物去喽~~");
		//		$this->assign('sort', $sort);
		//		$this->display();
		//        redirect('http://baidu.com');
	}


	/*public function index()
	 {
	 //		$items_mod = M('items');
	 $commission_mod = M('items');
	 //		$commission_mod = M('commission');
	 import("ORG.Util.Page");

	 //搜索
	 $where = '1=1';

	 // 判断角色  分行和商城直接看角色  支行和客户经理看分行  暂时屏蔽
	 //        if (($_SESSION['admin_info']['role_id'] == 3) || ($_SESSION['admin_info']['role_id'] == 4)) {
	 //            $where .= " AND (platform_id ={$_SESSION['admin_info']['role_id']} ) ";
	 //        } else {
	 //            if (($_SESSION['admin_info']['role_id'] == 5)) { // 支行
	 //                $role_id = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('role_id');
	 //                $where .= " AND (platform_id ={$role_id}) ";
	 //            } elseif (($_SESSION['admin_info']['role_id'] == 6)) { // 客户经理
	 //                $pid = M('admin')->where('id=' . $_SESSION['admin_info']['pid'])->getField('pid');
	 //                $role_id = M('admin')->where('id=' . $pid)->getField('role_id');
	 //                $where .= " AND (platform_id ={$role_id}) ";
	 //            }
	 //        }
	 if (isset($_REQUEST['keyword']) && trim($_REQUEST['keyword'])) {
	 //            $where .= " AND (title like '%{$_REQUEST['keyword']}%' OR contract like '%{$_REQUEST['keyword']}%') ";
	 $where .= " AND (title like '%{$_REQUEST['keyword']}%' ) ";
	 $this->assign('keyword', $_REQUEST['keyword']);
	 }
	 if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
	 $where .= " AND con_id=" . $_REQUEST['id'];
	 $this->assign('con_id', $_REQUEST['id']);
	 }

	 $count = $commission_mod->where($where)->count();
	 $p = new Page($count, 10);
	 $commission_list = $commission_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order('id DESC')->select();

	 $key = 1;
	 foreach ($commission_list as $k => $val) {
	 $commission_list[$k]['key'] = ++$p->firstRow;
	 //            $commission_list[$k]['title'] = M('items')->where(" item_id='{$val['item_id']}' ")->getField('title')?:'未入库';
	 $commission_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
	 //            $commission_list[$k]['contract'] = M('contract')->where(" id={$val['con_id']} ")->find()?:'未入库';
	 }

	 $page = $p->show();
	 $this->assign('page', $page);
	 $this->assign('site_root', $this->site_root);
	 $this->assign('items_list', $commission_list);
	 $this->display();
	 }*/

	// 推广商品
	function index()
	{

		//		$items_mod = M('items');
		$commission_mod = M('commission');

        if ($_REQUEST['id']){
            $files = M('file')->where(" item_id='{$_REQUEST['item_id']}' AND shop_id='{$_REQUEST['shop_id']}' AND status=1 AND data_state=1 ")->select() ?: array();
//            var_dump($_REQUEST);
            if ($_REQUEST['json']){
                $bank_id = get_platform_id($_SESSION['admin_info']);
                $url = $this->site_root .u('desk/prom',array('sid'=>$_SESSION['admin_info']['id'],'item_id'=>$_REQUEST['item_id'],'commission_id'=>$_REQUEST['id'],'con_id'=>$_REQUEST['con_id'],'shop_id'=>$_REQUEST['shop_id'],'bank_id'=>$bank_id,'bank_subid'=>$_SESSION['admin_info']['pid']));

                $res['data'] = $files?:array(array('img'=>'data/qrcode/poster_bg.jpg','item_id'=>$_REQUEST['item_id'],'commission_id'=>$_REQUEST['id'],'shop_id'=>$_REQUEST['shop_id'],'bimg'=>'data/qrcode/poster_bg.jpg','bimg'=>'data/qrcode/poster_bg.jpg',));
                $res['url'] = $url;
                echo json_encode($res);exit;
            }

            $this->assign('files',$files);
            $this->display('detail_mb');exit;
        }
		import("ORG.Util.Page");

		//搜索
		$where = '1=1 AND con_id>0 ';
        if ($_SESSION['admin_info']['role_id'] == 6) { // 客户经理 6
            $where = '1=1 AND con_id<1 ';
        }


        if ($_REQUEST['commission_id']){
//            $where .= " AND commission_id=" . $_REQUEST['commission_id'];
            $where .= " AND id in ({$_REQUEST['commission_id']}) " ;
        }

        if ($_SESSION['admin_info']['role_id'] !=1 ) {
            if ($_SESSION['admin_info']['role_id'] ==3 ) {
//				$platform_id = get_platform_id($_SESSION['admin_info']['id']);
                $where .= " AND shop_id=" . $_SESSION['admin_info']['id'];
            }else{
                $platform_id = get_platform_id($_SESSION['admin_info']);
                $where .= " AND platform_id=" . $platform_id;
            }
        }
		if (isset($_REQUEST['keyword']) && trim($_REQUEST['keyword'])) {

			$where .= " AND (title like '%{$_REQUEST['keyword']}%' OR contract like '%{$_REQUEST['keyword']}%') ";
			$this->assign('keyword', $_REQUEST['keyword']);
		}

		if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
			$where .= " AND con_id=" . $_REQUEST['id'];
			$this->assign('id', $_REQUEST['id']);
		}


		// 分类
		if (isset($_REQUEST['cate_id']) && !empty($_REQUEST['cate_id'])) {
			$where .= " AND cate_name= '{$_REQUEST['cate_id']}' ";
			$this->assign('cate_id', $_REQUEST['cate_id']);
		}


		$order = 'id DESC';
        // 分类
        if (isset($_REQUEST['order']) && !empty($_REQUEST['order'])) {
            if ($_REQUEST['order'] == 1){
                $order = 'price DESC';
            }elseif ($_REQUEST['order'] == 2){
                $order = 'commission DESC';
            }elseif ($_REQUEST['order'] == 3){
                $order = 'rate DESC';
            }

            $this->assign('order', $_REQUEST['order'] );
        }


		// 分类表
		$cates = M('items_cate')->where(" status=1 AND data_state=1 ")->select();
		$this->assign('cates', $cates);

		$count = $commission_mod->where($where)->count();
        $this->assign('count', $count);
		$p = new Page($count, 5);
		$commission_list = $commission_mod->where($where)->limit($p->firstRow . ',' . $p->listRows)->order($order)->select();

//        var_dump($commission_mod->getLastSql());
		$bank_id = get_platform_id($_SESSION['admin_info']);
		//		var_dump($bank_id);exit;
		$key = 1;
		foreach ($commission_list as $k => $val) {
			$commission_list[$k]['key'] = ++$p->firstRow;
			//            $commission_list[$k]['title'] = M('items')->where(" item_id='{$val['item_id']}' ")->getField('title')?:'未入库';
			$commission_list[$k]['bank_id'] = $bank_id;
			//			$commission_list[$k]['bank_subid'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_name') ?: '全部';
			$commission_list[$k]['platform_name'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
//            $commission_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND status=1 AND data_state=1 ")->select() ?: array();
            $commission_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND shop_id='{$val['shop_id']}' AND status=1 AND data_state=1 ")->select() ?: array();

			// 分润  根据分行设置 暂时屏蔽
            $profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}' AND  shop_id={$val['shop_id']} AND  role_id={$bank_id} ")->find() ?: array();
//			$profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}'  AND  shop_id={$val['shop_id']}   ")->order('id desc')->find() ?: array();
//            var_dump(M('commission')->getLastSql());exit;
			$commission_list[$k]['commission2'] = $profit['commission']?:$val['commission'];
			$commission_list[$k]['rate2'] = $profit['rate']?:$val['rate'];
			 
		}


		//		var_dump($commission_list);exit;

		$page = $p->show();
		$this->assign('page', $page);

		$this->assign('commission_list', $commission_list);
        // 角色，用户
//        $this->display();exit;
        if ($_SESSION['admin_info']['role_id'] == 6) { // 客户经理 6
            $this->display('index_mb');
        }else{
            $this->display();
        }
	}


	// 编辑海报
	public function edit()
	{
		//		$items_mod = D('items');
		$items_mod = M('file');
		if (isset($_REQUEST['dosubmit'])) {
			$data = $items_mod->create();
			unset($data['id']);

			if ($_FILES['img']['name'] != '') {
				$upload_list = $this->_upload($_FILES['img']);
				//				$data['img'] = $data['simg'] = $data['bimg'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
				$data['bimg'] = 'data/items/' . $upload_list['0']['savename'];
				$data['img'] =  'data/items/m_' . $upload_list['0']['savename'];
				$data['simg'] = 'data/items/s_' . $upload_list['0']['savename'];
				$data['name'] = $upload_list['0']['name'];
				$data['extension'] = $upload_list['0']['extension'];
				$data['size'] = $upload_list['0']['size'];
				//                var_dump($upload_list);exit;
			} else {
				$this->error(L('请上传图片'));
			}
			//			$result = $items_mod->save($data);
			//			$data['update_time'] = time();
			$data['add_time'] = $data['update_time'] = date('Y-m-d H:i:s');
			$data['status'] = $data['data_state'] = 1;
			$data['uid'] = $_SESSION['admin_info']['id'];

			$result = $items_mod->add($data);
			if (false !== $result) {
//				var_dump($data['img']);exit;
				$this->create_poster($poster_bg = $data['img'], $qrcode = '/qrcode/qrcode.jpg', $head_source = '/qrcode/header.jpg', $origin_id = $result, $item_id = $_REQUEST['item_id'], $shop_id = $_REQUEST['shop_id']);
				//				exit;
				//                $this->success(L('operation_success'), U('items/index'));
				//				$this->success(L('operation_success'), U('items/poster'));
				$this->success(L('operation_success'));
				exit;
			} else {
				$this->error(L('operation_failure'));
			}
		} else {
			//		$items_id = isset($_REQUEST['id']) && intval($_REQUEST['id']) ? intval($_REQUEST['id']) : $this->error(L('please_select'));
			//			$files = M()->where($where)->select($options);
			if (empty($_REQUEST['origin_id'])) {
				$this->error('非法请求，参数错误');
			}
			$files = M('file')->where(" 1=1 AND data_state=1  AND origin_id={$_REQUEST['origin_id']} ")->order('id DESC')->select();
			$this->assign('files', $files);
		}


		$this->display();
	}

	/*public function edit()
	 {
	 $items_mod = D('items');
	 $items_cate_mod = D('items_cate');
	 $items_site_mod = D('items_site');
	 $items_tags_mod = D('items_tags');

	 if (isset($_REQUEST['dosubmit'])) {
	 $data = $items_mod->create();
	 if ($data['cid'] == 0) {
	 $this->error('请选择分类');
	 }
	 if ($_FILES['img']['name'] != '') {
	 $upload_list = $this->_upload($_FILES['img']);
	 $data['img'] = $data['simg'] = $data['bimg'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
	 }
	 $result = $items_mod->save($data);
	 if (false !== $result) {
	 $this->success(L('operation_success'), U('items/index'));
	 } else {
	 $this->error(L('operation_failure'));
	 }
	 }
	 $items_id = isset($_REQUEST['id']) && intval($_REQUEST['id']) ? intval($_REQUEST['id']) : $this->error(L('please_select'));

	 $items_info = $items_mod->relation('items_tags')->where('id=' . $items_id)->find();
	 foreach ($items_info['items_tags'] as $tag) {
	 $tag_arr[] = $tag['name'];
	 }
	 $items_info['tags'] = implode(' ', $tag_arr);
	 $site_list = $items_site_mod->field('id,name,alias')->select();

	 $cate_list = $items_cate_mod->get_list();
	 $this->assign('cate_list', $cate_list['sort_list']);
	 $this->assign('site_list', $site_list);
	 $this->assign('items', $items_info);
	 $this->display();
	 }*/

	public function collect_item()
	{
		$itemcollect_mod = D('itemcollect');
		$items_cate_mod = D('items_cate');
		$items_tags_mod = D('items_tags');
		$items_mod = D('items');
		$url = isset($_REQUEST['url']) ? $_REQUEST['url'] : '';
		if (empty($url)) {
			$this->ajaxReturn(array('err' => 'remote_not_exist'));
		}
		//淘宝
		if (strpos($url, 'tmall.com') !== false || strpos($url, 'taobao.com') !== false) {  //说明此商品是淘宝的商品
			$num_iid = get_id($url);
			$key = 'taobao_' . $num_iid;  //item_key
			$tb_top = $this->taobao_client();
			$req = $tb_top->load_api('TaobaokeItemsDetailGetRequest');
			$req->setFields("num_iid,detail_url,title,nick,pic_url,price,click_url ");
			$req->setPid($this->setting['taobao_pid']);
			$req->setNick($this->setting['taobao_usernick']);
			$req->setNumIids($num_iid);
			$resp = get_object_vars_final($tb_top->execute($req));
			if (!is_array($resp)) {
				$this->ajaxReturn(array('err' => 'remote_not_exist'));
			} else {
				$data = $resp['taobaoke_item_details']['taobaoke_item_detail'];
			}
			if (!is_array($data)) {
				$this->ajaxReturn(array('err' => 'remote_not_exist'));
			}

			$commission = $this->get_commission($data['item']['title'], $data['item']['num_iid'], $p = 'commission');
			$data['title'] = $data['item']['title'];
			$data['price'] = $data['item']['price'];

			$data['img'] = $data['item']['pic_url'] . '_210x1000.jpg';
			$data['simg'] = $data['item']['pic_url'] . '_64x64.jpg';
			$data['bimg'] = $data['item']['pic_url'];
			$data['seller_name'] = $data['item']['nick'];
			//返现金额
			if (empty($commission)) {
				$commission = 0;
			}
			$data['cash_back_rate'] = $commission . '元';
			$data['url'] = $data['click_url'];
			$data['author'] = 'taobao';
			$data['item_key'] = 'taobao_' . $num_iid;
			$tags = $items_tags_mod->get_tags_by_title($data['item']['title']);
			$data['cid'] = $items_cate_mod->get_cid_by_tags($tags);
			$data['tags'] = implode(' ', $tags);
		} else {//59秒
			$url = url_parse(urldecode($url));
			$miao_api = $this->miao_client();   //获取59秒api设置信息
			$data = $miao_api->ListItemsDetail('', $url);
			$data = $data['items']['item'];
			if (!is_array($data)) {
				$this->ajaxReturn(array('err' => 'remote_not_exist'));
			}
			$data['price'] = $data['price'];
			if (strpos($data['pic_url'], 'taobao') !== false) {
				$data['img'] = $data['pic_url'] . '_210x1000.jpg';
				$data['simg'] = $data['pic_url'] . '_64x64.jpg';
				//$data['bimg'] = $data['pic_url'].'_460x460.jpg';
				$data['bimg'] = $data['pic_url'];
			} else {
				$data['img'] = str_replace('.jpg', '_210x1000.jpg', $data['pic_url']);
				$data['simg'] = str_replace('.jpg', '_60x60.jpg', $data['pic_url']);
				//$data['bimg'] = str_replace('.jpg', '_460x460.jpg', $data['pic_url']);
				$data['bimg'] = $data['pic_url'];
			}
			$data['cash_back_rate'] = $data['cashback_scope'];

			$data['url'] = $data['click_url'];
			$data['author'] = 'miao';
			$data['item_key'] = 'miao_' . $data['iid'];
			$tags = $items_tags_mod->get_tags_by_title($data['title']);
			$data['cid'] = $items_cate_mod->get_cid_by_tags($tags);
			$data['tags'] = implode(' ', $tags);
		}
		$this->ajaxReturn($data);
	}

	public function add()
	{
		$items_mod = D('items');
		$items_cate_mod = D('items_cate');
		$items_site_mod = D('items_site');
		$items_tags_mod = D('items_tags');
		$items_tags_item_mod = D('items_tags_item');
		if (isset($_REQUEST['dosubmit'])) {
			if ($_REQUEST['title'] == '') {
				$this->error('请填写商品标题');
			}
			if (false === $data = $items_mod->create()) {
				$this->error($items_mod->error());
			}
			$data['add_time'] = time();
			$data['browse_num'] = 0;
			if ($_FILES['img']['name'] != '') {
				$upload_list = $this->_upload($_FILES['img']);
				$data['img'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
				$data['simg'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
				$data['bimg'] = $this->site_root . 'data/items/m_' . $upload_list['0']['savename'];
			} else {
				$data['img'] = $_REQUEST['input_img'];
			}
			//来源
			$author = isset($_REQUEST['author']) ? $_REQUEST['author'] : '';
			$data['sid'] = $items_site_mod->where("alias='" . $author . "'")->getField('id');
			if (!$data['sid']) {
				$data['sid'] = 2;
			}
			$item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
			if ($item_id) {
				$re = $items_mod->where('id=' . $item_id)->save($data);
				$this->success(L('operation_success'));
			} else {
				$new_item_id = $items_mod->add($data);
			}
			if ($new_item_id) {
				//处理标签
				$tags = isset($_REQUEST['tags']) && trim($_REQUEST['tags']) ? trim($_REQUEST['tags']) : '';
				if ($tags) {
					$tags_arr = explode(' ', $tags);
					$tags_arr = array_unique($tags_arr);
					foreach ($tags_arr as $tag) {
						$isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
						if ($isset_id) {
							$items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
							$items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $isset_id
							));
						} else {
							$tag_id = $items_tags_mod->add(array('name' => $tag));
							$items_tags_item_mod->add(array(
                                'item_id' => $new_item_id,
                                'tag_id' => $tag_id
							));
						}
					}
				}
				$items_cate_mod->setInc('item_nums', 1);
				$this->success(L('operation_success'));
			} else {
				$this->error(L('operation_failure'));
			}
		}

		$site_list = $items_site_mod->field('id,name,alias')->select();

		$cate_list = $items_cate_mod->get_top2_list();
		$this->assign('cate_list', $cate_list);

		$this->assign('site_list', $site_list);
		$this->display();
	}

	function delete()
	{
		$items_mod = D('items');
		$items_tags_item_mod = D('items_tags_item');
		$items_cate_mod = D('items_cate');
		$items_likes_mod = D('like_list');
		$items_comments_mod = D('user_comments');
		$album_items_mod = D('album_items');
		$items_user_mod = D('items_user');

		if ((!isset($_REQUEST['id']) || empty($_REQUEST['id'])) && (!isset($_REQUEST['id']) || empty($_REQUEST['id']))) {
			$this->error('请选择要删除的商品！');
		}
		if (isset($_REQUEST['id'])) {
			$cate_ids = is_array($_REQUEST['id']) ? implode(',', $_REQUEST['id']) : intval($_REQUEST['id']);
			$items_mod->delete($cate_ids);
			$path = ROOT_PATH . "/data/items";
			delDirFile($path, $_REQUEST['id']);
			$items_likes_mod->where("items_id in(" . $cate_ids . ")")->delete();          //用户喜欢表
			$items_tags_item_mod->where("item_id in(" . $cate_ids . ")")->delete();           //商品标签表
			$items_comments_mod->where("pid in(" . $cate_ids . ")")->delete();           //商品品论
			$album_items_mod->where("items_id in(" . $cate_ids . ")")->delete();         //专辑商品表
			$items_user_mod->where("item_id in(" . $cate_ids . ")")->delete();         //删除用户分享表里面的信息
			$items_cate_mod->upCateNum($_REQUEST['id']);   //更新items_cate表里面的数据
		}
		$this->success(L('operation_success'));
	}

	public function _upload($imgage, $path = '', $isThumb = true)
	{
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		//设置上传文件大小
		$upload->maxSize = 3292200;
		$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');

		if (empty($savePath)) {
			$upload->savePath = './data/items/';
		} else {
			$upload->savePath = $path;
		}

		if ($isThumb === true) {
			$upload->thumb = true;
			$upload->imageClassPath = 'ORG.Util.Image';
			$upload->thumbPrefix = 'm_,s_';
			//设置缩略图最大宽度
			$upload->thumbMaxWidth = '533,40';
			//设置缩略图最大高度
			$upload->thumbMaxHeight = '800,60';

			/*//设置缩略图最大宽度
			 $upload->thumbMaxWidth = '533';
			 //设置缩略图最大高度
			 $upload->thumbMaxHeight = '800';*/
			$upload->saveRule = uniqid;
			// $upload->thumbRemoveOrigin = true;
		}

		if (!$upload->uploadOne($imgage)) {
			//捕获上传异常
			$this->error($upload->getErrorMsg());
		} else {
			//取得成功上传的文件信息
			$uploadList = $upload->getUploadFileInfo();
		}
		return $uploadList;
	}

	function status()
	{
		$id = intval($_REQUEST['id']);
		$type = trim($_REQUEST['type']);
		$items_mod = M('file');
		$res = $items_mod->where('id=' . $id)->setField($type, array('exp', "(" . $type . "+1)%2"));
		$values = $items_mod->where('id=' . $id)->getField($type);
		//        $res = $items_mod->where('origin_id=' . $id)->setField($type, array('exp', "(" . $type . "+1)%2"));
		//        $values = $items_mod->where('origin_id=' . $id)->getField($type);
		$this->ajaxReturn($values[$type]);
	}

	function batch_add()
	{
		$items_cate_mod = D('items_cate');
		$cate_list = $items_cate_mod->get_top2_list();
		$this->assign('cate_list', $cate_list);

		if (isset($_REQUEST['dosubmit'])) {
			$data = array();
			$success_update_list = '';
			$success_insert_list = '';
			$fail_list = '';
			$cid = $_REQUEST['cid'];
			$items_mod = M('items');
			$items_site_mod = D('items_site');
			$itemcollect_mod = D('itemcollect');
			$items_tags_mod = D('items_tags');
			$items_tags_item_mod = D('items_tags_item');

			$urls = preg_split('/[\r\n]/', $_REQUEST['urls']);
			$items_nums = 0;
			foreach ($urls as $url) {
				$url = url_parse(urldecode(trim($url)));
				//淘宝
				if (strpos($url, 'tmall.com') !== false || strpos($url, 'taobao.com') !== false) {  //说明此商品是淘宝的商品
					$num_iid = get_id($url);
					$key = 'taobao_' . $num_iid;  //item_key
					$tb_top = $this->taobao_client();
					$req = $tb_top->load_api('TaobaokeItemsDetailGetRequest');
					$req->setFields("num_iid,detail_url,title,nick,pic_url,price,click_url ");
					$req->setPid($this->setting['taobao_pid']);
					$req->setNick($this->setting['taobao_usernick']);
					$req->setNumIids($num_iid);
					$resp = get_object_vars_final($tb_top->execute($req));
					if (is_array($resp)) {
						$data = $resp['taobaoke_item_details']['taobaoke_item_detail'];
						if (is_array($data)) {
							$commission = $this->get_commission($data['item']['title'], $data['item']['num_iid'], $p = 'commission');
							$data['title'] = $data['item']['title'];
							$data['price'] = $data['item']['price'];
							$data['img'] = $data['item']['pic_url'] . '_210x1000.jpg';
							$data['simg'] = $data['item']['pic_url'] . '_64x64.jpg';
							$data['bimg'] = $data['item']['pic_url'];
							$data['seller_name'] = $data['item']['nick'];
							$data['add_time'] = time();
							//返现金额
							if (empty($commission)) {
								$commission = 0;
							}
							$data['cash_back_rate'] = $commission . '元';
							$data['url'] = $data['click_url'];
							$data['author'] = 'taobao';
							$data['item_key'] = 'taobao_' . $num_iid;
							$data['cid'] = $cid;
							$data['sid'] = $items_site_mod->where("alias='" . $data['author'] . "'")->getField('id');
							$item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
							if ($item_id) {
								//update
								$item_id = $items_mod->where("id=$item_id")->save($data);
								$success_update_list .= $url . "<br/>";
							} else {
								//insert
								$item_id = $items_mod->add($data);
								$success_insert_list .= $url . "<br/>";
							}

							$tags = $items_tags_mod->get_tags_by_title($data['title']);
							if ($tags) {
								$tags_arr = array_unique($tags);
								foreach ($tags_arr as $tag) {
									$isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
									if ($isset_id) {
										$items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
										$items_tags_item_mod->add(array(
                                            'item_id' => $item_id,
                                            'tag_id' => $isset_id
										));
									} else {
										$tag_id = $items_tags_mod->add(array('name' => $tag));
										$items_tags_item_mod->add(array(
                                            'item_id' => $item_id,
                                            'tag_id' => $tag_id
										));
									}
								}
							}
							$items_nums++;

						} else {  //如果没有数据
							$fail_list .= $url . "<br/>";
						}

					} else {//如果没有数据
						$fail_list .= $url . "<br/>";
					}

				} else {//59秒
					/*获取数据*/
					$miao_api = $this->miao_client();   //获取59秒api设置信息
					$data = $miao_api->ListItemsDetail('', $url);
					$data = $data['items']['item'];
					$data['img'] = str_replace('.jpg', '_210x1000.jpg', $data['pic_url']);
					$data['simg'] = str_replace('.jpg', '_60x60.jpg', $data['pic_url']);
					$data['bimg'] = $data['pic_url'];
					/*结束*/
					if (is_array($data)) {
						$data['price'] = $data['price'];
						$data['img'] = $data['img'];
						$data['simg'] = $data['simg'];
						$data['bimg'] = $data['bimg'];
						$data['url'] = $data['click_url'];
						$data['author'] = 'miao';
						$data['item_key'] = 'miao_' . $data['iid'];
						$data['cid'] = $cid;
						$data['seller_name'] = $data['seller_name'];
						$data['cash_back_rate'] = $data['cashback_scope'];
						$data['add_time'] = time();
						$data['sid'] = $items_site_mod->where("alias='" . $data['author'] . "'")->getField('id');
						$item_id = $items_mod->where("item_key='" . $data['item_key'] . "'")->getField('id');
						if ($item_id) {
							//update
							$item_id = $items_mod->where("id=$item_id")->save($data);
							$success_update_list .= $url . "<br/>";
						} else {
							//insert
							$item_id = $items_mod->add($data);
							$success_insert_list .= $url . "<br/>";
						}
						$tags = $items_tags_mod->get_tags_by_title($data['title']);
						if ($tags) {
							$tags_arr = array_unique($tags);
							foreach ($tags_arr as $tag) {
								$isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
								if ($isset_id) {
									$items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
									$items_tags_item_mod->add(array(
                                        'item_id' => $item_id,
                                        'tag_id' => $isset_id
									));
								} else {
									$tag_id = $items_tags_mod->add(array('name' => $tag));
									$items_tags_item_mod->add(array(
                                        'item_id' => $item_id,
                                        'tag_id' => $tag_id
									));
								}
							}
						}
						$items_nums++;
					} else {
						$fail_list .= $url . "<br/>";
					}


				}    //获取59秒数据完成
			}//foreach 完成
			//更新分类表商品数
			if ($items_nums > 0) {
				$items_cate_mod->where('id=' . $cid)->setInc('item_nums', $items_nums);
			}
			$this->ajaxReturn(array(
                'success_update_list' => $success_update_list,
                'success_insert_list' => $success_insert_list,
                'fail_list' => $fail_list
			));
		} else {
			$this->display();
		}
	}

	function comments()
	{
		$mod = M('user_comments');
		import("ORG.Util.Page");
		$prex = C('DB_PREFIX');

		//搜索
		$where = 'type="item,index" ';
		$keyword = isset($_REQUEST['keyword']) && trim($_REQUEST['keyword']) ? trim($_REQUEST['keyword']) : '';
		$time_start = isset($_REQUEST['time_start']) && trim($_REQUEST['time_start']) ? trim($_REQUEST['time_start']) : '';
		$time_end = isset($_REQUEST['time_end']) && trim($_REQUEST['time_end']) ? trim($_REQUEST['time_end']) : '';
		$status = isset($_REQUEST['status']) ? intval($_REQUEST['status']) : '-1';
		$uname = isset($_REQUEST['uname']) && trim($_REQUEST['uname']) ? trim($_REQUEST['uname']) : '';

		if ($keyword) {
			$where .= " AND " . $prex . "user_comments.info LIKE '%" . $keyword . "%'";
			$this->assign('keyword', $keyword);
		}
		if ($time_start) {
			$time_start_int = strtotime($time_start);
			$where .= " AND " . $prex . "user_comments.add_time>='" . $time_start_int . "'";
			$this->assign('time_start', $time_start);
		}
		if ($time_end) {
			$time_end_int = strtotime($time_end);
			$where .= " AND " . $prex . "user_comments.add_time<='" . $time_end_int . "'";
			$this->assign('time_end', $time_end);
		}
		if ($uname) {
			$where .= " AND " . $prex . "user_comments.uname LIKE '%" . $uname . "%'";
			$this->assign('uname', $uname);
		}
		$status >= 0 && $where .= " AND " . $prex . "user_comments.status='" . $status . "'";
		$this->assign('status', $status);

		$count = $mod->where($where)->count();
		$p = new Page($count, 20);

		$list = $mod->where($where)
		->field($prex . 'user_comments.*,' . $prex . 'items.title as title,' . $prex . 'items.img as items_img')
		->join('LEFT JOIN ' . $prex . 'items ON ' . $prex . 'user_comments.pid = ' . $prex . 'items.id ')
		->limit($p->firstRow . ',' . $p->listRows)
		->order($prex . 'user_comments.add_time DESC')
		->select();

		$key = 1;
		foreach ($list as $k => $val) {
			$list[$k]['key'] = ++$p->firstRow;
		}

		$page = $p->show();
		$this->assign('page', $page);
		$this->assign('list', $list);
		$this->display();
	}

	function comments_delete()
	{
		$mod = D('user_comments');
		if ((!isset($_REQUEST['id']) || empty($_REQUEST['id'])) && (!isset($_REQUEST['id']) || empty($_REQUEST['id']))) {
			$this->error('请选择要删除的记录！');
		}
		if (isset($_REQUEST['id']) && is_array($_REQUEST['id'])) {
			$ids = implode(',', $_REQUEST['id']);
			$mod->delete($ids);
		} else {
			$id = intval($_REQUEST['id']);
			$mod->where('id=' . $id)->delete();
		}
		$this->success(L('operation_success'));
	}

	function comments_status()
	{
		$id = intval($_REQUEST['id']);
		$mod = D('user_comments');
		$res = $mod->where('id=' . $id)->setField('status', array(
            'exp',
            "(status+1)%2"
            ));
            $values = $mod->where('id=' . $id)->getField('status');
            $this->ajaxReturn($values['status']);
	}

	/*
	 * 获取子分类至获取单级的分类
	 */
	public function get_child_cates()
	{
		$items_cate_mod = $this->items_cate_mod;
		$parent_id = $this->_get('parent_id', 'intval');
		$cate_list = $items_cate_mod->field('id,name')->where(array('pid' => $parent_id))->order('ordid asc')->select();
		$content = "";
		foreach ($cate_list as $val) {
			$content .= "<option value='" . $val['id'] . "'>" . $val['name'] . "</option>";
		}
		echo $content;
		exit;
	}

	function collect_by_words()
	{
		$items_cate_mod = D('items_cate');
		$cate_list = $items_cate_mod->get_list();
		$this->assign('cate_list', $cate_list['sort_list']);

		if (isset($_REQUEST['dosubmit'])) {
			$cate_id = isset($_REQUEST['cate_id']) && intval($_REQUEST['cate_id']) ? intval($_REQUEST['cate_id']) : $this->error('请选择分类');
			$keywords = isset($_REQUEST['keywords']) && trim($_REQUEST['keywords']) ? trim($_REQUEST['keywords']) : $this->error('请填写关键词');
			$pages = isset($_REQUEST['pages']) && intval($_REQUEST['pages']) ? intval($_REQUEST['pages']) : 1;

			$p = isset($_REQUEST['p']) && intval($_REQUEST['p']) ? intval($_REQUEST['p']) : 1;//当前页
			$this->assign('data', $_REQUEST);
			$this->assign('p', $p);

			$items_cate_mod = D('items_cate');
			$items_site_mod = D('items_site');
			$collect_taobao_mod = D('collect_taobao');
			$tb_top = $this->taobao_client();
			$req = $tb_top->load_api('TaobaokeItemsGetRequest');
			$req->setFields("num_iid,title,nick,pic_url,price,click_url,shop_click_url,seller_credit_score,item_location,volume");
			$req->setPid($this->setting['taobao_pid']);
			$req->setKeyword($keywords);
			$req->setPageNo($p);
			$req->setPageSize(40);
			$resp = $tb_top->execute($req);

			$res = $this->simplexml_obj2array($resp);
			if ($res['code']) {
				exit($res['msg']);
			}
			//var_dump($resp);exit;
			$goods_list = (array)$resp->taobaoke_items;

			$sid = $items_site_mod->where("alias='taobao'")->getField('id');

			foreach ($goods_list['taobaoke_item'] as $item) {
				$item = (array)$item;
				$item['item_key'] = 'taobao_' . $item['num_iid'];
				$item['sid'] = $sid;
				$this->tao_collect_insert($item, $cate_id);
			}

			//记录采集时间
			$islog = $collect_taobao_mod->where('cate_id=' . $cate_id)->count();
			if ($islog) {
				$collect_taobao_mod->save(array('cate_id' => $cate_id, 'collect_time' => time()));
			} else {
				$collect_taobao_mod->add(array('cate_id' => $cate_id, 'collect_time' => time()));
			}

		}
		$this->display();
	}

	private function tao_collect_insert($item, $cate_id)
	{
		$items_mod = D('items');
		$items_cate_mod = D('items_cate');
		$items_tags_mod = D('items_tags');
		$items_tags_item_mod = D('items_tags_item');

		//需要判断商品是否已经存在
		$isset = $items_mod->where("item_key='" . $item['item_key'] . "'")->getField('id');
		if ($isset) {
			return;
		}
		$add_time = time();

		if (strpos($item['pic_url'], 'taobao') !== false) {
			$item['img'] = $item['pic_url'] . '_210x1000.jpg';
			$item['simg'] = $item['pic_url'] . '_64x64.jpg';
			//			$item['bimg'] = $item['pic_url'].'_460x460.jpg';
			$item['bimg'] = $item['pic_url'];
		} else {
			$item['img'] = str_replace('.jpg', '_210x1000.jpg', $item['pic_url']);
			$item['simg'] = str_replace('.jpg', '_60x60.jpg', $item['pic_url']);
			//$item['bimg'] = str_replace('.jpg', '_460x460.jpg', $item['pic_url']);
			$item['bimg'] = $item['pic_url'];
		}


		$item_id = $items_mod->add(array(
            'title' => strip_tags($item['title']),
            'cid' => $cate_id,
            'sid' => $item['sid'],
            'item_key' => $item['item_key'],
            'img' => $item['img'],
            'simg' => $item['simg'],
            'bimg' => $item['pic_url'],
            'price' => $item['price'],
            'url' => $item['click_url'],
            'likes' => 0,
            'haves' => 0,
            'add_time' => $add_time,
		));
		if ($item_id) {
			$items_cate_mod->where('id=' . $cate_id)->setInc('item_nums');
		}
		//处理标签
		$tags = $items_tags_mod->get_tags_by_title(strip_tags($item['title']));
		if ($tags) {
			$tags = array_unique($tags);
			foreach ($tags as $tag) {
				$isset_id = $items_tags_mod->where("name='" . $tag . "'")->getField('id');
				if ($isset_id) {
					$items_tags_mod->where('id=' . $isset_id)->setInc('item_nums');
					$items_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $isset_id
					));
				} else {
					$tag_id = $items_tags_mod->add(array('name' => $tag));
					$items_tags_item_mod->add(array(
                        'item_id' => $item_id,
                        'tag_id' => $tag_id
					));
				}
			}
		}
	}

	/*
	 * 按搜索条件删除
	 */

	function delete_search()
	{
		$items_mod = D('items');
		$items_cate_mod = D('items_cate');
		$items_likes_mod = D('like_list');
		$items_tags_item_mod = D('items_tags_item');
		$items_comments_mod = D('user_comments');
		$album_items_mod = D('album_items');
		$items_user_mod = D('items_user');
		if (isset($_REQUEST['dosubmit'])) {
			if ($_REQUEST['isok'] == "1") {
				//搜索
				$where = '1=1';
				$keyword = trim($_REQUEST['keyword']);
				$cate_id = trim($_REQUEST['cate_id']);
				$time_start = trim($_REQUEST['time_start']);
				$time_end = trim($_REQUEST['time_end']);
				$status = trim($_REQUEST['status']);
				$min_price = trim($_REQUEST['min_price']);
				$max_price = trim($_REQUEST['max_price']);

				if ($keyword != '') {
					$where .= " AND title LIKE '%" . $keyword . "%'";
				}
				if ($cate_id != '') {
					$where .= " AND cid=" . $cate_id;
				}
				if ($time_start != '') {
					$time_start_int = strtotime($time_start);
					$where .= " AND add_time>='" . $time_start_int . "'";
				}
				if ($time_end != '') {
					$time_end_int = strtotime($time_end);
					$where .= " AND add_time<='" . $time_end_int . "'";
				}
				if ($status != '') {
					$where .= " AND status=" . $status;
				}
				if ($min_price != '') {
					$where .= " AND price>=" . $min_price;
				}
				if ($max_price != '') {
					$where .= " AND price<=" . $max_price;
				}

				$ids_list = $items_mod->where($where)->select();
				$ids = "";
				foreach ($ids_list as $val) {
					$ids .= $val['id'] . ",";
				}
				$ids = substr($ids, 0, -1);
				if ($ids != "") {
					$items_likes_mod->where("items_id in(" . $ids . ")")->delete();          //用户喜欢表
					$items_tags_item_mod->where("item_id in(" . $ids . ")")->delete();           //商品标签表
					$items_comments_mod->where("pid in(" . $ids . ")")->delete();           //商品品论
					$album_items_mod->where("items_id in(" . $ids . ")")->delete();         //专辑商品表
					$items_user_mod->where("item_id in(" . $ids . ")")->delete();         //删除用户分享表里面的信息

				}
				$items_mod->where($where)->delete();

				//更新商品分类的数量
				$items_nums = $items_mod->field('cid,count(id) as cate_nums')->group('cid')->select();
				foreach ($items_nums as $val) {
					$items_cate_mod->save(array('id' => $val['cid'], 'items_nums' => $val['cate_nums']));
				}

				$this->success('删除成功', U('items/delete_search'));
			} else {
				$this->success('确认是否要删除？', U('items/delete_search'));
			}
		} else {
			$cate_list = $items_cate_mod->get_list();
			$this->assign('cate_list', $cate_list['sort_list']);
			$this->display();
		}
	}

}

?>