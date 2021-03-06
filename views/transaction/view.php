<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaction */

$this->title = $model->id_transaction;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_transaction], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_transaction], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_transaction',
            'id_product',
            'product_name',
            'qty',
            'customer',
            'total_price',
            'shipping',
            'payment',
            'province',
            'city',
            'district',
            'address:ntext',
            'postal_code',
            'created_at',
        ],
    ]) ?>

</div>
