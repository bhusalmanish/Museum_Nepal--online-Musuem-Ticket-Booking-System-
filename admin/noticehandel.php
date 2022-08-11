<?php 
// include "header.php";
include "_dbconnect.php";
?>

<!-- add notices -->

<?php
$err =[];
if(isset($_POST['noticehandel'])){
    // print_r($_POST);
    echo "testing";
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        // echo $title;
    }
    else{
        $err['title']="enter title";
        // echo $err['title'];
    }
    if(isset($_POST['desc'])){
        $description=$_POST['desc'];
        // echo $description;
    }
    else{
        $err['description']='enter notice details';
    }
    if(isset($_POST['date'])){
        $date=$_POST['date'];
        // echo $date;
    }
    else{
        $err['date']='enter valid date';
    }
    if(count($err)==0){
        
        // echo "hellO";
        $sql = "INSERT INTO `tbl_notice` (`id`, `title`, `description`, `date`) VALUES (NULL,'$title', '$description', '$date');";
        $res=mysqli_query($conn,$sql);
        if($res){
            // echo 'success';
            header('location:notice.php?msg=1');
        }
        else{
            ?>
            <script>
                alert("Data cannot inserted succefully");
                window.location.href=window.location.href;
            </script>

            <?php
        }
    }
}

?>