<!DOCTYPE html>
<html lang ="ru">
<head>
<?php  $website_title = 'Контакты';
   require 'blocks/head.php'; ?>

</head>
<body>

<?php require 'blocks/header.php'; ?>

<main class="container mt-5">
  <div class="row">
  <div class="col-md-8 mb-3">
<!-- пришем ниже форму регистрации -->
<h4>Обратная связь</h4>
<!-- "reg/registr.php -->
<form id="myForm"  action="" method="post">
<label for="username">Ваше имя</label>
<input type="text" name="username" id="username" class="form-control">

<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control">

<label for="mesa">Сообщение</label>
<input  name="mesa" id="mesa" class="form-control">



<div class="alert alert-danger mt-2" id="block"></div>
<button id="contact" type="button" class="btn btn-success mt-5">
  ОТправить письмо
</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// передаем данные через аякс по ид форм
$('#contact').click(function (){
  var name = $('#username').val();
  var email = $('#email').val();
  var mesa = $('#mesa').val();


  $.ajax({
    url:'reg/mail.php',
    type: 'POST',
    cahe: false,
    data: {'username' : name, 'email' : email, 'mesa' : mesa },
    dataType : 'html',

    success: function (data) {
      //document.location.reload(true);
      if(data == 'Готово'){
      $('#contact').text('Все готово');
        $('#block').hide();
        $('#username').val("");
        $('#email').val("");
        $('#mesa').val("");
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

</script>
