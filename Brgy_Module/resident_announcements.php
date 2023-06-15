<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "header.php";

include "../includes/config.php";
?>


  
<section class="home-section" style = "height:inherit;">
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>


    <div class ="container my-5 ">
    <a class ="btn btn-primary btn-sm btn-block col-md-3 " href="create_eventR.php" role = "button"><span class="fa fa-plus"></span> Add Resident Announcement</a>

</div>


<?php
         
include "../includes/config.php";
            // Read all row from database table
            $sql = "SELECT * FROM event , resident_announcement where  resident_announcement.event_id = event.id ";
            $result = $conn->query($sql);

            if (!$result) {
              header("Location: error.php");      }

      

          //  <h1 style="text-align:center;">Event 1</h1>
            
           
            // Read Data of each row
            while($row = $result->fetch_assoc()){    
                echo "
                <div class='container py-2 '>
                <div class='row d-flex justify-content-center align-items-center '>
                  <div class='col col-xl-7'>
                    <div class='card mb-5' style='border-radius: 15px;'>
                      <div style='background-color: #494949;border-radius: 10px'class='card-body p-4'>
                   
                        <h3 style='color: white'class='mb-3'>$row[about]</h3>
                         <a class='btn btn-primary btn-sm mb-3' href=' residents/edit.php?household_no=$row[event_id]'>Edit</a>
                      <a class ='btn btn-danger btn-sm mb-3' href=' residents/delete.php?household_no=$row[event_id]'>Delete</a>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</html>

