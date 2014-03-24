<?php

//Yii::import('application.components.Controller');

/*
 * 这个组件负责推选主播
 */
class Selector{

	// 选取的列
	private static $SELECT_COLS = "distinct(zhubo.id) as id, local_id, zhubo.name as name, head_img, ShowSite.name as siteName, hots, fans, is_live, last_live_time";
	private static $LIMIT = 2000;
	private static $TOP_COUNT = 14;
	private static $JINGTIAOXIXUAN_COUNT = 8;
	private static $ZUIJIAXINREN_COUNT = 12; 
	
	private $top14_ids;
	private $jingtiaoxixuan_ids;
	private $zuijiaxinren_ids;
	
	public $top14_dataProvider;
	public $jingtiaoxixuan_dataProvider;
	public $zuijiaxinren_dataProvider;
	
	private $zhubo_list;
	private $live_lady_list;		// 正在直播，并且被标记为女神的主播
	private $live_not_taged_list;	// 正在直播，并且尚未标记的主播
	private $not_live_list;			// 不在直播，并且被标记的主播

	function __construct(){	
		$this->top14_ids = array();
		$this->jingtiaoxixuan_ids = array();
		$this->zuijiaxinren_ids = array();	
		
		$this->top14_dataProvider = array();
		$this->jingtiaoxixuan_dataProvider = array();
		$this->zuijiaxinren_dataProvider = array();
	}
	
	/*
	 * 对外接口，调用改接口后，会设置好所有展现的队列，按需获取对应的队列结果即可。
	 */
	public function select() {
		$this->fill_lists();
			
		$this->select_top14($this->top14_dataProvider);
		$this->select_jingtiaoxixuan($this->jingtiaoxixuan_dataProvider);
		$this->select_zuijiaxinren($this->zuijiaxinren_dataProvider);
		//print_r($this->top14_dataProvider);	
	}
	
	/*
	 * 填充各个队列
	 */
	private function fill_lists(){
		$connection = Yii::app()->db;
		
		// 先确定能显示的tag的主播
		//$tag_ids = "(31,32,33,34,44,50,53,54,80,81)";
		$tag_ids = "()";
		$condition = "";
		if ($tag_ids != '()') {
			$condition = " and tag_id in ".$tag_ids." ";
		}
		
		// 先捞出正在直播，并且被标记为女神的主播
		$sql_cmd = "select ".self::$SELECT_COLS
				." from zhubo, ShowSite, ZhuboTag "
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id "
				." and is_live = 1 and ZhuboTag.tag_id >= 31 and ZhuboTag.tag_id <= 34 ".$condition 
				." order by zhubo.fans desc limit ".self::$LIMIT;

		$command = $connection->createCommand($sql_cmd);
		$live_lady_list = $command->queryAll();
		//print count($live_lady_list);
		
		// 正在直播，并且尚未标记的主播
		$sql_cmd = "select ".self::$SELECT_COLS
				." from zhubo, ShowSite "
				." where zhubo.site_id = ShowSite.id and zhubo.id not in (select zhubo_id from ZhuboTag) "
				." and is_live = 1 ".$condition
				." order by zhubo.fans desc limit ".self::$LIMIT;
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$live_not_taged_list = $command->queryAll();
		//print count($live_not_taged_list);
		
		// 不在直播，并且被标记的主播
		$sql_cmd = "select ".self::$SELECT_COLS
				." from zhubo, ShowSite, ZhuboTag "
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id "
				." and is_live = 0 and (ZhuboTag.tag_id < 31 or ZhuboTag.tag_id > 34) ".$condition
				." order by zhubo.fans desc limit ".self::$LIMIT;
		$command = $connection->createCommand($sql_cmd);
		$not_live_list = $command->queryAll();
		//print count($not_live_list);
		
		// 将上面的几个队列合并成一个队列
		$this->zhubo_list = array_merge($live_lady_list, $live_not_taged_list, $not_live_list);
		
		return;
	}
	
	/*
	 * 获取首页焦点的top14的图片
	 * 排序策略：各个子类别内部按照hots数排序
	 * 	1. 直播&女神
	 * 	2. 直播&未标注
	 * 	3. 非直播 & 女神&其它tag
	 */
	private function select_top14(&$dataProvider) {

		// 从候选队列中挑选主播
		$dataProvider = array_slice($this->zhubo_list, 0, self::$TOP_COUNT);
		
		// 将已经选出的主播添加到记录中, 供后续去重
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		
		$this->top14_ids = $ids;
		
		return;
	}

