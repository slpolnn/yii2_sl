<?php

namespace app\components;

use app\models\Activity;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\Component;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ActivityComponent extends Component
{
    public $baseModel;
    public $file;
    /**
     * @var UploadedFile[]
     */
    public function getModel()
    {
        return new $this->baseModel();
    }

    public function createActivity(Activity &$activity): bool
    {

        $activity->file=UploadedFile::getInstances($activity,'file');

        if(!$activity->validate()){
            return false;
        }

        if($activity->file){

                $filename = $this->saveUploadedFile($activity->file);
                $activity->file = $filename;

        }

        return true;
    }


     private function saveUploadedFile(UploadedFile $uploadedFile): ?string
     {

             $filename = $this->genFileName($uploadedFile);

             $path = $this->getSavePath();
                 if ($uploadedFile->saveAs($path . $filename)) {
                     return $filename;
                 } else {
                     return null;
                 }

     }

    private function genFileName(UploadedFile $uploadedFile): string
    {
        return time().'.'.$uploadedFile->extension;
    }

    private function getSavePath():string {
        FileHelper::createDirectory(\Yii::getAlias('@webroot/images'));
        return \Yii::getAlias('@webroot/images/');
    }

}