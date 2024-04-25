DROP TABLE IF EXISTS `yuip`;
DROP TABLE IF EXISTS `yulogin-ip`;
DROP TABLE IF EXISTS `yudb`;
DROP TABLE IF EXISTS `zdclose`;
CREATE TABLE `yuip` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `ip` char(30) DEFAULT NULL COMMENT 'ip地址',
  `froms` char(100) DEFAULT NULL COMMENT '归属地',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `system` char(60) DEFAULT NULL COMMENT '操作系统',
  `browser` char(200) DEFAULT NULL COMMENT '浏览器',
  `pageview` char(200) DEFAULT NULL COMMENT '受访页面',
  `source_link` varchar(1000) DEFAULT NULL COMMENT '来源链接'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='访客表';

CREATE TABLE `yulogin-ip` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `ip` char(30) DEFAULT NULL COMMENT 'ip地址',
  `froms` char(100) DEFAULT NULL COMMENT '归属地',
  `login-time` datetime NOT NULL COMMENT '登录时间',
  `system` char(60) DEFAULT NULL COMMENT '操作系统',
  `browser` char(200) DEFAULT NULL COMMENT '浏览器'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='历史登录表';

CREATE TABLE `yudb` (
  `id` int(10) NOT NULL,
  `user` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `webQQ` varchar(15) DEFAULT NULL COMMENT '站长QQ',
  `web_yy` text COMMENT '一言',
  `authorname` text,
  `title2` text COMMENT '网站副标题',
  `Keywords` text COMMENT '网站关键词',
  `description` text COMMENT '网站描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zdclose` (
  `id` int(10) NOT NULL,
  `close` int(10) NOT NULL COMMENT '站点维护开关'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `zdclose` (`id`, `close`) VALUES
(1, 0);

INSERT INTO `yudb` (`id`, `user`, `password`, `webQQ`, `web_yy`, `authorname`, `title2`, `Keywords`, `description`) VALUES
(1, '', 'ae8616940522000d3b27dc73aac8347c', '914205978', 'https://api.nuoyis.com/yu-api/yiyan.php', '诺依阁', '希望之花，在这里绽放', '诺依阁，自我介绍，站长奋斗', '来自站长的自我介绍，多多交流和了解站长吧');

ALTER TABLE `yudb` ADD PRIMARY KEY(`id`);
ALTER TABLE `zdclose` ADD PRIMARY KEY(`id`);
ALTER TABLE `yuip` ADD PRIMARY KEY(`id`);
ALTER TABLE `yulogin-ip` ADD PRIMARY KEY(`id`);