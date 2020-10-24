<?php


namespace frontend\modules\post\models\forms;


use frontend\models\Post;
use frontend\models\User;
use Yii;
use yii\base\Model;

class PostForm extends Model
{

    const MAX_DESCRIPTION_LENGTH = 1000;

    public $picture;
    public $description;
    private $user;

    public function rules()
    {
        return [
            [['picture'], 'file',
                'skipOnEmpty' => false,
                'extensions' => ['png', 'jpg', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => $this->getMaxFileSize()],
            [['description'], 'string',
                'max' => self::MAX_DESCRIPTION_LENGTH]
        ];
    }


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        if ($this->validate()) {
            $post = new Post();

            $post->filename = Yii::$app->storage->saveUploadedFiles($this->picture);
            $post->description = $this->description;
            $post->user_id = $this->user->getId();
            $post->created_at = time();
            return $post->save(false);
        }
    }


    private function getMaxFileSize()
    {
        return Yii::$app->params['maxFileSize'];
    }

}