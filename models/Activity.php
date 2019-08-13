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

    public $creator;

    public $repeatedType;

    public $useNotification;

    public $email;

    public $file;

    public const REPEATED_TYPE = [
        1 => 'Каждый день',
        2 => 'Каждый месяц заданного числа',
        3 => 'Каждую неделю'
    ];

    public function beforeValidate()
    {
        $date = \DateTime::createFromFormat('d.m.Y H:i', $this->dateStart);
        if ($date) {
            $this->dateStart = $date->format('Y-m-d');
        }

        $date1 = \DateTime::createFromFormat('d.m.Y H:i', $this->dateEnd);
        if ($date1) {
            $this->dateEnd = $date1->format('Y-m-d');
        }

        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            ['title','required'],
            ['description','string','min' => 5],
            ['isBlocked','boolean'],
            ['dateStart','string'],
            ['dateEnd','string'],
            ['repeated','boolean'],
            ['file','file', 'maxFiles' => 3]
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