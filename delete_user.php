<?
$id = $_POST['id'];

require_once 'mysql.php';

// Просто удаляем одну запись из БД из таблицы users
$sql = 'DELETE FROM `users` WHERE `id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $id]);
?>
