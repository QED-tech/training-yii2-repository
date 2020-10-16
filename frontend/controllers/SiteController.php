<?php
namespace frontend\controllers;

use frontend\models\User;
use Redis;
use Yii;
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
        $users = User::find()->all();

//        Yii::$app->redis->set('mykey', 'some value');
         $key = Yii::$app->redis->get('mykey');
         echo $key;die;

        return $this->render('index', compact('users'));
    }


}
