<?php


namespace app\models;


use yii\base\Model;
use yii\validators\Validator;

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
            ['title', 'trim'],
            ['title','required','message' => 'Данное поле обязательно для заполнения'],
            ['dateStart','required','message' => 'Данное поле обязательно для заполнения'],
            ['description', 'string', 'min' => 5, 'max' => 150],
            [['dateStart','dateEnd'], 'date', 'format' => 'php:Y-m-d'],
            ['file','file','extensions' => ['jpg','png']],
            ['repeatedType','in','range' => array_keys(self::REPEATED_TYPE)],
            ['email','email'],
            ['email','required','when' => function($model){
               return $model->useNotification?true:false;
            }],
            [['isBlocked', 'isRepeated', 'useNotification'], 'boolean'],
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