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
	
	public function setTags(&$dataProvider){
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
		$ids_str = implode(',', $ids);
		$sql_cmd = "select zhubo.id as id ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.id ORDER BY Tag.id DESC),',',3) as tagids ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.name ORDER BY Tag.id DESC),',',3) as tags ".
				" from zhubo, ZhuboTag, Tag ".
				" where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id ".
				" and zhubo.id in (" . $ids_str . ")".
				" group by id";
		//print $sql_cmd;
		$command = Yii::app()->db->createCommand($sql_cmd);
		$taged_zhobos = $command->queryAll();
		
		$tags = array();
		foreach ($taged_zhobos as $tz) {
			$id_arr = explode(',', $tz['tagids']);
			$tag_arr = explode(',', $tz['tags']);
			$tags[$tz['id']]['tagids'] = $id_arr;
			$tags[$tz['id']]['tags'] = $tag_arr;
		}
		
		foreach ($dataProvider as &$data){
			if (array_key_exists($data['id'], $tags)){
				$count = count($tags[$data['id']]['tagids']);
				$data['tagids'] = $tags[$data['id']]['tagids'];
				$data['tags'] = $tags[$data['id']]['tags'];
				//print_r($data['tagids']);
			}
		}
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
		
		$this->setTags(&$dataProvider);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'page'=>$page,
			'pageCount'=>$pageCount,
		));
	}
	
	public function getTags($ids){
		$ids_str = implode(',', $ids);
		$sql_cmd = "select zhubo.id as id ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.id ORDER BY Tag.id DESC),',',3) as tagids ".
				", SUBSTRING_INDEX(GROUP_CONCAT(Tag.name ORDER BY Tag.id DESC),',',3) as tags ".
				" from zhubo, ZhuboTag, Tag ".
				" where zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = Tag.id ".
				" and zhubo.id in (" . $ids_str . ")".
				" group by id";
		//print $sql_cmd;
		$command = Yii::app()->db->createCommand($sql_cmd);
		$taged_zhobos = $command->queryAll();
	
		$result = array();
		foreach ($taged_zhobos as $tz) {
			$id_arr = explode(',', $tz['tagids']);
			$tag_arr = explode(',', $tz['tags']);
			$result[$tz['id']]['tagids'] = $id_arr;
			$result[$tz['id']]['tags'] = $tag_arr;
		}
	
		//print_r($result);
		return $result;
	}
	
	// 这个函数接受一个主播的数组(注意传递引用)，处理每一个主播，将她的tag信息添加到主播中
	public function addTags($dataProvider) {
		$ids = array();
		array_walk($dataProvider, function($v, $k) use(&$ids){
			$ids[$k] = $v['id'];
		});
	
		$tags = $this->getTags($ids);
		//print_r($tags);
		//print_r($dataProvider);
		// 修改数组内容，需要使用引用
		foreach ($dataProvider as &$data){
			if (array_key_exists($data['id'], $tags)){
				$count = count($tags[$data['id']]['tagids']);
				$data['tagids'] = $tags[$data['id']]['tagids'];
				$data['tags'] = $tags[$data['id']]['tags'];
				//print_r($data['tagids']);
			}
		}
		return ;
	}
}
