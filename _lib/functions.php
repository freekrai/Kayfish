<?php
function is_admin() {
	return (defined('ISADMIN') && ISADMIN === true);
}
function is_logged_in() {
	$cookie = get_global($_COOKIE, 'loggedIn');
	$explode = explode('_', $cookie);
	
	if (!empty($cookie) && !empty($explode) && count($explode) === 2) {
		$user = get_single_item(array('table' => 'users','class' => 'user','where' => '`user_login` = "'.escape($explode['0']).'"'));		
		return (!empty($user)) ? ($cookie === $user->get_username().'_'.md5(SECRET.sha1($user->get_password().get_date('n')))) : false;
	} else return false;
}
function get_user_details($uid){
	$user = get_single_item(array('table' => 'users','class' => 'user','where' => '`ID` = "'.$uid.'"'));
	return $user;
}

function currentuser() {
	if (!is_logged_in()) return false;
	static $user;
	if (empty($user)) {
		$cookie = get_global($_COOKIE, 'loggedIn');
		$explode = explode('_', $cookie);
		$user = get_single_item(array('table' => 'users','class' => 'user','where' => '`user_login` = "'.$explode['0'].'"'));
	}
	Session::set("user",$user);
	return $user;
}

function admin_login($usern,$pass){
	if ( !is_logged_in()) {
		$error = false;
		if (empty($usern) || empty($pass)) $error = true;
		$user = get_single_item(array(
			'table' => "users",
			'class' => 'user',
			'where' => '`user_login` = "'.escape($usern).'" AND `user_pass` = "'.md5($pass).'"'
		));
		if (!empty($user)){
			$good = 0;
			if( get_usermeta($user->ID,'is_admin') == 1 )	$good = 1;
			if($good ){
				setcookie('loggedIn', $usern.'_'.md5(SECRET.sha1(md5($pass).get_date('n'))), time()+(60*60*24*30), '/');
			}
			header('Location: /admin');
			exit;
		}
	}else{
		header('Location: /admin');
		exit;
	}
}


function login($usern,$pass){
	if ( !is_logged_in()) {
		$error = false;
		if (empty($usern) || empty($pass)) $error = true;
		$user = get_single_item(array(
			'table' => "users",
			'class' => 'user',
			'where' => '`user_login` = "'.escape($usern).'" AND `user_pass` = "'.md5($pass).'"'
		));
		if (!empty($user)){
			setcookie('loggedIn', $usern.'_'.md5(SECRET.sha1(md5($pass).get_date('n'))), time()+(60*60*24*30), '/');
			header('Location: /account');
			exit;
		}
	}else{
		header('Location: /account');
		exit;
	}
}
function update_user_meta($uid,$key,$val) {
	set_usermeta($uid,$key,$val);
}
function set_usermeta($uid,$key,$val){
	global $kfdb;
	if( is_array($val) || is_object($val) ){
		$val = serialize($val);
	}
	$kfdb->query("DELETE FROM usermeta WHERE user_id='{$uid}' AND meta_key='{$key}'");
	$kfdb->query("INSERT INTO usermeta (user_id,meta_key,meta_value) VALUES('{$uid}','{$key}','{$val}')");
}
function get_usermeta($uid,$key = '') {
	global $kfdb;
	if (empty($key)){
		$var = mysql_get_results("SELECT meta_value FROM usermeta WHERE user_id='{$uid}'");
	}else{
		$var = mysql_get_var("SELECT meta_value FROM usermeta WHERE user_id='{$uid}' AND meta_key='{$key}'");
	}
	return maybe_unserialize($var);
}
function parse_args( $args, $defaults = '' ) {
	if ( is_object( $args ) )
		$r = get_object_vars( $args );
	elseif ( is_array( $args ) )
		$r =& $args;
	else
		wp_parse_str( $args, $r );

	if ( is_array( $defaults ) )
		return array_merge( $defaults, $r );
	return $r;
}
function set_option($key,$val){
	global $kfdb;
	if( is_array($val) || is_object($val) ){
		$val = serialize($val);
	}
	$res = $kfdb->query("INSERT INTO settings (setting_key,setting_value) VALUES('{$key}','{$val}') ON DUPLICATE KEY UPDATE setting_value = '{$val}'");
}
function get_option($key = '') {
	if (empty($key)) return false;
	static $settings;
	if (empty($settings)) {
		$settings = new items(array('table' => "settings",'pagination' => false));
	}
	$ob = get_single_item(array('setting_key', $key), $settings);
	return (!empty($ob)) ? maybe_unserialize($ob->setting_value) : false;
}
function maybe_unserialize( $original ) {
	if ( is_serialized( $original ) )
		return @unserialize( $original );
	return $original;
}
function is_serialized( $data ) {
	// if it isn't a string, it isn't serialized
	if ( !is_string( $data ) )
		return false;
	$data = trim( $data );
	if ( 'N;' == $data )
		return true;
	if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
		return false;
	switch ( $badions[1] ) {
		case 'a' :
		case 'O' :
		case 's' :
			if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
				return true;
			break;
		case 'b' :
		case 'i' :
		case 'd' :
			if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
				return true;
			break;
	}
	return false;
}
function is_serialized_string( $data ) {
	// if it isn't a string, it isn't a serialized string
	if ( !is_string( $data ) )
		return false;
	$data = trim( $data );
	if ( preg_match( '/^s:[0-9]+:.*;$/s', $data ) ) // this should fetch all serialized strings
		return true;
	return false;
}
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
		$sql = "SELECT posts.* FROM posts WHERE ID=(SELECT object_id AS ID FROM term_relationships WHERE term_taxonomy_id='{$category}'";
