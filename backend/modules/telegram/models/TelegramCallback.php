<?php

namespace backend\modules\telegram\models;

class TelegramCallback
{

    public static function handler($update)
    {
        $chat_id = $update->getMessage()->chat->id;
        $username = $update->getMessage()->from->username;


        ob_start();
        print_r($username);
        $debug = ob_get_contents();
        ob_end_clean();
        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/logs/username.logs', 'w+');
        fwrite($fp, $debug);
        fclose($fp);


        return 'ok';

    }

}