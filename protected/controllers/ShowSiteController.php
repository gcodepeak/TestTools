<?php

class ShowSiteController extends Controller
{
	public $layout='//layouts/column1';
	
	public function actionIndex()
	{
		if(isset($_GET['site_id']) && $_GET['site_id'] != "")
		{
			$criteria=new CDbCriteria;
			$criteria->limit = 8;
			$criteria->addCondition("site_id = :site_id");
			$criteria->params[':site_id']=$_GET['site_id'];
		
			$dataProvider=new CActiveDataProvider('Zhubo',
					array('criteria'=> $criteria,
							'pagination'=>FALSE));
		}
		
		$this->render("index",
				array('siteName'=>"56我秀",'dataProvider'=>$dataProvider));
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