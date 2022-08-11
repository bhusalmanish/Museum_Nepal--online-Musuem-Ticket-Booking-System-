<?php
require_once 'php_validation_function.php';
if (isset($_POST['submit'])) {
    $err = [];

    if (verifyForm($_POST, 'Rname')) {

        $name = $_POST["Rname"];
    } else {
        $err['Rname'] = 'Enter your name';
    }
    if (verifyForm($_POST, 'Remail')) {
        $email = $_POST['Remail'];
    } else {
        $err['Remail'] = 'Enter your valid email';
    }

    if (verifyForm($_POST, 'phone')) {
        $phone = $_POST['phone'];
    } else {
        $err['phone'] = 'Enter your valid phone no. ';
    }


    if (!verifyForm($_POST, 'Rcpassword')) {
        $err['Rcpassword'] = "password doesn't match ";
    }

    if (verifyForm($_POST, 'Rpassword') && $_POST['Rpassword'] == $_POST["Rcpassword"]) {
        // $password = $_POST['Rpassword'];
        $T_password = md5($_POST['Rpassword']);
        // print($T_password);
    } else {
        $err['Rpassword'] = 'Enter your valid password';
    }

    if (count($err) == 0) {

        try {
            require_once"include/db.php";
            // $db_name = 'museum';
            // $db_host = 'localhost';
            // $db_username = 'root';
            // $db_password = '';

            // $con = mysqli_connect($db_host, $db_username, $db_password, $db_name);
            $registration_sql =
                "insert into tbl_user(name,email,password,phone,status)values( '".$name."','".$email."','".$T_password."','".$phone."',1)";
            $registration_query = mysqli_query($con, $registration_sql);
             print_r($registration_sql);
             print_r($registration_query);
             header("location:index.php");
        } catch (Exception $e) {
            die('database connection error' . '<br>' . $e->getmessage());
        }
    }
}




?>




<div class="center-1">
    <div class="container-1" id="container2">
        <label for="show" class="close-btn" onclick="toggleR()" id="cut1"><i class="fa fa-times" aria-hidden="true">x</i></label>
        <div class="text">Register Now</div>
        <form action="register.php" method='post' id="signup" name="signup">
            <div class="data-1">
                <label for="Name">Name</label>
                <input type="text" name='Rname' id="Rname">

                <span id="err">
                    <?php if (isset($err['Rname'])) {
                        echo $err['Rname'];
                    }  ?>
                    <div class="space"> </div>
            </div>
            <div class="data-1">
                <label for="Email">Email</label>
                <input type="text" name='Remail' id="Remail">


                <span id="err">
                    <?php if (isset($err['Remail'])) {
                        echo $err['Remail'];
                    }  ?>
                    <div class="space"> </div>
            </div>
            <div class="data-1">
                <label>Phone</label>
                <!-- <input type="number" name='Rcall' id="Rcall"> -->
                <input type="text" name="phone" id="phone">

                <span id="err">
                    <?php if (isset($err['phone'])) {
                        echo $err['phone'];
                    }  ?>
                    <div class="space"> </div>
            </div>
            <div class="data-1">
                <label for="password">Password</label>


                <input type="password" name='Rpassword' id="Rpassword">
                <span name="err_password" id="err">
                    <?php if (isset($err['Rpassword'])) {
                        echo $err['Rpassword'];
                    }  ?>
                    <div class="space"> </div>
            </div>
            <div class="data-1">
                <label for="Password">confirm Password</label>

                <input type="password" name='Rcpassword' id="Rcpassword">
                <span id="err">
                    <?php if (isset($err['Rcpassword'])) {
                        echo $err['Rcpassword'];
                    }  ?>
                    <div class="space"> </div>


            </div>
            <div class="btn1">
                <button type="submit" name="submit">Submit</button>
                <button type="button" onclick="cancelit()">Cancel</button>
                <div onclick="">Already a member?<a href="#" class="login">Login</a></div>
            </div>

        </form>
    </div>
</div>



<!--  err message red css -->
<style type="text/css">
    .red-border {
        border: 1px solid red;
    }

    label.error {
        color: red;
    }

    #err {
        color: red;
    }
</style>


<!-- ajax vlidation in login form -->
<script>
    // starting of jquery
    $(document).ready(function() {


        $('#signup').validate({

            rules: {
                Rname: {
                    required: true,
                    maxlength: 10,

                },
                Remail: {
                    required: true,
                    email: true,

                },
                Rpassword: {
                    required: true,
                    minlength: 8,
                },

                Rcpassword: {
                    required: true,
                    minlength: 8,
                    equalto: '#Rpassword',
                    maxlength: 10,



                },
                phone: {
                    required: true,
                    minlength: 9,
                    maxlength: 10,
                    number: true
                },

            },
            messages: {

                Rname: {
                    required: "Enter name",
                    maxlength: "max length is 10 charcters",
                },
                Remail: {
                    required: " email must required",
                    email: " email should  be valid",


                },
                Rpassword: {
                    required: " Enter password",
                    minlength: "password should be at least 8 character",

                },
                Rcpassword: {
                    required: " Enter password",
                    equalto: "password should be match",
                    minlength: "password should be at least 8 character",
                    // maxlength: "max length is 20 ",

                },
                phone: {
                    required: " Enter Phone  is required",
                    minlength: " Enter Phone  Min Length is 10",
                    maxlength: " Enter Phone  Max Length is  15",
                    number: " Enter Phone no  is number",
                },

            },


        });


        // var phone = document.signup.Rcall;


        // $('#call').keyup(function() {
        //     console.log($(this).val());
        //     //     var inputVal = $(this).val();
        //     // var characterReg = /^([1-9]d{10})$/;
        //     // if(!characterReg.test(inputVal)) {
        //     //     $(this).after('<span class="error error-keyup-4">Format xxx-xxx-xxxx</span>');
        //     // }

        // });




    });
</script>