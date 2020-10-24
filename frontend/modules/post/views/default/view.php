<?php
/* @var $post frontend\models\Post */

use yii\helpers\Html;

?>


<div class="post-default-intro">

    <div class="row">

        <span>
           Author:  <?= $post->user->username ?>
        </span>

        <div class="col-md-12">
            <img width="300" src="<?= $post->getImage() ?>" alt="">
        </div>

        <div class="col-md-12">
            <?= Html::encode($post->description) ?>
        </div>

    </div>
</div>
