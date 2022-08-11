<!-- 
// define('DB_NAME', 'db_museum_nepal');
// define('DB_HOST', '127.0.0.1');
// // define('DB_HOST', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
$db_name = 'museum';
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';

$con = mysqli_connect($db_host, $db_username, $db_password, $db_name);

 -->


<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "museum";
$con = mysqli_connect($server, $username, $password, $database);
