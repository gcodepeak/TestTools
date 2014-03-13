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
		$connection = Yii::app()->db;
		
		$sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite, ZhuboTag"
				." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id  order by zhubo.fans desc limit 5";
		$command = $connection->createCommand($sql_cmd);
		
                $top5_dataProvider = array();

                array_push($top5_dataProvider,$command->queryAll());

                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 22 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());

                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 27 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());

                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ( ZhuboTag.tag_id = 32 or ZhuboTag.tag_id = 33 or ZhuboTag.tag_id = 34 ) order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());

                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ( ZhuboTag.tag_id = 113 or ZhuboTag.tag_id = 114 or ZhuboTag.tag_id = 115 ) order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());


                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 21 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());


                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 23 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());


                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 102 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());


                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 7 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());


                $sql_cmd = "select distinct zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as showSiteName, hots, fans, is_live, last_live_time"
                                ." from zhubo, ShowSite, ZhuboTag"
                                ." where zhubo.site_id = ShowSite.id and zhubo.id = ZhuboTag.zhubo_id and ZhuboTag.tag_id = 29 order by zhubo.fans desc limit 5";
                $command = $connection->createCommand($sql_cmd);
                array_push($top5_dataProvider,$command->queryAll());

		$this->render('index',array(
			'dataProvider'=>$top5_dataProvider,
		));
	}
}
