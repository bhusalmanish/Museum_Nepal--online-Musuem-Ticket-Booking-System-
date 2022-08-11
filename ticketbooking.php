<?php
//  museum table call for museum name and price list: use in booking ticket
try {
    require_once 'include/db.php';
    $sql_museum = "select * from tbl_museum;";
    $museum_query =  mysqli_query($con, $sql_museum);
} catch (Exception $e) {
    die('Database connection error' . '<br>' . $e->getMessage());
}
?>
<!--   Ticket booking validation : -->
<?php
if (isset($_POST["confirm"])) {
    $err = [];
    if (verifyForm($_POST, 'MN')) {
        $MN = $_POST['MN'];
    } else {
        $err['MN'] = 'select  Museum ';
    }
    if (verifyForm($_POST, 'date')) {
        $date = $_POST['date'];
    } else {
        $err['date'] = 'Select Date ';
    }

    if (count($err) == 0) {
        try {
            $b_date = date("y/m/d");
            $NS = intval($_POST["NS"]);
            $NC = intval($_POST["NC"]);
            $FC = intval($_POST["FC"]);
            $SA = intval($_POST["SA"]);

            //  fetch museum price list
            $sql_museum_price = " select nc_p,ns_p,fc_p, sa_p from tbl_museum where m_name= '$MN';";
            $query_mueum_price = mysqli_query($con, $sql_museum_price);
            $row_museum_price = mysqli_fetch_array($query_mueum_price);
            // echo ($sql_museum_price);
            // print_r($row_museum_price);
            $P_NS = $NS * $row_museum_price['ns_p'];
            $P_NC = $NC *  $row_museum_price['nc_p'];
            $P_FC = $FC * $row_museum_price['fc_p'];
            $P_SA = $SA * $row_museum_price['sa_p'];
            $TP = $P_NC + $P_NS + $P_FC;
            @session_start();
            $_SESSION["MN"] = $MN;
            $_SESSION["date"] = $date;
            $_SESSION["NC"] = $NC;
            $_SESSION["NS"] = $NS;
            $_SESSION["FC"] = $FC;
            $_SESSION["SA"] = $SA;
            $_SESSION["TP"] = $TP;
        } catch (Exception $e) {
            die("$e");
        }
    }
}
?>
<div class="ticket-form">
    <div class="ticket-container" id="ticket">
        <label for="show" class="close-btn" onclick="toggleTB()"><i class="fa fa-times" aria-hidden="true">x</i></label>
        <div class="text">Booking Details</div>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>"  name="TB" id="TB" method="post">
            <div class="data2">
                <label for="name">Museum Name</label>
                <span id="err">
                    <?php if (isset($err['MN'])) {
                        echo $err['MN'];
                    }  ?>
                    <div class="space"> </div>
                    <select name="MN" id="MN">
                        <option value="">Select Name </option>
                        <!--   fetch museum name -->
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($museum_query)) {
                        ?>
                            <option value="<?php echo $row['m_name']; ?>"> <?php echo $row['m_name']; ?> </option>
                        <?php
                            $i++;
                        }
                        ?>
                    </select>
            </div>
            <div class="data2">
                <label for="date">Date</label>
                <span id="err">
                    <?php if (isset($err['date'])) {
                        echo $err['date'];
                    }  ?>
                    <div class="space"> </div>
                    <input type="date" id="date1" name="date">
            </div>
            <div class="data2">

                <label for="ticket-type">Nepali Citizen</label>
                <span id="err">
                    <?php if (isset($err['NV'])) {
                        echo $err['NV'];
                    }  ?>
                    <div class="space"> </div>
                    <span id="err_num"></span>

                    <input class="num_check"  name="NC" id="NC" type="text">

            </div>
            <div class="data2">
                <label for="ticket-type">Foreign Citizen</label>
                 <span id="err_num"></span>

                <input  class="num_check"   id="FC" name="FC" type="text">
                
            </div>
            <div class="data2">
                <label for="ticket-type">Nepali Student</label>
                <span id="err_num"></span>

                <input class="num_check"    name="NS" id="NS" type="text">

            </div>

            <div class="data2">
                <label  for="ticket-type">Specially Abled</label> 
                  <span id="err_num"></span>

                <input  class="num_check" name="SA" id="SA" type="text">
            </div>
            <div class="btn2">
                <!-- onclick="toggleT() -->
                <button type="submit" name="confirm" id='TB_confirm' >Confirm</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>

<!--  Payment Option Form -->

