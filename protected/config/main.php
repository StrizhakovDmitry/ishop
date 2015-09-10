<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathofAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
return array(
    //'theme'=>'bootstrap',
    'language' => 'ru',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Интернет магазин',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',

    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'AAAqqq123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', $_SERVER['REMOTE_ADDR']),
            'generatorPaths' => array('bootstrap.gii'),
        ),

    ),

    // application components
    'components' => array(

        'request' => array(//'enableCsrfValidation'=>true,
        ),


        'ih' => array(
            'class' => 'CImageHandler',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),


        'theme' => 'bootstrap',
        'bootstrap' => array('class' => 'ext.bootstrap.components.Bootstrap'),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                // стандартное правило для обработки '/' как 'site/index'
                '' => 'main/index',
                // это пример добавления который заработал
                //'secondcontroller/<action:.*>'=>'secondcontroller/<action>',
                //'user/<action:.*>'=>'user/<action>',
                //'<action:.*>'=>'site/<action>', //закомментил а то глючило с ним
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),


        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
