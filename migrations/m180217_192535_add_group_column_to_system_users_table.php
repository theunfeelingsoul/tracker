<?php

use yii\db\Migration;

/**
 * Handles adding group to table `system_users`.
 */
class m180217_192535_add_group_column_to_system_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('system_users', 'group','string');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn ( 'system_users', 'group' );
    }
}