#		$sql = "SELECT * FROM posts WHERE post_category='%{$category}%'";
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

function add_trailing_slash($str = '') {
	if (empty($str) || preg_match('|/$|', $str)) return $str;
	else return $str.'/';
}
function tsl($path) {
	return add_trailing_slash($path);
}
function bad_agent($agent = '') {
	return preg_match('/(Indy|Blaiz|Java|libwww-perl|Python|OutfoxBot|User-Agent|PycURL|AlphaServer|DigExt|Jakarta|Missigua|psycheclone|LinkWalker|ZyBorg|Waterunicorn|ICS)/i', $agent);
}
function bool2word($bool = true) {
	return ((bool)$bool === true) ? 'yes' : 'no';
}
function error($error = '', $files = true) {
	set_page_info('title', 'Error!');	
	if ($files === true) get_header();
	echo '<h2>Error!</h2>'."\n".'<p class="error">'.$error.' <a href="javascript:history.back();">Go back.</a></p>'."\n\n";
	if ($files === true) get_footer();
}

function get_date($format = '', $date = '', $mysql = false) {
	global $dateFormats;
	return date((!empty($format)) ? $format : $dateFormats['standard'], (!empty($date)) ? (($mysql) ? strtotime($date) + (60 * 60 * (int)get_option('timeoffset')) : $date) : time());
}

function get_gravatar($email = '', $size = 40) {
	if ($email == '') return;
	return 'http://www.gravatar.com/avatar.php?gravatar_id='.md5($email).'&amp;default=identicon&amp;size='.$size; 
}

function get_template($name, $title='', $separator = '|') {
	ob_start();
	$title = $title .' '.$separator.' '. SITENAME;
	$file = $name . ".php";
	include($file);
	$template = ob_get_contents();
	ob_end_clean(); 
	echo $template;
}
function get_site_path() {
	$path_parts = pathinfo($_SERVER['PHP_SELF']);
	$path_parts = str_replace("/includes", "", $path_parts['dirname']);
	#$fullpath = "http://". $_SERVER['SERVER_NAME'] . $path_parts ."/";	
	$fullpath = "http://". $_SERVER['SERVER_NAME'] . $path_parts;
	return rtrim($fullpath, '/');
}
function get_root_path() {
	$pos = str_replace('includes','', dirname(__FILE__));
	return $pos;
}

function get_footer() {
	global $config,$section;
	$pagePath = "sections/{$section}/footer.php";
	if( file_exists( $pagePath )){
		include($pagePath);
	}else{
#		if (is_admin()) include('sections/admin/footer.php');
		include('sections/_partials/footer.php');
	}
	exit;
}

function get_header() {
	global $config,$section;
	$pagePath = "sections/{$section}/header.php";
	if( file_exists( $pagePath )){
		include($pagePath);
	}else{
#		if (is_admin()) include('sections/admin/header.php');
		include('sections/_partials/header.php');
	}
}

