<?php

use yii\db\Migration;

/**
 * Class m180215_073208_create_loan_details
 */
class m180215_073208_create_loan_details extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('loan_details', [
            'id'            => $this->primaryKey(),
            'loan_ref'      => $this->string(),
            'supplier'      => $this->string(),
            'product'       => $this->string(),
            'bank'          => $this->string(),
            'lc_terms'      => $this->string(),
            'pif_terms'     => $this->string(),
            'bl_date'       => $this->string(),
            'start_date'    => $this->string(),
            'end_date'      => $this->string(),
            'currency'      => $this->string(),
            'amount'        => $this->string(),
            'int_rate'      => $this->string(),
            'interest_rate' => $this->string(),
            'payment'       => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('loan_details');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_073208_create_loan_details cannot be reverted.\n";

        return false;
    }
    */
}
