<?php

//Yii::import('application.components.Controller');

class FavorateController extends Controller
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
		// 获取当前分页
		$page = 1;
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		
		$pageSize = 12;
		if(isset($_GET['pageSize'])) {
			$page = $_GET['pageSize'];
		}
		
		$connection = Yii::app()->db;
		
		// 查询整体数据的大小，确定分页总数
		$sql_cmd = "select count(*) from zhubo where zhubo.site_id = :siteid";
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":siteid", $_GET['site']);
		$totalSize = $command->queryScalar();
		$pageCount = ($totalSize + $pageSize - 1) / $pageSize;
		
		if ($page > $pageCount) {
			$page = 1;
		}
		$startIndex = ($page - 1) * $pageSize;
		// 查询当前分页的数据
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, last_live_time"
				." from zhubo, ShowSite"
				." where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 8";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
		
		GetTag::addTags(&$dataProvider);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'page'=>$page,
			'pageCount'=>$pageCount,
		));
	}
}
