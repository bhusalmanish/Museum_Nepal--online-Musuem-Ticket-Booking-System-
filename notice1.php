<?php

try {
    require_once 'include/db.php';
    $sql_notice = "select * from tbl_notice where date >= CURRENT_DATE;";
    $notice_check =  mysqli_query($con, $sql_notice);
} catch (Exception $e) {
    die('Database connection error' . '<br>' . $e->getMessage());
}

?>


<!-- notice -->
<div class="noticepopup" id="notice">
    <label for="show" class="close-btn" onclick="toggleN()"><i class="fa fa-times" aria-hidden="true">x</i></label>
    <div class="text">
    </div>
    <div class="notice">


        <h3>Notice: </h3>



        <?php


        if (mysqli_num_rows($notice_check) > 0) {
            $i = 0;
            while ($row = mysqli_fetch_array($notice_check)) {
        ?>
                <tr>
                    <h4>
                        <td><?php echo   $i + 1 . "  " . $row["title"]; ?></td>
                    </h4>
                    <td><?php echo $row["description"]; ?></td>
                    <br>

            <?php
                $i++;
            }
        } else {

            echo (" <p>  notice !!! </p>  ");
        }
            ?>



    </div>
</div>