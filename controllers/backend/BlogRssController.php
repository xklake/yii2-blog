<?php
namespace funson86\blog\controllers\backend;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii; 


class BlogRssController extends \common\controller\Controller
{
    public function actionIndex()
    {
    	$searchModel = new \funson86\blog\models\BlogRssSearch();
    	
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    	return $this->render('index', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    	    	
        return $this->render('index');
    }

    public function behaviors()
    {
    	return [
    			'verbs' => [
    					'class' => VerbFilter::className(),
    					'actions' => [
    							'delete' => ['post'],
    					],
    			],
    			'access' => [
    					'class' => AccessControl::className(),
    					'rules' => [
    							[
    									'allow' => true,
    									'roles' => ['@']
    							]
    					]
    			],
    	];
    }    
    
}
