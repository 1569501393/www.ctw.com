<?php

class analyseAction extends baseAction
{
    function index()
    {

        //        $order_list = M('commission')->where("item_id={$_REQUEST['item_id']} AND shop_id={$_REQUEST['shop_id']} ")->order('click DESC')->limit(10)->select();

        //搜索
        $where = '1=1 AND data_state=1 AND status=1 ';
        // 所有客户经理和及机构看到自己所在分行信息
        /*if (($_SESSION['admin_info']['role_id'] == 5) || ($_SESSION['admin_info']['role_id'] == 6)) {
            $id = get_platform_id($_SESSION['admin_info']);
            $where .= ' AND platform_id= '.$id ;
            }elseif ($_SESSION['admin_info']['role_id'] == 4){
            $where .= ' AND platform_id= '.$_SESSION['admin_info']['id'] ;
            }*/
        $platform_id = get_platform_id($_SESSION['admin_info']);
        if ($platform_id) {
            $where .= ' AND platform_id= ' . $platform_id;
        }


        // 机构销售业绩排行
        //        $order_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
        //		$order_list = M('orderlist')->field(array('platform_id',"count(item_id)"=>"cnt", "title", "item_id","sum(sum_price)"=>"sum_price","sum(item_count)"=>"sum_count","SUM(sum_price)"=>"sum_price"))->where(" $where ")->group('platform_id')->order('sum_price DESC')->limit(10)->select();

        $order_list = M('orderlist')->field(array('bank_subid', 'platform_id', "count(item_id)" => "cnt", "title", "item_id", "sum(sum_price)" => "sum_price", "sum(item_count)" => "sum_count", "SUM(sum_price)" => "sum_price"))->where(" $where ")->group('bank_subid')->order('sum_price DESC')->limit(10)->select();

        foreach ($order_list as $k => $val) {
            //            $order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
//            var_dump($val['bank_subid']);
            $order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['bank_subid'])->getField('user_id') ?: '全部';
        }

        $this->assign('order_list', $order_list);

        // 机构销售佣金收益排行
        //        $commission_list = M('commission')->where(" $where ")->order('click DESC')->limit(10)->select();
        //		$commission_list = M('orderlist')->field(array('platform_id',"count(item_id)"=>"cnt", "title", "item_id","sum(sum_price)"=>"sum_price","sum(item_count)"=>"sum_count","SUM(sum_price)"=>"sum_price","SUM(commission)"=>"sum_commission"))->where(" $where ")->group('platform_id')->order('sum_commission DESC')->limit(10)->select();
        $commission_list = M('orderlist')->field(array('bank_subid', 'platform_id', "count(item_id)" => "cnt", "title", "item_id", "sum(sum_price)" => "sum_price", "sum(item_count)" => "sum_count", "SUM(sum_price)" => "sum_price", "SUM(commission)" => "sum_commission"))->where(" $where ")->group('bank_subid')->order('sum_commission DESC')->limit(10)->select();
        foreach ($commission_list as $k => $val) {
            //            $commission_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
            $commission_list[$k]['platform_name'] = D('admin')->where('id=' . $val['bank_subid'])->getField('user_id') ?: '全部';
        }
        $this->assign('commission_list', $commission_list);

        // 热销商品排行
//		$where .= ' AND 1=1';
        $items_list = M('orderlist')->field(array("count(item_id)" => "cnt", "title", "item_id", "shop_id", "sum(sum_price)" => "sum_price", "sum(item_count)" => "sum_count", "SUM(sum_price)" => "sum_price"))->where(" $where ")->group('item_id')->order('sum_count DESC')->limit(10)->select();
        foreach ($items_list as $k => $v) {
            $item = M('items')->where(" item_id='{$v['item_id']}' AND shop_id={$v['shop_id']} ")->find();
            $items_list[$k]['url'] = $item['url'];
            $items_list[$k]['img'] = $item['img'];
        }

        $this->assign('items_list', $items_list);
        $this->display();
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