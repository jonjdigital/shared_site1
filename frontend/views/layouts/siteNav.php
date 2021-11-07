<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\helpers\Url;

NavBar::begin([
    'options' => [
        'class' => 'navbar-inverse',
    ],
]);
$menuItems = [
    ['label' => '<span class="glyphicon glyphicon-home"></span>', 'url' => Url::to('@frontURL')],
    ['label' => 'About', 'url' => Url::to('@frontURL/about')],
    ['label' => 'Contact', 'url' => Url::to('@frontURL/contact')],
    ];
echo Nav::widget([
    'encodeLabels' => false,
    'options' => ['class' => 'navbar-nav'],
    'items' => $menuItems,
]);
NavBar::end();