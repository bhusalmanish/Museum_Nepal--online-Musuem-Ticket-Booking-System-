<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">

    <title>Admin</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">

            <span class="text">Admin</span>
        </a>
        <ul class="side-menu ">
            <li class="active">
                <a href="admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="museum.php">

                    <i class='bx bxs-building-house'></i>
                    <span class="text">Museums</span>
                </a>
            </li>
           
            <li>
                <a href="manageuser.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Manage Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-wallet'></i>
                    <span class="text"> Payement</span>
                </a>
            </li>
            <li>
                <a href="notice.php">
                    <i class='bx bxs-bell'></i>
                    <span class="text"> Notice</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">

            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bxs-exit'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->
        <!-- CONTENT -->
        <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
          
            <a  class="profile">
           

                
                <span style="font-weight:bold; font-size :20px; color:blueviolet; margin: 0px 0px 0px 1090px;"><?php @session_start(); 
                if(isset($_SESSION["name"])){echo  $_SESSION["name"]; }?> </span>
             
            </a>
        </nav>
        </section>
        <!-- NAVBAR -->