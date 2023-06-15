<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); 
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";
include "header.php";

?>

<section class="home-section" style="height:180vh;" >
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>



    <div class="container my-5 text-center" style = "background-color:rgba(73,73,73, 0.9); padding:50px; border-radius: 10px;">
        <h2>Record of Barangay Inhabitants by Household</h2>
        <br>

   
<?php
 /*
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

// Check if the form was submitted
if (isset($_FILES['csvFiles'])) {
    $files = $_FILES['csvFiles'];

    // Process each file
    foreach ($files['tmp_name'] as $key => $tmpName) {
        // Check if the file was uploaded successfully
        if ($files['error'][$key] === UPLOAD_ERR_OK) {
            // Get the file extension
            $extension = strtolower(pathinfo($files['name'][$key], PATHINFO_EXTENSION));

            // Check if the file is a CSV
            if ($extension === 'csv') {
                // Load the CSV file using PhpSpreadsheet
                $spreadsheet = IOFactory::load($tmpName);
                $worksheet = $spreadsheet->getActiveSheet();

                // Get the data from the worksheet
                $data = $worksheet->toArray();

                // Skip the header row
                array_shift($data);

                // Process each row of the CSV file
                foreach ($data as $row) {
                    // Verify that the row has enough columns
                    if (count($row) >= 11) {
                        // Assuming the CSV columns are in the format: fullname,address_no,street_name,placeBirth,dateBirth,age,sex,civilStatus,voter,citizenship,occupation
                        $fullname = $row[0];
                        $addressNo = $row[1];
                        $streetName = $row[2];
                        $placeBirth = $row[3];
                        $dateBirth = $row[4];
                        $age = $row[5];
                        $sex = $row[6];
                        $civilStatus = $row[7];
                        $voter = $row[8];
                        $citizenship = $row[9];
                        $occupation = $row[10];

                        // Store the resident data in the database
                        // Assuming you have a database connection ($conn)
                        $sql = "INSERT INTO rbi (fullname, address_no, street_name, placeBirth, dateBirth, age, sex, civilStatus, voter, citizenship, occupation) " .
                            "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param(
                            "sssssssssss",
                            $fullname,
                            $addressNo,
                            $streetName,
                            $placeBirth,
                            $dateBirth,
                            $age,
                            $sex,
                            $civilStatus,
                            $voter,
                            $citizenship,
                            $occupation
                        );
                        $stmt->execute();
                    } else {
                        // Display an error message for the specific file
                        header("Location: error.php");
                        exit();
                    }
                }
            } else {
                // Display an error message for unsupported file types
                // header("Location: error.php");
                exit();
            }
        } else {
            // Display an error message for the specific file
            header("Location: error.php");
            exit();
        }
    }

    // Display a success message
    echo "Files uploaded and resident data stored successfully.";
}*/
?>

<form method="post" enctype="multipart/form-data">
  <div class="container my-5">
    <br>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="category">Select Category:</label>
          <select name="categories" class="form-control">
            <option></option>
            <option value="All">All</option>
            <option value="N/A">N/A</option>
            <option value="PWD">PWD</option>
            <option value="Senior Citizen">Senior Citizen</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="name">Search by Name:</label>
          <input type="text" name="name" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
          <a class="btn btn-primary" href=" create.php" role="button">Add Household</a>
         <input type="file" name="csvFiles[]" class="form-control-file mt-2" enctype="multipart/form-data" multiple>
          <button type="submit" name="importBtn" class="btn btn-primary mt-2">Import CSV</button>
        </div>
      </div>
    </div>
  </div>
