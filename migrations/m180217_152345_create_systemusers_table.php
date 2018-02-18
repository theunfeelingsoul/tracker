<?php

use yii\db\Migration;

/**
 * Handles the creation of table `systemusers`.
 */
class m180217_152345_create_systemusers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('systemusers', [
            'id' => $this->primaryKey(),
            'full_name'      => $this->string(),
            'username'      => $this->string(),
            'password'      => $this->string(),
            'auth_key'      => $this->string(),
            'email'      => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('systemusers');
    }
}
