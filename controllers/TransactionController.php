<?php

namespace app\controllers;

use Yii;
use app\models\Transaction;
use app\models\Unpaid;
use app\models\TransactionSearch;
use app\models\Shipping;
use app\models\Payment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TransactionController implements the CRUD actions for Transaction model.
 */
class TransactionController extends Controller
{
  public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access' => [
              'class' => AccessControl::className(),
              'only' => ['delete','deleteunpaid','unpaid','cart','cartempty'],
              'rules' => [
                  [
                      'actions' => ['delete','deleteunpaid','unpaid','cart','cartempty'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
              ],
          ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Cart Dashboard
    public function actionCart()
    {
      $id_login = Yii::$app->user->identity->fullname;
      $model = Unpaid::find()->where(['customer'=>$id_login])->groupBy('id_product')->all();
      $modelTotal = Unpaid::find()->where(['customer'=>$id_login])->all();

      $modelShipping = Shipping::find()->where(['not like','key', 'cod'])->all();
      $modelCOD = Shipping::find()->where(['like','key', 'cod'])->all();
      $modelPayment = Payment::find()->where(['not like','key', 'cod'])->all();
      $modelCODPay = Payment::find()->where(['like','key', 'cod'])->all();

      if(empty($model)) {
        return $this->redirect(['cartempty']);
      }

      return $this->render('cart', [
          'model' => $model,
          'modelTotal' => $modelTotal,
          'modelShipping' => $modelShipping,
          'modelPayment' => $modelPayment,
          'modelCOD' => $modelCOD,
          'modelCODPay' => $modelCODPay,
      ]);
    }

    //cart empty function
    public function actionCartempty() {

    $id_login = Yii::$app->user->identity->fullname;
    $model = Unpaid::find()->where(['customer'=>$id_login])->groupBy('id_product')->all();

    if(!empty($model)) {
      return $this->redirect(['cart']);
    }

      return $this->render('cartempty');
    }

    //Add To Cart
    public function actionUnpaid() {

      $unpaid = new Unpaid();
        Yii::$app->db->createCommand()->insert('unpaid', [
          'id_product' => Yii::$app->request->post('id_product'),
          'product_name' => Yii::$app->request->post('product_name'),
          'customer' =>Yii::$app->user->identity->fullname,
          'total_price' => Yii::$app->request->post('total_price'),
          ])->execute();

            return $this->redirect(['cart']);


    }

    //Checkout Order
    public function actionCheckout() {


    }

    /**
     * Displays a single Transaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transaction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transaction]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transaction]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    //Delete Unpaid
    public function actionDeleteunpaid($id)
    {
      $modelUnpaid = Unpaid::findOne(['id_transaction'=>$id]);
      Yii::$app->db->createCommand('DELETE FROM unpaid WHERE id_product="'.$modelUnpaid->id_product.'" ')->execute();


        return $this->redirect(['cart']);
    }

    public function actionReducingstock($id)
    {
      if(($reducingUnpaid = Unpaid::findOne(['id_transaction'=>$id])) !== null) {
        $reducingUnpaid->delete();
      }



        return $this->redirect(['cart']);
    }

    /**
     * Finds the Transaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
