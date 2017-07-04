<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteName'];


?>
<div class="site-index">

    <div >
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="https://www.jakartanotebook.com/images/banners/new-arrival-skmei.jpg" alt="Chania">
      <div class="carousel-caption">
      </div>
    </div>

    <div class="item">
      <img src="https://www.jakartanotebook.com/images/banners/tiap-hari-murah-sabtu.jpg" alt="Chicago">
      <div class="carousel-caption">
      </div>
    </div>

    <div class="item">
      <img src="https://www.jakartanotebook.com/images/banners/Sandisk-Cruzer-Glide-USB-Flashdisk1.jpg" alt="New York">
      <div class="carousel-caption">
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>

<!--Index Content--->
    <div class="body-content">

        <div class="row">
<?php

$productWP = app\models\Products::find()->orderBy(['created_at'=>SORT_DESC])->all();

if(!empty($productWP)) {
    foreach ($productWP as $row) {

      // final price
      $ratediscount = $row->price * $row->discount / 100;
      $finalprice = $row->price - $ratediscount;


 ?>
            <p>
              <a href="<?= Yii::$app->request->baseUrl; ?>/products/<?= $row->product_name ?>">
                  <div class="col-lg-3" align="center">
                  <div class="thumbnail">
                  <p style="height:40px"><?= $row->product_name ?></p>
                    <p><img width="150px" src="<?= Yii::$app->params['domainImg']?>/public/uploads/product/thumb-<?= sha1($row->id_product)?>1.jpg"></p>
                    <h4>Rp <?= number_format($finalprice,"0",",",".") ?></h4>


                  </div>
                </div>

            </a>
            </p>

            <?php
          }
          }
          ?>

        </div>

    </div>
</div>
