<?php

use yii\db\Schema;
use yii\db\Migration;

class m150505_012727_create_gente extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gente}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'gender' => Schema::TYPE_BOOLEAN . ' NOT NULL',
            'UNIQUE KEY `name` (`name`)',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%gente}}');
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
