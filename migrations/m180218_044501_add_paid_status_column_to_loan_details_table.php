<?php

use yii\db\Migration;

/**
 * Handles adding paid_status to table `loan_details`.
 */
class m180218_044501_add_paid_status_column_to_loan_details_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
         $this->addColumn('loan_details', 'paid_status','string');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
         $this->dropColumn ( 'loan_details', 'paid_status' );
    }
}
