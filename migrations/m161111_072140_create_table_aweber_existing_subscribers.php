<?php

use yii\db\Migration;

class m161111_072140_create_table_aweber_existing_subscribers extends Migration
{
    public function up()
    {
        $this->createTable('aweber_existing_subscribers', [
            'id' => $this->primaryKey(),
            'list_id' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'status' => $this->string(50)->notNull(),
            'updated_at' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        echo "m161111_072140_create_table_aweber_api_existing_subscribers cannot be reverted.\n";

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
