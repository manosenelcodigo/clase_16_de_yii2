<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            [
                'attribute' => 'email',
                'format'    => 'email',
            ],
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            // 'email:email',
            /*
            [
                'attribute' => 'status',
                'format'    => 'raw',
                'value'     => function($searchModel) {
                    if ( $searchModel->status == 0 ) {
                        return "<span class='glyphicon glyphicon-remove'></span>";
                    } else {
                        return "<span class='glyphicon glyphicon-ok'></span>";
                    }
                }
            ],
            */
            [
                'attribute' => 'status',
                'format'    => 'boolean',
            ],
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'  => '{view} {edit} {delete} {estado}',
                'buttons'   => [
                    'estado'    => function($url, $model, $key) {
                        if ($model->status == 0) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-ok"></span>',
                                $url,
                                [
                                    'title' => 'Activar'
                                ]
                            );
                        } else {
                            return Html::a(
                                '<span class="glyphicon glyphicon-remove"></span>',
                                $url,
                                [
                                    'title' => 'Desactivar'
                                ]
                            );
                        }
                    }
                ],
                'urlCreator'    => function ($action, $model, $key, $index) {
                    if ( $action == 'estado' ) {
                        return Url::to(['user/estado', 'id' => $key]);
                    } elseif ( $action == 'view' ) {
                        return Url::to(['user/view', 'id' => $key]);
                    } elseif ( $action == 'delete' ) {
                        return Url::to(['user/delete', 'id' => $key]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
