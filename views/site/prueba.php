<?php

/* @var $this yii\web\View */

use app\assets\DashboardAsset;
use yii\bootstrap\Html;
use dominus77\sweetalert2\Alert;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

DashboardAsset::register($this);
$this->title = 'Prueba';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-prueba">
  <h1 id="title" class="animate__animated animate__bounce"><?= Html::encode($this->title) ?></h1>

<p>This is the Prueba page. You may modify the following file to customize its content:</p>

<div class="container-fluid">
  <div class="row">
    <div class="form-inline">

<!-- btn1 -->
<button id="btn1" class="btn btn-outline-dark" onclick="alerttoastr()">Botón toastr onclick</button>

<!-- btn2 -->
<?= Html::beginForm(
        Url::toRoute("site/request"),//action
        "post",//method
        ['class' => '']//options
        );
?>
<!--<?= Html::label("Introduce tu nombre", "nombre") ?>-->
<?= Html::textInput("nombre", "sweetalert2", ["type"=>"hidden","class" => ""]) ?>
<?= Html::submitInput("Botón sweetalert2", ["class" => "btn btn-outline-dark"]) ?>
<?= Html::endForm() ?>

<!-- btn3 -->
<button id="btn3" class="btn btn-outline-dark" onclick="setFlash()">Botón setFlash</button>
    </div>
  </div>
</div><br><br>

<div class="container">
<?php  
Yii::$app->session->setFlash('info', '<div class="alert alert-info"><h6>This is the message</h6></div>');
?>
</div>

<?php 
/*********************
  SweetAlert
**********************/

if($mensaje == true)
echo Alert::widget([
    'options' => [
        'title' => 'jQuery HTML example',
        'html' => new \yii\web\JsExpression("$('<div>').addClass('some-class').text('jQuery is everywhere.')"),
        'animation' => false,
        'customClass' => 'animated bounce', // https://daneden.github.io/animate.css/
    ],
])
?>

<script>
const title = document.getElementById('title'); 
  title.innerHTML = 'Alert (SweetAlert, Toastr y Animate)';

/*********************
  toastr
**********************/
function alerttoastr(){
  //alert();
  setTimeout(function() {toastr.success("Se registro sastifactoriamente", "Registrado", function(){window.location = "index.php";});}, 1000);
}
//alerttoastr();

/*********************
  setFlash
**********************/
function setFlash(){
  //alert();
  const message = document.getElementById('message'); 
  message.innerHTML = '<?= Yii::$app->session->getFlash('info');?>';
}
//setFlash();

/*********************
  toastr
**********************/
/*
setTimeout(function() {toastr.success("Se registro sastifactoriamente", "Registrado", function(){window.location = "index.php";});}, 1000);
*/
</script>

<?php
/*********************
  toastr
**********************/
$var1 = false;
if($var1==true)
echo '<script> setTimeout(function() {toastr.success("Se registro sastifactoriamente", "Registrado", function(){window.location = "index.php";});}, 1000); </script>';
?>

<!--------------------
  setFlash
---------------------->
<!-- setFlash -->
<div id="message"></div>
<!--<div id="message"><?= Yii::$app->session->getFlash('info');?></div>-->
<!-- /.setFlash -->

<div id="demo"></div>
<p><code><?= __FILE__ ?></code></p>
</div>