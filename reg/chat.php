
<?
// НЕ УДАЛЯТЬ
if(isset($_POST['soob'])){

$soob = $_POST['soob'];
require_once '../mysql.php';

  $sql = "INSERT INTO `chat`(`soob`) VALUES(?)";
  $query = $pdo->prepare($sql);
  $query->execute([$soob]);

}


  ?>
