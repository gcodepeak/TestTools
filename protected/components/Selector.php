<?php

//Yii::import('application.components.Controller');

/*
 * 这个组件负责推选主播
 */
class Selector{
	
private $top14_ids;
private $jingtiaoxixuan_ids;
private $zuijiaxinren_ids;

public $top14_dataProvider;
public $jingtiaoxixuan_dataProvider;
public $zuijiaxinren_dataProvider;

	function __construct(){	
		$this->top14_ids = array();
		$this->jingtiaoxixuan_ids = array();
		$this->zuijiaxinren_ids = array();	
		
		$this->top14_dataProvider = array();
		$this->jingtiaoxixuan_dataProvider = array();
		$this->zuijiaxinren_dataProvider = array();
	}
	
	public function select() {		
		$this->select_top14($this->top14_dataProvider);
		$this->select_jingtiaoxixuan($this->jingtiaoxixuan_dataProvider);
		$this->select_zuijiaxinren($this->zuijiaxinren_dataProvider);
		//print_r($this->top14_dataProvider);
	}
	
	public function select_top14(&$dataProvider) {
		$connection = Yii::app()->db;
		
		// 先确定在top14的区上能显示的tag的主播
		//$tag_ids = "(31,32,33,34,44,50,53,54,80,81)";
		$tag_ids = "()";
		$condition = "";
		if ($tag_ids != '()') {
			$condition = " and tag_id in ".$tag_ids." ";
		}
		$sql_cmd = "select distinct(zhubo.id) as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite, ZhuboTag "
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and is_live = 1 ".$condition 
				." order by zhubo.fans desc limit 14";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
		
		// 将已经选出的主播添加到记录中, 供后续去重
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		
		$this->top14_ids = $ids;
		
		//return $dataProvider;
		return;
	}

	//
	public function select_jingtiaoxixuan(&$dataProvider){
		//确定要选择的tag
		//$tag_ids = array(22,27,123,122);
		$tag_ids = array(1,2,3,4);
		$connection = Yii::app()->db;
		
		foreach ($tag_ids as $tag){
			$condition = "";
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
				$condition = " and zhubo.id not in (".$selected_ids.") ";
			}
			
			// 去除已经在top14和jingtiaoxixuan中的zhubo
			$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
					." from zhubo, ShowSite where zhubo.site_id = ShowSite.id ".$condition
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
			//print_r($ids);
			//array_merge($this->jingtiaoxixuan_ids, $ids);
			//print_r($this->jingtiaoxixuan_ids);
		}
		
		//return $dataProvider;
		return;
	}
	
	public function select_zuijiaxinren(&$dataProvider){
		$connection = Yii::app()->db;
		
		$condition = "";
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
		
		if (! empty($this->zuijiaxinren_ids)) {
			if ($selected_ids != "") {
				$selected_ids = $selected_ids.",";
			}
			$selected_ids = $selected_ids.implode(',', $this->zuijiaxinren_ids);
		}
			
		if ($selected_ids != "") {
			$condition = " and zhubo.id not in (".$selected_ids.") ";
		}
		
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
					." from zhubo, ShowSite"
					." where zhubo.site_id = ShowSite.id ".$condition
					."order by zhubo.is_live desc, zhubo.fans desc limit 12";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
	
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		array_merge($this->zuijiaxinren_ids, $ids);
		//return $dataProvider;
		return;
	}
	
	public function select_next_top14(&$dataProvider) {
		$connection = Yii::app()->db;
	
		// 先确定在top14的区上能显示的tag的主播
		//$tag_ids = "(31,32,33,34,44,50,53,54,80,81)";
		$tag_ids = "()";
		$condition = "";
		if ($tag_ids != '()') {
			$condition = " and tag_id in ".$tag_ids." ";
		}
		
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
		
		if (! empty($this->zuijiaxinren_ids)) {
			if ($selected_ids != "") {
				$selected_ids = $selected_ids.",";
			}
			$selected_ids = $selected_ids.implode(',', $this->zuijiaxinren_ids);
		}
			
		if ($selected_ids != "") {
			$condition = $condition." and zhubo.id not in (".$selected_ids.") ";
		}
		
		$sql_cmd = "select distinct(zhubo.id) as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite, ZhuboTag "
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and is_live = 1 ".$condition
				." order by zhubo.fans desc limit 14";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();

		//return $dataProvider;
		return;
	}
};

?>