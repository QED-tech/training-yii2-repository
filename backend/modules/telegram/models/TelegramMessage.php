<?php

namespace backend\modules\telegram\models;


use backend\modules\telegram\traits\TelegramHelper;
use Telegram\Bot\Keyboard\Keyboard;
use Yii;

class TelegramMessage
{

    use TelegramHelper;

    public static function handler(&$update)
    {
        $chat_id = $update->getMessage()->chat->id;
        $username = $update->getMessage()->from->username;
        $message = $update->getMessage()->text;

        switch ($message) {
            case '/start':
                self::defaultMessage($chat_id, 'hello');
                break;
        }

        self::sendMessageWrapper($chat_id, $username);
    }


    public static function defaultMessage($chat_id, $text)
    {


        $reply_markup = Keyboard::make()
            ->row(Keyboard::inlineButton(['text' => 'tests']))
            ->row(Keyboard::inlineButton(['text' => 'tests']));

        self::sendMessageWrapper($chat_id, $text, 'markdown', $reply_markup);

    }
}