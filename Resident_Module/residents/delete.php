<?php
if ( isset($_GET["household_no"])) {
    $household_no = $_GET["household_no"];

    $servername = "sql211.infinityfree.com";
$username = "if0_34365512";
$password = "5X5BVXjt829";
$database = "if0_34365512_brgy35";

    // Creates connection
    $connection = new mysqli($servername, $username, $password, $database);


    if (is_numeric($household_no)) {
        $sql = "DELETE event, resident_announcement 
        FROM event 
        INNER JOIN resident_announcement ON event.id = resident_announcement.event_id 
        WHERE event.id = $household_no";
        if ($connection->query($sql) === TRUE) {
            header("location: http://localhost/brgy/Brgy_Module/resident_announcements.php");
            exit;
        } else {
            echo "Error deleting record: " . $connection->error;
        }
    } else {
        echo "Invalid input";
    }
}
?>
