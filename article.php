
<?
if ($_COOKIE['log'] == ''){
  header('Location : /reg.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <?
  $website_title = 'Добавление статьи';
  require 'blocks/head.php';
  ?>

</head>
<body>
	<? require 'blocks/header.php';  ?>


<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-5">
      <h4>Добавление статьи</h4>
      <!-- "reg/registr.php -->
      <form id="myForm"  action="" method="post">
      <label for="username">Заголовок статьи</label>
      <input type="text" name="title" id="title" class="form-control">

      <label for="email">Интро статьи</label>
      <textarea name="intro" id="intro"class="form-control" ></textarea>

      <label for="email">Текст статьи</label>
      <textarea name="text" id="text"class="form-control" ></textarea>

      <div class="alert alert-danger mt-2" id="block"></div>
      <button id="send_b" type="button" class="btn btn-success mt-5">
        Добавить
      </button>
      </form>
</div>

	<? require 'blocks/aside.php';  ?>
</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// передаем данные через аякс по ид форм

$('#send_b').click(function () {
var title = $ ('#title').val();
var intro = $ ('#intro').val();
var text = $ ('#text').val();
var pass = $ ('#pass').val();



$.ajax({

  url:'reg/add_artic.php',
  type : 'POST',
  cahe : false ,
  data : {'title' : title,'intro' : intro,'text' : text},
  dataType : 'html',



success: function (data) {
 if (data=='Готово'){
 $('#send_b').text('Все готово');
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
