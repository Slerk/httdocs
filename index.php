<!DOCTYPE html>
<html >
<head lang="ru">

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
			<?
require_once 'mysql.php';

$sql = 'SELECT * FROM `articles` ORDER BY `data` DESC';
$query = $pdo->query($sql);
while ($row = $query->fetch(PDO::FETCH_OBJ)){
	echo "<h2>$row->title</h2>
	<p>$row->title</p>
	<p><b>Автор статьи:</b><mark>$row->avtor</mark></p>
	<a href='/news.php?id=$row->id' title='$row->title'>
	<button class='btn btn-warning mb-50px'>Прочитать больше</button>
	</a>";
	}


			?>

</div>





	<? require 'blocks/aside.php';  ?>
</div>
</main>




<? require 'blocks/footer.php';  ?>
</body>
</html>
