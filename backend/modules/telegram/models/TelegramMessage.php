<?php

namespace backend\modules\telegram\models;


use Telegram\Bot\Laravel\Facades\Telegram;
use Yii;

class TelegramMessage
{


    public static function handler($update)
    {

        $chat_id = $update->getMessage()->chat->id;
        $username = $update->getMessage()->from->username;


        Yii::$app->Telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => "Hello mr, {$username}"
        ]);



    }
}