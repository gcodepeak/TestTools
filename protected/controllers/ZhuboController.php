<?php

class ZhuboController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/homepage';

	public $defaultAction = 'homepage';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','homepage','jingtiaoxixuan','zuijiaxinren'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Zhubo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Zhubo']))
		{
			$model->attributes=$_POST['Zhubo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Zhubo']))
		{
			$model->attributes=$_POST['Zhubo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Zhubo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionHomepage()
	{
		$top_14_criteria=new CDbCriteria;
		$top_14_criteria->limit = 14;
        $top_14_criteria->order = 'fans DESC';
        $top_14_criteria->addCondition("is_live=1");
		
		$top_14_dataProvider=new CActiveDataProvider('Zhubo',
				array('criteria'=> $top_14_criteria,
						'pagination'=>FALSE));
		/*
		$jingtiaoxixuan_criteria=new CDbCriteria;
		$jingtiaoxixuan_criteria->limit = 8;
                $jingtiaoxixuan_criteria->order = 'fans DESC';
                $jingtiaoxixuan_criteria->addCondition("is_live=1");
		
		$jingtiaoxixuan_dataProvider=new CActiveDataProvider('Zhubo',
			array('criteria'=> $jingtiaoxixuan_criteria,
					 'pagination'=>FALSE));
		
		
		$zuijiaxinren_criteria=new CDbCriteria;
		$zuijiaxinren_criteria->limit = 12;
                $zuijiaxinren_criteria->order = 'fans DESC';
                $zuijiaxinren_criteria->addCondition("is_live=1");
		
		$zuijiaxinren_dataProvider=new CActiveDataProvider('Zhubo',
				array('criteria'=> $zuijiaxinren_criteria,
		 				'pagination'=>FALSE));
		*/
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
				." from zhubo, ShowSite where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 8";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql_cmd);
		$jingtiaoxixuan_dataProvider = $command->queryAll();
		
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
					." from zhubo, ShowSite"
					." where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 12";
		$command = $connection->createCommand($sql_cmd);
		$zuijiaxinren_dataProvider = $command->queryAll();
		
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite"
				." where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 5";
		$command = $connection->createCommand($sql_cmd);
		$top5_dataProvider = $command->queryAll();
		
		// 添加展现log
		//Yii::log("zhubo/homepage","info","system.web.Controller");
		
		$this->render('homepage',array(
				'top_14_dataProvider'=>$top_14_dataProvider,
				'jingtiaoxixuan_dataProvider'=>$jingtiaoxixuan_dataProvider,
				'zuijiaxinren_dataProvider'=>$zuijiaxinren_dataProvider,
				'top5_dataProvider'=>$top5_dataProvider,
		));
	}
	
	/* ajax */
	public function actionJingtiaoxixuan()
	{
		//if(Yii::app()->request->isAjaxRequest){
		
		if(isset($_GET['tag']) && $_GET['tag'] != '')
		{
			/*
			$jingtiaoxixuan_criteria=new CDbCriteria;
			$jingtiaoxixuan_criteria->limit = 8;
			if ($_GET['tag'] != '') {
				$jingtiaoxixuan_criteria->addCondition("tag_id = :tag");
				$jingtiaoxixuan_criteria->params[':tag']=$_GET['tag'];
			}
			$jingtiaoxixuan_criteria->with = array(
					'zhubo',
				);
			
			$jingtiaoxixuan_dataProvider=new CActiveDataProvider('ZhuboTag',
					array('criteria'=> $jingtiaoxixuan_criteria,
							'pagination'=>FALSE));
			*/
			
			$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, last_live_time"
						." from zhubo, ShowSite, ZhuboTag"
						." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = :tag_id order by zhubo.is_live desc, zhubo.fans desc limit 8";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql_cmd);
			// 绑定参数
			$command->bindParam(":tag_id", $_GET['tag']);
			$jingtiaoxixuan_dataProvider = $command->queryAll();
		} else {
			$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, last_live_time"
					." from zhubo, ShowSite where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 8";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql_cmd);
			$jingtiaoxixuan_dataProvider = $command->queryAll();
		}
	
		$this->renderPartial("_jingtiaoxixuan",
				array('dataProvider'=>$jingtiaoxixuan_dataProvider));
	}
	
	/* ajax */
	public function actionZuijiaxinren()
	{
		if(isset($_GET['time']) && $_GET['time'] != '')
		{
			// 待添加时间条件
			$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, last_live_time"
					." from zhubo, ShowSite"
					." where zhubo.site_id = ShowSite.id limit 12";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql_cmd);
			// 绑定参数
			$zuijiaxinren_dataProvider = $command->queryAll();
			
		} else {
			$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, last_live_time"
					." from zhubo, ShowSite"
					." where zhubo.site_id = ShowSite.id limit 12";
			$connection = Yii::app()->db;
			$command = $connection->createCommand($sql_cmd);
			$zuijiaxinren_dataProvider = $command->queryAll();
		}
	
		$this->renderPartial("_zuijiaxinren",
				array('dataProvider'=>$zuijiaxinren_dataProvider));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Zhubo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Zhubo']))
			$model->attributes=$_GET['Zhubo'];
		
		$this->layout = "//layouts/column1";

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Zhubo the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Zhubo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Zhubo $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='zhubo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
