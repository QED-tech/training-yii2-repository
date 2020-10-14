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

        for($i = 0; $i <= 100; $i++) {
            $user = new User([
                'username' => $faker->userName,
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password_hash' => $faker->password(6, 15),
                'about' => $faker->realText(40),
                'nickname' => $faker->userName,
                'email' => $faker->email,
                'status' => 10,
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $user->save();
        }
    }
}