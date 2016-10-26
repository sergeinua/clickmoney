$th<?php

use yii\db\Migration;

class m161003_071502_create_table_trans extends Migration
{
    public function up()
    {
        $this->createTable('trans', [
            'trans' => $this->string(256),
            'aff_if' => $this->string(255),
            'actionid' => $this->string(30),
            'datetime' => $this->date(),
            'offer_name' => $this->string(5)
        ]);
    }

    public function down()
    {
        echo "m161003_071502_create_table_trans cannot be reverted.\n";

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
