<?php

use yii\db\Migration;

/**
 * Class m180215_081636_create_suppliers
 */
class m180215_081636_create_suppliers extends Migration
{
    /**
     * @inheritdoc
     */
   public function safeUp()
    {
        $this->createTable('suppliers', [
            'id'        => $this->primaryKey(),
            'supplier'      => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('suppliers');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_081636_create_suppliers cannot be reverted.\n";

        return false;
    }
    */
}
