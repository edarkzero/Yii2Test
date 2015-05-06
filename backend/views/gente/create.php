<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Gente */
/* @var $genders array */

$this->title = Yii::t('app', 'Create Gente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'genders' => $genders
    ]) ?>

</div>
