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
     /**
     * Search loan between dates.
     * @return mixed
     */
    public function actionCollections()
    {
        // check if there is data being sent
    	if (!empty($_POST)) {

            $model = new Loandetails();

            // get the post data
            $from = trim($_POST['from_date']);
            $to   = trim($_POST['to_date']);

            // create the query with the post data
            $model = Loandetails::find()->where(['between','start_date', $from, $to ])->all();

            // Data provider for the GridView
            $dataProvider = new ActiveDataProvider([
                'query' => Loandetails::find()->where(['between','start_date', $from, $to ]),
            ]);

            // render
            return $this->render('collections', [
                'dataProvider' => $dataProvider,
            ]);
    		
    	}else{

            return $this->render('collections');
    	}
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
