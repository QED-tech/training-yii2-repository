<?php
/* @var $user frontend\models\User */
/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */


use dosamigos\fileupload\FileUpload;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-md-6">
       <div class="row">
          <div class="col-md-4">

              <img width="100" src="<?= $user->getPicture() ?>">
              <?= FileUpload::widget([
                  'model' => $modelPicture,
                  'attribute' => 'picture',
                  'url' => ['/user/profile/picture-upload'], // your url, this is just for demo purposes,
                  'options' => ['accept' => 'image/*'],
                  'clientOptions' => [
                      'maxFileSize' => 2000000
                  ],
                  // Also, you can specify jQuery-File-Upload events
                  // see: https://github.com/blueimp/jQuery-File-Upload/wiki/Options#processing-callback-options
                  'clientEvents' => [
                      'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                      'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                  ],
              ]); ?>

          </div>

           <div class="col-md-4">
               <h3 class="m-0 user__username">
                   <?= Html::encode($user->username) ?>
               </h3>
               <p class="user__about">
                   <?= $user->about ?>
               </p>
           </div>
       </div>




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
