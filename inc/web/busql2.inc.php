<?php
$sql = "
CREATE TABLE IF NOT EXISTS `ims_lbsh_anwei` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `order_id` int(11) NOT NULL COMMENT '自己的订单id',
    `order_no` varchar(200) NOT NULL COMMENT '自己订单号',
    `source_order_id` int(11) NOT NULL COMMENT '来源订单id',
    `gua_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '瓜分金额',
    `fy_money` int(11) NULL DEFAULT '0' COMMENT '红包瓜分比例',
    `fy_type` tinyint(1) NULL DEFAULT '0' COMMENT '红包瓜分方式，1按比例，2按金额',
    `fy_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '红包瓜分金额',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `starttime` int(10) NULL DEFAULT '0' COMMENT '有效开始时间',
    `endtime` int(10) NULL DEFAULT '0' COMMENT '过期时间',
    `status` int(11) NULL DEFAULT '1' COMMENT '1待瓜分(以前叫未完成)，2待瓜分(暂无用途)，3已瓜分，4已取消，5已过期(已作废了)',
    `cancel_remark` varchar(500) NULL DEFAULT '' COMMENT '取消描述',
    `red_give_mode` tinyint(1) NULL DEFAULT '0' COMMENT '返红包模式 0还没确定 1返到余额 2返到微信零钱',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_distribution` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `time` int(11) NOT NULL COMMENT '',
    `user_name` varchar(20) NOT NULL COMMENT '',
    `user_tel` varchar(20) NOT NULL COMMENT '',
    `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
    `uniacid` int(11) NOT NULL COMMENT '',
    `form_id` varchar(255) NULL COMMENT '',
    `province` varchar(200) NULL COMMENT '',
    `city` varchar(200) NULL COMMENT '',
    `area` varchar(200) NULL COMMENT '',
    `tp_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级推品佣金',
    `tp_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级推品佣金',
    `is_sys_tp_com` int(4) NULL DEFAULT '1' COMMENT '1 是 2否',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_djgglist` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NULL COMMENT '',
    `gg_id` int(11) NULL COMMENT '',
    `time` int(11) NULL COMMENT '',
    `ip` varchar(50) NULL COMMENT '',
    `uniacid` int(11) NULL COMMENT '',
    `wifi_id` int(11) NULL COMMENT 'wifiid',
    `money` decimal(11,3) NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_dyj` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '',
    `store_id` int(11) NULL DEFAULT '0' COMMENT '商家id',
    `name` varchar(20) NULL COMMENT '打印机名称',
    `dyj_title` varchar(50) NULL COMMENT '头部标题',
    `dyj_id` varchar(50) NULL COMMENT '',
    `dyj_key` varchar(50) NULL COMMENT '',
    `type` int(6) NULL COMMENT '打印机类型',
    `mid` varchar(100) NULL COMMENT '打印机终端号',
    `api` varchar(100) NULL COMMENT '',
    `state` int(6) NULL DEFAULT '2' COMMENT '1开启2关闭',
    `yy_id` varchar(20) NULL COMMENT '',
    `token` varchar(50) NULL COMMENT '打印机终端密钥',
    `fezh` varchar(40) NULL COMMENT '飞鹅云后台注册账号',
    `fe_ukey` varchar(50) NULL COMMENT '飞鹅UKEY',
    `fe_dycode` varchar(20) NULL COMMENT '打印机编号',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_earnings` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `son_id` int(11) NOT NULL COMMENT '下线',
    `money` decimal(13,2) NOT NULL COMMENT '',
    `time` int(11) NOT NULL COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `order` varchar(20) NULL COMMENT '',
    `note` varchar(200) NULL COMMENT '描述',
    `type` int(4) NULL DEFAULT '1' COMMENT '1加 2减',
    `state` int(4) NULL DEFAULT '0' COMMENT '0未知 1代表商品分佣，2代表免疫卡分佣',
    `oid` int(11) NULL DEFAULT '0' COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_express` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `title` varchar(200) NOT NULL COMMENT '标题',
    `express_code` varchar(200) NULL COMMENT '快递标识',
    `express_fee` decimal(9,2) NULL COMMENT '运费',
    `remark` varchar(500) NULL COMMENT '快递描述',
    `sort` int(4) NOT NULL COMMENT '排序',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `addtime` int(10) NOT NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_feedback` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(50) NOT NULL COMMENT '标题',
    `feed` varchar(500) NOT NULL COMMENT '反馈',
    `phone` varchar(500) NOT NULL COMMENT '电话',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `created_time` int(11) NOT NULL COMMENT '',
    `ggid` int(11) NULL COMMENT '广告id',
    `ggzid` int(11) NULL COMMENT '广告主id',
    `state` int(4) NULL DEFAULT '0' COMMENT '0未读  1 已读',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_formids` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `userid` int(11) NOT NULL DEFAULT '0' COMMENT '',
    `form_id` varchar(200) NULL COMMENT '消息内容',
    `type` int(2) NULL DEFAULT '1' COMMENT '1form提交，2支付提交',
    `total_num` int(4) NULL DEFAULT '0' COMMENT '总次数',
    `used_num` int(4) NULL DEFAULT '0' COMMENT '已使用次数',
    `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间',
    `expire_time` int(10) NULL DEFAULT '0' COMMENT '过期时间',
    `isdelete` int(2) NULL DEFAULT '0' COMMENT '是否删除，1代表已删除',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_fxset` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `fx_details` text NOT NULL COMMENT '分销商申请协议',
    `tx_details` text NOT NULL COMMENT '佣金提现协议',
    `is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启',
    `is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否',
    `tx_rate` int(11) NOT NULL COMMENT '提现手续费',
    `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级佣金',
    `commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级佣金',
    `tx_money` int(11) NOT NULL COMMENT '提现门槛',
    `img` varchar(100) NOT NULL COMMENT '',
    `img2` varchar(100) NOT NULL COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭',
    `instructions` text NOT NULL COMMENT '分销商说明',
    `is_type` int(11) NOT NULL DEFAULT '2' COMMENT '',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `updatetime` int(10) NULL DEFAULT '0' COMMENT '',
    `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金',
    `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金',
    `mianyika` decimal(10,2) NULL DEFAULT '0' COMMENT '一级赠送免疫卡',
    `mianyika2` decimal(10,2) NULL DEFAULT '0' COMMENT '二级赠送免疫卡',
    `is_tuipin` int(11) NULL DEFAULT '2' COMMENT '是否开启推荐奖佣金 1.开启 2.不开启',
    `tp_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级推品佣金',
    `tp_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级推品佣金',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_fxuser` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '一级分销',
    `fx_user` int(11) NOT NULL COMMENT '二级分销',
    `time` int(11) NOT NULL COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `form_id` varchar(255) NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_gg` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(200) NULL COMMENT '名称',
    `fbname` varchar(100) NULL COMMENT '发布人',
    `logo` varchar(300) NOT NULL COMMENT '封面图片',
    `src` varchar(300) NOT NULL COMMENT '链接地址',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `created_time` datetime NOT NULL COMMENT '创建时间',
    `orderby` int(4) NOT NULL COMMENT '排序',
    `status` int(4) NOT NULL COMMENT '状态1.启用，2禁用',
    `type` int(11) NOT NULL COMMENT '',
    `store_id` int(11) NOT NULL COMMENT '',
    `appid` varchar(30) NOT NULL COMMENT '',
    `xcx_name` varchar(30) NOT NULL COMMENT '',
    `title` varchar(50) NOT NULL COMMENT '',
    `item` int(11) NOT NULL COMMENT '',
    `start_time` int(11) NULL COMMENT '开始时间',
    `end_time` int(11) NULL COMMENT '结束时间',
    `zclick` int(11) NULL COMMENT '总点击次数',
    `yclick` int(11) NULL COMMENT '已点击次数',
    `money` decimal(11,3) NULL COMMENT '总资产',
    `jftype` int(6) NULL COMMENT '计费模式  按月 按点击',
    `zstype` int(6) NULL COMMENT '展示模式  新闻模式  图片模式 表单模式',
    `ggimg` varchar(500) NULL COMMENT '广告图',
    `ggmoney` decimal(11,3) NULL COMMENT '广告费用',
    `djmoney` decimal(11,3) NULL COMMENT '每点击费用',
    `daymoney` decimal(11,3) NULL COMMENT '每日点击费用',
    `jrmoney` int(11) NULL COMMENT '今日点击次数',
    `news_id` int(11) NULL COMMENT '新闻表id',
    `uptime` int(11) NULL DEFAULT '0' COMMENT '修改时间',
    `phone` varchar(15) NULL COMMENT '',
    `details` text NULL COMMENT '',
    `djtype` int(4) NULL COMMENT '1电话 模式  2表单模式',
    `ggzid` int(11) NULL COMMENT '广告主id',
    `province` varchar(50) NULL COMMENT '',
    `city` varchar(50) NULL COMMENT '',
    `district` varchar(50) NULL COMMENT '',
    `hangye` int(11) NULL DEFAULT '0' COMMENT '',
    `address` varchar(500) NULL COMMENT '',
    `longitude` decimal(50,15) NULL COMMENT '',
    `latitude` decimal(50,15) NULL COMMENT '',
    `fanwei` int(11) NULL DEFAULT '0' COMMENT '',
    `viewcount` int(11) NULL DEFAULT '0' COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告表';
CREATE TABLE IF NOT EXISTS `ims_lbsh_ggusers` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `time` int(11) NOT NULL COMMENT '',
    `user_name` varchar(20) NOT NULL COMMENT '',
    `user_tel` varchar(20) NOT NULL COMMENT '',
    `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
    `uniacid` int(11) NOT NULL COMMENT '',
    `addr` varchar(250) NULL COMMENT '地址',
    `form_id` varchar(255) NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_gzredset` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `lian_title` varchar(500) NULL COMMENT '连接红包标题',
    `lian_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭',
    `lian_img` varchar(100) NULL COMMENT '图片',
    `lian_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额',
    `lian_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额',
    `lian_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数',
    `lian_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小',
    `lian_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大',
    `lian_rule` text NULL COMMENT '规则',
    `ding_title` varchar(500) NULL COMMENT '定时红包标题',
    `ding_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭',
    `ding_img` varchar(100) NULL COMMENT '图片',
    `ding_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额',
    `ding_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额',
    `ding_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数',
    `ding_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小',
    `ding_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大',
    `ding_rule` text NULL COMMENT '规则',
    `ding_changtime` int(11) NULL DEFAULT '0' COMMENT '时间常数',
    `ding_zhitime` int(11) NULL DEFAULT '0' COMMENT '时间指数',
    `lian_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重',
    `ding_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重',
    `lian_daynum` int(11) NULL DEFAULT '0' COMMENT '每日可以领取最多次数',
    `ding_img1` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img2` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img3` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img4` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_beishu` int(11) NULL DEFAULT '1' COMMENT '首次红包倍数',
    `ding_fengding` int(11) NULL DEFAULT '10' COMMENT '首次红包封顶金额',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_gzuser` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间',
    `ts_index` int(4) NULL DEFAULT '0' COMMENT '第几次推送了',
    `ts_lasttime` int(10) NULL DEFAULT '0' COMMENT '最后一次推送时间',
    `ts_starttime` int(10) NULL DEFAULT '0' COMMENT '有效期起始时间',
    `wxapp_openid` varchar(255) NULL COMMENT '微信公众号的Openid',
    `wxappid` int(11) NULL COMMENT '微信公众号的id',
    `gz_time` int(10) NULL DEFAULT '0' COMMENT '关注公众号的时间',
    `gz_views` int(11) NULL DEFAULT '0' COMMENT '扫码公众号的数量',
    `wifi_userid` int(11) NULL DEFAULT '0' COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_gzuser_views` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间',
    `wifiid` int(11) NULL DEFAULT '0' COMMENT 'wifiid',
    `wxappid` int(11) NULL DEFAULT '0' COMMENT '公众号id',
    `userid` int(11) NULL DEFAULT '0' COMMENT '用户ID',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_gzwxapp` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `status` int(2) NULL COMMENT '状态，1开启，2关闭',
    `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间',
    `img` varchar(255) NULL COMMENT '生成的二维码图片',
    `appid` varchar(255) NULL COMMENT '公众号appid',
    `appsecret` varchar(255) NULL COMMENT '公众号appsecret',
    `appgh` varchar(255) NULL COMMENT '原始ID',
    `appname` varchar(255) NULL COMMENT '公众号名称',
    `access_token` varchar(255) NULL COMMENT 'access_token',
    `token_expire` int(10) NULL COMMENT 'token过期时间',
    `menu` text NULL COMMENT '自定义菜单数据',
    `update_time` int(10) NULL COMMENT '修改时间',
    `click_event` text NULL COMMENT '',
    `gh1` int(11) NULL DEFAULT '0' COMMENT '第一次的时间间隔',
    `gh2` int(11) NULL DEFAULT '0' COMMENT '第二次的时间间隔',
    `gh3` int(11) NULL DEFAULT '0' COMMENT '第三次的时间间隔',
    `gh4` int(11) NULL DEFAULT '0' COMMENT '第四次的时间间隔',
    `gh5` int(11) NULL DEFAULT '0' COMMENT '第五次的时间间隔',
    `gh6` int(11) NULL DEFAULT '0' COMMENT '第六次的时间间隔',
    `gc1` text NULL COMMENT '第一次的推送内容',
    `gc2` text NULL COMMENT '第二次的推送内容',
    `gc3` text NULL COMMENT '第三次的推送内容',
    `gc4` text NULL COMMENT '第四次的推送内容',
    `gc5` text NULL COMMENT '第五次的推送内容',
    `gc6` text NULL COMMENT '第六次的推送内容',
    `gz_users` int(11) NULL DEFAULT '0' COMMENT '关注公众号的用户数量',
    `gz_views` int(11) NULL DEFAULT '0' COMMENT '扫码公众号的数量',
    `realname` varchar(255) NULL COMMENT '联系人姓名',
    `utel` varchar(255) NULL COMMENT '联系电话',
    `is_yz` int(4) NULL DEFAULT '0' COMMENT '是否接入，0未接入，1已接入',
    `wx_token` varchar(500) NULL COMMENT '微信公众号的Token',
    `wx_encodingaeskey` varchar(500) NULL COMMENT '微信公众号的EncodingAESKey',
    `sf_status` int(4) NULL DEFAULT '2' COMMENT '第三方是否开启',
    `sf_url` varchar(255) NULL COMMENT '第三方网址',
    `sf_token` varchar(255) NULL COMMENT '第三方的Token',
    `sf_name` varchar(255) NULL COMMENT '第三方的名称',
    `sf_uptime` int(10) NULL DEFAULT '0' COMMENT '修改第三方时间',
    `gz_type` int(4) NULL DEFAULT '1' COMMENT '公众号类型，1服务号，2订阅号',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_hangye` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `title` varchar(200) NOT NULL COMMENT '标题',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `dateline` int(10) NOT NULL DEFAULT '0' COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_help` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `question` varchar(200) NOT NULL COMMENT '标题',
    `answer` text NOT NULL COMMENT '回答',
    `sort` int(4) NOT NULL COMMENT '排序',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `created_time` datetime NOT NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_notice` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `title` varchar(200) NOT NULL COMMENT '标题',
    `content` text NOT NULL COMMENT '公告内容',
    `sort` int(4) NOT NULL COMMENT '排序',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `created_at` datetime NOT NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_hexiao` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `store_id` int(11) NOT NULL COMMENT '',
    `time` int(11) NOT NULL COMMENT '时间',
    `uniacid` int(11) NOT NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_homeblock` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) unsigned NOT NULL COMMENT '',
    `name` varchar(255) NULL DEFAULT '' COMMENT '模块名称',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `img` varchar(500) NULL DEFAULT '' COMMENT '',
    `type` int(4) NULL DEFAULT '1' COMMENT '1 已选 2  未选',
    `orderby` int(11) NULL DEFAULT '99' COMMENT '',
    `url` varchar(255) NULL DEFAULT '' COMMENT '链接',
    `mark` varchar(100) NULL DEFAULT '' COMMENT '标示符',
    `px` int(6) NULL DEFAULT '2' COMMENT '隐藏排序',
    `cat_id` int(11) NULL DEFAULT '0' COMMENT '商品分类id',
    `goodslist` int(6) NULL DEFAULT '2' COMMENT '商品展示模式',
    `goodsnum` int(11) NULL DEFAULT '6' COMMENT '商品显示数量',
    `state` int(4) NULL DEFAULT '1' COMMENT '1显示 2隐藏',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_homenav` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(30) NOT NULL COMMENT '',
    `img` varchar(255) NULL COMMENT '',
    `img2` varchar(255) NULL COMMENT '横幅图片',
    `orderby` int(11) NULL DEFAULT '99' COMMENT '',
    `url` varchar(255) NULL COMMENT '网页跳转',
    `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序',
    `uniacid` int(11) NOT NULL COMMENT '',
    `appid` varchar(50) NULL COMMENT '',
    `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是',
    `url1` varchar(255) NULL COMMENT '站内跳转',
    `vice_name` varchar(30) NULL COMMENT '副标题',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_lunbo` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(30) NOT NULL COMMENT '',
    `img` varchar(255) NULL COMMENT '',
    `img2` varchar(255) NULL COMMENT '灰色图标',
    `orderby` int(11) NULL DEFAULT '99' COMMENT '',
    `url` varchar(255) NULL COMMENT '网页跳转',
    `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序4点击事件',
    `uniacid` int(11) NOT NULL COMMENT '',
    `appid` varchar(50) NULL COMMENT '',
    `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是',
    `url1` varchar(255) NULL COMMENT '站内跳转',
    `zswz` int(4) NULL DEFAULT '1' COMMENT '展示位置',
    `sj` varchar(255) NULL DEFAULT '' COMMENT '点击事件',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_menu` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(30) NOT NULL COMMENT '',
    `img` varchar(255) NULL COMMENT '',
    `img2` varchar(255) NULL COMMENT '灰色图标',
    `orderby` int(11) NULL DEFAULT '99' COMMENT '',
    `url` varchar(255) NULL COMMENT '网页跳转',
    `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序',
    `uniacid` int(11) NOT NULL COMMENT '',
    `appid` varchar(50) NULL COMMENT '',
    `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是',
    `url1` varchar(255) NULL COMMENT '站内跳转',
    `vice_name` varchar(30) NULL COMMENT '副标题',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_mykgoods` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NULL DEFAULT '0' COMMENT '',
    `name` varchar(255) NOT NULL COMMENT '商品名称',
    `buynum` int(11) NULL DEFAULT '0' COMMENT '数量',
    `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品单价',
    `detail` text NOT NULL COMMENT '商品详情，图文',
    `status` smallint(6) unsigned NOT NULL DEFAULT '2' COMMENT '上架状态 1代表上架，2代表下架 3代表已删除 ',
    `sort` int(11) unsigned NULL DEFAULT '99' COMMENT '商品排序 升序',
    `virtual_sales` int(11) unsigned NULL DEFAULT '0' COMMENT '虚拟销量',
    `cover_pic` longtext NULL COMMENT '商品缩略图',
    `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
    `goods_num` int(11) NULL DEFAULT '0' COMMENT '商品总库存',
    `uptime` int(10) NULL DEFAULT '0' COMMENT '',
    `zvirtual_sales` int(11) NULL DEFAULT '0' COMMENT '真实销量',
    `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金',
    `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金',
    `is_sys_g_com` int(4) NULL DEFAULT '2' COMMENT '1 是 2否',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_mykmx` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `num` int(11) NOT NULL COMMENT '',
    `type` int(11) NOT NULL COMMENT '1.加2减',
    `note` varchar(20) NOT NULL COMMENT '备注',
    `time` varchar(20) NOT NULL COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `state` int(11) NULL DEFAULT '0' COMMENT '1代表成为合伙人后系统赠送的、2代表合伙人充值的、3代表后台充值的、其它',
    `desc` varchar(500) NULL DEFAULT '' COMMENT '描述',
    `uniacid` int(11) NULL DEFAULT '0' COMMENT '',
    `form_id` varchar(255) NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_mykorder` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `goods_id` int(11) NOT NULL COMMENT '',
    `user_id` int(11) NULL DEFAULT '0' COMMENT '',
    `form_id` varchar(500) NULL COMMENT '',
    `prepay_id` varchar(500) NULL COMMENT '',
    `orderno` varchar(50) NULL COMMENT '订单号',
    `status` int(4) NULL DEFAULT '0' COMMENT '待付款1，已支付已完成2',
    `name` varchar(255) NOT NULL COMMENT '',
    `img` varchar(300) NOT NULL COMMENT '',
    `number` int(11) NOT NULL COMMENT '',
    `yue` decimal(11,2) NULL DEFAULT '0.00' COMMENT '',
    `money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '',
    `pay_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '',
    `is_pay` int(2) NULL DEFAULT '0' COMMENT '是否支付了，0代表未支付，1代表支付',
    `pay_time` int(10) NULL DEFAULT '0' COMMENT '支付时间',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `complete_time` int(10) NULL DEFAULT '0' COMMENT '',
    `note` varchar(500) NULL DEFAULT '' COMMENT '',
    `is_group` int(2) NULL DEFAULT '0' COMMENT '0 单买',
    `zffs` int(2) NULL DEFAULT '0' COMMENT '支付方式 1微信支付，2余额+微信支付',
    `tradeno` varchar(50) NULL COMMENT '',
    `agent1` int(11) NULL DEFAULT '0' COMMENT '一级合伙人id',
    `agent2` int(11) NULL DEFAULT '0' COMMENT '二级合伙人id',
    `agent_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级合伙人佣金',
    `agent_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级合伙人佣金',
    `agent_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `agent_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingaddress` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `name` varchar(255) NOT NULL COMMENT '',
    `mobile` varchar(20) NULL COMMENT '',
    `province_id` int(11) NULL COMMENT '',
    `province` varchar(255) NULL COMMENT '',
    `city_id` int(11) NULL COMMENT '',
    `city` varchar(255) NULL COMMENT '',
    `district_id` int(11) NULL COMMENT '',
    `district` varchar(255) NULL COMMENT '',
    `detail` varchar(1000) NULL COMMENT '',
    `is_default` smallint(1) NULL DEFAULT '1' COMMENT '2默认地址',
    `addtime` int(11) NULL COMMENT '',
    `is_delete` smallint(6) NULL DEFAULT '1' COMMENT '',
    `longitude` varchar(255) NULL COMMENT '',
    `latitude` varchar(255) NULL COMMENT '',
    `addr` varchar(500) NULL COMMENT '',
    `shopname` varchar(500) NULL COMMENT '',
    `state` varchar(10) NULL DEFAULT '1' COMMENT '1 kaiqi',
    `uniacid` int(11) NULL COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingdings` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `storeid` int(11) NOT NULL COMMENT '',
    `quid` int(11) NOT NULL COMMENT '',
    `name` varchar(255) NULL COMMENT '',
    `code` varchar(500) NULL COMMENT '',
    `dateline` int(10) NULL DEFAULT '0' COMMENT '',
    `sort` int(11) NULL DEFAULT '99' COMMENT '',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pinggoods` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NULL DEFAULT '0' COMMENT '',
    `store_id` int(11) NOT NULL DEFAULT '0' COMMENT '门店ID',
    `name` varchar(255) NOT NULL COMMENT '商品名称',
    `original_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品原价',
    `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '团购价',
    `detail` longtext NOT NULL COMMENT '商品详情，图文',
    `cat_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类',
    `goods_type` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '商品专区，1普通商品，2新人专区',
    `status` smallint(6) unsigned NOT NULL DEFAULT '2' COMMENT '上架状态 1代表上架，2代表下架 3代表已删除 ',
    `grouptime` int(11) NOT NULL DEFAULT '0' COMMENT '拼团时间/小时',
    `attr` longtext NOT NULL COMMENT '规格的库存及价格',
    `sort` int(11) unsigned NULL DEFAULT '99' COMMENT '商品排序 升序',
    `virtual_sales` int(11) unsigned NULL DEFAULT '0' COMMENT '虚拟销量',
    `cover_pic` longtext NULL COMMENT '商品缩略图',
    `unit` varchar(255) NOT NULL DEFAULT '件' COMMENT '单位',
    `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
    `group_num` int(11) unsigned NOT NULL DEFAULT '2' COMMENT '商品成团数',
    `gua_num` int(11) NULL DEFAULT '1' COMMENT '瓜分人数',
    `is_hot` smallint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖 0代表热卖1代表不是 ',
    `limit_time` int(11) unsigned NULL DEFAULT '0' COMMENT '拼团限时 结束时间',
    `is_only` smallint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否允许单独购买',
    `is_more` smallint(1) unsigned NULL DEFAULT '1' COMMENT '是否允许多件购买',
    `buy_limit` int(11) unsigned NULL DEFAULT '0' COMMENT '限购数量',
    `type` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '商品类型 1代表送货上门，2代表到店自提，3代表全部支持 ',
    `one_buy_limit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '单次限购数量',
    `goods_num` int(11) NULL DEFAULT '0' COMMENT '商品总库存',
    `goods_pic` longtext NULL COMMENT '商品图片',
    `start_time` int(10) NULL DEFAULT '0' COMMENT '拼团限时 开始时间',
    `uptime` int(10) NULL DEFAULT '0' COMMENT '',
    `up_username` varchar(200) NULL COMMENT '',
    `fname` varchar(255) NULL COMMENT '副标题',
    `goumai` longtext NOT NULL COMMENT '购买须知',
    `is_miaosha` int(2) NULL DEFAULT '1' COMMENT '是否秒杀,1是，2否',
    `spec` text NULL COMMENT '规格',
    `zvirtual_sales` int(11) NULL DEFAULT '0' COMMENT '真实销量',
    `xupinglun` text NULL COMMENT '虚拟评论',
    `xian_price` decimal(10,2) NULL DEFAULT '0.00' COMMENT '现价',
    `fy_money` int(11) NULL DEFAULT '0' COMMENT '红包瓜分比例',
    `fy_type` tinyint(1) NULL DEFAULT '1' COMMENT '红包瓜分方式，1按比例，2按金额',
    `fy_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '红包瓜分金额',
    `is_shouye` int(4) NULL DEFAULT '2' COMMENT '1是 2 否',
    `is_fanbei` int(4) NULL DEFAULT '2' COMMENT '1翻倍 2 不翻倍',
    `is_suiji` int(4) NULL DEFAULT '1' COMMENT '1 随机 2固定',
    `yunfei` decimal(10,2) NULL DEFAULT '0.00' COMMENT '运费',
    `is_yunfei` int(4) NULL DEFAULT '1' COMMENT '1开启运费  2 包邮',
    `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金',
    `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金',
    `bz_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中一级商品佣金',
    `bz_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中二级商品佣金',
    `one_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级分销佣金',
    `two_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级分销佣金',
    `bz_one_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中一级分销佣金',
    `bz_two_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中二级分销佣金',
    `is_sys_g_com` int(4) NULL DEFAULT '2' COMMENT '是否开启合伙人 1 是 2否',
    `is_fx` int(4) NULL DEFAULT '2' COMMENT '是否开启分销 1 是 2否',
    `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价',
    `tuipin_uid` int(11) NULL DEFAULT '0' COMMENT '推品人ID',
    `tz_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '团长分佣金额',
    `video_url` varchar(255) NULL COMMENT '商品视频url',
    `source_url` varchar(255) NULL COMMENT '来源url',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pinggoods_info` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NULL DEFAULT '0' COMMENT '',
    `goods_id` int(11) NULL DEFAULT '0' COMMENT '商品id',
    `auto_kaituan` int(4) NULL DEFAULT '2' COMMENT '是否自动开团 1开启 2关闭',
    `created_at` int(10) NULL DEFAULT '0' COMMENT '创建时间',
    `updated_at` int(10) NULL DEFAULT '0' COMMENT '修改时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pinggoodstype` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(255) NOT NULL COMMENT '',
    `pic_url` longblob NOT NULL COMMENT '',
    `sort` int(11) NOT NULL DEFAULT '99' COMMENT '排序',
    `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '小程序id',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `status` tinyint(1) NULL DEFAULT '1' COMMENT '是否开启 1是 2否',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='积分商城分类';
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingorder` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `store_id` int(11) NULL DEFAULT '0' COMMENT '门店id',
    `user_id` int(11) NULL DEFAULT '0' COMMENT '',
    `addr_id` int(11) NULL DEFAULT '0' COMMENT '',
    `form_id` varchar(500) NULL COMMENT '',
    `prepay_id` varchar(500) NULL COMMENT '',
    `orderno` varchar(50) NULL COMMENT '订单号',
    `status` int(4) NULL DEFAULT '0' COMMENT '待付款1，待配送2，待自提3，待收货4，已完成5，售后6，已取消7',
    `money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '',
    `pay_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '',
    `is_pay` int(2) NULL DEFAULT '0' COMMENT '是否支付了，0代表未支付，1代表支付',
    `pay_time` int(10) NULL DEFAULT '0' COMMENT '支付时间',
    `ps_time` int(10) NULL DEFAULT '0' COMMENT '配送时间',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `complete_time` int(10) NULL DEFAULT '0' COMMENT '',
    `cancel_time` int(10) NULL DEFAULT '0' COMMENT '取消订单时间',
    `note` varchar(500) NULL DEFAULT '' COMMENT '',
    `realname` varchar(200) NULL DEFAULT '' COMMENT '收货人',
    `mobile` varchar(50) NULL COMMENT '手机号码',
    `address` varchar(500) NULL COMMENT '收货地址',
    `longitude` varchar(255) NULL COMMENT '',
    `latitude` varchar(255) NULL COMMENT '',
    `is_group` int(2) NULL DEFAULT '0' COMMENT '0 团购 1拼团',
    `parent_id` int(11) NULL DEFAULT '0' COMMENT '团长id',
    `is_success` int(2) NULL DEFAULT '0' COMMENT '0 未成团 1已成团',
    `success_time` int(10) NULL DEFAULT '0' COMMENT '成团时间',
    `pt_status` int(2) NULL DEFAULT '1' COMMENT '拼团状态 1代表待付款，2代表拼团中，3代表拼团成功，4代表拼团失败 ',
    `shfs` int(2) NULL DEFAULT '0' COMMENT '收货方式，1代表送货上门，2代表到店自提',
    `zffs` int(2) NULL DEFAULT '0' COMMENT '支付方式 1微信支付，2余额+微信支付',
    `tradeno` varchar(50) NULL COMMENT '',
    `freight` double(13,2) NULL DEFAULT '0.00' COMMENT '运费',
    `shtj_cont` varchar(500) NULL COMMENT '售后提交内容',
    `shtj_time` int(10) NULL DEFAULT '0' COMMENT '售后提交时间',
    `shfk_status` int(2) NULL DEFAULT '0' COMMENT '售后反馈结果',
    `shfk_cont` varchar(500) NULL COMMENT '售后反馈内容',
    `shfk_time` int(10) NULL DEFAULT '0' COMMENT '售后反馈时间',
    `pt_money` double(13,2) NULL DEFAULT '0.00' COMMENT '平台抽取掉的费用',
    `tuan_id` int(11) NULL DEFAULT '0' COMMENT '团长id',
    `quzhang` int(11) NULL DEFAULT '0' COMMENT '跨区商家区长id',
    `tuan_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '区长佣金',
    `quzhang_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '跨区商家区长佣金',
    `agent1` int(11) NULL DEFAULT '0' COMMENT '一级代理id',
    `agent2` int(11) NULL DEFAULT '0' COMMENT '二级代理id',
    `agent_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级代理佣金',
    `agent_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级代理佣金',
    `buytype` int(11) NULL DEFAULT '1' COMMENT '购买方式，1拼团购买，2单独购买',
    `isgua` int(4) NULL DEFAULT '2' COMMENT '是否有瓜分的，1代表有瓜分的，2代表没有瓜分的',
    `gua_status` int(4) NULL DEFAULT '2' COMMENT '是否瓜分了，2代表未瓜分，1代表瓜分了',
    `gua_money` decimal(11,2) NULL DEFAULT '0.00' COMMENT '瓜分金额',
    `gua_expire` int(10) NULL DEFAULT '0' COMMENT '瓜分的过期时间',
    `is_tuikuan` int(4) NULL DEFAULT '2' COMMENT '是否退款，对于需要退款的才有效，2代表未退款，1代表已退款',
    `yue` decimal(11,2) NULL DEFAULT '0.00' COMMENT '',
    `is_jqr` int(4) NULL DEFAULT '2' COMMENT '是否是机器人下单的，1代表是，2代表否',
    `express_status` int(4) NULL DEFAULT '1' COMMENT '是否选择快递，1是，2否',
    `express_id` int(11) NULL DEFAULT '0' COMMENT '快递id',
    `express_no` varchar(100) NULL COMMENT '快递单号',
    `express_remark` varchar(500) NULL COMMENT '商家留言',
    `is_myk` int(3) NULL DEFAULT '2' COMMENT '1使用了免疫卡  2没使用',
    `tan_myk` int(3) NULL DEFAULT '2' COMMENT '1弹过免疫卡说明  2没弹过',
    `myknum` int(11) NULL DEFAULT '0' COMMENT '免疫卡张数',
    `is_run` int(4) NULL DEFAULT '0' COMMENT '合伙人是否分佣，0代表未 1代表已分',
    `song_myk` int(4) NULL DEFAULT '2' COMMENT '是否有领取免疫卡的，1代表有领取的，2代表没有领取的',
    `myk_status` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `myk_num` int(10) NULL COMMENT '领取免疫卡的数量',
    `myk_expire` int(10) NULL DEFAULT '0' COMMENT '领取免疫卡的过期时间',
    `agent_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `agent_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价',
    `is_mantui` int(4) NULL DEFAULT '2' COMMENT '该订单，是否是满退订单 2代表不是 1代表是',
    `tui_status` int(4) NULL DEFAULT '0' COMMENT '退款状态 默认0 1代表退款成功 2代表退款失败',
    `tui_isread` int(4) NULL DEFAULT '2' COMMENT '读取状态 1已读  2未读',
    `tui_note` varchar(200) NULL COMMENT '退款原因',
    `tp_user1` int(11) NULL DEFAULT '0' COMMENT '一级推品人id',
    `tp_user2` int(11) NULL DEFAULT '0' COMMENT '二级推品人id',
    `tp_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级推品人佣金',
    `tp_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级推品人佣金',
    `tp_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `tp_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了',
    `version` int(3) NULL DEFAULT '1' COMMENT '版本号，默认是1，新的版本也会不断的加，做兼容',
    `refund_id` varchar(50) NULL COMMENT '',
    `red_mode` tinyint(1) NULL DEFAULT '1' COMMENT '红包返佣模式 1订单验收 2拼团完成',
    `is_new_user` int(2) NULL DEFAULT '0' COMMENT '是否新人专区 0否 1是',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingorder_info` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `order_id` int(11) NOT NULL COMMENT '订单ID',
    `store_user_id` int(11) NULL DEFAULT '0' COMMENT '门店核销人员用户id',
    `store_return_money` decimal(13,2) NULL DEFAULT '0' COMMENT '店铺抽佣金额',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单拓展表';
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingordergoods` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `order_id` int(11) NOT NULL COMMENT '',
    `goods_id` int(11) NOT NULL COMMENT '',
    `goods_type` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '商品专区，1普通商品，2新人专区',
    `img` varchar(300) NOT NULL COMMENT '',
    `number` int(11) NOT NULL COMMENT '',
    `name` varchar(255) NOT NULL COMMENT '',
    `money` decimal(13,2) NOT NULL COMMENT '',
    `spec` varchar(255) NULL COMMENT '',
    `group_num` int(11) NULL DEFAULT '0' COMMENT '商品成团数',
    `grouptime` int(11) NULL DEFAULT '0' COMMENT '拼团时间/小时',
    `shichang` decimal(13,2) NOT NULL COMMENT '',
    `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价',
    `tz_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '团长分佣金额',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingset` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `status` int(2) NULL DEFAULT '1' COMMENT '',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `pattern` int(4) NULL DEFAULT '2' COMMENT '1 单小区  2多小区',
    `default` int(11) NULL DEFAULT '0' COMMENT '默认显示的小区',
    `goods_typenav` int(4) NULL DEFAULT '1' COMMENT '1开启商品分类导航 2关闭',
    `is_recruit` int(4) NULL DEFAULT '1' COMMENT '1开启 2关闭',
    `uptime` int(10) NULL COMMENT '',
    `quggimg` varchar(255) NULL COMMENT '区长招募广告图片',
    `quggbgimg` varchar(255) NULL COMMENT '产品分享背景图',
    `detail_img` varchar(255) NULL COMMENT '产品详情页价格模块背景图片',
    `ptrule` text NULL COMMENT '拼团规则',
    `balance` int(4) NULL DEFAULT '2' COMMENT '1开启 2关闭',
    `ys_time` int(11) NULL DEFAULT '0' COMMENT '自动验收时间',
    `gb_time` int(11) NULL DEFAULT '0' COMMENT '自动关闭时间',
    `storebgimg` varchar(255) NULL COMMENT '商家分享背景图',
    `ps_type` int(4) NULL DEFAULT '1' COMMENT '配送方式 1 商家配送 2区长配送',
    `tklx` tinyint(1) NULL DEFAULT '1' COMMENT '订单退款路线 1原路退回 2退款到余额',
    `tq_type` int(4) NULL DEFAULT '1' COMMENT '提取方式 1 商家处提取 2区长处提取',
    `yunfei` decimal(11,2) NULL DEFAULT '0.00' COMMENT '运费',
    `gua_hour` int(10) NULL DEFAULT '0' COMMENT '瓜分过期时间',
    `gua_bili` decimal(11,2) NULL DEFAULT '0.00' COMMENT '瓜分比例',
    `myk_hour` int(10) NULL DEFAULT '0' COMMENT '瓜分免疫卡过期时间',
    `red_mode` tinyint(1) NULL DEFAULT '1' COMMENT '红包返佣模式 1订单验收 2拼团完成',
    `red_give_mode` tinyint(1) NULL DEFAULT '1' COMMENT '返红包模式 1返到余额 2返到微信零钱',
    `red_min_money` decimal(10,2) NULL DEFAULT '1' COMMENT '返微信最低返金额，默认1，大部分企业付款到微信零钱功能是1元',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_pingspec` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `name` varchar(100) NOT NULL COMMENT '规格名称',
    `spec_items` varchar(1000) NOT NULL COMMENT '规格属性',
    `sort` int(11) NOT NULL DEFAULT '99' COMMENT '排序',
    `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1开启，2关闭',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_plugin` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `title` varchar(200) NOT NULL COMMENT '插件标识符',
    `addtime` int(10) NULL COMMENT '添加时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_qbmx` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `money` decimal(11,2) NOT NULL COMMENT '',
    `type` int(11) NOT NULL COMMENT '1.加2减',
    `note` varchar(20) NOT NULL COMMENT '备注',
    `time` varchar(20) NOT NULL COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `item_id` int(11) NULL DEFAULT '0' COMMENT '相关id',
    `state` int(11) NULL DEFAULT '10' COMMENT '1后台充值，2前台充值，3不中退款，4合伙人佣金，5红包补贴，6用户提现，7不中退款，8购买商品（余额支付），9新用户红包，10其它，11团长收益，12会员分销一级，13会员分销二级，14商家分成',
    `desc` varchar(500) NULL DEFAULT '' COMMENT '描述',
    `uniacid` int(11) NULL DEFAULT '0' COMMENT '',
    `source_uid` int(11) NULL DEFAULT '0' COMMENT '给自己带来收益的用户id',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_redlog` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `redmoney` decimal(10,2) NULL COMMENT '红包金额',
    `redtype` int(2) NOT NULL COMMENT '红包类型，1连接红包，2定时红包',
    `userid` int(11) NOT NULL COMMENT '用户ID',
    `remark` varchar(500) NULL COMMENT '描述',
    `addtime` int(10) NOT NULL COMMENT '领取时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_redset` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `lian_title` varchar(500) NULL COMMENT '连接红包标题',
    `lian_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭',
    `lian_img` varchar(100) NULL COMMENT '图片',
    `lian_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额',
    `lian_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额',
    `lian_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数',
    `lian_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小',
    `lian_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大',
    `lian_rule` text NULL COMMENT '规则',
    `ding_title` varchar(500) NULL COMMENT '定时红包标题',
    `ding_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭',
    `ding_img` varchar(100) NULL COMMENT '图片',
    `ding_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额',
    `ding_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额',
    `ding_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数',
    `ding_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小',
    `ding_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大',
    `ding_rule` text NULL COMMENT '规则',
    `ding_changtime` int(11) NULL DEFAULT '0' COMMENT '时间常数',
    `ding_zhitime` int(11) NULL DEFAULT '0' COMMENT '时间指数',
    `lian_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重',
    `ding_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重',
    `lian_daynum` int(11) NULL DEFAULT '0' COMMENT '每日可以领取最多次数',
    `ding_img1` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img2` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img3` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_img4` varchar(500) NULL DEFAULT '' COMMENT '红包图片',
    `ding_beishu` int(11) NULL DEFAULT '1' COMMENT '首次红包倍数',
    `ding_fengding` int(11) NULL DEFAULT '10' COMMENT '首次红包封顶金额',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_sms` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `tid` varchar(100) NOT NULL COMMENT '提现模板ID',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `yy_tid` varchar(50) NOT NULL COMMENT '代理商审核模板ID',
    `dm_tid` varchar(50) NOT NULL COMMENT 'WIFI入驻成功模板ID',
    `pt_cg` varchar(50) NULL DEFAULT '' COMMENT '拼团成功模板',
    `pt_sb` varchar(50) NULL DEFAULT '' COMMENT '拼团失败模板',
    `order_zf` varchar(50) NULL DEFAULT '' COMMENT '订单支付成功模板',
    `order_state` varchar(50) NULL DEFAULT '' COMMENT '订单状态变动模板',
    `msg_tid` varchar(50) NULL COMMENT '新的商品通知模板ID',
    `qxdd_tid` varchar(50) NULL COMMENT '取消订单通知模板ID',
    `updated_at` int(10) NULL DEFAULT '0' COMMENT '更新时间',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_store` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `uniacid` int(11) NOT NULL COMMENT '',
    `store_name` varchar(255) NULL COMMENT '商家名称',
    `store_logo` varchar(255) NULL COMMENT '',
    `store_wx` varchar(20) NULL COMMENT '',
    `store_tel` varchar(20) NULL COMMENT '',
    `miaoshu` varchar(500) NULL COMMENT '描述',
    `address` varchar(500) NULL COMMENT '',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `pt_bili` decimal(5,2) NULL DEFAULT '0' COMMENT '商家抽佣比例，默认0%',
    `longitude` decimal(50,15) DEFAULT '0.000000000000000',
    `latitude` decimal(50,15) DEFAULT '0.000000000000000',
    `version` int(3) NULL DEFAULT '1' COMMENT '版本号，默认是1，新的版本也会不断的加，做兼容',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_system` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `appid` varchar(100) NOT NULL COMMENT 'appid',
    `appsecret` varchar(200) NOT NULL COMMENT 'appsecret',
    `link` varchar(200) NOT NULL COMMENT '网址',
    `mchid` varchar(20) NOT NULL COMMENT '商户号',
    `wxkey` varchar(100) NOT NULL COMMENT '商户秘钥',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `url_name` varchar(20) NOT NULL COMMENT '网址名称',
    `details` text NOT NULL COMMENT '关于我们',
    `url_logo` varchar(100) NOT NULL COMMENT '网址logo',
    `bq_name` varchar(50) NOT NULL COMMENT '版权名称',
    `link_name` varchar(30) NOT NULL COMMENT '网站名称',
    `link_logo` varchar(100) NOT NULL COMMENT '网站logo',
    `more` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `default_store` int(11) NOT NULL COMMENT '默认门店id',
    `support` varchar(20) NOT NULL COMMENT '技术支持',
    `bq_logo` varchar(100) NOT NULL COMMENT '',
    `color` varchar(20) NOT NULL COMMENT '',
    `map_key` varchar(100) NOT NULL COMMENT '腾讯地图key',
    `tz_appid` varchar(30) NOT NULL COMMENT '',
    `tz_name` varchar(30) NOT NULL COMMENT '',
    `pt_name` varchar(30) NOT NULL COMMENT '平台名称',
    `dada_key` varchar(50) NOT NULL COMMENT '',
    `dada_secret` varchar(50) NOT NULL COMMENT '',
    `apiclient_cert` text NOT NULL COMMENT '',
    `apiclient_key` text NOT NULL COMMENT '',
    `day` int(11) NOT NULL COMMENT '天数',
    `username` varchar(20) NOT NULL COMMENT '邮箱用户名',
    `password` varchar(50) NOT NULL COMMENT '邮箱密码',
    `type` varchar(10) NOT NULL COMMENT '邮箱类型',
    `sender` varchar(50) NOT NULL COMMENT '发件人名称',
    `signature` varchar(200) NOT NULL COMMENT '邮件签名',
    `is_email` int(11) NOT NULL COMMENT '1开启  2关闭',
    `tx_money` decimal(10,2) NOT NULL COMMENT '最低提现金额',
    `tx_rate` int(11) NOT NULL COMMENT '手续费',
    `tx_details` text NOT NULL COMMENT '提现详情',
    `tel` varchar(20) NOT NULL COMMENT '平台电话',
    `dc_name` varchar(20) NOT NULL COMMENT '',
    `wm_name` varchar(20) NOT NULL COMMENT '',
    `yd_name` varchar(20) NOT NULL COMMENT '',
    `typeset` tinyint(1) NULL DEFAULT '2' COMMENT '移动端展示商家信息 1是 2否',
    `integral` int(11) NOT NULL COMMENT '评论得积分',
    `cjwt` text NOT NULL COMMENT '',
    `rzxy` text NOT NULL COMMENT '',
    `is_ruzhu` int(11) NOT NULL COMMENT '1.开启2关闭',
    `is_yue` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `integral2` int(11) NOT NULL COMMENT '',
    `is_jf` int(11) NOT NULL DEFAULT '1' COMMENT '1开启2关闭',
    `is_jfpay` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `jf_proportion` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `is_zfb` int(11) NOT NULL DEFAULT '2' COMMENT '',
    `is_yhk` int(11) NOT NULL DEFAULT '1' COMMENT '团队默认 1合伙人 2会员分销 默认1',
    `is_wx` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `ip` varchar(30) NOT NULL COMMENT '',
    `jfgn` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `fxgn` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `msgn` int(11) NOT NULL DEFAULT '1' COMMENT '',
    `is_img` int(11) NOT NULL DEFAULT '2' COMMENT '',
    `is_psxx` int(11) NOT NULL DEFAULT '2' COMMENT '',
    `kfw_appid` varchar(30) NOT NULL COMMENT '',
    `kfw_appsecret` varchar(50) NOT NULL COMMENT '',
    `usertx_money` decimal(10,2) NULL COMMENT '',
    `usertx_rate` int(11) NULL COMMENT '',
    `usertx_details` text NULL COMMENT '',
    `wfms` varchar(500) NULL COMMENT 'wifi描述',
    `is_ggruzhu` int(11) NULL DEFAULT '2' COMMENT '是否开启提现审核  1 开启 2关闭',
    `is_zhanshi` int(11) NULL DEFAULT '1' COMMENT '1 开启广告展示  2 关闭',
    `ggrzxy` text NULL COMMENT '入驻须知',
    `ggcjwt` text NULL COMMENT '平台优势',
    `ggsy` varchar(11) NULL COMMENT '广告收益',
    `ggtx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低提现金额',
    `txservice` decimal(10,2) NULL DEFAULT '0.00' COMMENT '提现手续费',
    `txagreement` text NULL COMMENT '提现协议',
    `is_txggsy` int(4) NULL DEFAULT '2' COMMENT '1 开启 2关闭  首页',
    `is_txggl` int(4) NULL DEFAULT '2' COMMENT '1开启 2关闭  流',
    `txgg_id` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现免审核金额',
    `is_newregion` int(4) NULL DEFAULT '1' COMMENT '1开启 2关闭',
    `is_video` int(4) NULL DEFAULT '2' COMMENT '1开启新闻展示  2关闭',
    `addtime` int(10) NULL DEFAULT '0' COMMENT '',
    `wifihomeimg` varchar(255) NULL COMMENT 'WIFI封面图',
    `updatetime` int(10) NULL DEFAULT '0' COMMENT '',
    `is_hongbao` int(4) NULL DEFAULT '2' COMMENT '1开启红包底部广告 2关闭',
    `is_ptgg` int(4) NULL DEFAULT '2' COMMENT '1开启拼团列表页轮播图2关闭',
    `onetx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '首次最低提现金额',
    `is_dingshi` int(3) NULL DEFAULT '2' COMMENT '1开启  2关闭',
    `goodslist` int(6) NULL DEFAULT '2' COMMENT '商品显示列数',
    `specification` text NULL COMMENT '活动规格',
    `gr_img` varchar(500) NULL COMMENT 'gr_img',
    `goodslabel` text NULL COMMENT '热门搜索标签',
    `color2` varchar(20) NULL COMMENT '',
    `iskf` int(4) NULL DEFAULT '1' COMMENT '0关闭 1开启  客服消息',
    `push_hour` int(11) NULL DEFAULT '0' COMMENT '商品推送的时间间隔',
    `myk` int(4) NULL DEFAULT '2' COMMENT '1开启免疫卡',
    `myklq` decimal(10,2) NULL DEFAULT '0.00' COMMENT '免疫卡领取条件',
    `mykdetails` text NULL COMMENT '免疫卡说明',
    `jxsm` varchar(100) NULL DEFAULT '安慰奖' COMMENT '奖项说明',
    `buymyk` int(4) NULL DEFAULT '2' COMMENT '1开启购买免疫卡',
    `buymykyj1` decimal(10,2) NULL DEFAULT '0.00' COMMENT '购买免疫卡一级佣金',
    `buymykyj2` decimal(10,2) NULL DEFAULT '0.00' COMMENT '购买免疫卡二级佣金',
    `buymykdetails` text NULL COMMENT '购买免疫卡说明',
    `myk_status` int(4) NULL DEFAULT '2' COMMENT '是否开启免疫卡功能，2代表关闭，1代表开启',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_tx` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `user_id` int(11) NOT NULL COMMENT '',
    `type` int(11) NOT NULL COMMENT '1.支付宝 2.微信零钱 3.微信二维码',
    `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝',
    `time` int(11) NOT NULL COMMENT '申请时间',
    `sh_time` int(11) NOT NULL COMMENT '审核时间',
    `uniacid` int(11) NOT NULL COMMENT '',
    `user_name` varchar(20) NOT NULL COMMENT '',
    `account` varchar(100) NOT NULL COMMENT '',
    `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额',
    `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额',
    `form_id` varchar(255) NULL COMMENT '',
    `qr_pay` varchar(255) NULL COMMENT '',
    `user_tel` varchar(20) NULL COMMENT '联系方式',
    `real_name` varchar(20) NULL COMMENT '真实姓名',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_user` ( 
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '',
    `name` varchar(1000) NULL DEFAULT '' COMMENT '',
    `join_time` int(11) NOT NULL COMMENT '',
    `img` varchar(1000) NULL DEFAULT '' COMMENT '',
    `openid` varchar(200) NOT NULL COMMENT '',
    `uniacid` varchar(50) NOT NULL COMMENT '',
    `user_name` varchar(50) NOT NULL COMMENT '收货人姓名',
    `user_tel` varchar(50) NOT NULL COMMENT '收货人电话',
    `user_address` varchar(100) NOT NULL COMMENT '收货人地址',
    `total_score` int(11) NOT NULL COMMENT '',
    `wallet` decimal(10,2) NULL DEFAULT '0.00' COMMENT '',
    `commission` decimal(10,2) NOT NULL COMMENT '',
    `day` int(11) NOT NULL COMMENT '',
    `order_money` decimal(10,2) NOT NULL COMMENT '',
    `order_number` int(11) NOT NULL COMMENT '',
    `dailiyongji` decimal(10,2) NULL DEFAULT '0.00' COMMENT '代理佣金',
    `jifen` int(11) NULL DEFAULT '0' COMMENT '积分',
    `vip` int(11) NULL DEFAULT '0' COMMENT '会员等级',
    `kljifen` int(11) NULL DEFAULT '0' COMMENT '可领积分',
    `daydingnum` int(11) NULL DEFAULT '0' COMMENT '今天定时红包领取次数',
    `uptime` int(11) NULL DEFAULT '0' COMMENT '修改时间',
    `isfirst` int(11) NULL DEFAULT '0' COMMENT '是否第一次领取定时红包',
    `isfirst_tx` int(4) NULL DEFAULT '1' COMMENT '1首次提现 2不是',
    `is_jiqi` int(4) NULL DEFAULT '1' COMMENT '1不是  2是',
    `pt_num` int(11) NULL DEFAULT '0' COMMENT '拼团次数',
    `push_lasttime` int(10) NULL DEFAULT '0' COMMENT '最后一次推送时间',
    `isfirst_gz` int(4) NULL DEFAULT '2' COMMENT '1首次关注 2不是',
    `myknum` int(11) NULL DEFAULT '0' COMMENT '免疫卡张数',
    `user_code` varchar(100) NULL COMMENT '用户唯一标识',
    `xxcount` int(11) NULL DEFAULT '0' COMMENT '下线数量',
    `level_id` int(4) NULL DEFAULT '1' COMMENT '等级id，0普通会员，1初级会员，2高级会员，3合伙人，默认0',
    `one_num` int(10) DEFAULT '0' COMMENT '直推有效人数',
    `two_num` int(10) DEFAULT '0' COMMENT '间推有效人数',
    `tui_num` int(10) DEFAULT '0' COMMENT '直推+间推有效人数',
    `total_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '累计佣金',
    `one_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '直推累计佣金',
    `two_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '间推累计佣金',
    `is_buy` tinyint(1) NULL DEFAULT '0' COMMENT '是否有效用户/是否购买了 0.无效 1有效',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE IF NOT EXISTS `ims_lbsh_hexiao` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `time` int(11) NOT NULL COMMENT '时间',
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `ims_lbsh_user_fxset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '分销状态 1.开启2关闭',
  `one_condition` tinyint(1) NULL DEFAULT '2' COMMENT '初级会员升级条件 1.无条件 2完成一次购买',
  `two_condition_is_buy` tinyint(1) NULL DEFAULT '1' COMMENT '高级会员升级条件 是否需要完成购买 1.需要 2不需要',
  `two_condition_persion` int(11) NULL DEFAULT '0' COMMENT '高级会员升级条件 直推/人',
  `desc` text NULL COMMENT '团队说明',
  `created_at` int(10) DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员分销设置表';
CREATE TABLE IF NOT EXISTS `ims_lbsh_user_fxuser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '上级uid',
  `fx_user` int(11) NOT NULL COMMENT '下级uid',
  `layer` int(4) DEFAULT '1' COMMENT '第几级关系了，默认1顶级用户',
  `relation` text COMMENT '关系链，从顶级推荐人到自己上一级的uid，逗号分割',
  `is_buy` tinyint(1) NULL DEFAULT '0' COMMENT '是否有效用户/是否购买了 0.无效 1有效',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_fxuser_user_id` (`user_id`) USING BTREE,
  KEY `user_fxuser_user` (`fx_user`) USING BTREE,
  KEY `user_fxuser_layer` (`layer`) USING BTREE,
  FULLTEXT KEY `user_fxuser_relation` (`relation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员分销上下级关系表';
