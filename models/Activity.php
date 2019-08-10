<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;

    public $description;

    public $dateStart;

    public $dateEnd;

    public $repeated;

    public $isBlocked;

    public function rules()
    {
        return [
            ['title','required'],
            ['description','string','min' => 5],
            ['isBlocked','boolean'],
            ['dateStart','string'],
            ['dateEnd','string'],
            ['repeated','boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
          'title'=>'Событие',
          'description'=>'Описание события',
          'dateStart'=>'Дата начала',
          'dateEnd'=>'Дата окончания',
          'isBlocked'=>'Блокировка события',
          'repeated'=>'Повторять событие'
        ];
    }
}