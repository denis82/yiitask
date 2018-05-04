<?php

//use \dlds\metronic\;

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'modules' => [
		'backend' => [
            'class' => 'app\modules\backend\backend',
        ],
        'frontend' => [
            'class' => 'app\modules\frontend\frontend',
        ],
        
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qPnj648B6gXFKFsp7lGYWBSFwwIzGfY-',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'messageConfig' => [
		  'charset' => 'UTF-8',
		  //'from' => ['site@site.com' => 'Site Test'],
	    ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'db' => require(__DIR__ . '/db.php'),

         ///*
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            'rules' => [
		
                'logout' => 'site/logout',
                'login' => 'site/login',
                
                'registration' => 'site/registration',
                //'<controller>' => '<controller>/index',
                //'<controller>/<action>/<id:\d+>' => '<controller>/<action>',
                //'<controller>/<action>' => 'backend/<controller>/<action>',
                //'<module>/<controller>/<action>' => '<module>/<controller>/<action>',
                '/' => 'site/index',
            ],
        ],
         //*/

        'metronic'=>[
	    'class'=>'dlds\metronic\Metronic',
	    'resources'=>'/var/www/html/newProj/web/metronic/assets/theme/assets',
	    'style'=>\dlds\metronic\Metronic::STYLE_MATERIAL,
	    'theme'=>\dlds\metronic\Metronic::THEME_LIGHT,
	    'layoutOption'=>\dlds\metronic\Metronic::LAYOUT_FLUID,
	    'headerOption'=>\dlds\metronic\Metronic::HEADER_FIXED,
	    'sidebarPosition'=>\dlds\metronic\Metronic::SIDEBAR_POSITION_LEFT,
	    'sidebarOption'=>\dlds\metronic\Metronic::SIDEBAR_MENU_ACCORDION,
	    'footerOption'=>\dlds\metronic\Metronic::FOOTER_FIXED,
	],



	 'assetManager' => [
	  'linkAssets' => true,
	    'bundles' => [
		'yii\web\JqueryAsset' => [
		    'sourcePath' => null,   // do not publish the bundle
		    'js' => [
			'//code.jquery.com/jquery-1.11.2.min.js',  // use custom jquery
		    ]
		],
		
		'dlds\metronic\bundles\ThemeAsset' => [
		    'addons'=>[
			'default/login'=>[
			    'css'=>[
				'pages/css/login-4.min.css',
				'layouts/layout/css/layout.min.css',
				'global/css/plugins.min.css',
				'global/css/components.min.css'
			    ],
			    'js'=>[
				'global/plugins/backstretch/jquery.backstretch.min.js',

			    ]
			],
		    ]
		],
	    ],
	],
	'image' => [
        	 	'class' => 'yii\image\ImageDriver',
        		'driver' => 'GD',  //GD or Imagick
        		]
		    
    ],
    
       
    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
