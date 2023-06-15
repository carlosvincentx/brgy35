<?php
include "../includes/Auth.php";
include "../includes/MainClass.php";
include "header.php";
?>

<style>




.text {
  margin-left: 10px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}
  
h1,p{
font-family: 'Roboto', sans-serif; /* add a font style */
}


  .editable{
    display:none;
  }
 


 

  .center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}

  
  .c1{
    height: 100px;
    background-color: rgb(167,196,188,0.3);
    padding: 10px;
    border-radius: 30px;
    margin: 5px;
}
 
 

.mission{
  margin:20px;
  background-color:gray;
  height:350px;
  border-radius: 10px;
   text-align: center; 
  opacity: 1; /* add rounded corners with 10px radius */
}
.vission{
  margin:20px;
  background-color:gray;
  height:350px;
   text-align: center; 
  border-radius: 10px;
  opacity: 1;
}


 



.mission,.vission h1, {
font-family: 'Roboto', sans-serif; /* add a font style */

}
.content{
  height:400px;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  padding:20px;
  opacity: 0.8;
  margin-bottom:50px; /* decrease opacity to make the image more visible */
 }

 .center {
  text-align: center;
  margin: auto;
  
  width: 50%;
  height:inherit;
  padding: 50px;
}

</style>
<section class="home-section" style="height:inherit" >
    <div class="home-content" style = "background-color: #494949">
        <i class='bx bx-menu'></i>
        <span class="text" style = "color:#fff">Barangay 35, Zone 3, District 1, Tondo, Manila</span>
    </div>



    <div class="container my-5 text-center">
      
        <br>
    </div>

   <div class="container" style = "background-color:rgba(73,73,73, 0.6);  border-radius: 10px; padding:20px; width:1050vh;" >
  <!-- Stack the columns on mobile by making one full-width and the other half-width -->


  <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
  <div class="row" style="height:840px;">
    <div class="col-6 col-md-4 database">
    <div class="column2" >
            <h1>Graphs</h1>
            <div class="ContentAbout2">
                <div class="scroll-container1" >


                <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
            <h6      >CATEGORIES</h6>
 
        </div>
        <!-- Card Body -->
        <?php
// Connect to the database
$conn = mysqli_connect("sql211.infinityfree.com", "if0_34365512", "5X5BVXjt829", "if0_34365512_brgy35");

// Retrieve data from each table
$sql_PWD = "SELECT * FROM rbi where categories = 'PWD'";
$result_PWD = mysqli_query($conn, $sql_PWD);
if (!$result_PWD) {
    die(mysqli_error($conn));
}
$sql_Senior = "SELECT * FROM rbi where categories = 'Senior Citezen'";
$result_Senior = mysqli_query($conn, $sql_Senior);
if (!$result_Senior) {
    die(mysqli_error($conn));
}
$sql_NA = "SELECT * FROM rbi where categories = 'N/A'";
$result_NA = mysqli_query($conn, $sql_NA);
if (!$result_NA) {
    die(mysqli_error($conn));
}

// Combine and count data from the three tables
$status_counts = array("PWD" => mysqli_num_rows($result_PWD), "Senior Citizen" => mysqli_num_rows($result_Senior), "N/A" => mysqli_num_rows($result_NA));

// Generate pie chart
$data = array_values($status_counts);
$labels = array_keys($status_counts);
$colors = array("#FF6384", "#36A2EB", "#FFCE56");
?>
<div class="card-body">
    <div class="chart-pie pt-4 pb-2">
        <canvas id="myChart"></canvas>
    </div>
    <div class="mt-4 text-center small">
        <?php for ($i = 0; $i < count($data); $i++) { ?>
        <span class="mr-2">
            <i class="fas fa-circle" style="color: <?php echo $colors[$i]; ?>"></i> <?php echo $labels[$i] . ": " . $data[$i]; ?>
        </span>
        <?php } ?>
    </div>
</div>
      
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            data: <?php echo json_encode($data); ?>,
            backgroundColor: <?php echo json_encode($colors); ?>,
        }]
    },
     options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: '#fff'
                }
            }
        }
    }
});
</script>





<div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 >Barangay Officials</h6>
 
        </div>
        <!-- Card Body -->
        <?php
// Connect to the database
$conn = mysqli_connect("sql211.infinityfree.com", "if0_34365512", "5X5BVXjt829", "if0_34365512_brgy35");

// Retrieve data from each table
$sql_Chairman="SELECT * FROM `brgyofficials` where position = 'Chairman'";
$sql_Chairman = mysqli_query($conn, $sql_Chairman);
if (!$sql_Chairman) {
    header("Location: error.php");
}
$sql_Secretary = "SELECT * FROM `brgyofficials` where position = 'Secretary'";
$sql_Secretary = mysqli_query($conn, $sql_Secretary);
if (!$sql_Secretary) {
    header("Location: error.php");
}


