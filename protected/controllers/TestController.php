<?php

class TestController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','smarty','session'),
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
		$model=new ShowSite;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ShowSite']))
		{
			$model->attributes=$_POST['ShowSite'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionSmarty(){
		$smarty= Yii::app()->smarty;
		$mburl='test_smarty.tpl';//模版名
		//$smarty->smarty->assign('name','meilizhubo');
		//$smarty->smarty->display($mburl);
		$this->assign('name','meilizhubo');
		$this->display($mburl);
	}
	
	public function actionSession(){
		$smarty= Yii::app()->session;
		$mburl='test_smarty.tpl';//模版名
		$session = Yii::app()->session;
		//$smarty->smarty->assign('name','meilizhubo');
		//$smarty->smarty->display($mburl);
		$this->assign('name','meilizhubo');
		$this->assign('session_id', $session->sessionID);
	
		$session->add('name','meilizhubo');
		
		$this->display($mburl);
	}
}
