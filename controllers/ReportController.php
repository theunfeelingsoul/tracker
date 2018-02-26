<?php

namespace app\controllers;
// namespace app\data;
use Yii;
use app\models\Loandetails;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use app\models\Banklist;
use app\models\LoandetailsSearch;


class ReportController extends \yii\web\Controller
{
    public function actionCollections()
    {
        $searchModel = new LoandetailsSearch();
    	if (!empty($_POST)) {
    		// echo("<pre>");
    		// // print_r($_POST);
    		// echo("</pre>");

    		$from = trim($_POST['from_date']);
    		$to = trim($_POST['to_date']);

            // echo "<pre>";
            // // echo var_dump($from);
            // // echo var_dump($to);
            // echo "</pre>";
            $model = new Loandetails();
            // $model = Loandetails::find()->where(['between','start_date', '2018-02-16', '2018-02-28' ])->all();
            $model = Loandetails::find()->where(['between','start_date', $from, $to ])->all();
            // echo $model->createCommand()->getRawSql;
            // echo "<pre>";
            // // echo var_dump($model);
            // echo "</pre>";

            $dataProvider = new ActiveDataProvider([
                'query' => Loandetails::find()->where(['between','start_date', $from, $to ]),
            ]);
             return $this->render('collections', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
            // exit();
    		
    	}else{

        return $this->render('collections');
    	}
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
