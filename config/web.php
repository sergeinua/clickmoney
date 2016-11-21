<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9Zb35FYVBHNgvz4lX-r7ZEAlP4Q6sNj0',
            'baseUrl'=> '',
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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db-' . YII_ENV .'.php'),


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'c2m' => 'c2m/index',
                'c3m' => 'c2m/index',
                'c3m/<action>' => 'c2m/<action>',
                'jv' => 'jv/index',
                'contest' => 'jv/contest',
                '<action>' => 'site/<action>',
                '<controller>/<action>' => '<controller>/<action>'
            ],
        ],

    ],
    'params' => $params,
    'on beforeAction' => function ($event) {
		if ($affClickID = Yii::$app->request->get('affClickID')) {
			setcookie('affClickID', $affClickID, (time()+2592000), "/");
			setcookie('affClickID', $affClickID, (time()+2592000), "/", str_replace('www.','',Yii::$app->request->serverName));
			setcookie('affClickID', $affClickID, (time()+2592000), "/", str_replace('www.','.',Yii::$app->request->serverName));
		}
		$location_data = \app\helpers\GetIp::getIpAddr();
        \Yii::$app->params['UCOUNTRY'] = $location_data['UCOUNTRY'];
        \Yii::$app->params['UCITY'] = $location_data['UCITY'];

    },
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
