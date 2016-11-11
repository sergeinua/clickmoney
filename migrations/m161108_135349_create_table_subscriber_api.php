<?php

use yii\db\Migration;

class m161108_135349_create_table_subscriber_api extends Migration
{
    public function up()
    {
        $this->createTable('subscriber_api', [
            'id' => $this->primaryKey(),
            'subscriber_id' => $this->integer()->notNull(),
            'api_id' => $this->integer()->notNull(),
            'added_at' => $this->integer()->notNull(),
            'status' => $this->integer(1)
        ]);
    }

    public function down()
    {
        echo "m161108_135349_create_table_subscriber_api cannot be reverted.\n";

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
