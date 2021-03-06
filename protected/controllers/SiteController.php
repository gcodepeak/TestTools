<?php

class SiteController extends Controller
{
	public $layout='//layouts/homepage';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','感谢您的来信，我们会尽快回复.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect("/zhubo/admin");
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
	/**
	 * 使用三方账号登录
	 * */
	public function actionThirdLogin()
	{
		if(empty($_POST['openid']) || empty($_POST['name']) || empty($_POST['source'])){
			echo "no openid, name or source infomation, login failed";
			return -1;
		}
		//Yii::trace("enter actionThirdLogin", "debug.login");
		
		$openid = $_POST['openid'];
		$name = $_POST['name'];
		$source = $_POST['source'];
		
		$model=new LoginForm;
		$model->username = $openid;
		$model->showName = $name;
		
		if ($_POST['source'] == 'weibo') {
			$model->loginType = 1;
		} elseif ($_POST['source'] == 'qq') {
			$model->loginType = 2;
		} elseif ($_POST['source'] == 'renren') {
			$model->loginType = 3;
		}
		
		$model->rememberMe = true;
		
		$model->loginNoPassword();
		//Yii::trace("enter validate and login", "debug.*");
		//echo CActiveForm::validate($model);
		//$model->validate() && $model->login();
		Yii::app()->end();
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
		$this->redirect("/zhubo/homepage");
	}
}
