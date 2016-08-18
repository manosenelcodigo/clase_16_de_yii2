<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\Persona;
use app\models\Profesion;
use \yii\db\Expression;
use Yii;

class SeederController extends Controller {

    public function actionUsuarios() {

        for ($i = 0; $i < 20; $i++) {
            $faker = \Faker\Factory::create("es_ES");
            $user = new User;
            $user->username = $faker->firstNameMale;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password_hash = Yii::$app->security->generatePasswordHash('admin');
            $user->email = $faker->freeEmail;
            $user->status = 10;
            $user->created_at = 1;
            $user->updated_at = 1;

            if ($user->insert()) {
                echo "registro insertado";
            } else {
                echo "error al insertar";
            }
        }
    }

    private function getUser() {
        if (Yii::$app->getDb()->driverName === 'mysql') {
            $user = User::find()->orderBy('rand()')->one();
        } elseif (Yii::$app->getDb()->driverName === 'pgsql') {
            $user = User::find()->orderBy('random()')->one();
        }

        return $user;
    }
    
    private function getProfesion() {
        if (Yii::$app->getDb()->driverName === 'mysql') {
            $profesion = Profesion::find()->orderBy('rand()')->one();
        } elseif (Yii::$app->getDb()->driverName === 'pgsql') {
            $profesion = Profesion::find()->orderBy('random()')->one();
        }

        return $profesion;
    }

    public function actionPersona() {
        for ($i = 0; $i < 20; $i++) {
            $faker = \Faker\Factory::create("es_ES");
            $user = $this->getUser();
            $profesion = $this->getProfesion();
            
            $persona = new Persona;
            $persona->nombre        = $faker->name;
            $persona->biografia     = $faker->text(200);
            $persona->fecha_nac     = $faker->date('Y-m-d', 'now');
            $persona->profesion_id  = $profesion->id;
            $persona->created_by    = $user->id;
            $persona->created_at    = new Expression('NOW()');
            $persona->updated_by    = $user->id;
            $persona->updated_at    = new Expression('NOW()');
            if ($persona->insert()) {
                echo "registro insertado<br>";
            } else {
                echo "error al insertar<br>";
            }
        }
    }

}
