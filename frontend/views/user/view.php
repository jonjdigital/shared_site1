<?php
?>

<div class="row">
    <div class="col-md-4" id="avatar">
        <div id="profile_avatar">To Be Implemented</div>
    </div>
    <div class="col-md-8" id="info">
        <h1 id="username"><?= $user->display_name ?></h1>
        <p>Account created: <?php echo date("D jS F Y",$user->created_at)?></p>
        <hr>
        <h3>Roles:</h3>
        <ul class="role-list">
        <?php foreach ($roles as $role){
            echo "<li id='listed-role'>{$role}</li>";
        }?>
            <li id="listed-role">Public</li>
        </ul>
    </div>
</div>
