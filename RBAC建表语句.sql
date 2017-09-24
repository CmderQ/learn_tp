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

CREATE TABLE `cms_role` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='角色表';

CREATE TABLE `cms_user_role` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uid` INT(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` INT(11) NOT NULL DEFAULT '0' COMMENT '角色ID',
  `created_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='用户角色表';

CREATE TABLE `cms_access` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '权限名称',
  `urls` VARCHAR(1000) NOT NULL DEFAULT '' COMMENT 'json 数组',
  `status` TINYINT(1) NOT NULL DEFAULT '1' COMMENT '状态 1：有效 0：无效',
  `updated_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后一次更新时间',
  `created_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='权限详情表';

CREATE TABLE `cms_role_access` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` INT(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `access_id` INT(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  `created_time` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '插入时间',
  PRIMARY KEY (`id`),
  KEY `idx_role_id` (`role_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='角色权限表';

CREATE TABLE `cms_access_log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `uid` BIGINT(20) NOT NULL DEFAULT '0' COMMENT '品牌UID',
  `target_url` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '访问的url',
  `query_params` LONGTEXT NOT NULL COMMENT 'get和post参数',
  `ua` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '访问ua',
  `ip` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '访问ip',
  `note` VARCHAR(1000) NOT NULL DEFAULT '' COMMENT 'json格式备注字段',
  `created_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COMMENT='用户操作记录表';


INSERT INTO `cms_user` (`id`, `name`, `email`, `is_admin`, `status`, `updated_time`, `created_time`)
VALUES(1, '超级管理员', 'cmder111@qq.com', 1, 1, '', '');