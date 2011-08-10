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
	private $tables = array( 'posts', 'settings', 'postmeta','terms', 'term_taxonomy', 'term_relationships');
	private $global_tables = array( 'users', 'usermeta' );
	
	public function __construct($host,$user,$pass,$db) {
		$this->conn = mysql_connect($host, $user, $pass) or die("Couldn't connection to $host");
		mysql_select_db($db,$this->conn);
	}
	public function __destruct(){
		mysql_close($this->conn);
	}
	public function flush(){
		$this->last_result = null;
		$this->col_info = null;
		$this->last_query = null;
		$this->from_disk_cache = false;
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
		return $this->query($query);
//		if ($result === true)	$this->insert_id = @mysql_insert_id($this->conn);		
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
		return $this->query($query);
	}
	public function query($query){
		$this->flush();
		$query = trim($query);
		$this->last_query = $query;
		$this->num_queries++;
		$this->result = @mysql_query($query,$this->conn);
		if ( $str = @mysql_error($this->conn) ){
			$is_insert = true;
			return false;
		}
		$is_insert = false;
		if ( preg_match("/^(insert|delete|update|replace)\s+/i",$query) ){
			$this->rows_affected = @mysql_affected_rows();
			if ( preg_match("/^(insert|replace)\s+/i",$query) ){
				$this->insert_id = @mysql_insert_id($this->conn);
			}
			$return_val = $this->rows_affected;
		}else{
			$i=0;
			while ($i < @mysql_num_fields($this->result)){
				$this->col_info[$i] = @mysql_fetch_field($this->result);
				$i++;
			}
			$num_rows=0;
			while ( $row = @mysql_fetch_object($this->result) ){
				$this->last_result[$num_rows] = $row;
				$num_rows++;
			}
			@mysql_free_result($this->result);
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
	public function get_col($query){
		if ( $query )	$this->query( $query );
		$new_array = array();
		for ( $i = 0, $j = count( $this->last_result ); $i < $j; $i++ ) {
			$new_array[$i] = $this->get_var( null, $x, $i );
		}
		return $new_array;		
	}
	public function _weak_escape( $string ){
		return addslashes( $string );
	}
	public function _real_escape( $string ){
		if ( $this->conn && $this->real_escape ) {
			return mysql_real_escape_string( $string, $this->conn );
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
	public function tables( $scope = 'all') {
		switch ( $scope ) {
			case 'all' :
				$tables = array_merge( $this->global_tables, $this->tables );
				break;
			case 'notall' :
				$tables = $this->tables;
				break;
			case 'global' :
				$tables = $this->global_tables;
				break;
			default :
				return array();
				break;
		}
		foreach ( $tables as $k => $table ) {
			if ( in_array( $table, $global_tables ) )
				$tables[ $table ] = $table;
			else
				$tables[ $table ] = $table;
			unset( $tables[ $k ] );
		}
		return $tables;	
	}
}
function mysql_get_var($query,$x=0,$y=0){
	global $kfdb;
	return $kfdb->get_var($query,$x,$y);
}
function mysql_get_results($query){
	global $kfdb;
	return $kfdb->get_results($query);
}
function mysql_get_no_results($query){
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
function dbDelta($queries, $execute = true) {
	global $kfdb;
	if ( !is_array($queries) ) {
		$queries = explode( ';', $queries );
		if ('' == $queries[count($queries) - 1]) array_pop($queries);
	}
	$cqueries = array(); // Creation Queries
	$iqueries = array(); // Insertion Queries
	$for_update = array();
	foreach($queries as $qry) {
		if (preg_match("|CREATE TABLE ([^ ]*)|", $qry, $matches)) {
			$cqueries[trim( strtolower($matches[1]), '`' )] = $qry;
			$for_update[$matches[1]] = 'Created table '.$matches[1];
		} else if (preg_match("|CREATE DATABASE ([^ ]*)|", $qry, $matches)) {
			array_unshift($cqueries, $qry);
		} else if (preg_match("|INSERT INTO ([^ ]*)|", $qry, $matches)) {
			$iqueries[] = $qry;
		} else if (preg_match("|UPDATE ([^ ]*)|", $qry, $matches)) {
			$iqueries[] = $qry;
		} else {
			// Unrecognized query type
		}
	}
	if ($tables = $kfdb->get_col('SHOW TABLES;')) {
		foreach ($tables as $table) {
			if ( in_array($table, $kfdb->tables('global')) )	continue;
			if ( array_key_exists(strtolower($table), $cqueries) ) {
				$cfields = $indices = array();
				preg_match("|\((.*)\)|ms", $cqueries[strtolower($table)], $match2);
				$qryline = trim($match2[1]);
				$flds = explode("\n", $qryline);
				//echo "<hr/><pre>\n".print_r(strtolower($table), true).":\n".print_r($cqueries, true)."</pre><hr/>";
				foreach ($flds as $fld) {
					preg_match("|^([^ ]*)|", trim($fld), $fvals);
					$fieldname = trim( $fvals[1], '`' );
					$validfield = true;
					switch (strtolower($fieldname)) {
					case '':
					case 'primary':
					case 'index':
					case 'fulltext':
					case 'unique':
					case 'key':
						$validfield = false;
						$indices[] = trim(trim($fld), ", \n");
						break;
					}
					$fld = trim($fld);
					if ($validfield) {
						$cfields[strtolower($fieldname)] = trim($fld, ", \n");
					}
				}
				$tablefields = $kfdb->get_results("DESCRIBE {$table};");
				foreach ($tablefields as $tablefield) {
					if (array_key_exists(strtolower($tablefield->Field), $cfields)) {
						preg_match("|".$tablefield->Field." ([^ ]*( unsigned)?)|i", $cfields[strtolower($tablefield->Field)], $matches);
						$fieldtype = $matches[1];
						if ($tablefield->Type != $fieldtype) {
							$cqueries[] = "ALTER TABLE {$table} CHANGE COLUMN {$tablefield->Field} " . $cfields[strtolower($tablefield->Field)];
							$for_update[$table.'.'.$tablefield->Field] = "Changed type of {$table}.{$tablefield->Field} from {$tablefield->Type} to {$fieldtype}";
						}
						//echo "{$cfields[strtolower($tablefield->Field)]}<br>";
						if (preg_match("| DEFAULT '(.*)'|i", $cfields[strtolower($tablefield->Field)], $matches)) {
							$default_value = $matches[1];
							if ($tablefield->Default != $default_value) {
								$cqueries[] = "ALTER TABLE {$table} ALTER COLUMN {$tablefield->Field} SET DEFAULT '{$default_value}'";
								$for_update[$table.'.'.$tablefield->Field] = "Changed default value of {$table}.{$tablefield->Field} from {$tablefield->Default} to {$default_value}";
							}
						}
						unset($cfields[strtolower($tablefield->Field)]);
					} else {
						// This field exists in the table, but not in the creation queries?
					}
				}
				foreach ($cfields as $fieldname => $fielddef) {
					$cqueries[] = "ALTER TABLE {$table} ADD COLUMN $fielddef";
					$for_update[$table.'.'.$fieldname] = 'Added column '.$table.'.'.$fieldname;
				}
				$tableindices = $kfdb->get_results("SHOW INDEX FROM {$table};");
				if ($tableindices) {
					unset($index_ary);
					foreach ($tableindices as $tableindex) {
						$keyname = $tableindex->Key_name;
						$index_ary[$keyname]['columns'][] = array('fieldname' => $tableindex->Column_name, 'subpart' => $tableindex->Sub_part);
						$index_ary[$keyname]['unique'] = ($tableindex->Non_unique == 0)?true:false;
					}
					foreach ($index_ary as $index_name => $index_data) {
						$index_string = '';
						if ($index_name == 'PRIMARY') {
							$index_string .= 'PRIMARY ';
						} else if($index_data['unique']) {
							$index_string .= 'UNIQUE ';
						}
						$index_string .= 'KEY ';
						if ($index_name != 'PRIMARY') {
							$index_string .= $index_name;
						}
						$index_columns = '';
						foreach ($index_data['columns'] as $column_data) {
							if ($index_columns != '') $index_columns .= ',';
							$index_columns .= $column_data['fieldname'];
							if ($column_data['subpart'] != '') {
								$index_columns .= '('.$column_data['subpart'].')';
							}
						}
						$index_string .= ' ('.$index_columns.')';
						if (!(($aindex = array_search($index_string, $indices)) === false)) {
							unset($indices[$aindex]);
							//echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">{$table}:<br />Found index:".$index_string."</pre>\n";
						}else{
							//echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">{$table}:<br /><b>Did not find index:</b>".$index_string."<br />".print_r($indices, true)."</pre>\n";
						}
					}
				}
				foreach ( (array) $indices as $index ) {
					$cqueries[] = "ALTER TABLE {$table} ADD $index";
					$for_update[$table.'.'.$fieldname] = 'Added index '.$table.' '.$index;
				}
				unset($cqueries[strtolower($table)]);
				unset($for_update[strtolower($table)]);
			} else {
				// This table exists in the database, but not in the creation queries?
			}
		}
	}
	$allqueries = array_merge($cqueries, $iqueries);
	if ($execute) {
		foreach ($allqueries as $query) {
			//echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">".print_r($query, true)."</pre>\n";
			$kfdb->query($query);
		}
	}

	return $for_update;
}