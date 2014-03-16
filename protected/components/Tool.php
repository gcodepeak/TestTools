<?php

Yii::import('application.components.Controller');

class Tool {
public static $MAX_NAME_LEN = 8;

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


/*
 * input: $ids,想要获取的对象主播
* output: 每个主播对应的tag
*/
public static function getTags($ids){
	$ids_str = implode(',', $ids);
	$sql_cmd = "select zhubo.id as id ".
			", SUBSTRING_INDEX(GROUP_CONCAT(Tag.id ORDER BY Tag.id DESC),',',3) as tagids ".
			", SUBSTRING_INDEX(GROUP_CONCAT(Tag.name ORDER BY Tag.id DESC),',',3) as tags ".
			" from zhubo, ZhuboTag, Tag ".
			" where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id ".
			" and zhubo.id in (" . $ids_str . ")".
			" group by id";
	//print $sql_cmd;
	$command = Yii::app()->db->createCommand($sql_cmd);
	$taged_zhobos = $command->queryAll();

	$result = array();
	foreach ($taged_zhobos as $tz) {
		$id_arr = explode(',', $tz['tagids']);
		$tag_arr = explode(',', $tz['tags']);
		$result[$tz['id']]['tagids'] = $id_arr;
		$result[$tz['id']]['tags'] = $tag_arr;
	}

	//print_r($result);
	return $result;
}

// 这个函数接受一个主播的数组(注意传递引用)，处理每一个主播，将她的tag信息添加到主播中
public static function addTags($dataProvider) {
	$ids = array();
	array_walk($dataProvider, function($v, $k) use(&$ids){
		$ids[$k] = $v['id'];
	});
	
	$tags = Tool::getTags($ids);
	//print_r($tags);
	//print_r($dataProvider);
	// 修改数组内容，需要使用引用
	foreach ($dataProvider as &$data){
		if (array_key_exists($data['id'], $tags)){
			$count = count($tags[$data['id']]['tagids']);
			$data['tagids'] = $tags[$data['id']]['tagids'];
			$data['tags'] = $tags[$data['id']]['tags'];
			//print_r($data['tagids']);
		}	
	}
	return ;
}
	
};

?>