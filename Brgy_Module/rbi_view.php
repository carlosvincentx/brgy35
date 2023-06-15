
<?php

include "../includes/config.php";
$fullname ="";
$address_no = "";
$date_registered ="";
$type_household ="";
$yearStay = "";
$street_name ="";
$placeBirth = "";
$dateBirth = "";
$age = "";  
$sex= "";
$civilStatus ="";
$voter ="";
$citezenship = "";
$occupation = "";
$categories = "";
$yearStay = "";
$errorMessage = "";
$successMessage = "";
if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method: Show the data of the household

    if ( !isset($_GET["household_no"])) {
        header("location: rbi.php");
        exit;
    }

    $household_no = $_GET["household_no"];

    //Read the row of the selected household from database table
    $sql = "SELECT * FROM head_family,rbi WHERE head_id=$household_no and head_family.rbi_id=rbi.rbi_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: rbi.php");
        exit;
    }

    $fullname =$row["fullname"];
$address_no = $row["address_no"];
$date_registered = $row["date_registered"];
$type_household =$row["type_household"];
$yearStay = $row["yearStay"];

$street_name =$row["street_name"];
$placeBirth = $row["placeBirth"];
$dateBirth = $row["dateBirth"];
$age = $row["age"];  
$sex= $row["sex"];
$civilStatus =$row["civilStatus"];
$voter =$row["voter"];
$citezenship = $row["citezenship"];
$occupation = $row["occupation"];
$categories = $row["categories"];
$yearStay = $row["yearStay"];
 
}
else {
  $fullname = $_POST["fullname"];
$date_registered = $_POST["date_registered"];
$type_household = $_POST["type_household"];
$yearStay = $_POST["yearStay"];
$address_no = $_POST["address_no"];
$street_name = $_POST["streetName"];
$placeBirth = $_POST["placeBirth"];
$dateBirth = $_POST["datebirth"];
$age = $_POST["age"];  
$sex= $_POST["sex"];
$civilStatus = $_POST["civilStatus"];
$voter = $_POST["voter"];
$citezenship = $_POST["citezenship"];
$occupation = $_POST["occupation"];
$categories = $_POST["categories"];

do {
    if ( empty($fullname ) ||  empty($date_registered) ||   empty($type_household) ||   empty($address_no) || empty($street_name) || empty($placeBirth) ||
        empty( $dateBirth) || empty($age) || empty($sex) || empty($civilStatus) ||
        empty( $voter) || empty( $citezenship ) || empty( $occupation ) ||   empty($yearStay) ||  empty($categories) ) {
        $errorMessage = "All the fields are required";
        break;
    }

    $household_no = $_GET["household_no"];

    // Update Household in Database
    $sql = "UPDATE head_family
            JOIN rbi ON head_family.rbi_id = rbi.rbi_id 
            SET fullname='$fullname',
                type_household='$type_household',
                date_registered='$date_registered',
                yearStay='$yearStay',
                address_no='$address_no',
                street_name='$street_name',
                placeBirth='$placeBirth',
                dateBirth='$dateBirth',
                age='$age',
                sex='$sex',
                civilStatus='$civilStatus',
                voter='$voter',
                citezenship='$citezenship',
                occupation='$occupation',
                categories='$categories'
            WHERE head_id='$household_no'";
              
    $result = $conn->query($sql);
    
    if (!$result) {
      header("Location: error.php");    break;
    }

  // Update beneficiaries table
foreach ($_POST["Fullname"] as $key => $value) {
  // Validate user input
  $fullname = trim($_POST["Fullname"][$key]);
  $address_no = trim($_POST["Address"][$key]);
  $street_name = trim($_POST["StreetName"][$key]);
  $placeBirth = trim($_POST["PlaceBirth"][$key]);
  $dateBirth = trim($_POST["DateBirth"][$key]);
  $age = trim($_POST["Age"][$key]);
  $sex = trim($_POST["Sex"][$key]);
  $civil = trim($_POST["Civil"][$key]);
  $voter = trim($_POST["Voter"][$key]);
  $citezenship = trim($_POST["citezenship"][$key]);
  $occupation = trim($_POST["Occupation"][$key]);

  // Check if the age is a valid number
  if (!is_numeric($age)) {
      $errorMessage = "Invalid age: $age";
      break;
  }

  // Prepare and execute the update statement
  $stmt = $conn->prepare("UPDATE beneficiaries
  JOIN rbi ON beneficiaries.rbi_id = rbi.rbi_id 
  SET 
      fullname=?,
      
      address_no=?,
      street_name=?,
      placeBirth=?,
      dateBirth=?,
      age=?,
      sex=?,
      civilStatus=?,
      voter=?,
      citezenship=?,
      occupation=?
  WHERE beneficiaries.head_id=$household_no");
if (!$stmt) {
die("Error in SQL: " . $conn->error);
}
$stmt->bind_param("sssssssssss", $fullname, $address_no, $street_name, $placeBirth, $dateBirth, $age, $sex, $civil, $voter, $citezenship, $occupation);
$result = $stmt->execute();

  // Check if the update was successful
  if (!$result){
    header("Location: error.php");   break;
  }
}

// Update Immediate table
foreach ($_POST["ImmediateFullname"] as $key => $value) {
  // Validate user input
  $fullname = trim($_POST["ImmediateFullname"][$key]);
  $address_no = trim($_POST["ImmediateAddress"][$key]);
  $street_name = trim($_POST["ImmediateStreetName"][$key]);
  $placeBirth = trim($_POST["ImmediatePlaceBirth"][$key]);
  $dateBirth = trim($_POST["ImmediateDateBirth"][$key]);
  $age = trim($_POST["ImmediateAge"][$key]);
  $sex = trim($_POST["ImmediateSex"][$key]);
  $civil = trim($_POST["ImmediateCivil"][$key]);
  $voter = trim($_POST["ImmediateVoter"][$key]);
  $citizenship = trim($_POST["ImmediateCitizenship"][$key]);
  $occupation = trim($_POST["ImmediateOccupation"][$key]);

  // Check if the age is a valid number
  if (!is_numeric($age)) {
      $errorMessage = "Invalid age: $age";
      break;
  }

  // Prepare and execute the update statement
  $stmt = $conn->prepare("UPDATE immediatemember
    JOIN rbi ON immediatemember.rbi_id = rbi.rbi_id 
    SET 
        fullname=?,
        address_no=?,
        street_name=?,
        placeBirth=?,
        dateBirth=?,
        age=?,
        sex=?,
        civilStatus=?,
        voter=?,
        citizenship=?,
        occupation=?
    WHERE immediatemember.head_id=?");
  if (!$stmt) {
    die("Error in SQL: " . $conn->error);
  }
  $stmt->bind_param("sssssssssssi", $fullname, $address_no, $street_name, $placeBirth, $dateBirth, $age, $sex, $civil, $voter, $citizenship, $occupation, $_POST["ImmediateHeadId"]);
  $result = $stmt->execute();

  // Check if the update was successful
  if (!$result){
    header("Location: error.php");  break;
  }
}

  

  

    $successMessage = "Household updated successfully!";

        header("location:  rbi.php");
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
    <title>Barangay 35 | Edit Household</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        
 
</style>

</head>

<body style="margin:50px">
     <h2>View Household</h2>



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

        

<form method="post">



        <div class="row mb-3">

    <div class="form-group col-md-4">
      <label  for="fullname">Fullname</label>
      <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" readonly>
    </div>

    <div class="form-group col-md-4">
      <label  for="age">Age</label>
      <input type="number" class="form-control" name="age" value="<?php echo $age; ?>" min="0" readonly>
    </div>

  
    <div class="form-group col-md-3">
      <label for="dateBirth">Date of Birth</label>
			<input type="date" class="form-control" name="datebirth" value="<?php echo $dateBirth; ?>" readonly>
    </div>

    <div class="form-group col-md-4">

  
  <label for="type_household">Type of Household</label>
  <input type="text" class="form-control" name="datebirth" value="<?php echo $type_household; ?>" readonly>
      </div>


    <div class="form-group col-md-4">
      <label  for="yearStay">Year of Stay</label>
      <input type="number" class="form-control" name="yearStay" value="<?php echo $yearStay; ?>" min="0" readonly >
    </div>

    <div class="form-group col-md-4">
      <label  for="date_registered">Date Registered</label>
      <input type="date" class="form-control" name="date_registered" value="<?php echo $date_registered; ?>"  readonly>
    </div>


 
    <div class="form-group col-md-5">
      <label for="address_no">Address</label>
      <input type="text" class="form-control" name="address_no" placeholder="1234 Main St" value="<?php echo $address_no; ?>" readonly>
    </div>

  <div class="form-group col-md-5">
    <label for="streetName">Street Name</label>
    <input type="text" class="form-control" name="streetName" value="<?php echo $street_name; ?>" readonly>
  </div>
  <div class="form-group col-md-5">
    <label for="placeBirth">Place of Birth</label>
    <input type="text" class="form-control" name="placeBirth" value="<?php echo $placeBirth; ?>" readonly>
  </div>

    <div class="form-group col-md-2">
      <label for="sex">Sex</label>
      <select id="sex" name="sex" class="form-control"  readonly>
      <?php

if($sex == "Female")
{
   echo "<option ></option>";
   echo "<option value='<?php echo $sex; ?>'>Female</option>";
   echo "<option selected value='Male'>Male</option>"; 
}else if($sex == "Male")
{
   echo "<option ></option>";
   echo "<option selected value='Female'>Female</option>";
   echo "<option value='<?php echo $sex; ?>'>Male</option>"; 
}
?>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="civilStatus">Civil Status</label>
      <select id="civilStatus" name="civilStatus" class="form-control" readonly>
  
<?php

        if($civilStatus == "Single")
        {
           echo "<option ></option>";
           echo "<option value='<?php echo $civilStatus; ?>'>Single</option>";
           echo "<option selected value='Married'>Married</option>"; 
        }else if($civilStatus == "Married")
        {
           echo "<option ></option>";
           echo "<option selected value='Single'>Single</option>";
           echo "<option value='<?php echo $civilStatus; ?>'>Married</option>"; 
        }
?>

      </select>
    </div>


    <div class="form-group col-md-2">
      <label for="categories">Categories</label>
      <select id="civilStatus" name="categories" class="form-control" readonly>

 

        
<?php

if($categories == "PWD")
{
   echo "<option ></option>";
   echo "<option value='N/A'>N/A</option>"; 
   echo "<option value='<?php echo $$categories ; ?>' selected>PWD</option>";
   echo "<option   value='Senior Citezen'>Senior Citizen</option>"; 
}else if($categories == "Senior Citezen")
{
   echo "<option ></option>";
   echo "<option value='N/A'>N/A</option>"; 
   echo "<option   value='PWD'>PWD</option>";
   echo "<option value='<?php echo $$categories ; ?>' selected>Senior Citizen</option>"; 
}else if($categories == "N/A")
{
   echo "<option ></option>";
   echo "<option selected value='<?php echo $$categories ; ?>' selected>N/A</option>"; 
   echo "<option  value='PWD'>PWD</option>";
   echo "<option  value='Senior Citezen'>Senior Citizen</option>"; 
}else{
    echo "<option ></option>";
    echo "<option value='N/A'>N/A</option>"; 
    echo "<option selected value='PWD'>PWD</option>";
    echo "<option value='Senior Citezen'>Senior Citizen</option>"; 
}
?>


      </select>
    </div>



    <div class="form-group col-md-3">
      <label for="voter">Voter / Non-Voter</label>
      <input type="text" class="form-control" name="voter" value="<?php echo $voter; ?>" readonly>
    </div>


  <div class="form-group col-md-3">
      <label for="citezenship">Citizenship</label>
      <input type="text" class="form-control" name="citezenship" value="<?php echo $citezenship; ?>" readonly>

  </div>

  <div class="form-group col-md-3">
      <label for="occupation">occupation</label>
      <input type="text" class="form-control" name="occupation" value="<?php echo $occupation; ?>" readonly>
  </div>


</div>

  <?php
// Fetch beneficiaries data based on rbi_id and head_id
$sql = "SELECT * 
        FROM beneficiaries b
        INNER JOIN rbi r ON b.rbi_id = r.rbi_id
        WHERE  b.head_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $household_no);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if there are beneficiaries data
if (mysqli_num_rows($result) > 0) {
  echo '<table id="myTable" border="1"  >';
  echo '<thead>';
  echo '<tr>';
  echo '<th colspan="11" style="text-align:center; font-size:24px;">Beneficiaries</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<th>Fullname</th>';
  echo '<th>Street Name</th>';
  echo '<th>Address</th>';
  echo '<th>Place of birth</th>';
  echo '<th>Date of birth</th>';
  echo '<th>Age</th>';
  echo '<th>Sex</th>';
  echo '<th>Civil Status</th>';
  echo '<th>Voter / Non Voter</th>';
  echo '<th>Citizenship</th>';
  echo '<th>Occupation</th>   <th>Date of Registered</th>
  <th>Year of Stay</th>
  <th>Categories </th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  // Display beneficiaries data in table
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo "<td><input type='text' style='width:150px' name='Fullname[]' value='" . $row['fullname'] . "' readonly></td>";
    echo "<td><input type='text' style='width:150px' name='StreetName[]' value='" . $row['street_name'] . "' readonly></td>";
    echo "<td><input type='text' style='width:150px' name='Address[]' value='" . $row['address_no'] . "' readonly></td>";
    echo "<td><input type='text' style='width:150px' name='PlaceBirth[]' value='" . $row['placeBirth'] . "' readonly></td>";
    echo "<td><input type='date' style='width:150px' name='DateBirth[]' value='" . $row['dateBirth'] . "' readonly></td>";
    echo "<td><input type='text' style='width:50px' name='Age[]' value='" . $row['age'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:50px' name='Sex[]' value='" . $row['sex'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='civilStatus[]' value='" . $row['civilStatus'] . "' readonly></td>";

   

    echo "<td><input type='text' style='width:150px' name='Voter[]' value='" . $row['voter'] . "' readonly></td>";
    echo "<td><input type='text' style='width:150px' name='Citizenship[]' value='" . $row['citezenship'] . "' readonly></td>";
    echo "<td><input type='text' style='width:150px' name='Occupation[]' value='" . $row['occupation'] . "' readonly></td>";
    echo "   <td><input type='text' name='Register[]' value='" . $row['date_registered'] . "' style='width:150px' readonly></td>
    <td><input type='text' name='Year[]'  value='" . $row['yearStay'] . "' style='width:100px' readonly></td>

   
  <td><input type='text'  style='width:88px' name='Categories[]' value='" . $row['categories'] . "' readonly></td>";
 
    echo "<td><input type='text' name='RBIID[]' value='" . $row['b_id'] . "' hidden></td>";

    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
}
?>


  <?php
// Fetch beneficiaries data based on rbi_id and head_id
$sql = "SELECT * 
        FROM immediatemember b
        INNER JOIN rbi r ON b.rbi_id = r.rbi_id
        WHERE  b.head_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $household_no);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if there are beneficiaries data
if (mysqli_num_rows($result) > 0) {
  echo '<table id="ImmediatemyTable" border="1">';
  echo '<thead>';
  echo '<tr>';
  echo '<th colspan="11" style="text-align:center; font-size:24px;">Immediate Members</th>';
  echo '</tr>';
  echo '<tr>';
  echo '<th>Fullname</th>';
  echo '<th>Street Name</th>';
  echo '<th>Address</th>';
  echo '<th>Place of birth</th>';
  echo '<th>Date of birth</th>';
  echo '<th>Age</th>';
  echo '<th>Sex</th>';
  echo '<th>Civil Status</th>';
  echo '<th>Voter / Non Voter</th>';
  echo '<th>Citizenship</th>';
  echo '<th>Occupation</th>
  <th>Date of Registered</th>
  <th>Year of Stay</th>
  <th>Categories </th>  ';

  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  // Display beneficiaries data in table
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo "<td><input type='text'  style='width:150px' name='ImmediateFullname[]' value='" . $row['fullname'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediateStreetName[]' value='" . $row['street_name'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediateAddress[]' value='" . $row['address_no'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediatePlaceBirth[]' value='" . $row['placeBirth'] . "' readonly></td>";
    echo "<td><input type='date'  style='width:150px' name='ImmediateDateBirth[]' value='" . $row['dateBirth'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:50px' name='ImmediateAge[]' value='" . $row['age'] . "' readonly></td>";

    echo "<td><input type='text'  style='width:50px' name='ImmediateSex[]' value='" . $row['sex'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediatecivilStatus[]' value='" . $row['civilStatus'] . "' readonly></td>";

    echo "<td><input type='text'  style='width:150px' name=' ImmediateVoter[]' value='" . $row['voter'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediateCitizenship[]' value='" . $row['citezenship'] . "' readonly></td>";
    echo "<td><input type='text'  style='width:150px' name='ImmediateOccupation[]' value='" . $row['occupation'] . "' readonly></td>";
    echo "   <td><input type='text' name='ImmediateRegister[]' value='" . $row['date_registered'] . "' style='width:150px' readonly></td>
    <td><input type='text' name='ImmediateYear[]'  value='" . $row['yearStay'] . "' style='width:100px' readonly></td>

  <td><input type='text'  style='width:88px' name='ImmediateCategories[]' value='" . $row['categories'] . "' readonly></td>";
    echo "<td><input type='text' name='ImmediateRBIID[]' value='" . $row['im_id'] . "' hidden></td>";

    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
}

?>

	
  

  
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
            <div class="col-sm-3 d-grid" style="margin: 0 auto; text-align: center;">
    <a style="margin-top: 20px" class="btn btn-outline-primary" href="rbi.php" role="button">Back</a>
</div>

            </div>
        </form>
    </div>
</body>
</html>