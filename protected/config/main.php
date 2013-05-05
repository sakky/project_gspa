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
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                #...
                # More setting http://www.yiiframework.com/doc/guide/1.1/en/topics.url
                'urlManager'=>array(
                    'class'=>'ext.yii-multilanguage.MLUrlManager',
                    'urlFormat'=>'path',
                    'languages'=>array(
                        #...
                        'th',
                        'en',

                        #...
                    ),
                    'rules'=>array(
                        # ... more user rules

                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                        '<module:\w+>/<controller:\w+>/<id:\d+>/<action:\w+>'=>'<module>/<controller>/<action>',
                        '<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/<controller>/view',
                        '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                        '<module:\w+>/<controller:\w+>'=>'<module>/<controller>',
                        '<module:\w+>'=>'<module>',

                        # ...
                    ),
                ),
                #...
            
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'admin@gmail.com',		
		'itemsPerPage' => 10,
	),
);