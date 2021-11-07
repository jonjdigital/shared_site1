<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
//    'uploadPath' => dirname(dirname(__DIR__)) . '/uploads',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lf6iLkZAAAAAPB4avx1C3UFTS4TwuSZbyTMCVTX',
            'secret' => '6Lf6iLkZAAAAAGF2CFlx420y1115CBf-KXbxT5u7',
        ],
    ],
    'modules'=>[
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ]
    ],

];
