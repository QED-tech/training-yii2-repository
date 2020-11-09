<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Admin site!</h1>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <a href="<?= Url::to('/complaints/manage') ?>">Управление жалобами</a>
            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>

    </div>
</div>
