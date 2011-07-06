<?php
class user extends skeleton {
	function get_email() {
		return $this->email;
	}
	
	function get_nickname() {
		return $this->nickname;
	}
	
	function get_password() {
		return $this->pass;
	}
	
	function get_profile($format = true) {
		return ($format === true) ? autop(abbr($this->profile)) : $this->profile;
	}
	
	function get_username() {
		return $this->login;
	}
	function get_website($format = true, $options = array()) {
		$website = $this->website;
		if ($format === true) {
			$options = array_merge(array(
				'text' => $this->display_name(false),
				'title' => 'View site',
				'class' => ''
			), (array)$options);
			$options['href'] = $website;
			
			$website = make_link($options);
		}
		
		return $website;
	}
	function display_name($echo = true) {
		$display = (!empty($this->nickname)) ? $this->nickname : $this->login;
		
		if ($echo === true) echo $display;
		else return $display;
	}
	function the_email() {
		echo $this->get_email();
	}
	function the_email_link($options = array(), $echo = true) {
		$options = array_merge(array(
			'href' => 'mailto:'.$this->email,
			'title' => 'Email '.$this->email,
			'text' => $this->email,
			'class' => ''
		), (array)$options);
		$link = make_link($options);
		if ($echo === true) echo $link;
		else return $link;
	}
	
	function the_nickname() {
		echo $this->get_nickname();
	}
	
	function the_permalink($format = true, $options = array()) {
		echo $this->get_permalink($format, $options);
	}
	
	function the_post_amount() {
		echo $this->get_post_amount();
	}
	
	function the_profile($format = true) {
		echo $this->get_profile($format);
	}
	
	function the_username() {
		echo $this->get_username();
	}
	
	function the_website($format = true, $options = array()) {
		echo $this->get_website($format, $options);
	}
}
?>