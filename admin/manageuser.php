<?php
include "_dbconnect.php";


?>

<?php include "header.php" ?>



<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
        </div>
    </div>

    <ul class="box-info">

        <li style="max-width:50%;">

            <span class="text">
                <h3>
                    <?php
                    $res=mysqli_query($conn, "SELECT * FROM `tbl_user`");
                    $num=mysqli_num_rows($res);
                    echo $num ;
                    ?>
                </h3>
                <p>users</p>
            </span>
        </li>
       
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Users</h3>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Phone no.</th>
                        <th>status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $res=mysqli_query($conn, "SELECT * FROM `tbl_user`");
                    $check_user=mysqli_num_rows($res)>0;

                    if($check_user)
                    {
                        while($row=mysqli_fetch_array($res)){
                            $id = $row['id'];
                    
                    ?>
                    <tr>                       
                        <td>
                            <?php echo $row['name']; ?>                            
                        </td>
                        <td>
                            <?php echo $row['email']; ?>                            
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>                            
                        </td>
                        <td> 
                            <?php
                            if($row['status']==1){
                                echo '<p><a type="button" class="button" href="status.php?id='.$row['id'].'&status=0" >Active</a></p>';
                            }
                           
                            else{
                                echo '<p><a  type="button" href="status.php?id='.$row['id'].'&status=1" <span style="background:red;" class="button">Deactive</a></p>';
                            }

                            ?>
                        </td>

                        
                    </tr>
                    <?PHP
                    }
                    } else {
                        echo "no user found";
                    }
                    ?>
                   
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "footer.php"; ?>