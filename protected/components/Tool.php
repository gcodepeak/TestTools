<?php
	
class Tool {
public static $MAX_NAME_LEN = 16;

public static function getName($name){
	if(strlen($name) > Tool::$MAX_NAME_LEN){
		return substr($name, 0, Tool::$MAX_NAME_LEN);
	}
	
	return $name;
}
	
};

?>