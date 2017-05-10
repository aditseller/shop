<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'bottom'
    });
});
</script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['siteName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
           ['label' => 'Categories','items'=> [
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],
                ['label'=>'Electronic','url'=>'#'],

           ],

           ],
        ],
    ]);

    echo'<form class="navbar-form navbar-left">
  <div class="input-group">
    <input type="text" size="80" class="form-control" placeholder="Search Product...">
    <div class="input-group-btn">
      <button class="btn btn-warning" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>';
           
      


        if(Yii::$app->user->isGuest) {
           echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
               
                 ' <a tabindex="0" class="btn btn-default" role="button" style="margin-top:8px;" data-html="true" data-toggle="popover"  data-content="   <form id=login-form class=form-horizontal action=/shop/login method=post role=form>
<input type=hidden name=_csrf value='.Yii::$app->request->getCsrfToken().'>
        <div class=form-group field-loginform-email required>

<div class=col-lg-12 align=center><input type=text id=loginform-email class=form-control name=LoginForm[email] autofocus placeholder=Email aria-required=true></div>
<div class=col-lg-1></div><div class=col-lg-12><div class=help-block help-block-error ></div></div>
</div>
        <div class=form-group field-loginform-password required>

<div class=col-lg-12 align=center><input type=password id=loginform-password class=form-control name=LoginForm[password] placeholder=Password aria-required=true></div>
<div class=col-lg-1></div><div class=col-lg-12><div class=help-block help-block-error ></div></div>
</div>
        <div class=form-group field-loginform-rememberme>
<div class=col-lg-6 style=font-size:0.8em><input type=hidden name=LoginForm[rememberMe] value=0><input type=checkbox id=loginform-rememberme name=LoginForm[rememberMe] value=1 checked> <label for=loginform-rememberme>Remember Me</label></div>
<div class=form-group field-login>
<div class=col-lg-6 style=font-size:0.9em;><a href=forgotpassword>Forgot Password</a></div>
</div>
        <hr/>
        <div class=form-group>
            <div class=col-lg-offset-1 col-md-12>
                <button type=submit class=btn btn-block btn-primary name=login-button>Login</button></div>
                </div>
    </form>
">Login</a>'
                 
            ],
        ]); 
        }

        if(!Yii::$app->user->isGuest) {
           echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label'=>Yii::$app->user->identity->fullname,'items'=> [

                        ['label'=>'Settings','url'=>['/usersettings']],
                        ['label' => 'Logout', 'url' => ['/site/logout'],'linkOptions'=>['data-method'=>'post']],


                ],

                ]
                
            ],
        ]); 
        }

        if(Yii::$app->user->isGuest) {
            echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Html::a('Sign Up',['/signup'],['class'=>'btn btn-default btn-default','style'=>'margin-top:8px;']),
            '&nbsp;', 
        ],
    ]);

        }
                
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Html::a('<span class="glyphicon glyphicon-shopping-cart"></span>',['cart'],['class'=>'btn btn-warning','style'=>'margin-top:8px;']),
            '&nbsp; &nbsp;', 
        ],
    ]);


   
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>



<footer class="footer">
    <div class="container">
        <p align="center"> <?= Yii::$app->params['siteName']?> <?= date('Y') ?></p>

    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
