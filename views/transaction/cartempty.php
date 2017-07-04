<?php

use yii\helpers\Html;
 ?>
<center><img src="<?= Yii::$app->request->baseUrl; ?>/public/images/cartempty.png" ></center>
<center>
  <?= Html::a('Continue Shopping',Yii::$app->request->baseUrl,['class'=>'btn btn-default']) ?>
</center>
