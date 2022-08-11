<?php
 include "_dbconnect.php";

session_start();


?>
<?php

if(isset($_POST['submit']))
{
    $id = $_GET['id'];
  
    $name=$_POST['name'];
    $location =$_POST["location"];
    $desc=$_POST['description'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];  
    $folder = "muesumImages/".$filename;   
    $nc=$_POST["nc"];
    $ns=$_POST["ns"];
    $fc=$_POST["fc"];
    $sa=$_POST["sa"];
    if(move_uploaded_file($tempname,$folder))
    {
        echo "file upload successfully";
    }else{
        ?>
                <script>
                    alert('Your Images hasnot selected')
                </script>
        <?php
    }


    $sql="UPDATE `tbl_museum` SET `m_name` = '$name', `m_description` = ' $desc', `m_location` = '$location', `m_image` = '$filename ', `nc_p` = ' $nc', `ns_p` = '$ns', `fc_p` = '$fc', `sa_p` = '$sa' WHERE `tbl_museum`.`id` = $id;";
    $query_run = mysqli_query($conn,$sql);
    if($query_run){
        header("location:museum.php");
    }

 
}



?>

<?php include "header.php" ?>
  
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page for admin</title>
</head>



<body>
    <h1><style>
    h1 {
        font-size: 33px;
        margin: 19px 39px;
        margin-left: 20%;
        color: blueviolet;
    }
    </style> Edit details</h1>

    <style>
        .form {
            margin: 50px;
            margin-left: 80px;
            background: var(--light);
            margin-left: 21%;
            border-radius: 20px;
            padding: 24px;
        }
      
        .name .location .desc .img .nepali .student .foreign .speciallyabled {
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
    $editid = $_GET['id'];
    $editdetails = "SELECT * FROM tbl_museum where id='$editid'";
    $edit_run = mysqli_query($conn,$editdetails);

    if(mysqli_num_rows($edit_run) > 0)
    {
        $row = mysqli_fetch_array($edit_run);

        
        ?>
    
    <div class="form">

        <form action="" method ="post" enctype="multipart/form-data">


        <div class="name">
            <label for="name">Name:</label>
            <input type="text" value="<?= $row['m_name'] ?>" name="name">
        </div>
        <div class="location">
            <label for="location">Location:</label>
            <input type="text" value="<?= $row['m_location']?>" name="location" id="location">
        </div>
        <div class="desc">
            <label for="desc">Description:</label>
            <input type="text" value="<?= $row['m_description']?>" name="description">
        </div>
        <div class="img">
            
            <div class="image" style="width:100px;margin: 9px 114px;">

                <img src="muesumImages/<?php echo $row['m_image']; ?>" alt="muesum Image" width="100" height="100">
            </div>
            <br>
            <label for="img">Images:</label>
            <input type="file" value="muesumImages/<?php echo $row['m_image']; ?>" name="image">
        </div>
        <div class="nepali">
            <label for="nepali">Nepali citizen:</label>
            <input type="number" value="<?php echo $row['nc_p']?>" name="nc">
        </div>
        <div class="student">
            <label for="student">student citizen:</label>
            <input type="number" value="<?= $row['ns_p']?>" name="ns">
        </div>
        <div class="foreign">
            <label for="foreign">foreign citizen:</label>
            <input type="number" value="<?= $row['fc_p']?>" name="fc">
        </div>
        <div class="specially abled">
            <label for="specially abled">specially abled citizen:</label>
            <input type="number" value="<?= $row['sa_p']?>" name="sa">
        </div>

        <br>
        <div class="btn">
            <input type="submit" name="submit" value="Update">
        </div>
       
        </form>
    </div>
    <?php
    }
    else
    {
       ?>
       <h4>no record found</h4> 
       <?php

    }

}

?>
  
</body>
</html>
  
<?php include "footer.php"; ?>