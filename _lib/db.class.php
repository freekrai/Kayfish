<?php
define('OBJECT','OBJECT',true);
define('ARRAY_A','ARRAY_A',true);
define('ARRAY_N','ARRAY_N',true);
class kfdb {
	public $conn;
	private $last_query;
	private $last_result = array();
	private $num_queries;
	private $num_rows;
	private $result;
	private $rows_affected;
	private $col_info = array();
	private $insert_id;
	public function __construct($host,$user,$pass,$db) {
		$this->conn = mysqli_connect($host, $user, $pass, $db);
	}
	public function __destruct(){
//		mysqli_close($this->conn);
	}
	public function flush(){
		$this->last_result = null;
		$this->col_info = null;
		$this->last_query = null;
		$this->from_disk_cache = false;
	}
	public function get_conn(){
		return $this->conn;
	}
	
	public function lastid(){
		return $this->insert_id;
	}
	function delete($table, $where, $limit = 1) {
		if (empty($where)) return false;
		
		$limitStr = '';
		$limit = (int)$limit;
		if ($limit > 0) $limit .= ' LIMIT '.$limit;
		return $this->query('DELETE FROM `'.$table.'` WHERE '.$where.$limitStr);
	}
	function insert($table, $data) {
		if (empty($table) || empty($data)) return false;
		$query = 'INSERT INTO `'.$table.'` (`'.implode('`, `', array_keys($data)).'`) VALUES("'.implode('", "', array_map('escape', $data)).'")';
//		echo $query;
		return $this->query($query);
//		if ($result === true)	$this->insert_id = @mysqli_insert_id($this->conn);		
	}
	function update($table, $data, $where, $limit = 1) {
		if (empty($table) || empty($data) || !is_array($data) || empty($where)) return false;
		
		$query_format = array();
		foreach($data as $key => $value)
			$query_format[] = "`$key` = '".escape($value)."'";
		
		$limitStr = '';
		$limit = (int)$limit;
		if ($limit > 0) $limit .= ' LIMIT '.$limit;
		$query = 'UPDATE `'.$table.'` SET '.implode(', ', $query_format).' WHERE '.$where.$limitStr;
#		echo $query;
		return $this->query($query);
	}
	public function query($query){
		$this->flush();
		$query = trim($query);
		$this->last_query = $query;
		$this->num_queries++;
		$this->result = @mysqli_query($this->conn,$query);
		if ( $str = @mysqli_error($this->conn) ){
			$is_insert = true;
			return false;
		}
		$is_insert = false;
		if ( preg_match("/^(insert|delete|update|replace)\s+/i",$query) ){
			$this->rows_affected = @mysqli_affected_rows();
			if ( preg_match("/^(insert|replace)\s+/i",$query) ){
				$this->insert_id = @mysqli_insert_id($this->conn);
			}
			$return_val = $this->rows_affected;
		}else{
			$i=0;
			while ($i < @mysqli_num_fields($this->result)){
				$this->col_info[$i] = @mysqli_fetch_field($this->result);
				$i++;
			}
			$num_rows=0;
			while ( $row = @mysqli_fetch_object($this->result) ){
				$this->last_result[$num_rows] = $row;
				$num_rows++;
			}
			@mysqli_free_result($this->result);
			$this->num_rows = $num_rows;
			$return_val = $this->num_rows;
		}
		return $return_val;
	}
	public function get_var($query=null,$x=0,$y=0){
		if ( $query ){
			$this->query($query);
		}
		if ( $this->last_result[$y] ){
			$values = array_values(get_object_vars($this->last_result[$y]));
		}
		return (isset($values[$x]) && $values[$x]!=='')?$values[$x]:null;
	}
	public function get_row($query=null,$output=OBJECT,$y=0){
		if ( $query ){
			$this->query($query);
		}
		if ( $output == OBJECT ){
			return $this->last_result[$y]?$this->last_result[$y]:null;
		}elseif ( $output == ARRAY_A ){
			return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
		}elseif ( $output == ARRAY_N ){
			return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
		}else{
			// error;
		}
	}
	public function get_results($query=null, $output = OBJECT){
		if ( $query ){
			$this->query($query);
		}
		if ( $output == OBJECT ){
			return $this->last_result;
		}elseif ( $output == ARRAY_A || $output == ARRAY_N ){
			if ( $this->last_result ){
				$i=0;
				foreach( $this->last_result as $row ){
					$new_array[$i] = get_object_vars($row);
					if ( $output == ARRAY_N ){
						$new_array[$i] = array_values($new_array[$i]);
					}
					$i++;
				}
				return $new_array;
			}else{
				return null;
			}
		}
	}
	public function _weak_escape( $string ){
		return addslashes( $string );
	}
	public function _real_escape( $string ){
		if ( $this->conn && $this->real_escape ) {
			return mysqli_real_escape_string( $string, $this->conn );
		} else {
			return addslashes( $string );
		}
	}
	public function _escape( $data ){
		if ( is_array( $data ) ) {
			foreach ( (array) $data as $k => $v ) {
				if ( is_array( $v ) ) {
					$data[$k] = $this->_escape( $v );
				} else {
					$data[$k] = $this->_real_escape( $v );
				}
			}
		} else {
			$data = $this->_real_escape( $data );
		}
		return $data;
	}
	public function escape( $data ){
		if ( is_array( $data ) ) {
			foreach ( (array) $data as $k => $v ) {
				if ( is_array( $v ) ) {
					$data[$k] = $this->escape( $v );
				} else {
					$data[$k] = $this->_weak_escape( $v );
				}
			}
		} else {
			$data = $this->_weak_escape( $data );
		}
		return $data;
	}
	public function escape_by_ref( &$string ){
		$string = $this->_real_escape( $string );
	}
	public function escape_deep( $array ){
		return $this->_escape( $array );
	}
}
function mysql_get_var($query,$x=0,$y=0){
	return mysqli_get_var($query,$x,$y);
}

function mysqli_get_var($query,$x=0,$y=0){
	global $kfdb;
	return $kfdb->get_var($query,$x,$y);
}
function mysql_get_results($query){
	return mysqli_get_results($query);
}
function mysqli_get_results($query){
	global $kfdb;
	return $kfdb->get_results($query);
}
function mysql_get_no_results($query){
	return mysqli_get_no_results($query);
}
function mysqli_get_no_results($query){
	global $kfdb;
	$kfdb->query($query);
}
if (!function_exists('escape')) {
	function escape($str = '') {
		global $kfdb;
		return $kfdb->escape($str);
//		return addslashes($str);
	}
	function unescape($str = ''){
		$str = stripslashes($str);
		$str = str_replace("\\","",$str);
		return $str;
	}
}
function stripslashes_deep($value){
	$value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
	return $value;
}
function cleanLike($q) {
	$text = str_replace('_', '%', clean_url(trim($q)));
	return '%'.$text.'%';
}
