<?php

namespace frontend\modules\post\controllers;

use frontend\modules\post\models\forms\PostForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    public function actionCreate()
    {
        $model = new PostForm(Yii::$app->user->identity);

        if ($model->load(Yii::$app->request->post())) {

            $model->picture = UploadedFile::getInstance($model, 'picture');

            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Новый пост успешно создан!');
                return $this->goHome();
            }
        }

        return $this->render('create', compact('model'));
    }
}
