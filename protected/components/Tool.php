<?php

//Yii::import('application.components.Controller');

class Tool{
	public static $MAX_NAME_LEN = 12;		// 大图的名字
	public static $MAX_SMALL_NAME_LEN = 7;	// 小图的名字
	public static $MAX_TAG_NUM = 3;
	
	
	public static function getName($name){
		if(strlen($name) > Tool::$MAX_NAME_LEN){
			//return substr($name, 0, Tool::$MAX_NAME_LEN);
			return Tool::utf8Substr($name, 0, Tool::$MAX_NAME_LEN);
		}
		
		return $name;
	}
	
	public static function getSmallName($name){
		if(strlen($name) > Tool::$MAX_SMALL_NAME_LEN){
			return Tool::utf8Substr($name, 0, Tool::$MAX_SMALL_NAME_LEN);
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
	
	// 注意参数是引用!
	public static function setTags(&$dataProvider){
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		$ids_str = implode(',', $ids);
		$sql_cmd = "select zhubo.id as id ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.id ORDER BY Tag.weight), ',' , ".self::$MAX_TAG_NUM .") as tagids ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.name ORDER BY Tag.weight), ',' , ".self::$MAX_TAG_NUM .") as tags ".
				" from zhubo, ZhuboTag, Tag ".
				" where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id and Tag.status = 1 ".
				" and zhubo.id in (" . $ids_str . ")".
				" group by id";
		//print $sql_cmd;
		$command = Yii::app()->db->createCommand($sql_cmd);
		$taged_zhobos = $command->queryAll();
	
		$tags = array();
		foreach ($taged_zhobos as $tz) {
			$id_arr = explode(',', $tz['tagids']);
			$tag_arr = explode(',', $tz['tags']);
			// 去除数字结尾的tag级别,比如"好声音1"，修改成"好声音"
			foreach ($tag_arr as &$tag){
				$tag = trim($tag, "1234");
			}
			
			$tags[$tz['id']]['tagids'] = $id_arr;
			$tags[$tz['id']]['tags'] = $tag_arr;
		}
	
		foreach ($dataProvider as &$data){
			if (array_key_exists($data['id'], $tags)){
				$count = count($tags[$data['id']]['tagids']);
				$data['tagids'] = $tags[$data['id']]['tagids'];
				$data['tags'] = $tags[$data['id']]['tags'];
				//print_r($data['tagids']);
			}
		}
	}

};

?>