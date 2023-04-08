<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title = 'Авторизация на сайте';
  require 'blocks/head.php';
  ?>

</head>
<body>
	<? require 'blocks/header.php';  ?>


<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-5">
      <?
      if(!isset($_COOKIE['log'])):
        ?>
      <h4>Форма авторизации</h4>
      <!-- "reg/registr.php -->
      <form id="myForm"  action="" method="post">

      <label for="login">Логин</label>
      <input type="text" name="login" id="login" class="form-control">

      <label for="pass">Пароль</label>
      <input type="password" name="pass" id="pass" class="form-control">

      <div class="alert alert-danger mt-2" id="block"></div>
      <button id="auth_user" type="button" class="btn btn-success mt-5">
          Войти
      </button>
      </form>
      <?
      else :
      ?>
      <!-- добавим логин для отображения после входа -->
      <h2><?=$_COOKIE['log']?></h2>
      <!-- прописываем кнопку выхода -->
      <button class="btn btn-danger" id="exit">Выйти</button>
      <?
endif;
      ?>
</div>

	<? require 'blocks/aside.php';  ?>
</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// передаем данные через аякс по ид форм
$('#exit').click(function (){
  $.ajax({
    url:'reg/exit.php',
    type: 'POST',
    cahe: false,
    data: {},
    dataType : 'html',
    success: function (data) {
      document.location.reload(true); //после нажатия кнопки,перезагрузим страничку

      }

  });
});


$('#auth_user').click(function () {
var login = $ ('#login').val();
var pass = $ ('#pass').val();

$.ajax({
  url:'reg/autoriz.php',
  type : 'POST',
  cahe : false ,
  data : {'login' : login,'pass' : pass},
  dataType : 'html',

success: function (data) {
 if (data=='Готово'){
 $('#auth_user').text('Все готово');
 $('#block').hide();
 document.location.reload(true);
}
 else{
 $('#block').show();
 $('#block').text(data);
}
}


});
});

</script>
</body>
