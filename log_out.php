<?php

session_start();
session_unset($_SESSION['report_passport']);
$_SESSION['report_passport'] = false;
header('location:fit_card_login.php');

?>