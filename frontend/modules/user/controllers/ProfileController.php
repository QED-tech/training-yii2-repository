<?php


namespace frontend\modules\user\controllers;


use frontend\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProfileController extends Controller
{

    public function actionView($nickname)
    {
        $user = $this->findUser($nickname);
        return $this->render('view', compact('user'));
    }

    public function findUser($nickname) {
        $user = User::find()->where(['nickname' => $nickname])->orWhere(['id' => $nickname])->one();
        if (!$user) {

            return new NotFoundHttpException('user not found');
        }
        return $user;
    }



}