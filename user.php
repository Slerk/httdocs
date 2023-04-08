<!DOCTYPE html>
<html lang="ru">
<head>

	<?
	$website_title = 'PHP Блог';
	require 'blocks/head.php';
	 ?>
</head>
<body>
	<? require 'blocks/header.php';  ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-5">

			<?php
			  require_once 'mysql.php';

			  // Получаем и выводим всех пользователей
			  $sql = 'SELECT * FROM `users` ORDER BY `id` DESC';
			  $query = $pdo->prepare($sql);
			  $query->execute();
			  $users = $query->fetchAll(PDO::FETCH_ASSOC);
			  foreach($users as $el) {
			    // Также указываем кнопку и в качестве id для блока указываем id записи
			    // через этот id мы сможем удалить блок используя jQuery
			    echo '<div class="alert alert-info" ml-4 id="'.$el['id'].'">
			      <b>Имя:</b> '.$el['name'].', <b>логин:</b> '.$el['login'].'
			      <button onclick="deleteUser(\''.$el['id'].'\')" class="btn btn-danger">Удалить</button>
			    </div>';
			  }
			?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			<script>
			// Функция вызывается при нажатии на кнопку удалить
			// она принимает id записи, которую нужно удалить
			function deleteUser(id) {
			  $.ajax({
			    url: 'delete_user.php',
			    type: 'POST',
			    cache: false,
			    data: {'id' : id},
			    dataType: 'html',
			    success: function(data) {

			      // После успешного выполнения происходит удаление блока с записью
			      $('#' + id).remove();

			    }
			  });
			}

			</script>


</div>
</main>




<? require 'blocks/footer.php';  ?>

</body>
</html>

<!-- // require_once 'mysql.php';
// $sql = 'SELECT * FROM `users` ORDER BY `id` DESC';
// $query = $pdo->query($sql);
// while ($row = $query->fetch(PDO::FETCH_OBJ)) {
// echo "<p><b>Имя:</b> $row->name , <b>Логин</b> : $row->login<button id='delus' onclick=return delete($row->id) class= 'btn btn-warning ml-2'>Удалить</button></p>";
//
// }
// // class='btn btn-warning ml-2
// ?> -->
<!-- // </div>
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
// <script> -->
<!-- // // передаем данные через аякс по ид форм
// $('#delus').click(function delete (){
// $.ajax({
// url:'user.php',
// type: 'POST',
// cahe: false,
// data: { },
// dataType : 'html',
// success: function (data) {
//
// document.location.reload(true); //после нажатия кнопки,перезагрузим страничку
//
// }
//
// });
// }); -->
<!-- // </script> -->
