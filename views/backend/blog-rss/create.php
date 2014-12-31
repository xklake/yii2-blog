<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model funson86\blog\models\BlogRss */

$this->title = Yii::t('blog', 'Create {modelClass}', [
    'modelClass' => 'Blog Rss',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('blog', 'Blog Rsses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-rss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
