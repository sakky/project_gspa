<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.*',
                'application.extensions.*',
            	'ext.helpers.XHtml',
		'ext.modules.help.models.*',
		'ext.modules.lookup.models.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'gig',
                'help'=>array(
			'class'=>'ext.modules.help.HelpModule',
			'helpLayout'=>'application.views.layouts.leftbar',
			'helpTable'=>'tbl_help',
			'leftPortlets'=>array(
				'ptl.ModuleMenu'=>array()
			),
			'editorCSS'=>'editor.css',
			'editorUploadRoute'=>'/request/uploadFile',
		),
	),
	
	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.components.WebApplicationEndBehavior',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			'class'=>'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			
		),
		'authManager'=>array(
			'class'=>'CPhpAuthManager',
			//'authFile'=>''
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=gspa',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
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
					'levels'=>'error, warning',
				),
                                array(
					'class'=>'CProfileLogRoute',
					'report'=>'summary',
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
		'adminEmail'=>'admin@gmail.com',		
		'itemsPerPage' => 10,
	),
);