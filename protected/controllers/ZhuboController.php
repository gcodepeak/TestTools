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
				'actions'=>array('index','view','homepage','jingtiaoxixuan','zuijiaxinren','top14'),
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
		$connection = Yii::app()->db;
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite where zhubo.site_id = ShowSite.id and is_live = 1 "
				." order by zhubo.fans desc limit 14";
		$command = $connection->createCommand($sql_cmd);	
		$top_14_dataProvider = $command->queryAll();
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
				." from zhubo, ShowSite where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 8";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$jingtiaoxixuan_dataProvider = $command->queryAll();
		Tool::addTags(&$jingtiaoxixuan_dataProvider);
		
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, is_live, last_live_time"
					." from zhubo, ShowSite"
					." where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 12";
		$command = $connection->createCommand($sql_cmd);
		$zuijiaxinren_dataProvider = $command->queryAll();
		Tool::addTags(&$zuijiaxinren_dataProvider);
		
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
	public function actionTop14()
	{
		// 获取当前分页
		$page = 1;
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		
		$pageSize = 14;
			
		$connection = Yii::app()->db;
		
		// 查询整体数据的大小，确定分页总数
		$sql_cmd = "select count(*) from zhubo where is_live='1';";
		$command = $connection->createCommand($sql_cmd);
		$totalSize = $command->queryScalar();
		$pageCount = ($totalSize + $pageSize - 1) / $pageSize;
		//print $pageCount;
		
		// 最后一个页可能不够$pageSize个主播，所以丢弃
		if ($page >= $pageCount) {
			$page = 1;
		}		
		$startIndex = ($page - 1) * $pageSize;
		
		// 查询对应分页的数据
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite where zhubo.site_id = ShowSite.id and is_live = 1 and head_img like '/images/%' "
				." order by zhubo.fans desc limit :startIndex, :pageSize";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":startIndex", $startIndex);
		$command->bindParam(":pageSize", $pageSize);
		
		$dataProvider = $command->queryAll();
		//print_r($dataProvider);
		
		$this->renderPartial("_top_14",
				array('dataProvider'=>$dataProvider,
					'page'=>$page + 1,
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
