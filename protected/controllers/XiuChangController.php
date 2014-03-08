<?php

class XiuChangController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/homepage';

	public $defaultAction = 'index';
	
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
				'actions'=>array('index'),
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(!isset($_GET['site']) || $_GET['site'] == '')
		{
			// redirect
			$this->redirect("/zhubo/homepage");
		}
		
		$connection = Yii::app()->db;
		
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, hots, fans, last_live_time"
				." from zhubo"
				." where zhubo.site_id = :siteid order by zhubo.is_live desc, zhubo.fans desc limit 12";
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":siteid", $_GET['site']);
		
		$dataProvider = $command->queryAll();
		
		$showSiteName = ShowSite::model()->findByPk($_GET['site'])->name;
		
		$this->render('index',array(
			'showSiteName'=>$showSiteName,
			'dataProvider'=>$dataProvider,
		));
	}
}
