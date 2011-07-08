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