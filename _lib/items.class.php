<?php
/*
@required variables:
	$mysql - mysql object
@required functions:
	include_file()
*/

class items {
	var $options;
	var $query;
	
	var $pagination;
	var $items;
	var $total;
	
	function items($options = array()) {
		$this->__construct($options);
	}
	
	function __construct($options = array()) {
		global $kfdb;
		
		// Error checking
		if (empty($options) || !is_array($options) || empty($options['table'])) exit('Please provide a table in the options parameter.');
#		if (empty($kfdb) || !is_object($kfdb) || get_class($kfdb) != 'mysql') exit('Make sure the $mysql variable is an instance of the mysql class.');
		
		// Call the functions.
		$this->setOptions($options);
		$this->buildQuery();
		$this->executeQuery();
	}
	
	function buildQuery() {
		global $kfdb;
		$query = $this->makeQuery(array(
			'select' => $this->getOption('select'),
			'table' => $this->getOption('table'),
			'where' => ($this->getOption('where') != '') ? $this->getOption('where') : '',
			'group' => ($this->getOption('group') != '') ? $this->getOption('group') : '',
			'having' => ($this->getOption('having') != '') ? $this->getOption('having') : '',
			'order' => ($this->getOption('order') != '') ? $this->getOption('order') : '',
			'limit' => ($this->getOption('limit') === false) ? (($this->getOption('pagination') !== false) ? (($this->getOption('perpage') * $this->pagination['page']) - $this->getOption('perpage')).','.$this->getOption('perpage') : '') : $this->getOption('limit')
		));
		return $this->query = $query;
	}
	function executeQuery() {
		$result = mysql_query($this->query,DBH);
		if ($result !== false) {
			if ($this->getOption('class') != '' && $this->getOption('class') != 'stdClass') {
				$file = '_lib/'.$this->getOption('class').'.class.php';
				if (file_exists($file)) include_file($file);
			}
			while($item = mysql_fetch_object($result, $this->getOption('class'))) {
				$this->items[] = $item;
			}
			if ($this->total <= 0) $this->total = count($this->items);
			return true;
		} else
			return false;
	}
	
	function getOption($key) {
		return (array_key_exists($key, $this->options)) ? $this->options[$key] : '';
	}
	function makeQuery($sections = array()) {
		$query = 'SELECT '.$sections['select'].' FROM `'.$sections['table'].'`';
		if (!empty($sections['where'])) $query .= ' WHERE '.$sections['where'];
		if (!empty($sections['group'])) $query .= ' GROUP BY '.$sections['group'];
		if (!empty($sections['having'])) $query .= ' HAVING '.$sections['having'];
		if (!empty($sections['order'])) $query .= ' ORDER BY '.$sections['order'];
		if (!empty($sections['limit'])) $query .= ' LIMIT '.$sections['limit'];
		return $query;
	}
	function needsPagination() {
		return ($this->pagination['pages'] > 1);
	}
	function pagination($type = 'words', $options = array(), $echo = true) {
/*
		if ($this->getOption('pagination') !== true) return;
		
		$self = clean($_SERVER['PHP_SELF']);
		if ($type == 'numbers') {
			$numbers = array();
			if ($this->getOption('pretty') === false) {
				for($i=1;$i<=$this->pagination['pages'];$i++) {
					if ($i == $this->pagination['page']) $numbers[] = '<strong>'.$i.'</strong>';
					elseif ($i === 1) $numbers[] = '<a href="'.$self.format_query_string($this->getOption('paginationVar'), '').'" title="Go to page 1">1</a>';
					else $numbers[] = '<a href="'.$self.format_query_string($this->getOption('paginationVar'), $i, true).'" title="Go to page '.$i.'">'.$i.'</a>';
				}
			} else {
				for($i=1;$i<=$this->pagination['pages'];$i++) {
					if ($i == $this->pagination['page']) $numbers[] = '<strong>'.$i.'</strong>';
					elseif ($i === 1) $numbers[] = '<a href="'.$this->getOption('comingFrom').format_query_string(NULL, false, false).'" title="Go to page 1">1</a>';
					else $numbers[] = '<a href="'.$this->getOption('comingFrom').$this->getOption('paginationVar').'/'.$i.'/'.format_query_string(NULL, false, false).'" title="Go to page '.$i.'">'.$i.'</a>';
				}
			}
			
			$pagination = implode(' ', $numbers);
		} else {
			$options = array_merge(array(
				'previous' => '&laquo; Previous Page',
				'previousTitle' => 'Previous Page',
				'previousClass' => '',
				'middle' => '&middot;',
				'forceMiddle' => false,
				'next' => 'Next Page &raquo;',
				'nextTitle' => 'Next Page',
				'nextClass' => ''
			), $options);
			$words = array();
			
			if ($this->pagination['previousPage'] !== false) {
				if ($this->getOption('pretty') === false) {
					if ($this->pagination['previousPage'] === 1) $url = $self.format_query_string($this->getOption('paginationVar'), '');
					else $url = $self.format_query_string($this->getOption('paginationVar'), $this->pagination['previousPage'], true);
				} else {
					if ($this->pagination['previousPage'] === 1) $url = $this->getOption('comingFrom').format_query_string(NULL, false, false);
					else $url = $this->getOption('comingFrom').$this->getOption('paginationVar').'/'.$this->pagination['previousPage'].'/'.format_query_string(NULL, false, false);
				}
				
				$word = '<a href="'.$url.'" title="'.$options['previousTitle'].'"';
				if (!empty($options['previousClass'])) $word .= ' class="'.$options['previousClass'].'"';
				$word .= '>'.$options['previous'].'</a>';
				
				$words[] = $word;
			}
			
			if ($options['forceMiddle'] === true || ($this->pagination['previousPage'] !== false && $this->pagination['nextPage'] !== false)) $words[] = $options['middle'];
			
			if ($this->pagination['nextPage'] !== false) {
				if ($this->getOption('pretty') === false) $url = $self.format_query_string($this->getOption('paginationVar'), $this->pagination['nextPage'], true);
				else $url = $this->getOption('comingFrom').$this->getOption('paginationVar').'/'.$this->pagination['nextPage'].'/'.format_query_string(NULL, false, false);
				
				$word = '<a href="'.$url.'" title="'.$options['nextTitle'].'"';
				if (!empty($options['nextClass'])) $word .= ' class="'.$options['nextClass'].'"';
				$word .= '>'.$options['next'].'</a>';
				
				$words[] = $word;
			}
			
			$pagination = implode(' ', $words);
		}
		
		if ($echo === true) echo $pagination;
		else return $pagination;
*/		
	}
	
