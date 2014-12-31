<?php

namespace funson86\blog\models;

use Yii;
use funson86\blog\Module;

/**
 * This is the model class for table "{{%blog_rss}}".
 *
 * @property integer $userid
 * @property integer $subscribetime
 * @property integer $hasscubscribed
 *
 * @property User $user
 */
class BlogRss extends \common\models\ActiveRecord
{
    /**
     * @inheritdoc
     */
	private $update_at;
	
	
    public static function tableName()
    {
        return '{{%blog_rss}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subscribetime', 'hasscubscribed'], 'required'],
            [['subscribetime', 'hasscubscribed'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => Module::t('blog', 'User'),
            'subscribetime' => Module::t('blog', 'Subscribe Time'),
            'hasscubscribed' => Module::t('blog', 'Has scubscribed'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