</form>




    <div class ="container my-5 text-center">
    <table class = "table">

  <thead>
    <tr>
                <th>Household no.</th>
                <th>Head of the Family</th>
                <th>Type of Household</th>
                <th>Year of Stay</th>
                <th>Street</th>
                <th>Date Registered</th>
                <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $selection = $_POST["categories"];
  $fullname = $_POST["name"];



  if($selection == "All"){

 
    $limit = 10; // Number of records to show per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
    
    // Calculate the offset value
    $offset = ($page - 1) * $limit;
    
  
    $records_per_page = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $records_per_page;
    $sql = "SELECT * FROM head_family, rbi WHERE head_family.rbi_id = rbi.rbi_id LIMIT $offset, $records_per_page";
    $result = $conn->query($sql);
    
    while ($row = $result->fetch_assoc()) {
      echo "
        <tr>
          <td>$row[head_id]</td>
          <td>$row[fullname]</td>
          <td>$row[type_household]</td>
          <td>$row[yearStay]</td>
          <td>$row[street_name]</td>
          <td>$row[date_registered]</td>
          <td>        

                <a class='btn btn-primary btn-sm' href=' rbi_view.php?household_no=$row[head_id]'>View</a>
    
                <a class='btn btn-primary btn-sm' href=' edit.php?household_no=$row[head_id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href=' delete.php?household_no=$row[head_id]'>Delete</a>
           </td>
        </tr>
      ";
    }
    $total_rows = $result->num_rows;
    $total_pages = ceil($total_rows / $limit);
    
    echo "
      <div class='pagination'>
        <ul class='pagination'>
          <li class='page-item " . ($page == 1 ? 'disabled' : '') . "'>
            <a class='page-link' href='?page=" . ($page - 1) . "'>&laquo; Previous</a>
          </li>
    ";
    
    for ($i = 1; $i <= $total_pages; $i++) {
      echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
    }
    
    echo "
          <li class='page-item " . ($page == $total_pages ? 'disabled' : '') . "'>
            <a class='page-link' href='?page=" . ($page + 1) . "'>Next &raquo;</a>
          </li>
        </ul>
      </div>
    ";
    
    
    
 
  }else{


    $limit = 10; // Number of records to show per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
    
    // Calculate the offset value
    $offset = ($page - 1) * $limit;
    
  
    $records_per_page = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $records_per_page;
 // Initialize the base SQL query
  
 $sql = "SELECT *
 FROM head_family, rbi
 WHERE head_family.rbi_id = rbi.rbi_id";

// Check if both category and fullname are provided
if (!empty($selection) && !empty($fullname)) {
// Split the fullname into separate parts
$nameParts = explode(' ', $fullname);
$firstName = $nameParts[0];
$middleName = isset($nameParts[1]) ? $nameParts[1] : '';
$lastName = isset($nameParts[2]) ? $nameParts[2] : '';

// Construct the query using wildcard characters
$sql .= " AND categories = '$selection' AND (fullname LIKE '%$firstName%' AND fullname LIKE '%$middleName%' AND fullname LIKE '%$lastName%')";
}
// Check if only category is provided
elseif (!empty($selection)) {
$sql .= " AND categories = '$selection'";
}
// Check if only fullname is provided
elseif (!empty($fullname)) {
// Split the fullname into separate parts
$nameParts = explode(' ', $fullname);
$firstName = $nameParts[0];
$middleName = isset($nameParts[1]) ? $nameParts[1] : '';
$lastName = isset($nameParts[2]) ? $nameParts[2] : '';

// Construct the query using wildcard characters
$sql .= " AND (fullname LIKE '%$firstName%' AND fullname LIKE '%$middleName%' AND fullname LIKE '%$lastName%')";
}


$sql .= " LIMIT $records_per_page OFFSET $offset";

    $result = $conn->query($sql);
    
    // Read Data of each row
    while($row = $result->fetch_assoc()){    
      echo "
          <tr>
          <td>$row[head_id]</td>
          <td>$row[fullname]</td>
          <td>$row[type_household]</td>
          <td>$row[yearStay]</td>
          <td>$row[street_name]</td>
          <td>$row[date_registered]</td> 
          <td>
           <a class='btn btn-primary btn-sm' href=' rbi_view.php?household_no=$row[head_id]'>View</a>

            <a class='btn btn-primary btn-sm' href=' edit.php?household_no=$row[head_id]'>Edit</a>
            <a class='btn btn-danger btn-sm' href=' edit.php?household_no=$row[head_id]'>Delete</a>
          </td>
        </tr>
      ";
    }
    
    // Pagination links
    $total_rows = $result->num_rows;
    $total_pages = ceil($total_rows / $limit);
    
    echo "
      <div class='pagination'>
        <ul class='pagination'>
          <li class='page-item " . ($page == 1 ? 'disabled' : '') . "'>
            <a class='page-link' href='?page=" . ($page - 1) . "'>&laquo; Previous</a>
          </li>
    ";
    
    for ($i = 1; $i <= $total_pages; $i++) {
      echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
    }
    
    echo "
          <li class='page-item " . ($page == $total_pages ? 'disabled' : '') . "'>
            <a class='page-link' href='?page=" . ($page + 1) . "'>Next &raquo;</a>
          </li>
        </ul>
      </div>
    ";
        


}
} else {
 
  $records_per_page = 10;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page - 1) * $records_per_page;
  
  $sql = "SELECT * FROM head_family, rbi WHERE head_family.rbi_id = rbi.rbi_id LIMIT $offset, $records_per_page";
  $result = $conn->query($sql);
  
  while ($row = $result->fetch_assoc()) {
    echo "
      <tr>
        <td>$row[head_id]</td>
        <td>$row[fullname]</td>
        <td>$row[type_household]</td>
        <td>$row[yearStay]</td>
        <td>$row[street_name]</td>
        <td>$row[date_registered]</td>
        <td>
         

        <a class='btn btn-primary btn-sm' href=' rbi_view.php?household_no=$row[head_id]'>View</a>
    
          <a class='btn btn-primary btn-sm' href=' edit.php?household_no=$row[head_id]'>Edit</a>
          <a class='btn btn-danger btn-sm' href=' delete.php?household_no=$row[head_id]'>Delete</a>
        </td>
      </tr>
    ";
  }

// Count the total number of records
$sql_count = "SELECT COUNT(*) FROM head_family, rbi WHERE head_family.rbi_id=rbi.rbi_id";
$result_count = $conn->query($sql_count);
$total_records = $result_count->fetch_array()[0];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Display the pagination links
if ($total_pages > 1) {
    echo "<nav><ul class='pagination'>";

    // Previous page link
    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
    } else {
        echo "<li class='page-item disabled'><span class='page-link'>&laquo; Previous</span></li>";
    }

    // Page links
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $page) {
            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
        }
    }

    // Next page link
    if ($page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
    } else {
        echo "<li class='page-item disabled'><span class='page-link'>Next &raquo;</span></li>";
    }

    echo "</ul></nav>";

}
}
            ?>
</table>

    </section>

  <script>

  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></html>