	function setOptions($options = array()) {
		// Set the options to the options array so the other functions can work with it.
		$options = array_map('trim', $options);
		$this->options = array_merge(array(
			'select' => '*',
			'where' => '',
			'group' => '',
			'having' => '',
			'order' => '',
			'limit' => false,
			'class' => 'stdClass',
			'pretty' => false,
			'comingFrom' => '',
			'pagination' => true,
			'perpage' => 10,
			'paginationVar' => 'page'
		), $options);
		$this->options['pretty'] = (bool)$this->options['pretty'];
		$this->options['pagination'] = (bool)$this->options['pagination'];
		$this->options['perpage'] = (int)$this->options['perpage'];
		
		// Reset the class variables.
		$this->query = '';
		$this->items = array();
		$this->total = 0;
		
		return true;
	}
}

if (!function_exists('format_query_string')) {
	function format_query_string($KEY = '', $newValue = '', $question_mark = true) {
		$qs = '';
		$found = array();
		
		$QS = $_SERVER['QUERY_STRING'];
		
		$explode = explode('&', $QS);
		foreach($explode as $key => $value) {
			if (empty($value)) unset($explode[$key]);
			
			$explode2 = explode('=', $value);
			if ($explode2['0'] == $KEY) $explode[$key] = $explode2['0'].'='.$newValue;
			if ($explode2['0'] == $KEY && empty($newValue)) unset($explode[$key]);
			
			$found[] = $explode2['0'];
		}
		
		$implode = trim(implode('&', $explode));
		if (is_null($KEY)) {
			if (empty($implode)) return ($question_mark === true) ? '?' : '';
			else return ($question_mark === true) ? '?'.$implode : $implode;
		} else {
			if (!in_array($KEY, $found)) $explode[] = $KEY.'='.$newValue;
			return (empty($explode)) ? '' : (($question_mark === true) ? '?'.implode('&', $explode) : implode('&', $explode));
		}
	}
}

if (!function_exists('clean')) {
	function clean($str = '', $html = false) {
		if (empty($str)) return $str;
		
		if (is_array($str)) {
			foreach($str as $key => $value) $str[$key] = clean($value, $html);
		} else {
			if (get_magic_quotes_gpc()) $str = stripslashes($str);
			
			if (is_array($html)) $str = strip_tags($str, implode('', $html));
			elseif (preg_match('|<([a-z]+)>|i', $html)) $str = strip_tags($str, $html);
			elseif ($html !== true) $str = strip_tags($str);
			
			$str = trim($str);
		}
		
		return $str;
	}
}

if (!function_exists('get_global')) {
	function get_global($variable = '', $key = '') {
		if (empty($variable) || empty($key)) return false;
		return (!empty($variable[$key])) ? clean($variable[$key]) : '';
	}
}
?>