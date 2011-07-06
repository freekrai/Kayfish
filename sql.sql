CREATE TABLE `terms` (
	term_id bigint(20) NOT NULL auto_increment,
	name varchar(55) NOT NULL default '',
	slug varchar(200) NOT NULL default '',
	term_group bigint(10) NOT NULL default 0,
	PRIMARY KEY	(term_id),
	UNIQUE KEY slug (slug)
);
CREATE TABLE `term_taxonomy` (
	term_taxonomy_id bigint(20) NOT NULL auto_increment,
	term_id bigint(20) NOT NULL default 0,
	taxonomy varchar(32) NOT NULL default '',
	description longtext NOT NULL,
	parent bigint(20) NOT NULL default 0,
	count bigint(20) NOT NULL default 0,
	PRIMARY KEY	(term_taxonomy_id),
	UNIQUE KEY term_id_taxonomy (term_id,taxonomy)
);
CREATE TABLE `term_relationships` (
	object_id bigint(20) NOT NULL default 0,
	term_taxonomy_id bigint(20) NOT NULL default 0,
	PRIMARY KEY	(object_id,term_taxonomy_id),
	KEY term_taxonomy_id (term_taxonomy_id)
);
CREATE TABLE `users` (
	ID bigint(20) unsigned NOT NULL auto_increment,
	user_login varchar(60) NOT NULL default '',
	user_pass varchar(64) NOT NULL default '',
	user_nicename varchar(50) NOT NULL default '',
	user_email varchar(100) NOT NULL default '',
	user_url varchar(100) NOT NULL default '',
	user_registered datetime NOT NULL default '0000-00-00 00:00:00',
	user_activation_key varchar(60) NOT NULL default '',
	user_status int(11) NOT NULL default '0',
	display_name varchar(250) NOT NULL default '',
	PRIMARY KEY	(ID),
	UNIQUE KEY user_login_key (user_login),
	KEY user_nicename (user_nicename)
);
CREATE TABLE `usermeta` (
	umeta_id bigint(20) NOT NULL auto_increment,
	user_id bigint(20) NOT NULL default '0',
	meta_key varchar(255) default NULL,
	meta_value longtext,
	PRIMARY KEY	(umeta_id),
	KEY user_id (user_id),
	UNIQUE KEY ukey (user_id,meta_key),
	KEY meta_key (meta_key)
);

CREATE TABLE IF NOT EXISTS `settings`(
	`setting_id` SERIAL,
	`setting_key` VARCHAR(50) NOT NULL,
	`setting_value` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`setting_id`),
	UNIQUE KEY setting_key (setting_key)
);

CREATE TABLE `postmeta` (
	`meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	`post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
	`meta_key` varchar(255) DEFAULT NULL,
	`meta_value` longtext,
	PRIMARY KEY (`meta_id`),
	KEY `post_id` (`post_id`),
	KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM	DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `posts` (
	`ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
	`post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`post_content` longtext NOT NULL,
	`post_title` text NOT NULL,
	`post_excerpt` text NOT NULL,
	`post_password` varchar(20) NOT NULL DEFAULT '',
	`post_name` varchar(200) NOT NULL DEFAULT '',
	`post_status` varchar(20) NOT NULL DEFAULT 'publish',
	`post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`post_content_filtered` text NOT NULL,
	`post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
	`guid` varchar(255) NOT NULL DEFAULT '',
	`post_category` varchar(255) NOT NULL DEFAULT '',
	`post_type` varchar(20) NOT NULL DEFAULT 'post',
	`post_mime_type` varchar(100) NOT NULL DEFAULT '',
	PRIMARY KEY (`ID`),
	KEY `post_name` (`post_name`),
	KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
	KEY `post_parent` (`post_parent`),
	KEY `post_category` (`post_category`),
	KEY `user_id` (`user_id`)
) ENGINE=MyISAM	DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
