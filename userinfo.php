<?php

try {

  @session_start();

  $user_name = $_SESSION['name'];
  require_once 'include/db.php';
  $sql = "SELECT * FROM `tbl_ticketbooking` WHERE  u_name = '$user_name';";
  $userticket =  mysqli_query($con, $sql);
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
  .close1 {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close1:hover,
  .close1:focus {
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
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close1">&times;</span>



    <h3 color='red'> Tickets:</h3><br>



    <?php
    if (mysqli_num_rows($userticket) > 0) {
    ?>
      <table id="customers">
        <tr>
          <th> SN</th>
          <th> Museum Name</th>
          <th> Booking date</th>
          <th> Nepali Citizen</th>
          <th> Nepali Student</th>
          <th>Foregin Citizen </th>
          <th>Special Able </th>
          <th> Payment</th>
          <th> Transction Id</th>
          <th> Amount</th>
        </tr>

        <!-- </table>
      <table id="customers"> -->

        <?php
        $i = 0;

        while ($row = mysqli_fetch_array($userticket)) {
        ?>
          <tr>
            <td> <?php echo $i + 1 ?></td>
            <td> <?php echo $row['m_name'] ?></td>
            <td> <?php echo $row['b_date'] ?></td>
            <td> <?php echo $row['no_of_nc'] ?></td>
            <td> <?php echo $row['no_of_ns'] ?></td>
            <td> <?php echo $row['no_of_fc'] ?></td>
            <td> <?php echo $row['no_of_sa'] ?></td>
            <td> <?php echo $row['payment_type'] ?></td>
            <td> <?php echo $row['transction_no'] ?></td>
            <td> <?php echo  "NRS  " . $row['amount'] ?></td>
          </tr>
        <?php
          $i++;
        }
        ?>
      </table>

    <?php
    } else {
      echo (" <p>    NO Ticket Booking  !!! </p>  ");
    }
    ?>



  </div>

</div>










<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("userTicket_nvabtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close1")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>