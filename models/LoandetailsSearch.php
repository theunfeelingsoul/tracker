<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loandetails;

/**
 * LoandetailsSearch represents the model behind the search form of `app\models\Loandetails`.
 */
class LoandetailsSearch extends Loandetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['loan_ref', 'supplier', 'product', 'bank', 'lc_terms', 'pif_terms', 'bl_date', 'start_date', 'end_date', 'currency', 'amount', 'int_rate', 'int_to_be_paid', 'payment','paid_status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Loandetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'loan_ref', $this->loan_ref])
            ->andFilterWhere(['like', 'supplier', $this->supplier])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'lc_terms', $this->lc_terms])
            ->andFilterWhere(['like', 'pif_terms', $this->pif_terms])
            ->andFilterWhere(['like', 'bl_date', $this->bl_date])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'int_rate', $this->int_rate])
            ->andFilterWhere(['like', 'int_to_be_paid', $this->int_to_be_paid])
            ->andFilterWhere(['like', 'paid_status', $this->paid_status])
            ->andFilterWhere(['like', 'payment', $this->payment]);

        return $dataProvider;
    }
}
