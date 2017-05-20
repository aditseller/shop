<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-md-12" align="center">
<div class="col-md-4"></div>
<div class="col-md-4">
    <h3><?= Html::encode($this->title) ?></h3>

    <hr/>

    

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-1\"></div>\n<div class=\"col-lg-10\" align=\"center\">{input}</div>\n<div class=\"col-lg-1\"></div><div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true,'placeholder'=>'Email'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Password'])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-4\">{input} {label}</div>\n<div class=\"col-lg-offset-1 col-lg-6\"><a href=\"forgotpassword\">Forgot Password</a>",
        ]) ?>

        <div class="form-group col-md-12">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-lg btn-primary', 'name' => 'login-button']) ?>
                <p></p>
                  <div>or</div>
                  <p></p>

    <?= Html::a('Sign Up',['/signup'],['class'=>'btn btn-block btn-lg btn-info']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>



   </div>
   <div class="col-md-4"></div>
</div>

