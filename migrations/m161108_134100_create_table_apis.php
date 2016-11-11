<?php

use yii\db\Migration;

class m161108_134100_create_table_apis extends Migration
{
    public function up()
    {
        $this->createTable('apis', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()
        ]);

        $this->execute('
            insert into `apis` (`id`, `name`) VALUES ("1", "aweber");
            insert into `apis` (`id`, `name`) VALUES ("2", "ymlp");
            insert into `apis` (`id`, `name`) VALUES ("3", "getresponse")
        ');
    }

    public function down()
    {
        echo "m161108_134100_create_table_apis cannot be reverted.\n";

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
