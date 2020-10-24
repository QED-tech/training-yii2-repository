<?php

namespace frontend\modules\post\controllers;

use frontend\models\Post;
use frontend\modules\post\models\forms\PostForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Default controller for the `post` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * @return string|Response
     */
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

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'post' => $this->findPost($id),
            'currentUser' => Yii::$app->user->identity
        ]);
    }

    /**
     * @param $id
     * @return Post|null
     * @throws NotFoundHttpException
     */
    public function findPost($id)
    {
        if ($post = Post::findOne($id)) {
            return $post;
        }

        throw new NotFoundHttpException();
    }

    public function actionLike()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if(Yii::$app->user->isGuest) {
            return [
                'success' => false,
                'redirect' => 'login'
            ];
        }

        $currentUser = Yii::$app->user->identity;
        $id = Yii::$app->request->post('id');
        $post = Post::findOne($id);

        $post->like($currentUser);

        return [
          'success' => true,
            'likeCount' => $post->countLikes()
        ];
    }

    public function actionUnlike()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        if(Yii::$app->user->isGuest) {
            return [
                'success' => false,
                'redirect' => 'login'
            ];
        }

        $currentUser = Yii::$app->user->identity;
        $id = Yii::$app->request->post('id');
        $post = Post::findOne($id);

        $post->unlike($currentUser);

        return [
            'success' => true,
            'likeCount' => $post->countLikes()
        ];
    }
}
