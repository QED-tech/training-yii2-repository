<?php

use dosamigos\fileupload\FileUpload;
/* @var $modelPicture frontend\modules\user\models\forms\PictureForm */
?>
<?= FileUpload::widget([
    'model' => $modelPicture,
    'attribute' => 'picture',
    'url' => ['/user/profile/picture-upload'], // your url, this is just for demo purposes,
    'options' => ['accept' => 'image/*'],

    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
                                let msgBlock = document.getElementById("msg-block")
                                if( data._response.result.success === true ) {
                                    let profileImg = document.getElementById("profile-img")
                                    profileImg.src = data._response.result.pictureUri
                                    
                                    msgBlock.innerHTML = `
                                        <div class="alert alert-success" role="alert">
                                            <strong>Картинка профиля обновлена!</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    `
                                    
                                } else {
                                    msgBlock.innerHTML = `
                                        <div class="alert alert-danger" role="alert">
                                            <strong>${data._response.result.errors.picture[0]}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    `
                                 }
                                                                                                           
                                console.log(data._response.result);
                            }'

    ],
]); ?>