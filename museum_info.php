<?php
try {
    require_once 'include/db.php';
    $sql_museum = "select * from tbl_museum;";
    $museum_query =  mysqli_query($con, $sql_museum);
} catch (Exception $e) {
    die('Database connection error' . '<br>' . $e->getMessage());
}
?>
     <div class="title"> 
        <h1>Museum</h1>  </div> 
        <div class="line"></div>  
    </div>
    <?php


    if (mysqli_num_rows($museum_query) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($museum_query)) {
    ?>
            <!-- <p id="M_title"></p> -->
                 <h2  id="M_title">   <?php echo   $i + 1 . ":  " . $row["m_name"]; ?>    </h2>
            <div class="clearfix" id="museumBox">
                <?php $load_img = trim($row['m_image']); ?>
                <img class="img2" src='admin/muesumImages/<?php echo $load_img ?>' alt="Pineapple" width="400" height="280">
                <?php echo $row["m_description"]; ?> 
            </div>
    <?php
            $i++;
        }
    } else {

        echo (" <p>  NO Museum Listed  !!! </p>  ");
    }
    ?>
<!-- </section> -->
    