<!-- payment Form -->
<?php
$err = [];
require_once("include/db.php");
// 
if (isset($_POST['details'])) {

    if (verifyForm($_POST, 'payment_type')) {
        $payment_type = $_POST["payment_type"];
    } else {
        $err["payment_type"] = " select Payment_type";
    }

    if (verifyForm($_POST, 'payment_id')) {
        $payment_id = $_POST['payment_id'];
    } else {

        $err['payment_id'] = ' Enter payment ID';
    }

    if (count($err) == 0) {
        try {
            require_once 'include/db.php';
            $_SESSION["payment_type"] = $payment_type;
            $_SESSION["payment_no"] = $payment_id;
            $tbl_booking_sql = 'INSERT INTO `tbl_ticketbooking` (`id`, `u_name`, `m_name`, `b_date`, `no_of_nc`, `no_of_ns`, `no_of_fc`, `no_of_sa`, `payment_type`, `transction_no`, `amount`) VALUES (NULL, "' . $_SESSION["name"] . '","' . $_SESSION["MN"] . '","' . $_SESSION["date"] . '","' . $_SESSION["NC"] . '", "' . $_SESSION["NS"] . '","' . $_SESSION["FC"] . '","' . $_SESSION["SA"] . '","' . $_SESSION["payment_type"] . '","' . $_SESSION["payment_no"] . '","' . $_SESSION["TP"] . '")';
            $tbl_booking_query = mysqli_query($con, $tbl_booking_sql);
            if ($tbl_booking_query) {
                echo "inserted";
            } else {
                echo "false";
            }
        } catch (Exception $e) {
            die("Connection Error" . $e->getMessage());
        };
    }
}
?>
<!-- ticket input data and payment -->
<div class="center-2" id='tp'>
    <div class="paymentmethod" id="details">
        <!-- detailsclose() -->


        <label for="show" class="close-btn" onclick="toggleTD()"><i class="fa fa-times" aria-hidden="true">x</i></label>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
            <div class="text">Ticket Details</div>
            <label for="museum">Museum Name:</label>
            <span>Narayanhiti</span>
            <br>
            <label for="date">Date:</label>
            <span> <?php print_r($_SESSION["date"]); ?></span>
            <br>
            <label for="person">No of Person:</label>
            <div class="line1"></div>
            <div class="list">
                <label for="stu">Nepali Student:</label>
                <span> <?php print_r($_SESSION["NS"]); ?></span><br>
                <label for="ctz">Nepali Citizen:</label>
                <span> <?php print_r($_SESSION["NC"]); ?></span><br>
                <label for="ctz">Foreign Citizen:</label>
                <span> <?php print_r($_SESSION["FC"]); ?></span><br>

                <label for="ctz">Specially Abled:</label>
                <span> <?php print_r($_SESSION["SA"]); ?></span><br>
                <label for="ctz">Total Price:</label>
                <span> <?php print_r($_SESSION["TP"]); ?></span><br>
            </div>
            <label for="payment">Payment:</label>
            <div class="line2"></div>
            <div class="list">
                <input name="payment_type" value="esewa" type="radio">
                <label for="esewa">Esewa</label><br>
                <input name="payment_type" value="khalit" type="radio">
                <label for="khalti">Khalti</label><br>
                <input name="payment_type" value="cash" type="radio">
                <label for="cash">Cash</label> <br>
                <label for=""> Payment ID: </label>
                <input type="text" name="payment_id">
            </div>
            <div class="btn3">
                <button type="submit" name="details" >Confirm</button>
                <button type="button" onclick="cancel()">Cancel</button>
            </div>
        </form>

    </div>
</div>
<!-- ticket booking -->
<?php
?>
<div class="center-3">
    <div class="finalticket" id="tf">
        <label for="show" class="close-btn" onclick="toggleTF()"><i class="fa fa-times" aria-hidden="true">x</i></label>
        <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="text">Ticket</div>
            <label for="museum">Museum Name:</label>
            <span><?php print_r($_SESSION["MN"]); ?></< /span>
                <br>
                <label for="date">Date:</label>
                <span><?php print_r($_SESSION["date"]); ?></< /span>
                    <br> <label for="ctz">booked by:</label>
                    <?php print_r($_SESSION["name"]); ?><br>
                    <label for="person">No of Person:</label>
                    <div class="line1"></div>
                    <div class="list">
                        <label for="stu">Nepali Student:</label>
                        <span><?php print_r($_SESSION["NS"]); ?></span><br>
                        <label for="ctz">Nepali Citizen:</label>
                        <span><?php print_r($_SESSION["NC"]); ?></span><br>
                        <label for="ctz">Foreign Citizen:</label>
                        <span><?php print_r($_SESSION["FC"]); ?></span><br>

                        <label for="ctz">Specially Abled:</label>
                        <span><?php print_r($_SESSION["SA"]); ?></span><br>

                        <label for="price">Payment by:</label>
                        <span><?php print_r($_SESSION["payment_type"]); ?></span> <br>

                        <label for="price">Total Price:</label>
                        <span><?php print_r($_SESSION["TP"]); ?></span>
                    </div>
                    <div class="btn4">
                        <button name="final" type="submit">Save Ticket</button>
                    </div>
        </form>
    </div>
</div>


 <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date1').attr('min',today);
$(document).ready(function() {

//  ticket booking  validation
$("#TB").vaildate({
    rules: {
        MN: "required",
        date1: "required",
    },
    messages: {
        MN: "Select Museum name hari ",
        datetxt: "Select Date hari ",
    }
});
//  +ve number check jquer
//called when key is pressed in textbox          
$(".num_check").keypress(function(e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#err_num").html(" Type Digits Only").show().fadeOut();
        return false;
    }
});
});
    </script>