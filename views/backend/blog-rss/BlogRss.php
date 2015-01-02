<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model funson86\blog\models\BlogRss */
/* @var $form ActiveForm */
?>
<div class="BlogRss">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'subscribetime') ?>
        <?= $form->field($model, 'hasscubscribed') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('blog', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- BlogRss -->
