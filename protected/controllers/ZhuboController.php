<?php

class ZhuboController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/homepage';

	public $defaultAction = 'homepage';
	
	protected function beforeAction($action) {
		if (!parent::beforeAction($action))
			return false;
		// 修改pageTitle
		$this->setPageTitle("美丽主播 - 美女视频 - 美女直播 - 视频聊天 - 视频交友");
		
		$this->keywords = "美女主播,美女视频,美女直播,秀场,视频聊天,视频交友";
		$this->description = "美丽主播是一站式真人互动视频直播导航网站。"
							."汇集9158,六间房,56我秀,酷狗繁星,激动星秀等众多知名网站的实时美女视频直播信息。"
							."支持数十万人同时在线视频聊天、在线K歌跳舞、视频交友。赶快加入，免费赏鉴万千美女更能在线与美女在线聊天。";
		
		return true;
	}
	
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
			
			if ((($_FILES["file"]["type"] == "image/gif")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/pjpeg"))
					&& ($_FILES["file"]["size"] < 500000))
			{
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
				}
				else
				{
					$index = 1;
					$file_name="images/static_image/modified_img/"
							.$model->site_id.'-'.$model->local_id."-a0".$index.".jpg";
					while (file_exists($file_name))
					{
						$index ++;
						$file_name = "images/static_image/modified_img/"
							.$model->site_id.'-'.$model->local_id."-a0".$index.".jpg";
					}
					print $_FILES["file"]["tmp_name"].$file_name;
					move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
					$model->head_img = '/'.$file_name;
				}
			}
			else
			{
				echo "Invalid file";
			}
			
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
		$selector = new Selector();
		$selector->select();
		
		$top_14_dataProvider = $selector->top14_dataProvider;
		
		$jingtiaoxixuan_dataProvider = $selector->jingtiaoxixuan_dataProvider['0'];
		Tool::setTags($jingtiaoxixuan_dataProvider);
		
		$zuijiaxinren_dataProvider = $selector->zuijiaxinren_dataProvider;
		Tool::setTags($zuijiaxinren_dataProvider);
		
		$week_top5_dataProvider = array();
		$selector->select_week_top5($week_top5_dataProvider);
		
		$month_top5_dataProvider = array();
		$selector->select_month_top5($month_top5_dataProvider);
		
		// 添加展现log
		//Yii::log("zhubo/homepage","info","system.web.Controller");
		
		$this->render('homepage',array(
				'top_14_dataProvider'=>$top_14_dataProvider,
				'jingtiaoxixuan_dataProvider'=>$jingtiaoxixuan_dataProvider,
				'zuijiaxinren_dataProvider'=>$zuijiaxinren_dataProvider,
				'week_top5_dataProvider'=>$week_top5_dataProvider,
				'month_top5_dataProvider'=>$month_top5_dataProvider,
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

		$selector = new Selector();
		
		$dataProvider = array();
		$selector->select_next_top14($dataProvider, $page, $pageSize);
		
		$this->renderPartial("_top_14",
				array('dataProvider'=>$dataProvider,
					'page'=>$page+1,
		));
	}
	
	/* ajax */
	public function actionJingtiaoxixuan()
	{
		//if(Yii::app()->request->isAjaxRequest){
		$selector = new Selector();
		$selector->select();
		$dataProider = $selector->jingtiaoxixuan_dataProvider;
		
		if(isset($_GET['tag']) && is_numeric($_GET['tag']) && array_key_exists($_GET['tag'], $dataProider))
		{
			$jingtiaoxixuan_dataProvider = $selector->jingtiaoxixuan_dataProvider[$_GET['tag']];
			
		} else {			
			$jingtiaoxixuan_dataProvider = $dataProider['0'];
		}
	
		Tool::setTags($jingtiaoxixuan_dataProvider);
		
		$this->renderPartial("_jingtiaoxixuan",
				array('dataProvider'=>$jingtiaoxixuan_dataProvider));
	}
	
	/* ajax */
	public function actionZuijiaxinren()
	{
		$selector = new Selector();
		$selector->select();
		$zuijiaxinren_dataProvider = $selector->zuijiaxinren_dataProvider;
		
		Tool::setTags($zuijiaxinren_dataProvider);
		
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
