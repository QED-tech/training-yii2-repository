<?php


namespace backend\modules\telegram\traits;


use Yii;

trait TelegramHelper
{


    public static function sendMessageWrapper($chat_id, $text, $parse_mode = 'markdown', $reply_markup = null)
    {
        Yii::$app->Telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'reply_markup' => $reply_markup
        ]);
    }

}