function logXML($filename, $array,$root,$branch){
	$xmlLogger = new xmlLogger();
	$xmlLogger->logXML($filename,$array,$root,$branch); 
}
function getXMLLog($filename){
	$xmlLogger = new xmlLogger();
	return $xmlLogger->getXML($filename); 
}

function include_file($file = '', $vars = array()) {
	global $globals;
	if (empty($file)) return false;
	static $files = array();
	$vars = array_merge( (array)$globals, (array)$vars);	
	if (count($vars) > 0) eval('global $'.implode(', $', $vars).';');	
	if (!in_array($file, $files)) {
		include($file);
		$files[] = $file;
	}
	return true;
}

function get_title_from_content( $content ) {
	static $strlen =  null;
	if ( !$strlen ) {
			$strlen = function_exists( 'mb_strlen' )? 'mb_strlen' : 'strlen';
	}
	$max_len = 40;
	$title = $strlen( $content ) > $max_len? html_excerpt( $content, $max_len ) . '...' : $content;
	$title = trim( strip_tags( $title ) );
	$title = str_replace("\n", " ", $title);
	if ( !$title ) {
		if ( preg_match("/<object|<embed/", $content ) )
			$title = __( 'Video Post', 'p2' );
		elseif ( preg_match( "/<img/", $content ) )
			$title = __( 'Image Post', 'p2' );
	}
	return $title;
}

function strip_all_tags($string, $remove_breaks = false) {
	$string = preg_replace( '@<(script|style)[^>]*?>.*?@si', '', $string );
	$string = strip_tags($string);
	if ( $remove_breaks )	$string = preg_replace('/[\r\n\t ]+/', ' ', $string);
	return trim($string);
}

function html_excerpt( $str, $count ) {
	$str = strip_all_tags( $str, true );
	$str = mb_substr( $str, 0, $count );
	$str = preg_replace( '/&[^;\s]{0,6}$/', '', $str );
	return $str;
}

function get_post_data($html = false) {
	$c = array();
	if (!empty($_POST) && is_array($_POST)) foreach($_POST as $key => $value) $c[$key] = clean($value, $html);
	
	return $c;
}

function get_rand() {
	$length = rand(7, 12);
	
	$rand = (int) ((rand() + rand() + rand()) / rand()) + rand() - (rand()/2);
	if ($rand < 0) get_rand();
	
	$rand = md5($rand);
	if (rand(0, 1)) $rand = preg_replace('/[a-z]+/', '', $rand);
	if ($length > strlen($rand)) $length = strlen($rand);
	
	return substr($rand, 0, $length);
}

function get_single_item($options = array(), $object = null) {
	if (!is_null($object)) {
		foreach($object->items as $item) {
			if (isset($item->$options['0']) && $item->$options['0'] == $options['1']) return $item;
		}
	} else {
		$options['limit'] = 1;
		$options['pagination'] = false;
		$items = new items($options);
		if ($items->total === 1) return $items->items['0'];
		else return false;
	}
}

function get_slug($str = '') {
	return (!empty($str)) ? trim(preg_replace('/[-]+/', '-', preg_replace('/[ ]+/', '-', trim(preg_replace('/[^a-z0-9-]/', ' ', strtolower($str)))))) : '';
}

function make_link($options = array()) {
	$link = '<a href="'.$options['href'].'"';
	if (!empty($options['title'])) $link .= ' title="'.$options['title'].'"';
	if (!empty($options['class'])) $link .= ' class="'.$options['class'].'"';
	$link .= '>'.$options['text'].'</a>';
	return $link;
}
function remove_leading_slash($str = '') {
	return preg_replace('#^/#', '', $str);
}
function set_page_info($key = '', $value = '') {
	global $pageInfo;
	return $pageInfo[$key] = $value;
}
function valid_email($email) {
	if (strpos($email, '@') !== false && strpos($email, '.') !== false) return preg_match("/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i", $email);
	else return false;
}
function valid_password($password = '') {
	return (!empty($password) && preg_match('/^[a-zA-Z0-9_-]{6,14}$/', $password));
}
function valid_url($url) {
	return preg_match('/^(http|https|ftp):\/\/(([A-Z0-9][A-Z0-9_-]*)(\.[A-Z0-9][A-Z0-9_-]*)+)(:(\d+))?\/?/i', $url);
}
function valid_username($username = '') {
	return (!empty($username) && preg_match('/^[a-zA-Z0-9_-]{4,18}$/', $username));
}
function nice_array($array,$var_dump=false){echo '<pre>';if($var_dump){var_dump($array);}else{print_r($array);}echo '</pre>';}

