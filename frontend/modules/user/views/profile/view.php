<?php
/* @var $user frontend\models\User */
use yii\helpers\Html;
?>


<h3>
    <?= Html::encode($user->username) ?>
</h3>

<p>
    <?= $user->about ?>
</p>
