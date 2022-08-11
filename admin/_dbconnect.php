<?php
$server="localhost";
$username="root";
$password="";
$database="museum";


try{

    $conn=mysqli_connect($server,$username,$password,$database);
    // echo "success";
}
catch(Exception $e){
    // echo "database connect fail";
    die ($e);
}



?>