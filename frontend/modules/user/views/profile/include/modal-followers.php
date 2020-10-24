<!-- Modal followers -->
<div class="modal fade" id="followers-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подписчики</h5>
            </div>
            <div class="modal-body">

                <?php use yii\helpers\Url;

                foreach ($user->getFollowersList() as $follower) : ?>
                    <div>
                        <a href="<?= Url::to(['/user/profile/view', 'nickname' => $follower->getNickname()]) ?>">
                            <?= $follower->username ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>