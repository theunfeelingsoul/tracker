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
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";

            // if (empty($_POST['supplier'])) {
            //     echo "dcdc";
            // }
            // exit();

         
            // get the post data
            $from = trim($_POST['from_date']);
            $to   = trim($_POST['to_date']);

            // create the query with the post data
            $model = Loandetails::find()->where(['between','start_date', $from, $to ])->all();

             $query = Loandetails::find();
            $query->where(['between','start_date', $from, $to ]);

            if (!empty($_POST['bank'])) {
                $query->andWhere(['bank' => $_POST['bank']]);
            }

            if (!empty($_POST['supplier'])) {
                $query->andWhere(['supplier' => $_POST['supplier']]);
            }

            if (!empty($_POST['loan'])) {
                // echo trim($_POST['loan']);
                // exit();
                $query->andWhere(['paid_status' => trim($_POST['loan'])]);
            }

            // var_dump($query->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql);

            // echo "<pre>";
            // print_r($query);
            // echo "</pre>";
            // exit();

            // Data provider for the GridView
            $dataProvider = new ActiveDataProvider([
                // 'query' => Loandetails::find()
                //             ->where(['between','start_date', $from, $to ])
                //             ->where([ 'bank' => $_POST['bank'] ])
                //             ->where([ 'supplier' => $_POST['supplier'] ])
                //             ->where([ 'paid_status' => $_POST['loan'] ]),

                

                'query' =>$query
            ]);

           

            // return new CActiveDataProvider($this, array(
            //     'criteria' => $criteria,
            // ));

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
