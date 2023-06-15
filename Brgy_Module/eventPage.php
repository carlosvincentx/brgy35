

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/indexstyle.css">
  <link rel="stylesheet" href="./assets/css/bootstrap.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel = "icon" href = "./img/brgylogo.png">
  <title>Barangay 35 | RBI</title>



  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>


</head>
<body>


<div class="container my-5" style="display:flex; justify-content:center; align-items:center; height: 100vh;">

 
                      
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

   
include "../includes/config.php";

            // Checks connection
            if ($conn->connect_error){
              header("Location: error.php");   }

// Read all rows from database table
$sql = "SELECT *
        FROM event
        LEFT JOIN event_announcement ON event.id = event_announcement.event_id
        LEFT JOIN resident_announcement ON event.id = resident_announcement.event_id
        WHERE event_announcement.event_id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "' OR resident_announcement.event_id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "'";

       $result = $conn->query($sql);

            if (!$result) {
              header("Location: error.php");   }

      

          //  <h1 style="text-align:center;">Event 1</h1>
            
           
            // Read Data of each row
            while($row = $result->fetch_assoc()){    
        

                    echo " 
                    <section>
                      <div class='card' style='max-width: 42rem'>
                        <div class='card-body'>
                          <!-- Data -->
                          <div class='d-flex mb-3'>
                           
                            <div>
                                
                              <a href='' class='text-dark mb-0'>
                                <strong>$row[about]</strong>
                              </a>
                              <a href='' class='text-muted d-block' style='margin-top: -6px'>
                                <small> Location at
                                      <strong>$row[location]</strong> on $row[date_from] to $row[date_to] <span class='mx-2'>(</span> $row[time_start] - $row[time_end] <span class='mx-2'>)</span></small>
                              </a>
                            </div>
                          </div>
                          <!-- Description -->
                          <div>
                            <p>
                            $row[post]</p>
                          </div>
                        </div>
                    
                        </div>
                      </div>
                    </section>";

            }
            ?>

   

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></html>