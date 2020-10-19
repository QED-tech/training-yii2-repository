<!-- Modal subscribe -->
<div class="modal fade" id="subscribe-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Подписки</h5>
            </div>
            <div class="modal-body">

                <?php use yii\helpers\Url;

                foreach ($user->getSubscriptionList() as $subscription) : ?>
                    <div>
                        <a href="<?= Url::to(['/user/profile/view', 'nickname' => $subscription->getNickname()]) ?>">
                            <?= $subscription->username ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>