<?php

include "../includes/config.php";
$fullname ="";
$address_no = "";
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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 
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
  $rbi_id;
  $sql = "SELECT COUNT(*) AS count FROM rbi WHERE fullname = '$fullname'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $count = $row['count'];
  
  if ($count > 0) {
    $errorMessage = "Already have an existing record";
    exit;
  }
        $sql = "INSERT INTO rbi (fullname,type_household,date_registered,yearStay,address_no,street_name,placeBirth,dateBirth,age,sex,civilStatus,voter,
        citezenship,occupation,categories)" .
                "VALUES (' $fullname','  $type_household','$date_registered','$yearStay', '$address_no', ' $street_name', ' $placeBirth',
                '$dateBirth', '$age', '$sex', '$civilStatus', ' $voter', ' $citezenship ',
                 '$occupation', '$categories')";
  //     $result = $conn->query($sql);


  if (mysqli_query($conn, $sql)) {
    // Get the ID of the newly created data
    $rbi_id = mysqli_insert_id($conn);
} else {
  header("Location: error.php");
}

      // if (!$result){
     //   $errorMessage = "Invalid query: " . $conn->error;
   //     break;
  //  }

 
// Then, create the head_family entry
$sql = "INSERT INTO head_family (rbi_id) VALUES ('$rbi_id')";
$result = $conn->query($sql);

if (!$result){
  header("Location: error.php");
  break;
}


foreach ($_POST["Fullname"] as $key => $value) {
  $Fullname = isset($_POST["Fullname"][$key]) ? $_POST["Fullname"][$key] : '';
  $date_registered = isset($_POST["Register"][$key]) ? $_POST["Register"][$key] : '';
  $yearStay = isset($_POST["Year"][$key]) ? $_POST["Year"][$key] : '';
 
  $Address = isset($_POST["Address"][$key]) ? $_POST["Address"][$key] : '';
  $StreetName = isset($_POST["StreetName"][$key]) ? $_POST["StreetName"][$key] : '';
  $PlaceBirth = isset($_POST["PlaceBirth"][$key]) ? $_POST["PlaceBirth"][$key] : '';
  $DateBirth = isset($_POST["DateBirth"][$key]) ? $_POST["DateBirth"][$key] : '';
  $Age = isset($_POST["Age"][$key]) ? $_POST["Age"][$key] : '';
  $Sex = isset($_POST["Sex"][$key]) ? $_POST["Sex"][$key] : '';
  $Civil = isset($_POST["Civil"][$key]) ? $_POST["Civil"][$key] : '';
  $Voter = isset($_POST["Voter"][$key]) ? $_POST["Voter"][$key] : '';
  $Citezenship = isset($_POST["Citezenship"][$key]) ? $_POST["Citezenship"][$key] : '';
  $Occupation = isset($_POST["Occupation"][$key]) ? $_POST["Occupation"][$key] : '';
  $categories = isset($_POST["Categories"][$key]) ? $_POST["Categories"][$key] : '';

  if (!empty($Fullname) && !empty($Address) && !empty($StreetName) && !empty($PlaceBirth) && !empty($DateBirth) && !empty($Age) && !empty($Sex) && !empty($Civil) && !empty($Voter) && !empty($Citezenship) && !empty($Occupation)) {
    mysqli_stmt_bind_param($stmt, "ssssssssssssss",$Fullname,$date_registered,  $yearStay ,
    $Address,$StreetName,$PlaceBirth,$DateBirth,
    $Age,$Sex,$Civil,$Voter,$Citezenship,$Occupation,  $categories);
    mysqli_stmt_execute($stmt);

    // Get the ID of the newly created RBI entry
    $rbi_id = mysqli_insert_id($conn);
    $sql = "INSERT INTO beneficiaries (rbi_id, head_id) VALUES ('$rbi_id', '$head_id')";
    $result = $conn->query($sql);

    if (!$result){
      header("Location: error.php");
        break;
    }
  }
}


// Get the ID of the newly created head_family entry
$head_id = mysqli_insert_id($conn);
  
