<?php

namespace app\controllers\actions;

use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public $name;
    public function run()
    {
        $model= \Yii::$app->activity->getModel();

        if(\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->activity->createActivity($model)){

            }else{
                print_r($model->getErrors());
            }
 //           print_r($model->getAttributes());
 //           exit();
        }

        return $this->controller->render('create',['name'=>$this->name,'model'=>$model]);
    }
}