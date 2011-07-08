<?php
/*	KayFish Post System:		Used for using KayFish as a CMS
Setup:
	1:	open _lib/runtime.php in a text editor
	2:	insert this line after the includes:
			require_once('_lib/posts.php');
	3:	upload _lib/runtime.php to your _lib folder on your site.
	4:	Copy the SQL below into your database:
	
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
*/

function insert_post($arr){
	global $kfdb;
	$arr['post_date'] = date("Y-m-d H:i:s");
	$arr['post_modified'] = date("Y-m-d H:i:s");
	$cat = "";
	if( isset($arr['post_terms']) ){
		$cat = $arr['post_terms'];
		unset($arr['post_terms']);
	}
	$result = $kfdb->insert("posts", $arr);
	if( !empty($cat) || is_array($cat) ){
		$pid = $kfdb->insert_id;
		if( is_array($cat) ){
			foreach($cat as $c){
				insert_relationship($c,$pid);
			}
		}else{
			$cat = explode(",",$cat);
			foreach($cat as $c){
				insert_relationship($c,$pid);
			}
		}
	}
	return $result;
}
function update_post($id,$arr){
	global $kfdb;
	$arr['post_modified'] = date("Y-m-d H:i:s");
	$cat = "";
	if( isset($arr['post_terms']) ){
		$cat = $arr['post_terms'];
		unset($arr['post_terms']);
	}
	$result = $kfdb->update("posts", $arr,"ID='{$id}'");
	if( !empty($cat) || is_array($cat) ){
		if( is_array($cat) ){
			foreach($cat as $c){
				insert_relationship($c,$id);
			}
		}else{
			$cat = explode(",",$cat);
			foreach($cat as $c){
				insert_relationship($c,$id);
			}
		}
	}
	return $result;
}
function query_posts($arr){
	global $kfdb;
	if( isset($arr['id']) )			$id = $arr['id'];
	if( isset($arr['title']) )		$title = $arr['title'];
	if( isset($arr['type']) )		$type = $arr['type'];
	if( isset($arr['user_id']) )	$user_id = $arr['user_id'];
	if( isset($arr['parent']) )		$parent = $arr['parent'];
	if( isset($arr['category']) )	$category = $arr['category'];
	if( isset($arr['meta_key']) )	$meta_key = $arr['meta_key'];
	if( isset($arr['meta_value']) )	$meta_value = $arr['meta_value'];
	if( !empty($category) ){
#		$sql = "SELECT posts.* FROM posts WHERE ID=(SELECT object_id AS ID FROM term_relationships WHERE term_taxonomy_id='{$category}'";
		$sql = "SELECT * FROM posts WHERE post_category='%{$category}%'";
	}else{
		if( !empty($title) && !empty($type) ){
			$sql = "SELECT * FROM posts WHERE post_title='{$title}' AND post_type='{$type}'";
		}else if( !empty($meta_key) ){
			$sql = "SELECT posts.* FROM posts WHERE ID=(SELECT post_id AS ID FROM postmeta WHERE meta_key LIKE '%{$meta_key}%'";
		}else if( !empty($meta_value) ){
			$sql = "SELECT posts.* FROM posts WHERE ID=(SELECT post_id AS ID FROM postmeta WHERE meta_value LIKE '%{$meta_value}%'";
		}else if( !empty($title) ){
			$sql = "SELECT * FROM posts WHERE post_title='{$title}'";
		}else if( !empty($type) ){
			$sql = "SELECT * FROM posts WHERE post_type='{$type}'";
		}else if( !empty($id) ){
			$sql = "SELECT * FROM posts WHERE ID='{$id}'";	
		}else if( !empty($parent) ){
			$sql = "SELECT * FROM posts WHERE post_parent='{$parent}'";	
		}else if( !empty($user_id) ){
			$sql = "SELECT * FROM posts WHERE user_id='{$user_id}'";	
		}
	}
	$res = mysql_get_results($sql);
	return $res;
}
function update_post_meta($post_id,$key,$val) {
	set_postmeta($post_id,$key,$val);
}
function set_postmeta($post_id,$key,$val){
	global $kfdb;
	if( is_array($val) || is_object($val) ){
		$val = serialize($val);
	}
	$kfdb->query("DELETE FROM postmeta WHERE post_id='{$post_id}' AND meta_key='{$key}'");
	$kfdb->query("INSERT INTO postmeta (post_id,meta_key,meta_value) VALUES('{$post_id}','{$key}','{$val}')");
}
function get_postmeta($post_id,$key = '') {
	global $kfdb;
	if (empty($key)){
		$var = mysql_get_results("SELECT meta_value FROM postmeta WHERE post_id='{$post_id}'");
	}else{
		$var = mysql_get_var("SELECT meta_value FROM postmeta WHERE post_id='{$post_id}' AND meta_key='{$key}'");
	}
	return maybe_unserialize($var);
}
function insert_term($name,$slug='',$term_group=0){
	$arr = array(
		"name"=>$name,
		"slug"=>$slug,
		"term_group"=>$term_group
	);
	$result = $kfdb->insert("terms", $arr);
	return $result;
}
function update_term($id,$name,$slug='',$term_group=0){
	$arr = array(
		"name"=>$name,
		"slug"=>$slug,
		"term_group"=>$term_group
	);
	$result = $kfdb->update("terms", $arr,"term_id='{$id}'");
	return $result;
}
function insert_taxonomy($term_id,$taxonomy,$description,$parent,$count){
	$arr = array(
		"term_id"=>$term_id,
		"taxonomy"=>$taxonomy,
		"description"=>$description,
		"parent"=>$parent,
		"count"=>$count
	);
	$result = $kfdb->insert("term_taxonomy", $arr);
	return $result;
}
function update_taxonomy($id,$term_id,$taxonomy,$description,$parent,$count){
	$arr = array(
		"term_id"=>$term_id,
		"taxonomy"=>$taxonomy,
		"description"=>$description,
		"parent"=>$parent,
		"count"=>$count
	);
	$result = $kfdb->update("term_taxonomy", $arr,"term_taxonomy_id='{$id}'");
	return $result;
}
function query_terms($arr){
	global $kfdb;
	if( isset($arr['id']) )	$id = $arr['id'];
	if( isset($arr['post_id']) )	$post_id = $arr['post_id'];
	if( isset($arr['taxonomy']) )	$taxonomy = $arr['taxonomy'];
	if( isset($arr['name']) )	$taxonomy = $arr['name'];
	if( !empty($taxonomy) ){
		$sql = "SELECT terms.* FROM terms WHERE term_id=(SELECT object_id AS term_id FROM term_taxonomy WHERE taxonomy='{$taxonomy}'";
	}else if( !empty($post_id) ){
		$sql = "SELECT terms.* FROM terms WHERE post_id=(SELECT term_taxonomy_id AS post_id FROM term_relationships WHERE object_id='{$post_id}'";
	}else if( !empty($name) ){
		$sql = "SELECT * FROM terms WHERE name='{$name}' || slug='{$name}'";
	}else if( !empty($id) ){
		$sql = "SELECT * FROM terms WHERE term_id='{$id}'";	
	}
	$res = mysql_get_results($sql);
	return $res;
}
function insert_relationship($term_id,$object_id){
	$arr = array(
		"object_id"=>$object_id,
		"term_taxonomy_id"=>$term_id
	);
	$result = $kfdb->insert("term_relationships", $arr);
	return $result;
}


?>