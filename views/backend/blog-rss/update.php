<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model funson86\blog\models\BlogRss */

$this->title = Yii::t('blog', 'Update {modelClass}: ', [
    'modelClass' => 'Blog Rss',
]) . ' ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('blog', 'Blog Rsses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = Yii::t('blog', 'Update');
?>
<div class="blog-rss-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
