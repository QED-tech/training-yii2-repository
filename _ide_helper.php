<?php
/*
 * Yii2 Ide Helper
 * https://github.com/takashiki/yii2-ide-helper
 */

class Yii extends \yii\BaseYii
{
    /**
     * @var BaseApplication
     */
    public static $app;
}

/**
 * @property yii\caching\FileCache $cache
 * @property Mis\IdeHelper\IdeHelper $ideHelper
 * @property yii\db\Connection $db
 * @property yii\swiftmailer\Mailer $mailer
 * @property yii\authclient\Collection $authClientCollection
 * @property backend\components\TelegramBot $Telegram
 */
abstract class BaseApplication extends \yii\base\Application {}