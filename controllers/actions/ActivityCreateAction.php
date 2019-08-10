<?php

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public $name;
    public function run()
    {
        $model=new Activity();
        return $this->controller->render('create',['name'=>$this->name,'model'=>$model]);
    }
}