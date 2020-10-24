<?php
/* @var $user frontend\models\User */

/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */

/* @var $this View */

use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

?>

<div class="row" data-user-id="<?= $user->getId() ?>" id="user-id">
    <div class="msg-block" id="msg-block"></div>

    <div class="col-md-4">
        <img width="200" id="profile-img" class="m-0-auto profile__img" src="<?= $user->getPicture() ?>">
    </div>

    <div class="col-md-8">

        <?php if ($user->isOwnerPage($user)) : ?>
            <?= $this->render('include/file-upload.php', compact('modelPicture')) ?>
        <?php endif; ?>


        <h3 class="m-0 user__username">
            <?= Html::encode($user->getNickname()) ?>
        </h3>
        <p class="user__about">
            <?= $user->about ?>
        </p>

        <div class="d-flex">
            <a data-toggle="modal" class="btn" data-target="#subscribe-modal">
                Подписок:
                <?= count($user->getSubscriptions()) ?>
            </a>

            <a data-toggle="modal" class="btn" data-target="#followers-modal">
                Подписчиков:
                <?= count($user->getFollowers()) ?>
            </a>
        </div>

        <?php if (!$user->isOwnerPage($user)) : ?>
            <hr>
            <div class="btn-group" id="subscribe-or-unsubscribe-btn"></div>
        <?php endif; ?>

    </div>

</div>


<?= $this->render('include/modal-subscribe.php', compact('user')) ?>
<?= $this->render('include/modal-followers.php', compact('user')) ?>


<script>
    const btnBox = document.getElementById('subscribe-or-unsubscribe-btn')
    const userId = document.getElementById('user-id')

    async function subscribeOrUnsubscribeBtn() {

        if(btnBox === null) {
            return false;
        }

        let formData = new FormData
        formData.append('id', userId.dataset.userId)

        let res = await fetch('/user/profile/get-subscribe-or-unsubscribe', {
            method: 'POST',
            body: formData
        })

        let response = await res.json()

        response.isSubscribe === "1"
            ?
            btnBox.innerHTML = `<a class="btn box-shadow-btn" href="<?= Url::to(['profile/unsubscribe', 'id' => $user->id]) ?>">Unsubscribe</a>`
            :
            btnBox.innerHTML = `<a class="btn box-shadow-btn" href="<?= Url::to(['profile/subscribe', 'id' => $user->id]) ?>">Subscribe</a>`

    }

    subscribeOrUnsubscribeBtn()
</script>