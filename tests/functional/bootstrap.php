<?php

error_reporting(-1);
define('YII_ENABLE_ERROR_HANDLER', false);
define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME'] = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;
//require_once(__DIR__ . '/../../../../yii2-developer.loc/vendor/autoload.php');
//require_once(__DIR__ . '/../../../../yii2-developer.loc/vendor/yiisoft/yii2/Yii.php');
require_once(__DIR__ . '/../../yii2-developer.loc/vendor/autoload.php');
require_once(__DIR__ . '/../../yii2-developer.loc/vendor/yiisoft/yii2/Yii.php');
Yii::setAlias('@tests', __DIR__);
require_once(__DIR__ . '/TestCase.php');