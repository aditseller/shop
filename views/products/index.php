<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_product',
            'product_name',
            'category',
            'product_condition',
            'weight',
            // 'weight_unit',
            // 'stock',
            // 'price',
            // 'description:ntext',
            // 'created_at',
            // 'created_by',
            // 'sku',
            // 'discount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