if (!empty($_POST["Fullname"])) {
  // First, create the RBI entry
  $sql = "INSERT INTO rbi (fullname,date_registered,yearStay,address_no,street_name,placeBirth,dateBirth,age,sex,civilStatus,voter,
  citezenship,occupation,categories)".
          "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Loop through the submitted data and execute the SQL statement for each row
  foreach ($_POST["Fullname"] as $key => $value) {
      $Fullname = $_POST["Fullname"][$key];
      $date_registered = $_POST["Register"][$key];
      $yearStay = $_POST["Year"][$key];
     
      $Address = $_POST["Address"][$key];
      $StreetName = $_POST["StreetName"][$key];
      $PlaceBirth = $_POST["PlaceBirth"][$key];
      $DateBirth = $_POST["DateBirth"][$key];
      $Age = $_POST["Age"][$key];
      $Sex = $_POST["Sex"][$key];
      $Civil = $_POST["Civil"][$key];
      $Voter = $_POST["Voter"][$key];
      $Citezenship = $_POST["Citizenship"][$key];
      $Occupation = $_POST["Occupation"][$key];
      $categories =$_POST["Categories"][$key];

      mysqli_stmt_bind_param($stmt, "ssssssssssssss",$Fullname, $date_registered ,  $yearStay ,
      $Address,$StreetName,$PlaceBirth,$DateBirth,
      $Age,$Sex,$Civil,$Voter,$Citezenship,$Occupation, $categories );
      mysqli_stmt_execute($stmt);

      // Get the ID of the newly created RBI entry
      $rbi_id = mysqli_insert_id($conn);
      $sql = "INSERT INTO beneficiaries (rbi_id, head_id) VALUES ('$rbi_id', '$head_id')";
      $result = $conn->query($sql);

      if (!$result){
        header("Location: error.php");
        break;
      }
  }
}


if (!empty($_POST["Fullname"])) {
  $sql = "INSERT INTO rbi (fullname,date_registered,yearStay,address_no,street_name,placeBirth,dateBirth,age,sex,civilStatus,voter,
  citezenship,occupation,categories)".
          "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);

// Loop through the submitted data and execute the SQL statement for each row
foreach ($_POST["ImmediateFullname"] as $key => $value) {
  $Fullname = $_POST["ImmediateFullname"][$key];
  $date_registered =$_POST["ImmediateRegister"][$key];
  $yearStay =$_POST["ImmediateYear"][$key];
 
  $Address = $_POST["ImmediateAddress"][$key];
  $StreetName = $_POST["ImmediateStreetName"][$key];
  $PlaceBirth = $_POST["ImmediatePlaceBirth"][$key];
  $DateBirth = $_POST["ImmediateDateBirth"][$key];
  $Age = $_POST["ImmediateAge"][$key];
  $Sex = $_POST["ImmediateSex"][$key];
  $Civil = $_POST["ImmediateCivil"][$key];
  $Voter = $_POST["ImmediateVoter"][$key];
  $Citezenship = $_POST["ImmediateCitezenship"][$key];
  $Occupation = $_POST["ImmediateOccupation"][$key];
  $categories =$_POST["ImmediateCategories"][$key];

  mysqli_stmt_bind_param($stmt, "ssssssssssssss",$Fullname, $date_registered ,  $yearStay,
  $Address,$StreetName,$PlaceBirth,$DateBirth,
  $Age,$Sex,$Civil,$Voter,$Citezenship,$Occupation, $categories);
  mysqli_stmt_execute($stmt);

  // Get the ID of the newly created RBI entry
  $rbi_id = mysqli_insert_id($conn);
  $sql = "INSERT INTO immediatemember (rbi_id, head_id) VALUES ('$rbi_id', '$head_id')";
  $result = $conn->query($sql);

  if (!$result){
    header("Location: error.php");
    break;
  }
}
}

