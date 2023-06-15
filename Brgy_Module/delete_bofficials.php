<?php
if ( isset($_GET["id"])) {
    $id = $_GET["id"];

 
include "../includes/config.php";


    $sql = "DELETE FROM brgyofficials WHERE id=$id";
    $conn->query($sql);

    header("location: brgyofficials.php");
    exit;
}
?><?php
if ( isset($_GET["id"])) {
    $id = $_GET["id"];

 
include "../includes/config.php";


    $sql = "DELETE FROM brgyofficials WHERE id=$id";
    $conn->query($sql);

    header("location: brgyofficials.php");
    exit;
}
?>