function _e ($post=null,$db=null) {
	if($post != '') {
		echo $post;
	} elseif($db != '') {
		echo $db;
	} else {
		echo "";	
	}
}
function _r ($post=null,$db=null) {
	if($post != '') {
		return $post;
	} elseif($db != '') {
		return $db;
	} else {
		return "";	
	}
}
function phash($s) {
	$s = sha1($s);
	return $s;
}
function clean_url($text)	{ 
	if (function_exists('mb_strtolower')) {
 		$text = strip_tags(mb_strtolower($text)); 
	} else {
 		$text = strip_tags(strtolower($text)); 
	}
	$code_entities_match = array(' ?',' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','='); 
	$code_entities_replace = array('','-','-','','','','','','','','','','','','','','','','','','','','','','',''); 
	$text = str_replace($code_entities_match, $code_entities_replace, $text); 
	$text = urlencode($text);
	$text = str_replace('--', '-', $text);
	$text = str_replace('--', '-', $text); 
	$text = rtrim($text, '-');
	return $text; 
} 
function to7bit($text,$from_enc) {
	if (function_exists('mb_convert_encoding')) {
		$text = mb_convert_encoding($text,'HTML-ENTITIES',$from_enc);
	}
	$text = preg_replace(
			array('/&szlig;/','/&(..)lig;/',
 					'/&([aouAOU])uml;/','/&(.)[^;]*;/'),
			array('ss',"$1","$1".'e',"$1"),
			$text);
	return $text;
}
function convert_datetime($str) {
	list($date, $time) = explode(' ', $str);
	list($year, $month, $day) = explode('-', $date);
	list($hour, $minute, $second) = explode(':', $time);
	$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	return $timestamp;
}
function trunc($text,$chars=200) { 
	if (strlen($text) >= $chars) {
		$text = $text." "; 
		$text = substr($text,0,$chars); 
		$text = substr($text,0,strrpos($text,' ')); 
		$text = $text."..."; 
	}
	return $text; 
} 
function clean_img_name($text)	{ 
	if (function_exists('mb_strtolower')) {
		$text = strip_tags(mb_strtolower($text)); 
	} else {
		$text = strip_tags(strtolower($text)); 
	}
	$code_entities_match = array(' ?',' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','/','*','+','~','`','='); 
	$code_entities_replace = array('','-','-','','','','','','','','','','','','','','','','','','','','','','',''); 
	$text = str_replace($code_entities_match, $code_entities_replace, $text); 
	$text = urlencode($text);
	$text = str_replace('--','-',$text);
	$text = rtrim($text, "-");
	return $text; 
} 
function getFiles($path) {
	$handle = @opendir($path) or die("Unable to open $path");
	$file_arr = array();
	while ($file = readdir($handle)) {
					$file_arr[] = $file;
	}
	closedir($handle);
	return $file_arr;
}
function myself($echo=true) {
	if ($echo) {
		echo htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES);
	} else {
		return htmlentities($_SERVER['REQUEST_URI'], ENT_QUOTES);
	}
}
function create_cookie($name, $value) {
	return setcookie($name, $value, time()+(60*60*24*365),'/'); 	
}
function get_cookie($name) {
	if(cookie_check($name)==TRUE) { 
 		return $_COOKIE[$name];
	}
}
function cookie_check($name) {
	if(isset($_COOKIE[$name])) {
		return TRUE;
	}
	else {
		return FALSE;
	}
}
class SimpleXMLExtended extends SimpleXMLElement{ 	
	public function addCData($cdata_text){ 	
 	$node= dom_import_simplexml($this); 	
 	$no = $node->ownerDocument; 	
 	$node->appendChild($no->createCDATASection($cdata_text)); 	
	} 
} 
function getXML($file) {
		$xml = file_get_contents($file);
		$data = simplexml_load_string($xml, 'SimpleXMLExtended', LIBXML_NOCDATA);
		return $data;
}
function XMLsave($xml, $file) {
	$success = $xml->asXML($file) === TRUE;
	return $success && chmod($file, 0755);
}
function clean_js($text)	{ 
	if (function_exists('mb_strtolower')) {
 		$text = strip_tags(mb_strtolower($text)); 
	} else {
 		$text = strip_tags(strtolower($text)); 
	}
	$code_entities_match = array(' ?',' ','-','--','&quot;','!','?','@','#','$','%','^','&','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','='); 
	$text = str_replace($code_entities_match, '', $text); 
	$text = urlencode(to7bit($text));
	return str_replace('%','', $text); 
} 
function debug($array){
	echo '<pre>';
	var_dump($array);
	print_r($array);
	echo '</pre>';
	exit;
}
function super_unique($array){
	$result = array_map("unserialize", array_unique(array_map("serialize", $array)));
	foreach ($result as $key => $value)	{
		if ( is_array($value) )		{
			$result[$key] = super_unique($value);
		}
	}
	return $result;
}
function getDomain($url){
	$domainName = explode("/",$url);
	if(isset($domainName[2])) return $domainName[2];
	else return NULL;
}
function page_id() {
	$path = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);
	$file = basename($path,".php");	
	echo $file;	
}
function get_filepath() {
	$path = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);
	return $path;	
}
function get_filename() {
	$path = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES);
	$file = basename($path,".php");	
	return $file .'.php';	
}
function sendmail($to,$subject,$message) {
	if (defined('FROM_EMAIL_ADDRESS')){
		$fromemail = FROM_EMAIL_ADDRESS; 
	} else {
		$fromemail = 'noreply@example.com';
	}
	$headers  = "From: ".$fromemail."\r\n";
	$headers .= "Reply-To: ".$fromemail."\r\n";
	$headers .= "Return-Path: ".$fromemail."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
	if( mail($to,'=?UTF-8?B?'.base64_encode($subject).'?=',"$message",$headers) ) {
		return true;
	} else {
		return false;
	}
}
function display_messages($msg=null) {
	global $success;
	global $error;
	global $notice;
	if ($notice) {
		echo '<div class="flashMessage"><p>'.$notice.'</p>';
	}
	if ($error) {
		echo '<div class="flashMessage error"><p>'.$error.'</p>';
	}
	if ($success) {
		echo '<div class="flashMessage"><p>'.$success.'</p>';
	}
	if ($msg)	echo '<p>'.$msg.'</p>';
	echo '</div>';
}

