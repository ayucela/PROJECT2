<?php

use yii\db\Migration;

class m170310_163616_cache extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%cache}}', [
            'id' => $this->primaryKey(),
            'expire' => $this->integer(11)->notNull(),
            'data' => 'LONGBLOB NOT NULL',
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('{{%cache}}');
    }
}
