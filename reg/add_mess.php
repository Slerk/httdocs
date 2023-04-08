<!-- НЕ УДАЛЯТЬ
<div class="allMessages">

  // require_once '../mysql.php';
  //
  // $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
  // $query = $pdo->prepare($sql);
  // $query->execute();
  // $messages = $query->fetchAll(PDO::FETCH_ASSOC);
  //
  //
  //
  //
  // foreach($messages as $el)
  //   echo '<div class="alert alert-info">'.$el['soob'].'</div>';



</div> -->
<!-- <div class="allMessages">

    // Выводим все записи из БД и помещаем каждую из них в качестве блока
    // function fer () {
    // require_once 'mysql.php';
    //
    // $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
    // $query = $pdo->prepare($sql);
    // $query->execute();
    // $messages = $query->fetchAll(PDO::FETCH_ASSOC);
    //
    // // Если сообщений ноль, то выводим сообщение что записей еще нет
    // if(count($messages) == 0)
    //   echo '<div class="alert alert-warning">Пока сообщений еще нет</div>';
    // else {
    //   foreach($messages as $el)
    //     echo '<div class="alert alert-info">'.$el['soob'].'</div>';
    }


</div> -->
<?php
  require_once '../mysql.php';

  $sql = 'SELECT * FROM `chat` ORDER BY `id` DESC';
  $query = $pdo->prepare($sql);
  $query->execute();
  $messages = $query->fetchAll(PDO::FETCH_ASSOC);



$str = '';
  foreach($messages as $el)
    $str .= '<div class="alert alert-info">'.$el['soob'].'</div>';

echo $str;

?>
