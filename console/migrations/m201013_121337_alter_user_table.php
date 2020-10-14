<?php

use yii\db\Migration;

/**
 * Class m201013_121337_alter_user_table
 */
class m201013_121337_alter_user_table extends Migration
{



    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('{{%user}}', 'about', $this->text());
        $this->addColumn('{{%user}}', 'type', $this->integer());
        $this->addColumn('{{%user}}', 'nickname', $this->string(70));
        $this->addColumn('{{%user}}', 'picture', $this->string());

    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'about');
        $this->dropColumn('{{%user}}', 'type');
        $this->dropColumn('{{%user}}', 'nickname');
        $this->dropColumn('{{%user}}', 'picture');

    }

}
