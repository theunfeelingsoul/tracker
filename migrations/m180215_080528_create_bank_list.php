<?php

use yii\db\Migration;

/**
 * Class m180215_080528_create_bank_list
 */
class m180215_080528_create_bank_list extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('bank_list', [
            'id'        => $this->primaryKey(),
            'bank'      => $this->string(),
            'int_rate'  => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('bank_list');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_080528_create_bank_list cannot be reverted.\n";

        return false;
    }
    */
}
