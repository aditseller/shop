<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => $model->category, 'url' => ['categories/'.$model->category]];
$this->params['breadcrumbs'][] = $this->title;

//final price
$ratediscount = $model->price * $model->discount / 100;
$finalprice = $model->price - $ratediscount;
?>
<div class="products-view col-md-12">

    <h3><?= $model->product_name ?></h3>
<div class="col-md-4 thumbnail">
  <div class="fotorama" data-nav="thumbs">
<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>1.jpg">
<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>2.jpg">
<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>3.jpg">
<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>4.jpg">
<img src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/<?= sha1($model->id_product) ?>5.jpg">
</div>

</div>

<div class="col-md-6">
<table class="table table-bordered">

  <tr><td><b>Condition</b></td><td> <?= $model->product_condition ?></td></tr>
  <tr><td><b>Weight</b></td> <td><?= $model->weight ?> <?= $model->weight_unit ?></td></tr>
  <tr><td><b>Stock</b></td><td> <?= $model->stock ?></td></tr>


</table>
<div><button data-toggle="collapse" data-target="#description" class="btn btn-info btn-block">Show or Hide Description</button></div>
<div align="justify" id="description" class="collapse"><hr/>
  <?= nl2br($model->description) ?>
</div>

</div>

<div class="col-md-2">

<!--price-->
  <?php

  if (!empty($model->discount)) {
    ?>
    <h5 align="center" style="font-weight:bold; color:grey;">Normal Price</h5>
    <h5 align="center" style="text-decoration:line-through; color:grey;">Rp <?= number_format($model->price,"0",",","."); ?></h5>
<hr/>

    <h3 align="center" style="color:red"> Rp <?= number_format($finalprice,"0",",",".") ?></h3>
    <i><center>(Discount <?= $model->discount ?> %)</center></i>
    <?php
  } else {
     ?>

     <h3 align="center" style="color:red"> Rp <?= number_format($finalprice,"0",",",".") ?></h3>

<?php } ?>
<!--end price-->
<hr/>
<form action="<?=Yii::$app->request->baseUrl; ?>/transaction/unpaid" method="post">
<input type="hidden" name="id_product" value="<?= $model->id_product ?>">
<input type="hidden" name="product_name" value="<?= $model->product_name ?>">
<input type="hidden" name="total_price" value="<?= $finalprice ?>">
<input type="submit" name="submit" value="Add to Cart" class="btn buy">
</form>
</div>


</div>

<div class="col-md-12">
  <hr/>

</div>
