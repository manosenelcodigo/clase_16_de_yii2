<?php

use yii\db\Migration;

class m160818_010428_add_foto_persona extends Migration
{
    public function up()
    {
        $this->addColumn('persona', 'foto', 'string');
    }

    public function down()
    {
        $this->dropColumn('persona', 'foto');
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
