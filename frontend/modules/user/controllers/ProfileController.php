<?php


namespace frontend\modules\user\controllers;


use frontend\models\User;
use frontend\modules\user\behaviors\AccessControl;
use frontend\modules\user\models\forms\PictureForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
            AccessControl::class
        ];
    }

    public function actionView($nickname)
    {
        $user = $this->findUser($nickname);
        $modelPicture = new PictureForm();

        return $this->render('view', compact('user', 'modelPicture'));
    }

    public function findUser($nickname)
    {
        $user = User::find()->where(['nickname' => $nickname])->orWhere(['id' => $nickname])->one();
        if (!$user) {

            return new NotFoundHttpException('user not found');
        }
        return $user;
    }

    /**
     * @param $id
     * @return Response
     */
    public function actionSubscribe($id)
    {

        $user = $this->findUser($id);
        $currentUser = Yii::$app->user->identity;

        /** @var User $user */
        $currentUser->followUser($user);

        return $this->redirect(Yii::$app->request->referrer);
    }


    /**
     * @param $id
     * @return Response
     */
    public function actionUnsubscribe($id)
    {

        $user = $this->findUser($id);
        $currentUser = Yii::$app->user->identity;
        /** @var User $user */
        $currentUser->unfollowUser($user);
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionPictureUpload()
    {
        $model = new PictureForm();
        $model->picture = UploadedFile::getInstance($model, 'picture');

        if ($model->validate()) {

            $user = Yii::$app->user->identity;
            $user->picture = Yii::$app->storage->saveUploadedFiles($model->picture);
            $user->save(false, ['picture']);
        }

    }




}