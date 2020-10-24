<?php


namespace frontend\modules\post\models\forms;


use frontend\models\events\PostCreatedEvent;
use frontend\models\Post;
use frontend\models\User;
use Intervention\Image\ImageManager;
use Yii;
use yii\base\Model;

/**
 *
 * @property-read mixed $maxFileSize
 */
class PostForm extends Model
{
    const MAX_DESCRIPTION_LENGTH = 1000;
    const EVENT_POST_CREATED = 'post_created';

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
        $this->on(self::EVENT_AFTER_VALIDATE, [$this, 'resizePicture']);
        $this->on(self::EVENT_POST_CREATED, [Yii::$app->feedService, 'addToFeeds']);
    }

    public function save()
    {
        if ($this->validate()) {
            $post = new Post();

            $post->filename = Yii::$app->storage->saveUploadedFiles($this->picture);
            $post->description = $this->description;
            $post->user_id = $this->user->getId();
            $post->created_at = time();
            if($post->save(false)) {

                $event = new PostCreatedEvent();
                $event->user = $this->user;
                $event->post = $post;

                $this->trigger(self::EVENT_POST_CREATED, $event);
                return true;
            }
        }

        return false;
    }

    public function resizePicture()
    {
        $width = Yii::$app->params['postPicture']['maxWidth'];
        $height = Yii::$app->params['postPicture']['maxHeight'];

        $manager = new ImageManager(['driver' => 'imagick']);
        $image = $manager->make($this->picture->tempName);

        $image->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save();
    }


    private function getMaxFileSize()
    {
        return Yii::$app->params['maxFileSize'];
    }

}