function display_error($errors) {
	echo('<<div class="flashMessage error">');
	echo ("<p>Hold up!  There were some problems:</p>");
	foreach ($errors as $err)	echo("<p>".$err . "</p>");
	echo('</div>');
}

function TimeAgoInWords($from_time, $include_seconds = true) {
  $to_time = time();
  $mindist = round(abs($to_time - $from_time) / 60);
  $secdist = round(abs($to_time - $from_time));
 
  if ($mindist >= 0 and $mindist <= 1) {
    if (!$include_seconds) {
      return ($mindist == 0) ? 'less than a minute' : '1 minute';
	} else {
      if ($secdist >= 0 and $secdist <= 4) {
        return 'less than 5 seconds';
      } elseif ($secdist >= 5 and $secdist <= 9) {
        return 'less than 10 seconds';
      } elseif ($secdist >= 10 and $secdist <= 19) {
        return 'less than 20 seconds';
      } elseif ($secdist >= 20 and $secdist <= 39) {
        return 'half a minute';
      } elseif ($secdist >= 40 and $secdist <= 59) {
        return 'less than a minute';
      } else {
        return '1 minute';
      }
    }
  } elseif ($mindist >= 2 and $mindist <= 44) {
    return $mindist . ' minutes';
  } elseif ($mindist >= 45 and $mindist <= 89) {
    return 'about 1 hour';
  } elseif ($mindist >= 90 and $mindist <= 1439) {
    return 'about ' . round(floatval($mindist) / 60.0) . ' hours';
  } elseif ($mindist >= 1440 and $mindist <= 2879) {
    return '1 day';
  } elseif ($mindist >= 2880 and $mindist <= 43199) {
    return 'about ' . round(floatval($mindist) / 1440) . ' days';
  } elseif ($mindist >= 43200 and $mindist <= 86399) {
    return 'about 1 month';
  } elseif ($mindist >= 86400 and $mindist <= 525599) {
    return round(floatval($mindist) / 43200) . ' months';
  } elseif ($mindist >= 525600 and $mindist <= 1051199) {
    return 'about 1 year';
  } else {
    return 'over ' . round(floatval($mindist) / 525600) . ' years';
  }
}