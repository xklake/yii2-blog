<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model funson86\blog\models\BlogRss */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-rss-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subscribetime')->textInput() ?>

    <?= $form->field($model, 'hasscubscribed')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('blog', 'Create') : Yii::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