$sql_Kagawad="SELECT * FROM `brgyofficials` where position = 'Kagawad'";
$sql_Kagawad = mysqli_query($conn, $sql_Kagawad);
if (!$sql_Kagawad) {
    header("Location: error.php");
}
$sql_Sk_Kagawad = "SELECT * FROM `brgyofficials` where position = 'SK Kagawad'";
$sql_Sk_Kagawad = mysqli_query($conn, $sql_Sk_Kagawad);
if (!$sql_Sk_Kagawad) {
    header("Location: error.php");
}


$sql_Tanod = "SELECT * FROM `brgyofficials` where position = 'Tanod'";
$sql_Tanod = mysqli_query($conn, $sql_Tanod);
if (!$sql_Tanod) {
    header("Location: error.php");
}



// Combine and count data from the three tables
$status_counts = array("Chairman" => mysqli_num_rows($sql_Chairman), "Secretary" => mysqli_num_rows($sql_Secretary),
"Kagawad" => mysqli_num_rows($sql_Kagawad), "SK Kagawad" => mysqli_num_rows($sql_Sk_Kagawad),
"Tanod" => mysqli_num_rows($sql_Tanod)

);

// Generate pie chart
$data = array_values($status_counts);
$labels = array_keys($status_counts);
$colors = array("#FF6384", "#36A2EB", "#FFCE56","#A52A2A","#ADD8E6");
?>
<div class="card-body">
    <div class="chart-pie pt-4 pb-2">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="mt-4 text-center small">
        <?php for ($i = 0; $i < count($data); $i++) { ?>
        <span class="mr-2" >
            <i class="fas fa-circle" style="color: <?php echo $colors[$i]; ?>"></i> <?php echo $labels[$i] . ": " . $data[$i]; ?>
        </span>
        <?php } ?>
    </div>
</div>
      
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById("myChart2").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            data: <?php echo json_encode($data); ?>,
            backgroundColor: <?php echo json_encode($colors); ?>,
        }]
    },
     options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: '#fff'
                }
            }
        }
    }
});
</script>

                     </div>

                     
                  
            </div>
    </div>
 
    </div>


    <div class="col anouncement">
    <div class="column2" >
            <h1>Announcement</h1>
            <div class="ContentAbout2">
                <div class="scroll-container4">
                  
<?php
            $servername = "sql211.infinityfree.com";
$username = "if0_34365512";
$password = "5X5BVXjt829";
$database = "if0_34365512_brgy35";

            // Creates connection
            $connection = new mysqli($servername, $username, $password, $database);
            
            // Checks connection
            if ($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }

            // Read all row from database table
            $sql = "SELECT *
            FROM event
            LEFT JOIN event_announcement ON event.id = event_announcement.event_id
            LEFT JOIN resident_announcement ON event.id = resident_announcement.event_id";
       $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

      

          //  <h1 style="text-align:center;">Event 1</h1>
            
           
            // Read Data of each row
            while($row = $result->fetch_assoc()){    
                echo" 
                <a href='http://localhost/brgy/Brgy_Module/eventPage.php?id=$row[event_id]'>
                <div class='container py-2 '>
                <div class='row d-flex justify-content-center align-items-center '>
                  <div style='background-color: #494949;border-radius: 10px'class='card-body p-4'>
                   
                        <h3 style='color: white'class='mb-3'>$row[about]</h3>
                       
                 <p style='color: white' class='small mb-0'><i class=far fa-star fa-lg'></i>  Location at
                          <strong>$row[location]</strong> on $row[date_from] to $row[date_to] <span class='mx-2'>(</span> $row[time_start] - $row[time_end] <span class='mx-2'>)</span></p>
                        <hr class='my-2'>
                      
                        <div class='d-flex justify-content-start rounded-3 p-2 mb-2'
                              style='background-color: #efefef;'>
                              <div class='card-body text-center'>
              
                                <p class='small text-muted mb-1'>$row[post]</p>
                             
                           
            
                        </div>
                      </div>
                    </div>
                    </div>
                    </div>
          </a>
             
          
                ";
            }
            ?>


                     </div>
                  
            </div>
    </div>
  </div>
    </div>



    <div class="row missionVission">
    <div class="col-sm mission">
      <br><br>
      <h1>Mission</h1>
      <p>To provide Constituents the public necessary to them.<p>
        <hr>
      <h1 >Vision</h1>
      <p>To see the Constituents in Good and Prosperous Living<p>
    
    </div>
    <div class="col-sm vission">
      <br><br>
    <h1>History of Barangay</h1>
      <p>On 1972, the late President E. Marcos
        declares the creations of the barangays
        in the city of Manila through the 
        Presidential Decree. Barangay 35 Zone 3,
        is one of the barangays that has been
        ratified on the aforesaid year. Barangay 
        belongs to an ubarnized city and categorize.
      </thead><p>
    </div>
  </div>
  </div>




</div>
          </div>
<br><br>

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