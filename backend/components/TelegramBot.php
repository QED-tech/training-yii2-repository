<?php
namespace backend\components;

use Exception;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Yii;
use yii\base\Configurable;


class TelegramBot extends Api implements Configurable
{

    /**
     * Bot token
     *
     * @var string
     */
    public $apiToken;

    /**
     * TelegramBot constructor.
     * @param array $config
     * @throws TelegramSDKException
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            Yii::configure($this, $config);
        }

        if (empty($this->apiToken)) {
            throw new Exception('Bot token cannot be empty');
        }

        parent::__construct($this->apiToken);
    }

}