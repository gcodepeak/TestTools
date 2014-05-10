<?php

/**
 * 这个controller按照标记展现已经分类好的主播（按标签展现）
 */

class TagedzhuboController extends Controller
{
	public $layout='//layouts/homepage';

	public $defaultAction = 'index';
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','hots'),
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
	 * 提供热点资讯的主播列表, 输入参数（可选）为标签号,输出为6个主播的iframe
	 */
	public function actionHots()
	{
		$this->layout='//layouts/hots';
		$strategy = include_once(dirname(__FILE__).'/../config/strategy.php');
		
		$pageSize = 6;
		$tagName = "女神";
		if(isset($_GET['tagName']) && $_GET['tagName'] != '')
		{
			$tagName = $_GET['tagName'];
		}
		
		$connection = Yii::app()->db;
		
		// 查询对应分页的数据
	    $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, hots, fans, is_live, last_live_time"
					." from zhubo, ZhuboTag, Tag"
					." where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id and Tag.show_name = :tagName "
					." order by zhubo.is_live desc, zhubo.fans desc limit :pageSize";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":tagName", $tagName);
		$command->bindParam(":pageSize", $pageSize);
		
		$log_msg = "tagName:".$tagName;
		Yii::log($log_msg,'trace','debug.tagedzhubo.hots');
		
		$dataProvider = $command->queryAll();
		Tool::setTags($dataProvider);
		
		//$tags = array("女神","好声音","气质","可爱");
		//$sql_cmd = "select distinct(show_name) from Tag order by weight desc;";
		//$command = $connection->createCommand($sql_cmd);
		//$tags = $command->queryAll();
		$tags = $strategy["hots_tags"];
		
		// 修改pageTitle
		//$this->setPageTitle($showSiteName." - 全部美女主播 - 美丽主播");
		//$this->keywords = $showSiteName.",主播大全,美女主播,美女视频,美女直播,秀场,视频聊天,视频交友";
		$this->description="美丽主播是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。"
							."支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。";
		$this->render('hots',array(
			'tagName'=>$tagName,
			'dataProvider'=>$dataProvider,
			'tags'=>$tags,
		));
	}

	/**
	 * 根据参数选择符合条件的主播
	 * [in]: tagid
	 */
	public function actionIndex()
	{
		$strategy = include_once(dirname(__FILE__).'/../config/strategy.php');
		
		$tagName = "女神";
		if(isset($_GET['tagName']) && $_GET['tagName'] != '')
		{
			$tagName = $_GET['tagName'];
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
		//$sql_cmd = "select count(*) from zhubo where zhubo.site_id = :siteid";
		$sql_cmd = "select count(distinct zhubo.id) "
				." from zhubo, ZhuboTag, Tag"
				." where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id and Tag.show_name = :tagName ";
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":tagName", $tagName);
		$totalSize = $command->queryScalar();
		$pageCount = ($totalSize + $pageSize - 1) / $pageSize;
		
		if ($page > $pageCount) {
			$page = 1;
		}
		$startIndex = ($page - 1) * $pageSize;
		
		// 查询对应分页的数据
		$sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, hots, fans, is_live, last_live_time"
				." from zhubo, ZhuboTag, Tag"
				." where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id and Tag.show_name = :tagName "
				." order by zhubo.is_live desc, zhubo.fans desc limit :startIndex, :pageSize";
		//print $sql_cmd;
		$command = $connection->createCommand($sql_cmd);
		$command->bindParam(":tagName", $tagName);
		$command->bindParam(":startIndex", $startIndex);
		$command->bindParam(":pageSize", $pageSize);
		
		$log_msg = "pageSize:".$pageSize.";startIndex:".$startIndex;
		Yii::log($log_msg,'trace','debug.tagedzhubo');
		
		$dataProvider = $command->queryAll();
		Tool::setTags($dataProvider);
		
		$tags = $strategy["hots_tags"];
		
		// 修改pageTitle
		//$this->setPageTitle($showSiteName." - 全部美女主播 - 美丽主播");
		//$this->keywords = $showSiteName.",主播大全,美女主播,美女视频,美女直播,秀场,视频聊天,视频交友";
		$this->description="美丽主播是一站式真人互动视频直播导航网站。汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。"
							."支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。";
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'tagName'=>$tagName,
			'tags'=>$tags,
			'page'=>$page,
			'pageCount'=>$pageCount,
		));
	}
}
