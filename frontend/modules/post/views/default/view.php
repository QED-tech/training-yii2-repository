<?php
/* @var $post frontend\models\Post */
/* @var $currentUser User */

/* @var $this Yii\web\View */

use frontend\models\User;
use yii\helpers\Html;

?>


    <div class="post-default-intro col-md-8">

        <div>
            Author: <?= $post->user->username ?>
        </div>

        <img class="img-responsive" " src="<?= $post->getImage() ?>" alt="">

        <div>
            <?= Html::encode($post->description) ?>
        </div>

        <div class="likes-count-wrapper">
            Likes: <span id="like-counter-<?= $post->id ?>"><?= $post->countLikes() ?></span>
        </div>

        <div class="buttons-group">

            <a class="liked-btn <?= $post->isLikeBy($currentUser) ? '' : 'hidden' ?>"  id="button-unlike" data-id="<?= $post->id ?>">
                <i class="fas fa-heart"></i>
            </a>

            <a class="liked-btn <?= $post->isLikeBy($currentUser) ? 'hidden' : '' ?>" id="button-like" data-id="<?= $post->id ?>">
                <i class="far fa-heart"></i>
            </a>
        </div>


    </div>


<?php $this->registerJsFile('@web/js/post-like.js') ?>