<?php
function verifyForm($method,$name) {
        if(isset($method[$name]) && !empty($method[$name]) && trim($method[$name])) {
            return true;
        } else {
            return false;
        }
    } 

    function checkError($err, $name) {
        $msg = '';
        if(isset($err[$name])) {
            $msg = '<b><span class="error">' . $err[$name] . '.</span></b>';
        }
        return $msg;
    }
?>