<?php
 
include "../includes/Auth.php";
include "../includes/MainClass.php";

$user_data = json_decode($class->get_user_data_admin($_SESSION['user_id']));
if($user_data->status){
    $user = $user_data->data;
    $_SESSION['user_login'] = 1;
    $_SESSION['user_id'] = $user->id;
    $_SESSION['username'] = $user->username;
    $_SESSION['typeAccount'] = '$user->typeAccount';
    // assign any other necessary session variables
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $verify = json_decode($class->otp_verify2());
    if($verify->status == 'success'){
        echo "<script>location.replace('index.php');</script>";
    }else{
        header("Location: error.php");
    }
}
?>
