<?php

class ZhiboController extends Controller
{
	public $layout='//layouts/zhibo';
	
	public $defaultAction = 'zhibo';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionZhibo(){
		if( !isset($_GET['id']))
		{
			$id = 2;
		}else{
			$id = $_GET['id'];
		}
		
		// 找到对应的zhubo
		$zhubo = Zhubo::model()->findByPk($id);
		
		$connection = Yii::app()->db;
		$sql_cmd = "select id, name, head_img, is_live "
				." from zhubo where is_live = 1 "
				." order by zhubo.fans desc limit 2";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
		
		// 查找这个主播所有的关键tag
		$sql_cmd = "select SUBSTRING_INDEX(GROUP_CONCAT(Tag.show_name ORDER BY Tag.weight), ',' , 5) as tags ".
				" from ZhuboTag, Tag ".
				" where ZhuboTag.tag_id = Tag.id and Tag.status = 1 and Tag.weight!= 0".
				" and zhubo_id = " . $zhubo->id .";";

		$command = $connection->createCommand($sql_cmd);
		$tags = $command->queryScalar();
		
		$showSiteName = ShowSite::model()->findByPk($zhubo->site_id)->name;
		
		// 修改pageTitle
		$this->setPageTitle($zhubo->name."直播间 - 美女主播视频聊天室_视频K歌 - 美丽主播");
		
		$this->keywords = "美丽主播秀场,视频聊天,视频聊天室,视频交友,".$zhubo->name."%直播,%主播昵称%视频";
		if ($tags != "") {
			$this->keywords = $tags.",".$this->keywords;
		}
		
		$this->description = "美丽主播秀场%".$showSiteName."%直播间提供主播%".$zhubo->name."%的K歌曲、视频、资料、照片、粉丝群、动态等各种信息。".$zhubo->name.' '.$zhubo->fans;
		
		$this->render('index',array('zhubo'=>$zhubo,
				'dataProvider'=>$dataProvider));
	}
	
	public function actionRandom(){
		// 查询整体数据的大小
		$connection = Yii::app()->db;
		
		$sql_cmd = "select count(*) from zhubo where is_live='1';";
		$command = $connection->createCommand($sql_cmd);
		$totalSize = $command->queryScalar();
		
		$index = rand(1, $totalSize-2);
		$sql_cmd = "select id, name, head_img, is_live "
				." from zhubo where is_live = 1 "
				." order by zhubo.fans desc limit $index, 2";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
	
		$this->renderPartial('_zhubo',array(
				'dataProvider'=>$dataProvider));
	}
}