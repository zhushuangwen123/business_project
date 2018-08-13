<?php

// comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', true);//上线时，注释掉
//defined('YII_ENV') or define('YII_ENV', 'test');//上线时，注释掉
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

$app = new yii\web\Application($config);
$app->language = Yii::$app->session->get('language', 'zh-CN');
$app->run();