// Close the statement and conn
mysqli_stmt_close($stmt);
mysqli_close($conn);



        $head_family = "";
        $type_household = "";
        $year_stay = "";
        $street = "";

        $successMessage = "Household added correctly!";
        
        header("location: rbi.php?id=".$rbi_id);
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



    <div class="container my-5" style="justify-content:center;margin:30px">



  <h2>Add Household</h2>


       
        

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
      <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>" >
    </div>

    <div class="form-group col-md-4">
      <label  for="age">Age</label>
      <input type="number" class="form-control" name="age" value="<?php echo $age; ?>" min="0">
    </div>

  
    <div class="form-group col-md-3">
      <label for="dateBirth">Date of Birth</label>
			<input type="date" class="form-control" name="datebirth" value="<?php echo $dateBirth; ?>">
    </div>

    <div class="form-group col-md-4">
      <label for="type_household">Type of Household</label>
      <select  name="type_household" class="form-control">
        <option ></option>
        <option value="Sharer">Sharer</option>
        <option value="Owner">Owner</option>
        <option value="Renter">Renter</option>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label  for="yearStay">Year of Stay</label>
      <input type="number" class="form-control" name="yearStay" min="0">
    </div>

    <div class="form-group col-md-4">
      <label  for="date_registered">Date Registered</label>
      <input type="date" class="form-control" name="date_registered">
    </div>


 
    <div class="form-group col-md-5">
      <label for="address_no">Address</label>
      <input type="text" class="form-control" name="address_no" placeholder="1234 Main St" value="<?php echo $address_no; ?>">
    </div>

  <div class="form-group col-md-5">
    <label for="streetName">Street Name</label>
    <input type="text" class="form-control" name="streetName" value="<?php echo $street_name; ?>">
  </div>
  <div class="form-group col-md-5">
    <label for="placeBirth">Place of Birth</label>
    <input type="text" class="form-control" name="placeBirth" value="<?php echo $placeBirth; ?>">
  </div>

    <div class="form-group col-md-2">
      <label for="sex">Sex</label>
      <select id="sex" name="sex" class="form-control">
        <option ></option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="civilStatus">Civil Status</label>
      <select id="civilStatus" name="civilStatus" class="form-control">
        <option ></option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
      </select>
    </div>


    <div class="form-group col-md-2">
      <label for="categories">Categories</label>
      <select  name="categories" class="form-control">
        <option > </option>
        <option value="N/A">N/A</option>
        <option value="PWD">PWD</option>
        <option value="Senior Citezen">Senior Citizen</option>
      </select>
    </div>



    <div class="form-group col-md-3">
      <label for="voter">Voter / Non-Voter</label>
      <input type="text" class="form-control" name="voter" value="<?php echo $voter; ?>">
    </div>


  <div class="form-group col-md-3">
      <label for="citezenship">Citizenship</label>
      <input type="text" class="form-control" name="citezenship" value="<?php echo $citezenship; ?>">

  </div>

  <div class="form-group col-md-3">
      <label for="occupation">Occupation</label>
      <input type="text" class="form-control" name="occupation" value="<?php echo $occupation; ?>">
  </div>
  </div>
         


  <table id="myTable" border="1">
  <thead>
    <tr>
      <th colspan="11" style="text-align:center; font-size:24px;">Beneficiaries</th>
    </tr>
    <tr>
      <th>Full Name</th>
      <th>Street Name</th>
      <th>Address</th>
      <th>Place of Birth</th>
      <th>Date of Birth</th>
      <th>Age</th>
      <th>Sex</th>
      <th>Civil Status</th>
      <th>Voter / Non Voter</th>
      <th>Citizenship</th>
      <th>Occupation</th>
      <th>Date of Registered</th>
      <th>Year of Stay</th>
      <th>Categories </th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" name="Fullname[]" style="width:150px"></td>
      <td><input type="text" name="StreetName[]" style="width:150px"></td>
      <td><input type="text" name="Address[]" style="width:150px"></td>
      <td><input type="text" name="PlaceBirth[]" style="width:150px"></td>
      <td><input type="date" name="DateBirth[]" style="width:150px"></td>
      <td><input type="text" name="Age[]" style="width:50px"></td>
      <td>
        <select name="Sex[]">
          <option></option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
        </select>
      </td>
      <td>
        <select name="Civil[]">
          <option></option>
          <option value="Single">Single</option>
          <option value="Married">Married</option>
        </select>
      </td>
      <td><input type="text" name="Voter[]" style="width:100px"></td>
      <td><input type="text" name="Citizenship[]" style="width:130px"></td>
      <td><input type="text" name="Occupation[]" style="width:130px"></td>
      <td><input type="text" name="Register[]" style="width:80px"></td>
      <td><input type="text" name="Year[]" style="width:50px"></td>
 
      <td>
        <select name="Categories[]">
          <option></option>
          <option value="N/A">N/A</option>
        <option value="PWD">PWD</option>
        <option value="Senior Citezen">Senior Citizen</option>
        </select>
      </td>
      <td>
        <button type="button" onclick="deleteRow(this.parentNode.parentNode)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
