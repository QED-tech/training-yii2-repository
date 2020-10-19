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

        <?php if (!$user->isOwnerPage($user)) : ?>
            <div class="user__subscribe-btn">
                <a href="<?= Url::to(['profile/subscribe', 'id' => $user->id]) ?>">Subscribe</a>
            </div>

            <div class="user__subscribe-btn">
                <a href="<?= Url::to(['profile/unsubscribe', 'id' => $user->id]) ?>">Unsubscribe</a>
            </div>
        <?php endif; ?>


        <a data-toggle="modal" data-target="#subscribe-modal">
            Подписок:
            <?= count($user->getSubscriptions()) ?>
        </a>

        <br>

        <a data-toggle="modal" data-target="#followers-modal">
            Подписчиков:
            <?= count($user->getFollowers()) ?>
        </a>
    </div>
</div>



<?= $this->render('include/modal-subscribe.php', compact('user')) ?>
<?= $this->render('include/modal-followers.php', compact('user')) ?>
