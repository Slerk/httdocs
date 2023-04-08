<!DOCTYPE html>
<html lang="ru">
<head>

	<?
  require_once 'mysql.php';

  $sql ='SELECT * FROM `articles` WHERE `id`=:id';
  $id =$_GET['id'];
  $query = $pdo->prepare($sql);
  $query->execute(['id' =>$id]);

  $article = $query->fetch(PDO::FETCH_OBJ);
	$website_title = 'PHP Блог';
	require 'blocks/head.php';
	 ?>
</head>
<body>
	<? require 'blocks/header.php';  ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-5">
      <div class="jumbotron">
        <h1><?=$article->title?></h1>
        <p><b>Автор статьи:</b> <mark><?=$article->avtor?></mark></p>
        <?
        $date = date('d ',$article->data);
        $arr = ["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря",];
        $date .= $arr[date('n',$article->data)-1];
        $date .= date('H:i',$article->data);
        ?>
        <p><b>Время публикации:</b> <u><?=$date?></u></p>
        <p>
          <?=$article->intro?>
          <br><br>
          <?=$article->text?>
        </p>
      </div>
   <!-- комментарии -->
<h3 class="mt-5">Комментарии</h3>
<!-- обработка на этой же странице -->
<form action="/news.php?id=<?=$id?>" method='post'>
  <label for="username">Ваше имя</label>
  <!-- дополнительно если пользователь зарегистрирован и мог оставлять коммментарии
  от своего логина,пропишем это в команде куки value="$_COOKIE['log']?>" -->
<input type="text" name="username" value="<?=$_COOKIE['log']?>" id = "username" class="form-control">

<label for="message">Сообщение</label>
<textarea name="message"id = "message" class="form-control"></textarea>
<input type="submit" name="Добавить комментарий" id = "mes_bot" class="btn btn-success mt-3">
</form>
<?

if(isset($_POST['username']) && isset($_POST['message'])){

     $username = trim(filter_var($_POST['username'],FILTER_SANITIZE_STRING));
     $message = trim(filter_var($_POST['message'],FILTER_SANITIZE_STRING));

     $sql = 'INSERT INTO comment(name,mess,art) VALUES(?,?,?)';
     $query = $pdo->prepare($sql);
     $query->execute([$username,$message,$id]);
   }
   //вывод комментариев
   $sql = 'SELECT * FROM `comment` WHERE `art` = :id ORDER BY `id`DESC';
  
   $query = $pdo->prepare($sql);
   $query->execute(['id' =>$id]);

   $comments = $query->fetchAll(PDO::FETCH_OBJ);

   foreach ($comments as $key) {
   echo "<div class='alert alert-info mb-2'>
   <h4>$key->name</h4>
   <p>$key->mess</p>
   </div>";
 }
?>
</div>

	<? require 'blocks/aside.php';  ?>
</div>
</main>




<? require 'blocks/footer.php';  ?>
</body>
</html>
