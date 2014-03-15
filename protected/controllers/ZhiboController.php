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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}