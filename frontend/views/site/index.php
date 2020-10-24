<?php
/** @var array $users */
/* @var $this yii\web\View */
/* @var $pages frontend\controllers\SiteController */
/* @var $feedItems Feed */

/* @var $currentUser User */

use frontend\models\Feed;
use frontend\models\User;
use \yii\helpers\HtmlPurifier;
use yii\helpers\Url;

$this->title = 'Instagram';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Feed</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <?php /** @var Feed $item */
                foreach ($feedItems as $item) : ?>
                    <article class="feed-article">
                        <div class="article-author">
                            <img width="40" height="40" class="profile__img--small" src="<?= $item->author_picture ?>" alt="">
                            <a href="<?= Url::to(['/user/profile/view', 'nickname' => $item->author_id]) ?>">
                                <?= $item->author_name ?>
                            </a>
                        </div>

                        <div class="article-image">
                            <img class="img-responsive" src="<?= Yii::$app->storage->getFile($item->post_filename) ?>" alt="">
                        </div>

                        <div class="article-description">
                            <p>
                             <?= HtmlPurifier::process($item->post_description) ?>
                            </p>
                        </div>

                        <hr>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>