";

pdo_run($sql);
pdo_query("ALTER TABLE " . tablename('lbsh_user') . " CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

if (!pdo_fieldexists('lbsh_anwei', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_anwei', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_anwei', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_anwei', 'order_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `order_id` int(11) NOT NULL COMMENT '自己的订单id';");
}
if (!pdo_fieldexists('lbsh_anwei', 'order_no')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `order_no` varchar(200) NOT NULL COMMENT '自己订单号';");
}
if (!pdo_fieldexists('lbsh_anwei', 'source_order_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `source_order_id` int(11) NOT NULL COMMENT '来源订单id';");
}
if (!pdo_fieldexists('lbsh_anwei', 'gua_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `gua_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '瓜分金额';");
}
if (!pdo_fieldexists('lbsh_anwei', 'fy_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `fy_money` int(11) NULL DEFAULT '0' COMMENT '红包瓜分比例';");
}
if (!pdo_fieldexists('lbsh_anwei', 'fy_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `fy_type` tinyint(1) NULL DEFAULT '0' COMMENT '红包瓜分方式，1按比例，2按金额';");
}
if (!pdo_fieldexists('lbsh_anwei', 'fy_money_val')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `fy_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '红包瓜分金额';");
}

if (!pdo_fieldexists('lbsh_anwei', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_anwei', 'starttime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `starttime` int(10) NULL DEFAULT '0' COMMENT '有效开始时间';");
}
if (!pdo_fieldexists('lbsh_anwei', 'endtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `endtime` int(10) NULL DEFAULT '0' COMMENT '过期时间';");
}
if (!pdo_fieldexists('lbsh_anwei', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `status` int(11) NULL DEFAULT '1' COMMENT '1待瓜分(以前叫未完成)，2待瓜分(暂无用途)，3已瓜分，4已取消，5已过期(已作废了)';");
}
if (!pdo_fieldexists('lbsh_anwei', 'cancel_remark')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `cancel_remark` varchar(500) NULL DEFAULT '' COMMENT '取消描述';");
}
if (!pdo_fieldexists('lbsh_anwei', 'red_give_mode')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_anwei') . " ADD `red_give_mode` tinyint(1) NULL DEFAULT '0' COMMENT '返红包模式 0还没确定 1返到余额 2返到微信零钱';");
}

if (!pdo_fieldexists('lbsh_distribution', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'user_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `user_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'user_tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `user_tel` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝';");
}
if (!pdo_fieldexists('lbsh_distribution', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `form_id` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'province')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `province` varchar(200) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'city')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `city` varchar(200) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'area')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `area` varchar(200) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_distribution', 'tp_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `tp_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级推品佣金';");
}
if (!pdo_fieldexists('lbsh_distribution', 'tp_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `tp_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级推品佣金';");
}
if (!pdo_fieldexists('lbsh_distribution', 'is_sys_tp_com')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_distribution') . " ADD `is_sys_tp_com` int(4) NULL DEFAULT '1' COMMENT '1 是 2否';");
}

if (!pdo_fieldexists('lbsh_djgglist', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `user_id` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'gg_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `gg_id` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `time` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'ip')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `ip` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `uniacid` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'wifi_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `wifi_id` int(11) NULL COMMENT 'wifiid';");
}
if (!pdo_fieldexists('lbsh_djgglist', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_djgglist') . " ADD `money` decimal(11,3) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_dyj', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'store_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `store_id` int(11) NULL DEFAULT '0' COMMENT '商家id';");
}
if (!pdo_fieldexists('lbsh_dyj', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `name` varchar(20) NULL COMMENT '打印机名称';");
}
if (!pdo_fieldexists('lbsh_dyj', 'dyj_title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `dyj_title` varchar(50) NULL COMMENT '头部标题';");
}
if (!pdo_fieldexists('lbsh_dyj', 'dyj_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `dyj_id` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'dyj_key')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `dyj_key` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `type` int(6) NULL COMMENT '打印机类型';");
}
if (!pdo_fieldexists('lbsh_dyj', 'mid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `mid` varchar(100) NULL COMMENT '打印机终端号';");
}
if (!pdo_fieldexists('lbsh_dyj', 'api')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `api` varchar(100) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `state` int(6) NULL DEFAULT '2' COMMENT '1开启2关闭';");
}
if (!pdo_fieldexists('lbsh_dyj', 'yy_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `yy_id` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_dyj', 'token')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `token` varchar(50) NULL COMMENT '打印机终端密钥';");
}
if (!pdo_fieldexists('lbsh_dyj', 'fezh')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `fezh` varchar(40) NULL COMMENT '飞鹅云后台注册账号';");
}
if (!pdo_fieldexists('lbsh_dyj', 'fe_ukey')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `fe_ukey` varchar(50) NULL COMMENT '飞鹅UKEY';");
}
if (!pdo_fieldexists('lbsh_dyj', 'fe_dycode')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_dyj') . " ADD `fe_dycode` varchar(20) NULL COMMENT '打印机编号';");
}

if (!pdo_fieldexists('lbsh_earnings', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'son_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `son_id` int(11) NOT NULL COMMENT '下线';");
}
if (!pdo_fieldexists('lbsh_earnings', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `money` decimal(13,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'order')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `order` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_earnings', 'note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `note` varchar(200) NULL COMMENT '描述';");
}
if (!pdo_fieldexists('lbsh_earnings', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `type` int(4) NULL DEFAULT '1' COMMENT '1加 2减';");
}
if (!pdo_fieldexists('lbsh_earnings', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `state` int(4) NULL DEFAULT '0' COMMENT '0未知 1代表商品分佣，2代表免疫卡分佣';");
}
if (!pdo_fieldexists('lbsh_earnings', 'oid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_earnings') . " ADD `oid` int(11) NULL DEFAULT '0' COMMENT '';");
}

if (!pdo_fieldexists('lbsh_express', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_express', 'title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `title` varchar(200) NOT NULL COMMENT '标题';");
}
if (!pdo_fieldexists('lbsh_express', 'express_code')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `express_code` varchar(200) NULL COMMENT '快递标识';");
}
if (!pdo_fieldexists('lbsh_express', 'express_fee')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `express_fee` decimal(9,2) NULL COMMENT '运费';");
}
if (!pdo_fieldexists('lbsh_express', 'remark')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `remark` varchar(500) NULL COMMENT '快递描述';");
}
if (!pdo_fieldexists('lbsh_express', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_express', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_express', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_express') . " ADD `addtime` int(10) NOT NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_feedback', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_feedback', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `name` varchar(50) NOT NULL COMMENT '标题';");
}
if (!pdo_fieldexists('lbsh_feedback', 'feed')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `feed` varchar(500) NOT NULL COMMENT '反馈';");
}
if (!pdo_fieldexists('lbsh_feedback', 'phone')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `phone` varchar(500) NOT NULL COMMENT '电话';");
}
if (!pdo_fieldexists('lbsh_feedback', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_feedback', 'created_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `created_time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_feedback', 'ggid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `ggid` int(11) NULL COMMENT '广告id';");
}
if (!pdo_fieldexists('lbsh_feedback', 'ggzid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `ggzid` int(11) NULL COMMENT '广告主id';");
}
if (!pdo_fieldexists('lbsh_feedback', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_feedback') . " ADD `state` int(4) NULL DEFAULT '0' COMMENT '0未读  1 已读';");
}

if (!pdo_fieldexists('lbsh_formids', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_formids', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_formids', 'userid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `userid` int(11) NOT NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_formids', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `form_id` varchar(200) NULL COMMENT '消息内容';");
}
if (!pdo_fieldexists('lbsh_formids', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `type` int(2) NULL DEFAULT '1' COMMENT '1form提交，2支付提交';");
}
if (!pdo_fieldexists('lbsh_formids', 'total_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `total_num` int(4) NULL DEFAULT '0' COMMENT '总次数';");
}
if (!pdo_fieldexists('lbsh_formids', 'used_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `used_num` int(4) NULL DEFAULT '0' COMMENT '已使用次数';");
}
if (!pdo_fieldexists('lbsh_formids', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_formids', 'expire_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `expire_time` int(10) NULL DEFAULT '0' COMMENT '过期时间';");
}
if (!pdo_fieldexists('lbsh_formids', 'isdelete')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_formids') . " ADD `isdelete` int(2) NULL DEFAULT '0' COMMENT '是否删除，1代表已删除';");
}

if (!pdo_fieldexists('lbsh_fxset', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'fx_details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `fx_details` text NOT NULL COMMENT '分销商申请协议';");
}
if (!pdo_fieldexists('lbsh_fxset', 'tx_details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `tx_details` text NOT NULL COMMENT '佣金提现协议';");
}
if (!pdo_fieldexists('lbsh_fxset', 'is_fx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `is_fx` int(11) NOT NULL COMMENT '1.开启分销审核2.不开启';");
}
if (!pdo_fieldexists('lbsh_fxset', 'is_ej')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `is_ej` int(11) NOT NULL COMMENT '是否开启二级分销1.是2.否';");
}
if (!pdo_fieldexists('lbsh_fxset', 'tx_rate')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `tx_rate` int(11) NOT NULL COMMENT '提现手续费';");
}
if (!pdo_fieldexists('lbsh_fxset', 'commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级佣金';");
}
if (!pdo_fieldexists('lbsh_fxset', 'commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级佣金';");
}
if (!pdo_fieldexists('lbsh_fxset', 'tx_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `tx_money` int(11) NOT NULL COMMENT '提现门槛';");
}
if (!pdo_fieldexists('lbsh_fxset', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `img` varchar(100) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `img2` varchar(100) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'is_open')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `is_open` int(11) NOT NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_fxset', 'instructions')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `instructions` text NOT NULL COMMENT '分销商说明';");
}
if (!pdo_fieldexists('lbsh_fxset', 'is_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `is_type` int(11) NOT NULL DEFAULT '2' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'updatetime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `updatetime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxset', 'g_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金';");
}
if (!pdo_fieldexists('lbsh_fxset', 'g_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金';");
}
if (!pdo_fieldexists('lbsh_fxset', 'mianyika')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `mianyika` decimal(10,2) NULL DEFAULT '0' COMMENT '一级赠送免疫卡';");
}
if (!pdo_fieldexists('lbsh_fxset', 'mianyika2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `mianyika2` decimal(10,2) NULL DEFAULT '0' COMMENT '二级赠送免疫卡';");
}
pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " MODIFY COLUMN `mianyika` decimal(10,2) NULL DEFAULT '0' COMMENT '一级赠送免疫卡';");
pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " MODIFY COLUMN `mianyika2` decimal(10,2) NULL DEFAULT '0' COMMENT '二级赠送免疫卡';");

if (!pdo_fieldexists('lbsh_fxset', 'is_tuipin')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `is_tuipin` int(11) NULL DEFAULT '2' COMMENT '是否开启推荐奖佣金 1.开启 2.不开启';");
}
if (!pdo_fieldexists('lbsh_fxset', 'tp_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `tp_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级推品佣金';");
}
if (!pdo_fieldexists('lbsh_fxset', 'tp_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxset') . " ADD `tp_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级推品佣金';");
}

if (!pdo_fieldexists('lbsh_fxuser', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxuser', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `user_id` int(11) NOT NULL COMMENT '一级分销';");
}
if (!pdo_fieldexists('lbsh_fxuser', 'fx_user')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `fx_user` int(11) NOT NULL COMMENT '二级分销';");
}
if (!pdo_fieldexists('lbsh_fxuser', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxuser', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_fxuser', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_fxuser') . " ADD `form_id` varchar(255) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_gg', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `name` varchar(200) NULL COMMENT '名称';");
}
if (!pdo_fieldexists('lbsh_gg', 'fbname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `fbname` varchar(100) NULL COMMENT '发布人';");
}
if (!pdo_fieldexists('lbsh_gg', 'logo')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `logo` varchar(300) NOT NULL COMMENT '封面图片';");
}
if (!pdo_fieldexists('lbsh_gg', 'src')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `src` varchar(300) NOT NULL COMMENT '链接地址';");
}
if (!pdo_fieldexists('lbsh_gg', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'created_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `created_time` datetime NOT NULL COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_gg', 'orderby')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `orderby` int(4) NOT NULL COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_gg', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `status` int(4) NOT NULL COMMENT '状态1.启用，2禁用';");
}
if (!pdo_fieldexists('lbsh_gg', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `type` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'store_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `store_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `appid` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'xcx_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `xcx_name` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `title` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'item')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `item` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'start_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `start_time` int(11) NULL COMMENT '开始时间';");
}
if (!pdo_fieldexists('lbsh_gg', 'end_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `end_time` int(11) NULL COMMENT '结束时间';");
}
if (!pdo_fieldexists('lbsh_gg', 'zclick')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `zclick` int(11) NULL COMMENT '总点击次数';");
}
if (!pdo_fieldexists('lbsh_gg', 'yclick')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `yclick` int(11) NULL COMMENT '已点击次数';");
}
if (!pdo_fieldexists('lbsh_gg', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `money` decimal(11,3) NULL COMMENT '总资产';");
}
if (!pdo_fieldexists('lbsh_gg', 'jftype')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `jftype` int(6) NULL COMMENT '计费模式  按月 按点击';");
}
if (!pdo_fieldexists('lbsh_gg', 'zstype')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `zstype` int(6) NULL COMMENT '展示模式  新闻模式  图片模式 表单模式';");
}
if (!pdo_fieldexists('lbsh_gg', 'ggimg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `ggimg` varchar(500) NULL COMMENT '广告图';");
}
if (!pdo_fieldexists('lbsh_gg', 'ggmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `ggmoney` decimal(11,3) NULL COMMENT '广告费用';");
}
if (!pdo_fieldexists('lbsh_gg', 'djmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `djmoney` decimal(11,3) NULL COMMENT '每点击费用';");
}
if (!pdo_fieldexists('lbsh_gg', 'daymoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `daymoney` decimal(11,3) NULL COMMENT '每日点击费用';");
}
if (!pdo_fieldexists('lbsh_gg', 'jrmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `jrmoney` int(11) NULL COMMENT '今日点击次数';");
}
if (!pdo_fieldexists('lbsh_gg', 'news_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `news_id` int(11) NULL COMMENT '新闻表id';");
}
if (!pdo_fieldexists('lbsh_gg', 'uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `uptime` int(11) NULL DEFAULT '0' COMMENT '修改时间';");
}
if (!pdo_fieldexists('lbsh_gg', 'phone')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `phone` varchar(15) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `details` text NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'djtype')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `djtype` int(4) NULL COMMENT '1电话 模式  2表单模式';");
}
if (!pdo_fieldexists('lbsh_gg', 'ggzid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `ggzid` int(11) NULL COMMENT '广告主id';");
}
if (!pdo_fieldexists('lbsh_gg', 'province')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `province` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'city')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `city` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'district')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `district` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'hangye')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `hangye` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'address')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `address` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'longitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `longitude` decimal(50,15) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'latitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `latitude` decimal(50,15) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'fanwei')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `fanwei` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gg', 'viewcount')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gg') . " ADD `viewcount` int(11) NULL DEFAULT '0' COMMENT '';");
}

if (!pdo_fieldexists('lbsh_ggusers', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'user_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `user_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'user_tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `user_tel` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'addr')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `addr` varchar(250) NULL COMMENT '地址';");
}
if (!pdo_fieldexists('lbsh_ggusers', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_ggusers') . " ADD `form_id` varchar(255) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_gzredset', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_title` varchar(500) NULL COMMENT '连接红包标题';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_img` varchar(100) NULL COMMENT '图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_summoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_yimoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_yipeople')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_minbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_maxbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_rule')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_rule` text NULL COMMENT '规则';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_title` varchar(500) NULL COMMENT '定时红包标题';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_img` varchar(100) NULL COMMENT '图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_summoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_yimoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_yipeople')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_minbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_maxbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_rule')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_rule` text NULL COMMENT '规则';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_changtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_changtime` int(11) NULL DEFAULT '0' COMMENT '时间常数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_zhitime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_zhitime` int(11) NULL DEFAULT '0' COMMENT '时间指数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_quanzhong')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_quanzhong')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'lian_daynum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `lian_daynum` int(11) NULL DEFAULT '0' COMMENT '每日可以领取最多次数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_img1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_img1` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_img2` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_img3')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_img3` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_img4')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_img4` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_beishu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_beishu` int(11) NULL DEFAULT '1' COMMENT '首次红包倍数';");
}
if (!pdo_fieldexists('lbsh_gzredset', 'ding_fengding')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzredset') . " ADD `ding_fengding` int(11) NULL DEFAULT '10' COMMENT '首次红包封顶金额';");
}

if (!pdo_fieldexists('lbsh_gzuser', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'ts_index')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `ts_index` int(4) NULL DEFAULT '0' COMMENT '第几次推送了';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'ts_lasttime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `ts_lasttime` int(10) NULL DEFAULT '0' COMMENT '最后一次推送时间';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'ts_starttime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `ts_starttime` int(10) NULL DEFAULT '0' COMMENT '有效期起始时间';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'wxapp_openid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `wxapp_openid` varchar(255) NULL COMMENT '微信公众号的Openid';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'wxappid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `wxappid` int(11) NULL COMMENT '微信公众号的id';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'gz_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `gz_time` int(10) NULL DEFAULT '0' COMMENT '关注公众号的时间';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'gz_views')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `gz_views` int(11) NULL DEFAULT '0' COMMENT '扫码公众号的数量';");
}
if (!pdo_fieldexists('lbsh_gzuser', 'wifi_userid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser') . " ADD `wifi_userid` int(11) NULL DEFAULT '0' COMMENT '';");
}

if (!pdo_fieldexists('lbsh_gzuser_views', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzuser_views', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzuser_views', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_gzuser_views', 'wifiid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `wifiid` int(11) NULL DEFAULT '0' COMMENT 'wifiid';");
}
if (!pdo_fieldexists('lbsh_gzuser_views', 'wxappid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `wxappid` int(11) NULL DEFAULT '0' COMMENT '公众号id';");
}
if (!pdo_fieldexists('lbsh_gzuser_views', 'userid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzuser_views') . " ADD `userid` int(11) NULL DEFAULT '0' COMMENT '用户ID';");
}

if (!pdo_fieldexists('lbsh_gzwxapp', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `status` int(2) NULL COMMENT '状态，1开启，2关闭';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `dateline` int(10) NULL DEFAULT '0' COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `img` varchar(255) NULL COMMENT '生成的二维码图片';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `appid` varchar(255) NULL COMMENT '公众号appid';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'appsecret')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `appsecret` varchar(255) NULL COMMENT '公众号appsecret';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'appgh')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `appgh` varchar(255) NULL COMMENT '原始ID';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'appname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `appname` varchar(255) NULL COMMENT '公众号名称';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'access_token')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `access_token` varchar(255) NULL COMMENT 'access_token';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'token_expire')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `token_expire` int(10) NULL COMMENT 'token过期时间';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'menu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `menu` text NULL COMMENT '自定义菜单数据';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'update_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `update_time` int(10) NULL COMMENT '修改时间';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'click_event')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `click_event` text NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh1` int(11) NULL DEFAULT '0' COMMENT '第一次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh2` int(11) NULL DEFAULT '0' COMMENT '第二次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh3')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh3` int(11) NULL DEFAULT '0' COMMENT '第三次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh4')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh4` int(11) NULL DEFAULT '0' COMMENT '第四次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh5')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh5` int(11) NULL DEFAULT '0' COMMENT '第五次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gh6')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gh6` int(11) NULL DEFAULT '0' COMMENT '第六次的时间间隔';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc1` text NULL COMMENT '第一次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc2` text NULL COMMENT '第二次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc3')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc3` text NULL COMMENT '第三次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc4')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc4` text NULL COMMENT '第四次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc5')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc5` text NULL COMMENT '第五次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gc6')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gc6` text NULL COMMENT '第六次的推送内容';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gz_users')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gz_users` int(11) NULL DEFAULT '0' COMMENT '关注公众号的用户数量';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gz_views')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gz_views` int(11) NULL DEFAULT '0' COMMENT '扫码公众号的数量';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'realname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `realname` varchar(255) NULL COMMENT '联系人姓名';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'utel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `utel` varchar(255) NULL COMMENT '联系电话';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'is_yz')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `is_yz` int(4) NULL DEFAULT '0' COMMENT '是否接入，0未接入，1已接入';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'wx_token')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `wx_token` varchar(500) NULL COMMENT '微信公众号的Token';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'wx_encodingaeskey')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `wx_encodingaeskey` varchar(500) NULL COMMENT '微信公众号的EncodingAESKey';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'sf_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `sf_status` int(4) NULL DEFAULT '2' COMMENT '第三方是否开启';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'sf_url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `sf_url` varchar(255) NULL COMMENT '第三方网址';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'sf_token')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `sf_token` varchar(255) NULL COMMENT '第三方的Token';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'sf_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `sf_name` varchar(255) NULL COMMENT '第三方的名称';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'sf_uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `sf_uptime` int(10) NULL DEFAULT '0' COMMENT '修改第三方时间';");
}
if (!pdo_fieldexists('lbsh_gzwxapp', 'gz_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_gzwxapp') . " ADD `gz_type` int(4) NULL DEFAULT '1' COMMENT '公众号类型，1服务号，2订阅号';");
}

if (!pdo_fieldexists('lbsh_hangye', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hangye') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_hangye', 'title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hangye') . " ADD `title` varchar(200) NOT NULL COMMENT '标题';");
}
if (!pdo_fieldexists('lbsh_hangye', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hangye') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_hangye', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hangye') . " ADD `dateline` int(10) NOT NULL DEFAULT '0' COMMENT '';");
}

if (!pdo_fieldexists('lbsh_help', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_help', 'question')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `question` varchar(200) NOT NULL COMMENT '标题';");
}
if (!pdo_fieldexists('lbsh_help', 'answer')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `answer` text NOT NULL COMMENT '回答';");
}
if (!pdo_fieldexists('lbsh_help', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_help', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_help', 'created_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_help') . " ADD `created_time` datetime NOT NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_notice', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_notice', 'title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `title` varchar(200) NOT NULL COMMENT '标题';");
}
if (!pdo_fieldexists('lbsh_notice', 'content')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `content` text NOT NULL COMMENT '公告内容';");
}
if (!pdo_fieldexists('lbsh_notice', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `sort` int(4) NOT NULL COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_notice', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_notice', 'created_at')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_notice') . " ADD `created_at` datetime NOT NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_hexiao', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hexiao') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_hexiao', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hexiao') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_hexiao', 'store_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hexiao') . " ADD `store_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_hexiao', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hexiao') . " ADD `time` int(11) NOT NULL COMMENT '时间';");
}
if (!pdo_fieldexists('lbsh_hexiao', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_hexiao') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_homeblock', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `uniacid` int(11) unsigned NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `name` varchar(255) NULL DEFAULT '' COMMENT '模块名称';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `img` varchar(500) NULL DEFAULT '' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `type` int(4) NULL DEFAULT '1' COMMENT '1 已选 2  未选';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'orderby')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `orderby` int(11) NULL DEFAULT '99' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `url` varchar(255) NULL DEFAULT '' COMMENT '链接';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'mark')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `mark` varchar(100) NULL DEFAULT '' COMMENT '标示符';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'px')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `px` int(6) NULL DEFAULT '2' COMMENT '隐藏排序';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'cat_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `cat_id` int(11) NULL DEFAULT '0' COMMENT '商品分类id';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'goodslist')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `goodslist` int(6) NULL DEFAULT '2' COMMENT '商品展示模式';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'goodsnum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `goodsnum` int(11) NULL DEFAULT '6' COMMENT '商品显示数量';");
}
if (!pdo_fieldexists('lbsh_homeblock', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homeblock') . " ADD `state` int(4) NULL DEFAULT '1' COMMENT '1显示 2隐藏';");
}

if (!pdo_fieldexists('lbsh_homenav', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `name` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `img` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `img2` varchar(255) NULL COMMENT '横幅图片';");
}
if (!pdo_fieldexists('lbsh_homenav', 'orderby')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `orderby` int(11) NULL DEFAULT '99' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `url` varchar(255) NULL COMMENT '网页跳转';");
}
if (!pdo_fieldexists('lbsh_homenav', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序';");
}
if (!pdo_fieldexists('lbsh_homenav', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `appid` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_homenav', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是';");
}
if (!pdo_fieldexists('lbsh_homenav', 'url1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `url1` varchar(255) NULL COMMENT '站内跳转';");
}
if (!pdo_fieldexists('lbsh_homenav', 'vice_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_homenav') . " ADD `vice_name` varchar(30) NULL COMMENT '副标题';");
}

if (!pdo_fieldexists('lbsh_lunbo', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `name` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `img` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `img2` varchar(255) NULL COMMENT '灰色图标';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'orderby')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `orderby` int(11) NULL DEFAULT '99' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `url` varchar(255) NULL COMMENT '网页跳转';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序4点击事件';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `appid` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'url1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `url1` varchar(255) NULL COMMENT '站内跳转';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'zswz')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `zswz` int(4) NULL DEFAULT '1' COMMENT '展示位置';");
}
if (!pdo_fieldexists('lbsh_lunbo', 'sj')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_lunbo') . " ADD `sj` varchar(255) NULL DEFAULT '' COMMENT '点击事件';");
}

if (!pdo_fieldexists('lbsh_menu', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `name` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `img` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `img2` varchar(255) NULL COMMENT '灰色图标';");
}
if (!pdo_fieldexists('lbsh_menu', 'orderby')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `orderby` int(11) NULL DEFAULT '99' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `url` varchar(255) NULL COMMENT '网页跳转';");
}
if (!pdo_fieldexists('lbsh_menu', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `type` int(11) NULL COMMENT '1.站内跳转2.网页3.小程序';");
}
if (!pdo_fieldexists('lbsh_menu', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `appid` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_menu', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `state` int(4) NULL DEFAULT '0' COMMENT '0否 1是';");
}
if (!pdo_fieldexists('lbsh_menu', 'url1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `url1` varchar(255) NULL COMMENT '站内跳转';");
}
if (!pdo_fieldexists('lbsh_menu', 'vice_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_menu') . " ADD `vice_name` varchar(30) NULL COMMENT '副标题';");
}

if (!pdo_fieldexists('lbsh_mykgoods', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `uniacid` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `name` varchar(255) NOT NULL COMMENT '商品名称';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'buynum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `buynum` int(11) NULL DEFAULT '0' COMMENT '数量';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'price')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品单价';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'detail')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `detail` text NOT NULL COMMENT '商品详情，图文';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `status` smallint(6) unsigned NOT NULL DEFAULT '2' COMMENT '上架状态 1代表上架，2代表下架 3代表已删除 ';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `sort` int(11) unsigned NULL DEFAULT '99' COMMENT '商品排序 升序';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'virtual_sales')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `virtual_sales` int(11) unsigned NULL DEFAULT '0' COMMENT '虚拟销量';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'cover_pic')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `cover_pic` longtext NULL COMMENT '商品缩略图';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'goods_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `goods_num` int(11) NULL DEFAULT '0' COMMENT '商品总库存';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `uptime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'zvirtual_sales')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `zvirtual_sales` int(11) NULL DEFAULT '0' COMMENT '真实销量';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'g_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'g_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金';");
}
if (!pdo_fieldexists('lbsh_mykgoods', 'is_sys_g_com')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykgoods') . " ADD `is_sys_g_com` int(4) NULL DEFAULT '2' COMMENT '1 是 2否';");
}

if (!pdo_fieldexists('lbsh_mykmx', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `num` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `type` int(11) NOT NULL COMMENT '1.加2减';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `note` varchar(20) NOT NULL COMMENT '备注';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `time` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `state` int(11) NULL DEFAULT '0' COMMENT '1代表成为合伙人后系统赠送的、2代表合伙人充值的、3代表后台充值的、其它';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'desc')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `desc` varchar(500) NULL DEFAULT '' COMMENT '描述';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `uniacid` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykmx', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykmx') . " ADD `form_id` varchar(255) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_mykorder', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'goods_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `goods_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `user_id` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `form_id` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'prepay_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `prepay_id` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'orderno')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `orderno` varchar(50) NULL COMMENT '订单号';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `status` int(4) NULL DEFAULT '0' COMMENT '待付款1，已支付已完成2';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `name` varchar(255) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `img` varchar(300) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'number')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `number` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'yue')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `yue` decimal(11,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'pay_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `pay_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'is_pay')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `is_pay` int(2) NULL DEFAULT '0' COMMENT '是否支付了，0代表未支付，1代表支付';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'pay_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `pay_time` int(10) NULL DEFAULT '0' COMMENT '支付时间';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'complete_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `complete_time` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `note` varchar(500) NULL DEFAULT '' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'is_group')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `is_group` int(2) NULL DEFAULT '0' COMMENT '0 单买';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'zffs')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `zffs` int(2) NULL DEFAULT '0' COMMENT '支付方式 1微信支付，2余额+微信支付';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'tradeno')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `tradeno` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent1` int(11) NULL DEFAULT '0' COMMENT '一级合伙人id';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent2` int(11) NULL DEFAULT '0' COMMENT '二级合伙人id';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent_money1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级合伙人佣金';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent_money2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级合伙人佣金';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent_status1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_mykorder', 'agent_status2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_mykorder') . " ADD `agent_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}

if (!pdo_fieldexists('lbsh_pingaddress', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `name` varchar(255) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'mobile')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `mobile` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'province_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `province_id` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'province')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `province` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'city_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `city_id` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'city')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `city` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'district_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `district_id` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'district')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `district` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'detail')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `detail` varchar(1000) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'is_default')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `is_default` smallint(1) NULL DEFAULT '1' COMMENT '2默认地址';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `addtime` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'is_delete')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `is_delete` smallint(6) NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'longitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `longitude` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'latitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `latitude` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'addr')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `addr` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'shopname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `shopname` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `state` varchar(10) NULL DEFAULT '1' COMMENT '1 kaiqi';");
}
if (!pdo_fieldexists('lbsh_pingaddress', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingaddress') . " ADD `uniacid` int(11) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_pingdings', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'storeid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `storeid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'quid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `quid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `name` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'code')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `code` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'dateline')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `dateline` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingdings', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingdings') . " ADD `sort` int(11) NULL DEFAULT '99' COMMENT '';");
}

if (!pdo_fieldexists('lbsh_pinggoods', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `uniacid` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'store_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `store_id` int(11) NOT NULL DEFAULT '0' COMMENT '门店ID';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `name` varchar(255) NOT NULL COMMENT '商品名称';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'original_price')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `original_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品原价';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'price')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '团购价';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'detail')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `detail` longtext NOT NULL COMMENT '商品详情，图文';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'cat_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `cat_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品分类';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'goods_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `goods_type` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '商品专区，1普通商品，2新人专区';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `status` smallint(6) unsigned NOT NULL DEFAULT '2' COMMENT '上架状态 1代表上架，2代表下架 3代表已删除 ';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'grouptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `grouptime` int(11) NOT NULL DEFAULT '0' COMMENT '拼团时间/小时';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'attr')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `attr` longtext NOT NULL COMMENT '规格的库存及价格';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `sort` int(11) unsigned NULL DEFAULT '99' COMMENT '商品排序 升序';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'virtual_sales')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `virtual_sales` int(11) unsigned NULL DEFAULT '0' COMMENT '虚拟销量';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'cover_pic')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `cover_pic` longtext NULL COMMENT '商品缩略图';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'unit')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `unit` varchar(255) NOT NULL DEFAULT '件' COMMENT '单位';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'group_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `group_num` int(11) unsigned NOT NULL DEFAULT '2' COMMENT '商品成团数';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'gua_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `gua_num` int(11) NULL DEFAULT '1' COMMENT '瓜分人数';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_hot')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_hot` smallint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖 0代表热卖1代表不是 ';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'limit_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `limit_time` int(11) unsigned NULL DEFAULT '0' COMMENT '拼团限时 结束时间';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_only')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_only` smallint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否允许单独购买';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_more')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_more` smallint(1) unsigned NULL DEFAULT '1' COMMENT '是否允许多件购买';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'buy_limit')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `buy_limit` int(11) unsigned NULL DEFAULT '0' COMMENT '限购数量';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `type` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '商品类型 1代表送货上门，2代表到店自提，3代表全部支持 ';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'one_buy_limit')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `one_buy_limit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '单次限购数量';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'goods_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `goods_num` int(11) NULL DEFAULT '0' COMMENT '商品总库存';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'goods_pic')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `goods_pic` longtext NULL COMMENT '商品图片';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'start_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `start_time` int(10) NULL DEFAULT '0' COMMENT '拼团限时 开始时间';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `uptime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'up_username')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `up_username` varchar(200) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'fname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `fname` varchar(255) NULL COMMENT '副标题';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'goumai')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `goumai` longtext NOT NULL COMMENT '购买须知';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_miaosha')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_miaosha` int(2) NULL DEFAULT '1' COMMENT '是否秒杀,1是，2否';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'spec')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `spec` text NULL COMMENT '规格';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'zvirtual_sales')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `zvirtual_sales` int(11) NULL DEFAULT '0' COMMENT '真实销量';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'xupinglun')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `xupinglun` text NULL COMMENT '虚拟评论';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'xian_price')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `xian_price` decimal(10,2) NULL DEFAULT '0.00' COMMENT '现价';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'fy_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `fy_money` int(11) NULL DEFAULT '0' COMMENT '红包瓜分比例';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'fy_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `fy_type` tinyint(1) NULL DEFAULT '1' COMMENT '红包瓜分方式，1按比例，2按金额';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'fy_money_val')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `fy_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '红包瓜分金额';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_shouye')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_shouye` int(4) NULL DEFAULT '2' COMMENT '1是 2 否';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_fanbei')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_fanbei` int(4) NULL DEFAULT '2' COMMENT '1翻倍 2 不翻倍';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_suiji')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_suiji` int(4) NULL DEFAULT '1' COMMENT '1 随机 2固定';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'yunfei')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `yunfei` decimal(10,2) NULL DEFAULT '0.00' COMMENT '运费';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_yunfei')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_yunfei` int(4) NULL DEFAULT '1' COMMENT '1开启运费  2 包邮';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'g_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `g_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级商品佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'g_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `g_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级商品佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'bz_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `bz_commission` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中一级商品佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'bz_commission2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `bz_commission2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中二级商品佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'one_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `one_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '一级分销佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'two_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `two_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '二级分销佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'bz_one_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `bz_one_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中一级分销佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'bz_two_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `bz_two_bili` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '不中二级分销佣金';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_sys_g_com')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_sys_g_com` int(4) NULL DEFAULT '2' COMMENT '是否开启合伙人 1 是 2否';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'is_fx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `is_fx` int(4) NULL DEFAULT '2' COMMENT '是否开启分销 1 是 2否';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'cbmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'tuipin_uid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `tuipin_uid` int(11) NULL DEFAULT '0' COMMENT '推品人ID';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'tz_money_val')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `tz_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '团长分佣金额';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'video_url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `video_url` varchar(255) NULL COMMENT '商品视频url';");
}
if (!pdo_fieldexists('lbsh_pinggoods', 'source_url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods') . " ADD `source_url` varchar(255) NULL COMMENT '来源url';");
}

