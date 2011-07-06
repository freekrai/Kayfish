<?php
/*
echo HtmlHelper::style('style.css');
echo HtmlHelper::script('script.js');
echo HtmlHelper::label("male", "Male", array('id' => 'lblMale')) . PHP_EOL;
echo HtmlHelper::textfield('name', 'name', 'Ronald', array('class' => 'fullwidth')) . PHP_EOL;
echo HtmlHelper::checkbox('male', 'male', 'Male', true, array('class' => 'left')) . PHP_EOL;
echo HtmlHelper::radiobutton('gender', 'gender', 'Male', true, array('class' => 'left')) . PHP_EOL;
echo HtmlHelper::textarea('message', 'message', 'Hello world', array('class' => 'fullwidth')) . PHP_EOL;
echo HtmlHelper::select('colors', 'colors', array('red' => 'Red', 'green' => 'Green', 'yellow' => 'Yellow'), 'green');
echo HtmlHelper::ul(array('wim', 'jef' => array('style' => 'color: #900'), 'jos'), array('style' => 'color: #aaa'));
echo HtmlHelper::ol(array('wim', 'jef' => array('style' => 'color: #900'), 'jos'), array('style' => 'color: #aaa'));
echo HtmlHelper::img('thumb.jpg', 80, 80, 'Example image', array('border' => '0'));
echo HtmlHelper::a('http://www.sitebase.be', 'Visit Sitebase', array('target' => '_blank'));
echo HtmlHelper::swf('http://www.youtube-nocookie.com/v/LMhzyGed03A?fs=1&amp;hl=nl_NL&amp;hd=1', 640, 390, null, array('allowscriptaccess' => 'always', 'allowfullscreen' => 'true', 'flashvars' => 'file=playlist.xml'));
echo HtmlHelper::tag('div', 'Hello world', array('style' => 'background: #aaa'));
echo HtmlHelper::openTag('div', array('style' => 'text-align: center', 'class' => 'message'));
echo 'Content that needs to be inside the div here...';
echo HtmlHelper::closeTag('div');
*/
class HtmlHelper {	
	const HTML_LABEL_FORMAT 		= '<label for="%s"%s>%s</label>';
	const HTML_TEXTFIELD_FORMAT 	= '<input type="text" id="%s" name="%s" value="%s"%s />';
	const HTML_TEXTAREA_FORMAT 		= '<textarea id="%s" name="%s"%s>%s</textarea>';
	const HTML_SELECT_FORMAT 		= '<select id="%s" name="%s"%s>%s</select>';
	const HTML_OPTION_FORMAT 		= '<option value="%s"%s>%s</option>';
	const HTML_CHECKBOX_FORMAT		= '<input id="%s" name="%s" value="%s" type="checkbox"%s />';
	const HTML_RADIOBUTTON_FORMAT	= '<input id="%s" name="%s" value="%s" type="radio"%s />';
	const HTML_STYLE_FORMAT			= '<link href="%s" type="text/css" rel="stylesheet"%s />';
	const HTML_SCRIPT_FORMAT		= '<script src="%s" type="text/javascript"%s></script>';
	const ENABLE_ATTR_FILTER = true;
	protected static function _arrayToAttrStr($attr_array){
		if(!is_array($attr_array) || count($attr_array) == 0) return '';
		if(self::ENABLE_ATTR_FILTER) $attr_array = array_map('htmlentities', $attr_array);
		$attr_str = '';
		foreach($attr_array as $key => $value){
			$attr_str .= ' ' . $key . '="' . $value . '"';
		}
		return $attr_str;
	}
	protected static function _createList($tag='ul', $items, $attributes=array()) {
		$result = self::openTag($tag, $attributes) . PHP_EOL;
		foreach($items as $item_value => $item_attr) {
			if(isset($item_attr) && !is_array($item_attr)) $item_value = $item_attr;
			$result .= "\t" . self::tag('li', $item_value, $item_attr) . PHP_EOL;
		}
		$result .= self::closeTag($tag);
		return $result;
	}
	public static function label($for, $value, $attributes=array()) {
		$attr_str = self::_arrayToAttrStr($attributes);
		return sprintf(self::HTML_LABEL_FORMAT, $for, $attr_str, $value);	
	}
	public static function textfield($id, $name, $value, $attributes=array()){
		$attr_str = self::_arrayToAttrStr($attributes);
		return sprintf(self::HTML_TEXTFIELD_FORMAT, $id, $name, $value, $attr_str);	
	}
	public static function checkbox($id, $name, $value, $checked=false, $attributes=array()){
		if($checked) $attributes['checked'] = 'checked';
		$attr_str = self::_arrayToAttrStr($attributes);
		return sprintf(self::HTML_CHECKBOX_FORMAT, $id, $name, $value, $attr_str);
	}
	public static function radiobutton($id, $name, $value, $checked=false, $attributes=array()){
		if($checked) $attributes['checked'] = 'checked';
		$attr_str = self::_arrayToAttrStr($attributes);
		return sprintf(self::HTML_RADIOBUTTON_FORMAT, $id, $name, $value, $attr_str);
	}
	public static function textarea($id, $name, $value, $attributes=array()){
		$attr_str = self::_arrayToAttrStr($attributes);
		return sprintf(self::HTML_TEXTAREA_FORMAT, $id, $name, $attr_str, $value);	
	}
	public static function select($id, $name, $values, $selected=null, $attributes=array()){
		$attr_str = self::_arrayToAttrStr($attributes);
		$options = PHP_EOL;
		foreach($values as $key => $value){
			$selected_string = ($selected == $value) || ($selected == $key) ? ' selected="selected"' : '';
			$options .= "\t" . sprintf(self::HTML_OPTION_FORMAT, $key, $selected_string, $value) . PHP_EOL;
		}		
		return sprintf(self::HTML_SELECT_FORMAT, $id, $name, $attr_str, $options);
	}
	public static function ul($items, $attributes=array()) {
		return self::_createList('ul', $items, $attributes);
	}
	public static function ol($items, $attributes=array()) {
		return self::_createList('ol', $items, $attributes);
	}
	public static function img($src, $width=null, $height=null, $alt='', $attributes=array()){
		$attributes['src'] = $src;
		if(isset($width)) $attributes['width'] = $width;
		if(isset($height)) $attributes['height'] = $height;
		$attributes['alt'] = $alt;
		$attr_str = self::_arrayToAttrStr($attributes);	
		return self::tag('img', null, $attributes);
	}
	public static function a($href, $content, $attributes=array()){
		$attributes['href'] = $href;
		$attr_str = self::_arrayToAttrStr($attributes);	
		return self::tag('a', $content, $attributes);
	}
	public static function style($src, $attributes=array()){
		$attr_str = self::_arrayToAttrStr($attributes);	
		return sprintf(self::HTML_STYLE_FORMAT, $src, $attr_str);
	}
	public static function script($src, $attributes=array()){
		$attr_str = self::_arrayToAttrStr($attributes);	
		return sprintf(self::HTML_SCRIPT_FORMAT, $src, $attr_str);
	}
	public static function swf($src, $width, $height, $attributes=array(), $params=array()) {
	 	$attributes['classid'] = 'clsid:D27CDB6E-AE6D-11cf-96B8-444553540000';
	 	$attributes['width'] = $width;
	 	$attributes['height'] = $height;
	 	$params['movie'] = $src;
	 	$result = self::openTag('object', $attributes) . PHP_EOL;
	 	foreach($params as $key => $value) {
	 		$result .= "\t" . self::tag('param', null, array('name' => $key, 'value' => $value)) . PHP_EOL;
	 	}
	 	$result .= '<!--[if !IE]>-->' . PHP_EOL;
	 	unset($attributes['classid']);
	 	unset($params['movie']);
	 	$attributes['data'] = $src;
	 	$result .= self::openTag('object', $attributes) . PHP_EOL;
	 	foreach($params as $key => $value) {
	 		$result .= "\t" . self::tag('param', null, array('name' => $key, 'value' => $value)) . PHP_EOL;
	 	}
	    $result .= '<!--<![endif]-->' . PHP_EOL;
        $result .= self::tag('p', 'No flash player installed!') . PHP_EOL;
	    $result .= '<!--[if !IE]>-->' . PHP_EOL;
	    $result .= self::closeTag('object') . PHP_EOL;
	    $result .= '<!--<![endif]-->' . PHP_EOL;
	 	$result .= self::closeTag('object');
	 	return $result;
	 } 
	public static function openTag($tag, $attributes=array(), $close=false){
		$attr_str = self::_arrayToAttrStr($attributes);
		$close_str = $close ? '/' : '';
		return '<' . $tag . $attr_str . $close_str . '>';
	}
	public static function closeTag($tag){
		return '</' . $tag . '>';
	}
	public static function tag($tag, $content=null, $attributes=array()) {
		if(in_array($tag, array('img', 'hr', 'embed', 'param', 'br'))) {
			return self::openTag($tag, $attributes, true);
		} else {
			return self::openTag($tag, $attributes) . $content . self::closeTag($tag);
		}
	}
}