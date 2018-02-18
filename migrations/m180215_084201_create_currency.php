<?php

use yii\db\Migration;

/**
 * Class m180215_084201_create_currency
 */
class m180215_084201_create_currency extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id'        => $this->primaryKey(),
            'cur'   => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_084201_create_currency cannot be reverted.\n";

        return false;
    }
    */
}
