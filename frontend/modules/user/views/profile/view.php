<?php
/* @var $user frontend\models\User */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
    <div class="col-md-6">
        <h3 class="m-0 user__username">
            <?= Html::encode($user->username) ?>
        </h3>

        <p class="user__about">
            <?= $user->about ?>
        </p>
    </div>

    <div class="col-md-6">
        <div class="user__subscribe-btn">
            <a href="<?= Url::to(['profile/subscribe', 'id' => $user->id]) ?>">Subscribe</a>
        </div>

        <span>
            Подписок:
            <?= count($user->getSubscriptions())?>
        </span>
        <br>
        <span>
            Подписчиков:
            <?= count($user->getFollowers())?>
        </span>
    </div>
</div>




