/*
Navicat MySQL Data Transfer

Source Server         : 59.56.69.152
Source Server Version : 50163
Source Host           : 59.56.69.152:3306
Source Database       : msec

Target Server Type    : MYSQL
Target Server Version : 50163
File Encoding         : 65001

Date: 2017-06-28 00:35:53
*/

-- ----------------------------
-- Table structure for ctw_access
-- ----------------------------
DROP TABLE IF EXISTS `ctw_access`;
CREATE TABLE `ctw_access` (
  `role_id` int(5) unsigned NOT NULL COMMENT '角色id',
  `node_id` int(5) unsigned NOT NULL COMMENT '节点id',
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `node_id` (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.4权限表';

-- ----------------------------
-- Table structure for ctw_activity
-- ----------------------------
DROP TABLE IF EXISTS `ctw_activity`;
CREATE TABLE `ctw_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `orig` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `abst` varchar(255) NOT NULL,
  `info` mediumtext NOT NULL,
  `add_time` datetime NOT NULL,
  `ordid` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_best` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `name` varchar(66) DEFAULT '' COMMENT '主题名称',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机',
  `username` varchar(32) DEFAULT '' COMMENT '姓名',
  `vehicle` varchar(11) DEFAULT NULL COMMENT '适合车辆',
  `circuit` varchar(255) DEFAULT NULL COMMENT '自驾线路',
  `notice` varchar(11) DEFAULT NULL COMMENT '注意事项',
  `price` text COMMENT '价格政策',
  `instructions` text COMMENT '活动目的',
  `place` varchar(255) DEFAULT NULL COMMENT '活动地点',
  `total` int(11) DEFAULT NULL COMMENT '活动人数',
  `uid` int(1) DEFAULT NULL COMMENT '状态（1、启用，0、关闭）',
  `data_state` char(1) DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `score` int(10) DEFAULT '0' COMMENT '所需积分',
  `cnt_show` int(11) unsigned DEFAULT '0' COMMENT '收藏数展示',
  `left_show` int(11) DEFAULT '0' COMMENT '余量展示',
  `cnt_reply` int(11) DEFAULT '0' COMMENT '余量展示',
  `date_begin` datetime DEFAULT NULL COMMENT '开始时间',
  `date_end` datetime DEFAULT NULL COMMENT '结束时间',
  `plan` text COMMENT '活动安排',
  `fee` varchar(255) DEFAULT NULL COMMENT '费用',
  `stick` varchar(255) DEFAULT NULL COMMENT '置顶',
  `region_name` varchar(256) DEFAULT NULL COMMENT '区域',
  `region_id` int(11) unsigned DEFAULT NULL COMMENT '区域id',
  `remark` varchar(255) DEFAULT NULL,
  `pv` int(11) unsigned DEFAULT '0',
  `update_time` datetime NOT NULL COMMENT '更新时间',
  `update_uid` int(11) DEFAULT NULL,
  `update_username` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_best` (`is_best`),
  KEY `add_time` (`add_time`),
  KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_ad
-- ----------------------------
DROP TABLE IF EXISTS `ctw_ad`;
CREATE TABLE `ctw_ad` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `board_id` smallint(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `start_time` int(10) NOT NULL,
  `end_time` int(10) NOT NULL,
  `clicks` int(10) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  `ordid` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `board_id` (`board_id`,`start_time`,`end_time`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_adboard
-- ----------------------------
DROP TABLE IF EXISTS `ctw_adboard`;
CREATE TABLE `ctw_adboard` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `width` smallint(5) NOT NULL,
  `height` smallint(5) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_admin
-- ----------------------------
DROP TABLE IF EXISTS `ctw_admin`;
CREATE TABLE `ctw_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '编号，自增长',
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '账号（唯一客户经理编号）',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `add_time` int(10) unsigned DEFAULT NULL COMMENT '创建时间',
  `last_time` int(10) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态，1激活、0禁用',
  `role_id` int(10) NOT NULL DEFAULT '6' COMMENT '角色标识',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `user_id` varchar(50) NOT NULL COMMENT '客户经理姓名',
  `mobile` varchar(13) DEFAULT NULL COMMENT '手机号',
  `email` varchar(100) NOT NULL COMMENT '电子信箱',
  `ip` varchar(15) NOT NULL,
  `account` varchar(32) DEFAULT NULL COMMENT '收款账户信息（结算账户）',
  `data_state` tinyint(1) DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `pid` int(10) unsigned DEFAULT NULL COMMENT '父id',
  `address` varchar(10) DEFAULT NULL COMMENT '家庭地址',
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.1后台用户表';

-- ----------------------------
-- Table structure for ctw_album
-- ----------------------------
DROP TABLE IF EXISTS `ctw_album`;
CREATE TABLE `ctw_album` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '默认专辑',
  `img` varchar(255) DEFAULT NULL,
  `uid` int(10) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `cid` int(10) NOT NULL DEFAULT '0',
  `sort_order` int(10) DEFAULT '0',
  `recommend_count` int(10) NOT NULL,
  `recommend` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `add_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recommend` (`recommend`),
  KEY `sort_order` (`sort_order`),
  KEY `uid` (`uid`),
  KEY `status` (`status`,`cid`,`sort_order`),
  KEY `recommend_count` (`recommend_count`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_album_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_album_cate`;
CREATE TABLE `ctw_album_cate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '我的专辑',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `album_num` int(10) NOT NULL DEFAULT '0',
  `sort_order` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sort_order` (`status`,`sort_order`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_album_items
-- ----------------------------
DROP TABLE IF EXISTS `ctw_album_items`;
CREATE TABLE `ctw_album_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `items_id` int(10) NOT NULL DEFAULT '0',
  `pid` int(10) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `add_time` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_album_recommend
-- ----------------------------
DROP TABLE IF EXISTS `ctw_album_recommend`;
CREATE TABLE `ctw_album_recommend` (
  `album_id` int(10) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  KEY `album_id` (`album_id`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_article
-- ----------------------------
DROP TABLE IF EXISTS `ctw_article`;
CREATE TABLE `ctw_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `orig` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `abst` varchar(255) NOT NULL,
  `info` mediumtext NOT NULL COMMENT '信息',
  `add_time` datetime NOT NULL,
  `ordid` tinyint(4) unsigned NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_best` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` varchar(1024) NOT NULL,
  `platform_id` int(10) unsigned NOT NULL COMMENT '分销机构（发布的时候可指定全部或者具体分行、子机构的人员能看到） 0全部',
  `data_state` tinyint(1) unsigned DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `aid` varchar(255) NOT NULL COMMENT '附件id',
  PRIMARY KEY (`id`),
  KEY `is_best` (`is_best`),
  KEY `add_time` (`add_time`),
  KEY `cate_id` (`cate_id`),
  KEY `status` (`status`),
  KEY `data_state` (`data_state`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.10公告表';

-- ----------------------------
-- Table structure for ctw_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_article_cate`;
CREATE TABLE `ctw_article_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `article_nums` int(10) unsigned NOT NULL,
  `sort_order` smallint(4) unsigned NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_attatch
-- ----------------------------
DROP TABLE IF EXISTS `ctw_attatch`;
CREATE TABLE `ctw_attatch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `orig` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT '文件路径',
  `info` mediumtext NOT NULL COMMENT '信息',
  `add_time` datetime NOT NULL,
  `ordid` tinyint(4) NOT NULL,
  `uptime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filesize` varchar(32) NOT NULL DEFAULT '0' COMMENT 'w文件大小',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `filetype` varchar(32) NOT NULL COMMENT '文件类型',
  `data_state` tinyint(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `shop_id` int(10) unsigned DEFAULT '0' COMMENT '商户id',
  `item_id` varchar(32) DEFAULT NULL COMMENT '商品id',
  `origin_id` bigint(20) unsigned DEFAULT NULL COMMENT '商品原始id',
  `origin_name` varchar(32) DEFAULT NULL COMMENT '商品原始title',
  PRIMARY KEY (`id`),
  KEY `is_best` (`filesize`) USING BTREE,
  KEY `add_time` (`add_time`) USING BTREE,
  KEY `cate_id` (`cate_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='5.2.14文件图片管理表';

-- ----------------------------
-- Table structure for ctw_auto_collect
-- ----------------------------
DROP TABLE IF EXISTS `ctw_auto_collect`;
CREATE TABLE `ctw_auto_collect` (
  `id` char(4) NOT NULL,
  `value` varchar(200) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_auto_collect_date
-- ----------------------------
DROP TABLE IF EXISTS `ctw_auto_collect_date`;
CREATE TABLE `ctw_auto_collect_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add_date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_cash_back_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_cash_back_log`;
CREATE TABLE `ctw_cash_back_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `before_money` decimal(10,2) DEFAULT NULL,
  `after_money` decimal(10,2) DEFAULT NULL,
  `in_money` decimal(10,2) DEFAULT NULL,
  `out_money` decimal(10,2) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1表示收入，2表示支出',
  `info` varchar(100) NOT NULL,
  `sign` char(40) NOT NULL,
  `before_jifenbao` decimal(10,0) DEFAULT NULL,
  `after_jifenbao` decimal(10,0) DEFAULT NULL,
  `in_jifenbao` decimal(10,0) DEFAULT NULL,
  `out_jifenbao` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_collect_miao
-- ----------------------------
DROP TABLE IF EXISTS `ctw_collect_miao`;
CREATE TABLE `ctw_collect_miao` (
  `cate_id` smallint(4) NOT NULL,
  `collect_time` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_collect_taobao
-- ----------------------------
DROP TABLE IF EXISTS `ctw_collect_taobao`;
CREATE TABLE `ctw_collect_taobao` (
  `cate_id` smallint(4) NOT NULL,
  `collect_time` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_commission
-- ----------------------------
DROP TABLE IF EXISTS `ctw_commission`;
CREATE TABLE `ctw_commission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` varchar(255) DEFAULT '0' COMMENT '合同编号id,分行手动输入',
  `rate` varchar(255) DEFAULT NULL COMMENT '分销比例(佣金比例)',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  `approver` varchar(1000) DEFAULT NULL COMMENT '审批人',
  `approver_id` smallint(4) NOT NULL DEFAULT '0' COMMENT '审批人_id',
  `approver_time` int(10) NOT NULL DEFAULT '0' COMMENT '审批时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `platform_id` int(10) unsigned DEFAULT '0' COMMENT '分销平台，指定到机构？对，必须对应机构。',
  `remark` varchar(50) DEFAULT NULL,
  `remark_status` tinyint(6) DEFAULT '1',
  `freight` decimal(10,2) DEFAULT '0.00' COMMENT '承担运费',
  `period` varchar(1000) DEFAULT NULL COMMENT '账期',
  `data_state` tinyint(1) unsigned DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `cate_id` bigint(255) unsigned DEFAULT NULL COMMENT '分类id',
  `item_id` bigint(32) unsigned DEFAULT NULL COMMENT '商品id',
  `shop_id` bigint(10) unsigned NOT NULL COMMENT '商户id',
  `commission` decimal(10,2) DEFAULT NULL COMMENT '佣金金额',
  `click` int(10) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `contract` varchar(255) DEFAULT NULL COMMENT '合同名称',
  `platform` varchar(255) DEFAULT NULL COMMENT '分销平台',
  `cate_name` varchar(128) NOT NULL DEFAULT '1' COMMENT '分类名称',
  `role_id` bigint(10) unsigned NOT NULL DEFAULT '1' COMMENT '角色id,提供是否是分润使用，如果role_id为4',
  `img` varchar(255) DEFAULT '' COMMENT '商品图片URL',
  `url` varchar(1000) DEFAULT '' COMMENT '商品链接URL',
  PRIMARY KEY (`id`),
  KEY `cid` (`con_id`),
  KEY `title` (`rate`),
  KEY `index_sid` (`approver_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.8商品佣金表';

-- ----------------------------
-- Table structure for ctw_contract
-- ----------------------------
DROP TABLE IF EXISTS `ctw_contract`;
CREATE TABLE `ctw_contract` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` varchar(255) DEFAULT NULL COMMENT '合同编号id,分行手动输入',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  `approver` varchar(1000) DEFAULT NULL COMMENT '审批人',
  `approver_id` smallint(4) NOT NULL DEFAULT '0' COMMENT '审批人_id',
  `approver_time` int(10) NOT NULL DEFAULT '0' COMMENT '审批时间',
  `period_account` varchar(32) NOT NULL DEFAULT '0' COMMENT '账期',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `platform_id` int(10) unsigned DEFAULT '0' COMMENT '分销平台，指定到机构？对，必须对应机构。',
  `seo_desc` text,
  `cash_back_rate` varchar(40) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `remark_status` tinyint(6) DEFAULT '1',
  `freight` decimal(10,2) DEFAULT '0.00' COMMENT '承担运费',
  `period` varchar(1000) DEFAULT NULL COMMENT '账期',
  `data_state` tinyint(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `con_type` varchar(1000) DEFAULT NULL COMMENT '合同类型,关联感觉',
  `shop_id` bigint(11) DEFAULT NULL COMMENT '商城id',
  `payee` varchar(1000) DEFAULT NULL COMMENT '收款方',
  `begin_time` bigint(12) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` bigint(12) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  PRIMARY KEY (`id`),
  KEY `cid` (`con_id`),
  KEY `is_index` (`period_account`),
  KEY `title` (`title`),
  KEY `index_sid` (`approver_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.7合同表';

-- ----------------------------
-- Table structure for ctw_contract_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_contract_log`;
CREATE TABLE `ctw_contract_log` (
  `id` bigint(40) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) DEFAULT NULL,
  `op_time` datetime DEFAULT NULL,
  `op` varchar(66) DEFAULT NULL COMMENT '操作：增加、修改、删除、审核、回复',
  `op_object` varchar(256) DEFAULT NULL COMMENT '操作的表',
  `op_desc` text COMMENT '操作内容',
  `sql` varchar(1024) DEFAULT NULL COMMENT '执行的sql语句 add update insert delete',
  `product` int(11) unsigned DEFAULT '0' COMMENT '商品id',
  `data_state` char(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `score` int(10) DEFAULT '0' COMMENT '所需积分',
  `uid` int(10) unsigned DEFAULT '0' COMMENT '用户',
  `app` int(11) DEFAULT NULL COMMENT '活动',
  `status` char(1) DEFAULT NULL COMMENT '数据状态：2成功，1审核中',
  `content` varchar(255) DEFAULT NULL,
  `reply_time` datetime DEFAULT NULL COMMENT '审核时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='操作日志表';

-- ----------------------------
-- Table structure for ctw_exchange_goods
-- ----------------------------
DROP TABLE IF EXISTS `ctw_exchange_goods`;
CREATE TABLE `ctw_exchange_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `goods_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:虚拟卡 2:实体商品',
  `img` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  `integral` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `buy_count` int(11) NOT NULL DEFAULT '0',
  `user_id` smallint(5) NOT NULL DEFAULT '1',
  `user_num` int(8) NOT NULL COMMENT '每人限兑',
  `is_best` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `begin_time` varchar(40) NOT NULL,
  `end_time` varchar(40) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(400) NOT NULL,
  `seo_keys` varchar(400) NOT NULL,
  `seo_desc` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `begin_end_time` (`begin_time`,`end_time`),
  KEY `status` (`status`),
  KEY `sort` (`sort`),
  KEY `is_best` (`is_best`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_exchange_order
-- ----------------------------
DROP TABLE IF EXISTS `ctw_exchange_order`;
CREATE TABLE `ctw_exchange_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(255) NOT NULL,
  `data_name` varchar(255) NOT NULL DEFAULT '',
  `goods_status` tinyint(1) NOT NULL COMMENT '0:未发货;1:部分发货;2:全部发货;3:部分退货;4:全部退货'',',
  `data_num` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL COMMENT '订单状态\r\n0: 未确认\r\n1: 完成\r\n2: 作废',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `region_lv1` int(11) NOT NULL,
  `region_lv2` int(11) NOT NULL,
  `region_lv3` int(11) NOT NULL,
  `region_lv4` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `fax_phone` varchar(255) NOT NULL,
  `fix_phone` varchar(255) NOT NULL,
  `alim` varchar(255) NOT NULL,
  `msn` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `remark` varchar(255) NOT NULL,
  `adm_memo` varchar(255) NOT NULL,
  `order_score` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sn` (`sn`),
  KEY `uid` (`uid`),
  KEY `goods_status` (`goods_status`),
  KEY `status` (`status`),
  KEY `goods_id` (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_file
-- ----------------------------
DROP TABLE IF EXISTS `ctw_file`;
CREATE TABLE `ctw_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `orig` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT '文件路径',
  `info` mediumtext NOT NULL COMMENT '信息',
  `add_time` datetime NOT NULL,
  `ordid` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_best` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `platform_id` int(10) unsigned NOT NULL COMMENT '分销机构（发布的时候可指定全部或者具体分行、子机构的人员能看到）',
  `data_state` tinyint(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `shop_id` int(10) unsigned DEFAULT '0' COMMENT '商户id',
  `item_id` varchar(32) DEFAULT NULL COMMENT '商品id',
  `origin_id` bigint(20) unsigned DEFAULT NULL COMMENT '商品原始id',
  `origin_name` varchar(32) DEFAULT NULL COMMENT '商品原始title',
  `name` varchar(32) DEFAULT NULL COMMENT '图片原始名称',
  `extension` varchar(32) DEFAULT NULL COMMENT '图片后缀',
  `size` varchar(32) DEFAULT NULL COMMENT '图片大小',
  `bimg` varchar(255) NOT NULL COMMENT '原图',
  `simg` varchar(255) NOT NULL COMMENT '缩略图',
  `cate_name` varchar(128) NOT NULL DEFAULT '1' COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `is_best` (`is_best`) USING BTREE,
  KEY `add_time` (`add_time`) USING BTREE,
  KEY `cate_id` (`cate_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='5.2.14文件图片管理表';

-- ----------------------------
-- Table structure for ctw_find_password_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_find_password_log`;
CREATE TABLE `ctw_find_password_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md5` char(32) NOT NULL,
  `create_time` varchar(20) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0表示没有激活，1表示激活',
  `address` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `result` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_flink
-- ----------------------------
DROP TABLE IF EXISTS `ctw_flink`;
CREATE TABLE `ctw_flink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(4) NOT NULL DEFAULT '1',
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `ordid` smallint(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_flink_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_flink_cate`;
CREATE TABLE `ctw_flink_cate` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_focus
-- ----------------------------
DROP TABLE IF EXISTS `ctw_focus`;
CREATE TABLE `ctw_focus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `abst` text NOT NULL,
  `clicks` int(10) NOT NULL DEFAULT '0',
  `ordid` smallint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `ordid` (`ordid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_focus_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_focus_cate`;
CREATE TABLE `ctw_focus_cate` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `width` smallint(6) NOT NULL DEFAULT '0',
  `height` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_group
-- ----------------------------
DROP TABLE IF EXISTS `ctw_group`;
CREATE TABLE `ctw_group` (
  `id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items`;
CREATE TABLE `ctw_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` smallint(4) DEFAULT NULL COMMENT '分类id',
  `item_key` varchar(50) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `img` varchar(255) DEFAULT '' COMMENT '商品图片URL',
  `simg` varchar(255) DEFAULT NULL,
  `bimg` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL COMMENT '单价',
  `url` varchar(1000) DEFAULT '' COMMENT '商品链接URL',
  `sid` smallint(4) NOT NULL DEFAULT '0',
  `hits` int(10) NOT NULL DEFAULT '0',
  `likes` int(10) NOT NULL DEFAULT '0' COMMENT '喜欢数',
  `browse_num` int(10) NOT NULL,
  `haves` int(10) NOT NULL DEFAULT '0' COMMENT '库存数',
  `comments` int(10) NOT NULL DEFAULT '0' COMMENT '评论数',
  `comments_last` text COMMENT '最近的N条评论',
  `is_index` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `uid` int(10) NOT NULL DEFAULT '0',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keys` varchar(255) DEFAULT NULL,
  `sort_order` int(10) DEFAULT '0',
  `seo_desc` text,
  `cash_back_rate` varchar(40) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `remark_status` tinyint(6) DEFAULT '1',
  `is_collect_comments` int(1) DEFAULT '0' COMMENT '是否采集了淘宝评论1表示已经采集了淘宝评论',
  `data_state` tinyint(1) DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `item_id` varchar(32) unsigned NOT NULL COMMENT '对方商品库id',
  `shop_id` int(10) unsigned NOT NULL COMMENT '商城id',
  `qrcode` varchar(1000) DEFAULT NULL COMMENT '二维码图片URL',
  `cate_name` varchar(128) NOT NULL DEFAULT '1' COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `is_index` (`is_index`),
  KEY `title` (`title`),
  KEY `index_sid` (`sid`),
  KEY `uid` (`uid`),
  KEY `item_key` (`item_key`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.6推广商品表';

-- ----------------------------
-- Table structure for ctw_items_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_cate`;
CREATE TABLE `ctw_items_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `keywords` varchar(128) NOT NULL COMMENT '分类关键字',
  `img` varchar(255) DEFAULT NULL,
  `pid` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `item_nums` int(10) NOT NULL DEFAULT '0',
  `item_likes` int(11) NOT NULL,
  `ordid` smallint(4) NOT NULL DEFAULT '0',
  `tags` varchar(50) NOT NULL COMMENT '标签',
  `is_hots` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `recommend` int(1) NOT NULL DEFAULT '0' COMMENT '0表示不推荐，1表示推荐',
  `import_status` int(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `seo_desc` text NOT NULL,
  `matching_title` varchar(2000) DEFAULT NULL,
  `add_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `data_state` tinyint(1) unsigned DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  PRIMARY KEY (`id`),
  KEY `index_is_hots` (`is_hots`),
  KEY `ordid` (`ordid`),
  KEY `index_pid` (`pid`,`recommend`,`status`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.5推广商品分类表';

-- ----------------------------
-- Table structure for ctw_items_comments
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_comments`;
CREATE TABLE `ctw_items_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `items_id` int(11) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `info` text NOT NULL,
  `add_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items_site
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_site`;
CREATE TABLE `ctw_items_site` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `site_domain` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `collect_url` varchar(255) NOT NULL,
  `collect_time` int(10) NOT NULL DEFAULT '0',
  `item_nums` int(10) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items_tags
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_tags`;
CREATE TABLE `ctw_items_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `item_nums` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items_tags_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_tags_cate`;
CREATE TABLE `ctw_items_tags_cate` (
  `cate_id` smallint(4) NOT NULL,
  `tag_id` int(10) NOT NULL,
  KEY `cate_id` (`cate_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items_tags_item
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_tags_item`;
CREATE TABLE `ctw_items_tags_item` (
  `item_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  KEY `item_id` (`item_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_items_user
-- ----------------------------
DROP TABLE IF EXISTS `ctw_items_user`;
CREATE TABLE `ctw_items_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `add_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`iid`),
  KEY `uid` (`uid`),
  KEY `item_id_2` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_like_list
-- ----------------------------
DROP TABLE IF EXISTS `ctw_like_list`;
CREATE TABLE `ctw_like_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `items_id` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `add_time` bigint(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `add_time` (`add_time`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_miao_order
-- ----------------------------
DROP TABLE IF EXISTS `ctw_miao_order`;
CREATE TABLE `ctw_miao_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_time` varchar(20) DEFAULT NULL,
  `seller_name` varchar(20) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `item_count` int(5) DEFAULT NULL,
  `item_price` varchar(10) DEFAULT NULL,
  `sales` varchar(20) DEFAULT NULL,
  `commission` varchar(10) DEFAULT NULL,
  `cash_back` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL COMMENT '//订单状态',
  `is_update` int(1) NOT NULL DEFAULT '0' COMMENT '0表示未更新用户表，以及返现表，1表示已经更新，不需要再次更新',
  `jiesuan_data` datetime NOT NULL COMMENT '结算日期',
  `order_id` varchar(20) NOT NULL,
  `cash_back_jifenbao` varchar(10) DEFAULT NULL,
  `shop_id` bigint(10) unsigned NOT NULL COMMENT '商户id',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `order_code` (`order_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_nav
-- ----------------------------
DROP TABLE IF EXISTS `ctw_nav`;
CREATE TABLE `ctw_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort_order` smallint(4) NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1-系统 0-自定义',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '导航位置1-顶部 2-底部',
  `in_site` tinyint(1) NOT NULL COMMENT '1-本站内 0-站外',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` text NOT NULL,
  `seo_desc` text NOT NULL,
  `items_cate_id` int(11) DEFAULT NULL COMMENT '//分类id',
  PRIMARY KEY (`id`),
  KEY `is_show` (`is_show`),
  KEY `type` (`type`),
  KEY `sort_order` (`sort_order`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_node
-- ----------------------------
DROP TABLE IF EXISTS `ctw_node`;
CREATE TABLE `ctw_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `module` varchar(255) NOT NULL COMMENT '模块',
  `module_name` varchar(50) NOT NULL COMMENT '模块名称',
  `action` varchar(255) NOT NULL COMMENT '操作',
  `action_name` varchar(50) DEFAULT NULL COMMENT '操作名称',
  `data` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  `auth_type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  `often` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-不常用 1-常用',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-不常用 1-常用',
  `add_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `data_state` tinyint(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `module` (`module`),
  KEY `auth_type` (`auth_type`),
  KEY `is_show` (`is_show`),
  KEY `group_id` (`group_id`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.3节点表';

-- ----------------------------
-- Table structure for ctw_op_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_op_log`;
CREATE TABLE `ctw_op_log` (
  `log_id` bigint(40) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) DEFAULT NULL,
  `op_time` datetime DEFAULT NULL,
  `op` varchar(66) DEFAULT NULL COMMENT '操作：增加、修改、删除、审核、回复',
  `op_object` varchar(256) DEFAULT NULL COMMENT '操作对象',
  `op_desc` text COMMENT '操作内容',
  `sql` text COMMENT '执行的sql语句 add update insert delete',
  `product` int(11) unsigned DEFAULT '0' COMMENT '商品id',
  `data_state` char(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `score` int(10) DEFAULT '0' COMMENT '所需积分',
  `user` int(10) unsigned DEFAULT '0' COMMENT '用户',
  `app` int(11) DEFAULT NULL COMMENT '活动',
  `status` char(1) DEFAULT '1' COMMENT '数据状态：2成功，1审核中',
  `remark` varchar(255) DEFAULT NULL,
  `reply_time` datetime DEFAULT NULL COMMENT '审核时间',
  `ip` varchar(64) DEFAULT NULL COMMENT 'ip',
  `op_table` varchar(256) DEFAULT NULL COMMENT '操作的表',
  `uid` bigint(40) unsigned NOT NULL,
  `op_time2` int(11) DEFAULT NULL,
  `op_content` varchar(256) DEFAULT NULL COMMENT '操作对象',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.12合同日志表';

-- ----------------------------
-- Table structure for ctw_orderlist
-- ----------------------------
DROP TABLE IF EXISTS `ctw_orderlist`;
CREATE TABLE `ctw_orderlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_time` varchar(20) DEFAULT '1444444231' COMMENT '下单时间',
  `seller_name` varchar(20) DEFAULT NULL COMMENT '推广人',
  `username` varchar(50) DEFAULT NULL,
  `order_code` varchar(50) DEFAULT NULL,
  `item_count` int(5) DEFAULT NULL,
  `item_price` varchar(10) DEFAULT NULL,
  `sales` varchar(20) DEFAULT NULL,
  `commission` varchar(10) DEFAULT NULL,
  `cash_back` varchar(10) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1' COMMENT '//订单状态',
  `is_update` int(1) NOT NULL DEFAULT '0' COMMENT '0表示未更新用户表，以及返现表，1表示已经更新，不需要再次更新',
  `jiesuan_data` datetime NOT NULL COMMENT '结算日期',
  `order_id` varchar(20) NOT NULL,
  `cash_back_jifenbao` varchar(10) DEFAULT NULL,
  `shop_id` bigint(10) unsigned NOT NULL COMMENT '商户id',
  `item_id` varchar(32) unsigned NOT NULL COMMENT '商品id',
  `sum_price` varchar(10) DEFAULT '0' COMMENT '商品总价',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `platform_id` int(10) unsigned DEFAULT '0' COMMENT '分销平台，指定到机构？对，必须对应机构。',
  `settle_time` varchar(20) DEFAULT '0' COMMENT '结算时间',
  `settle_price` varchar(10) DEFAULT '0' COMMENT '结算总价',
  `settle_status` tinyint(20) NOT NULL DEFAULT '0' COMMENT '//结算状态',
  `settle_status1_stc` tinyint(20) NOT NULL DEFAULT '0' COMMENT '//结算状态  商城对cps的结算',
  `settle_status2_cts` tinyint(20) NOT NULL DEFAULT '0' COMMENT '//结算状态 cps对商城的结算',
  `settle_status3_ctb` tinyint(20) NOT NULL DEFAULT '0' COMMENT '//结算状态 cps对分行的结算',
  `settle_status4_btc` tinyint(20) NOT NULL DEFAULT '0' COMMENT '//结算状态 分行对cps的结算',
  `sid` varchar(20) DEFAULT '1' COMMENT '推广员id',
  `bank_id` varchar(20) DEFAULT '1' COMMENT '分行id',
  `bank_subid` varchar(20) DEFAULT '1' COMMENT '支行id',
  `data_state` tinyint(1) DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  `cate_id` bigint(10) unsigned NOT NULL DEFAULT '1' COMMENT '分类id',
  `cate_name` varchar(128) DEFAULT '1' COMMENT '分类名称',
  `commission2` varchar(10) DEFAULT NULL COMMENT '分润',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `order_code` (`order_code`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.11订单表';

-- ----------------------------
-- Table structure for ctw_parameters
-- ----------------------------
DROP TABLE IF EXISTS `ctw_parameters`;
CREATE TABLE `ctw_parameters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `parameter_name` varchar(256) NOT NULL COMMENT '参数名',
  `parameter_id` varchar(3) NOT NULL COMMENT '参数id',
  `parameter_value` varchar(256) NOT NULL,
  `parameter_desc` varchar(1024) NOT NULL COMMENT '参数描述',
  `APP_FLAG01` varchar(1024) DEFAULT NULL,
  `data_state` char(1) DEFAULT '1' COMMENT '数据状态：0删除，1正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_poster
-- ----------------------------
DROP TABLE IF EXISTS `ctw_poster`;
CREATE TABLE `ctw_poster` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` tinyint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `orig` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT '文件路径',
  `info` mediumtext NOT NULL COMMENT '信息',
  `add_time` datetime NOT NULL,
  `ordid` tinyint(4) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_best` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-待审核 1-已审核',
  `platform_id` int(10) unsigned NOT NULL COMMENT '分销机构（发布的时候可指定全部或者具体分行、子机构的人员能看到）',
  `data_state` tinyint(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '创建人',
  `shop_id` int(10) unsigned DEFAULT '0' COMMENT '商户id',
  `item_id` varchar(32) DEFAULT NULL COMMENT '商品id',
  `origin_id` bigint(20) unsigned DEFAULT NULL COMMENT '商品原始id',
  `origin_name` varchar(32) DEFAULT NULL COMMENT '商品原始title',
  `cate_name` varchar(128) NOT NULL DEFAULT '1' COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `is_best` (`is_best`) USING BTREE,
  KEY `add_time` (`add_time`) USING BTREE,
  KEY `cate_id` (`cate_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='5.2.15 海报二维码表';

-- ----------------------------
-- Table structure for ctw_push_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_push_log`;
CREATE TABLE `ctw_push_log` (
  `id` bigint(40) NOT NULL AUTO_INCREMENT,
  `sname` varchar(40) DEFAULT NULL,
  `op_time` datetime DEFAULT NULL,
  `con_id` bigint(10) DEFAULT NULL COMMENT '合同编号id=cps_contract.id',
  `cate_id` bigint(10) DEFAULT NULL COMMENT '商品类别id',
  `item_id` varchar(32) DEFAULT NULL COMMENT '商品id',
  `bank_id` bigint(20) DEFAULT NULL COMMENT '推广分行id',
  `bank_subid` int(11) unsigned DEFAULT '0' COMMENT '子机构id',
  `data_state` char(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  `score` int(10) DEFAULT '0' COMMENT '所需积分',
  `sid` int(10) unsigned DEFAULT '0' COMMENT '推广人id',
  `app` int(11) DEFAULT NULL COMMENT '活动',
  `status` char(1) DEFAULT NULL COMMENT '数据状态：2成功，1审核中',
  `content` varchar(255) DEFAULT NULL,
  `reply_time` datetime DEFAULT NULL COMMENT '审核时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `ip` varchar(255) DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '修改时间',
  `sid222` varchar(40) DEFAULT NULL,
  `cate_name` varchar(128) NOT NULL DEFAULT '1' COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.13推广记录表';

-- ----------------------------
-- Table structure for ctw_role
-- ----------------------------
DROP TABLE IF EXISTS `ctw_role`;
CREATE TABLE `ctw_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `data_state` tinyint(1) unsigned DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='5.2.2角色表';

-- ----------------------------
-- Table structure for ctw_seller_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_seller_cate`;
CREATE TABLE `ctw_seller_cate` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `cid` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `count` int(8) NOT NULL,
  `seller_status` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL,
  `sort` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `index_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_seller_list
-- ----------------------------
DROP TABLE IF EXISTS `ctw_seller_list`;
CREATE TABLE `ctw_seller_list` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `sid` int(8) NOT NULL,
  `cate_id` int(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `site_logo` varchar(200) DEFAULT NULL,
  `net_logo` varchar(200) NOT NULL,
  `recommend` int(1) NOT NULL,
  `click_url` varchar(400) NOT NULL,
  `sort` int(6) NOT NULL,
  `description` varchar(200) NOT NULL,
  `freeshipment` int(1) NOT NULL,
  `installment` int(1) NOT NULL,
  `has_invoice` int(1) NOT NULL,
  `cash_back_rate` varchar(64) NOT NULL,
  `status` int(1) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_status` (`status`),
  KEY `index_recommend` (`recommend`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_seller_list_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_seller_list_cate`;
CREATE TABLE `ctw_seller_list_cate` (
  `list_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  KEY `list_id` (`list_id`),
  KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_seller_list_goods
-- ----------------------------
DROP TABLE IF EXISTS `ctw_seller_list_goods`;
CREATE TABLE `ctw_seller_list_goods` (
  `id` int(11) NOT NULL,
  `seller_list_id` int(11) NOT NULL,
  `seller_cate_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `pic_url` varchar(400) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `desc` tinytext NOT NULL,
  `click_url` varchar(400) NOT NULL,
  `seller_url` varchar(400) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_list_id` (`seller_list_id`),
  KEY `seller_cate_id` (`seller_cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_send_email_log
-- ----------------------------
DROP TABLE IF EXISTS `ctw_send_email_log`;
CREATE TABLE `ctw_send_email_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md5` char(32) NOT NULL,
  `create_time` varchar(20) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0表示没有激活，1表示激活',
  `address` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `result` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_seo
-- ----------------------------
DROP TABLE IF EXISTS `ctw_seo`;
CREATE TABLE `ctw_seo` (
  `description` text,
  `keywords` text,
  `title` varchar(250) DEFAULT NULL,
  `actionname` varchar(30) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `actionname` (`actionname`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_setting
-- ----------------------------
DROP TABLE IF EXISTS `ctw_setting`;
CREATE TABLE `ctw_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_ucenter
-- ----------------------------
DROP TABLE IF EXISTS `ctw_ucenter`;
CREATE TABLE `ctw_ucenter` (
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user`;
CREATE TABLE `ctw_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `passwd` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `add_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `last_time` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(15) DEFAULT '0',
  `is_majia` int(1) DEFAULT '0' COMMENT '0表示普通用户 1表示马甲',
  `login_count` int(10) DEFAULT '0',
  `mobile` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `add_time` (`add_time`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_comments
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_comments`;
CREATE TABLE `ctw_user_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT '0',
  `uname` varchar(100) NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `info` text,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `add_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `index_pid` (`pid`),
  KEY `index_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_consignee
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_consignee`;
CREATE TABLE `ctw_user_consignee` (
  `uid` int(11) NOT NULL,
  `region_lv1` int(11) NOT NULL DEFAULT '0',
  `region_lv2` int(11) NOT NULL DEFAULT '0',
  `region_lv3` int(11) NOT NULL DEFAULT '0',
  `region_lv4` int(11) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '',
  `mobile_phone` varchar(255) NOT NULL DEFAULT '',
  `fix_phone` varchar(255) NOT NULL DEFAULT '',
  `consignee` varchar(255) NOT NULL DEFAULT '',
  `zip` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `fax_phone` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_follow
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_follow`;
CREATE TABLE `ctw_user_follow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fans_id` int(10) NOT NULL DEFAULT '0',
  `uid` int(10) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fans_id` (`fans_id`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_history
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_history`;
CREATE TABLE `ctw_user_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL DEFAULT '0',
  `uname` varchar(100) NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_info
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_info`;
CREATE TABLE `ctw_user_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '//0表示男，1表示女，2表示未知',
  `brithday` varchar(50) NOT NULL DEFAULT '1985|1|1',
  `address` varchar(50) NOT NULL DEFAULT '请选择|请选择',
  `blog` varchar(200) NOT NULL DEFAULT 'http://',
  `info` varchar(500) NOT NULL DEFAULT '自我介绍',
  `share_num` int(11) DEFAULT '0',
  `like_num` int(11) DEFAULT '0',
  `follow_num` int(10) DEFAULT '0',
  `fans_num` int(10) DEFAULT '0',
  `album_num` int(10) DEFAULT '0',
  `exchange_num` int(8) NOT NULL DEFAULT '0',
  `integral` int(10) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '用户资金',
  `jifenbao` decimal(10,0) DEFAULT '0',
  `constellation` tinyint(4) NOT NULL DEFAULT '0' COMMENT '星座',
  `job` tinyint(4) NOT NULL DEFAULT '0' COMMENT '职业',
  `qq` varchar(20) DEFAULT NULL,
  `realname` varchar(64) DEFAULT NULL,
  `alipay` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `integral` (`integral`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_msg
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_msg`;
CREATE TABLE `ctw_user_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(40) NOT NULL,
  `from_user` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `del` tinyint(1) NOT NULL,
  `date` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_openid
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_openid`;
CREATE TABLE `ctw_user_openid` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `uname` varchar(100) NOT NULL,
  `openid` varchar(50) NOT NULL DEFAULT '0',
  `info` text,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_setmsg
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_setmsg`;
CREATE TABLE `ctw_user_setmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(20) NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_user_tixian
-- ----------------------------
DROP TABLE IF EXISTS `ctw_user_tixian`;
CREATE TABLE `ctw_user_tixian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `jifenbao` decimal(10,0) DEFAULT '0',
  `remark` varchar(1000) NOT NULL,
  `addtime` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `reply` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '//0表示没正在处理，1表示已经审核，2表示退回',
  `realname` varchar(64) DEFAULT NULL,
  `alipay` varchar(255) DEFAULT NULL,
  `is_money` int(1) DEFAULT '1' COMMENT '1表示钱2表示集分宝',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_wegoapi
-- ----------------------------
DROP TABLE IF EXISTS `ctw_wegoapi`;
CREATE TABLE `ctw_wegoapi` (
  `name` varchar(100) NOT NULL,
  `data` text NOT NULL,
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_word
-- ----------------------------
DROP TABLE IF EXISTS `ctw_word`;
CREATE TABLE `ctw_word` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cid` smallint(6) NOT NULL DEFAULT '0',
  `word` varchar(255) NOT NULL DEFAULT '',
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(2) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `cid` (`cid`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ctw_word_cate
-- ----------------------------
DROP TABLE IF EXISTS `ctw_word_cate`;
CREATE TABLE `ctw_word_cate` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
