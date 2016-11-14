<?php

use yii\db\Migration;

class m161114_085029_update_table_trans extends Migration
{
    public function up()
    {
        $this->execute('alter table trans add id int primary key auto_increment;
        alter table trans drop column aff_if;
        alter table trans drop column trans;
        alter table trans add column aff_id varchar(255);
        alter table trans add column aff varchar(255)');
    }

    public function down()
    {
        echo "m161114_085029_update_table_trans cannot be reverted.\n";

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