if (!pdo_fieldexists('lbsh_pinggoods_info', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods_info', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `uniacid` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoods_info', 'goods_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `goods_id` int(11) NULL DEFAULT '0' COMMENT '商品id';");
}
if (!pdo_fieldexists('lbsh_pinggoods_info', 'auto_kaituan')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `auto_kaituan` int(4) NULL DEFAULT '2' COMMENT '是否自动开团 1开启 2关闭';");
}
if (!pdo_fieldexists('lbsh_pinggoods_info', 'created_at')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `created_at` int(10) NULL DEFAULT '0' COMMENT '创建时间';");
}
if (!pdo_fieldexists('lbsh_pinggoods_info', 'updated_at')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoods_info') . " ADD `updated_at` int(10) NULL DEFAULT '0' COMMENT '修改时间';");
}

if (!pdo_fieldexists('lbsh_pinggoodstype', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `name` varchar(255) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'pic_url')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `pic_url` longblob NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `sort` int(11) NOT NULL DEFAULT '99' COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '小程序id';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pinggoodstype', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pinggoodstype') . " ADD `status` tinyint(1) NULL DEFAULT '1' COMMENT '是否开启 1是 2否';");
}

if (!pdo_fieldexists('lbsh_pingorder', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'store_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `store_id` int(11) NULL DEFAULT '0' COMMENT '门店id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `user_id` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'addr_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `addr_id` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `form_id` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'prepay_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `prepay_id` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'orderno')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `orderno` varchar(50) NULL COMMENT '订单号';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `status` int(4) NULL DEFAULT '0' COMMENT '待付款1，待配送2，待自提3，待收货4，已完成5，售后6，已取消7';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'pay_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `pay_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_pay')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_pay` int(2) NULL DEFAULT '0' COMMENT '是否支付了，0代表未支付，1代表支付';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'pay_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `pay_time` int(10) NULL DEFAULT '0' COMMENT '支付时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'ps_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `ps_time` int(10) NULL DEFAULT '0' COMMENT '配送时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'complete_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `complete_time` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'cancel_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `cancel_time` int(10) NULL DEFAULT '0' COMMENT '取消订单时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `note` varchar(500) NULL DEFAULT '' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'realname')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `realname` varchar(200) NULL DEFAULT '' COMMENT '收货人';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'mobile')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `mobile` varchar(50) NULL COMMENT '手机号码';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'address')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `address` varchar(500) NULL COMMENT '收货地址';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'longitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `longitude` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'latitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `latitude` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_group')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_group` int(2) NULL DEFAULT '0' COMMENT '0 团购 1拼团';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'parent_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `parent_id` int(11) NULL DEFAULT '0' COMMENT '团长id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_success')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_success` int(2) NULL DEFAULT '0' COMMENT '0 未成团 1已成团';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'success_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `success_time` int(10) NULL DEFAULT '0' COMMENT '成团时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'pt_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `pt_status` int(2) NULL DEFAULT '1' COMMENT '拼团状态 1代表待付款，2代表拼团中，3代表拼团成功，4代表拼团失败 ';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shfs')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shfs` int(2) NULL DEFAULT '0' COMMENT '收货方式，1代表送货上门，2代表到店自提';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'zffs')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `zffs` int(2) NULL DEFAULT '0' COMMENT '支付方式 1微信支付，2余额+微信支付';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tradeno')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tradeno` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'freight')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `freight` double(13,2) NULL DEFAULT '0.00' COMMENT '运费';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shtj_cont')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shtj_cont` varchar(500) NULL COMMENT '售后提交内容';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shtj_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shtj_time` int(10) NULL DEFAULT '0' COMMENT '售后提交时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shfk_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shfk_status` int(2) NULL DEFAULT '0' COMMENT '售后反馈结果';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shfk_cont')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shfk_cont` varchar(500) NULL COMMENT '售后反馈内容';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'shfk_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `shfk_time` int(10) NULL DEFAULT '0' COMMENT '售后反馈时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'pt_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `pt_money` double(13,2) NULL DEFAULT '0.00' COMMENT '平台抽取掉的费用';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tuan_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tuan_id` int(11) NULL DEFAULT '0' COMMENT '团长id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'quzhang')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `quzhang` int(11) NULL DEFAULT '0' COMMENT '跨区商家区长id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tuan_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tuan_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '区长佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'quzhang_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `quzhang_money` decimal(13,2) NULL DEFAULT '0.00' COMMENT '跨区商家区长佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent1` int(11) NULL DEFAULT '0' COMMENT '一级代理id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent2` int(11) NULL DEFAULT '0' COMMENT '二级代理id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent_money1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级代理佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent_money2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级代理佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'buytype')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `buytype` int(11) NULL DEFAULT '1' COMMENT '购买方式，1拼团购买，2单独购买';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'isgua')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `isgua` int(4) NULL DEFAULT '2' COMMENT '是否有瓜分的，1代表有瓜分的，2代表没有瓜分的';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'gua_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `gua_status` int(4) NULL DEFAULT '2' COMMENT '是否瓜分了，2代表未瓜分，1代表瓜分了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'gua_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `gua_money` decimal(11,2) NULL DEFAULT '0.00' COMMENT '瓜分金额';");
}
pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " MODIFY COLUMN `gua_money` decimal(11,2) NULL DEFAULT '0.00' COMMENT '瓜分金额';");

