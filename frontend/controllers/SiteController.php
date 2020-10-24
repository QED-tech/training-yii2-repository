<?php
namespace frontend\controllers;

use frontend\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\Cors;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];


    }



    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $users = User::find();
        $pages = new Pagination(['totalCount' => User::find()->count(), 'pageSize' => 10, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $users = $users->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        $redis = Yii::$app->redis;
        $redis->publish('chat', 'hello');

        return $this->render('index', compact('users', 'pages'));
    }


}
