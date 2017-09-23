CREATE TABLE IF NOT EXISTS `cms_access` (
  `role_id` SMALLINT(6) UNSIGNED NOT NULL,
  `node_id` SMALLINT(6) UNSIGNED NOT NULL,
  `level` TINYINT(1) NOT NULL,
  `module` VARCHAR(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MYISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `cms_role` (
  `id` SMALLINT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `pid` SMALLINT(6) DEFAULT NULL,
  `status` TINYINT(1) UNSIGNED DEFAULT NULL,
  `remark` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MYISAM  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `cms_role_user` (
  `role_id` MEDIUMINT(9) UNSIGNED DEFAULT NULL,
  `user_id` CHAR(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;