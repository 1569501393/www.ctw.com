<?php

class analyseAction extends baseAction
{
    function index()
    {
//        $order_list = M('commission')->where("item_id={$_REQUEST['item_id']} AND shop_id={$_REQUEST['shop_id']} ")->order('click DESC')->limit(10)->select();
        $where = '1=1';

        // 机构销售业绩排行
        $order_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
        $this->assign('order_list', $order_list);

        // 机构销售佣金收益排行
        $commission_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
        $this->assign('commission_list', $commission_list);

        // 热销商品排行
        $items_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
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

    public function _upload()
    {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 3292200;
        //$upload->allowExts = explode(',', 'jpg,gif,png,jpeg');
        $upload->savePath = ROOT_PATH . '/data/flink/';

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