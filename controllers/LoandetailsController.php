<?php

namespace app\controllers;

use Yii;
use app\models\Loandetails;
use app\models\Banklist;
use app\models\LoandetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoandetailsController implements the CRUD actions for Loandetails model.
 */
class LoandetailsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Loandetails models.
     * @return mixed
     */
    public function actionIndex($maturity=false)
    {
        $searchModel = new LoandetailsSearch();
        if ($maturity) {
            # code...
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$maturity);
        }else{
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loandetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Calculates Interest
     * 
     * @return mixed
     */
    public function calcInterest($A,$B,$C,$D){
        // calculate interest
        /*
            Amount      - A
            Interest rate    - B
            Temrm       - C
            Max Term    - D
            Total       - E

            A X B X ( (D-C)/360 ) = E

            $A = $amount;
            $B = $int_rate/100;
            $C = $model->lc_terms;
            $D = $model->max_term;
        **/
        // interest to be paid
        $E = $A * $B * round((($D-$C)/360),2);

        return $E;
    }

    /**
     * Creates a new Loandetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loandetails();

        // cal the interst to be paid
        // cal the amount to be paid

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {

        if (\Yii::$app->user->can('createPost')) {
    // create post
            if ($model->load(Yii::$app->request->post())) {
                
                $modelBank  = new Banklist();
                $bank_data  = $modelBank->findOne($model->bank);

                // Get the interest rate
                $int_rate   = $model->int_rate = $bank_data['int_rate'];

                $amount     = $model->amount;
                $start_date = $model->start_date;

                // calculate interest
                $A = $amount;
                $B = $int_rate/100; 
                $C = $model->lc_terms;
                $D = $model->max_term;
                // interest to be paid
                $E=$this->calcInterest($A,$B,$C,$D);
                // amount to be paid after interest
                $payment = $E +  $amount;


                $model->end_date = date('Y-m-d', strtotime("+".$model->lc_terms." days"));
                $model->payment = $payment;
                $model->int_to_be_paid = $E;
                

                
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    echo "Error";
                    exit();
                }

                // $int_to_be_paid = 
            }
        } // end permission

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Loandetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {

            $modelBank      = new Banklist();
            $bank_data    = $modelBank->findOne($model->bank);
            $int_rate   = $model->int_rate = $bank_data['int_rate'];
            
            $amount     = $model->amount;
            $start_date = $model->start_date;

            $int_to_be_paid = $int_rate /100 * $amount;
            $payment = $int_to_be_paid +  $amount;

            $model->end_date = date('Y-m-d', strtotime("+".$model->lc_terms." days"));
            $model->payment = $payment;
            $model->int_to_be_paid = $int_to_be_paid;

            if ($model->save(false)) {
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                echo "error";
                exit();
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Loandetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loandetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Loandetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Loandetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
