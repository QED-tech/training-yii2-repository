<?php
/** @var array $users */
/* @var $this yii\web\View */
/* @var $pages frontend\controllers\SiteController */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Instagram';
?>
<div class="site-index">

    <div class="jumbotron">

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <?php
                foreach ($users as $user): ?>

                    <p>
                        <a href="<?= Url::to(['/user/profile/view', 'nickname' =>  $user->getNickname()]) ?>">
                            <?= $user->username ?>
                        </a>
                    </p>
                    <hr>
                <?php endforeach; ?>

                <?php

                // pagination
                echo LinkPager::widget([
                    'pagination' => $pages,
                ]);

                ?>
            </div>

            <div class="col-lg-4">

            </div>
        </div>

    </div>
</div>
