<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fakultas */

$this->title = 'Update Fakultas: ' . $model->id_fakultas;
$this->params['breadcrumbs'][] = ['label' => 'Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fakultas, 'url' => ['view', 'id' => $model->id_fakultas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fakultas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
