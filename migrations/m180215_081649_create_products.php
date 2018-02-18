<?php

use yii\db\Migration;

/**
 * Class m180215_081649_create_products
 */
class m180215_081649_create_products extends Migration
{
    /**
     * @inheritdoc
     */
   public function safeUp()
    {
        $this->createTable('products', [
            'id'        => $this->primaryKey(),
            'product'   => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180215_081649_create_products cannot be reverted.\n";

        return false;
    }
    */
}
