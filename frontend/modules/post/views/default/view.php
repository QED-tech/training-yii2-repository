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
            <div class="likes-count-wrapper"> Likes: <span id="like-counter"><?= $post->countLikes() ?></span> </div>
        <hr>
           <div class="buttons-group">
               <?php if($post->isLikeBy($currentUser)) : ?>
                   <a class="badge badge-success" id="button-unlike" data-id="<?= $post->id ?>">Unlike</a>
               <?php else: ?>
                   <a class="badge badge-success" id="button-like" data-id="<?= $post->id ?>">Like</a>
               <?php endif ?>

           </div>
        </div>



<?php $this->registerJsFile('@web/js/post-like.js') ?>