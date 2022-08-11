<?php
try {
    require_once 'include/db.php';
    $sql_museum = "select * from tbl_museum;";
    $museum_query =  mysqli_query($con, $sql_museum);
} catch (Exception $e) {
    die('Database connection error' . '<br>' . $e->getMessage());
}


?>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }


    /*  table css */





    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #af73e7;
        color: white;
    }
</style>
<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->
<!-- The Modal -->
<div id="Ticket_price_model" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 color='red'> Tickets Price Lists:</h3><br>
        <?php
        if (mysqli_num_rows($museum_query) > 0) {
        ?>
            <table id="customers">
                <tr>
                    <th> SN</th>
                    <th> Museum Name</th>
                    <!-- <th> location </th> -->
                    <th> Nepali Citizen</th>
                    <th> Nepali Student</th>
                    <th>Foregin Citizen </th>
                    <th>Special Able </th>

                </tr>

                <!-- </table>
      <table id="customers"> -->

                <?php
                $i = 0;

                while ($row = mysqli_fetch_array($museum_query)) {
                ?>
                    <tr>
                        <td> <?php echo $i + 1 ?></td>
                        <td> <?php echo $row['m_name'] ?></td>
                        <td> <?php echo  "NRS " . $row['nc_p'] ?></td>
                        <td> <?php echo "NRS " . $row['ns_p'] ?></td>
                        <td> <?php echo "NRS " . $row['fc_p'] ?></td>
                        <td> <?php echo "NRS " . $row['sa_p'] ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>

        <?php
        } else {
            echo (" <p>    NO Ticket list !!! </p>  ");
        }
        ?>
    </div>

</div>

<script>
    // Get the modal
    var modal1 = document.getElementById("Ticket_price_model");
    // Get the button that opens the modal
    var btn1 = document.getElementById("mybtn");
    // Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close")[0];
    // When the user clicks the button, open the modal 
    btn1.onclick = function() {
        modal1.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }
</script>