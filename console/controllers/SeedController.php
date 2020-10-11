<?php

namespace console\controllers;
use common\models\User;
use Faker\Factory;
use Yii;
use yii\console\Controller;

class SeedController extends Controller
{

    public function actionIndex()
    {
        $faker = Factory::create();

        $user = new User([
            'username' => $faker->userName,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => $faker->password(6, 15),
            'username' => $faker->userName,
            'email' => $faker->email,
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $user->save();
    }
}