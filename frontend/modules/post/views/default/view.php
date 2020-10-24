<?php
/* @var $post frontend\models\Post */
/* @var $currentUser User */

/* @var $this Yii\web\View */

use frontend\models\User;
use yii\helpers\Html;

?>


    <div class="post-default-intro">

        <span>
           Author:  <?= $post->user->username ?>
        </span>

        <img width="300" src="<?= $post->getImage() ?>" alt="">

        <?= Html::encode($post->description) ?>

        <div class="likes-count-wrapper">
            Likes: <span id="like-counter-<?= $post->id ?>"><?= $post->countLikes() ?></span>
        </div>

        <div class="buttons-group">


            <a class="badge  <?= $post->isLikeBy($currentUser) ? 'bg-is-liked' : 'hidden' ?>"  id="button-unlike" data-id="<?= $post->id ?>">
                Like
            </a>

            <a class="badge  <?= $post->isLikeBy($currentUser) ? 'hidden' : '' ?>" id="button-like" data-id="<?= $post->id ?>">
                Like
            </a>


        </div>

        <hr>
    </div>


<?php $this->registerJsFile('@web/js/post-like.js') ?>