<?php 

//  check user name and password in database while login. it isuse in  ajax validation: URL section     
require_once"include/db.php";


$email =$_POST['email'];
$password=$_POST["password"];







try{
    $con = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    $login_sql="select * from tbl_user where  email='".$email."' and password='".$password."'";
    print_r($login_sql);
   $login_check= mysqli_query($con,$login_sql); 

   if(mysqli_num_rows($login_check)==1){

     return true;
   }else{
       echo " User Email or Password not valid";
   }


}
catch(Exception $e){
    echo false;



}





?>