<?php

use yii\db\Migration;

/**
 * Class m180217_174733_init_rbac
 */
class m180217_174733_init_rbac extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $auth = Yii::$app->authManager;

        // $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('author');
        // $auth->assign($authorRole, $user->getId());


        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($authorRole, 4);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180217_174733_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180217_174733_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
