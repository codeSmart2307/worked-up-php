<?php
if (isset($_SESSION['customer']['customerId'])) {
    echo "<p style='text-align: right;'>Name: " . $_SESSION['customer']['customerFName'] . " " . $_SESSION['customer']['customerLName'] . " | Customer No: " . $_SESSION['customer']['customerId'] . "</p>";
}
?>