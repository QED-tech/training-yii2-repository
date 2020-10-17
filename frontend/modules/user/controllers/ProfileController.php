<?php


namespace frontend\modules\user\controllers;


use frontend\models\User;
use Yii;
use yii\helpers\Url;
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

    public function actionSubscribe ($id) {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/user/default/login']);
        }

        $user = $this->findUser($id);
        $currentUser = Yii::$app->user->identity;

        /** @var User $user */
        $currentUser->followUser($user);

        return $this->redirect(Yii::$app->request->referrer);
    }



}