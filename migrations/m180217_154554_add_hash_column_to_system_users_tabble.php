<?php

use yii\db\Migration;

/**
 * Class m180217_154554_add_hash_column_to_system_users_tabble
 */
class m180217_154554_add_hash_column_to_system_users_tabble extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('system_users', 'hash','string');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn ( 'system_users', 'hash' );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180217_154554_add_hash_column_to_system_users_tabble cannot be reverted.\n";

        return false;
    }
    */
}
