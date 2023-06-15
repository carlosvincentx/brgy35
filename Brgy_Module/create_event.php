<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";
$head_family = "";
$type_household = "";
$year_stay = "";
$street = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about = $_POST["event"];
    $post = $_POST["posting"];
    $location = $_POST["location"];
    $date_from = $_POST["date_from"];
    $date_to = $_POST["date_to"];
    $time_start = $_POST["time_start"];
    $time_end = $_POST["time_end"];

    do {
        if (empty($about) || empty($post) || empty($location) || empty($date_from) ||
            empty($date_to) || empty($time_start) || empty($time_end)) {
            $errorMessage = "All the fields are required";
            break;
        } else {
            // Add new event to the database
            $sql = "INSERT INTO event (about, post, location, date_from, date_to, time_start, time_end) " .
                "VALUES ('$about', '$post', '$location', '$date_from', '$date_to', '$time_start', '$time_end')";
            if ($conn->query($sql) === false) {
                $errorMessage = "Invalid query: " . $conn->error;
            } else {
                $eventId = $conn->insert_id;

                // Add new announcement to the database
                $sql = "INSERT INTO event_announcement (event_id) " .
                    "VALUES ('$eventId')";
                if ($conn->query($sql) === false) {
                    $errorMessage = "Invalid query: " . $conn->error;
                } else {
                    // Send email to residents
                    require '../includes/PHPMailer/src/Exception.php';
                    require '../includes/PHPMailer/src/PHPMailer.php';
                    require '../includes/PHPMailer/src/SMTP.php';

                    $sql = "SELECT * FROM `resident_account`";
                    $result = $conn->query($sql);

                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $email = $row['email'];

                            $message = "<h1>$about</h1>
                                <h4>Location: $location<br>Date From: $date_from<br>Date To: $date_to <br>Time Start: $time_start<br>Time End: $time_end </h4>
                                <p style='font-size: 280%'>$post</p>";

                            $mail = new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'tt9951053@gmail.com'; // Replace with your Gmail address
                            $mail->Password = 'iomxjvuvkydzqanr'; // Replace with your Gmail password
                            $mail->Port = 465;
                            $mail->SMTPSecure = 'ssl';
                            $mail->isHTML(true);
                            $mail->setFrom('tt9951053@gmail.com', "Barangay");
                            $mail->addAddress($email);
                            $mail->Subject = "Announcement";
                            $mail->Body = $message;

                            try {
                                $mail->send();
                            } catch (Exception $e) {
                                $_SESSION['flashdata']['type'] = 'danger';
                                $_SESSION['flashdata']['msg'] = 'An error occurred while sending the email. Error: ' . $e->getMessage();
                            }
                        }
                    }

                    $successMessage = "Event added correctly!";
                    header("location: event_announcements.php");
                    exit;
                }
            }
        }
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/brgylogo.png">
    <title>Barangay 35 | Add Household</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container my-5" style="background-color: lightviolet">
    <div class="d-flex align-self-center justify-content-center">
        <h2>Add General Announcement</h2>
    </div>
    <?php
    if (!empty($errorMessage)) {
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
    ?>
    <div class="d-flex align-self-center justify-content-center">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Event about:</label>
                <input type="text" class="form-control" name="event" value="<?php echo $head_family; ?>">
            </div>
            <div class="row mb-3">
                <label for="" class="control-label">Date From:</label>
                <input type="date" class="form-control" name="date_from">
                <label for="" class="control-label">Date To:</label>
                <input type="date" class="form-control" name="date_to">
            </div>
            <div class="row mb-3">
                <label for="" class="control-label">Time Start:</label>
                <input type="time" class="form-control" name="time_start">
                <label for="" class="control-label">Time End:</label>
                <input type="time" class="form-control" name="time_end">
            </div>
            <div class="row mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="posting" rows="3"></textarea>
            </div>
            <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Location:</label>
                <input type="text" class="form-control" name="location" value="<?php echo $head_family; ?>">
            </div>
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>   
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="event_announcements.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
