<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $model frontend\modules\post\models\forms\PostForm */
?>

<div class="post-default-intro">
    <h1>Created post!</h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'picture')->fileInput() ?>
    <?= $form->field($model, 'description') ?>
    <?= Html::submitButton('Create') ?>

    <?php ActiveForm::end(); ?>

</div>
