<?php
if(session_status() === PHP_SESSION_NONE)
session_start();
$link = $_SERVER['PHP_SELF'];
if(!strpos($link,'index.php') && !strpos($link,'Login_verification.php') && !strpos($link,'Registration.php') && !isset($_SESSION['user_login'])){
echo "<script>location.replace('index.php');</script>";
}
if(strpos($link,'Login_verification.php') && !isset($_SESSION['otp_verify_user_id'])){
    echo "<script>location.replace('index.php');</script>";
}
if(strpos($link,'index.php') > -1 && isset($_SESSION['user_login'])){
    if ($_SESSION['typeAccount'] == "resident") {
        echo "<script>location.replace('Resident_Module/index.php');</script>";
    } elseif ($_SESSION['typeAccount'] == "barangay") {
        echo "<script>location.replace('Brgy_Module/index.php');</script>";
    }
}