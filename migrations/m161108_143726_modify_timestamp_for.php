<?php

use yii\db\Migration;

class m161108_143726_modify_timestamp_for extends Migration
{
    public function up()
    {
        $this->execute('alter table cm2016.cm_all_adds modify created_at timestamp');
    }

    public function down()
    {
        echo "m161108_143726_modify_timestamp_for cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
