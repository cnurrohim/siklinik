<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('chartjs', dirname(__FILE__).'/../extensions/yii-chartjs');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SIKLINIK',

	// preloading 'log' component
	'preload'=>array('log', 'chartjs'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'chartjs' => array('class' => 'chartjs.components.ChartJs'),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false, 
			//'urlRuleClass' => 'MyUrlRule',
			'rules'=>array(
				'Authassignment/index'=>'Authassignment/index',
				'Authassignment/update/<id>'=>'Authassignment/update',
				'Authassignment/admin'=>'Authassignment/admin',
				'Authassignment/create'=>'Authassignment/create',
				'Authassignment/delete/<id>'=>'Authassignment/delete',
				'Authassignment/<id>'=>'Authassignment/view',
				
				'Authitemchild/index'=>'Authitemchild/index',
				'Authitemchild/update/<id>'=>'Authitemchild/update',
				'Authitemchild/admin'=>'Authitemchild/admin',
				'Authitemchild/create'=>'Authitemchild/create',
				'Authitemchild/delete/<id>'=>'Authitemchild/delete',
				'Authitemchild/<id>'=>'Authitemchild/view',

				'authitem/index'=>'Authitem/index',
				'authitem/update/<id>'=>'Authitem/update',
				'authitem/admin'=>'Authitem/admin',
				'authitem/create'=>'Authitem/create',
				'authitem/delete/<id>'=>'Authitem/delete',
				'authitem/<id>'=>'Authitem/view',
				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
