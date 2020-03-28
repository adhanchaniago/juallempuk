DROP TABLE IF EXISTS`users`;
CREATE TABLE `users`
(
`id_user` int(10)AUTO_INCREMENT NOT NULL,
`name` varchar(50)NOT NULL,
`email` varchar(32)NOT NULL,
`gender` enum('M','F')NOT NULL,
`age` year NOT NULL,
`username` varchar(10)NOT NULL,
`level` varchar(5)NOT NULL,
`password` varchar(32)NOT NULL,
`referal` varchar(30)NOT NULL,
`time` datetime NOT NULL,
`region` varchar(30)NOT NULL,
`status` enum('on','off') NOT NULL,
`pp` varchar(30)NOT NULL,
PRIMARY KEY(`id_user`)
);
DROP TABLE IF EXISTS `site`;
CREATE TABLE `site`
(
`id_site` int(10)AUTO_INCREMENT NOT NULL,
`id_user` int(10)NOT NULL,
`platform` varchar(20)NOT NULL,
`site_title` varchar(32)NOT NULL,
`site_url` varchar(31)NOT NULL,
`site_desc` varchar(50)NOT NULL,
`category` varchar(32)NOT NULL,
`region` varchar(30)NOT NULL,
`html_code` text NOT NULL,
`point` int(5)NOT NULL,
`view` int(5)NOT NULL,
PRIMARY KEY(`id_site`)
);

DROP TABLE IF EXISTS `platform`;
CREATE TABLE `platform`
(
id_platform int(2)NOT NULL AUTO_INCREMENT,
platform_name varchar(20)NOT NULL,
link_platform varchar(20)NOT NULL,
icon varchar(30)NOT NULL,
PRIMARY KEY(`id_platform`)
);


DROP TABLE IF EXISTS `region`;
CREATE TABLE `region`
(
id_region int(2)NOT NULL AUTO_INCREMENT,
region_code varchar(10)NOT NULL,
region_name varchar(50)NOT NULL,
PRIMARY KEY(`id_region`)
);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`
(
id_category int(2)NOT NULL AUTO_INCREMENT,
category_code varchar(10)NOT NULL,
category_name varchar(30)NOT NULL,
PRIMARY KEY(`id_category`)
);

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`
(
id_post int(10)NOT NULL AUTO_INCREMENT,
id_site int(10)NOT NULL,
title varchar(100)NOT NULL,
url varchar(100)NOT NULL,
view int(4)NOT NULL,
time int(12)NOT NULL,
PRIMARY KEY(`id_post`)
);

DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner`
(
id_partner int(10)NOT NULL AUTO_INCREMENT,
url varchar(100)NOT NULL,
title varchar(50)NOT NULL,
description varchar(50)NOT NULL,
PRIMARY KEY(`id_partner`)
);

DROP TABLE IF EXISTS `icon`;
CREATE TABLE IF NOT EXISTS `icon`
(
id_icon int(2)NOT NULL AUTO_INCREMENT PRIMARY KEY,
platform varchar(20)NOT NULL,
ico varchar(20)NOT NULL
);

DROP TABLE IF EXISTS `user_online`;
CREATE TABLE IF NOT EXISTS `user_online` (
`session_id` char(100) NOT NULL DEFAULT '',
`timestamp` int(11) NOT NULL DEFAULT '0'
);

DROP TABLE IF EXISTS `admin_set`;
CREATE TABLE IF NOT EXISTS `admin_set`
(
id int(2)NOT NULL AUTO_INCREMENT PRIMARY KEY,
`head_title` varchar(50)NOT NULL,
`head_meta` text NOT NULL,
`favicon` varchar(100)not null,
`description` varchar(255)NOT NULL,
`lim` int(2)not null
);

DROP TABLE IF EXISTS `inbox`;

CREATE TABLE `inbox`
(
`id` int(10)NOT NULL AUTO_INCREMENT,
`id_user` int(10)NOT NULL,
`id_teman` int(10)NOT NULL,
`entry` varchar(50)NOT NULL,
`baca` enum('yes','no')not null,
`waktu` varchar(12)NOT NULL,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum`
(
`id` int(10)NOT NULL AUTO_INCREMENT,
`entry` text NOT NULL,
`author` int(10)NOT NULL,
`waktu` int(11)NOT NULL,
PRIMARY KEY(`id`)
);
DROP TABLE IF EXISTS `view`;
CREATE TABLE `view`
(
`id` int(10)NOT NULL AUTO_INCREMENT,
`session` char(100)NOT NULL,
`id_user` int(11)NOT NULL,
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `thread`;
CREATE TABLE `thread`
(
`id_thread` int(10)NOT NULL AUTO_INCREMENT,
`title` varchar(200)NOT NULL,
`author` int(10)NOT NULL,
`entry` text not null,
`view` int(5)not null,
`waktu` int(12)NOT NuLL,
PRIMARY KEY(`id_thread`)
);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`
(
`id` int(10)NOT NULL AUTO_INCREMENT,
`id_thread` int(10)NOT NULL,
`id_user` int(10)NOT NULL,
`entry` text not null,
`waktu` int(12)not null,
PRIMARY KEY(`id`)
);