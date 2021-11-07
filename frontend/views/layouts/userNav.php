<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use common\models\AccessRights;
use yii\helpers\Url;

NavBar::begin([
    'options' => [
        'class' => 'navbar-inverse',
    ],
]);
if (Yii::$app->user->isGuest) {
    $userItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $userItems[] = [
        'label' => '<span class="glyphicon glyphicon-user"></span>',
        'items' => [
            '<li>'
            . Html::beginForm(['/user/view','id'=>Yii::$app->user->id])
            . Html::submitButton(
                'Profile (' . Yii::$app->user->identity->display_name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',

            '<li>'
            . Html::beginForm(['/user/update','id'=>Yii::$app->user->id])
            . Html::submitButton(
                'Account Settings',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',

            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->display_name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',
        ]
    ];

    $userItems[] = [
        'label' => '<span class="glyphicon glyphicon-cog"></span> Settings',
        'items' => [
            [
                'label'=>'Admin Home',
                'url'=>Url::to('@backURL'),
                'visible'=> AccessRights::isSiteAdmin(),
                'options' => [
                    'class' => 'btn btn-link logout'
                ]
            ],
//            ['label'=>'Admin','visible'=> AccessRights::isAdmin()],
//            ['label'=>'Users'],
            [
                'label' => 'Signup a new user',
                'url' => Url::to('@backURL/signup'),
                'visible'=> AccessRights::isAdmin(),
                'options' => [
                    'class' => 'btn btn-link logout'
                ]
            ]
        ],
        'visible'=> AccessRights::isModerator(),
    ];
}
echo Nav::widget([
    'encodeLabels'=>false,
    'options' => ['class' => 'navbar-nav'],
    'items' => $userItems,
]);
NavBar::end();