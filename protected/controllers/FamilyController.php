<?php

class FamilyController extends Controller
{
	public $layout='//layouts/column1';
	
	public function actionIndex()
	{
		//if(isset($_GET['familyName']) && $_GET['familyName'] != "")
		if(true){
			$criteria=new CDbCriteria;
			$criteria->limit = 250;
			//$criteria->addCondition("family = :familyName");
			//$criteria->params[':familyName']=$_GET['familyName'];
		
			$dataProvider=new CActiveDataProvider('Zhubo', array(
					'criteria'=> $criteria,
					'sort'=>array( 
			            'defaultOrder'=>'id ASC', 
			        ),
			        'pagination'=>array( 
			            'pageSize'=>5, 
			        ), 	
			));
		}
		
		$this->render("index",array(
				'familyName'=>"江湖|兄弟姐妹族",'dataProvider'=>$dataProvider,
				
		));
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