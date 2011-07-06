<?php
class Session {
	public static function commence(){
		if (!isset($_SESSION[SECRET]['ready'])) {
			session_start();
			$_SESSION[SECRET]['ready'] = true;
		}
	}	
	public static function set($key, $value){
		self::commence();
		$_SESSION[SECRET][$key] = $value;
	}	
	public static function get($key){
		self::commence();
		if (isset($_SESSION[SECRET][$key])){
			return $_SESSION[SECRET][$key];
		}		
		return false;
	}	
	public static function is_set($key){
		self::commence();
		if (isset($_SESSION[SECRET][$key])) {
			return true;
		}		
		return false;
	}	
	public static function delete($key){
		self::commence();
		unset($_SESSION[SECRET][$key]);
	}	
	public static function close(){
		if (isset($_SESSION[SECRET]['ready'])) {
			session_write_close();
		}
	}
}
?>