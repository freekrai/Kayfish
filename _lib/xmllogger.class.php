<?php 
/*
example: 
	$array = array("data"=>1,"nested"=>array("name"=>"hello","item"=>"world"));
	$xmlLogger = new xmlLogger();
	$xmlLogger->logXML('arrayTest.xml',$array, "root", "branch"); 
	echo $xmlLogger->getXML('arrayTest.xml');
*/
class xmlLogger{
	/*This function is an implementation of an optimized array check found here: http://www.php.net/manual/en/function.is-array.php#98156 */
	public function __construct(){
		return true;
	}
	private function check_array($value){
		if ( (array) $value !== $value ) { //Checks to see if the value is the same once it has been cast as an array (faster than is_array())
			return false;
		} else {
	    	return true;
		}
	}
	private function process_arrayXML($array,$parent){ //Set the number of tabs (if not defined) to help define the "tree" structure and make the text readable.
		foreach($array as $key=>$value){
			if($this->check_array($value) == true){//Check to see if the current value is an array
				$child = $parent->addChild($key,"");
				$this->process_arrayXML($value, $child); //recurse the function, passing the child as the parent
		 	}else{
				$child = $parent->addChild($key,$value);
		 	}
		}
	}
	public function getXML($filename){
		$dom = new domDocument;
		$res = query_posts( array("title"=>$filename,"type"=>$log) );
		$res = $res[0];
		$id = $res->ID;
		$output = $res->post_content;
		$dom->loadXML($output); //load the string into the DOM
		$xml = simplexml_import_dom($dom);
		$branch = $xml->addChild($branch,"");
		$this->process_arrayXML($array,$branch);
		$output = $xml->asXML(); //output it as XML in a string
		return "<textarea style='width:100%;height:200px;'>".$output."</textarea>";
	}
	public function logXML($filename, $array,$root,$branch){
		$dom = new domDocument;
		if( $res = query_posts( array("title"=>$filename,"type"=>$log) ) ){
			$res = $res[0];
			$id = $res->ID;
			$output = $res->post_content;
			$dom->loadXML($output); //load the string into the DOM
		}else{
			$root = $dom->createElement($root);
			$root = $dom->appendChild($root);
		}
		$xml = simplexml_import_dom($dom);
		$branch = $xml->addChild($branch,"");
		$this->process_arrayXML($array,$branch);
		$output = $xml->asXML(); //output it as XML in a string
		$arr = array(
			'post_title' => $filename,
			'post_name' => $filename,
			'post_content' => $output,
			'post_status' => "publish",
			'post_type' => 'log',
			'user_id' => 1,
		);
		if( $id ){
			update_post($id,$arr);
		}else{
			insert_post($arr);
		}
		return true;
	}
}
?>