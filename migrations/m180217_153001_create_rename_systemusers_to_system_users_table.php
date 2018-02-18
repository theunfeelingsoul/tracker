<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rename_systemusers_to_system_users`.
 */
class m180217_153001_create_rename_systemusers_to_system_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->renameTable('systemusers', 'system_users');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->renameTable( 'system_users','systemusers');
    }
}
