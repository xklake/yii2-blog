<?php

namespace funson86\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
class BlogRssSearch extends \funson86\blog\models\BlogRss
{
    /**
     * @inheritdoc
     */
	private $_status;
	
	
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
            'userid' => Yii::t('blog', 'Userid'),
            'subscribetime' => Yii::t('blog', 'Subscribetime'),
            'hasscubscribed' => Yii::t('blog', 'Hasscubscribed'),
        ];
    }

    
    public function search($params)
    {
    	$query = Blogrss::find();
    	
    	//$query->orderBy(['sort_order' => SORT_ASC, 'create_time' => SORT_DESC]);
    	
    	$dataProvider = new ActiveDataProvider([
    			'query' => $query,
    	]);
    	
    	if (!($this->load($params) && $this->validate())) {
    		return $dataProvider;
    	}
    	
    	$query->andFilterWhere([
    			'id' => $this->userid,
    			'Hasscubscribed'=>$this->status, 
    	]);
    	
    	return $dataProvider;    	
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userid']);
    }
}
