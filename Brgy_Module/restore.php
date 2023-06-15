<?php


include "../includes/config.php";

if (isset($_GET["household_no"])) {
    $household_no = $conn->real_escape_string($_GET["household_no"]);

    // Get the ID of the newly created RBI entry
    $sql = "SELECT rbi_id FROM head_family_restore WHERE head_id = $household_no";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rbi_id = $row["rbi_id"];

        // Update data in head_family table
        $sql = "UPDATE head_family SET rbi_id = '$rbi_id' WHERE head_id = '$household_no'";
        if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM head_family_restore WHERE head_id = $household_no";
            if ($conn->query($sql) === TRUE) {
                header("Location: rbi.php");
                exit;
            } else {
                header("Location: error.php");
                exit;
            }
        } else {
            echo "Error updating data in head_family table: " . $conn->error;
        }
    } else {
        echo "Invalid household number";
    }
}
?>
