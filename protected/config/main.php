<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Agros',
	'language'=>'es',
	'sourceLanguage'=>'es',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	    	'ext.bootstrap-theme.widgets.*',
	    	'ext.bootstrap-theme.helpers.*',
	    	'ext.bootstrap-theme.behaviors.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'gii'=>array(
		      'class'=>'system.gii.GiiModule',
		      'password'=>'123qwe',
		      // If removed, Gii defaults to localhost only. Edit carefully to taste.
		      'ipFilters'=>array('127.0.0.1','::1'),
		      'generatorPaths'=>array('ext.bootstrap-theme.gii',),
		    ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			//'showScriptName'=>false,
			//'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		//universidad
		/*
		'db'=>array(
		      'connectionString' => 'mysql:host=192.168.5.103;dbname=agros',
		      'username' => 'agros',
		      'password' => '123qwe',
		      'charset' => 'utf8',
		    ),
		*/
		//c4
		'db'=>array(
			'connectionString'=>'mysql:host=127.0.0.1;dbname=agros',
			'username'=>'root',
			'password'=>'123qwe',
			'charset'=>'utf8',
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
  	'theme'=>'bootstrap',
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
