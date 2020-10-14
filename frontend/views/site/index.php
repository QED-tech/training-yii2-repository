<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Instagram';
?>
<div class="site-index">

    <div class="jumbotron">

    </div>

    <div class="body-content">


        <div class="row">
            <div class="col-lg-4">
                <?php /** @var array $users */
                foreach ($users as $user): ?>

                    <p>
                        <a href="<?= Url::to(['/user/profile/view', 'nickname' =>  $user->getNickname()]) ?>">
                            <?= $user->username ?>
                        </a>
                    </p>
                    <hr>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>

    </div>
</div>
