<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include "../includes/config.php";
if ( isset($_GET["household_no"])) {
    $household_no = $_GET["household_no"];
 

    if (is_numeric($household_no)) {
        $sql = "DELETE event, event_announcement 
        FROM event 
        INNER JOIN event_announcement ON event.id = event_announcement.event_id 
        WHERE event.id = $household_no";
        if ($conn->query($sql) === TRUE) {
            header("location: event_announcements.php");
            exit;
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    } else {
        echo "Invalid input";
    }
}
?>
