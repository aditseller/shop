<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h3><?= $model->product_name ?></h3>

<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>1.jpg">

    <?php /*

     DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_product',
            'product_name',
            'category',
            'product_condition',
            'weight',
            'weight_unit',
            'stock',
            'price',
            'description:ntext',
            'created_at',
            'created_by',
            'sku',
            'discount',
        ],
    ])
*/
     ?>



</div>
