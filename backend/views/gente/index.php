<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\GenteAsset;
use yii\bootstrap\Modal;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GenteSearch */
/* @var $model common\models\Gente */
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
                        return Html::a($span,'#',['title' => Yii::t('app','Test'),'data-id' => $key,'data-toggle' => 'modal','data-target' => '#'.$model->getModalCreateForm()]);
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>

<?php
    Modal::begin([
        'id' => $model->getModalCreateForm(),
        'header' => '<h2>Hello world</h2>',
        'size' => Modal::SIZE_LARGE,
        'clientEvents' => [
            'shown.bs.modal' => new JsExpression('function(e){setForm(e);}'),
            'hidden.bs.modal' => new JsExpression('function(e){resetForm("#'.$model->getCreateForm().'");}')
        ]
    ]);

    echo $this->render('_form', [
        'model' => $model,
        'genders' => $genders
    ]);

    Modal::end();
?>
