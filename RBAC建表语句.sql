CREATE TABLE `cms_user` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT, 
  `name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `email` VARCHAR(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_admin` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '是否是超级管理员 1表示是 0 表示不是',
  `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_email` (`email`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 COMMENT='用户表';

CREATE TABLE IF NOT EXISTS `cms_access` (
  `role_id` SMALLINT(6) UNSIGNED NOT NULL,
  `node_id` SMALLINT(6) UNSIGNED NOT NULL,
  `level` TINYINT(1) NOT NULL,
  `module` VARCHAR(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `cms_node` (
  `id` SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `title` VARCHAR(50) DEFAULT NULL,
  `status` TINYINT(1) DEFAULT '0',
  `remark` VARCHAR(255) DEFAULT NULL,
  `sort` SMALLINT(6) UNSIGNED DEFAULT NULL,
  `pid` SMALLINT(6) UNSIGNED NOT NULL,
  `level` TINYINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `cms_role` (
  `id` SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `pid` SMALLINT(6) DEFAULT NULL,
  `status` TINYINT(1) UNSIGNED DEFAULT NULL,
  `remark` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=INNODB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `cms_role_user` (
  `role_id` MEDIUMINT(9) UNSIGNED DEFAULT NULL,
  `user_id` CHAR(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO `cms_user` (`id`, `name`, `email`, `is_admin`, `status`, `updated_time`, `created_time`)
VALUES(1, '超级管理员', 'cmder111@qq.com', 1, 1, '', '');