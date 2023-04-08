<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title = 'Регистрация на сайте';
  require 'blocks/head.php';
  ?>

</head>
<body>
	<? require 'blocks/header.php';  ?>


<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-5">
      <h4>Форма регистрации</h4>
      <!-- "reg/registr.php -->
      <form id="myForm"  action="" method="post">
      <label for="username">Ваше имя</label>
      <input type="text" name="username" id="username" class="form-control">

      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control">

      <label for="login">Логин</label>
      <input type="text" name="login" id="login" class="form-control">

      <label for="pass">Пароль</label>
      <input type="password" name="pass" id="pass" class="form-control">

      <div class="alert alert-danger mt-2" id="block"></div>
      <button id="reg_user" type="button" class="btn btn-success mt-5">
          Зарегистрироваться
      </button>
      </form>
</div>

	<? require 'blocks/aside.php';  ?>
</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// передаем данные через аякс по ид форм

$('#reg_user').click(function () {
var name = $ ('#username').val();
var email = $ ('#email').val();
var login = $ ('#login').val();
var pass = $ ('#pass').val();



$.ajax({

  url:'reg/registr.php',
  type : 'POST',
  cahe : false ,
  data : {'username' : name,'email' : email,'login' : login,'pass' : pass,},
  dataType : 'html',



success: function (data) {
 if (data=='Готово'){
 $('#reg_user').text('Все готово');
 $('#block').hide();
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
