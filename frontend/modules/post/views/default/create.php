<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $model frontend\modules\post\models\forms\PostForm */
?>

<div class="created-post__wrapper">
    <h1>Created post!</h1>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'picture')->fileInput() ?>
    <?= $form->field($model, 'description') ?>
    <?= Html::submitButton('Create') ?>

    <?php ActiveForm::end(); ?>

</div>
