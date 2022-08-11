<?php 
require_once ("_session.php");
include "header.php";
include "_dbconnect.php";
?>



<!-- Update -->

<?php
if(isset($_POST['submit'])){
 
    $id = $_GET['id'];

    $title = $_POST['title'];
    $description = $_POST['desc'];
    $date = $_POST['date'];
    ?>
    <?php
    $sql = "UPDATE `tbl_notice` SET `title` = '$title' , description = '$description' , date = '$date' WHERE `tbl_notice`.`id` = $id;";
    // echo $sql;
    $query_run = mysqli_query($conn,$sql);
    if($query_run){
        header('location:notice.php');
    }else{
        ?>
            <script>
                alert('Data is not successfully insrted');
                window.location='notice.php';
            </script>
        <?php
    }
}

?>
  
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit notice</title>
</head>



<body>
    <h1><style>
    h1 {
        font-size: 33px;
        margin: 19px 39px;
        margin-left: 20%;
        color: blueviolet;
    }
    </style> Edit notice</h1>

    <style>
        .form {
            margin: 50px;
            margin-left: 21%;
            background: var(--light);
            border-radius: 20px;
        }
        form{
            padding: 24px;
            
        }
        .title .desc .date  {
            margin-left: 27px;
        }
        label {
            font-size: 19px;
            font-weight: inherit;
            font-family: 'poppins';
        }
        div {
            margin-top: 10px;
        }
        input[type="submit"] {
            border: none;
            background: blueviolet;
            height: 40px;
            width: 112px;
            text-transform: uppercase;
            border-radius: 5px;
        }
        .btn{
            border: none;
        }
    </style>
    <?php
    if(isset($_GET['id']))
    {
        $noticeid=$_GET['id'];
        $details="SELECT * FROM `tbl_notice` where id='$noticeid'";
        $details_run=mysqli_query($conn,$details);

        if(mysqli_num_rows($details_run)>0)
        {
            $row=mysqli_fetch_array($details_run);

    ?>

    <div class="form">

        <form action="" method ="post">


        <div class="title">
            <label for="title">Title:</label>
            <input type="text" value="<?=$row['title']?>" name="title">
        </div>    
        <div class="desc">
            <label for="desc">Description:</label>
            <input type="text" value="<?=$row['description']?>" name="desc" id="desc">
        </div>
        <div class="date">
            <label for="date">Date:</label>
            <input type="text" value="<?=$row['date']?>" name="date">
        </div>
        <div class="btn">
            <input type="submit" name="submit" value="Update">
        </div>
       
        </form>
    </div>
    <?php
        }
    }else{
        // echo 'no data found';
    }
    ?>
</body>  
</html>  