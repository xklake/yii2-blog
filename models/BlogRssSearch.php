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
            'created_at' => Module::t('blog', 'Created At'),
            'updated_at' => Module::t('blog', 'Updated At'),
        ];
    }

    
    public function search($params)
    {

    	$query = Blogrss::find();

        $query2 = BlogPost::find()->joinWith('blog_catalog')->all();

      /*  $ne = new BlogRss();
        $ne->user = 'haha';
        $ne->save();
       */
//        $ret = $query2->select('title', 'id', 'catalog_id')->all();

//        $ret = $query2->select(['p.title', 'p.id', 'c.id', 'CONCAT(p.title, " is ", p.id)'])->from(['blog_post p', 'blog_catalog c'])
//            ->where('p.catalog_id = c.id')->andWhere(' p.id=1 ')->all();

//        $ret = $query2->join(1, ' blog_catalog c ', ' 1.catalog_id = c.id ')->all();


        foreach($ret as $row)
        {
            //var_dump($row);
            foreach($row as $col)
            {
                echo $col;
            }
        }

/*        $ret = $query2->average('id');

        $query2->indexBy('title');

        $query2->all();

        foreach($query2->batch(1) as $rows)
        {
            foreach($rows as $row){
                echo $row['title'].'<br/>';
            }
        }
        $var = $query2->select(['id', 'catalog_id', 'title', 'content'])->where(['id'=> 1])->asArray()->all();

        foreach($var as $v)
        {
            foreach($v as $rowkey => $rowval)
            echo $rowkey.'=>'. $rowval.'<br/>';
        }
*/

    	//$query->where(['userid'=>[1]])->all();
        //$query->indexBy('userid')->all();

    	//$query->where(['userid'=>[2, 3]]); 
    	//$query->with('auth_assignment')->all(); 
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
