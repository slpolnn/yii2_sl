<?php

namespace app\components;

use app\models\Activity;
use phpDocumentor\Reflection\Types\Boolean;
use yii\base\Component;

class ActivityComponent extends Component
{
    public $baseModel;

    public function getModel()
    {
        return new $this->baseModel();
    }

    public function createActivity(Activity &$activity): bool
    {
        if($activity->validate()){
            return true;
        }
        return false;
    }
}