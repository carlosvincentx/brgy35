<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "../includes/config.php";
include "header.php";
?>

<style>
  #chat4 .form-control {
border-color: transparent;
}

#chat4 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}

.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
  </style>
  
<section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>


    <style>
  .float-right {
    position: fixed;
    top: 50%;
    right: -301px;
    transform: translateY(-360px);
    z-index: 9999;
    width: 1000px; /* Set the width to 300 pixels */
  }
</style>
<div class="float-right">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-4">

      <!-- Buttons trigger collapse -->
   


<?php
         
include "../includes/config.php";    
            // Checks conn
            if ($conn->connect_error){
                die("connection failed: " . $conn->connect_error);
            }

            // Read all row from database table
            $sql = "SELECT * FROM event , event_announcement where  event_announcement.event_id = event.id ";
           $result = $conn->query($sql);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }

      

          //  <h1 style="text-align:center;">Event 1</h1>
            
           
            // Read Data of each row
            while($row = $result->fetch_assoc()){    
                echo "
                <div class='container py-2 '>
                <div class='row d-flex justify-content-center align-items-center '>
                  <div class='col col-xl-7'>
                    <div class='card mb-5' style='border-radius: 15px;'>
                      <div style='background-color: #11101d;border-radius: 10px'class='card-body p-4'>
                   
                        <h3 style='color: white'class='mb-3'>$row[about]</h3>
                  
                      <script>
                        function copyData() {
                          var data = document.getElementById('dataInput').value;
                          var tempInput = document.createElement('input');
                          document.body.appendChild(tempInput);
                          tempInput.value = data;
                          tempInput.select();
                          document.execCommand('copy');
                          document.body.removeChild(tempInput);
                          alert('Data copied!');
                        }
                      </script>




                 <p style='color: white' class='small mb-0'><i class=far fa-star fa-lg'></i>  Location at
                          <strong>$row[location]</strong> on $row[date_from] to $row[date_to] <span class='mx-2'>(</span> $row[time_start] - $row[time_end] <span class='mx-2'>)</span></p>
                        <hr class='my-4'>
                      
                        <div class='d-flex justify-content-start rounded-3 p-2 mb-2'
                              style='background-color: #efefef;'>
                              <div class='card-body text-center'>
                   
                                <p class='small text-muted mb-1'>$row[post]</p>
                             
                              </div>
                              
                            </div>
            
            
                        </div>
                      </div>
                    </div>
          
             
          
                ";
            }
            ?>



       




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

