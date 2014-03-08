<?php

class TopListController extends Controller
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
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, last_live_time"
				." from zhubo, ShowSite, ZhuboTag"
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = :tag_id order by zhubo.is_live desc, zhubo.fans desc limit 8";
		$connection = Yii::app()->db;
		$command = $connection->createCommand($sql_cmd);
		// 绑定参数
		//$command->bindParam(":tag_id", $_GET['tag']);
		//$dataProvider = $command->queryAll();
		
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
		));
	}
}
