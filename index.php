<?php
session_start();
if (!isset($_SESSION['login'])) {
    //  header('location:index.php?msg= not set');
}
require_once 'include/db.php';
require 'php_validation_function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>museum ticketing system</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->
    <!-- <script src="https://kit.fontawesome.com/251567a26b.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/homepage.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
    <script src="js/toggle_work.js"></script>
    <script src="js/homepage.js"></script>
    <!-- jquery mobile AIP -->
    <!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/[version]/jquery.mobile-[version].min.css" />
    <script src="https://code.jquery.com/jquery-[version].min.js"></script>
    <script src="https://code.jquery.com/mobile/[version]/jquery.mobile-[version].min.js"></script> -->

    <!-- online js , jquery -->
    <!-- <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->

</head>

<body class="img">
    <div class="homepage" id="home">
        <!-- homepage -->
        <!--  nav bar  -->
        <?php require_once 'navmenu.php'   ?>
        <!-- nav bar end -->
        <!-- text area  -->
        <header>
            <div class="header-content">
                <h1>MUSEUM</h1>
                <div class="line"></div>
                <h2>Where past will unroll before your eyes</h2>
                <a href="#visit" class="button">VISIT US TODAY</a>
            </div>
        </header>
    </div>
    </div>
    <?php require_once "login.php"; ?>
    <!-- register page -->
    <?php require_once 'register.php' ?>
    <!-- testing button  -->
    <?php require_once "museum_info.php"; ?>
    <!-- login form -->
    <!-- ticket -->
    <?php require_once 'ticketbooking.php' ?>
    <?php require_once 'notice1.php' ?>
    <?php require_once 'footer.php' ?>
</body>

</html>