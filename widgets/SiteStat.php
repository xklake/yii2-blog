<?php
namespace funson86\blog\widgets;

use yii\base\Widget;
use yii\db\Query;
use yii\helpers\Html;

class SiteStat extends Widget
{
    public $title;

    public function init()
    {
        parent::init();

        if ($this->title === null) {
            $this->title = 'title';
        }
    }

    public function run()
    {
        $str = '';

        $query = new Query();
        $res = $query->select('sum(click) as click')
            ->from('blog_post')->one();
        $click = $res['click'];
        $str .= '<div class="site-stat">Views：'.$click.'</div>';

        $postCount = $query->from('blog_post')->count();
        $str .= '<div class="site-stat">Posts：'.$postCount.'</div>';

        $commentCount = $query->from('blog_comment')->count();
        $str .= '<div class="site-stat">Comments：'.$commentCount.'</div>';

        return $this->render('portal', [
            'title' => $this->title,
            'content' => $str,
        ]);
    }
}