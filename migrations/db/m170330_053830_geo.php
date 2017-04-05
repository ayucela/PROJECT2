<?php

use yii\db\Migration;

class m170330_053830_geo extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%countries}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(3),
            'name_en' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%destinations}}', [
            'id' => $this->primaryKey(),
            'country_id'=>$this->integer(),
            'country_code' => $this->string(3),
            'code' => $this->string(4),
            'name_en' => $this->string()
        ], $tableOptions);

        $this->createTable('{{%zones}}', [
            'id' => $this->primaryKey(),
            'destination_id'=>$this->integer(),
            'destination_code' => $this->string(4),
            'code' => $this->integer(),
            'name_en' => $this->string(),

        ], $tableOptions);



        $this->createIndex('idx_country_destination', '{{%destinations}}', 'country_id');
        $this->addForeignKey('fk_country_destination', '{{%destinations}}', 'country_id', '{{%countries}}', 'id', 'cascade', 'cascade');

        $this->createIndex('idx_destination_zone', '{{%zones}}', 'destination_id');
        $this->addForeignKey('fk_destination_zone', '{{%zones}}', 'destination_id', '{{%destinations}}', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('fk_destination_zone', '{{%zones}}');
        $this->dropIndex('idx_destination_zone', '{{%zones}}');
        $this->dropForeignKey('fk_country_destination', '{{%destinations}}');
        $this->dropIndex('idx_destination_zone', '{{%destinations}}');
        $this->dropTable('{{%destinations}}');
        $this->dropTable('{{%countries}}');
    }
}
