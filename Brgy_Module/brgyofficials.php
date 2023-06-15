<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";
include "header.php";

 ?>


<section class="home-section" style="height:130vh;  ">


    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>





 

    <form method="post"  >  
  <div class="container my-5" style="  background-color:rgba(73,73,73, 0.9);padding:50px;">
    <h2 class="text-center">Record of Barangay Officials</h2>
    <br>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="category" style = "color:#fff">Select Category:</label>
          <select name="categories" class="form-control">
          <option></option>
          <option value="">All</option>
            <option value="Chairman">Chairman</option>
            <option value="Secretary">Secretary</option>
            <option value="Kagawad">Kagawad</option>
            <option value="SK Kagawad">SK Kagawad</option>
            <option value="Tanod">Tanod</option>
           </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="name" style = "color:#fff">Search by Name:</label>
          <input type="text" name="name" class="form-control">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group"><br>
        <button type="submit" class="btn btn-primary">Submit</button>

          </div>
      </div>
    </div>

</form>


    <div class ="container my-5 text-center">
    <table class = "table">

  <thead>
    <tr>
    <th>ID</th>
          <th>Position</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Address</th>
          <th>Date of Employment</th>
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

    $records_per_page = 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $records_per_page;
    
    $sql = "SELECT * FROM `brgyofficials`  LIMIT $offset, $records_per_page";
    $result = $conn->query($sql);
    
    while ($row = $result->fetch_assoc()) {
      echo "
          <style>label{color:#494949
        }</style>
      <tr>
      <td>{$row['id']}</td>
      <td>{$row['position']}</td>
      <td>{$row['name']}</td>
      <td>{$row['contact']}</td>
      <td>{$row['address']}</td>
      <td>{$row['date_employment']}</td>
      <td>{$row['date_registered']}</td> 
        <td>
          <!-- Button trigger modal -->
          <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModalLong_$row[id]'>
            View
          </button>

         <div class='modal fade' id='exampleModalLong_$row[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle_$row[id]' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>


                <h5 class='modal-title' style='color:#494949' id='exampleModalLongTitle_$row[id]'>Record of Barangay Inhabitants by Household</h5>
                <button type='button' style='color:#494949' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body'>
                      <form readonly>
                    <div class='row mb-3'>
                      <div class='form-group col-md-4'>
                        <label for='fullname'>Fullname</label>
                        <input type='text' class='form-control text-center' name='fullname' value='$row[name]' readonly>
                      </div>
                 
                      <div class='form-group col-md-4'>
                        <label for='type_household'>Position</label>
                        <input type='text' class='form-control text-center' name='type_household' value='$row[position]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                        <label for='yearStay'>Contact</label>
                        <input type='text' class='form-control text-center' name='yearStay' value='$row[contact]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                      <label for='yearStay'>Address</label>
                      <input type='text' class='form-control text-center' name='yearStay' value='$row[address]' readonly>
                    </div>

        

                      <div class='form-group col-md-4'>
                        <label for='date_registered'>Date Employment</label>
                        <input type='text' class='form-control text-center' name='date_registered' value='$row[date_employment]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                      <label for='date_registered'>Date Registered</label>
     ";
                        $dateRegistered = date('Y-m-d', strtotime($row['date_registered']));
                        
                        echo "   <input type='text' class='form-control text-center' name='date_registered' value='$dateRegistered' readonly>
                    
                    </div>       
                  </form>
                </div>
                </div>
                </div>
                </div>

                <a class='btn btn-primary btn-sm' href='edit_bofficials.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete_bofficials.php?id={$row['id']}'>Delete</a>
         </td>
      </tr>
      ";
    }
    
    $total_records_sql = "SELECT COUNT(*) FROM head_family";
    $total_records_result = $conn->query($total_records_sql);
    $total_records = $total_records_result->fetch_array()[0];
    $total_pages = ceil($total_records / $records_per_page);
    
    // Display pagination links
    echo "<ul class='pagination'>";
    if ($page > 1) {
      echo "<li class='page-item'><a class='page-link' href='http://localhost/brgy/Brgy_Module/rbi.php?page=" . ($page - 1) . "'>&laquo; Previous</a></li>";
    }
    for ($i = 1; $i <= $total_pages; $i++) {
      echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='http://localhost/brgy/Brgy_Module/rbi.php?page=$i'>$i</a></li>";
    }
    if ($page < $total_pages) {
      echo "<li class='page-item'><a class='page-link' href='http://localhost/brgy/Brgy_Module/rbi.php?page=" . ($page + 1) . "'>Next &raquo;</a></li>";
    }
    echo "</ul>";


    
    
 
  }else{


    $limit = 10; // Number of records to show per page
    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number
    
    // Calculate the offset value
    $offset = ($page - 1) * $limit;
    


    $sql = "SELECT *
    FROM `brgyofficials`";

// Check if both category and fullname are provided
if (!empty($selection) && !empty($fullname)) {
// Split the fullname into separate parts
$nameParts = explode(' ', $fullname);
$firstName = $nameParts[0];
$middleName = isset($nameParts[1]) ? $nameParts[1] : '';
$lastName = isset($nameParts[2]) ? $nameParts[2] : '';

// Construct the query using wildcard characters
$sql .= " WHERE position = '$selection' AND (name LIKE '%$firstName%' AND name LIKE '%$middleName%' AND name LIKE '%$lastName%')";
}
// Check if only category is provided
elseif (!empty($selection)) {
$sql .= " WHERE position = '$selection'";
}
// Check if only fullname is provided
elseif (!empty($fullname)) {
// Split the fullname into separate parts
$nameParts = explode(' ', $fullname);
$firstName = $nameParts[0];
$middleName = isset($nameParts[1]) ? $nameParts[1] : '';
$lastName = isset($nameParts[2]) ? $nameParts[2] : '';

// Construct the query using wildcard characters
$sql .= " WHERE name LIKE '%$firstName%' AND name LIKE '%$middleName%' AND name LIKE '%$lastName%'";
}

$sql .= " LIMIT $limit OFFSET $offset";





$result = $conn->query($sql);

    // Read Data of each row
    while($row = $result->fetch_assoc()){    
      echo "
          <style>label{color:#494949
        }</style>
      <tr>
      <td>{$row['id']}</td>
      <td>{$row['position']}</td>
      <td>{$row['name']}</td>
      <td>{$row['contact']}</td>
      <td>{$row['address']}</td>
      <td>{$row['date_employment']}</td>
      <td>{$row['date_registered']}</td> 
        <td>
          <!-- Button trigger modal -->
          <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModalLong_$row[id]'>
            View
          </button>

         <div class='modal fade' id='exampleModalLong_$row[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle_$row[id]' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>


                <h5 class='modal-title' style='color:#494949' id='exampleModalLongTitle_$row[id]'>Record of Barangay Officials</h5>
                <button type='button' style='color:#494949' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body'>
                   <form readonly>
                    <div class='row mb-3'>
                      <div class='form-group col-md-4'>
                        <label for='fullname'>Fullname</label>
                        <input type='text' class='form-control text-center' name='fullname' value='$row[name]' readonly>
                      </div>
                 
                      <div class='form-group col-md-4'>
                        <label for='type_household'>Position</label>
                        <input type='text' class='form-control text-center' name='type_household' value='$row[position]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                        <label for='yearStay'>Contact</label>
                        <input type='text' class='form-control text-center' name='yearStay' value='$row[contact]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                      <label for='yearStay'>Address</label>
                      <input type='text' class='form-control text-center' name='yearStay' value='$row[address]' readonly>
                    </div>

          
                  
                      <div class='form-group col-md-4'>
                        <label for='date_registered'>Date Employment</label>
                        <input type='text' class='form-control text-center' name='date_registered' value='$row[date_employment]' readonly>
                      </div>
                      <div class='form-group col-md-4'>
                      <label for='date_registered'>Date Registered</label>
     ";
                        $dateRegistered = date('Y-m-d', strtotime($row['date_registered']));
                        
                        echo "   <input type='text' class='form-control text-center' name='date_registered' value='$dateRegistered' readonly>
                    
                    </div>        
                  </form>
                </div>
                </div>
                </div>
                </div>


                <a class='btn btn-primary btn-sm' href='edit_bofficials.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete_bofficials.php?id={$row['id']}'>Delete</a>
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
  
  $sql = "SELECT * FROM `brgyofficials` LIMIT $offset, $records_per_page";
  $result = $conn->query($sql);
  
  while ($row = $result->fetch_assoc()) {
    echo "

    <style>label{color:#494949
        }</style>
      <tr>
      <td>{$row['id']}</td>
      <td>{$row['position']}</td>
      <td>{$row['name']}</td>
      <td>{$row['contact']}</td>
      <td>{$row['address']}</td>
      <td>{$row['date_employment']}</td>
      <td>{$row['date_registered']}</td> 
        <td>
          <!-- Button trigger modal -->
          <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#exampleModalLong_$row[id]'>
            View
          </button>

         <div class='modal fade' id='exampleModalLong_$row[id]' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle_$row[id]' aria-hidden='true'>
            <div class='modal-dialog modal-lg' role='document'>
              <div class='modal-content'>
                <div class='modal-header'>


                <h5 class='modal-title' style='color:#494949' id='exampleModalLongTitle_$row[id]'>Record of Barangay Officials</h5>
                <button type='button' style='color:#494949'class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                <div class='modal-body'>
                <form readonly>
                <div class='row mb-3'>
                  <div class='form-group col-md-4'>
                    <label for='fullname'>Fullname</label>
                    <input type='text' class='form-control text-center' name='fullname' value='$row[name]' readonly>
                  </div>
             
                  <div class='form-group col-md-4'>
                    <label for='type_household'>Position</label>
                    <input type='text' class='form-control text-center' name='type_household' value='$row[position]' readonly>
                  </div>
                  <div class='form-group col-md-4'>
                    <label for='yearStay'>Contact</label>
                    <input type='text' class='form-control text-center' name='yearStay' value='$row[contact]' readonly>
                  </div>
                  <div class='form-group col-md-4'>
                  <label for='yearStay'>Address</label>
                  <input type='text' class='form-control text-center' name='yearStay' value='$row[address]' readonly>
                </div>

          

              
                  <div class='form-group col-md-4'>
                    <label for='date_registered'>Date Employment</label>
                    <input type='text' class='form-control text-center' name='date_registered' value='$row[date_employment]' readonly>
                  </div>
                  <div class='form-group col-md-4'>
                  <label for='date_registered'>Date Registered</label>
 ";
                    $dateRegistered = date('Y-m-d', strtotime($row['date_registered']));
                    
                    echo "   <input type='text' class='form-control text-center' name='date_registered' value='$dateRegistered' readonly>
                
                </div>
                

                
                              
              </form>
                </div>
                </div>
                </div>
                </div>

                <a class='btn btn-primary btn-sm' href='edit_bofficials.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete_bofficials.php?id={$row['id']}'>Delete</a>
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

<a class="btn btn-primary" href="create_bofficials.php" role="button">Add Barangay Official</a>
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