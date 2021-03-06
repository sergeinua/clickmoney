<?php

use yii\db\Migration;

class m161003_071859_create_table_cm_all_adds extends Migration
{
    public function up()
    {
        $this->createTable('cm_all_adds', [
            'id' => $this->primaryKey(),
            'info_user' => $this->string(255)->notNull(),
            'page_type' => $this->string(10)->notNull(),
            'ip' => $this->string(255)->notNull(),
            'created_at' => $this->string(255)
        ]);
    }

    public function down()
    {
        echo "m161003_071859_create_table_cm_all_adds cannot be reverted.\n";

        return false;
    }
}
