<?php


namespace app\models;


use yii\base\Model;

class Day extends Model
{
    public $isWeekDay;

    public $actionDay;

    public function rules()
    {
        return [
          ['actionDay','boolean'],
          ['isWeekDay','boolean']
        ];
    }
}