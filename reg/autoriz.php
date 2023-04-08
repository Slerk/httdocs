<?

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));



$error = '';
if (strlen($login) <=3)
$error = 'Введите логин';
elseif (strlen($pass) <=3)
$error = 'Введите пароль';

if ($error !=''){
  echo $error;
  exit();
}

$hash = "faeiadicwnediwueefsfscecqfe";
$password = md5($pass.$hash);

require_once '../mysql.php';

$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';    //берем ид ИЗ (название таблицы БД) ГДЕ логин и пароль равен паролю который есть
$query = $pdo->prepare($sql); //подготовка запроса
$query->execute(['login'=>$login, 'pass'=>$pass]); //выполнение закроса с параметрами

$user = $query->fetch(PDO::FETCH_OBJ);
if (empty($user->id)) {  //ну а здесь собственно проверка

   echo 'Такого пользователя не существует';
}
else {
//тут устанавливаем куки,чтобы сайт помнил пользователя где-то месяц
setcookie('log', $login, time()+3600*24*30,"/"); //название куки,значение что запомнить и время (секунды,часы,) последний параметр,где наспространяется куки
echo 'Готово';
}


?>
