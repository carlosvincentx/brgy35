<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "brgy_db";

// Creates Connection
$connection = new mysqli($servername, $username, $password, $database);

$about ="";
$post= "";
$location = "";
$date_from ="";
$date_to= "";
$time_start = "";
$time_end = "";
$household_no = $_GET["household_no"];


$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the household

    if ( !isset($_GET["household_no"])) {
        header("location: /brgy/resident_announcements.php");
        exit;
    }

    $household_no = $_GET["household_no"];

    //Read the row of the selected household from database table
    $sql = "SELECT * FROM event WHERE id=$household_no";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: http://localhost/brgy/Brgy_Module/resident_announcements.php");
        exit;
    }

    $about = $row["about"];
$post=  $row["post"];
$location =  $row["location"];
$date_from = $row["date_from"];
$date_to= $row["date_to"];
$time_start = $row["time_start"];
$time_end = $row["time_end"];


}
else {
    //POST method: Update the data of the household

    $about = $_POST["event"];
    $post= $_POST["posting"];
    $location = $_POST["location"];
    $date_from = $_POST["date_from"];
    $date_to= $_POST["date_to"];
    $time_start = $_POST["time_start"];
    $time_end = $_POST["time_end"];
    do {
        if ( empty($about) || empty($post) || empty( $location) || empty($date_from) ||
        empty($date_to) || empty(  $time_start ) || empty(  $time_end )) {
            $errorMessage = "All the fields are required";
            break;
        }

       
        $sql = "UPDATE event SET about='$about', post='$post', location='$location', date_from='$date_from', date_to='$date_to', time_start='$time_start', time_end='$time_end' WHERE id=$household_no";
      
        $result = $connection->query($sql);
        
        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }



        $successMessage = "Event updated successfully!";


        
        header("location: http://localhost/brgy/Brgy_Module/resident_announcements.php");
        exit;
    } while (false);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "./img/brgylogo.png">
    <title>Barangay 35 | Add Household</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <div class="container my-5" style="background-color:lightviolet">
     <div class="d-flex align-self-center justify-content-center">
  
        <h2>Edit a Resident Announcement</h2>
</div>
        <?php
        if ( !empty($errorMessage)) {
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
    <label class="col-sm-3 col-form-label">Resident:</label>
    <div class="col-sm-8">
        <div class="input-group">
            <input list="resident_list" class="form-control" id="resident_id" name="resident_id">
            <datalist id="resident_list">
                <option value="">Select Resident</option>
                <?php
                // Fetch the resident ID and name data from the database
                $sql = "SELECT id, username FROM resident_account";
                $result = mysqli_query($connection, $sql);

                // Loop through the results and create the datalist options
                while ($row = mysqli_fetch_assoc($result)) {
                    $resident_id = $row['id'];
                    $resident_name = $row['username'];
                    echo "<option value='$resident_id' data-value='$resident_id'>$resident_name</option>";
                }
                ?>
            </datalist>
        </div>
    </div>
</div>

        <div class="row mb-3">
                <label class ="col-sm-6 col-form-label">Event about : </label>
             
                    <input type="text" class= "form-control" name="event" value="<?php echo   $about; ?>">
              
            </div>

  


 

            <div class="row mb-3">
					<label for="" class="control-label">Date From :</label>
					<input type="date" class="form-control" name="date_from" value="<?php echo $date_from; ?>" >
		
					<label for="" class="control-label">Date To :</label>
					<input type="date" class="form-control" name="date_to" value="<?php echo $date_to; ?>" >
				</div>
                <div class="row mb-3">
					<label for="" class="control-label">Time Start :</label>
					<input type="time" class="form-control" name="time_start" value="<?php echo $time_start; ?>">
			 
					<label for="" class="control-label">Time End :</label>
					<input type="time" class="form-control" name="time_end" value="<?php echo $time_end; ?>">
				</div>

                <div class="row mb-3">
           
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="posting" rows="3" value="<?php echo $post; ?>"><?php echo $post; ?> </textarea>

            </div>

             
            <div class="row mb-3">
                <label class ="col-sm-6 col-form-label">Location :</label>
               
                    <input type="text" class= "form-control" name="location" value="<?php echo $location; ?>">
              
            </div>

            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class = 'row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-sucess alert-dismissable fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label></button>
                        </div>
                    </div>
                </div>   
                ";
            }
            ?>
            <div class="row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="http://localhost/brgy/Brgy_Module/resident_announcements.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div></div>
</body>
</html>