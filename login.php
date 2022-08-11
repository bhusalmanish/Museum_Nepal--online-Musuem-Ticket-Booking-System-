<?php
require_once 'php_validation_function.php';
require_once"include/db.php";

// require_once 'session_check.php';
if (isset($_POST['login'])) {
    $user;
    $users = [];
    $err = [];

    if (verifyForm($_POST, 'email')) {
        $email = $_POST['email'];
    } else {
        $err['email'] = 'Enter your valid email';
    }

    if (verifyForm($_POST, 'password')) {
        $password = md5($_POST['password']);
    } else {
        $err['password'] = 'Enter your password';
    }


    // check  USER 
    if (count($err) == 0) {
        // check login info  from database:
        try {
            // $db_name = 'museum';
            // $db_host = 'localhost';
            // $db_username = 'root';
            // $db_password = '';

            // $con = mysqli_connect($db_host, $db_username, $db_password, $db_name);

            $login_sql = "select * from tbl_user where  email='".$email."' and password='".$password."'";
            $login_check =  mysqli_query($con, $login_sql);

            print_r($login_check);

            // $fetc = mysqli_fetch_array($login_check);
            // print_r($fetc);
            // // echo(" manish");
            // //debugging
            // print($username);
            // print($password);
            //  print_r($login_sql);
            //  print_r($login_check);
            if (mysqli_num_rows($login_check) == 1) {
                //    fetch data to  $use
                $users = mysqli_fetch_array($login_check);
                // print_r($users["name"]);
                @session_start();
                $_SESSION["login"] = 1;
                // die($_SESSION);
                $_SESSION['id'] = $users['id'];
                $_SESSION['name'] = $users['name'];
                $_SESSION['email'] = $users['email'];
                //  echo(  " email in session ".$_SESSION["email"]);
                header('location:homepage.php');

                if (isset($_POST['remember'])) {
                    // Set Cookie to store data

                    setcookie('name', "om", time() + (7 * 24 * 60 * 60));
                    setcookie('id', "1", time() + (7 * 24 * 60 * 60));
                }
                // Redirect to home page

                // header('location:404.php');


            } else {
                $err['login'] = 'No users found';
            }
        } catch (Exception $e) {
            die('Database connection error' . '<br>' . $e->getMessage());
        }
    }

    // }

}

?>

<div class="center">
    <div class="container" id="container1">
        <!-- <label for=""> <img src="img/closebtn.PNG" alt=""></label> -->
        <label for="show" class="close-btn" onclick="toggleL()" id="cross"><i class="fa fa-times" aria-hidden="true">x </i></label>
        <div class="text">Login Form</div>
        <!--  $_SERVER['PHP_SELF']?> -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id='loginform'>
            <div class="data">
                <label for="Email">Email</label>
                <!-- <span id="erremail"></span>
                <span name="err_email"> 
                   
                    <?php if (isset($err['email'])) {
                        echo $err['email'];
                    }  ?> -->

                <input type="email" name='email' id='email'>
            </div>

            <div class="space"> </div>
            <div class="data">
                <label for="Password">Password</label>
                <span name="err_password" id='errpassword'>
                    <?php if (isset($err['password'])) {
                        echo $err['password'];
                    }  ?>

                </span>

                <input type="password" name="password">
                <div class="space"> </div>
            </div>
            <div class="forget"><a href="#">Forget password?</a></div>
            <input type="checkbox" name='remember' id="remembertxt"> <span>Remember Me</span>


            <div class="btn">
                <button type="submit" name="login">Login</button>
                <div class="signup" name="signup" onclick="link()">Not a member?<a href="#"> Register now</a></div>
                <div class="space"> </div>
                <div class="space"> </div>
            </div>


            <!-- php validation error  -->
            <?php
            $err = [];
            echo checkError($err, 'login'); ?>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] == 1) {
                echo '<b><span class="error">Please login to continue.</span></b>';
            } else if (isset($_GET['msg']) && $_GET['msg'] == 2) {
                echo '<b><span class="success">Logout successful.</span></b>';
            } else if (isset($_GET['msg']) && $_GET['msg'] == 3) {
                echo '<b><span class="error">  </span></b>';
            }
            ?>

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
</style>

<!-- ajax vlidation in login form -->
<script>
    // starting of jquery
    $(document).ready(function() {

        // jquery     validation
        $('#loginform').validate({

            rules: {
                email: {
                    required: true,
                    minlength: 6

                },
                password: {
                    required: true,
                    minlength: 6
                }

            },
            messages: {
                email: {
                    required: " email must required",
                    minlength: " email show  be valid"


                },
                password: {
                    required: " Enter password",
                    minlength: "password should be at least 8 character"

                }

            }
        });

        //ajax user email password check  from database
        $('#email').keyup(function() {
            var uname = $(this).val();
            $.ajax({
                url: 'check_email.php',
                data: {
                    'email': email
                },
                method: 'post',
                dataType: 'email',
                success: function(response) {
                    if (response !== $email) {
                        $('#erruname').text(" email doesn't match");
                    }

                    //  else {
                    // 	$('#erruname').text('Username available');
                    // }
                }
            });


        });

    });
</script>