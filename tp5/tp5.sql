/*
Navicat MySQL Data Transfer

Source Server         : penglifu
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : tp5

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2018-10-24 11:24:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for thinkphp_input
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_input`;
CREATE TABLE `thinkphp_input` (
  `input_id` int(10) NOT NULL AUTO_INCREMENT,
  `input_pid` int(10) DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `input_type_id` int(10) DEFAULT NULL,
  `input_data_id` int(1) DEFAULT NULL,
  `input_name` varchar(100) DEFAULT NULL,
  `form_name` varchar(100) DEFAULT NULL,
  `edit_switch` int(1) DEFAULT '2',
  `show_switch` int(1) DEFAULT '2',
  `edit_size` int(10) DEFAULT NULL,
  `data_length` int(10) DEFAULT NULL,
  `list_switch` int(1) DEFAULT '2',
  `list_size` int(10) DEFAULT '0',
  `require_switch` int(1) DEFAULT '2',
  `price_switch` int(1) DEFAULT '2',
  `note` varchar(100) DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  `prompt` varchar(100) DEFAULT NULL COMMENT '提示',
  `state` int(1) DEFAULT '2',
  PRIMARY KEY (`input_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_input
-- ----------------------------
INSERT INTO `thinkphp_input` VALUES ('4', null, '5', '1', '1', '导航菜单名', 'menu_name', '2', '2', null, '50', '2', '0', '2', '2', null, '1534916571', null, '2');
INSERT INTO `thinkphp_input` VALUES ('5', null, '5', '1', '2', '父级id', 'left_menu_pid', '2', '2', null, '10', '2', '0', '2', '2', null, '1534916690', null, '2');
INSERT INTO `thinkphp_input` VALUES ('6', null, '5', '1', '1', '状态', 'state', '2', '2', null, '1', '2', '0', '2', '2', null, '1534917145', null, '2');
INSERT INTO `thinkphp_input` VALUES ('7', null, '5', '1', '2', '级别id', 'level_id', '2', '2', null, '2', '2', '0', '2', '2', null, '1535012253', null, '2');
INSERT INTO `thinkphp_input` VALUES ('8', null, '5', '1', '1', '页面地址', 'menu_address', '2', '2', null, '100', '2', '0', '2', '2', null, '1535082453', null, '2');
INSERT INTO `thinkphp_input` VALUES ('14', null, '5', '1', '1', '分类路径', 'menu_path', '2', '2', null, '100', '2', '0', '2', '2', null, '1535593255', null, '2');
INSERT INTO `thinkphp_input` VALUES ('15', null, '17', '1', '2', '权限分类id', 'left_menu_id', '2', '2', null, '50', '2', '0', '2', '2', null, '1535680358', null, '1');
INSERT INTO `thinkphp_input` VALUES ('16', null, '17', '1', '1', '权限规则', 'access_rules', '2', '2', null, '100', '2', '0', '2', '2', null, '1535680480', null, '1');
INSERT INTO `thinkphp_input` VALUES ('17', null, '17', '1', '1', '权限名', 'management_name', '2', '2', null, '50', '2', '0', '2', '2', null, '1535680552', null, '1');
INSERT INTO `thinkphp_input` VALUES ('18', null, '17', '1', '1', '权限分类子id', 'left_menu_zid', '2', '2', null, '20', '2', '0', '2', '2', null, '1535682897', null, '1');
INSERT INTO `thinkphp_input` VALUES ('19', null, '17', '1', '1', '状态', 'state', '2', '2', null, '1', '2', '0', '2', '2', null, '1535682957', null, '1');
INSERT INTO `thinkphp_input` VALUES ('20', null, '18', '1', '1', '角色名', 'rolename', '2', '2', null, '50', '2', '0', '2', '2', null, '1538187126', null, '1');
INSERT INTO `thinkphp_input` VALUES ('21', null, '18', '1', '1', '拥有规则', 'haverule', '2', '2', null, '225', '2', '0', '2', '2', null, '1536213118', null, '1');
INSERT INTO `thinkphp_input` VALUES ('25', null, '18', '1', '1', '描述', 'described', '2', '2', null, '100', '2', '0', '2', '2', null, '1536213397', null, '1');
INSERT INTO `thinkphp_input` VALUES ('26', null, '18', '1', '2', '管理员id', 'user_id', '2', '2', null, '50', '2', '0', '2', '2', null, '1536213493', null, '1');
INSERT INTO `thinkphp_input` VALUES ('27', null, '18', '1', '1', '状态', 'state', '2', '2', null, '1', '2', '0', '2', '2', null, '1537865195', null, '1');
INSERT INTO `thinkphp_input` VALUES ('30', null, '18', '1', '4', '操作权限', 'operation', '2', '2', null, '0', '2', '0', '2', '2', null, '1538212406', null, '1');
INSERT INTO `thinkphp_input` VALUES ('31', null, '21', '1', '3', '进货价格', 'initial_price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538787669', null, '1');
INSERT INTO `thinkphp_input` VALUES ('32', null, '21', '1', '1', '卖价', 'sell_price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538970883', null, '1');
INSERT INTO `thinkphp_input` VALUES ('33', null, '21', '1', '3', '市场价', 'market_price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538788068', null, '1');
INSERT INTO `thinkphp_input` VALUES ('34', null, '21', '1', '1', '产品标题', 'title', '2', '2', null, '100', '2', '0', '2', '2', null, '1538788218', null, '1');
INSERT INTO `thinkphp_input` VALUES ('35', null, '21', '1', '4', '产品详情', 'details', '2', '2', null, '0', '2', '0', '2', '2', null, '1538788305', null, '1');
INSERT INTO `thinkphp_input` VALUES ('38', null, '21', '1', '2', '是否上架', 'shelves', '2', '2', null, '1', '2', '0', '2', '2', null, '1538788589', null, '1');
INSERT INTO `thinkphp_input` VALUES ('39', null, '21', '1', '2', '收藏量', 'collection', '2', '2', null, '200', '2', '0', '2', '2', null, '1538788749', null, '1');
INSERT INTO `thinkphp_input` VALUES ('40', null, '21', '1', '2', '销量', 'sales', '2', '2', null, '200', '2', '0', '2', '2', null, '1538788793', null, '1');
INSERT INTO `thinkphp_input` VALUES ('41', null, '21', '1', '3', '邮费', 'postage', '2', '2', null, '20', '2', '0', '2', '2', null, '1538788872', null, '1');
INSERT INTO `thinkphp_input` VALUES ('42', null, '21', '1', '1', '商品品牌', 'brand', '2', '2', null, '50', '2', '0', '2', '2', null, '1538788980', null, '1');
INSERT INTO `thinkphp_input` VALUES ('43', null, '22', '1', '1', '标题', 'title', '2', '2', null, '100', '2', '0', '2', '2', null, '1538789397', null, '1');
INSERT INTO `thinkphp_input` VALUES ('44', null, '22', '1', '3', '进货价', 'initial_price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538789434', null, '2');
INSERT INTO `thinkphp_input` VALUES ('45', null, '22', '1', '3', '卖价', 'price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538789475', null, '2');
INSERT INTO `thinkphp_input` VALUES ('46', null, '22', '1', '3', '市场价', 'market_price', '2', '2', null, '20', '2', '0', '2', '2', null, '1538789517', null, '2');
INSERT INTO `thinkphp_input` VALUES ('47', null, '22', '1', '4', '产品详情', 'details', '2', '2', null, '0', '2', '0', '2', '2', null, '1538789556', null, '2');
INSERT INTO `thinkphp_input` VALUES ('48', null, '22', '1', '4', '产品规格', 'specifications', '2', '2', null, '0', '2', '0', '2', '2', null, '1538789579', null, '2');
INSERT INTO `thinkphp_input` VALUES ('49', null, '22', '1', '4', '产品图片', 'picture', '2', '2', null, '0', '2', '0', '2', '2', null, '1538789600', null, '2');
INSERT INTO `thinkphp_input` VALUES ('50', null, '22', '1', '2', '是否上架', 'shelves', '2', '2', null, '1', '2', '0', '2', '2', null, '1538789625', null, '2');
INSERT INTO `thinkphp_input` VALUES ('51', null, '22', '1', '2', '收藏量', 'collection', '2', '2', null, '200', '2', '0', '2', '2', null, '1538789658', null, '2');
INSERT INTO `thinkphp_input` VALUES ('52', null, '22', '1', '2', '销量', 'sales', '2', '2', null, '200', '2', '0', '2', '2', null, '1538789687', null, '2');
INSERT INTO `thinkphp_input` VALUES ('53', null, '22', '1', '3', '邮费', 'postage', '2', '2', null, '20', '2', '0', '2', '2', null, '1538789727', null, '2');
INSERT INTO `thinkphp_input` VALUES ('54', null, '22', '1', '1', '商品品牌', 'brand', '2', '2', null, '100', '2', '0', '2', '2', null, '1538789758', null, '2');
INSERT INTO `thinkphp_input` VALUES ('55', null, '22', '1', '2', '商家的会员id', 'member_id', '2', '2', null, '225', '2', '0', '2', '2', null, '1538789858', null, '2');
INSERT INTO `thinkphp_input` VALUES ('56', null, '22', '1', '2', '产品状态', 'state', '2', '2', null, '2', '2', '0', '2', '2', null, '1538789944', null, '2');
INSERT INTO `thinkphp_input` VALUES ('57', null, '21', '1', '4', '原图路径', 'original_path', '2', '2', null, '0', '2', '0', '2', '2', null, '1538967252', null, '1');
INSERT INTO `thinkphp_input` VALUES ('58', null, '21', '1', '4', '缩略图路径', 'thumb_path', '2', '2', null, '0', '2', '0', '2', '2', null, '1538967295', null, '1');
INSERT INTO `thinkphp_input` VALUES ('59', null, '21', '1', '4', '水印图路径', 'water_path', '2', '2', null, '0', '2', '0', '2', '2', null, '1538967352', null, '1');
INSERT INTO `thinkphp_input` VALUES ('60', null, '21', '1', '4', '产品参数', 'parameter', '2', '2', null, '0', '2', '0', '2', '2', null, '1538969974', null, '1');
INSERT INTO `thinkphp_input` VALUES ('61', null, '21', '1', '2', '状态', 'state', '2', '2', null, '1', '2', '0', '2', '2', null, '1538970169', null, '1');
INSERT INTO `thinkphp_input` VALUES ('62', null, '21', '1', '2', '分类id', 'classifiy_id', '2', '2', null, '100', '2', '0', '2', '2', null, '1539162929', null, '2');

-- ----------------------------
-- Table structure for thinkphp_input_data
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_input_data`;
CREATE TABLE `thinkphp_input_data` (
  `input_data_id` int(50) NOT NULL AUTO_INCREMENT,
  `data_type_name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`input_data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_input_data
-- ----------------------------
INSERT INTO `thinkphp_input_data` VALUES ('1', '字符', 'varchar', '0');
INSERT INTO `thinkphp_input_data` VALUES ('2', '整数型', 'int', '0');
INSERT INTO `thinkphp_input_data` VALUES ('3', '浮点', 'float', '0');
INSERT INTO `thinkphp_input_data` VALUES ('4', '大字段', 'longtext', '0');

-- ----------------------------
-- Table structure for thinkphp_input_type
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_input_type`;
CREATE TABLE `thinkphp_input_type` (
  `input_type_id` int(50) NOT NULL AUTO_INCREMENT,
  `input_type_name` varchar(100) NOT NULL,
  `parent` int(2) DEFAULT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`input_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_input_type
-- ----------------------------
INSERT INTO `thinkphp_input_type` VALUES ('1', '输入框', null, '0');
INSERT INTO `thinkphp_input_type` VALUES ('2', '多行框', null, '0');
INSERT INTO `thinkphp_input_type` VALUES ('3', '智能口', null, '0');
INSERT INTO `thinkphp_input_type` VALUES ('4', '多选框', '2', '0');
INSERT INTO `thinkphp_input_type` VALUES ('5', '单选框', '2', '0');
INSERT INTO `thinkphp_input_type` VALUES ('6', '下拉框', '2', '0');
INSERT INTO `thinkphp_input_type` VALUES ('7', '上传口', null, '0');
INSERT INTO `thinkphp_input_type` VALUES ('8', '日期框', null, '0');

-- ----------------------------
-- Table structure for thinkphp_left_menu
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_left_menu`;
CREATE TABLE `thinkphp_left_menu` (
  `left_menu_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `menu_name` varchar(50) DEFAULT NULL,
  `left_menu_pid` int(10) DEFAULT NULL,
  `state` varchar(1) DEFAULT NULL,
  `level_id` int(3) DEFAULT NULL,
  `menu_address` varchar(100) DEFAULT NULL,
  `menu_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`left_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_left_menu
-- ----------------------------
INSERT INTO `thinkphp_left_menu` VALUES ('1', '5', '1534918477', '会员管理', '0', '1', '1', '1', '1');
INSERT INTO `thinkphp_left_menu` VALUES ('2', '5', '1534921280', '会员列表', '1', '1', '2', 'member_list', 'admin/Member/member_list');
INSERT INTO `thinkphp_left_menu` VALUES ('3', '5', '1534921502', '会员删除', '1', '1', '3', 'member_del', 'admin/Member/member_del');
INSERT INTO `thinkphp_left_menu` VALUES ('4', '5', '1534921788', '等级管理', '1', '1', '4', 'member_level', 'admin/Member/member_level');
INSERT INTO `thinkphp_left_menu` VALUES ('5', '5', '1534923725', '订单管理', '0', '1', '5', '2', '2');
INSERT INTO `thinkphp_left_menu` VALUES ('6', '5', '1534923794', '订单列表', '5', '1', '6', 'order_list', 'admin/Order/order_list');
INSERT INTO `thinkphp_left_menu` VALUES ('7', '5', '1534924202', '分类管理', '0', '1', '7', '3', '3');
INSERT INTO `thinkphp_left_menu` VALUES ('8', '5', '1534924709', '多级分类', '7', '1', '8', 'cate', 'admin/Cate/cate');
INSERT INTO `thinkphp_left_menu` VALUES ('9', '5', '1534924948', '城市联动', '0', '1', '9', '4', '4');
INSERT INTO `thinkphp_left_menu` VALUES ('10', '5', '1534925054', '三级地区联动', '9', '1', '10', 'city', 'admin/City/city');
INSERT INTO `thinkphp_left_menu` VALUES ('11', '5', '1534925129', '管理员管理', '0', '1', '11', '5', '5');
INSERT INTO `thinkphp_left_menu` VALUES ('12', '5', '1534925395', '管理员列表', '11', '1', '12', 'admin_list', 'admin/Admin/admin_list');
INSERT INTO `thinkphp_left_menu` VALUES ('13', '5', '1534925705', '角色管理', '11', '1', '13', 'admin_role', 'admin/Admin/admin_role');
INSERT INTO `thinkphp_left_menu` VALUES ('14', '5', '1534925816', '权限分类', '11', '1', '14', 'admin_cate', 'admin/Admin/admin_cate');
INSERT INTO `thinkphp_left_menu` VALUES ('15', '5', '1534925898', '权限管理', '11', '1', '15', 'admin_rule', 'admin/Admin/admin_rule');
INSERT INTO `thinkphp_left_menu` VALUES ('16', '5', '1534925967', '系统统计', '0', '1', '16', '6', '6');
INSERT INTO `thinkphp_left_menu` VALUES ('17', '5', '1534926259', '拆线图', '16', '1', '17', 'echarts1', 'admin/Echarts/echarts1');
INSERT INTO `thinkphp_left_menu` VALUES ('18', '5', '1534926489', '柱状图', '16', '1', '18', 'echarts2', 'admin/Echarts/echarts2');
INSERT INTO `thinkphp_left_menu` VALUES ('19', '5', '1534926793', '地图', '16', '1', '19', 'echarts3', 'admin/Echarts/echarts3');
INSERT INTO `thinkphp_left_menu` VALUES ('20', '5', '1534927062', '饼图', '16', '1', '20', 'echarts4', 'admin/Echarts/echarts4');
INSERT INTO `thinkphp_left_menu` VALUES ('21', '5', '1534928043', '雷达图', '16', '1', '21', 'echarts5', 'admin/Echarts/echarts5');
INSERT INTO `thinkphp_left_menu` VALUES ('22', '5', '1535078620', 'k线图', '16', '1', '22', 'echarts6', 'admin/Echarts/echarts6');
INSERT INTO `thinkphp_left_menu` VALUES ('23', '5', '1535078623', '热力图', '16', '1', '23', 'echarts7', 'admin/Echarts/echarts7');
INSERT INTO `thinkphp_left_menu` VALUES ('24', '5', '1535079269', '仪表图', '16', '1', '24', 'echarts8', 'admin/Echarts/echarts8');
INSERT INTO `thinkphp_left_menu` VALUES ('25', '5', '1535081410', '图标字体', '0', '1', '25', '7', '7');
INSERT INTO `thinkphp_left_menu` VALUES ('26', '5', '1535081545', '图标对应字体', '25', '1', '26', 'unicode', 'admin/Unicode/unicode');
INSERT INTO `thinkphp_left_menu` VALUES ('27', '5', '1535081581', '表格设置', '0', '1', '27', '8', '8');
INSERT INTO `thinkphp_left_menu` VALUES ('29', '5', '1535081870', '表格增减', '27', '1', '29', 'table', 'admin/Table/table');
INSERT INTO `thinkphp_left_menu` VALUES ('30', '5', '1535081962', '左侧导航', '0', '1', '30', '9', '9');
INSERT INTO `thinkphp_left_menu` VALUES ('31', '5', '1535081996', '导航增减', '30', '1', '31', 'menu', 'admin/Menu/menu');
INSERT INTO `thinkphp_left_menu` VALUES ('32', '5', '1538190178', '产品管理', '0', '1', '32', '10', '10');
INSERT INTO `thinkphp_left_menu` VALUES ('33', '5', '1538190256', '产品列表', '32', '1', '33', 'product', 'admin/Product/product');
INSERT INTO `thinkphp_left_menu` VALUES ('34', '5', '1538190689', '新闻管理', '0', '1', '34', '11', '11');
INSERT INTO `thinkphp_left_menu` VALUES ('35', '5', '1538190745', '新闻列表', '34', '1', '35', 'new', 'admin/New/new');

-- ----------------------------
-- Table structure for thinkphp_member
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_member`;
CREATE TABLE `thinkphp_member` (
  `member_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_member
-- ----------------------------

-- ----------------------------
-- Table structure for thinkphp_merchants_product
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_merchants_product`;
CREATE TABLE `thinkphp_merchants_product` (
  `merchants_product_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `initial_price` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `market_price` float DEFAULT NULL,
  `details` longtext,
  `specifications` longtext,
  `picture` longtext,
  `shelves` int(1) DEFAULT NULL,
  `collection` int(200) DEFAULT NULL,
  `sales` int(200) DEFAULT NULL,
  `postage` float DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `member_id` int(225) DEFAULT NULL,
  `state` int(2) DEFAULT NULL,
  PRIMARY KEY (`merchants_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_merchants_product
-- ----------------------------

-- ----------------------------
-- Table structure for thinkphp_product
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_product`;
CREATE TABLE `thinkphp_product` (
  `product_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `initial_price` float DEFAULT NULL,
  `sell_price` varchar(20) DEFAULT NULL,
  `market_price` float DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `details` longtext,
  `shelves` int(1) DEFAULT NULL,
  `collection` int(200) DEFAULT NULL,
  `sales` int(200) DEFAULT NULL,
  `postage` float DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `original_path` longtext,
  `thumb_path` longtext,
  `water_path` longtext,
  `parameter` longtext,
  `state` int(1) DEFAULT NULL,
  `classifiy_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_product
-- ----------------------------
INSERT INTO `thinkphp_product` VALUES ('2', '21', '1539163117', '0', '尔特喏', '0', '尔特瓦尔特我认为', '<p>热太热太热<br/></p>', '1', null, '0', '0', '1', '[\"\\/uploads\\/20181010\\/7a51e06b8f9ba84a49ba6ec2193b783b.jpg\",\"\\/uploads\\/20181010\\/014762cf01e0bc0d5005972533b749a8.jpg\",\"\\/uploads\\/20181010\\/076d83972aad415ec32536b16a44d92a.jpg\",\"\\/uploads\\/20181010\\/6b89ae068395b6067718316b1989a531.jpg\",\"\\/uploads\\/20181010\\/93a3392a78284717642d6e3b655b1fed.jpg\",\"\\/uploads\\/20181010\\/59602f6a4507a8ab7ad473d58fad9a4d.jpg\",\"\\/uploads\\/20181010\\/468fc491cb7c277691454397a00093ce.jpg\",\"\\/uploads\\/20181010\\/8f63bca9bfedc7ab77410c4262a9d108.jpg\",\"\\/uploads\\/20181010\\/986bf74049083eb446ebba22977700f9.jpg\",\"\\/uploads\\/20181010\\/3df5c70651d5a0af5364e75907271aef.jpg\",\"\\/uploads\\/20181010\\/feaf980ddb3322710022b311bf420a39.jpg\",\"\\/uploads\\/20181010\\/426e73b005dffb7dce3d6ae7cb83c4ac.jpg\",\"\\/uploads\\/20181010\\/50d98643c1b4434ca7ffa57130616edf.jpg\",\"\\/uploads\\/20181010\\/91fe533aa24f99de294e55de25a4cbd9.jpg\",\"\\/uploads\\/20181010\\/82823f6a2e8e1252d0a40ceff4928678.jpg\",\"\\/uploads\\/20181010\\/d914936125cf112c488100d06e428de6.jpg\",\"\\/uploads\\/20181010\\/f631347a6f72db61c92ca48791d0e9b5.jpg\",\"\\/uploads\\/20181010\\/77da918487535b9f94ad8d5752d0c6f9.jpg\"]', '[\"\\/uploads\\/20181010\\/7a51e06b8f9ba84a49ba6ec2193b783bthumb.png\",\"\\/uploads\\/20181010\\/014762cf01e0bc0d5005972533b749a8thumb.png\",\"\\/uploads\\/20181010\\/076d83972aad415ec32536b16a44d92athumb.png\",\"\\/uploads\\/20181010\\/6b89ae068395b6067718316b1989a531thumb.png\",\"\\/uploads\\/20181010\\/93a3392a78284717642d6e3b655b1fedthumb.png\",\"\\/uploads\\/20181010\\/59602f6a4507a8ab7ad473d58fad9a4dthumb.png\",\"\\/uploads\\/20181010\\/468fc491cb7c277691454397a00093cethumb.png\",\"\\/uploads\\/20181010\\/8f63bca9bfedc7ab77410c4262a9d108thumb.png\",\"\\/uploads\\/20181010\\/986bf74049083eb446ebba22977700f9thumb.png\",\"\\/uploads\\/20181010\\/3df5c70651d5a0af5364e75907271aefthumb.png\",\"\\/uploads\\/20181010\\/feaf980ddb3322710022b311bf420a39thumb.png\",\"\\/uploads\\/20181010\\/426e73b005dffb7dce3d6ae7cb83c4acthumb.png\",\"\\/uploads\\/20181010\\/50d98643c1b4434ca7ffa57130616edfthumb.png\",\"\\/uploads\\/20181010\\/91fe533aa24f99de294e55de25a4cbd9thumb.png\",\"\\/uploads\\/20181010\\/82823f6a2e8e1252d0a40ceff4928678thumb.png\",\"\\/uploads\\/20181010\\/d914936125cf112c488100d06e428de6thumb.png\",\"\\/uploads\\/20181010\\/f631347a6f72db61c92ca48791d0e9b5thumb.png\",\"\\/uploads\\/20181010\\/77da918487535b9f94ad8d5752d0c6f9thumb.png\"]', '[\"\\/uploads\\/20181010\\/7a51e06b8f9ba84a49ba6ec2193b783bwater.png\",\"\\/uploads\\/20181010\\/014762cf01e0bc0d5005972533b749a8water.png\",\"\\/uploads\\/20181010\\/076d83972aad415ec32536b16a44d92awater.png\",\"\\/uploads\\/20181010\\/6b89ae068395b6067718316b1989a531water.png\",\"\\/uploads\\/20181010\\/93a3392a78284717642d6e3b655b1fedwater.png\",\"\\/uploads\\/20181010\\/59602f6a4507a8ab7ad473d58fad9a4dwater.png\",\"\\/uploads\\/20181010\\/468fc491cb7c277691454397a00093cewater.png\",\"\\/uploads\\/20181010\\/8f63bca9bfedc7ab77410c4262a9d108water.png\",\"\\/uploads\\/20181010\\/986bf74049083eb446ebba22977700f9water.png\",\"\\/uploads\\/20181010\\/3df5c70651d5a0af5364e75907271aefwater.png\",\"\\/uploads\\/20181010\\/feaf980ddb3322710022b311bf420a39water.png\",\"\\/uploads\\/20181010\\/426e73b005dffb7dce3d6ae7cb83c4acwater.png\",\"\\/uploads\\/20181010\\/50d98643c1b4434ca7ffa57130616edfwater.png\",\"\\/uploads\\/20181010\\/91fe533aa24f99de294e55de25a4cbd9water.png\",\"\\/uploads\\/20181010\\/82823f6a2e8e1252d0a40ceff4928678water.png\",\"\\/uploads\\/20181010\\/d914936125cf112c488100d06e428de6water.png\",\"\\/uploads\\/20181010\\/f631347a6f72db61c92ca48791d0e9b5water.png\",\"\\/uploads\\/20181010\\/77da918487535b9f94ad8d5752d0c6f9water.png\"]', '{\"color\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"],\"inventory\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"],\"price\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"],\"weight\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"],\"specifications\":[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\"]}', '1', '1');
INSERT INTO `thinkphp_product` VALUES ('3', '21', '1539241384', '0', '第三方', '0', '让他二恶特', '<p>第三方大的沙发<br/></p>', '1', null, '0', '0', '1', '[\"\\/uploads\\/20181011\\/adbe7b0500cc095f53218f053b0a4df6.jpg\",\"\\/uploads\\/20181011\\/42e7a344ab5815881c0296f0c8203720.jpg\",\"\\/uploads\\/20181011\\/a8bb6e5cc1c30a73fb717ef18611de5c.jpg\"]', '[\"\\/uploads\\/20181011\\/adbe7b0500cc095f53218f053b0a4df6thumb.png\",\"\\/uploads\\/20181011\\/42e7a344ab5815881c0296f0c8203720thumb.png\",\"\\/uploads\\/20181011\\/a8bb6e5cc1c30a73fb717ef18611de5cthumb.png\"]', '[\"\\/uploads\\/20181011\\/adbe7b0500cc095f53218f053b0a4df6water.png\",\"\\/uploads\\/20181011\\/42e7a344ab5815881c0296f0c8203720water.png\",\"\\/uploads\\/20181011\\/a8bb6e5cc1c30a73fb717ef18611de5cwater.png\"]', '{\"color\":[\"\\u624b\\u52a8\\u9600\",\"\\u624b\\u52a8\\u9600\",\"1\"],\"inventory\":[\"\\u7b2c\\u4e09\\u65b9\",\"\\u7b2c\\u4e09\\u65b9\",\"3\"],\"price\":[\"\\u4f46\\u662f\",\"\\u4f46\\u662f\",\"5\"],\"weight\":[\"12\",\"\\u53d1\\u591a\\u5c11\",\"6\"],\"specifications\":[\"H\",\"\\u624b\\u52a8\\u9600\",\"8\"]}', '1', '1');

-- ----------------------------
-- Table structure for thinkphp_rights_management
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_rights_management`;
CREATE TABLE `thinkphp_rights_management` (
  `rights_management_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `left_menu_id` int(50) DEFAULT NULL,
  `access_rules` varchar(100) DEFAULT NULL,
  `management_name` varchar(50) DEFAULT NULL,
  `left_menu_zid` varchar(20) DEFAULT NULL,
  `state` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`rights_management_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_rights_management
-- ----------------------------
INSERT INTO `thinkphp_rights_management` VALUES ('2', '17', '1538207919', '1', 'member_list', '会员列表', '2', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('3', '17', '1538207914', '1', 'member_del', '会员删除', '3', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('4', '17', '1538207911', '5', 'order_list', '订单列表', '6', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('5', '17', '1538207908', '1', 'member_level', '会员等级', '4', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('6', '17', '1538207904', '7', 'cate', '分类管理', '8', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('7', '17', '1538207901', '9', 'city', '城市联动', '10', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('8', '17', '1538207898', '11', 'admin_list', '后台管理员列表', '12', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('9', '17', '1538207894', '11', 'admin_role', '后台管理员角色', '13', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('10', '17', '1538207891', '11', 'admin_cate', '权限分类', '14', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('11', '17', '1538207887', '11', 'admin_rule', '权限列表', '15', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('12', '17', '1538207884', '16', 'echarts1', '拆线图', '17', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('13', '17', '1538207871', '16', 'echarts2', '柱状图', '18', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('14', '17', '1538207868', '16', 'echarts3', '地图', '19', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('15', '17', '1538207864', '16', 'echarts4', '饼图', '20', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('16', '17', '1538207859', '16', 'echarts5', '雷达图', '21', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('17', '17', '1538207851', '16', 'echarts6', 'k线图', '22', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('18', '17', '1538207847', '16', 'echarts7', '热力图', '23', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('19', '17', '1538207843', '16', 'echarts8', '仪表图', '24', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('20', '17', '1538207839', '27', 'table', '数据库表设置', '29', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('21', '17', '1538207835', '30', 'menu', '后台导航列表', '31', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('22', '17', '1538207830', '25', 'unicode', '系统图标', '26', '2');
INSERT INTO `thinkphp_rights_management` VALUES ('23', '17', '1538631600', '32', 'product', '产品列表', '33', '2');

-- ----------------------------
-- Table structure for thinkphp_role_management
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_role_management`;
CREATE TABLE `thinkphp_role_management` (
  `role_management_id` int(50) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `rolename` varchar(50) DEFAULT NULL,
  `haverule` varchar(225) DEFAULT NULL,
  `described` varchar(100) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `state` varchar(1) DEFAULT NULL,
  `operation` longtext,
  PRIMARY KEY (`role_management_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_role_management
-- ----------------------------
INSERT INTO `thinkphp_role_management` VALUES ('1', '18', '1538631622', '超级管理员', '{\"left_menu_id\":[\"1\",\"5\",\"7\",\"9\",\"11\",\"16\",\"25\",\"27\",\"30\",\"32\",\"34\"],\"rights_management_id\":[\"2\",\"3\",\"4\",\"6\",\"8\",\"10\",\"12\",\"13\",\"14\",\"15\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"26\",\"29\",\"31\",\"33\"]}', '至高无上权利', '1', '1', '{\"2\":[\"1\",\"2\",\"3\"],\"3\":[\"1\",\"2\",\"3\"],\"4\":[\"1\",\"2\",\"3\"],\"6\":[\"1\",\"2\",\"3\"],\"8\":[\"1\",\"2\",\"3\"],\"10\":[\"1\",\"2\",\"3\"],\"12\":[\"1\",\"2\",\"3\"],\"13\":[\"1\",\"2\",\"3\"],\"14\":[\"1\",\"2\",\"3\"],\"15\":[\"1\",\"2\",\"3\"],\"17\":[\"1\",\"2\",\"3\"],\"18\":[\"1\",\"2\",\"3\"],\"19\":[\"1\",\"2\",\"3\"],\"20\":[\"1\",\"2\",\"3\"],\"21\":[\"1\",\"2\",\"3\"],\"22\":[\"1\",\"2\",\"3\"],\"23\":[\"1\",\"2\",\"3\"],\"24\":[\"1\",\"2\",\"3\"],\"26\":[\"1\",\"2\",\"3\"],\"29\":[\"1\",\"2\",\"3\"],\"31\":[\"1\",\"2\",\"3\"],\"33\":[\"1\",\"2\",\"3\"]}');
INSERT INTO `thinkphp_role_management` VALUES ('3', '18', '1538272779', '订单管理', '{\"left_menu_id\":{\"1\":\"5\",\"3\":\"9\"},\"rights_management_id\":{\"3\":\"6\",\"5\":\"10\"}}', '订单', '8', '1', '{\"6\":[\"1\",\"2\",\"3\"],\"10\":[\"1\",\"2\",\"3\"]}');

-- ----------------------------
-- Table structure for thinkphp_type_classify
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_type_classify`;
CREATE TABLE `thinkphp_type_classify` (
  `type_id` int(225) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) DEFAULT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `state` int(1) DEFAULT NULL,
  `date` int(20) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_type_classify
-- ----------------------------
INSERT INTO `thinkphp_type_classify` VALUES ('1', 'user', '后台管理员', '1', '1534563239');
INSERT INTO `thinkphp_type_classify` VALUES ('18', 'role_management', '角色管理', '1', '1535706870');
INSERT INTO `thinkphp_type_classify` VALUES ('17', 'rights_management', '权限管理', '1', '1535680291');
INSERT INTO `thinkphp_type_classify` VALUES ('5', 'left_menu', '左侧菜单', '1', '1534813911');
INSERT INTO `thinkphp_type_classify` VALUES ('6', 'input', '数据库表单详情', '1', '1534814500');
INSERT INTO `thinkphp_type_classify` VALUES ('7', 'input_data', '表单字符类型', '1', '1534815974');
INSERT INTO `thinkphp_type_classify` VALUES ('8', 'input_type', '表单输入类型', '1', '1534816042');
INSERT INTO `thinkphp_type_classify` VALUES ('19', 'member', '会员表', '1', '1536051309');
INSERT INTO `thinkphp_type_classify` VALUES ('21', 'product', '产品表', '1', '1538632167');
INSERT INTO `thinkphp_type_classify` VALUES ('22', 'merchants_product', '第三方商家入驻产品表', '1', '1538789201');

-- ----------------------------
-- Table structure for thinkphp_user
-- ----------------------------
DROP TABLE IF EXISTS `thinkphp_user`;
CREATE TABLE `thinkphp_user` (
  `user_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(225) DEFAULT NULL,
  `state` int(50) DEFAULT NULL,
  `date` int(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thinkphp_user
-- ----------------------------
INSERT INTO `thinkphp_user` VALUES ('1', 'admin', 'admin', '4c5763803b066291e0b04d20b9cac8e7', '15623315665', 'admin@qq.com', '超级管理员', '1', '1534563239');
INSERT INTO `thinkphp_user` VALUES ('8', '为', '二恶烷', '4c5763803b066291e0b04d20b9cac8e7', '14785236987', 'admin@qq.com', '订单管理', '1', '1534581485');
