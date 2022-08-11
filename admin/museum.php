<?php
include "_dbconnect.php";


?>



<?php
if (isset($_GET['mid'])) {
    include "_dbconnect.php";

    session_start();
        $id= $_GET['mid'];
        $_SESSION['mid']=$id;

    $sql="DELETE FROM `tbl_museum` WHERE `tbl_museum`.`id` = $id;";
   $res= mysqli_query($conn,$sql);
   if($res){
       header("location:museum.php");
   }else{
       ?>
            <script>
                alert("not deleted");
            </script>
       <?php
   }


}


?>

<?php include "header.php" ?>


<?php
if(isset($_GET["msg"])){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> Success !</strong> new museum has been added.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
    ';
}

?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1 style="color:blueviolet">Dashboard</h1>
        </div>
    </div>

    <ul class="box-info">

        <li style="max-width:50%; ">

            <span class="text">
                <h3>
                    <?php
                    include "_dbconnect.php";
                    $res = mysqli_query($conn, "select * from tbl_museum;");
                    $num = mysqli_num_rows($res);
                    echo $num;
                    ?></h3>
                <p>Number of Museums</p>
            </span>
        </li>

    </ul>





<!-- php add museum  -->
    <!-- Modal for add museum  -->
    <div class="modal fade" id="addMusuem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Museum </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="_addMuseumHandle.php" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <label for="mname"> Museum Name: </label>&nbsp; &nbsp;
                            <input type="text" name="mname" id="mname">

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mdesc"> Desciption : </label>&nbsp; &nbsp;
                            <textarea type="text" cols="20" rows="5" name="mdesc" id="mdesc"></textarea>

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mlocation"> Location </label>&nbsp; &nbsp;
                            <input type="text" name="mlocation" id="mlocation">

                        </div>
                        <hr>


                        <div class="input-group">
                            <label for="mimage"> Images </label>&nbsp; &nbsp;
                            <input type="file" name="mimage" id="mimage">

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mnepali"> Nepali : </label>
                            &nbsp;<input type="number" name="mnc" id="mnepali">

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mstudent"> Student: </label>&nbsp; &nbsp;
                            <input type="number" name="mns" id="mstudent">

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mforeign"> Foreign : </label>&nbsp; &nbsp;
                            <input type="number" name="mfc" id="mforeign">

                        </div>
                        <hr>
                        <div class="input-group">
                            <label for="mspecial">Specially: </label>&nbsp; &nbsp;
                            <input type="number" name="msa" id="mspecial">

                     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit"  name="add" class="btn btn-primary">Add Museum</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- add museum close -->




    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Museums</h3>
                <h4 style="background:blueviolet;" class=" btn btn-success status completed" data-bs-toggle="modal" data-bs-target="#addMusuem">Add Museum </h4>

            </div>
            <table>
                <thead>
                    <tr>
                        <th>Museum</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    include "_dbconnect.php";
                    $res = mysqli_query($conn, "select * from tbl_museum ;");
                    $check_museum = mysqli_num_rows($res) > 0;

                    if ($check_museum) {
                        while ($row = mysqli_fetch_array($res)) {
                            $id=$row["id"];

                    ?> <tr>

                            <td>

                                <?PHP echo $row['m_name'];  ?>

                            </td>

                            <td> <a href="editdetails.php?id=<?php echo $id; ?>"><span class="button">Edit</a></span> <a type="button" href="museum.php?mid=<?php echo $id; ?> " onclick="alert('Do you want to delete ')"><span style="background:red; color:white; margin-left:4px;" class="button">Delete</span> </a></td>
                                
                        </tr>
                    <?PHP
                        }
                    } else {
                        echo "no museum found";
                    }
                    ?>

                    
                </tbody>
            </table>
        </div>

    </div>
</main>
<?php include "footer.php"; ?>