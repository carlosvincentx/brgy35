<?php
include "includes/Auth.php";
include "includes/MainClass.php";
$user_data = json_decode($class->get_user_data($_SESSION['otp_verify_user_id']));
if($user_data->status){
    if(isset($user_data->data)){
        foreach($user_data->data as $k => $v){
            $$k = $v;
        }
    }
}

if(isset($_GET['resend']) && $_GET['resend'] == 'true'){
    $resend = json_decode($class->resend_otp($_SESSION['otp_verify_user_id']));
    if($resend->status == 'success'){
        echo "<script>location.replace('http://brgy35.infinityfreeapp.com/Resident_Module/Login_verification.php')</script>";
    }else{
        $_SESSION['flashdata']['type']='danger';
        $_SESSION['flashdata']['msg']=' Resending OTP has failed.';
        echo "<script>console.error(".json_encode($resend).")</script>";
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $verify = json_decode($class->otp_verify());
    if($verify->status == 'success'){
        echo "<script>location.replace('Resident_Module/logout.php');</script>";
    }
}
?>