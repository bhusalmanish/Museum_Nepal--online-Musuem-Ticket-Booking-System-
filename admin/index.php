<?php include "_dbconnect.php"; ?>


<?php
$showError = [];
if (isset($_POST['submit'])) {
    // echo 'Testing';
    if (empty($_POST["username"])) {
        $showError["username"] = "username must be filled up";
    } else {
        $username = $_POST["username"];
    }
    if (empty($_POST["password"])) {
        $showError["password"] = "username must be filled up";
    } else {
        $password = $_POST["password"];
    }
    if (count($showError) == 0) {
            // echo "check database";
        ;
        $sql = "select *from tbl_admin where email='$username' and password='$password';";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "true";
            $row = mysqli_fetch_assoc($res);
            $id = $row["id"];
            $name = $row["name"];
            echo $id;
            echo $name;

            session_start();
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $name;
            header("location:admin.php");
        }
    }


    // echo $password;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page for admin</title>
</head>

<body>
    <style>
        body {
            top: 50%;
            left: 50%;
            position: absolute;
            transform: translate(-146px, -158px);
            background: whitesmoke;
        }

        .form {
            background: white;
            width: 123%;
            height: 265px;
            box-shadow: 0px 0px 5px;
            border-radius: 10px
        }

        form {
            margin-top: 38px;
        }

        h1 {
            text-align: center;
            color: blueviolet;
            font-style: inherit;
        }

        .input-group {
            margin-top: 25px;
        }

        .input-group {
            margin: 15px;
        }

        label {
            font-size: 20px;
            font-family: monospace
        }

        input {
            height: 22px;
            margin-left: 13px;
            border-color: black;
            border-style: groove;

        }

        input[type="submit"] {
            border: none;
            height: 35px;
            width: 90%;
            margin-left: -4px;
            background: blueviolet;
            text-transform: uppercase;
            font-weight: 300;
        }

        .btn {
            margin-top: 55px;
        }
    </style>
    <div class="form">
        <div class="title">
            <h1>Login Form</h1>
        </div>
        <form action="" method="post">
            <div class="login">
                <div class="input-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username">
                    <?php if (isset($showError["username"])) {
                        echo $showError["username"];
                    } ?>
                </div>

                <div class="input-group">
                    <label for="password">Passwrod</label>
                    <input type="password" name="password" id="password">
                    <?php if (isset($showError["password"])) {
                        echo $showError["password"];
                    } ?>
                </div>

                <div class="btn">
                    <center>
                        <input type="submit" name="submit" value="Login">
                    </center>

                </div>
            </div>



        </form>
    </div>

</body>

</html>