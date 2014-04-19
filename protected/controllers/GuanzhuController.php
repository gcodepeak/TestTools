<?php

class GuanzhuController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/homepage';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','add','del'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
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
		$model=new Guanzhu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Guanzhu']))
		{
			$model->attributes=$_POST['Guanzhu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	

	// 添加关注
	public function actionAdd(){
		if (Yii::app()->user->isGuest) {
			echo -1;
			return;
		}
		
		// 获取想要关注的主播的id
		if(! isset($_GET['id']) || !is_numeric($_GET['id'])) {
			throw new CHttpException(404,'错误的访问，请指定需要关注的主播.');
			return;
		}
		
		// 获取当前用户
		$userid = Yii::app()->user->id;
		
		// 插入新的关注记录
		$model = new Guanzhu();
		$model->user_id = $userid;
		$model->zhubo_id = $_GET['id'];
		$model->add_time = new CDbExpression('NOW()');
		//$model->del_time;
		$model->status = 1;
		
		$ret = 0;
		if (!$model->save()){
			$ret = 1;
		}
		
		Yii::log("add\t".$userid."\t".$_GET['id']."\t".$model->add_time,"info","guanzhu.add");
		
		echo $ret;
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

		if(isset($_POST['Guanzhu']))
		{
			$model->attributes=$_POST['Guanzhu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


	// 取消关注
	public function actionDel($id)
	{
		if (Yii::app()->user->isGuest) {
			echo -1;
			return;
		}
		
		//$this->loadModel($id)->delete();
		// 获取想要关注的主播的id
		if(! isset($_GET['id']) || !is_numeric($_GET['id'])) {
			throw new CHttpException(404,'错误的访问，请指定需要关注的主播.');
			return;
		}
		
		// 获取当前用户
		$userid = Yii::app()->user->id;
		
		$del_time = new CDbExpression('NOW()');

		$sql_cmd = "update Guanzhu set status = 0, del_time = '".$del_time."' where status = 1 and zhubo_id = ".$id." and user_id = ".$userid;
		$command = Yii::app()->db->createCommand($sql_cmd);
		$rowCount = $command->execute();

		Yii::log('del\t'.$userid."\t".$id."\t".$del_time."\t".$rowCount,"info","guanzhu.del");
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		// if(!isset($_GET['ajax']))
		//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('Guanzhu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
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
		$sql_cmd = "select zhubo.id as id, zhubo.name as name, head_img, ShowSite.name as siteName, hots, fans, is_live, last_live_time"
				." from zhubo, ShowSite"
				." where zhubo.site_id = ShowSite.id order by zhubo.is_live desc, zhubo.fans desc limit 8";
		$command = $connection->createCommand($sql_cmd);
		$dataProvider = $command->queryAll();
	
		Tool::setTags($dataProvider);
	
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'page'=>$page,
				'pageCount'=>$pageCount,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Guanzhu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Guanzhu']))
			$model->attributes=$_GET['Guanzhu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Guanzhu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Guanzhu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Guanzhu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='guanzhu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