	//
	private function select_jingtiaoxixuan(&$dataProvider){
		// 处理All 
		$dataProvider[0] = array_slice($this->zhubo_list, self::$TOP_COUNT, self::$JINGTIAOXIXUAN_COUNT);
		$ids = array();
		array_walk($dataProvider[0], function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		foreach ($ids as $id){
			array_push($this->jingtiaoxixuan_ids, $id);
		}
		
		//确定要选择的tag
		$tag_ids = array(123,22,27,122);
		$connection = Yii::app()->db;
		
		foreach ($tag_ids as $tag){
			$condition = " and ZhuboTag.tag_id = ".$tag." ";
			$selected_ids = "";
			
			if (! empty($this->top14_ids)) {
				$selected_ids = $selected_ids.implode(',', $this->top14_ids);
			}
			
			if (! empty($this->jingtiaoxixuan_ids)) {
				if ($selected_ids != "") {
					$selected_ids = $selected_ids.",";
				}
				$selected_ids = $selected_ids.implode(',', $this->jingtiaoxixuan_ids);
			}
			
			if ($selected_ids != "") {
				$condition = $condition." and zhubo.id not in (".$selected_ids.") ";
			}
			
			// 去除已经在top14和jingtiaoxixuan中的zhubo
			$sql_cmd = "select ".self::$SELECT_COLS
					." from zhubo, ShowSite, ZhuboTag where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id ".$condition
					." order by zhubo.is_live desc, zhubo.fans desc limit 8";
			//print $sql_cmd;
			$command = $connection->createCommand($sql_cmd);
			$result = $command->queryAll();
			
			$dataProvider[$tag] = $result;
			
			$ids = array();
			array_walk($result, function($v, $k) use(&$ids){
				$ids[$k] = $v['id'];
			});
			foreach ($ids as $id){
				array_push($this->jingtiaoxixuan_ids, $id);
			}
		}
		
		return;
	}
	
	public function select_zuijiaxinren(&$dataProvider){		
		// 从zhubo_list中捞出未使用的
		$count = 0;
		foreach ($this->zhubo_list as $zhubo) {
			if (in_array($zhubo['id'], $this->top14_ids)) {
				continue;
			}
			if (in_array($zhubo['id'], $this->jingtiaoxixuan_ids)) {
				continue;
			}
			
			array_push($dataProvider, $zhubo);
			$count++;
			
			if($count >= self::$ZUIJIAXINREN_COUNT){
				break;
			}
		}
		
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		
		$this->zuijiaxinren_ids = $ids;

		return;
	}
	
	public function select_next_top14(&$dataProvider, &$page, $pageSize) {
		// 先重新分配
		$this->select();
		
		$count = 0;
		foreach ($this->zhubo_list as $zhubo) {
			if (in_array($zhubo['id'], $this->top14_ids)) {
				continue;
			}
			if (in_array($zhubo['id'], $this->jingtiaoxixuan_ids)) {
				continue;
			}
			if (in_array($zhubo['id'], $this->zuijiaxinren_ids)) {
				continue;
			}
			
			$count++;
			// 前$page页丢弃
			if ($count <= $page * $pageSize) {
				continue;
			}
			
			array_push($dataProvider, $zhubo);
			
			if($count >= ($page+1) * $pageSize) {
				break;
			}
		}

		// 如果到达队列末尾，主播不够14个了，那么重新显示首个top14
		if (count($dataProvider) < $pageSize) {
			$dataProvider = $this->top14_dataProvider;
			$page = 0;
		}
		
		return;
	}
	
	public function select_week_top5(&$dataProvider) {
		$connection = Yii::app()->db;
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as siteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite"
				." where zhubo.site_id = ShowSite.id order by zhubo.fans desc limit 5";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
		
		return;
	}
	
	public function select_month_top5(&$dataProvider) {
		$connection = Yii::app()->db;
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as siteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite"
				." where zhubo.site_id = ShowSite.id order by zhubo.fans desc limit 5,5";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
	
		return;
	}
};

?>