<?php
/**
 * @var $model \app\models\Activity
 */
use kartik\datetime\DateTimePicker;
?>
<div class="row">
    <div class="col-md-12">
        <h3>Создание события</h3>


        <?php $form=\yii\bootstrap\ActiveForm::begin();?>
        <?=$form->field($model, 'title')?>
        <?=$form->field($model, 'description')->textarea()?>
        <?=$form->field($model, 'dateStart')->widget(DateTimePicker::class,[
                'convertFormat' => true,
                'pluginOptions' => [
                        'format'=>'dd.MM.yyyy hh:i',
                        'autoclose'=>true,
                        'weekStart'=>1,
                        'todayBtn'=>true
                ]
        ])?>
        <?=$form->field($model, 'dateEnd')->widget(DateTimePicker::class,[
            'convertFormat' => true,
            'pluginOptions' => [
                'format'=>'dd.MM.yyyy hh:i',
                'autoclose'=>true,
                'weekStart'=>1,
                'todayBtn'=>true
            ]
        ])?>
        <?=$form->field($model, 'isBlocked')->checkbox() ?>
        <?=$form->field($model, 'repeated')->checkbox() ?>
        <?=$form->field($model,'repeatedType')->dropDownList($model::REPEATED_TYPE)?>
        <?=$form->field($model, 'useNotification')->checkbox() ?>
        <?=$form->field($model, 'email',['enableAjaxValidation'=>true,'enableClientValidation'=>false]);?>
        <?=$form->field($model, 'file[]')->fileInput(['multiple'=>true, 'accept'=>'image/*'])?>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
