<?php
require_once ("_session.php");
include "_dbconnect.php";
include "header.php";
?>


<?php
if (isset($_GET['id'])) {
   

    session_start();
        $id= $_GET['id'];
        $_SESSION['id']=$id;

    $sql="DELETE FROM `tbl_notice` WHERE `tbl_notice`.`id` = $id;";
   $res= mysqli_query($conn,$sql);
   if($res){
       header("location:notice.php");
   }else{
       ?>
            <script>
                alert("not deleted");
            </script>
       <?php
   }
}
?>


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
                    $res = mysqli_query($conn , "SELECT * FROM `tbl_notice`");
                    $num = mysqli_num_rows($res);
                    echo $num;
                    ?>
                </h3>
                <p>Notices</p>
            </span>
        </li>
    </ul>

<!-- Modal for notices -->
    <div class="modal fade" id="noticehandel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Notice </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="noticehandel.php" method="post" >
                            <div class="input-group">
                                <label for="title"> Title : </label>&nbsp; &nbsp;
                                <input type="text" name="title" id="title">

                            </div>
                            <hr>
                            <div class="input-group">
                                <label for="desc"> Desciption : </label>&nbsp; &nbsp;
                                <textarea type="text" cols="20" rows="5" name="desc" id="desc"></textarea>

                            </div>
                            <hr>
                            <div class="input-group">
                                <label for="date"> Date :</label>&nbsp; &nbsp;
                                <input type="date" name="date" id="date1">

                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit"  name="noticehandel" class="btn btn-primary">Add notice</button>
                        </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Notices</h3>
                <h4 style="background:blueviolet;" class=" btn btn-success status completed" data-bs-toggle="modal" data-bs-target="#noticehandel">Add Notice </h4>


            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res = mysqli_query($conn , "SELECT * FROM `tbl_notice`");
                    $check_notice = mysqli_num_rows($res)>0;

                    if($check_notice)
                    {
                        while($row=mysqli_fetch_array($res)){
                        $id = $row['id'];
                    
                    ?>
                
                    <tr>
                       <td>
                         <?php echo $row['title']; ?>
                       </td>
                       <td>
                         <?php echo $row['date']; ?>
                       </td>
                       <td> <a href="addnotices.php?id=<?=$id?>"><span class="button">Edit</a></span> <a type="button" href="notice.php?id=<?php echo $id; ?> " onclick="alert('Do you want to delete ')"><span style="background:red;" class="button">Delete</span> </a></td>

                            
                    </tr>
                    <?php
                    }
                    }else{
                        // echo 'no notice found';
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>
</main>
<script>   
// date past date block
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
$('#date1').attr('min', today);
</script>




























<?php
include "footer.php";
?>