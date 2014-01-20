<?php

class ZhuboTagController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
				'actions'=>array('create','update','toTag','doTag','admin','delete'),
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
		$model=new ZhuboTag;
	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['ZhuboTag']))
		{
			$model->attributes=$_POST['ZhuboTag'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
	
		$this->render('create',array(
				'model'=>$model,
		));
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionDoTag($zhubo_id)
	{
		$model=new ZhuboTag;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset($zhubo_id)){
			$model->zhubo_id = $zhubo_id;
		}else{
			throw new CHttpException(500,'错误的访问.');
		}
		
		if(isset($_POST['submitButton']))
		{
			if (isset($_POST['selected_tags']))
			{
				$model->tag_time = date("Y-m-d H:i:s",time());
				$model->user_id = Yii::app()->user->id;
				foreach ($_POST['selected_tags'] as $tag_id)
				{
					$model->tag_id = $tag_id;
					if(!$model->save())
						throw new CHttpException(500,'插入tag失败，数据库错误.');
				}
				$this->redirect(array('/zhuboTag/toTag'));
			}
		}
		
		// 获取全tag列表
		//$tags = Tag::model()->findAll();
		$tags = new CActiveDataProvider('Tag', array(
				'pagination'=>array(
						'pageSize'=>100,
				),
				'sort'=>array(
						'defaultOrder' => 'id',
				),
		));
		
		$this->render('doTag',array(
			'model'=>$model,
			'tags' =>$tags,
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

		if(isset($_POST['ZhuboTag']))
		{
			$model->attributes=$_POST['ZhuboTag'];
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
		$dataProvider=new CActiveDataProvider('ZhuboTag');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ZhuboTag('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ZhuboTag']))
			$model->attributes=$_GET['ZhuboTag'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	// 等待标注的主播
	public function actionToTag()
	{
		$zhubo=new Zhubo('toTagSearch');
		$zhubo->unsetAttributes();  // clear any default values
		if(isset($_GET['Zhubo'])){
			$zhubo->attributes=$_GET['Zhubo'];
			//$zhubo->;
		}
		
		$this->render('toTag',array(
				'zhubo'=>$zhubo,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ZhuboTag the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ZhuboTag::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ZhuboTag $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='zhubo-tag-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
