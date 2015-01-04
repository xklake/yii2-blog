<?php
namespace funson86\blog\controllers\backend;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii;
use funson86\blog\models\BlogRss;


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

    public function actionView($id)
    {
        //if(!Yii::$app->user->can('readPost')) throw new HttpException(401, 'No Auth');

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RSS user
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
    public function actionCreate()
    {
        $model = new BlogRss();

        $model->loadDefaultValues();
        //$model->user_id = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RSS user
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RSS user
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = BlogRss::STATUS_DELETED;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlogPost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlogRss the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlogRss::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
