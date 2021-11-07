<?php

use kartik\tabs\TabsX;

?>
<div class="settings-title settings" style="text-align: center">
<h1>Updating <?=$model->username?></h1>

<?php
//view user details
$this->beginBlock('details');
echo $this->render('update_details',['model'=>$model]);
$this->endBlock();

//view user profile
$this->beginBlock('profile');
echo $this->render('update_profile',['profile'=>$profile]);
$this->endBlock();

//view users social profiles
$this->beginBlock('socials');
echo $this->render('update_socials');
$this->endBlock();

$items = [
        [
            'label' => 'Details',
            'content' => $this->blocks['details'],
        ],
        [
            'label' => 'Profile',
            'content' => $this->blocks['profile'],
        ],
        [
            'label' => 'Social Profiles',
            'content' => $this->blocks['socials'],
        ],
];


echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false
]);

?>

</div>