<?php
	class kfforms{
		public $html;
		
		public function __construct($name,$method="post",$action="",$class="form-horizontal"){
			$this->html = '<form name="'.$name.'" id="'.$name.'" method="'.$method.'" action="'.$action.'" class="'.$class.'">';
		}
		public function section($legend){
			ob_start();		
?>
			<fieldset>
				<legend><?=$legend?></legend>
<?php			
			$this->html .= ob_get_contents();
			ob_get_clean();		

		}
		public function sectionbreak(){
			ob_start();		
?>
			</fieldset>
<?php			
			$this->html .= ob_get_contents();
			ob_get_clean();		

		}
		
		public function field($text,$name,$type,$class="xlarge required",$value="",$options = array(),$help="" ){
			ob_start();
?>
			<div class="control-group">
				<label class="control-label" style="text-align:left;width:30%;" for="<?=$name?>"><?=$text?></label>
				<div class="controls">
<?php
	switch($type){
			case "checkbox":
				foreach($optionas as $k=>$v){
?>
					<label class="control-label">
						<input type="checkbox" name="<?=$name?>" value="<?=$k?>" <?=($value == $k ? " CHECKED=TRUE" : null)?>><span><?=$v?></span>
					</label>
<?php
				}
				break;

			case "radio":
				foreach($optionas as $k=>$v){
?>
					<label class="control-label">
						<input type="radio" name="<?=$name?>" value="<?=$k?>" <?=($value == $k ? " CHECKED=TRUE" : null)?>><span><?=$v?></span>
					</label>
<?php
				}
				break;
			case "textarea":
?>
				<textarea class="<?=$class?>" id="<?=$name?>" name="<?=$name?>" rows="3"><?=$value?></textarea>
<?php
				break;
			case "select":
?>
				<select name="<?=$name?>" class="<?=$class?>">
<?php
				foreach($options as $k=>$v){
					$sel = "";
					if ($value == $k)	$sel = " SELECTED ";
?>
					<option value="<?=$k?>" <?=$sel?>> <?=$v?></option>
<?php
				}
?>
				</select>
<?php			
				break;
			case "password":
?>
				<input class="<?=$class?>" id="<?=$name?>" name="<?=$name?>" type="password" value="<?=$value?>">
<?php
			break;
			case "text":
			default:
?>
				<input class="<?=$class?>" id="<?=$name?>" name="<?=$name?>" type="text" value="<?=$value?>">
<?php
			break;
		}
		if( !empty($help) ){
?>
					<p class="help-block"><?=$help?></p>
<?php
		}
?>
				</div>
			</div><!-- /clearfix -->
<?php
			$this->html .= ob_get_contents();
			ob_get_clean();		
		}
		public function buttons($text="Save"){
			ob_start();
?>
			<div class="form-actions">
				<input type="submit" class="btn btn-primary" value="<?=$text?>">&nbsp;
				<button type="reset" class="btn">Cancel</button>
			</div>
<?php
			$this->html .= ob_get_contents();
			ob_get_clean();		
		}
		public function end(){
			$this->html .= "</form>";
		}
		public function html(){
			echo $this->html;
		}
	}
?>