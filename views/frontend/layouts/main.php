<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use funson86\blog\assets\AppAsset;
use funson86\blog\widgets\Alert;
use funson86\blog\widgets\Search;
use funson86\blog\widgets\TagCloud;
use funson86\blog\widgets\Links;
use funson86\blog\widgets\RecentComments;
use funson86\blog\widgets\SiteStat;
use funson86\blog\widgets\RecentPosts;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="Robots" Content="All">
    <meta name="googlebot" content="All">
    <meta name="keywords" content="<?//= Html::encode($this->seoKeywords) ?>" />
    <meta name="description" content="<?//= Html::encode($this->seoDescription) ?>" />
    <meta name="author" content="Babyblog" />
    <meta name="Copyright" content="Babyblog" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container" id="page">
    <div id="header">
        <div id="logo">This is logo</div>
        <div id='search'><?= Search::widget() ?></div>
        <div class="clear"></div>
    </div><!-- header -->

    <div class="clear"></div>

    <div id="mainmenu">
        <?= Nav::widget(['items' => Yii::$app->params['mainMenu']]); ?>
    </div>

    <?= Breadcrumbs::widget([
        'links' => isset($this->breadcrumbs) ? $this->breadcrumbs : [],
    ]) ?>

    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">

            <?= TagCloud::widget([
                'title' => '<i class="icon-st"></i>Tags',
                'maxTags' => 5,
            ]) ?>

            <?= \funson86\blog\widgets\RecentPosts::widget([
                'title' => '<i class="icon-st"></i>Latest Posts',
                'maxPosts' => 5,
            ]) ?>

            <?= RecentComments::widget([
                'title' => '<i class="icon-st"></i>Latest Comments',
                'maxComments' => 5,
            ]) ?>

            <?= Links::widget([
                'title' => '<i class="icon-st"></i>Friendly Links',
                'links' => [],
            ]) ?>

            <?= SiteStat::widget([
                'title' => '<i class="icon-st"></i>Stastics',
            ]) ?>
        </div>
    </div>

</div>

<div id="footer">
    
</div><!-- footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
