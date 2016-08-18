<?php

use yii\db\Migration;

class m160811_003732_seeder extends Migration
{
    public function up()
    {
        $faker = Faker\Factory::create("es_ES");
        
        for ($i = 0; $i < 20; $i++) {
            $this->insert('persona', [
                'nombre'        => $faker->name,
                'biografia'     => $faker->text(150),
                'fecha_nac'     => $faker->date('Y-m-d', 'now'),
                'profesion_id'  => 5,
                'created_by'    => 1,
                'created_at'    => $faker->date('Y-m-d H:i:s', 'now'),
                'updated_by'    => 1,
                'updated_at'    =>$faker->date('Y-m-d H:i:s', 'now'),
            ]);
        }
    }

    public function down()
    {
        echo "m160811_003732_seeder cannot be reverted.\n";

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
