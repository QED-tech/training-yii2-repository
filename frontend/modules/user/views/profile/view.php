<?php
/* @var $user frontend\models\User */

/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */


use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
    <div class="msg-block" id="msg-block"></div>

    <div class="col-md-4">
        <img width="200" id="profile-img" class="m-0-auto profile__img" src="<?= $user->getPicture() ?>">
    </div>

    <div class="col-md-8">

        <?= $this->render('include/file-upload.php', compact('modelPicture')) ?>


        <h3 class="m-0 user__username">
            <?= Html::encode($user->getNickname()) ?>
        </h3>
        <p class="user__about">
            <?= $user->about ?>
        </p>

        <div class="d-flex">
            <a data-toggle="modal" data-target="#subscribe-modal">
                Подписок:
                <?= count($user->getSubscriptions()) ?>
            </a>

            <a data-toggle="modal" data-target="#followers-modal">
                Подписчиков:
                <?= count($user->getFollowers()) ?>
            </a>
        </div>


        <?php if (!$user->isOwnerPage($user)) : ?>
            <div class="user__subscribe-btn">
                <a href="<?= Url::to(['profile/subscribe', 'id' => $user->id]) ?>">Subscribe</a>
            </div>

            <div class="user__subscribe-btn">
                <a href="<?= Url::to(['profile/unsubscribe', 'id' => $user->id]) ?>">Unsubscribe</a>
            </div>
        <?php endif; ?>

    </div>

</div>


<?= $this->render('include/modal-subscribe.php', compact('user')) ?>
<?= $this->render('include/modal-followers.php', compact('user')) ?>
