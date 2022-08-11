<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="img">Images</label>
            <input type="file" value="image.jpg" name="image">
            <input type="submit" name="sub" value="submit">
    </form>
    <?php
        if(isset($_POST['sub'])){
            echo "hello";
            echo $_FILES["image"]["name"];
        }
    ?>
</body>
</html>