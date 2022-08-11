

<?php 
include "header.php";
include "_dbconnect.php";

?>



<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>View user Details</h1>
        </div>
    </div>




    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3> Users Booking Details</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>museum </th>
                        <th>date</th>
                        <th>nepali citizen</th>
                        <th>foreign citizen</th>
                        <th>student</th>
                        <th>specially abled</th>
                        <th>payment</th>
                        <th>transaction no.</th>
                        <th>amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $_GET['id'];
                    $res = mysqli_query($conn, "SELECT * FROM `tbl_ticketbooking` where id=$id");
                    $user_details = mysqli_num_rows($res)>0;

                    if($user_details){
                        while($row = mysqli_fetch_array($res)){
                        $id = $row['id'];
                    
                    ?>
                    <tr>
                        <td>
                        <?PHP echo $row['u_name'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['m_name'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['b_date'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['no_of_nc'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['no_of_fc'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['no_of_ns'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['no_of_sa'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['payment_type'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['transction_no'];  ?>
                        </td>
                        <td>
                        <?PHP echo $row['amount'];  ?>
                        </td>
                        
                    </tr>
                    <?php
                    }
                    }else{
                        echo 'no data found';

                    }

                    ?>
                   
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "footer.php"; ?>