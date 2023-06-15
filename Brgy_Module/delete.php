<?php

include "../includes/config.php";
if (isset($_GET["household_no"])) {
    $household_no = $conn->real_escape_string($_GET["household_no"]);

    // Get the ID of the existing RBI entry in head_family
    $sql = "SELECT rbi_id FROM head_family WHERE head_id = $household_no";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rbi_id = $row["rbi_id"];

        // Insert data into head_family_restore table
        $sql = "INSERT INTO head_family_restore (rbi_id, head_id) VALUES ('$rbi_id', '$household_no')";
        if ($conn->query($sql) === TRUE) {
            // Delete rbi_id from head_family table
            $sql = "UPDATE head_family SET rbi_id = NULL WHERE head_id = $household_no";
            if ($conn->query($sql) === TRUE) {
                header("Location: rbi.php");
                exit;
            } else {
                header("Location: error.php");
                exit;
            }
        } else {
            echo "Error inserting data into head_family_restore table: " . $conn->error;
        }
    } else {
        echo "Invalid household number";
    }
}
?>
