/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.5-10.1.21-MariaDB 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `cms_login` (
	`id` double ,
	`user_name` varchar (90),
	`password` varchar (300),
	`email` varchar (90),
	`creatime` datetime 
); 
insert into `cms_login` (`id`, `user_name`, `password`, `email`, `creatime`) values('1','cmderQ','$1$7nZlAovT$YoWX7HGmK86nxyeoBV3kl1','123@qq.com','2017-08-13 23:35:46');