<button type="button" onclick="addRow()">Add Row</button>

<script>
  function addRow() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var FullnameCell = row.insertCell(0);
    var StreetNameCell = row.insertCell(1);
    var AddressCell = row.insertCell(2);
    var PlaceBirthCell = row.insertCell(3);
    var DateBirthCell = row.insertCell(4);
    var AgeCell = row.insertCell(5);
    var SexCell = row.insertCell(6);
    var CivilCell = row.insertCell(7);
    var VoterCell = row.insertCell(8);
    var CitezenshipCell = row.insertCell(9);
    var OccupationCell = row.insertCell(10);
    var RegisterCell = row.insertCell(11);
    var YearCell = row.insertCell(12);
    var CategoriesCell = row.insertCell(13);
    var ActionCell = row.insertCell(14);

    FullnameCell.innerHTML = "<input style='width:150px' type='text' name='Fullname[]'>";
    StreetNameCell.innerHTML = "<input style='width:150px' type='text' name='StreetName[]'>";
    AddressCell.innerHTML = "<input style='width:150px' type='text' name='Address[]'>";
    PlaceBirthCell.innerHTML = "<input style='width:150px' type='text' name='PlaceBirth[]'>";
    DateBirthCell.innerHTML = "<input style='width:150px' type='date' name='DateBirth[]'>";
    AgeCell.innerHTML = "<input style='width:50px' type='number' name='Age[]'>";
    SexCell.innerHTML = "<select name='Sex[]'><option></option><option value='Female'>Female</option><option value='Male'>Male</option></select>";
    CivilCell.innerHTML = "<select name='Civil[]'><option></option><option value='Single'>Single</option><option value='Married'>Married</option></select>";
    VoterCell.innerHTML = "<input style='width:100px' type='text' name='Voter[]'>";
    CitezenshipCell.innerHTML = "<input style='width:130px' type='text' name='Citizenship[]'>";
    OccupationCell.innerHTML = "<input style='width:130px' type='text' name='Occupation[]'>";
    RegisterCell.innerHTML = "<input style='width:80px' type='text' name='Register[]'>";
    YearCell.innerHTML = "<input style='width:50px' type='text' name='Year[]'>";
    CategoriesCell.innerHTML = "<select name='Categories[]'><option></option><option value='N/A'>N/A</option>"+
      "<option value='PWD'>PWD</option><option value='Senior Citezen'>Senior Citizen</option></select>";
    
    ActionCell.innerHTML = "<button type='button' onclick='deleteRow(this.parentNode.parentNode)'>Delete</button>";
  }

  function deleteRow(row) {
    var table = document.getElementById("myTable");
    table.deleteRow(row.rowIndex);
  }



function deleteRow2(row) {
    var table = document.getElementById("ImmediatemyTable");
    table.deleteRow(row.rowIndex);
  }
</script>



<table id="ImmediatemyTable" border="1">
			<thead>
      <tr>
  <th colspan="11" style="text-align:center; font-size:24px;">Immediate Members</th>
