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
                    case 'push_log' :
                        //搜索
                        $where = '1=1   ';
                        $days = M('push_log')->field(" FROM_UNIXTIME(add_time,'%Y%m%d') day ")->where($where)->order('add_time desc')->group('day')->limit($_GET['nextrow'] . ',5')->select();
//            var_dump(M('push_log')->getLastSql(),$days);exit;
                        foreach ($days as $k=>$v){
                            $push_list[$v['day']]['res'] = M('push_log')->field('id,item_id,add_time,bank_subid,sid,commission_id ')->where($where ." AND DATEDIFF({$v['day']},FROM_UNIXTIME(add_time))=0 ")->group('item_id')->order('add_time desc')->select();
//                var_dump(M('push_log')->getLastSql());exit;
                            foreach ($push_list[$v['day']]['res'] as $k => $val) {
                                $push_list[$v['day']]['res'][$k]['commission'] = M('commission')->where('id=' . $val['commission_id'])->find() ?: '';
                                // 获取佣金id,查看当天列表
                                $push_list[$v['day']]['ids'][] = $val['commission_id'];
                            }

//                $push_list[$v['day']]['day'] = $v['day'];
                            $push_list[$v['day']]['day'] = date('Y-m-d',$push_list[$v['day']]['res'][0]['add_time'] );
                            $push_list[$v['day']]['ids'] = implode(',',$push_list[$v['day']]['ids']);
                            $push_list[$v['day']]['cnt'] = count($push_list[$v['day']]['res']);

//                $push_list[$v['day']]['day'] = $v['day'];
//                var_dump(M('push_log')->getLastSql(),$days);exit;
                        }
                        if ($push_list) {
                            $res['data'] = $push_list;
                            echo json_encode($res);
                        } else {
                            echo "1";
                        }
                        break;

                    case 'settlelist' :

                        //搜索
                        $where = '1=1 AND data_state=1 AND status=1 ';
                        // 角色，用户
                        $where .= ' AND sid = '.$_SESSION['admin_info']['id'];
                        $orderlist_mod =M('orderlist');
                        $order_list = $orderlist_mod->where($where)->limit($_GET['nextrow'] . ',10')->order('id desc')->select();
                        foreach ($order_list as $k => $val) {
                            /*$order_list[$k]['platform_name'] = D('admin')->where('id=' . $val['platform_id'])->getField('user_id') ?: '全部';
                            $order_list[$k]['settle_status'] = ($val['settle_status3_ctb'] && $val['settle_status4_btc']) ?:0;
                            $order_list[$k]['rate2'] = $val['commission2']/$val['item_price']?:$order_list[$k]['rate'];
                            $order_list[$k]['commission2'] = $val['commission2']*$val['item_count']?:$order_list[$k]['commission'];

                            $item = M('items')->where(" item_id='{$val['item_id']}' AND shop_id={$val['shop_id']} ")->find();
                            $order_list[$k]['url'] = $item['url'];
                            $order_list[$k]['img'] = $item['img'];*/
                            $order_list[$k]['order_time'] = date('Y-m-d',$val['order_time']);
                            $order_list[$k]['status'] = ($val['settle_status4_btc'] && $val['settle_status3_ctb'] && $val['settle_status2_cts'] && $val['settle_status1_stc'])?'已结算':'待结算';

                        }
                        if ($order_list) {
                            $res['data'] = $order_list;
                            echo json_encode($res);
                        } else {
                            echo "1";
                        }
                        break;
                    case 'orderlist' :
                        //搜索
                        $where = '1=1 AND data_state=1  ';
                        $platform_id = get_platform_id($_SESSION['admin_info']);
                        $where .= " AND status=1 AND (platform_id={$platform_id} OR platform_id=0) ";
//                        $article_list = M('article')->field('id,title')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
                        $order_list = M('orderlist')->field('id,title,order_time,commission,commission2')->where($where)->limit($_GET['nextrow'] . ',5')->order('id DESC')->select();
//                        var_dump(M('orderlist')->getLastSql());

                        foreach ($order_list as $k => $val) {
                            $order_list[$k]['settle_status'] = ($val['settle_status3_ctb'] && $val['settle_status4_btc'] && $val.settle_status2_cts && $val['settle_status1_stc'] ) ?'已结算':'待结算';
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