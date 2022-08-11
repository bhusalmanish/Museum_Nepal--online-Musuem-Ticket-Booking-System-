<?php 
require_once ("_session.php");
include "header.php"
    // session_start();
?>
<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <br>
            <!-- <?php session_start(); echo $_SESSION["name"] ?> -->
        </div>
    </div>

    <ul class="box-info">

        <li>

            <span class="text">
                <h3><?php
                include "_dbconnect.php";

                    $res = mysqli_query($conn, "SELECT sum(no_of_nc) as tnc,sum(no_of_ns) as tns,sum(no_of_sa) as tsa,sum(no_of_fc) as tfc from tbl_ticketbooking;");
                    $row = mysqli_fetch_assoc($res);
                    $total = $row["tnc"]+$row["tns"]+$row["tfc"]+$row["tsa"];
                    echo $total;

                    ?></h3>
                <p>Visitors</p>
            </span>
        </li>
        <li>

            <span class="text">
                <h3> <?php
                        
                        $res = mysqli_query($conn, "select * from tbl_user;");
                        $num = mysqli_num_rows($res);
                        echo $num;
                        ?></h3>
                <p>No of Users</p>
            </span>
        </li>
        <li>

            <span class="text">
                <h3>RS.<?php

                        $res = mysqli_query($conn, "select sum(amount) as total 
                        from tbl_ticketbooking;");
                        $row = mysqli_fetch_assoc($res);
                        $total = $row["total"];
                        echo $total;

                        ?></h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Today Orders</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Number of Tickets</th>
                        <th>Total Price</th>

                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "_dbconnect.php";
                    
                    $res=mysqli_query($conn,"SELECT * FROM `tbl_ticketbooking` WHERE b_date=CURRENT_DATE;");
                    while($row=mysqli_fetch_assoc($res)){
                        $id=$row["id"];
                        $name=$row["u_name"];
                        $bdate=$row["b_date"];
                        $total=$row["amount"];
                        $add=$row["no_of_nc"]+$row["no_of_ns"]+$row["no_of_fc"]+$row["no_of_sa"];
                        echo '
                        <tr>
                        <td>

                            <p> '.$name.'</p>
                        </td>
                        <td>'.$bdate.'</td>
                        <td>'.$add.'</td>
                        <td>'.$total.'</td>

                        <td> <a href="todayView.php?id='.$id.'"><span class="button">view</span> </a></td>

                    </tr>
                        
                        ';

                    }

                    ?>
                 

                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "footer.php"; ?>

