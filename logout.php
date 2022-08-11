<?php 
session_start();
unset($_SESSION);
session_destroy();
setcookie('name',null,time()-1);
header('location:index.php?msg=logout')

?>




