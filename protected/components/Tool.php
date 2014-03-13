<?php
	
class Tool {
public static $MAX_NAME_LEN = 6;

public static function getName($name){
	if(strlen($name) > Tool::$MAX_NAME_LEN){
		//return substr($name, 0, Tool::$MAX_NAME_LEN);
		return Tool::utf8Substr($name, 0, Tool::$MAX_NAME_LEN);
	}
	
	return $name;
}

//截取utf8字符串
public static function utf8Substr($str, $from, $len)
{
	return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
			'((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
			'$1',$str);
}
	
};

?>