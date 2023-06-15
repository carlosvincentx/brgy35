<?php


include "../includes/config.php";
 ?>

<style>
    #chat3 .form-control {
border-color: transparent;
}

#chat3 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}


</style>


<style>
  #chat2 .form-control {
    border-color: transparent;
  }

  #chat2 .form-control:focus {
    border-color: transparent;
    box-shadow: inset 0px 0px 0px 1px transparent;
  }


  #chat2 {
    height: 400px;
    overflow-y: auto;
    border-radius: 15px;
  }
</style>


<style>
  #chat1 .form-control {
    border-color: transparent;
  }

  #chat1 .form-control:focus {
    border-color: transparent;
    box-shadow: inset 0px 0px 0px 1px transparent;
  }


  #chat1 {
    height: 400px;
    overflow-y: auto;
    border-radius: 15px;
  }
</style>






<section class="home-section" style = "height:100vh;">
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>

    <div class="container my-5 text-center">
        <h2>Inbox </h2>
        <br>
    </div>


    <section style="background-color: #343434;">
  <div class="container py-5">

    <div class="row">
      <div class="col-md-12">

        <div class="card" id="chat3" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                <div class="p-3">

                   

                  <div data-mdb-perfect-scrollbar="true" id="chat2" style="position: relative; height: 500px">
                    <ul class="list-unstyled mb-0">

                    <?php
$sql = "SELECT messageresident.resident_id, resident_account.username, messageresident.content, messageresident.created_at
        FROM messageresident
        JOIN resident_account ON messageresident.resident_id = resident_account.id
        GROUP BY messageresident.resident_id
        ORDER BY messageresident.created_at DESC";

  $result = $conn->query($sql);
  
  if (!$result) {
    header("Location: error.php");  }
  
  // Read data of each row
  while($row = $result->fetch_assoc()){
    echo "<li class='p-2 border-bottom'>
            <a href='report4.php?id={$row["resident_id"]}' class='d-flex justify-content-between'>
              <div class='d-flex flex-row'>
                <div></div>
                <div class='pt-1'>
                  <p class='fw-bold mb-0'>{$row["username"]}</p>
                  <p class='small text-muted'>{$row["content"]}</p>
                </div>
              </div>
              <div class='pt-1'>
              </div>
            </a>
          </li>";
  }
?>

                   
                      
                 <!--     <li class="p-2 border-bottom">
                        <a href="http://localhost/brgy/Brgy_Module/report3.php" class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                            <div>
                            </div>
                            <div class="pt-1">
                              <p class="fw-bold mb-0">Marie Horwitz</p>
                              <p class="small text-muted">Hello, Are you there?</p>
                            </div>
                          </div>
                          <div class="pt-1">
                            <p class="small text-muted mb-1">Just now</p>
                            <span class="badge bg-danger rounded-pill float-end">3</span>
                          </div>
                        </a>
                      </li>
-->

                 
        
                    </ul>
                  </div>

                </div>

              </div>


           