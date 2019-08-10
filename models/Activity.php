<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;

    public $description;

    public $dateStart;

    public $isBlocked;

    public function rules()
    {
        return [
            ['title','required'],
            ['description','string','min' => 5],
            ['isBlocked','boolean'],
            ['dateStart','string']
        ];
    }

    public function attributeLabels()
    {
        return [
          'title'=>'Событие',
          'description'=>'Описание события',
          'dateStart'=>'Дата проведения',
          'isBlocked'=>'Блокировка события'
        ];
    }
}