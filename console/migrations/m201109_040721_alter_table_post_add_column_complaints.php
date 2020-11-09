<?php

use yii\db\Migration;

/**
 * Class m201109_040721_alter_table_post_add_column_complaints
 */
class m201109_040721_alter_table_post_add_column_complaints extends Migration
{

    public function up()
    {
        $this->addColumn('{{%post}}', 'complaints', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('{{%post}}', 'complaints');
    }

}
