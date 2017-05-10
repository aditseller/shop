<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = 'Sign Up for a New User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-4"></div>
<div class="users-create col-md-4">

    <h4 align="center"><?= Html::encode($this->title) ?></h4>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true,'class'=>'form-control input-lg','placeholder'=>'Fullname'])->label(false) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>'form-control input-lg','placeholder'=>'Email'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'class'=>'form-control input-lg','placeholder'=>'Password'])->label(false) ?>

    <?= $form->field($model, 'gender')->radioList(array('male' => 'Male', 'female' => 'Female')); ?>

    <?= $form->field($model, 'accessToken')->hiddenInput(['maxlength' => true,'value'=>Yii::$app->request->getCsrfToken()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Sign Up', ['class' =>'btn btn-block btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="col-md-4"></div>
