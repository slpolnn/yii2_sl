<?php
/**
 * @var $model \app\models\Activity
 */
?>
<div class="row">
    <div class="col-md-12">
        <h3>Создание события</h3>
        <strong><?=$name?></strong>

        <?php $form=\yii\bootstrap\ActiveForm::begin();?>
        <?=$form->field($model, 'title');?>
        <?=$form->field($model, 'description')->textarea()?>
        <?=$form->field($model, 'dateStart')->input('date')?>
        <?=$form->field($model, 'isBlocked')->checkbox() ?>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Создать</button>
        </div>

        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
