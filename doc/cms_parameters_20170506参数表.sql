/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : ziyou

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2017-05-06 19:01:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_parameters`
-- ----------------------------
DROP TABLE IF EXISTS `cms_parameters`;
CREATE TABLE `cms_parameters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `parameter_name` varchar(256) NOT NULL COMMENT '参数名',
  `parameter_id` varchar(3) NOT NULL COMMENT '参数id',
  `parameter_value` varchar(256) NOT NULL,
  `parameter_desc` varchar(1024) NOT NULL COMMENT '参数描述',
  `APP_FLAG01` varchar(1024) DEFAULT NULL,
  `data_state` char(1) DEFAULT NULL COMMENT '数据状态：0删除，1正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_parameters
-- ----------------------------
INSERT INTO `cms_parameters` VALUES ('39', 'DONATE_STATUS', '3', '已申请', '捐赠状态', null, null);
INSERT INTO `cms_parameters` VALUES ('2', 'IDEA_TYPE', '2', '投诉', '金点子类型', '', '');
INSERT INTO `cms_parameters` VALUES ('22', 'ORDER_TIME', '3', '11:00-12:00', '预约时间', null, null);
INSERT INTO `cms_parameters` VALUES ('5', 'JOB_TYPE', '1', '酒店服务类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('6', 'JOB_TYPE', '2', '家政服务类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('7', 'JOB_TYPE', '3', '居民服务类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('8', 'JOB_TYPE', '4', '微企业销售类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('9', 'JOB_TYPE', '5', '房屋中介类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('10', 'JOB_TYPE', '6', '其他类', '职业类型', null, null);
INSERT INTO `cms_parameters` VALUES ('21', 'ORDER_TIME', '2', '10:00-11:00', '预约时间', null, null);
INSERT INTO `cms_parameters` VALUES ('11', 'EXPECT_SALARY', '1', '1000-2000', '期待薪酬', null, null);
INSERT INTO `cms_parameters` VALUES ('12', 'EXPECT_SALARY', '2', '2000-3000', '期待薪酬', null, null);
INSERT INTO `cms_parameters` VALUES ('13', 'EXPECT_SALARY', '3', '3000以上', '期待薪酬', null, null);
INSERT INTO `cms_parameters` VALUES ('14', 'DONATE_TYPE', '1', '生活必需品', '捐赠类别', null, null);
INSERT INTO `cms_parameters` VALUES ('15', 'DONATE_TYPE', '2', '装饰物品', '捐赠类别', null, null);
INSERT INTO `cms_parameters` VALUES ('16', 'DONATE_TYPE', '3', '学习用品', '捐赠类别', null, null);
INSERT INTO `cms_parameters` VALUES ('17', 'DONATE_TYPE', '4', '办公用品', '捐赠类别', null, null);
INSERT INTO `cms_parameters` VALUES ('18', 'DONATE_STATUS', '0', '已处理', '捐赠状态', null, null);
INSERT INTO `cms_parameters` VALUES ('19', 'DONATE_STATUS', '1', '进行中', '捐赠状态', null, null);
INSERT INTO `cms_parameters` VALUES ('20', 'DONATE_STATUS', '2', '待审批', '捐赠状态', null, null);
INSERT INTO `cms_parameters` VALUES ('23', 'ORDER_TIME', '4', '14:30-15:30', '预约时间', null, null);
INSERT INTO `cms_parameters` VALUES ('24', 'ORDER_TIME', '5', '15:30-16:30', '预约时间', null, null);
INSERT INTO `cms_parameters` VALUES ('25', 'ORDER_TIME', '6', '16:30-17:30', '预约时间', null, null);
INSERT INTO `cms_parameters` VALUES ('26', 'IDEA_STATUS', '0', '已处理', '金点子状态', null, null);
INSERT INTO `cms_parameters` VALUES ('27', 'IDEA_STATUS', '1', '待处理', '金点子状态', null, null);
INSERT INTO `cms_parameters` VALUES ('28', 'IDEA_STATUS', '2', '处理中', '金点子状态', null, null);
INSERT INTO `cms_parameters` VALUES ('34', 'CAMP_STATE', '1', '进行中', '活动状态', null, null);
INSERT INTO `cms_parameters` VALUES ('33', 'CAMP_STATE', '0', '已结束', '活动状态', null, null);
INSERT INTO `cms_parameters` VALUES ('40', 'OBJECT_TYPE', '1', '生活必需品', '置换类别', null, null);
INSERT INTO `cms_parameters` VALUES ('41', 'OBJECT_TYPE', '2', '装饰物品', '置换类别', null, null);
INSERT INTO `cms_parameters` VALUES ('42', 'OBJECT_TYPE', '3', '学习用品', '置换类别', null, null);
INSERT INTO `cms_parameters` VALUES ('43', 'OBJECT_TYPE', '4', '办公用品', '置换类别', null, null);
INSERT INTO `cms_parameters` VALUES ('44', 'SERVICE_TYPE', '1', '交通', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('45', 'SERVICE_TYPE', '2', '娱乐', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('46', 'SERVICE_TYPE', '3', '餐饮', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('47', 'SERVICE_TYPE', '4', '生活', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('48', 'SERVICE_TYPE', '5', '银行', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('49', 'SERVICE_TYPE', '6', '住宿', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('50', 'SERVICE_TYPE', '7', '购物', '生活服务类型', null, null);
INSERT INTO `cms_parameters` VALUES ('92', 'IDEA_TYPE', '1', '建议', '金点子类型', null, null);
INSERT INTO `cms_parameters` VALUES ('52', 'SERVICE_TYPE', '11', '公交站', '交通', null, null);
INSERT INTO `cms_parameters` VALUES ('53', 'SERVICE_TYPE', '12', '加油站', '交通', null, null);
INSERT INTO `cms_parameters` VALUES ('54', 'SERVICE_TYPE', '13', '停车场', '交通', null, null);
INSERT INTO `cms_parameters` VALUES ('55', 'SERVICE_TYPE', '19', '其他', '交通', null, null);
INSERT INTO `cms_parameters` VALUES ('56', 'SERVICE_TYPE', '21', 'KTV', '娱乐', null, null);
INSERT INTO `cms_parameters` VALUES ('57', 'SERVICE_TYPE', '22', '电影院', '娱乐', null, null);
INSERT INTO `cms_parameters` VALUES ('58', 'SERVICE_TYPE', '23', '酒吧', '娱乐', null, null);
INSERT INTO `cms_parameters` VALUES ('59', 'SERVICE_TYPE', '24', '网吧', '娱乐', null, null);
INSERT INTO `cms_parameters` VALUES ('60', 'SERVICE_TYPE', '29', '其他', '娱乐', null, null);
INSERT INTO `cms_parameters` VALUES ('61', 'SERVICE_TYPE', '31', '餐馆', '餐饮', null, null);
INSERT INTO `cms_parameters` VALUES ('62', 'SERVICE_TYPE', '32', '中餐', '餐饮', null, null);
INSERT INTO `cms_parameters` VALUES ('63', 'SERVICE_TYPE', '33', '西餐', '餐饮', null, null);
INSERT INTO `cms_parameters` VALUES ('64', 'SERVICE_TYPE', '34', '咖啡馆', '餐饮', null, null);
INSERT INTO `cms_parameters` VALUES ('65', 'SERVICE_TYPE', '39', '其他', '餐饮', null, null);
INSERT INTO `cms_parameters` VALUES ('66', 'SERVICE_TYPE', '41', '学校', '生活', null, null);
INSERT INTO `cms_parameters` VALUES ('67', 'SERVICE_TYPE', '42', '医院', '生活', null, null);
INSERT INTO `cms_parameters` VALUES ('68', 'SERVICE_TYPE', '43', '公园', '生活', null, null);
INSERT INTO `cms_parameters` VALUES ('69', 'SERVICE_TYPE', '49', '其他', '生活', null, null);
INSERT INTO `cms_parameters` VALUES ('70', 'SERVICE_TYPE', '501', '中国银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('71', 'SERVICE_TYPE', '502', '建设银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('72', 'SERVICE_TYPE', '503', '工商银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('73', 'SERVICE_TYPE', '504', '农业银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('74', 'SERVICE_TYPE', '505', '中国银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('75', 'SERVICE_TYPE', '506', '兴业银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('76', 'SERVICE_TYPE', '507', '招商银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('77', 'SERVICE_TYPE', '508', '厦门银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('78', 'SERVICE_TYPE', '509', '交通银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('79', 'SERVICE_TYPE', '510', '平安银行', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('80', 'SERVICE_TYPE', '511', '农村信用社', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('81', 'SERVICE_TYPE', '599', '其他', '银行', null, null);
INSERT INTO `cms_parameters` VALUES ('82', 'SERVICE_TYPE', '61', '宾馆', '住宿', null, null);
INSERT INTO `cms_parameters` VALUES ('83', 'SERVICE_TYPE', '62', '酒店', '住宿', null, null);
INSERT INTO `cms_parameters` VALUES ('84', 'SERVICE_TYPE', '63', '旅馆', '住宿', null, null);
INSERT INTO `cms_parameters` VALUES ('85', 'SERVICE_TYPE', '69', '其他', '住宿', null, null);
INSERT INTO `cms_parameters` VALUES ('86', 'SERVICE_TYPE', '71', '超市', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('87', 'SERVICE_TYPE', '72', '商场', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('88', 'SERVICE_TYPE', '73', '菜市场', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('89', 'SERVICE_TYPE', '74', '书店', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('90', 'SERVICE_TYPE', '75', '花店', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('91', 'SERVICE_TYPE', '79', '其他', '购物', null, null);
INSERT INTO `cms_parameters` VALUES ('93', 'EXCHANGE_STATUS', '0', '已处理', '置换状态', null, null);
INSERT INTO `cms_parameters` VALUES ('94', 'EXCHANGE_STATUS', '1', '进行中', '置换状态', null, null);
INSERT INTO `cms_parameters` VALUES ('95', 'EXCHANGE_STATUS', '2', '待审批', '置换状态', null, null);
INSERT INTO `cms_parameters` VALUES ('96', 'LOVE_STATE', '0', '已结束', '爱心帮扶状态', null, null);
INSERT INTO `cms_parameters` VALUES ('97', 'LOVE_STATE', '1', '进行中', '爱心帮扶状态', null, null);
INSERT INTO `cms_parameters` VALUES ('98', 'LOVE_STATE', '2', '待审批', '爱心帮扶状态', null, null);
INSERT INTO `cms_parameters` VALUES ('99', 'LOVE_TYPE', '1', '寻求帮助', '爱心帮扶类型', null, null);
INSERT INTO `cms_parameters` VALUES ('100', 'LOVE_TYPE', '2', '提供帮助', '爱心帮扶类型', null, null);
INSERT INTO `cms_parameters` VALUES ('101', 'APART_TYPE', '1', '一室一厅', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('102', 'APART_TYPE', '2', '两室一厅', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('103', 'APART_TYPE', '3', '三室一厅', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('104', 'APART_TYPE', '4', '一房', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('105', 'APART_TYPE', '5', '两房', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('106', 'APART_TYPE', '6', '三房', '户型', null, '0');
INSERT INTO `cms_parameters` VALUES ('107', 'DECOR_TYPE', '1', '精装', '装修', null, '1');
INSERT INTO `cms_parameters` VALUES ('108', 'DECOR_TYPE', '2', '简装', '装修', null, '1');
INSERT INTO `cms_parameters` VALUES ('109', 'DECOR_TYPE', '3', '毛胚', '装修', null, '1');
INSERT INTO `cms_parameters` VALUES ('111', 'APART_TYPE', '7', '两室两厅', '户型', null, '1');
INSERT INTO `cms_parameters` VALUES ('112', 'Rentmoney_TYPE', '1', '0~500', '租金', null, '1');
INSERT INTO `cms_parameters` VALUES ('113', 'Rentmoney_TYPE', '2', '500~1000', '租金', null, '1');
INSERT INTO `cms_parameters` VALUES ('114', 'Rentmoney_TYPE', '3', '1000~2000', '租金', null, '1');
INSERT INTO `cms_parameters` VALUES ('115', 'Rentmoney_TYPE', '4', '2000~3000', '租金', null, '1');
INSERT INTO `cms_parameters` VALUES ('116', 'Rentmoney_TYPE', '5', '3000~10000', '租金', null, '1');
