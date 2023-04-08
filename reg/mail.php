<?
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mesa = trim(filter_var($_POST['mesa'], FILTER_SANITIZE_STRING));




$error = '';
if (strlen( $username ) <= 3)
  $error = 'Введите имя';
  elseif (strlen($email) <=3)
  $error = 'Введите адрес';
  elseif (strlen($mesa) <=3)
  $error = 'Введите сообщение';


if ($error !=''){
  echo $error;
  exit();
}
$my_mail = "test@mail.ru";
$subject ="=?utf-8?B?".base64_encode("Новой сообщение с сайта")."?=";//кодировки кириллицы чтобы неормально отображало так же название соообщения
// от кого,кому отвечать,кодировка
$headers = "From: $email\r\nReply-to: $emai\r\nContent-type : text/html; charset=utf-8\r\n";
//куда отправляем,название сообщения,само сообщение,переменная,заголовок
mail($my_mail,$subject,$mesa,$headers);

echo 'Готово';
