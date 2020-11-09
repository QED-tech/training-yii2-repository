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
            <div class="col-md-8">
                <?php /** @var Feed $item */
                foreach ($feedItems as $item) : ?>
                    <article class="feed-article">
                        <div class="article-author">
                            <img class="profile__img--small" src="<?= $item->author_picture ?>" alt="">
                            <a href="<?= Url::to(['/user/profile/view', 'nickname' => $item->author_id]) ?>">
                                <?= $item->author_name ?>
                            </a>
                        </div>

                        <a class="article-link" href="<?= Url::to(['/post/default/view', 'id' => $item->post_id]) ?>">
                            <div class="article-image">
                                <img class="img-responsive" src="<?= Yii::$app->storage->getFile($item->post_filename) ?>" alt="">
                            </div>

                            <div class="article-description">
                                <p>
                                    <?= HtmlPurifier::process($item->post_description) ?>
                                </p>
                            </div>
                        </a>

                        <div class="article-created_at">
                            <?= Yii::$app->formatter->asDate($item->post_created_at) ?>
                        </div>
                        <div class="likes-count-wrapper">
                            Likes: <span id="like-counter-<?= $item->post_id ?>"><?= $item->countLikes() ?></span>
                        </div>

                        <div class="buttons-group">
                            <a class="liked-btn <?= $item->isLikeBy($currentUser) ? '' : 'hidden' ?>"  id="button-unlike" data-id="<?= $item->post_id ?>">
                                <i class="fas fa-heart"></i>
                            </a>

                            <a class="liked-btn <?= $item->isLikeBy($currentUser) ? 'hidden' : '' ?>" id="button-like" data-id="<?= $item->post_id ?>">
                                <i class="far fa-heart"></i>
                            </a>


                            <a >
                                report post
                            </a>
                        </div>
                        <hr>

                    </article>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>

<?php
$this->registerJsFile('@web/js/post-like.js');