if (!pdo_fieldexists('lbsh_pingorder', 'gua_expire')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `gua_expire` int(10) NULL DEFAULT '0' COMMENT '瓜分的过期时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_tuikuan')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_tuikuan` int(4) NULL DEFAULT '2' COMMENT '是否退款，对于需要退款的才有效，2代表未退款，1代表已退款';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'yue')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `yue` decimal(11,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_jqr')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_jqr` int(4) NULL DEFAULT '2' COMMENT '是否是机器人下单的，1代表是，2代表否';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'express_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `express_status` int(4) NULL DEFAULT '1' COMMENT '是否选择快递，1是，2否';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'express_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `express_id` int(11) NULL DEFAULT '0' COMMENT '快递id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'express_no')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `express_no` varchar(100) NULL COMMENT '快递单号';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'express_remark')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `express_remark` varchar(500) NULL COMMENT '商家留言';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_myk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_myk` int(3) NULL DEFAULT '2' COMMENT '1使用了免疫卡  2没使用';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tan_myk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tan_myk` int(3) NULL DEFAULT '2' COMMENT '1弹过免疫卡说明  2没弹过';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'myknum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `myknum` int(11) NULL DEFAULT '0' COMMENT '免疫卡张数';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_run')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_run` int(4) NULL DEFAULT '0' COMMENT '是否要定时执行分佣或者赠送免疫卡等等 0代表无需 1代表需要';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'song_myk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `song_myk` int(4) NULL DEFAULT '2' COMMENT '是否有领取免疫卡的，1代表有领取的，2代表没有领取的';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'myk_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `myk_status` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'myk_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `myk_num` int(10) NULL COMMENT '领取免疫卡的数量';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'myk_expire')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `myk_expire` int(10) NULL DEFAULT '0' COMMENT '领取免疫卡的过期时间';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent_status1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'agent_status2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `agent_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'cbmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_mantui')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_mantui` int(4) NULL DEFAULT '2' COMMENT '该订单，是否是满退订单 2代表不是 1代表是';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tui_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tui_status` int(4) NULL DEFAULT '0' COMMENT '退款状态 默认0 1代表退款成功 2代表退款失败';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tui_isread')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tui_isread` int(4) NULL DEFAULT '2' COMMENT '读取状态 1已读  2未读';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tui_note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tui_note` varchar(200) NULL COMMENT '退款原因';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_user1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_user1` int(11) NULL DEFAULT '0' COMMENT '一级推品人id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_user2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_user2` int(11) NULL DEFAULT '0' COMMENT '二级推品人id';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_money1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_money1` decimal(13,2) NULL DEFAULT '0.00' COMMENT '一级推品人佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_money2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_money2` decimal(13,2) NULL DEFAULT '0.00' COMMENT '二级推品人佣金';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_status1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_status1` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'tp_status2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `tp_status2` int(4) NULL DEFAULT '2' COMMENT '是否领取了，2代表未领取，1代表领取了';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'version')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `version` int(3) NULL DEFAULT '1' COMMENT '版本号，默认是1，新的版本也会不断的加，做兼容';");
}
pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " MODIFY COLUMN `version` int(3) DEFAULT 1 COMMENT '版本号，默认是1，新的版本也会不断的加，做兼容';");

if (!pdo_fieldexists('lbsh_pingorder', 'refund_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `refund_id` varchar(50) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'red_mode')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `red_mode` tinyint(1) NULL DEFAULT '1' COMMENT '红包返佣模式 1订单验收 2拼团完成';");
}
if (!pdo_fieldexists('lbsh_pingorder', 'is_new_user')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingorder') . " ADD `is_new_user` int(2) NULL DEFAULT '0' COMMENT '是否新人专区 0否 1是';");
}

if (!pdo_fieldexists('lbsh_pingordergoods', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'order_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `order_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'goods_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `goods_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'goods_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `goods_type` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '商品专区，1普通商品，2新人专区';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `img` varchar(300) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'number')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `number` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `name` varchar(255) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `money` decimal(13,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'spec')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `spec` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'group_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `group_num` int(11) NULL DEFAULT '0' COMMENT '商品成团数';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'grouptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `grouptime` int(11) NULL DEFAULT '0' COMMENT '拼团时间/小时';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'shichang')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `shichang` decimal(13,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'cbmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `cbmoney` decimal(13,2) NULL DEFAULT '0.00' COMMENT '成本价';");
}
if (!pdo_fieldexists('lbsh_pingordergoods', 'tz_money_val')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingordergoods') . " ADD `tz_money_val` decimal(10,2) NULL DEFAULT '0' COMMENT '团长分佣金额';");
}

