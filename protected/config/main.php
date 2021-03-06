
<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'美丽主播',
	'language'=>'zh_cn',
	'charset'=>'UTF-8',
	'defaultController'=>'zhubo',
	//'layout' => 'main',
	'homeUrl'=>'/zhubo/homepage',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.extensions.smarty.sysplugins.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'wangming',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1','172.21.214.21','192.*.*.*'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		'smarty'=>array(
				'class'=>'application.extensions.CSmarty',
		),
		
		'session'=>array(
			'autoStart'=>true,
			'sessionName'=>'meilizhubo',
			'cookieMode'=>'only',
			//'savePath'=>'/path/to/new/directory',
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			'showScriptName'=>false,
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;port=3306;dbname=meilizhubo',
			'emulatePrepare' => true,
			'username' => 'online',
			'password' => 'meilizhubo@online',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace',
				),
				// uncomment the following to show log messages on web pages
				
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'trace',
					'categories'=> 'debug.*',
					'logFile'=> 'debug.log',
				),
				// visit log
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info',
					'categories'=> 'visit.*',
					'logFile'=> 'visit.log',
				),
				// show log
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info',
					'categories'=> 'show.*',
					'logFile'=> 'show.log',
				),
				// show log
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'info',
					'categories'=> 'guanzhu.*',
					'logFile'=> 'guanzhu.log',
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'xiaoming@meilizhubo.com,xiaoyu@meilizhubo.com,xiaolin@meilizhubo.com,xiaolu@meilizhubo.com,xiaozhu@meilizhubo.com',
		'pageTitle'=>'美丽主播 - 主播导航 - 美女视频 - 美女直播 - 视频聊天 - 视频交友',
	),
);
