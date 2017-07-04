<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Cart';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="cart-index col-md-8">


<table class="table table-striped ">
    <div class="panel panel-warning"><div class="panel-heading"><h4><b><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</b></h4></div></div>


      <?php foreach ($model as $row) { ?>
  <tr align="center">
    <?php
    $countQty = app\models\Unpaid::find()->andWhere(['id_product'=>$row->id_product])->andWhere(['customer'=>Yii::$app->user->identity->fullname])->count('*');
     ?>
<td><img width="70px" src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/product/thumb-<?= sha1($row->id_product)?>1.jpg"></td>
<td class="col-md-5"><?= Html::a($row->product_name,['/products/'.$row->product_name]) ; ?> </td>
<td class="col-md-3"><input type="hidden" ng-model="<?= $row->total_price; ?>" ng-init="<?= $row->total_price; ?>='<?= $row->total_price; ?>'" value="<?= $row->total_price; ?>" class="form-control"  id="total_price">
   Rp <?= number_format($row->total_price,"0",",",",") ?></td>
<td class="col-md-5" align="center">



<div class="col-md-4">
  <?= Html::a('-', ['reducingstock', 'id' => $row->id_transaction], [
        'class' => 'btn btn-default',
        'data' => [

            'method' => 'post',
        ],
    ]) ?>
  </div>

<div class="col-md-4" align="center" style="margin-top:5px;">  <?= $countQty; ?> </div>

  <div class="col-md-4"><form action="<?=Yii::$app->request->baseUrl; ?>/transaction/unpaid" method="post">
  <input type="hidden" name="id_product" value="<?= $row->id_product ?>">
  <input type="hidden" name="product_name" value="<?= $row->product_name ?>">
  <input type="hidden" name="total_price" value="<?= $row->total_price ?>">
  <input type="submit" name="submit" value="+" class="btn btn-default">
</form>
<input type="hidden" ng-model ="<?= $countQty; ?>"  class="form-control" id="qty" value="<?= $countQty; ?>"/>
</div>
</td>


  </tr>

  <?php } ?>
</table>

</div>

<div class="col-md-4">


    <div class="panel panel-primary"><div class="panel-heading"><b>Shipping</b></div></div>

    <form class="form cf" action="checkout" method="post">
      <section class="plan cf">
  <?php foreach ($modelCOD as $rowCOD) { ?>


      <input type="radio" ng-model="cod" name="shipping" id="<?= $rowCOD->shipping; ?>" value="<?= $rowCOD->shipping; ?>" required>
      <label class="" for="<?= $rowCOD->shipping; ?>">
        <img width="60px" src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/shipping/<?= $rowCOD->id_shipping; ?>.png">
        <p><?= $rowCOD->shipping; ?></p>
      </label>
  <?php } ?>
  </section>

      <section class="plan cf">
  <?php foreach ($modelShipping as $rowShipping) { ?>


      <input type="radio" name="shipping" ng-model="shipping" id="<?= $rowShipping->shipping; ?>" value="<?= $rowShipping->shipping; ?>" required>
      <label class="" for="<?= $rowShipping->shipping; ?>">
        <img width="60px" src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/shipping/<?= $rowShipping->id_shipping; ?>.png">
        <p><?= $rowShipping->shipping; ?></p>
      </label>
  <?php } ?>
</section>


  <div class="panel panel-success"><div class="panel-heading"><b>Payment</b></div></div>

  <div id="payment" ng-show="cod" ng-hide="shipping">
  <section class="plan cf">
  <?php foreach ($modelCODPay as $rowCODPay) { ?>
    <input  type="radio" name="payment" id="<?= $rowCODPay->payment; ?>" value="<?= $rowCODPay->payment; ?>" required>
    <label class="" for="<?= $rowCODPay->payment; ?>">
      <img width="50px" src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/payment/<?= $rowCODPay->id_payment; ?>.jpg">
      <p><?= $rowCODPay->payment; ?></p>
    </label>


  <?php } ?>
  </section>
  </div>

  <div id="payment" ng-show="shipping" ng-hide="cod" >
<section class="plan cf">
  <?php foreach ($modelPayment as $rowPayment) { ?>
    <input  type="radio" name="payment" id="<?= $rowPayment->payment; ?>" value="<?= $rowPayment->payment; ?>" required>
    <label class="" for="<?= $rowPayment->payment; ?>">
      <img width="50px" src="<?= Yii::$app->params['domainImg'] ?>/public/uploads/payment/<?= $rowPayment->id_payment; ?>.jpg">
      <p><?= $rowPayment->payment; ?></p>
    </label>


  <?php } ?>
</section>
</div>


  <table class="table table-bordered table-striped">
<tr>
<td class="col-md-5" align="center"><h4><b>Grand Total</b></h4></td>
<?php
$total = 0 ;
foreach($modelTotal as $rowTotal) {
    $total += $rowTotal->total_price;
 } ?>
<td align="center" style="color:red;"><h4><b>Rp <?= number_format($total,"0",",",",") ?>  </b></h4></td>
</tr>
</table>
</div>
<div class="col-md-12" align="center">
  <hr/>
  <div class="col-md-6" align="left">
    <?= Html::a('<span class="glyphicon glyphicon-triangle-left"></span> Continue Shopping',Yii::$app->request->baseUrl,['class'=>'btn btn-lg btn-default']) ?>
  </div>
    <div class="col-md-6" align="right">
      <input type="submit"  name="submit" value="Checkout" onclick="return radioValidation();" class="btn btn-lg btn-danger">
  </form>
</div>
</div>

<script>
    function radioValidation(){

        var shipping = document.getElementsByName('shipping');
        var shippingValue = false;
        var payment = document.getElementsByName('payment');
        var paymentValue = false;

        for(var i=0; i<shipping.length;i++){
            if(shipping[i].checked == true){
                shippingValue = true;
            }
        }

        for(var i=0; i<payment.length;i++){
            if(payment[i].checked == true){
                paymentValue = true;
            }
        }

        if(!shippingValue){
            alert("Please Choose Shipping");
            return false;
        }

        if(!paymentValue){
            alert("Please Choose Payment");
            return false;
        }

    }
</script>






<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
