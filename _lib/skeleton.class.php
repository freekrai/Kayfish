<?php
class skeleton {
	function skeleton() {
		$this->__construct();
	}
	function __construct() {
		$this->thing = get_class($this);
		$vars = array();
		foreach($this as $key => $value) $vars[preg_replace('/^'.preg_quote($this->thing.'_', '/').'/', '', $key)] = $value;
		foreach($vars as $key => $value) $this->$key = $value;
	}
	function get_id() {
		return $this->id;
	}
	function the_id() {
		echo $this->get_id();
	}
	function the_options() {
	}
	function the_row_info() {
		if (!is_admin()) return false;
		echo ' id="'.$this->thing.'-'.$this->get_id().'" class="'.$this->thing.'"';
	}
}
?>