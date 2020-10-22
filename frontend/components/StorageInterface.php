<?php


namespace frontend\components;


use yii\web\UploadedFile;

interface StorageInterface
{

    public function saveUploadedFiles(UploadedFile $file);

    public function getFile(string $filename);

}