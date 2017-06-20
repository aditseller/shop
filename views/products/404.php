<?php

use yii\helpers\Html;

 ?>
<div align="center">
<img width="50%" src="<?= Yii::$app->request->baseUrl ?>/public/images/404.png">
</div>
<hr/>
<div align="center"><?= Html::a('Back to Home',Yii::$app->request->baseUrl,['class'=>'btn btn-info btn-lg'])  ?></div>
