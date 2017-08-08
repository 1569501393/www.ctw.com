<?php

class apiAction extends Action
// class indexAction extends Action
{
    /**
     * +----------------------------------------------------------
     * 默认操作
     * +----------------------------------------------------------
     */
    public function index()
    {
        // 角色，用户
        if ($_SESSION['admin_info']['role_id'] == 6) { // 客户经理 6
            // 获取分页页码
            if ($_GET['nextrow']) {
                switch ($_GET['type']){
                    case 'orderlist' :
                        //搜索
                        $where = '1=1 AND data_state=1  ';
                        $platform_id = get_platform_id($_SESSION['admin_info']);
                        $where .= " AND status=1 AND (platform_id={$platform_id} OR platform_id=0) ";
//                        $article_list = M('article')->field('id,title')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
                        $order_list = M('orderlist')->field('id,title,order_time,commission,commission2')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
//                        var_dump(M('article')->getLastSql());

                        foreach ($order_list as $k => $val) {
                            $order_list[$k]['settle_status'] = ($val['settle_status3_ctb'] && $val['settle_status4_btc'] && $val.settle_status2_cts && $val.settle_status1_stc ) ?'已结算':'待结算';
                            $order_list[$k]['order_time'] = date('Y-m-d',$val['order_time']);
                            $order_list[$k]['commission2'] = $val['commission2']?:$val['commission'];
                        }

                        if ($order_list) {
                            $res['data'] = $order_list;
                            echo json_encode($res);
                        } else {
                            echo "1";
                        }
                        break;

                    case 'article' :
                        //搜索
                        $where = '1=1 AND data_state=1  ';
                        $platform_id = get_platform_id($_SESSION['admin_info']);
                        $where .= " AND status=1 AND (platform_id={$platform_id} OR platform_id=0) ";
//                        $article_list = M('article')->field('id,title')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
                        $article_list = M('article')->field('id,title')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
//                        var_dump(M('article')->getLastSql());
                        if ($article_list) {
                            $res['data'] = $article_list;
                            echo json_encode($res);
                        } else {
                            echo "1";
                        }
                        break;

                    case 'goodslist' :
                        $commission_mod = M('commission');
                        //搜索
                        $where = '1=1 AND con_id<1 ';
                        $platform_id = get_platform_id($_SESSION['admin_info']);
                        $where .= " AND platform_id=" . $platform_id;
                        $commission_list = $commission_mod->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();

                        $bank_id = get_platform_id($_SESSION['admin_info']);
                        foreach ($commission_list as $k => $val) {
                            $commission_list[$k]['key'] = ++$p->firstRow;
                            $commission_list[$k]['bank_id'] = $bank_id;
                            $commission_list[$k]['platform_name'] = M('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
                            $commission_list[$k]['file'] = M('file')->where(" item_id='{$val['item_id']}' AND status=1 AND data_state=1 ")->select() ?: array();
                            $profit = M('commission')->where(" con_id<1 AND item_id='{$val['item_id']}' AND  shop_id={$val['shop_id']} AND  role_id={$bank_id} ")->find() ?: array();
                            $commission_list[$k]['commission2'] = $profit['commission'] ?: $val['commission'];
                            $commission_list[$k]['rate2'] = $profit['rate'] ?: $val['rate'];
                        }
                        if ($commission_list) {
                            $res['data'] = $commission_list;
                            $res['admin_info'] = $_SESSION['admin_info'];
                            echo json_encode($res);
                        } else {
                            echo "1";
                        }
                        break;

                }



                exit;
            }
        }
    }

}

?>