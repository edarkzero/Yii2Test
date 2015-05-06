<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\GenteAsset;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GenteSearch */
/* @var $genders array */
/* @var $dataProvider yii\data\ActiveDataProvider */

GenteAsset::register($this);
$this->title = Yii::t('app', 'Gentes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Gente'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid-view-gente']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'gender',
                'value' => function ($model) {
                    return $model->getGenderData();
                },
                'filter' => $genders
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {test}',
                'buttons' => [
                    'view',
                    'update',
                    'delete',
                    'test' => function ($url, $model, $key) {
                        $span = Html::tag('span','',['class' => 'glyphicon glyphicon-asterisk']);
                        return Html::a($span,'#',['title' => Yii::t('app','Test'),'data-id' => $key]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
