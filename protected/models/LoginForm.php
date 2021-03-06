<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	public $showName;
	public $loginType;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			Yii::trace("login success, name: ".$this->username, "debug.*");
			return true;
		}
		
		return false;
	}
	
	public function loginNoPassword()
	{
		if($this->_identity===null)
		{
			$user = User::model()->findByAttributes(array('username'=>$this->username));
			
			// 如果用户尚未存在，那么新建一个
			if ($user === null){
				
				$model=new User;
				$model->register_time = new CDbExpression('NOW()');
				$model->username = $this->username;
				$model->password = $this->username;
				$model->showName = $this->showName;
				$model->loginType = $this->loginType;
				$model->save();
				Yii::trace("saved new user", "debug.*");
			}
			// 使用用户名当密码
			$this->_identity=new UserIdentity($this->username,$this->username);
			$this->_identity->authenticate();
		}
		
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			Yii::trace("login success", "debug.*");
			
			return true;
		} else {
			Yii::trace("login error, errorCode: ".$this->_identity->errorCode, "debug.*");
		}
		
		return false;
	}
}
