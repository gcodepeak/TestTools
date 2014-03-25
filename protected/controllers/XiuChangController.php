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
		
		// 查询对应分页的数据
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, hots, fans, is_live, last_live_time"
				." from zhubo"
				." where zhubo.site_id = :siteid order by zhubo.is_live desc, zhubo.fans desc limit :startIndex, :pageSize";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":siteid", $_GET['site']);
		$command->bindParam(":startIndex", $startIndex);
		$command->bindParam(":pageSize", $pageSize);
		
		$dataProvider = $command->queryAll();
		Tool::setTags($dataProvider);
		
		$showSiteName = ShowSite::model()->findByPk($_GET['site'])->name;
		// 修改pageTitle
		$this->setPageTitle($showSiteName." - 全部美女主播 - 美丽主播");
		$this->keywords = $showSiteName.",主播大全,美女主播,美女视频,美女直播,秀场,视频聊天,视频交友";
		$this->description="美丽主播是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。"
							."支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。";
		$this->render('index',array(
			'showSiteName'=>$showSiteName,
			'dataProvider'=>$dataProvider,
			'site'=>$_GET['site'],
			'page'=>$page,
			'pageCount'=>$pageCount,
		));
	}
}
