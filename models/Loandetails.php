<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loan_details".
 *
 * @property int $id
 * @property string $loan_ref
 * @property string $supplier
 * @property string $product
 * @property string $bank
 * @property string $lc_terms
 * @property string $pif_terms
 * @property string $bl_date
 * @property string $start_date
 * @property string $end_date
 * @property string $currency
 * @property string $amount
 * @property string $int_rate
 * @property string $int_to_be_paid
 * @property string $payment
 * @property string $paid_status
 */
class Loandetails extends \yii\db\ActiveRecord
{
    public $max_term = 180;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loan_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loan_ref', 'supplier', 'product', 'bank', 'lc_terms', 'pif_terms', 'bl_date', 'start_date', 'end_date', 'currency', 'amount', 'int_rate', 'int_to_be_paid', 'payment','paid_status'], 'string', 'max' => 255],
            [['lc_terms','start_date','amount','int_rate'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'ID',
            'loan_ref'      => 'Refrence No.',
            'supplier'      => 'Supplier',
            'product'       => 'Product',
            'bank'          => 'Bank',
            'lc_terms'      => 'LC',
            'pif_terms'     => 'PIF',
            'bl_date'       => 'BL Date',
            'start_date'    => 'Start Date',
            'end_date'      => 'End Date',
            'currency'      => 'Currency',
            'amount'        => 'Amount',
            'int_rate'      => '% Rate',
            'int_to_be_paid' => 'Interest',
            'payment'       => 'Payment',
            'paid_status'       => 'Paid Status',
        ];
    }

    //  public function getProducts()
    // {
    //     return $this->hasOne(Products::className(), ['products' => 'id']);
    // }
}
