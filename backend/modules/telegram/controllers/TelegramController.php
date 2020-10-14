<?php

namespace backend\modules\telegram\controllers;


use backend\modules\telegram\models\TelegramCallback;
use backend\modules\telegram\models\TelegramMessage;
use Telegram\Bot\Api;
use Yii;
use yii\web\Controller;


class TelegramController extends Controller
{

    public $enableCsrfValidation = false;


    public function actionWebhookHandler()
    {

        try {
            $update = Yii::$app->Telegram->commandsHandler(true);

            if ($update->isType('callback_query')) {
                TelegramCallback::handler($update);
            } elseif ($update->isType('message')) {
                TelegramMessage::handler($update);
            }
        } catch (\Exception $e) {
            Yii::info($e->getMessage());

            ob_start();
            print_r($e->getMessage());
            $debug = ob_get_contents();
            ob_end_clean();
            $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/logs/errors.logs', 'a+');
            fwrite($fp, $debug);
            fclose($fp);


        } finally {
            return 'ok';
        }

    }


}
