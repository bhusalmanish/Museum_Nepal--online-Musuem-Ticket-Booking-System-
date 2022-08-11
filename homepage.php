<?php
require_once 'session_check.php';
require_once 'include/db.php';
require 'php_validation_function.php';
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>museum ticketing system</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> -->
    <!-- <script src="https://kit.fontawesome.com/251567a26b.js" crossorigin="anonymous"></script> -->



    <link rel="stylesheet" href="css/homepage.css">


    <!--  offline js -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/jquery.ui.datepicker.validation.js"> </script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.validation.js"></script>
    <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script> 
    <script src="js/toggle_work.js"></script> 
    <script src="js/homepage.js"></script>
    <script src="js/ticket_v.js"></script>


    <!-- online js / jquery -->

    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>  
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 




    <style>

    </style>



</head>

<body class="img">
    <div class="homepage" id="home">
        <div>
            <nav class="nav-bar sticky">
                <div class="logo">
                    <a href="homepage.php"><img src="img/logo.png" alt=""></a>
                </div>
                <ul class="primary_navigation">
                    <li><a href="#visit" onclick=""><i class="bi bi-house-door-fill"></i>Museum</a></li>
                    <li><a id="mybtn" href="#"><i class="bi bi-house-door-fill"></i>Ticket Price</a></li>
                    <li><a href="#" onclick="toggleTB()"><i class="bi bi-ticket-fill"></i>Ticket</a></li>
                    <li><a href="#" onclick="toggleN()"><i class="bi bi-bell-fill"></i>Notice</a></li>
                </ul>
                <ul class="secondary_navigation">
                    <li><a href="#" onclick="myFunction()"> <?php echo $_SESSION['name'] ?></a></li>
                    <li><a id="userTicket_nvabtn" href="#" onclick=""><i class="bi bi-house-door-fill"></i> your ticket</a></li>

                    <!-- user_booking.php -->
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
        <br>
        <br>
        </b>
        <header>
            <div class="header-content">
                <h1>MUSEUM</h1>
                <div class="line"></div>
                <h2>Where past will unroll before your eyes</h2>
                <a href="#visit" class="button">VISIT US TODAY</a>
            </div>
        </header>
    </div>
    <!-- ticket  booking -->
    <?php require_once 'userinfo.php' ?>
    <?php require_once 'ticket_price.php' ?>

    <?php require_once 'ticketbooking.php' ?>
    <?php require_once 'buttontest.php' ?>
    <!-- notice -->
    <?php require_once 'notice1.php' ?>
    <?php require_once "museum_info.php" ?>
    <!-- footer  -->
    <?php require_once 'footer.php' ?>
</body>

</html>