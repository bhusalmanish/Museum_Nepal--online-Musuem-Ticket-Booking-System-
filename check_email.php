<?php 
echo "test";
$email = $_POST['email'];
$password=$_pOST["password"];
try{
	require_once 'include/db.php';
	// $connect = mysqli_connect('localhost','root','','db_museum_nepal');
	$sql = "select email from tbl_user where username='".$email."' and '".$password."' ";
	$res = mysqli_query($connect,$sql);
	if (mysqli_num_rows($res) == 0) {
		echo true;
	} else {
		echo false;
	}
}catch(Exception $e){
	echo false;
}
 ?>