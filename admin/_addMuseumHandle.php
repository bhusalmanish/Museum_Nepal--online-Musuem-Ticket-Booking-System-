<?php

include "_dbconnect.php";
$err = [];

if (isset($_POST["add"])) {


    if (isset($_POST['mname'])) {

        $mname = $_POST["mname"];
        echo $mname;
        echo "<br>";
    } else {
        $err['mname'] = "Enter museum name";
    }
    if (isset($_POST['mdesc'])) {

        $mdesc = $_POST["mdesc"];
        echo $mdesc;
        echo "<br>";
    } else {
        $err['mdesc'] = "Enter description";
    }
    if (isset($_POST['mlocation'])) {

        $mlocation = $_POST["mlocation"];
        echo $mlocation;
        echo "<br>";
    } else {
        $err['mlocation'] = "Enter  location";
    }
    if (isset($_FILES['mimage'])) {
       
        // echo $fileName;
        // $targetFilePath = $targetDir . $fileName;
        // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $filename = $_FILES["mimage"]["name"];
        $tempname = $_FILES["mimage"]["tmp_name"];  
        $folder = "muesumImages/".$filename;  
        if(move_uploaded_file($tempname,$folder)){
            echo "done";
        }

        echo "<br>";
    } else {
        $err['mimage'] = "Enter  image name";
    }
    if (isset($_POST['mnc'])) {

        $mnc = $_POST["mnc"];
        echo $mnc;
        echo "<br>";
    } else {
        $err['mnc'] = "Enter nepali citizen";
    }
    if (isset($_POST['mns'])) {

        $mns = $_POST["mns"];
        echo $mns;
        echo "<br>";
    } else {
        $err['ms'] = "Enter nepali student";
    }
    if (isset($_POST['mfc'])) {

        $mfc = $_POST["mfc"];
        echo $mnc;
        echo "<br>";
    } else {
        $err['mfc'] = "Enter foreign name";
    }
    if (isset($_POST['msa'])) {

        $msa = $_POST["msa"];
        echo $msa;
    } else {
        $err['msa'] = "Enter  sa";
    }
    if (count($err) == 0) {
       
     $sql_addMuseum="INSERT INTO `tbl_museum` (`id`, `m_name`, `m_description`, `m_location`, `m_image`, `nc_p`, `ns_p`, `fc_p`, `sa_p`) VALUES (NULL, '$mname',' $mdesc', '$mlocation', ' $filename', '$mnc', '$mns', '$mfc', '$msa');";
        $query_addMuseum=mysqli_query($conn,$sql_addMuseum);
        print($sql_addMuseum);
        print_r($query_addMuseum);
        if($query_addMuseum){
            // echo "insert successfull ";
            header("location:museum.php?msg=1");
        }else{
            // echo " not success";
        }
    }
}
