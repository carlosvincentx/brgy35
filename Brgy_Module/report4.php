<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "header.php";

include "../includes/config.php";
include "report2.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  $content = $_POST['content'];
  $id = $_POST['residentID'];

  $sql = "INSERT INTO responsebrgy (content, messageResident_id) VALUES ('$content', '$id')";

  if ($conn->query($sql) === TRUE) {
   
  } else {
    header("Location: error.php");  }
}
 ?>
 
 
 
 
 <div class="col-md-6 col-lg-7 col-xl-8">

<div class="pt-3 pe-3" id="chat1" data-mdb-perfect-scrollbar="true"
  style="position: relative; height: 450px">
  <?php

  $residentID=0;
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  

$residentID = $_GET["id"];



  // Query to get messages for the first resident ID
  $sql = "SELECT messageresident.id as MesID ,messageresident.resident_id as resiID, resident_account.username, messageresident.content, messageresident.created_at
          FROM messageresident
          JOIN resident_account ON messageresident.resident_id = resident_account.id
          WHERE messageresident.resident_id = $residentID
          ORDER BY messageresident.created_at ASC";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Read data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "  <div class='d-flex flex-row justify-content-start'>
              <div>
              <h6>{$row["username"]}</h6>
                <p class='small p-2 ms-3 mb-1 rounded-3' style='background-color: #f5f6f7;'>
                {$row["content"]}</p>
                <p class='small ms-3 mb-3 rounded-3 text-muted float-end'>{$row["created_at"]}</p>
              </div>
            </div>";
            $residentID=$row['resiID'];
    // Query to get the response for the first resident ID
    $sql2 = "SELECT responsebrgy.messageResident_id, responsebrgy.content, responsebrgy.created_at
             FROM responsebrgy
             JOIN messageresident ON messageresident.id = responsebrgy.messageResident_id
             WHERE responsebrgy.messageResident_id={$row['MesID']}
             ORDER BY responsebrgy.created_at ASC";

    // Execute the query
    $result2 = mysqli_query($conn, $sql2);

    // Check if the query was successful
    if ($result2 === false) {
      header("Location: error.php");  } else {
      // Check if any rows were returned
      if (mysqli_num_rows($result2) > 0) {
        // Fetch the first row of the result set

        while($row2 = mysqli_fetch_assoc($result2)) {
     
        echo "<div class='d-flex flex-row justify-content-end'>
                <div>
                 
                  <p class='small p-2 me-3 mb-1 text-white rounded-3 bg-primary'>
                  {$row2["content"]}</p>
                  <p class='small me-3 mb-3 rounded-3 text-muted'>{$row2["created_at"]}</p>
                </div>
              </div>";}
      }
    }
  }




 }else{


  $sql = "SELECT messageresident.resident_id, resident_account.Name, messageresident.content, messageresident.created_at
        FROM messageresident
        JOIN resident_account ON messageresident.resident_id = resident_account.id
        GROUP BY messageresident.resident_id
        ORDER BY messageresident.created_at ASC
        LIMIT 1";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Fetch the first row of the result set
  $row = mysqli_fetch_assoc($result);
  // Get the resident_id column value of the first row
  $residentID  = $row['resident_id'];

  // Query to get messages for the first resident ID
  $sql = "SELECT messageresident.id as MesID ,messageresident.resident_id as resiID, resident_account.username, messageresident.content, messageresident.created_at
          FROM messageresident
          JOIN resident_account ON messageresident.resident_id = resident_account.id
          WHERE messageresident.resident_id = $residentID 
          ORDER BY messageresident.created_at ASC";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Read data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "  <div class='d-flex flex-row justify-content-start'>
              <div>
              <h6>{$row["username"]}</h6>
                <p class='small p-2 ms-3 mb-1 rounded-3' style='background-color: #494949;'>
                {$row["content"]}</p>
                <p class='small ms-3 mb-3 rounded-3 text-muted float-end'>{$row["created_at"]}</p>
              </div>
            </div>";
            $residentID=$row['resiID'];
    // Query to get the response for the first resident ID
    $sql2 = "SELECT responsebrgy.messageResident_id, responsebrgy.content, responsebrgy.created_at
             FROM responsebrgy
             JOIN messageresident ON messageresident.id = responsebrgy.messageResident_id
             WHERE responsebrgy.messageResident_id={$row['MesID']}
             ORDER BY responsebrgy.created_at";

    // Execute the query
    $result2 = mysqli_query($conn, $sql2);

    // Check if the query was successful
    if ($result2 === false) {
      header("Location: error.php"); } else {
      // Check if any rows were returned
      if (mysqli_num_rows($result2) > 0) {
        // Fetch the first row of the result set

        while($row2 = mysqli_fetch_assoc($result2)) {
     
        echo "<div class='d-flex flex-row justify-content-end'>
                <div>
                  <p class='small p-2 me-3 mb-1 text-white rounded-3 bg-primary'>
                  {$row2["content"]}</p>
                  <p class='small me-3 mb-3 rounded-3 text-muted'>{$row2["created_at"]}</p>
                </div>
              </div>";}
      }
    }
  }
} else {
  echo "No results found.";
}




 }

// Close the database conn
 
?>




  






</div>
<?php


// Get the last message ID
$sql = "SELECT messageresident.id, messageresident.resident_id, resident_account.username, messageresident.content, messageresident.created_at
FROM messageresident
JOIN resident_account ON messageresident.resident_id = resident_account.id
WHERE messageresident.resident_id = $residentID
ORDER BY messageresident.id DESC
LIMIT 1";

$lastID = 0;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $lastID = $row['id'];
}

mysqli_close($conn);
?>

<form method="POST">
    <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2">
        <input type="text" class="form-control form-control-lg" id="content" name="content" placeholder="Type message">
        <input type="hidden" name="residentID" value="<?php echo $lastID; ?>">
        <button type="submit" class="ms-3" name="submit"><i class="fas fa-paper-plane" style = 'color:#343434;'></i></button>
    </div>
</form>
</div>
</div>

</div>
</div>

</div>
</div>

</div>
</section>





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
<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></html>