</tr>

				<tr>
					<th>Fullname</th>
					<th>Street Name</th>
					<th>Address</th>
          <th>Place of birth</th>
					<th>Date of birth</th>
					<th>Age</th>
          <th>Sex</th>
          <th>Civil Status</th>
          <th>Voter / Non Voter</th>
          <th>Citizenship</th>
          <th>Occupation</th>
          <th>Date of Registered</th>
      <th>Year of Stay</th>
      <th>Categories </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" name="ImmediateFullname[]" style='width:150px' ></td>
					<td><input type="text" name="ImmediateStreetName[]" style="width:150px"></td>
					<td><input type="text" name="ImmediateAddress[]"style="width:150px"></td>
          <td><input type="text" name="ImmediatePlaceBirth[]" style="width:150px"></td>
					<td><input type="Date" name="ImmediateDateBirth[]" style="width:150px"></td>
					<td><input type="text" name="ImmediateAge[]" style="width:50px"></td>
    
          <td><select  type="text" name="ImmediateSex[]" >
        <option > </option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
        </select></td>
        
					<td>
          <select  type="text" name="ImmediateCivil[]" >
        <option ></option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
      </select></td>

					<td><input type="text" name="ImmediateVoter[]" style="width:100px"></td>
          <td><input type="text" name="ImmediateCitezenship[]" style="width:130px"></td>
					<td><input type="text" name="ImmediateOccupation[]" style="width:130px"></td>



          <td><input type="text" name="ImmediateRegister[]" style="width:80px"></td>
      <td><input type="text" name="ImmediateYear[]" style="width:50px"></td>
 
      <td>
        <select name="ImmediateCategories[]">
          <option></option>
          <option value="N/A">N/A</option>
        <option value="PWD">PWD</option>
        <option value="Senior Citezen">Senior Citizen</option>
        </select>
      </td>


          <td>

        
        <button type="button" onclick="deleteRow2(this.parentNode.parentNode)">Delete</button>
      </td>
					</tr>
			</tbody>
		</table>
		<button type="button" onclick="addRow2()">Add Row</button>
	 
 

	<script>
		function addRow2() {
			var table = document.getElementById("ImmediatemyTable");
			var row = table.insertRow(-1);
			var ImmediateFullnameCell = row.insertCell(0);
			var ImmediateStreetNameCell = row.insertCell(1);
			var ImmediateAddressCell = row.insertCell(2);
      var ImmediatePlaceBirthCell = row.insertCell(3);
      var ImmediateDateBirthCell = row.insertCell(4);
			var ImmediateAgeCell = row.insertCell(5);
			var ImmediateSexCell = row.insertCell(6);
      var ImmediateCivilCell = row.insertCell(7);
			var ImmediateVoterCell = row.insertCell(8);
			var ImmediateCitezenshipCell = row.insertCell(9);
      var ImmediateOccupationCell = row.insertCell(10);
      var ImmediateRegisterCell = row.insertCell(11);
    var ImmediateYearCell = row.insertCell(12);
    var ImmediateCategoriesCell = row.insertCell(13);
    var ActionCell = row.insertCell(14);

 
      ImmediateFullnameCell.innerHTML = "<input style='width:150px' type='text' name='ImmediateFullname[]'>";
			ImmediateStreetNameCell.innerHTML = "<input style='width:150px' type='text' name='ImmediateStreetName[]'>";
			ImmediateAddressCell.innerHTML = "<input style='width:150px' type='text' name='ImmediateAddress[]'>";
      ImmediatePlaceBirthCell.innerHTML ="<input style='width:150px' type='text' name='ImmediatePlaceBirth[]'>";
			ImmediateDateBirthCell.innerHTML = "<input style='width:150px' type='Date' name='ImmediateDateBirth[]'>";
      ImmediateAgeCell.innerHTML = "<input style='width:50px' type='number' name='ImmediateAge[]'>";

      ImmediateSexCell.innerHTML = "<select  type='text' name='ImmediateSex[]' > <option > </option> "+
        "<option value='Female'>Female</option>"+
        "<option value='Male'>Male</option>"+
       " </select>";

        
       ImmediateCivilCell.innerHTML = "<select  type='text' name='ImmediateCivil[]' >"+
        "<option ></option>"+
        "<option value='Single'>Single</option>"+
        "<option value='Married'>Married</option>"+
      "</select>";

			ImmediateVoterCell.innerHTML = "<input style='width:100px'  type='text' name='ImmediateVoter[]'>";
			ImmediateCitezenshipCell.innerHTML = "<input style='width:130px' type='text' name='ImmediateCitezenship[]'>";
      ImmediateOccupationCell.innerHTML = "<input style='width:130px' type='text' name='ImmediateOccupation[]'>";
      

      ImmediateRegisterCell.innerHTML = "<input style='width:80px' type='text' name='Register[]'>";
      ImmediateYearCell.innerHTML = "<input style='width:50px' type='text' name='Year[]'>";
      ImmediateCategoriesCell.innerHTML = "<select name='Categories[]'><option></option><option value='N/A'>N/A</option>"+
      "<option value='PWD'>PWD</option><option value='Senior Citezen'>Senior Citizen</option></select>";
    


  ActionCell.innerHTML = "<button type='button' onclick='deleteRow2(this.parentNode.parentNode)'>Delete</button>";
  
    
    
    }
	</script>



        
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
                    <a class="btn btn-outline-primary" href="rbi.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>