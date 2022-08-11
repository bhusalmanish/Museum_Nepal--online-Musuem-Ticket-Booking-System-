<?php
  include"_dbconnect.php";
?>

<?php
$id = $_GET['id'];
$status = $_GET['status'];

$query = "update tbl_user set status =$status where id = $id";
mysqli_query($conn, $query);

header('location:manageuser.php');

?>