if (!pdo_fieldexists('lbsh_pingset', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingset', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingset', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `status` int(2) NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingset', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingset', 'pattern')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `pattern` int(4) NULL DEFAULT '2' COMMENT '1 单小区  2多小区';");
}
if (!pdo_fieldexists('lbsh_pingset', 'default')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `default` int(11) NULL DEFAULT '0' COMMENT '默认显示的小区';");
}
if (!pdo_fieldexists('lbsh_pingset', 'goods_typenav')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `goods_typenav` int(4) NULL DEFAULT '1' COMMENT '1开启商品分类导航 2关闭';");
}
if (!pdo_fieldexists('lbsh_pingset', 'is_recruit')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `is_recruit` int(4) NULL DEFAULT '1' COMMENT '1开启 2关闭';");
}
if (!pdo_fieldexists('lbsh_pingset', 'uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `uptime` int(10) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingset', 'quggimg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `quggimg` varchar(255) NULL COMMENT '区长招募广告图片';");
}
if (!pdo_fieldexists('lbsh_pingset', 'quggbgimg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `quggbgimg` varchar(255) NULL COMMENT '产品分享背景图';");
}
if (!pdo_fieldexists('lbsh_pingset', 'detail_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `detail_img` varchar(255) NULL COMMENT '产品详情页价格模块背景图片';");
}
if (!pdo_fieldexists('lbsh_pingset', 'ptrule')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `ptrule` text NULL COMMENT '拼团规则';");
}
if (!pdo_fieldexists('lbsh_pingset', 'balance')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `balance` int(4) NULL DEFAULT '2' COMMENT '1开启 2关闭';");
}
if (!pdo_fieldexists('lbsh_pingset', 'ys_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `ys_time` int(11) NULL DEFAULT '0' COMMENT '自动验收时间';");
}
if (!pdo_fieldexists('lbsh_pingset', 'gb_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `gb_time` int(11) NULL DEFAULT '0' COMMENT '自动关闭时间';");
}
if (!pdo_fieldexists('lbsh_pingset', 'storebgimg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `storebgimg` varchar(255) NULL COMMENT '商家分享背景图';");
}
if (!pdo_fieldexists('lbsh_pingset', 'ps_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `ps_type` int(4) NULL DEFAULT '1' COMMENT '配送方式 1 商家配送 2区长配送';");
}
if (!pdo_fieldexists('lbsh_pingset', 'tklx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `tklx` tinyint(1) NULL DEFAULT '1' COMMENT '订单退款路线 1原路退回 2退款到余额';");
}
if (!pdo_fieldexists('lbsh_pingset', 'tq_type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `tq_type` int(4) NULL DEFAULT '1' COMMENT '提取方式 1 商家处提取 2区长处提取';");
}
if (!pdo_fieldexists('lbsh_pingset', 'yunfei')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `yunfei` decimal(11,2) NULL DEFAULT '0.00' COMMENT '运费';");
}
if (!pdo_fieldexists('lbsh_pingset', 'gua_hour')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `gua_hour` int(10) NULL DEFAULT '0' COMMENT '瓜分过期时间';");
}
if (!pdo_fieldexists('lbsh_pingset', 'gua_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `gua_bili` decimal(11,2) NULL DEFAULT '0.00' COMMENT '瓜分比例';");
}
if (!pdo_fieldexists('lbsh_pingset', 'myk_hour')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `myk_hour` int(10) NULL DEFAULT '0' COMMENT '瓜分免疫卡过期时间';");
}
if (!pdo_fieldexists('lbsh_pingset', 'red_mode')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `red_mode` tinyint(1) NULL DEFAULT '1' COMMENT '红包返佣模式 1订单验收 2拼团完成';");
}
if (!pdo_fieldexists('lbsh_pingset', 'red_give_mode')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `red_give_mode` tinyint(1) NULL DEFAULT '1' COMMENT '返红包模式 1返到余额 2返到微信零钱';");
}
if (!pdo_fieldexists('lbsh_pingset', 'red_min_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingset') . " ADD `red_min_money` decimal(10,2) NULL DEFAULT '1' COMMENT '返微信最低返金额，默认1，大部分企业付款到微信零钱功能是1元';");
}

if (!pdo_fieldexists('lbsh_pingspec', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingspec', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_pingspec', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `name` varchar(100) NOT NULL COMMENT '规格名称';");
}
if (!pdo_fieldexists('lbsh_pingspec', 'spec_items')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `spec_items` varchar(1000) NOT NULL COMMENT '规格属性';");
}
if (!pdo_fieldexists('lbsh_pingspec', 'sort')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `sort` int(11) NOT NULL DEFAULT '99' COMMENT '排序';");
}
if (!pdo_fieldexists('lbsh_pingspec', 'status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_pingspec') . " ADD `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1开启，2关闭';");
}

if (!pdo_fieldexists('lbsh_plugin', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_plugin') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_plugin', 'title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_plugin') . " ADD `title` varchar(200) NOT NULL COMMENT '插件标识符';");
}
if (!pdo_fieldexists('lbsh_plugin', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_plugin') . " ADD `addtime` int(10) NULL COMMENT '添加时间';");
}

if (!pdo_fieldexists('lbsh_qbmx', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `money` decimal(11,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `type` int(11) NOT NULL COMMENT '1.加2减';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'note')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `note` varchar(20) NOT NULL COMMENT '备注';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `time` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'item_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `item_id` int(11) NULL DEFAULT '0' COMMENT '相关id';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `state` int(11) NULL DEFAULT '10' COMMENT '1后台充值，2前台充值，3不中退款，4合伙人佣金，5红包补贴，6用户提现，7不中退款，8购买商品（余额支付），9新用户红包，10其它';");
} else {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " MODIFY COLUMN `state` int(11) NULL DEFAULT '10' COMMENT '1后台充值，2前台充值，3不中退款，4合伙人佣金，5红包补贴，6用户提现，7不中退款，8购买商品（余额支付），9新用户红包，10其它，11团长收益，12会员分销一级，13会员分销二级，14商家分成';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'desc')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `desc` varchar(500) NULL DEFAULT '' COMMENT '描述';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `uniacid` int(11) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_qbmx', 'source_uid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_qbmx') . " ADD `source_uid` int(11) NULL DEFAULT '0' COMMENT '给自己带来收益的用户id';");
}

if (!pdo_fieldexists('lbsh_redlog', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_redlog', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_redlog', 'redmoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `redmoney` decimal(10,2) NULL COMMENT '红包金额';");
}
if (!pdo_fieldexists('lbsh_redlog', 'redtype')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `redtype` int(2) NOT NULL COMMENT '红包类型，1连接红包，2定时红包';");
}
if (!pdo_fieldexists('lbsh_redlog', 'userid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `userid` int(11) NOT NULL COMMENT '用户ID';");
}
if (!pdo_fieldexists('lbsh_redlog', 'remark')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `remark` varchar(500) NULL COMMENT '描述';");
}
if (!pdo_fieldexists('lbsh_redlog', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redlog') . " ADD `addtime` int(10) NOT NULL COMMENT '领取时间';");
}

if (!pdo_fieldexists('lbsh_redset', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_redset', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_title` varchar(500) NULL COMMENT '连接红包标题';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_img` varchar(100) NULL COMMENT '图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_summoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_yimoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_yipeople')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_minbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_maxbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_rule')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_rule` text NULL COMMENT '规则';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_title')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_title` varchar(500) NULL COMMENT '定时红包标题';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_status` int(2) NULL DEFAULT '1' COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_img` varchar(100) NULL COMMENT '图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_summoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_summoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '总金额';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_yimoney')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_yimoney` decimal(10,2) NULL DEFAULT '0.00' COMMENT '已领金额';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_yipeople')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_yipeople` int(11) NULL DEFAULT '0' COMMENT '已领人数';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_minbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_minbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间小';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_maxbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_maxbao` varchar(500) NULL DEFAULT '' COMMENT '红包区间大';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_rule')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_rule` text NULL COMMENT '规则';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_changtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_changtime` int(11) NULL DEFAULT '0' COMMENT '时间常数';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_zhitime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_zhitime` int(11) NULL DEFAULT '0' COMMENT '时间指数';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_quanzhong')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_quanzhong')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_quanzhong` varchar(500) NULL DEFAULT '' COMMENT '红包区间权重';");
}
if (!pdo_fieldexists('lbsh_redset', 'lian_daynum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `lian_daynum` int(11) NULL DEFAULT '0' COMMENT '每日可以领取最多次数';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_img1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_img1` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_img2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_img2` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_img3')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_img3` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_img4')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_img4` varchar(500) NULL DEFAULT '' COMMENT '红包图片';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_beishu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_beishu` int(11) NULL DEFAULT '1' COMMENT '首次红包倍数';");
}
if (!pdo_fieldexists('lbsh_redset', 'ding_fengding')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_redset') . " ADD `ding_fengding` int(11) NULL DEFAULT '10' COMMENT '首次红包封顶金额';");
}

if (!pdo_fieldexists('lbsh_sms', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_sms', 'tid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `tid` varchar(100) NOT NULL COMMENT '提现模板ID';");
}
if (!pdo_fieldexists('lbsh_sms', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_sms', 'yy_tid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `yy_tid` varchar(50) NOT NULL COMMENT '代理商审核模板ID';");
}
if (!pdo_fieldexists('lbsh_sms', 'dm_tid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `dm_tid` varchar(50) NOT NULL COMMENT 'WIFI入驻成功模板ID';");
}
if (!pdo_fieldexists('lbsh_sms', 'pt_cg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `pt_cg` varchar(50) NULL DEFAULT '' COMMENT '拼团成功模板';");
}
if (!pdo_fieldexists('lbsh_sms', 'pt_sb')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `pt_sb` varchar(50) NULL DEFAULT '' COMMENT '拼团失败模板';");
}
if (!pdo_fieldexists('lbsh_sms', 'order_zf')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `order_zf` varchar(50) NULL DEFAULT '' COMMENT '订单支付成功模板';");
}
if (!pdo_fieldexists('lbsh_sms', 'order_state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `order_state` varchar(50) NULL DEFAULT '' COMMENT '订单状态变动模板';");
}
if (!pdo_fieldexists('lbsh_sms', 'msg_tid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `msg_tid` varchar(50) NULL COMMENT '新的商品通知模板ID';");
}
if (!pdo_fieldexists('lbsh_sms', 'qxdd_tid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `qxdd_tid` varchar(50) NULL COMMENT '取消订单通知模板ID';");
}
if (!pdo_fieldexists('lbsh_sms', 'updated_at')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_sms') . " ADD `updated_at` int(10) NULL DEFAULT '0' COMMENT '更新时间';");
}

if (!pdo_fieldexists('lbsh_store', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'store_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `store_name` varchar(255) NULL COMMENT '商家名称';");
}
if (!pdo_fieldexists('lbsh_store', 'store_logo')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `store_logo` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'store_wx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `store_wx` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'store_tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `store_tel` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'miaoshu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `miaoshu` varchar(500) NULL COMMENT '描述';");
}
if (!pdo_fieldexists('lbsh_store', 'address')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `address` varchar(500) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_store', 'pt_bili')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `pt_bili` decimal(5,2) NULL DEFAULT '0' COMMENT '商家抽佣比例，默认0%';");
} else {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " MODIFY COLUMN `pt_bili` decimal(5,2) NULL DEFAULT '0' COMMENT '商家抽佣比例，默认0%';");
}
if (!pdo_fieldexists('lbsh_store', 'longitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `longitude` decimal(50,15) DEFAULT '0.000000000000000';");
}
if (!pdo_fieldexists('lbsh_store', 'latitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `latitude` decimal(50,15) DEFAULT '0.000000000000000';");
}
if (!pdo_fieldexists('lbsh_store', 'latitude')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `latitude` decimal(50,15) DEFAULT '0.000000000000000';");
}
if (!pdo_fieldexists('lbsh_store', 'version')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_store') . " ADD `version` int(3) NULL DEFAULT '1' COMMENT '版本号，默认是1，新的版本也会不断的加，做兼容';");
}
pdo_query("update " . tablename('lbsh_store') . " set pt_bili=0 where pt_bili<>0 and version=1;");

if (!pdo_fieldexists('lbsh_system', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `appid` varchar(100) NOT NULL COMMENT 'appid';");
}
if (!pdo_fieldexists('lbsh_system', 'appsecret')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `appsecret` varchar(200) NOT NULL COMMENT 'appsecret';");
}
if (!pdo_fieldexists('lbsh_system', 'link')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `link` varchar(200) NOT NULL COMMENT '网址';");
}
if (!pdo_fieldexists('lbsh_system', 'mchid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `mchid` varchar(20) NOT NULL COMMENT '商户号';");
}
if (!pdo_fieldexists('lbsh_system', 'wxkey')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `wxkey` varchar(100) NOT NULL COMMENT '商户秘钥';");
}
if (!pdo_fieldexists('lbsh_system', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'url_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `url_name` varchar(20) NOT NULL COMMENT '网址名称';");
}
if (!pdo_fieldexists('lbsh_system', 'details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `details` text NOT NULL COMMENT '关于我们';");
}
if (!pdo_fieldexists('lbsh_system', 'url_logo')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `url_logo` varchar(100) NOT NULL COMMENT '网址logo';");
}
if (!pdo_fieldexists('lbsh_system', 'bq_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `bq_name` varchar(50) NOT NULL COMMENT '版权名称';");
}
if (!pdo_fieldexists('lbsh_system', 'link_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `link_name` varchar(30) NOT NULL COMMENT '网站名称';");
}
if (!pdo_fieldexists('lbsh_system', 'link_logo')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `link_logo` varchar(100) NOT NULL COMMENT '网站logo';");
}
if (!pdo_fieldexists('lbsh_system', 'more')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `more` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'default_store')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `default_store` int(11) NOT NULL COMMENT '默认门店id';");
}
if (!pdo_fieldexists('lbsh_system', 'support')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `support` varchar(20) NOT NULL COMMENT '技术支持';");
}
if (!pdo_fieldexists('lbsh_system', 'bq_logo')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `bq_logo` varchar(100) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'color')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `color` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'map_key')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `map_key` varchar(100) NOT NULL COMMENT '腾讯地图key';");
}
if (!pdo_fieldexists('lbsh_system', 'tz_appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tz_appid` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'tz_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tz_name` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'pt_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `pt_name` varchar(30) NOT NULL COMMENT '平台名称';");
}
if (!pdo_fieldexists('lbsh_system', 'dada_key')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `dada_key` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'dada_secret')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `dada_secret` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'apiclient_cert')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `apiclient_cert` text NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'apiclient_key')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `apiclient_key` text NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'day')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `day` int(11) NOT NULL COMMENT '天数';");
}
if (!pdo_fieldexists('lbsh_system', 'username')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `username` varchar(20) NOT NULL COMMENT '邮箱用户名';");
}
if (!pdo_fieldexists('lbsh_system', 'password')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `password` varchar(50) NOT NULL COMMENT '邮箱密码';");
}
if (!pdo_fieldexists('lbsh_system', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `type` varchar(10) NOT NULL COMMENT '邮箱类型';");
}
if (!pdo_fieldexists('lbsh_system', 'sender')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `sender` varchar(50) NOT NULL COMMENT '发件人名称';");
}
if (!pdo_fieldexists('lbsh_system', 'signature')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `signature` varchar(200) NOT NULL COMMENT '邮件签名';");
}
if (!pdo_fieldexists('lbsh_system', 'is_email')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_email` int(11) NOT NULL COMMENT '1开启  2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'tx_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tx_money` decimal(10,2) NOT NULL COMMENT '最低提现金额';");
}
if (!pdo_fieldexists('lbsh_system', 'tx_rate')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tx_rate` int(11) NOT NULL COMMENT '手续费';");
}
if (!pdo_fieldexists('lbsh_system', 'tx_details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tx_details` text NOT NULL COMMENT '提现详情';");
}
if (!pdo_fieldexists('lbsh_system', 'tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `tel` varchar(20) NOT NULL COMMENT '平台电话';");
}
if (!pdo_fieldexists('lbsh_system', 'dc_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `dc_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'wm_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `wm_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'yd_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `yd_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'typeset')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `typeset` tinyint(1) NULL DEFAULT '2' COMMENT '移动端展示商家信息 1是 2否';");
} else {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " MODIFY COLUMN `typeset` tinyint(1) NULL DEFAULT '2' COMMENT '移动端展示商家信息 1是 2否';");
}
if (!pdo_fieldexists('lbsh_system', 'integral')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `integral` int(11) NOT NULL COMMENT '评论得积分';");
}
if (!pdo_fieldexists('lbsh_system', 'cjwt')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `cjwt` text NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'rzxy')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `rzxy` text NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_ruzhu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_ruzhu` int(11) NOT NULL COMMENT '1.开启2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'is_yue')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_yue` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'integral2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `integral2` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_jf')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_jf` int(11) NOT NULL DEFAULT '1' COMMENT '1开启2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'is_jfpay')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_jfpay` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'jf_proportion')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `jf_proportion` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_zfb')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_zfb` int(11) NOT NULL DEFAULT '2' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_yhk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_yhk` int(11) NOT NULL DEFAULT '1' COMMENT '团队默认 1合伙人 2会员分销 默认1';");
}
if (!pdo_fieldexists('lbsh_system', 'is_wx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_wx` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'ip')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `ip` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'jfgn')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `jfgn` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'fxgn')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `fxgn` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'msgn')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `msgn` int(11) NOT NULL DEFAULT '1' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_img` int(11) NOT NULL DEFAULT '2' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_psxx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_psxx` int(11) NOT NULL DEFAULT '2' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'kfw_appid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `kfw_appid` varchar(30) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'kfw_appsecret')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `kfw_appsecret` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'usertx_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `usertx_money` decimal(10,2) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'usertx_rate')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `usertx_rate` int(11) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'usertx_details')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `usertx_details` text NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'wfms')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `wfms` varchar(500) NULL COMMENT 'wifi描述';");
}
if (!pdo_fieldexists('lbsh_system', 'is_ggruzhu')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_ggruzhu` int(11) NULL DEFAULT '2' COMMENT '是否开启提现审核  1 开启 2关闭';");
}
pdo_query("ALTER TABLE " . tablename('lbsh_system') . " MODIFY COLUMN `is_ggruzhu` int(11) NULL DEFAULT '2' COMMENT '是否开启提现审核  1 开启 2关闭';");
if (!pdo_fieldexists('lbsh_system', 'is_zhanshi')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_zhanshi` int(11) NULL DEFAULT '1' COMMENT '1 开启广告展示  2 关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'ggrzxy')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `ggrzxy` text NULL COMMENT '入驻须知';");
}
if (!pdo_fieldexists('lbsh_system', 'ggcjwt')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `ggcjwt` text NULL COMMENT '平台优势';");
}
if (!pdo_fieldexists('lbsh_system', 'ggsy')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `ggsy` varchar(11) NULL COMMENT '广告收益';");
}
if (!pdo_fieldexists('lbsh_system', 'ggtx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `ggtx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最低提现金额';");
}
if (!pdo_fieldexists('lbsh_system', 'txservice')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `txservice` decimal(10,2) NULL DEFAULT '0.00' COMMENT '提现手续费';");
}
if (!pdo_fieldexists('lbsh_system', 'txagreement')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `txagreement` text NULL COMMENT '提现协议';");
}
if (!pdo_fieldexists('lbsh_system', 'is_txggsy')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_txggsy` int(4) NULL DEFAULT '2' COMMENT '1 开启 2关闭  首页';");
}
if (!pdo_fieldexists('lbsh_system', 'is_txggl')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_txggl` int(4) NULL DEFAULT '2' COMMENT '1开启 2关闭  流';");
}
if (!pdo_fieldexists('lbsh_system', 'txgg_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `txgg_id` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现免审核金额';");
}
pdo_query("ALTER TABLE " . tablename('lbsh_system') . " MODIFY COLUMN `txgg_id` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '提现免审核金额';");
if (!pdo_fieldexists('lbsh_system', 'is_newregion')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_newregion` int(4) NULL DEFAULT '1' COMMENT '1开启 2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'is_video')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_video` int(4) NULL DEFAULT '2' COMMENT '1开启新闻展示  2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'addtime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `addtime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'wifihomeimg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `wifihomeimg` varchar(255) NULL COMMENT 'WIFI封面图';");
}
if (!pdo_fieldexists('lbsh_system', 'updatetime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `updatetime` int(10) NULL DEFAULT '0' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'is_hongbao')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_hongbao` int(4) NULL DEFAULT '2' COMMENT '1开启红包底部广告 2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'is_ptgg')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_ptgg` int(4) NULL DEFAULT '2' COMMENT '1开启拼团列表页轮播图2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'onetx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `onetx` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '首次最低提现金额';");
}
if (!pdo_fieldexists('lbsh_system', 'is_dingshi')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `is_dingshi` int(3) NULL DEFAULT '2' COMMENT '1开启  2关闭';");
}
if (!pdo_fieldexists('lbsh_system', 'goodslist')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `goodslist` int(6) NULL DEFAULT '2' COMMENT '商品显示列数';");
}
if (!pdo_fieldexists('lbsh_system', 'specification')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `specification` text NULL COMMENT '活动规格';");
}
if (!pdo_fieldexists('lbsh_system', 'gr_img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `gr_img` varchar(500) NULL COMMENT 'gr_img';");
}
if (!pdo_fieldexists('lbsh_system', 'goodslabel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `goodslabel` text NULL COMMENT '热门搜索标签';");
}
if (!pdo_fieldexists('lbsh_system', 'color2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `color2` varchar(20) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_system', 'iskf')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `iskf` int(4) NULL DEFAULT '1' COMMENT '0关闭 1开启  客服消息';");
}
if (!pdo_fieldexists('lbsh_system', 'push_hour')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `push_hour` int(11) NULL DEFAULT '0' COMMENT '商品推送的时间间隔';");
}
if (!pdo_fieldexists('lbsh_system', 'myk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `myk` int(4) NULL DEFAULT '2' COMMENT '1开启免疫卡';");
}
if (!pdo_fieldexists('lbsh_system', 'myklq')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `myklq` decimal(10,2) NULL DEFAULT '0.00' COMMENT '免疫卡领取条件';");
}
if (!pdo_fieldexists('lbsh_system', 'mykdetails')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `mykdetails` text NULL COMMENT '免疫卡说明';");
}
if (!pdo_fieldexists('lbsh_system', 'jxsm')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `jxsm` varchar(100) NULL DEFAULT '安慰奖' COMMENT '奖项说明';");
}
if (!pdo_fieldexists('lbsh_system', 'buymyk')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `buymyk` int(4) NULL DEFAULT '2' COMMENT '1开启购买免疫卡';");
}
if (!pdo_fieldexists('lbsh_system', 'buymykyj1')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `buymykyj1` decimal(10,2) NULL DEFAULT '0.00' COMMENT '购买免疫卡一级佣金';");
}
if (!pdo_fieldexists('lbsh_system', 'buymykyj2')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `buymykyj2` decimal(10,2) NULL DEFAULT '0.00' COMMENT '购买免疫卡二级佣金';");
}
if (!pdo_fieldexists('lbsh_system', 'buymykdetails')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `buymykdetails` text NULL COMMENT '购买免疫卡说明';");
}
if (!pdo_fieldexists('lbsh_system', 'myk_status')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_system') . " ADD `myk_status` int(4) NULL DEFAULT '2' COMMENT '是否开启免疫卡功能，2代表关闭，1代表开启';");
}

if (!pdo_fieldexists('lbsh_tx', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'user_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `user_id` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'type')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `type` int(11) NOT NULL COMMENT '1.支付宝 2.微信零钱 3.微信二维码';");
}
if (!pdo_fieldexists('lbsh_tx', 'state')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `state` int(11) NOT NULL COMMENT '1.审核中2.通过3.拒绝';");
}
if (!pdo_fieldexists('lbsh_tx', 'time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `time` int(11) NOT NULL COMMENT '申请时间';");
}
if (!pdo_fieldexists('lbsh_tx', 'sh_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `sh_time` int(11) NOT NULL COMMENT '审核时间';");
}
if (!pdo_fieldexists('lbsh_tx', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `uniacid` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'user_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `user_name` varchar(20) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'account')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `account` varchar(100) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'tx_cost')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `tx_cost` decimal(10,2) NOT NULL COMMENT '提现金额';");
}
if (!pdo_fieldexists('lbsh_tx', 'sj_cost')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `sj_cost` decimal(10,2) NOT NULL COMMENT '实际到账金额';");
}
if (!pdo_fieldexists('lbsh_tx', 'form_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `form_id` varchar(255) NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_tx', 'user_tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `user_tel` varchar(20) NULL COMMENT '联系方式';");
}
if (!pdo_fieldexists('lbsh_tx', 'real_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `real_name` varchar(20) NULL COMMENT '真实姓名';");
}
if (!pdo_fieldexists('lbsh_tx', 'qr_pay')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_tx') . " ADD `qr_pay` varchar(255) NULL COMMENT '';");
}

if (!pdo_fieldexists('lbsh_user', 'id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `name` varchar(1000) NULL DEFAULT '' COMMENT '';");
} else {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " MODIFY COLUMN `name` varchar(1000) NULL DEFAULT '' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'join_time')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `join_time` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'img')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `img` varchar(1000) NULL DEFAULT '' COMMENT '';");
} else {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " MODIFY COLUMN `img` varchar(1000) NULL DEFAULT '' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'openid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `openid` varchar(200) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'uniacid')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `uniacid` varchar(50) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'user_name')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `user_name` varchar(50) NOT NULL COMMENT '收货人姓名';");
}
if (!pdo_fieldexists('lbsh_user', 'user_tel')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `user_tel` varchar(50) NOT NULL COMMENT '收货人电话';");
}
if (!pdo_fieldexists('lbsh_user', 'user_address')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `user_address` varchar(100) NOT NULL COMMENT '收货人地址';");
}
if (!pdo_fieldexists('lbsh_user', 'total_score')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `total_score` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'wallet')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `wallet` decimal(10,2) NULL DEFAULT '0.00' COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `commission` decimal(10,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'day')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `day` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'order_money')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `order_money` decimal(10,2) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'order_number')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `order_number` int(11) NOT NULL COMMENT '';");
}
if (!pdo_fieldexists('lbsh_user', 'dailiyongji')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `dailiyongji` decimal(10,2) NULL DEFAULT '0.00' COMMENT '代理佣金';");
}
if (!pdo_fieldexists('lbsh_user', 'jifen')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `jifen` int(11) NULL DEFAULT '0' COMMENT '积分';");
}
if (!pdo_fieldexists('lbsh_user', 'vip')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `vip` int(11) NULL DEFAULT '0' COMMENT '会员等级';");
}
if (!pdo_fieldexists('lbsh_user', 'kljifen')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `kljifen` int(11) NULL DEFAULT '0' COMMENT '可领积分';");
}
if (!pdo_fieldexists('lbsh_user', 'daydingnum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `daydingnum` int(11) NULL DEFAULT '0' COMMENT '今天定时红包领取次数';");
}
if (!pdo_fieldexists('lbsh_user', 'uptime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `uptime` int(11) NULL DEFAULT '0' COMMENT '修改时间';");
}
if (!pdo_fieldexists('lbsh_user', 'isfirst')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `isfirst` int(11) NULL DEFAULT '0' COMMENT '是否第一次领取定时红包';");
}
if (!pdo_fieldexists('lbsh_user', 'isfirst_tx')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `isfirst_tx` int(4) NULL DEFAULT '1' COMMENT '1首次提现 2不是';");
}
if (!pdo_fieldexists('lbsh_user', 'is_jiqi')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `is_jiqi` int(4) NULL DEFAULT '1' COMMENT '1不是  2是';");
}
if (!pdo_fieldexists('lbsh_user', 'pt_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `pt_num` int(11) NULL DEFAULT '0' COMMENT '拼团次数';");
}
if (!pdo_fieldexists('lbsh_user', 'push_lasttime')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `push_lasttime` int(10) NULL DEFAULT '0' COMMENT '最后一次推送时间';");
}
if (!pdo_fieldexists('lbsh_user', 'isfirst_gz')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `isfirst_gz` int(4) NULL DEFAULT '2' COMMENT '1首次关注 2不是';");
}
if (!pdo_fieldexists('lbsh_user', 'myknum')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `myknum` int(11) NULL DEFAULT '0' COMMENT '免疫卡张数';");
}
if (!pdo_fieldexists('lbsh_user', 'user_code')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `user_code` varchar(100) NULL COMMENT '用户唯一标识';");
}
if (!pdo_fieldexists('lbsh_user', 'xxcount')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `xxcount` int(11) NULL DEFAULT '0' COMMENT '下线数量';");
}
if (!pdo_fieldexists('lbsh_user', 'level_id')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `level_id` int(4) NULL DEFAULT '1' COMMENT '等级id，0普通会员，1初级会员，2高级会员，3合伙人，默认0';");
}
if (!pdo_fieldexists('lbsh_user', 'one_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `one_num` int(10) DEFAULT '0' COMMENT '直推有效人数';");
}
if (!pdo_fieldexists('lbsh_user', 'two_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `two_num` int(10) DEFAULT '0' COMMENT '间推有效人数';");
}
if (!pdo_fieldexists('lbsh_user', 'tui_num')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `tui_num` int(10) DEFAULT '0' COMMENT '直推+间推有效人数';");
}
if (!pdo_fieldexists('lbsh_user', 'total_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `total_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '累计佣金';");
}
if (!pdo_fieldexists('lbsh_user', 'one_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `one_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '直推累计佣金';");
}
if (!pdo_fieldexists('lbsh_user', 'two_commission')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `two_commission` decimal(10,2) NULL DEFAULT '0.00' COMMENT '间推累计佣金';");
}
if (!pdo_fieldexists('lbsh_user', 'is_buy')) {
    pdo_query("ALTER TABLE " . tablename('lbsh_user') . " ADD `is_buy` tinyint(1) NULL DEFAULT '0' COMMENT '是否有效用户/是否购买了 0.无效 1有效';");
}

//如果不存在索引，则新增索引
if (!pdo_indexexists('lbsh_pingorder', 'order_parent_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_parent_id`(`parent_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_is_group')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_is_group`(`is_group`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_is_pay')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_is_pay`(`is_pay`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_is_jqr')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_is_jqr`(`is_jqr`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_status')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_status`(`status`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_pt_status')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_pt_status`(`pt_status`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_is_gua')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_is_gua`(`isgua`, `gua_status`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingorder', 'order_user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingorder')." ADD INDEX `order_user_id`(`user_id`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_pingordergoods', 'order_goods_order_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingordergoods')." ADD INDEX `order_goods_order_id`(`order_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingordergoods', 'order_goods_goods_num')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingordergoods')." ADD INDEX `order_goods_goods_num`(`group_num`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pingordergoods', 'order_goods_goods_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pingordergoods')." ADD INDEX `order_goods_goods_id`(`goods_id`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_pinggoods_info', 'goods_info_goods_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pinggoods_info')." ADD INDEX `goods_info_goods_id`(`goods_id`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_user', 'user_is_jiqi')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user')." ADD INDEX `user_is_jiqi`(`is_jiqi`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_user', 'user_open_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user')." ADD INDEX `user_open_id`(`openid`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_fxuser', 'fxuser_user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_fxuser')." ADD INDEX `fxuser_user_id`(`user_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_fxuser', 'fxuser_user')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_fxuser')." ADD INDEX `fxuser_user`(`fx_user`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_distribution', 'distribution_user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_distribution')." ADD INDEX `distribution_user_id`(`user_id`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_earnings', 'earnings_user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_earnings')." ADD INDEX `earnings_user_id`(`user_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_earnings', 'earnings_son_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_earnings')." ADD INDEX `earnings_son_id`(`son_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_earnings', 'earnings_time')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_earnings')." ADD INDEX `earnings_time`(`time`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_qbmx', 'qbmx_user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_qbmx')." ADD INDEX `qbmx_user_id`(`user_id`, `state`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_qbmx', 'qbmx_source_uid')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_qbmx')." ADD INDEX `qbmx_source_uid`(`source_uid`) USING BTREE;");
}

if (!pdo_indexexists('lbsh_pinggoods', 'goods_name')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pinggoods')." ADD INDEX `goods_name`(`goods_name`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pinggoods', 'goods_cat_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pinggoods')." ADD INDEX `goods_cat_id`(`cat_id`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pinggoods', 'goods_group_num')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pinggoods')." ADD INDEX `goods_group_num`(`group_num`) USING BTREE;");
}
if (!pdo_indexexists('lbsh_pinggoods', 'goods_is_hot')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_pinggoods')." ADD INDEX `goods_is_hot`(`is_hot`) USING BTREE;");
}

if(!pdo_fieldexists('lbsh_hexiao',  'id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_hexiao')." ADD `id` int(11) unsigned NOT NULL AUTO_INCREMENT;");
}
if(!pdo_fieldexists('lbsh_hexiao',  'user_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_hexiao')." ADD `user_id` int(11) NOT NULL;");
}
if(!pdo_fieldexists('lbsh_hexiao',  'store_id')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_hexiao')." ADD `store_id` int(11) NOT NULL;");
}
if(!pdo_fieldexists('lbsh_hexiao',  'time')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_hexiao')." ADD `time` int(11) NOT NULL COMMENT '时间';");
}
if(!pdo_fieldexists('lbsh_hexiao',  'uniacid')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_hexiao')." ADD `uniacid` int(11) NOT NULL;");
}

if(!pdo_fieldexists('lbsh_user_fxuser',  'is_buy')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user_fxuser')." ADD `is_buy` tinyint(1) NULL DEFAULT '0' COMMENT '是否有效用户/是否购买了 0.无效 1有效';");
}

if(!pdo_fieldexists('lbsh_user_fxset',  'one_condition')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user_fxset')." ADD `one_condition` tinyint(1) NULL DEFAULT '2' COMMENT '初级会员升级条件 1.无条件 2完成一次购买';");
}
if(!pdo_fieldexists('lbsh_user_fxset',  'two_condition_is_buy')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user_fxset')." ADD `two_condition_is_buy` tinyint(1) NULL DEFAULT '1' COMMENT '高级会员升级条件 是否需要完成购买 1.需要 2不需要';");
}
if(!pdo_fieldexists('lbsh_user_fxset',  'two_condition_persion')) {
    pdo_query("ALTER TABLE ".tablename('lbsh_user_fxset')." ADD `two_condition_persion` int(11) NULL DEFAULT '0' COMMENT '高级会员升级条件 直推/人';");
}

?>
